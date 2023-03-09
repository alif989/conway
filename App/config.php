<?php
###general settings
Flight::set('default_title', 'Conway Locksmith SC | (843) 920-4327 | Expert Technician for Residential, Commercial, and Car Locksmith Service');
Flight::set('default_description', 'A local locksmith in Conway, South Carolina - We provides residential, commercial, and car lock installation, repair, and maintenance services - including emergency locksmith services. We also provide transponder key duplication, car key replacement, master keying service, car ignition switch repair, commercial door hardware, commercial lock installation, commercial lock repair,car lockout, home lockouts, business lockouts and much more.');
Flight::set('phone', '8439204327');
Flight::set('flight.base_url', '/conway/'); ///this needs to be changed if website is in subdir ex. /website/
Flight::set('mainURL', 'http://' . $_SERVER['SERVER_NAME']); ///used for sitemap generator and Wordpress blog integration
###general settings


###mailing settings
Flight::set('fromMail', 'info@conway.net');
Flight::set('fromMailName', 'Conway Locksmith Website Lead');
Flight::set('sendToMail', ['oraikoleads@gmail.com','myrtlebeachlocksmith@gmail.com']);
Flight::set('useSmtp', true);
Flight::set('smtpAuth', true);
Flight::set('smtpPort', 587);
Flight::set('smtpUser', 'info@conway.net');
Flight::set('smtpPassword', ',DRLgSMGUF1X');
Flight::set('smtpHost', 'mail.conway.net');
Flight::set('smtpSecure', ''); // Enable TLS encryption, `ssl` also accepted
#mailing settings


### ==> Blog Regular Setup
Flight::set('useWordpress', false); /// enable wordpress

### ==> Blog API Setup
Flight::set('useWP', false); /// enable wordpress integration
Flight::set('wpFolder', 'wordpress'); /// folder name where wp is installed
Flight::set('postsPerPage', 4);
Flight::set('useWPcommnets', true); /// enable wordpress commnets for posts
Flight::set('commentsPerPage', 4);
Flight::set('latestPosts', 4);
Flight::set('blogParams', array( ///wordpress DB setup
	'database' => 'wordpress',
	'username' => 'root',
	'password' => '',
	'prefix' => 'sec_', // default prefix is 'wp_', you can change to your own prefix
));
###Blog setup
