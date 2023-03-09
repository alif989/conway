<?php $menuData = include 'App/menuData.php';  ?>
<section class="google-map text-center"  id="map">
  <div class="pt-5 pb-5">Loading Google Map...</div>
</section>

<footer id="footer" class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-3">
        <a href="<?php echo url('/')?>" title=" Conway Locksmith SC" class="d-block mx-auto mb-3 text-center">
          <img  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-src="<?php echo assets('img/logo.png');?>" width="300" height="auto" class="mb-3 lazy_img text-center"
            title="Conway Locksmith SC" alt=" Conway Locksmith SC">
        </a>
        <h2 class="text-center b-f mb-3 size-3"> Conway Locksmith </h2>
        <p class="p-text size-4 small-text">
        Conway Locksmith provides expert residential, commercial, and automotive lock installation, repair, and maintenance services - including 24/7 emergency locksmith services - to properties everywhere in the Conway, South Carolina area. Contact Conway Locksmith today for rapid, effective, 
        and custom-tailored solutions for all of your Conway,
         SC lock, key, and security hardware needs.
         
            <a class="highlight" href="<?php echo url('/'); ?>" title=" Conway Locksmith SC"> Conway Locksmith</a>  

           
            provides expert 
          <a href="<?php echo url('services/residential-locksmith'); ?>"
            class="highlight" title="residential locksmith">residential locksmith</a>,
          <a href="<?php echo url('services/commercial-locksmith'); ?>"
            class="highlight" title="commercial locksmith">commercial locksmith</a>,  
          <a href="<?php echo url('services/lock-installation'); ?>"
            class="highlight" title="new lock installation">and automotive lock installation </a>, repair, and
          maintenance services - including 
          <a href="<?php echo url('services/emergency-locksmith'); ?>"
            class="highlight" title="emergency locksmith services">emergency locksmith </a> s to properties everywhere in the Conway, South Carolina area. Contact Conway Locksmith today for rapid, effective, 
        and custom-tailored solutions for all of your Conway,
         SC lock, key, and security hardware needs.
         
        </p>
        <h4 class="text-center b-f">Conway Locksmith is a Certified Locksmith in the State of South Carolina</h4> 
        <div class="mx-auto text-center mt-3">
          <?php  partial('social-link-icons'); ?>
        </div>
      </div>
      <div class="col-6  col-sm-6 col-md-2">
        <h3 class="text-white mb-3">About</h3>
        <ul>
          <?php
                $title = '';
                foreach ($menuData['our-locksmith-company']  as $item => $data) {
                $title = ucwords(str_replace('-', ' ',  $item));
                ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a></li> <?php
                }
                ?>
                  <!-- <li>
                    <a href="<?php echo url('blog')?>" title="Locksmith Blog">Locksmith Blog</a>
                </li> -->
        </ul>
      </div>
      <div class="col-6  col-sm-6 col-md-2">
        <h3 class="text-white mb-3">LOCKSMITH SERVICES</h3>
        <ul>
          <?php
            $title = '';
            $menuData = include 'App/menuData.php';
              foreach ($menuData['locksmith-services']  as $item => $data) {
                $title = ucwords(str_replace('-', ' ',  $item));
                  ?>
            <li><a href="<?php echo url('services/'.$item)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a></li><?php
            }
            ?>
            <li><a href="<?php echo url('services/home-lockout');?>" title="home Lockout">Home Lockout</a></li> 
            <li><a href="<?php echo url('services/lock-installation');?>" title="Lock Installation">Lock Installation</a></li> 

            <li><a href="<?php echo url('services/car-locksmith');?>" title="car locksmith">Car Locksmith</a></li>
             <!-- <li><a href="<?php echo url('services/broken-key-extraction');?>" title="broken key extraction">broken key extraction</a></li>
            <li><a href="<?php echo url('services/car-ignition-repair');?>" title="car ignition repair">car ignition repair</a></li> -->
            <li><a href="<?php echo url('services/car-key-replacement');?>" title="car key replacement">Car Key Replacement</a></li>   

            <li><a href="<?php echo url('services/commercial-locksmith');?>" title="commercial locksmith">Commercial Locksmith</a> </li>
            <!-- <li><a href="<?php echo url('services/commercial-lock-installation');?>" title="commercial locks installation">commercial locks installation</a>
            </li> 
            <li><a href="<?php echo url('services/office-lockout');?>" title="office lockout">Office lockout</a>     </li>                                -->
 

        </ul>
      </div>
      <div class="col-6  col-sm-6 col-md-2">
        <h3 class="text-white mb-3">PRODUCTS</h3>
        <ul>
          <?php
                $title = '';
                $menuData = include 'App/menuData.php';
                  foreach ($menuData['products']  as $item => $data) {
                    $title = ucwords(str_replace('-', ' ',  $item));
                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a>
          </li> <?php
                }
              ?>
        </ul>
      </div>
      <div class="col-12  col-sm-6 col-md-3" itemscope itemtype="http://schema.org/LocalBusiness">
        <h3 class="text-white mb-3">Contact Us</h3>
        <h3 itemprop="name" class="d-none"> Conway Locksmith SC</h3>
        <p class="intro d-none" itemprop="description">
          Conway Locksmith provides professional residential, commercial and car lock installation,
          repair and maintenance services - including emergency locksmith services - throughout the entirety of
          Conway, SC.
        </p>
        <ul class="footer-contact">
          <li class="text-left mb-4 text-white  ml-4 pl-3">
            <i class="fal fa-xl fa-phone"></i>
            Phone Numebr:
            <a itemprop="telephone" onclick="return gtag_report_conversion('tel:<?php echo phone(true, false); ?>');"
              href="tel:<?php echo phone(true, false); ?>" title="Call Now">
              <?php echo phone(true, false); ?>
            </a>
          </li>
          <li class="text-left mb-4 text-white ml-4 pl-3">
            <i class="fal fa-xl fa-envelope"></i>
            E-mail:
            <a itemprop="email" class="text-lowercase" href="mailto:<?php echo Flight::get('fromMail'); ?>"
              title="E-mail Address">
              <?php echo Flight::get('fromMail'); ?></a>
          </li>
          <li class="text-left mb-4  ml-4 pl-3" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <a class="d-block" target="_blank"
              href="#"
              title="Conway Locksmith on Google Map">
              <i class="fal fa-xl  fa-xl-map  fa-map-marker-alt"></i>
              Address: Conway Locksmith <br>
              Conway, SC
              <!-- <span itemprop="streetAddress">25 Ocean Dr</span>,
              <span itemprop="addressLocality">Conway</span>,
              <span itemprop="addressRegion">SC</span><br>
              <span itemprop="postalCode">27607</span> -->
            </a>
          </li>
          <li class="text-left text-white">
            <div class="text-white">Business Hours</div>
            Mon : Open 24 hours <br>
            Tue : Open 24 hours <br>
            Wed : Open 24 hours <br>
            Thu : Open 24 hours <br>
            Fri : Open 24 hours <br>
            Sat : Closed <br>
            Sun : Open 24 hours
          </li> 
        </ul>
      </div>
    </div>
    <!-- End row  -->
	<div class="text-center credits-block">
	
	Our customer rates 4.9 stars <span class="credit-icons i-fs"></span>
        - based on 132 reviews.
 
    </div>
    <div class="rating-block mx-auto text-center">
    <p class="mb-0"><a href="<?php echo url('/') ?>" title="Conway Locksmith">Conway Locksmith</a> website and
      Conway Locksmith brand is owned and operated by A Locksmith LLC - <span class="highlighted"> certified 
        locksmith in Conway, South Carolina </span></p>

    </div>
    <!-- credits-block -->
    <div class="powered-by mx-auto text-center mb-3">
      <a target="_blank" href="http://www.oraiko.com/web-design/" title="website design company">Web Design</a> &amp; <a
        target="_blank" href="http://www.oraiko.com/custom-web-development/" title="web development company">Web
        Developed</a> by <br>
      <a target="_blank d-block text-center" href="http://www.oraiko.com" title="Oraiko, software development company">
          <img class="oraiko-logo lazy_img" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
          data-src="<?php echo assets('img/logo-oraiko.png') ?>" alt="Oraiko software development company" width="85"
          height="16"></a>
    </div>
  </div>
  <!-- end container -->
  <div class="copyright pt-5 mx-auto text-center pb-5 col-12">
    Copyrights &copy; <?php echo date('Y')?>  Conway Locksmith SC. All Rights Reserved.
  </div>
  <!-- Skity footer  -->
  <div id="fd-sticky" class="fd-sticky pt-xl-3 pb-xl-3 pt-lg-1 pb-lg-1">
    <div class="row align-items-center ci-row">
      <div class="col-12 d-flex align-items-center  justify-content-center">
        
          <a href="<?php echo url('/'); ?>" title="Genuine Quality Locksmith Service in Conway, SC" class="mr-3">
            <span class="col d-inline-block  credit-icons ci-4"></span>
          </a>
          <a href="<?php echo url('/'); ?>" title="Original Quality Locksmith Service in Conway, SC" class="mr-3">
            <span class="col d-inline-block credit-icons ci-6"></span>
          </a>
          <a href="<?php echo url('/'); ?>" title="Premium Quality Locksmith Service in Conway, SC" class="mr-3">
            <span class="col d-inline-block  credit-icons ci-3 "></span>
          </a>

          <a href="<?php echo url('/'); ?>" title="Top Quality Locksmith Service in Conway, SC" class="mr-3">
            <span class="col d-inline-block  credit-icons ci-1"></span>
          </a>
          <a class="d-inline-block mr-3"
          href="#"
          title="Reviews Us on Google" target="_blank"><span class="credit-icons ci-gr-2"></span></a>
        <a class="d-inline-block mr-3"
          href="#"
          title=" Conway Locksmith SC on Google Reviews" target="_blank">
          <span class="col d-inline-block credit-icons ci-gr-us"></span>
        </a>
        <?php    echo partial ('social-link-icons');   ?>
         
      </div>
      
    </div>
  </div>
  <a id="x-it" class="x-it x-dn rounded-circle" href="javascript:void(0)" title="Click to hide the bar">
        <i class="fal fa-2x fa-angle-down pseudo" aria-hidden="true"></i>
    </a>
  <!--End Stiky footer  -->
  <!-- Start mobile footer -->
  <div id="md-sticky">
    <div class="row align-items-center pt-2 pb-2 bg-theme-2 no-gutters border-0">
      <div class="col no-gutters text-center">
        <a href="#" data-toggle="modal" data-target="#quote-popup" title="Get a Quote"><i
            class="fa-2x fal fa-edit"></i><br>Get a Quote</a>
      </div>
      <div class="col no-gutters text-center">
        <a href="#" target="_blank" id="review_star" title="Google Reviews">
          <!-- <i class="fa-1x fal fa-star"></i><i class="fa-1x fal fa-star"></i><i class="fa-1x fal fa-star"></i><i
            class="fa-1x fal fa-star"></i><i class="fa-1x fal fa-star"></i> -->
            <span class="credit-icons i-fs"></span>
            <br>Google Reviews</a>
      </div>
      <div class="col no-gutters text-center">
        <a href="#" title="Map Location" target="_blank"><i
            class="fa-2x fal fa-map-marker-alt border-0"></i><br>Location</a>
      </div>
      <div class="col no-gutters text-center">
        <a onclick="return gtag_report_conversion('tel:<?php echo Flight::get('phone') ; ?>');" href="tel:<?php echo Flight::get('phone') ; ?>"
          title="call"><i class="fa-2x fal fa-phone"></i><br>Call</a>
      </div>
    </div>
  </div>
  <!-- Start mobile footer -->
</footer>