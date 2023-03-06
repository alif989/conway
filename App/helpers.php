<?php

function metaData($view = false) {

	$meta = include 'meta.php';

	if ($view) {
		if (array_key_exists($view, $meta)) {
			$meta = $meta[$view];
		} else {
			return false;
		}
	}

	return $meta;

}

function getPageNumber() {
	if (isset(Flight::request()->query->page)) {
		$page = trim(Flight::request()->query->page);
		if (is_numeric($page) && $page > 0) {
			$page = $page;
		} else {
			$page = 1;
		}
	} else {
		$page = 1;
	}

	return $page;
}

function showView($view, array $data = array(), $subview = null) {

	///go to next route if the view file does not exist
	if ($subview != null) {

		if (!file_exists('views/pages/' . $view . '/' . $subview . '.php')) {

			Flight::notFound();
			die;

		}

		$view = $view . '/' . $subview;

	} else {

		if (!file_exists('views/pages/' . $view . '.php')) {

			Flight::notFound();
			die;
		}
	}

	// if (!file_exists('views/' . $view . '.php')) {
	// 	return true;
	// }

	$meta = metaData($view);

	if ($meta) {
		if (isset($meta['title'])) {
			Flight::set('meta_title', $meta['title']);
		}
		if (isset($meta['description'])) {
			Flight::set('meta_description', $meta['description']);
		}
		if (isset($meta['layout'])) {
			Flight::set('page_layout', $meta['layout']);
		}
	}
	//pickup view file, data is optional
	Flight::render('pages/' . $view, $data, 'body_content');
	//and use master-layout for that view
	Flight::render('layouts/master-layout');
}


function metaTitle() {
	
	if (Flight::request()->url == '/') {
		return Flight::has('meta_title') ? Flight::get('meta_title') : Flight::get('default_title');

	}else{
		return Flight::has('meta_title') ? Flight::get('meta_title') :  ucwords( preg_replace('~[^\pL\d]+~u', ' ', pageBodyClass() ))  . ' - '. Flight::get('default_title');

	}
}

function metaDescription() {
	return Flight::has('meta_description') ? Flight::get('meta_description') : Flight::get('default_description');
}

function pageLayout($body_content) {

	$layout = Flight::has('page_layout') ? Flight::get('page_layout') : 'default-page';

	$body_content = minify_html($body_content);

	include 'views/layouts/' . $layout . '.php';

}

function slugify($text) {
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}

function logEvent($type) {

	$logFile = "App/log/" . $type . ".log";

	$date = Carbon\Carbon::now();

	if (file_exists($logFile)) {

		//lets clear large log file (3145728 == 3mb)
		if (filesize($logFile) > 3145728) {

			$dataToSend = array(
				'website' => Flight::get('mainURL'),
				'file_size' => human_filesize(filesize($logFile)),
				'subject' => 'Error Log Attached: ' . $type,
				'attachment' => $logFile,
				'email' => ''
			);

			sendEmail($dataToSend, true);

			////now clear file

			$clearMsg = "Cleaned at: " . $date . "\r\n" .

			"Filesize: " . human_filesize(filesize($logFile)) . "\r\n" .

				"********************\r\n";

			file_put_contents($logFile, $clearMsg);
		}

	}

	if ($type == '404') {

		//lets log this user
		$txt = "Date/Time: " . $date . "\r\n" .

		"IP: " . Flight::request()->ip . "\r\n" .

		"Proxy IP: " . Flight::request()->proxy_ip . "\r\n" .

		"Referrer: " . Flight::request()->referrer . "\r\n" .

		"Requested URL: " . currentUrl() . "\r\n" .

		"User Agent: " . Flight::request()->user_agent . "\r\n" .

			"-----------------";
	}

	file_put_contents($logFile, $txt . PHP_EOL, FILE_APPEND);

}

function sendEmail(array $dataToSend = [], $admin = false) {

	$mail = new PHPMailer;

	if (Flight::get('useSmtp') == true) {

		///SMTPOptions block may not be needed for other smtp service providers
		$mail->SMTPOptions = array(

			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true,
			),

		);

		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->Host = Flight::get('smtpHost'); // Specify main and backup SMTP servers
		$mail->SMTPAuth = Flight::get('smtpAuth'); // Enable SMTP authentication
		$mail->Username = Flight::get('smtpUser'); // SMTP username
		$mail->Password = Flight::get('smtpPassword'); // SMTP password
		$mail->SMTPSecure = Flight::get('smtpSecure'); // Enable TLS encryption, `ssl` also accepted
		$mail->Port = Flight::get('smtpPort'); // TCP port to connect to

	} else {

		$mail->IsSendmail();

	}

	if ($admin === true) {

		$mail->addAddress(Flight::get('devMail')); // Add a recipient

	} else {

		if (is_array(Flight::get('sendToMail'))) {

			foreach (Flight::get('sendToMail') as $sentToMail) {

				$mail->addAddress($sentToMail);

			}

		} else {

			$mail->addAddress(Flight::get('sendToMail')); // Add a recipient

		}

	}

	///if have input name "subject" than use it for custom mail subject
	if (isset($dataToSend['subject']) && !empty($dataToSend['subject'])) {

		$subject = $dataToSend['subject'];

	} else {

		$subject = 'Incomming mail';

	}

	if (isset($_FILES['file'])) {
		$mail->addAttachment($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
	}

	$mail->setFrom(Flight::get('fromMail'), Flight::get('fromMailName'));

	$mail->AddReplyTo($dataToSend['email']); //set reply to

	$mail->isHTML(true); // Set email format to HTML

	$mail->Subject = $subject;

	$mail->Body = getPartial('mailTemplate', array('postData' => $dataToSend));

	return $mail->send();
}

function starBar() {

	$pageId = pageBodyClass();
	$numStar = 5;
	$starWidth = 25;
	$db = Flight::database();

	$cookie_name = 'ratingSystem' . $pageId;
	$nbrPixelsInDiv = $numStar * $starWidth; // Calculate the DIV width in pixel

	// Rate average and number of rate from the database
	$query = $db->sql('SELECT round(avg(rate), 2) AS average, count(rate) AS nbrRate FROM ratings WHERE page="' . $pageId . '"')->one();

	//num of pixel to colorize (in yellow)
	$numEnlightedPX = round($nbrPixelsInDiv * $query['average'] / $numStar, 0);

	$getJSON = array('numStar' => $numStar, 'pageId' => $pageId); // We create a JSON with the number of stars and the media ID
	$getJSON = json_encode($getJSON);

	$starBar = '<div  id="' . $pageId . '" itemscope itemtype="https://schema.org/Article">';
	$starBar .= '<div class="star_bar" style="width:' . $nbrPixelsInDiv . 'px; height:' . $starWidth . 'px; background: linear-gradient(to right, #ffc600 0px,#ffc600 ' . $numEnlightedPX . 'px,#ccc ' . $numEnlightedPX . 'px,#ccc ' . $nbrPixelsInDiv . 'px);" rel=' . $getJSON . '>';
	for ($i = 1; $i <= $numStar; $i++) {
		$starBar .= '<div title="' . $i . '/' . $numStar . '" id="' . $i . '" class="star" data-toggle="tooltip"';
		if (!isset($_COOKIE[$cookie_name])) {
			$starBar .= ' onmouseover="overStar(\'' . $pageId . '\', ' . $i . ', ' . $numStar . '); return false;" onmouseout="outStar(\'' . $pageId . '\', ' . $i . ', ' . $numStar . '); return false;" onclick="rateMedia(\'' . $pageId . '\', ' . $i . ', ' . $numStar . ', ' . $starWidth . '); return false;"';
		}

		$starBar .= '></div>';
	}
	$starBar .= '</div>';
	$starBar .= '<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating" class="resultMedia' . $pageId . '" style="font-size: small; color: grey">'; // We show the rate score and number of rates
	if ($query['nbrRate'] == 0) {
		$starBar .= 'Not rated yet';
	} else {
		$starBar .= 'Rating: <span itemprop="ratingValue">' . $query['average'] . '</span>/' . $numStar . ' (<span itemprop="reviewCount">' . $query['nbrRate'] . '</span> votes)';
	}

	$starBar .= '</div>';
	$starBar .= '<div class="box' . $pageId . '"></div>';
	$starBar .= '</div>';
	return $starBar;
}

function url($path = '') {
	return Flight::get('flight.base_url') . trim($path, "/");
}

function isHome() {
	return Flight::request()->url == '/' ? true : false;
}

function phone($convert = false, $isLink = false) {

	$phone = $convert === TRUE ? convert_phone_nr(Flight::get('phone')) : Flight::get('phone');

	if ($isLink === true) {

		$phone = '<a title="Call Now" onclick="return gtag_report_conversion("tel:'.Flight::get('phone').'");"  href="tel:' . Flight::get('phone') . '">' . $phone . '</a>';

	}

	return $phone;
}

function assets($asset = '') {
	return Flight::get('flight.base_url') . 'assets/' . trim($asset, "/");
}

function human_filesize($bytes, $decimals = 2) {
	$sz = 'BKMGTP';
	$factor = floor((strlen($bytes) - 1) / 3);
	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

function partial($file, $data = []) {

	if (is_array($data) && !empty($data)) {
		extract($data);
	}

	include 'views/partials/' . $file . '.php';
}

function getPartial($file, $data = []) {

	if (is_array($data) && !empty($data)) {
		extract($data);
	}

	ob_start();
	include 'views/partials/' . $file . '.php';
	return ob_get_clean();
}
 
function pageName(){
	$link = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$link_array = explode('/',$link);
	if(strpos(end($link_array), '?') !== false){
		return substr( end($link_array), 0, strrpos( end($link_array), "?"));
	}else{
		return end($link_array);	
	} 
}
function currentUrl() {
	return 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function convert_phone_nr($p=false) {
	if (preg_match('/(\d{3})(\d{3})(\d{4})$/', phone(), $matches)) {
		$result = '('. $matches[1] . ') ' . $matches[2] . '-' . $matches[3];
		return $result;
	} else {
		return false;
	}
}
function pageBodyClass() {

	if (Flight::request()->url == '/') {
		return 'index';
	}

	$bodyClass = trim(Flight::request()->url, "/");

	return slugify($bodyClass) ;

}
// HTML Minifier
function minify_html($input) {
	if (trim($input) === "") {
		return $input;
	}

	// Remove extra white-space(s) between HTML attribute(s)
	$input = preg_replace_callback('#<([^\/\s<>!]+)(?:\s+([^<>]*?)\s*|\s*)(\/?)>#s', function ($matches) {
		return '<' . $matches[1] . preg_replace('#([^\s=]+)(\=([\'"]?)(.*?)\3)?(\s+|$)#s', ' $1$2', $matches[2]) . $matches[3] . '>';
	}, str_replace("\r", "", $input));
	// Minify inline CSS declaration(s)
	if (strpos($input, ' style=') !== false) {
		$input = preg_replace_callback('#<([^<]+?)\s+style=([\'"])(.*?)\2(?=[\/\s>])#s', function ($matches) {
			return '<' . $matches[1] . ' style=' . $matches[2] . minify_css($matches[3]) . $matches[2];
		}, $input);
	}
	return preg_replace(
		array(
			// t = text
			// o = tag open
			// c = tag close
			// Keep important white-space(s) after self-closing HTML tag(s)
			'#<(img|input)(>| .*?>)#s',
			// Remove a line break and two or more white-space(s) between tag(s)
			'#(<!--.*?-->)|(>)(?:\n*|\s{2,})(<)|^\s*|\s*$#s',
			'#(<!--.*?-->)|(?<!\>)\s+(<\/.*?>)|(<[^\/]*?>)\s+(?!\<)#s', // t+c || o+t
			'#(<!--.*?-->)|(<[^\/]*?>)\s+(<[^\/]*?>)|(<\/.*?>)\s+(<\/.*?>)#s', // o+o || c+c
			'#(<!--.*?-->)|(<\/.*?>)\s+(\s)(?!\<)|(?<!\>)\s+(\s)(<[^\/]*?\/?>)|(<[^\/]*?\/?>)\s+(\s)(?!\<)#s', // c+t || t+o || o+t -- separated by long white-space(s)
			'#(<!--.*?-->)|(<[^\/]*?>)\s+(<\/.*?>)#s', // empty tag
			'#<(img|input)(>| .*?>)<\/\1>#s', // reset previous fix
			'#(&nbsp;)&nbsp;(?![<\s])#', // clean up ...
			'#(?<=\>)(&nbsp;)(?=\<)#', // --ibid
			// Remove HTML comment(s) except IE comment(s)
			'#\s*<!--(?!\[if\s).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s', 
			
		),
		array(
			'<$1$2</$1>',
			'$1$2$3',
			'$1$2$3',
			'$1$2$3$4$5',
			'$1$2$3$4$5$6$7',
			'$1$2$3',
			'<$1$2',
			'$1 ',
			'$1',
			"", 
		),
		$input);
}

// CSS Minifier => http://ideone.com/Q5USEF + improvement(s)
function minify_css($input) {
	if (trim($input) === "") {
		return $input;
	}

	return preg_replace(
		array(
			// Remove comment(s)
			'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
			// Remove unused white-space(s)
			'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
			// Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
			'#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
			// Replace `:0 0 0 0` with `:0`
			'#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
			// Replace `background-position:0` with `background-position:0 0`
			'#(background-position):0(?=[;\}])#si',
			// Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
			'#(?<=[\s:,\-])0+\.(\d+)#s',
			// Minify string value
			'#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
			'#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
			// Minify HEX color code
			'#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
			// Replace `(border|outline):none` with `(border|outline):0`
			'#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
			// Remove empty selector(s)
			'#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s',
		),
		array(
			'$1',
			'$1$2$3$4$5$6$7',
			'$1',
			':0',
			'$1:0 0',
			'.$1',
			'$1$3',
			'$1$2$4$5',
			'$1$2$3',
			'$1:0',
			'$1$2',
		),
		$input);
}
// JavaScript Minifier
function minify_js($input) {
	if (trim($input) === "") {
		return $input;
	}

	return preg_replace(
		array(
			// Remove comment(s)
			'#\s*("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')\s*|\s*\/\*(?!\!|@cc_on)(?>[\s\S]*?\*\/)\s*|\s*(?<![\:\=])\/\/.*(?=[\n\r]|$)|^\s*|\s*$#',
			// Remove white-space(s) outside the string and regex
			'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/)|\/(?!\/)[^\n\r]*?\/(?=[\s.,;]|[gimuy]|$))|\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#s',
			// Remove the last semicolon
			'#;+\}#',
			// Minify object attribute(s) except JSON attribute(s). From `{'foo':'bar'}` to `{foo:'bar'}`
			'#([\{,])([\'])(\d+|[a-z_][a-z0-9_]*)\2(?=\:)#i',
			// --ibid. From `foo['bar']` to `foo.bar`
			'#([a-z0-9_\)\]])\[([\'"])([a-z_][a-z0-9_]*)\2\]#i',
		),
		array(
			'$1',
			'$1$2',
			'}',
			'$1$3',
			'$1.$3',
		),
		$input);
}
function get_default_img(){
	//return  "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E"; 
	return 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=='; 
}