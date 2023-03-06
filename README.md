# Small Website Boilerplate (micro framework)

This boilerplate is designed to build fast and organized websites with some essential tools

1) After cloning please run **composer update** to download packages used by framework

2) To generate sitemap visit **/generate-sitemap** url. Data for the sitemap is located in **/App/meta.php**

3) Edit config file located in **/App/config.php**

**Note:** If you need to use it in a subdirectory uncomment the line *RewriteBase /subdir/* in **.htaccess** file

### Some cool stuff included

  - Built on top of the Flight framework http://flightphp.com/
  - Mailing system https://github.com/PHPMailer/PHPMailer
  - Form Validator https://github.com/Wixel/GUMP
  - Database toolkit https://github.com/mikecao/sparrow
  - Sitemap generator https://github.com/evert/sitemap-php/
  - CSS, JS minify tool https://github.com/matthiasmullie/minify
  - Bootstrap v3.3.6 framework http://getbootstrap.com/
  - Font Awesome https://fortawesome.github.io/Font-Awesome/
  - Owl Carousel 2 http://www.owlcarousel.owlgraphic.com/
  - Animate CSS http://daneden.github.io/animate.css/
  - Wordpress integration
  - ...and many more

### Wordpress Integration
  
  - Enable/Configure wordpress from **/App/config.php** file
  - Install wordpress
  - Access integrated blog http://example.com/blog/

### Helper Functions

**starBar()**  - show star rating on the page

**url('somepage')** - /somepage

**isHome()** - returns bool

**phone(true, true)** - prints phone number from the config file, accepts two *optional* bool values, first bool converts phone to format 333-444-5555 and second bool converts the phone number to the link

**assets('file/from/assets/folder')** - returns path to the file from *assets* folder

**partial(filename, array('apple' => 'red'))** - includes file from /views/partials folder, accepts file name without **.php**, second value *array()* passed is optional, if present than it will load data to the partial file *$apple = 'red';*

**currentUrl()** - returns current URL *http://example.com/somepage*

**pageBodyClass()** - returns page class based on page URL

**Flight::database()** - loads https://github.com/mikecao/sparrow class and operates on */App/database/data.db* file

**Flight::get('key_from config.php')** - returns value of config key

### Other notes

We also want to keep track of 404 page, so we have log system implementet for that in (/App/log/404.txt). The cool thing is that if this file reaches 3 MB it will clear itself and send attachment to the dev email specified in config file.