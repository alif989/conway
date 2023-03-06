<?php $reviews = include 'App/testimonialData.php';  ?>
<section class="section  reviews">

  <div class="container-fluid custom-fluid">
  <div class="row no-gutters">
    <div class="col-md-5 align-self-center">
      <div class="text-box p-2">
          <h2 class="size-2 text-capitalize b-f font-weight-bold cw mb-3">Customer Reviews</h2>
          <h3 class="size-3 text-white b-f">See what people are saying</h3>
         <p class="text-white mt-5 d-none d-lg-block"> Myrtle Beach Locksmith’ team of certified and experienced locksmiths specialize in the <a class="highlight2" href="<?php echo url('services/lock-installation'); ?>" title="lock installation">lock installation</a>, repair, and maintenance of high security locks - as well as in a range of services including <a class="highlight2" href="<?php echo url('services/home-lockout'); ?>" title="emergency lockout service">emergency lockout service</a>, master keying, key duplication,  <a class="highlight2" href="<?php echo url('services/commercial-lock-installaton'); ?>" title="commercial lock installaton">commercial lock installaton</a>, car locksmith, <a class="highlight2" href="<?php echo url('services/car key programming'); ?>" title="car ignition repair">car ignition repair</a>, <a class="highlight2" href="<?php echo url('services/car-key-programming'); ?>" title="car key programming">car key programming</a>, <a class="highlight2" href="<?php echo url('services/car-key-replacement'); ?>" title="car key replacement">car key replacement</a> and much more - all on a 24/7 basis, for a fair and competitive, budget-friendly rate. </p> 
       
        <a href="<?php echo url('customer-reviews');?>"  title="See all Customer Reviews" class="button button_primary mt-lg-5"> SEE ALL CUSTOMER REVIEWS  <i class="fal fa-caret-right ml-2"></i></a>

        <div class="d-flex div mt-lg-5">
          <div>
              <a class="d-inline-block mr-3" href="#" title=" Myrtle Beach Locksmith SC on Google Reviews" target="_blank">
              <span class="d-inline-block credit-icons ci-gfs"></span>
            </a> 
          </div>
          <div>
              <a class="d-inline-block mr-3" href="https://www.yelp.com/" title=" Myrtle Beach Locksmith SC on Google Reviews" target="_blank">
              <span class="d-inline-block credit-icons ci-yfs"></span>
            </a>
          </div>
       
        </div>
        
        
      </div>
    </div>
    <div class="col-md-7 align-self-center">
      <div class="reviews-box"> 
        
        <div class="box-1 mt-lg-5">
        <div class="owl-carousel">
          <?php if ($reviews) {?>
          <?php foreach ($reviews as $key => $value) {?>
          <div class="reviews-box__item text-center mb-3">
               <span class="d-block text-white font-weight-bold mb-3 b-f text-uppercase h5"><?php echo $value['title']; ?></span>
               <div class="comment">
                   <p class="text-white"><?php echo $value['comment']; ?></p> 
                   <span class="d-block text-white mt-3 text-right size-4">- <?php echo $value['author']; ?></span> 
               </div>
              
                <div class="text-center mt-5">
                <span class="d-block text-white font-weight-bold size-3">5.0</span> 
                <span class="credit-icons i-fs"></span>
              </div>
                
            </div>
            <?php }?>
            <?php }?>
          </div>
          </div>
        </div> 

      </div>
      </div>
    </div>
</section>