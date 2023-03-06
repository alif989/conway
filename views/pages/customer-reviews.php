<?php $reviews = include 'App/testimonialData.php';  ?>
<?php Flight::set('innerPageBannerTitle', 'Locksmith Service Customer Reviews in Myrtle Beach')?>


 <div class="container">
   

    <h2 class="highlight h2">
        READ LOCKSMITH REVIEWS FROM OUR CUSTOMERS
    </h2>
    <p>
        Read to what our satisfied customers are saying about our locksmith service on 
        <a href="#" title="Myrtle Beach Locksmith on Google Reviews" target="_blank">Google</a> and  <a href="https://www.yelp.com/" title="Myrtle Beach Locksmith on Yelp Reviews" target="_blank">Yelp</a>. With thousands of happy and satisfied clients in the Myrtle Beach, SC area, <a href="<?php echo url('/'); ?>" title=" Myrtle Beach Locksmith "> Myrtle Beach Locksmith</a> is one of the trusted locksmith service provider who are proud to serve our dedicated customers for over a decade.
    </p>

    <?php if ($reviews) {?>
     <div class="row"> 
        <?php foreach ($reviews as $key => $value) {?> 
        <div class='col-12 col-md-4 mb-3'>
            <div class="highlight-box p-3 p-sm-5 pt-5 pb-5 h-100"> 
          
              <span class="d-block  font-weight-bold mb-3 b-f text-uppercase h5 cw"><?php echo $value['title']; ?></span>
               <div class="comment">
                   <p class="cw"><?php echo $value['comment']; ?></p> 
                   <span class="d-block  mt-3 text-right size-4 cw">- <?php echo $value['author']; ?></span> 
               </div>
                
                <div class="d-flex mt-3">
                <span class="d-block cw font-weight-bold size-3 text-left">5.0</span> 
                    <span class="credit-icons i-fs text-right mr-0"></span>
                </div>
                <div class="text-center">
                <span class="d-inline-block credit-icons  <?php echo ($value['source'] == 'yelp') ? 'ci-yfs' : 'ci-gfs'?> "></span>
                </div>
               

            </div>
        </div>
            <?php }?> 
        
     </div>
    <?php }?> 

<h3 class="h4 mt-5 text-center highlight-2"> 
Read More locksmith in Myrtle Beach, SC Customer Reviews on <a class="highlight" href="https://maps.google.com" title="Myrtle Beach Locksmith Customer Reviews on Google Reviews" target="_blank">Google</a> and  <a class="highlight" href="https://www.yelp.com/" title="Myrtle Beach Locksmith Customer Reviews on Yelp Reviews" target="_blank">Yelp</a>
</h3> 
 
</div>