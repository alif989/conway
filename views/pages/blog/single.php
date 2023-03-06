

	<?php if (isset($post->thumbnail)) {?>
		<img src="<?php echo $post->image ?>" class="blog-featured-image-single img-responsive" alt="<?php echo $post->title ?>" title="<?php echo $post->title ?>">
	<?php }?>

	<h3 class="blog-content__post-title single"><?php echo $post->title ?></h3>

	<div class="blog-content">
		<?php echo $post->content; ?>
	</div>
	<ul class="list-inline small blog-content__post-meta">
		<li><i class="fa fa-clock-o" aria-hidden="true"></i> Published: <?php echo Carbon\Carbon::parse($post->created_at)->diffForHumans() ?></li>
		<li><i class="fa fa-user" aria-hidden="true"></i> Author: <?php echo $post->author->nickname ?></li>
		<?php if (Flight::get('useWPcommnets') === true && $post->comment_status == 'open') {?>
			<li><i class="fa fa-comments" aria-hidden="true"></i> Comments: <?php echo $post->comment_count ? $post->comment_count : 0 ?></li>
		<?php }?>
	</ul>

	<?php partial('blog/comments', array('comments' => $comments, 'post_id' => $post->ID, 'commentsStatus' => $post->comment_status, 'elements' => $elements));?>