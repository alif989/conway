<?php

###
### This is main app controller, all the logic of this tinny app lives in here
###
use MatthiasMullie\Minify;
use SitemapPHP\Sitemap;

class AppController extends BaseController {
 

	######
	# Display view
	######

	public static function getView($view = 'index', $subview = null) {

		showView($view, array(), $subview);

	}

	 ###home about us section 
	 public static function  home_top_part(){
		include_once "views/partials/top-part-home.php" ; 
	} 
		
	######
	# rating
	######
	public static function rating() {

		$db = Flight::database();

		$rate = $_GET['rate'];
		$pageId = $_GET['pageId'];
		$expire = 24 * 3600; // 1 day

		setcookie('ratingSystem' . $pageId, 'rated', time() + $expire, '/'); // Place a cookie

		$newRating = array('page' => $pageId, 'rate' => $rate);

		$db->from('ratings')
			->insert($newRating)
			->execute();

		$result = $db->sql('SELECT round(avg(rate), 2) AS average, count(rate) AS total FROM ratings WHERE page="' . $pageId . '"')->one();

		$data = array('avg' => $result['average'], 'total' => $result['total']);

		Flight::json($data);

	}

	######
	# Sitemap Generator
	######
	public static function sitemap() {

		$sitemap = new Sitemap(Flight::get('mainURL'));
		//$sitemap->setPath('xmls/');

		//home page
		$sitemap->addItem('/', '1.0', 'daily', 'Today');

		foreach (metaData() as $key => $value) {
			//$sitemap->addItem('/' . $key, '0.9', 'daily', '14-12-2015');
			$sitemap->addItem('/' . $key, '0.9', 'daily', date("d-m-Y"));
		}

		$sitemap->createSitemapIndex(Flight::get('mainURL') . '/', 'Today');

		Flight::redirect('/sitemap-index.xml');

	}

	######
	# Validate and Send an email
	######
	public static function sendmail() {

		###validate form
		///we also can asign different rules per form by tracking input name "page"
		///for more rules go to https://github.com/Wixel/GUMP

		$formData = explode('&', $_POST['data']);
		$fomDataSendArray = [];

		for($i = 0; $i < count($formData); $i++) {
			$c = explode('=', $formData[$i]);

			$fomDataSendArray[$c[0]] = urldecode($c[1]); 
		}

		$rules = array(
			'name' => 'required|valid_name',
			'email' => 'required|valid_email',
			'phone' => 'required|phone_number',
		);
		// if (isset($fomDataSendArray['subject']) && $fomDataSendArray['subject'] == 'Write To Us') {
		// 	$rules = array(
		// 		'name' => 'required|valid_name',
		// 		'email' => 'required|valid_email',
		// 		'phone' => 'required|phone_number',
		// 		'file' => 'extension,png;jpg',
		// 	);
		// }

		$fomDataSendArray = array_map('trim', $fomDataSendArray);

		$validated = GUMP::is_valid(array_merge($fomDataSendArray, $_FILES), $rules);

		///return errors
		if (is_array($validated)) {

			Flight::json(['data' => $validated, 'status' => 406]);

		}

		// unset($fomDataSendArray['UploadImage']);

		####send mail if passes validation

		$mail = sendEmail($fomDataSendArray);

		if (!$mail) {

			Flight::json(['data' => 'Mailer Error: ' . $mail->ErrorInfo, 'status' => 500]);

		} else {

			Flight::json(['data' => 'Message has been sent', 'status' => 200]);

		}
	}

	######
	# Minify JS/CSS
	######

	public static function minify($file) {

		switch ($file) {
		case 'style.css':
			header("Content-type: text/css; charset: UTF-8");
			$minifier = new Minify\CSS();
			// $minifier->add('assets/css/blog.css');
			// $minifier->add('assets/css/animate.css');
			
			$minifier->add('assets/css/cubeportfolio.min.css');
			$minifier->add('assets/css/aos.css');
			// $minifier->add('assets/css/twentytwenty.css');
			// $minifier->add('assets/fancybox/dist/jquery.fancybox.min.css');
			$minifier->add('assets/owl-carousel/assets/owl.carousel.min.css');
			$minifier->add('assets/css/main.css');

			$extensions = array(
				'gif' => 'data:image/gif',
				'png' => 'data:image/png',
			);

			$minifier->setImportExtensions($extensions);
			// $minifiedPath = 'assets/css/minified.css';
			// $minifier->minify($minifiedPath);
			//include 'assets/css/minified.css';

			echo $minifier->minify();
			echo Flight::request()->url;
			break;

		case 'main.js':
			header("Content-type: text/javascript; charset: UTF-8");
			$minifier = new Minify\JS();
			$minifier->add('assets/js/jquery-1.12.3.min.js');
			
			$minifier->add('assets/js/popper.min.js');
			$minifier->add('assets/js/bootstrap.min.js');		


			$minifier->add('var ajaxurl = "' . Flight::get('mainURL') . url() . '";');
			$minifier->add('assets/js/form-submission.js');
			$minifier->add('assets/js/aos.js');
			$minifier->add('assets/js/jquery.cubeportfolio.min.js');

			// $minifier->add('assets/js/skrollr.min.js');
			// $minifier->add('assets/js/jquery.simplr.smoothscroll.min.js');
			$minifier->add('assets/js/sliders.js');
			// $minifier->add('assets/js/jquery.vide.js');
			// $minifier->add('assets/fancybox/dist/jquery.fancybox.min.js');
			$minifier->add('assets/owl-carousel/owl.carousel.min.js');
			// $minifier->add('assets/js/jquery.event.move.js');
		//	$minifier->add('assets/js/jquery.twentytwenty.js');

			$minifier->add('assets/js/app.js');
			echo $minifier->minify();
			break;

		default:
			return null;
			break;
		}

		// // save minified file to disk
		// $minifiedPath = assets('minify/css/main.css');
		// $minifier->minify($minifiedPath);

		// or just output the content
		//echo $minifier->minify();

	}

	######
	# Not Found
	######
	public static function notFound() {

		logEvent('404');

		showView('404');

	}

	######
	# Credits
	######
	public static function credits() {

		echo '<p>Developed By <b><a href="http://oraiko.com" target="_blank">Oraiko Corp.</a></b></p>' .
			'<a href="http://oraiko.com" target="_blank"><img src="http://oraiko.com/images/oraiko.png"></a>';

	}

}

?>