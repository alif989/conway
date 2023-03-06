<?php
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\UrlWindow;
Corcel\Database::connect(Flight::get('blogParams'));
// Set up a current path resolver so the paginator can generate proper links
Paginator::currentPathResolver(function () {
	return isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '/';
});
// Set up a current page resolver
Paginator::currentPageResolver(function ($pageName = 'page') {
	$page = isset($_REQUEST[$pageName]) ? $_REQUEST[$pageName] : 1;
	return $page;
});
###Breadcrumbs init
Flight::register('breadcrumb', 'Creitive\Breadcrumbs\Breadcrumbs', array(), function ($breadcrumb) {
	$breadcrumb->add('<i class="fal fa-home" aria-hidden="true"></i> Home', '/');
	$breadcrumb->setDivider(' » ');
});
###Breadcrumbs init
///add blogs base breadcrumb
//Flight::breadcrumb()->add('Blog', 'blog');
class BlogController extends BaseController {
	static $pageName = 'page';
	static $columns = ['*'];
	public static function index() {
		$query = trim(Flight::request()->query['search']);
		$page = isset($_REQUEST[self::$pageName]) ? $_REQUEST[self::$pageName] : null;
		if ($query == '') {
			$posts = Post::published()
				->type('post')
				->orderBy('id', 'DESC')
				->with('author', 'thumbnail')
				->paginate(Flight::get('postsPerPage'), self::$columns, self::$pageName, $page);
		} else {
			$posts = Post::published()
				->type('post')
				->where('post_title', 'LIKE', "%$query%")
				->with('author', 'thumbnail')
				->paginate(Flight::get('postsPerPage'), self::$columns, self::$pageName, $page);
			Flight::breadcrumb()->add(htmlspecialchars($query));
		}
		$window = UrlWindow::make($posts);
		$paginationElements = [
			$window['first'],
			is_array($window['slider']) ? '...' : null,
			$window['slider'],
			is_array($window['last']) ? '...' : null,
			$window['last'],
		];
		Flight::set('page_layout', 'blog');
		showView('blog/index', array('posts' => $posts, 'elements' => $paginationElements));
	}
	public static function post($slug) {
		$post = Post::type('post')->slug($slug)->with('author', 'thumbnail')->first();
		//move to next route if does not exist
		if ($post === NULL) {
			return true;
		}
		$page = isset($_REQUEST[self::$pageName]) ? $_REQUEST[self::$pageName] : null;
		$comments = Comment::where('comment_post_ID', $post->ID)
			->where('comment_approved', 1)
			->orderBy('comment_date', 'DESC')
			->paginate(Flight::get('commentsPerPage'), self::$columns, self::$pageName, $page);
		$window = UrlWindow::make($comments);
		$paginationElements = [
			$window['first'],
			is_array($window['slider']) ? '...' : null,
			$window['slider'],
			is_array($window['last']) ? '...' : null,
			$window['last'],
		];
		// $mainCat = $post->terms['category'];
		// $catSlug = current(array_flip($mainCat));
		// Flight::breadcrumb()->add($mainCat[$catSlug], 'category/' . $catSlug);
		// Flight::breadcrumb()->add($post->title, $slug);
		// Flight::set('page_layout', 'blog');
		// Flight::set('meta_title', $post->title);

		$mainCat = $post->terms['category'];
		$catSlug = current(array_flip($mainCat));
		Flight::breadcrumb()->add('Blog', 'blog');  
		//Flight::breadcrumb()->add($mainCat[$catSlug], 'category/' . $catSlug);
		Flight::breadcrumb()->add($post->title, $slug);
		Flight::set('page_layout', 'blog');
		Flight::set('meta_title', $post->title);

		showView('blog/single', array('post' => $post, 'comments' => $comments, 'elements' => $paginationElements));
	}
	public static function category($slug) {
		$page = isset($_REQUEST[self::$pageName]) ? $_REQUEST[self::$pageName] : null;
		$posts = Post::published()
			->type('post')
			->taxonomy('category', $slug)
			->orderBy('id', 'DESC')
			->with('author', 'thumbnail')
			->paginate(Flight::get('postsPerPage'), self::$columns, self::$pageName, $page);
		if (count($posts)) {
			Flight::breadcrumb()->add($posts[0]->terms['category'][$slug], $slug);
		}
		$window = UrlWindow::make($posts);
		$paginationElements = [
			$window['first'],
			is_array($window['slider']) ? '...' : null,
			$window['slider'],
			is_array($window['last']) ? '...' : null,
			$window['last'],
		];
		Flight::set('page_layout', 'blog');
		showView('blog/index', array('posts' => $posts, 'elements' => $paginationElements));
	}
	public static function tag($slug) {
		$page = isset($_REQUEST[self::$pageName]) ? $_REQUEST[self::$pageName] : null;
		$posts = Post::published()
			->type('post')
			->taxonomy('post_tag', $slug)
			->orderBy('id', 'DESC')
			->with('author', 'thumbnail')
			->paginate(Flight::get('postsPerPage'), self::$columns, self::$pageName, $page);
		if (count($posts)) {
			Flight::breadcrumb()->add($posts[0]->terms['tag'][$slug], $slug);
		}
		$window = UrlWindow::make($posts);
		$paginationElements = [
			$window['first'],
			is_array($window['slider']) ? '...' : null,
			$window['slider'],
			is_array($window['last']) ? '...' : null,
			$window['last'],
		];
		Flight::set('page_layout', 'blog');
		showView('blog/index', array('posts' => $posts, 'elements' => $paginationElements));
	}
	public static function postComment($postId) {
		$rules = array(
			'name' => 'required|valid_name',
			'email' => 'required|valid_email',
			'comment' => 'required',
		);
		$_POST = array_map('trim', $_POST);
		$validated = GUMP::is_valid($_POST, $rules);
		///return errors
		if (is_array($validated)) {
			Flight::json(['data' => $validated, 'status' => 406]);
		}
		$comment = new Comment;
		$comment->comment_approved = 0; /// 0 = not approved
		$comment->comment_post_ID = $postId;
		$comment->comment_author = $_POST['name'];
		$comment->comment_author_email = $_POST['email'];
		$comment->comment_content = $_POST['comment'];
		$comment->save();
		Flight::json(['data' => '<b>Thank you!</b> Your comment was submited, but we still need to approve it.', 'status' => 200]);
	}
}
### Helpers
// getting blog tags
function getBlogTags() {
	$data = Taxonomy::where('taxonomy', 'post_tag')->get();
	return $data;
}
// getting blog categories
function getBlogCategories() {
	$data = Taxonomy::where('taxonomy', 'category')->get();
	return $data;
}
// getting blog latest posts
function getLatestPosts() {
	$data = Post::published()
		->type('post')
		->with('thumbnail')
		->orderBy('id', 'DESC')
		->limit(Flight::get('latestPosts'))
		->get();
	return $data;
}
