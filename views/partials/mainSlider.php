<?php $menuData = include 'App/menuData.php';  ?>
<section class="homeBanner">
  <div class="owl-carousel">
    <div class="homeBanner-item">
      <div class="homeBanner__image banner-cover banner1" data-src="assets/img/banner/banner1.jpg"  data-src-sm="assets/img/banner/banner1-small.jpg">
      </div>
      <div class="homeBanner-item__caption bg">
        <h3 class="d-block light-font mt-md-4 mb-4 mt-sm-2 mb-sm-3 size-3">Best Locksmith in Conway, SC</h3>
        <a href="<?php echo url('conway-beach-locksmith') ;?>" title="Conway Locksmith">
          <h1 class="text-uppercase h2 text-white">Conway Locksmith </h1>
        </a>
         <ul class="list-inline list-items">
          <li class="list-inline-item"><a class="text-white button-link light-font" href="<?php echo url('services/residential-locksmith') ?>"
              title="Residential Locksmith">Residential Locksmith</a></li>
          <li class="list-inline-item"><a class="text-white button-link light-font" href="<?php echo url('services/commercial-locksmith') ?>"
              title="Commercial Locksmith">Commercial Locksmith</a></li>
          <li class="list-inline-item"><a class="text-white button-link light-font" href="<?php echo url('services/car-locksmith') ?>" title="Car Locksmith">Car
              Locksmith</a></li>
          <li class="list-inline-item"><a class="text-white button-link light-font" href="<?php echo url('services/emergency-locksmith') ?>"
              title="Emergency Locksmith">Emergency Locksmith</a></li>
        </ul>
        <div class="mt-5 mb-5 d-none d-md-block d-lg-block d-xl-block">
          <a href="<?php echo url('conway-beach-locksmith') ;?>" title="Read More on Conway Locksmith"
            class="button button_primary">READ MORE
            <span class="d-none d-md-inline-block">ON Conway LOCKSMITH </span><i class="fal fa-caret-right"></i></a>
        </div>
      </div>
    </div>

    <div class="homeBanner-item">
      <div class="homeBanner__image banner-cover banner2" data-src="assets/img/banner/banner4.jpg"  data-src-sm="assets/img/banner/banner4-small.jpg">
      </div>
      <div class="homeBanner-item__caption bg">
        <a href="<?php echo url('services/residential-locksmith') ;?>" title="Residential Locksmith Service in Conway, SC">
          <h2  class="text-uppercase h2 text-white">Residential Locksmith </h2>
        </a>
        <h3  class="d-block light-font mt-md-4 mb-4 mt-sm-2 mb-sm-3 size-3">Conway Residential Locksmith </h3>
          <ul class="list-inline list-items"> 
            <?php
              $title = ''; 
              foreach ($menuData['locksmith-services']['residential-locksmith'] as $item => $data) {    
              $title = str_replace('-', ' ',  $item);                     
              ?><li class="list-inline-item">
                <a  class="text-white button-link light-font"  href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a></li><?php
              }  
            ?>
          </ul> 
          <div class="mt-5 mb-5 d-none d-md-block d-lg-block d-xl-block">
          <a href="<?php echo url('services/residential-locksmith') ;?>" title="Read More on Residential Locksmith Service in Conway, SC"
            class="button button_primary">READ MORE
            <span class="d-none d-md-inline-block">ON RESIDENTIAL LOCKSMITH </span><i class="fal fa-caret-right"></i></a>
        </div>
      </div>
    </div>
    <div class="homeBanner-item">
      <div class="homeBanner__image banner-cover banner3" data-src="assets/img/banner/banner3.jpg"  data-src-sm="assets/img/banner/banner3-small.jpg">
      </div>
      <div class="homeBanner-item__caption bg">
        <a href="<?php echo url('services/commercial-locksmith') ;?>" title="Commercial Locksmith Service in Conway, SC">
          <h2  class="text-uppercase h2 text-white">Commercial Locksmith </h2>
        </a>
        <h3  class="d-block light-font mt-md-4 mb-4 mt-sm-2 mb-sm-3 size-3">Professional Commercial  Conway Locksmith </h3>
          <ul class="list-inline list-items"> 
            <?php
              $title = ''; 
              foreach ($menuData['locksmith-services']['commercial-locksmith'] as $item => $data) {    
              $title = str_replace('-', ' ',  $item);                     
              ?><li class="list-inline-item"><a  class="text-white button-link light-font"  href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a></li><?php
              }  
            ?>
          </ul> 
          <div class="mt-5 mb-5 d-none d-md-block d-lg-block d-xl-block">
          <a href="<?php echo url('services/commercial-locksmith') ;?>" title="Read More on Commercial Locksmith Service in Conway, SC"
            class="button button_primary">READ MORE
            <span class="d-none d-md-inline-block">ON COMMERCIAL LOCKSMITH </span><i class="fal fa-caret-right"></i></a>
        </div>
      </div>
    </div>
    <div class="homeBanner-item">
      <div class="homeBanner__image banner-cover banner4" data-src="assets/img/banner/banner2.jpg"  data-src-sm="assets/img/banner/banner2-small.jpg">
      </div>
      <div class="homeBanner-item__caption bg">
        <a href="<?php echo url('services/car-locksmith') ;?>" title="Car Locksmith Service in Conway, SC">
          <h2  class="text-uppercase h2 text-white">Car Locksmith </h2>
        </a>
        <h3  class="d-block light-font mt-md-4 mb-4 mt-sm-2 mb-sm-3 size-3">Car  Conway Locksmith </h3>
          <ul class="list-inline list-items"> 
            <?php
              $title = ''; 
              foreach ($menuData['locksmith-services']['car-locksmith'] as $item => $data) {    
              $title = str_replace('-', ' ',  $item);                     
              ?><li class="list-inline-item"><a  class="text-white button-link light-font"  href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a></li><?php
              }  
            ?>
          </ul> 
          <div class="mt-5 mb-5 d-none d-md-block d-lg-block d-xl-block">
          <a href="<?php echo url('services/car-locksmith') ;?>" title="Read More on Car Locksmith"
            class="button button_primary">READ MORE
            <span class="d-none d-md-inline-block">ON CAR LOCKSMITH </span><i class="fal fa-caret-right"></i></a>
        </div>
      </div>
    </div>
    <div class="homeBanner-item">
      <div class="homeBanner__image banner-cover banner5" data-src="assets/img/banner/banner5.jpg"  data-src-sm="assets/img/banner/banner5-small.jpg">
      </div>
      <div class="homeBanner-item__caption bg">
        <a href="<?php echo url('services/emergency-locksmith') ;?>" title="Emergency Locksmith Service in Conway, SC">
          <h2  class="text-uppercase h2 text-white">Emergency Locksmith </h2>
        </a>
        <h3  class="d-block light-font mt-md-4 mb-4 mt-sm-2 mb-sm-3 size-3">Emergency  Conway Locksmith </h3>
          <ul class="list-inline list-items"> 
            <?php
              $title = ''; 
              foreach ($menuData['locksmith-services']['emergency-locksmith'] as $item => $data) {    
              $title = str_replace('-', ' ',  $item);                     
              ?><li class="list-inline-item"><a  class="text-white button-link light-font"  href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a></li><?php
              }  
            ?>
          </ul> 
          <div class="mt-5 mb-5 d-none d-md-block d-lg-block d-xl-block">
          <a href="<?php echo url('services/emergency-locksmith') ;?>" title="Read More on Emergency Locksmith"
            class="button button_primary">READ MORE
            <span class="d-none d-md-inline-block">ON EMERGENCY LOCKSMITH </span><i class="fal fa-caret-right"></i></a>
        </div>
      </div>
    </div>
 


  </div>
 <!-- <div id="owl-control-box" class="owl-control-box d-lg-flex d-none text-center mr-lg-3">
    <div class="owl-controls">
      <div class="carousel-custom-dots owl-dots">
        <div class="owl-dot mb-4">
          <a class="owl-text" href="javascript:void(0)" title="Conway Locksmith">Conway Locksmith</a>
        </div> 
        <div class="owl-dot mb-4">
          <a class="owl-text" href="javascript:void(0)" title="Residential Locksmith">Residential Locksmith</a>
        </div>
        <div class="owl-dot mb-4">
          <a class="owl-text" href="javascript:void(0)" title="Commercial Locksmith">Commercial Locksmith</a>
        </div>
        <div class="owl-dot mb-4">
          <a class="owl-text" href="javascript:void(0)" title="Car Locksmith">Car Locksmith</a>
        </div>
        <div class="owl-dot mb-4">
          <a class="owl-text" href="javascript:void(0)" title="Emergency Locksmith">Emergency Locksmith</a>
        </div>
      </div>
    </div>
  </div>   -->
  <!-- <div class="homeBanner-scroll d-none d-lg-block">
    <a href="javascript:void(0);" onclick="scrollToSection('.welcome-home',72)">
      <i class="fal fa-long-arrow-down fa-4x"></i>
    </a>
  </div> -->
</section>