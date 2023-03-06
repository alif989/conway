<?php

Flight::route('/', array('AppController', 'getView'));

Flight::route('POST /sendmail', array('AppController', 'sendmail'));

Flight::route('/generate-sitemap', array('AppController', 'sitemap'));

Flight::route('/assets/css/@file', array('AppController', 'minify'));

Flight::route('/assets/js/@file', array('AppController', 'minify'));

Flight::map('notFound', array('AppController', 'notFound'));

Flight::route('/dev', array('AppController', 'credits'));

Flight::route('/rating', array('AppController', 'rating'));

Flight::route('/home_top_part', array('AppController', 'home_top_part'));


/* WP blog routes */
if (Flight::get('useWP') === true) {

	Flight::route('/blog', array('BlogController', 'index'));

	Flight::route('/blog/@slug', array('BlogController', 'post'));

	Flight::route('/blog/tag/@slug', array('BlogController', 'tag'));

	Flight::route('/blog/category/@slug', array('BlogController', 'category'));

	Flight::route('POST /blog/comment/add/@postId', array('BlogController', 'postComment'));

	Flight::route('/wp-admin', function () {

		Flight::redirect('/' . Flight::get('wpFolder') . '/wp-admin');

	});

}

//it is on the bottom for the reason
Flight::route('/@view(/@subview)', array('AppController', 'getView'));
