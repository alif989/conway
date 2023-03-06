<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- title & description -->
	<title><?php echo metaTitle(); ?></title>
	<meta name="description" content="<?php echo metaDescription(); ?>">
	<!-- open graph -->
	<meta property="og:title" content="<?php echo metaTitle(); ?>" />
	<meta property="og:description" content="<?php echo metaDescription(); ?>" />
	<meta property="og:url" content="<?php echo currentUrl() ?>" />
	<meta property="og:image" content="<?php echo assets('img/myrtle-beach-locksmith.jpg');?>" />
	<link rel="shortcut icon" href="<?php echo url('favicon.ico') ?>" type="image/x-icon">
	<link rel="icon" href="<?php echo url('favicon.ico') ?>" type="image/x-icon">  
 
	<!-- Load minified css -->
	 <link href='<?php echo url('assets/css/style.css') ?>' rel='stylesheet' type='text/css'> 	 
	<?php  if(pageBodyClass() == 'our-work'){ ?>
 		<link href='<?php echo url('assets/css/cubeportfolio.min.css') ?>' rel='stylesheet' type='text/css'> 
	 <?php } ?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	 <!--[if lt IE 9]>
	   <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	 <![endif]--> 
	</head>
	<body class="<?php echo pageBodyClass() ?>">
    <!-- Modal -->
	<?php // if( isHome() === true ) { ?>
	   <!-- <div class="preloader"></div> -->
 
		<?php partial('header')?>
		<?php pageLayout($body_content);?>
		<?php partial('footer')?>
		<?php partial('quote-popup')?>
		<script src="<?php echo url('assets/js/main.js') ?>" <?php  if(pageBodyClass() != 'our-portfolio') : echo "defer"; endif; ?>></script>
		 
		<?php 
		  if(pageBodyClass() == 'our-portfolio'){
		 ?>	
		 <!-- <script src="<?php echo url('assets/js/jquery.cubeportfolio.min.js') ?>"></script> --> 
		 <script>
		var portfolioGallery = $('#js-grid-mosaic-flat');
		portfolioGallery.cubeportfolio({
			filters: '#js-filters-mosaic-flat',
			loadMore: '#js-grid-mosaic-flat-loadMore',
			loadMoreAction: 'click',
			layoutMode: 'grid',
			sortToPreventGaps: true,
			mediaQueries: [{
				width: 1600,
				cols: 4
			}, {
				width: 1100,
				cols: 4
			}, {
				width: 800,
				cols: 3
			}, {
				width: 240,
				cols: 2
			}],
			defaultFilter: '*',
			animationType: 'quicksand', //unfold,
			gapHorizontal: 0,
			gapVertical: 0,
			gridAdjustment: 'responsive',
			caption: 'zoom',
			displayType: 'bottomToTop',
			displayTypeSpeed: 100,
			// lightbox
			lightboxDelegate: '.cbp-lightbox',
			lightboxGallery: true,
			lightboxTitleSrc: 'data-title',
			lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
		});
		 </script>
		 <?php  } ?>
	</body>
</html>