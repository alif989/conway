<?php $menuData = include 'App/menuData.php';  ?>
<section class="section welcome-home default-bg bg-css p-0">
    <div class="container-fluid">

        <!-- End Tile -->
        <div class="row">

            <div class="col-md-5 order-2 order-md-1 a-k">

                <div class="tile text-left mb-3 mb-md-5" id="tile-1">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs align-items-center" role="tablist">
                        <div class="slider"></div>
                        <li class="mr-2 mr-md-3 mt-1 mb-1 mt-md-0 mb-mt-0">
                            <a class="active text-uppercase d-md-inline-block" id="aboutTab" data-toggle="tab"
                                href="#aboutInfo" role="tab" aria-controls="aboutInfo" aria-selected="true"> 
                                About 
                                <span class="d-md-none">Us</span>
                                <span class="d-none d-md-inline-block">Our Company</span>  
                            
                            </a>
                        </li> 
                        <li class="mr-2 mr-md-3 mt-1 mb-1 mt-md-0 mb-mt-0 text-white"> | </li> 
                        <li class="mr-2 mr-md-3 mt-1 mb-1 mt-md-0 mb-mt-0">
                            <a class="text-uppercase d-md-inline-block" id="contactTab" data-toggle="tab"
                                href="#contactInfo" role="tab" aria-controls="contactInfo" aria-selected="false">
                                Local 
                                <span class="d-md-none">Locksmith</span>
                                <span class="d-none d-md-inline-block">Conway Locksmith</span>
                                </a>
                        </li>

                    </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade show active animated fadeIn" id="aboutInfo" role="tabpanel"
                        aria-labelledby="aboutTab">
                        <h3 class="size-3 text-white">Locksmith Service in Conway , SC 
                        </h3>
                        <a href="<?php echo url('our-locksmith-company')?>" class="text-white"
                            title="About Our Company">
                            <h2 class="title text-uppercase mt-4 mb-4 h1">Conway LOCKSMITH</h2>
                        </a>
                        <p class="intro text-white"> 
                              <a href="<?php echo url('conway-beach-locksmith'); ?>"
                                title="Conway Locksmith">Conway Locksmith</a> provides expert 
                                <a  href="<?php echo url('services/residential-locksmith'); ?>"  title="residential">residential locksmith</a>,
                                 <a href="<?php echo url('services/commercial-locksmith'); ?>" title="commercial">commercial locksmith</a>, and 
                                 <a  href="<?php echo url('services/car-locksmith'); ?>" title="car locksmith">car locksmith</a> including, but not limited to   
                                 <a href="<?php echo url('services/lock-installation'); ?>"
                                title="lock installation">lock installation</a>, repair 
                            and maintenance services - as well as a range of specialty services including <a
                                href="<?php echo url('services/emergency-locksmith'); ?>"
                                title="emergency lockout services">emergency lockout services</a> - to the entirety of
                            the Conway, SC areas. Our team of highly experienced, fully <a
                                href="<?php echo url('accredetd-locksmith'); ?>"
                                title="Certified Locksmith in Conway">certified</a>, professional <a
                                href="<?php echo url('products'); ?>" title="Products">lock and key</a> technicians
                            remain on-call to travel to your direct location on a 24/7 basis - providing you with
                            custom-tailored, rapid solutions to all of your property’s unique
                            <a href="<?php echo url('products/locks'); ?>" title="lock">lock</a>,
                            <a href="<?php echo url('products/keys'); ?>" title="keys">keys</a>,
                            access control, and
                            security hardware
                            needs. </p>
                            
                            <!-- <h2 class= h2 nav-font text-white mt-5 mb-3">Cerfified and Insured Locksmith in Conway, SC </h3> -->

                            <ul class="bulletList">
                            <li class="text-white">Fully <a href="<?php echo url('accredetd-locksmith')?>" title="Accredetd, Cerfified and Insured Locksmith in Conway, SC">Certified and Insured Locksmith in Conway, SC</a> </li>
                            <li class="text-white">Rapid Response, Direct-to-Location Locksmith Service</li>
                            <li class="text-white"><a href="<?php echo url('services/emergency-locksmith'); ?>" title="24/7 Emergency Lockout Service">24/7 Emergency Lockout Service</a></li>
                            
                            <li class="text-white">Efficient, fast, and courteous <a href="<?php echo url('services'); ?>" title="Locksmith Services">Locksmith Services</a> </li>
                            <li class="text-white">Expertly trained and highly experienced Locksmith Technicians</li>
                            
                            <li class="text-white">Custom-tailored, professional locksmith services - with 5 star <a href="<?php echo url('customer-reviews'); ?>" title="Reviews">reviews</a>!</li>
                            <li class="text-white">Wide area of locksmith service including all of Conway, SC and Surrounding Areas</li>
                        </ul>


                        <p class="mt-5 mb-3 mt-md-5 mb-md-5"><a href="<?php echo url('our-locksmith-company')?>"
                                title="Learn More on Our Company" class="button button_primary"> READ MORE
                                <span class="d-none d-lg-inline-block">ON OUR COMPANY </span><i
                                    class="fal fa-caret-right"></i></a></p> 
                    </div> 
                    <div class="tab-pane fade animated fadeIn" id="contactInfo" role="tabpanel"
                        aria-labelledby="contactTab">
                        <h3 class="size-3 text-white">24/7 Locksmith Service in Conway</h3>
                            <a href="<?php echo url('conway-beach-locksmith')?>" class="text-white"
                                title="Conway Locksmith">
                                <h2 class="title text-uppercase mt-4 mb-4">Local Conway Locksmith</h2>
                            </a>
                        <p class="intro text-white"> 
                             
                        <a href="<?php echo url('conway-beach-locksmith'); ?>"
                                title="Conway Locksmith">Conway Locksmith</a> provides 24/7 emergency lockout service to homes, businesses, and vehicles at locations everywhere in the Greater Conway, South Carolina area. Lockouts tend to occur at the most inconvenient times, posing a serious danger to  
                                   <a  href="<?php echo url('services/residential-locksmith'); ?>"  title="residential">residential locksmith</a>,
                                 <a href="<?php echo url('services/commercial-locksmith'); ?>" title="commercial">commercial locksmith</a>, and 
                                 <a  href="<?php echo url('services/car-locksmith'); ?>" title="car locksmith">car locksmith</a> security. The highly skilled, fully <a
                                href="<?php echo url('accredetd-locksmith'); ?>"
                                title="licensed and insured Locksmith in Conway">licensed and insured</a> lockout technicians here at Conway Locksmith stand ready at all times of day and night to travel to your location and instantly restore your access to your home, business, or vehicle without incurring any damage to your existing  <a href="<?php echo url('products/locks'); ?>" title="lock">lock</a> hardware.
                    
                    
                    </p>
                            <p class="intro text-white"> 
                            Contact Conway Locksmith today for rapid-arrival, affordable. highly effective emergency lockout service at all hours of day and night, exactly when you need it.

                            </p>
                             <p class="mt-5 mb-3 mt-md-5 mb-md-5"><a href="<?php echo url('conway-beach-locksmith')?>"
                                    title="More on Conway Locksmith" class="button button_primary"> READ MORE
                                    <span class="d-none d-lg-inline-block">ON Conway LOCKSMITH</span><i
                                        class="fal fa-caret-right"></i></a></p> 
                    </div>

                </div>

            </div>
            <div class="col-md-7 order-1 order-md-2 k-s">
   
                <?php 
                partial('service-home');
                ?>
                    

            </div>
            <!-- k-s -->
        </div>
    </div>
    


</section>
 
<div class="row dark-bg h-sl pt-0 pb-0 overflow-hidden m-0">
    <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
        <h2 class="pt-5 pb-5 p-3 b-f text-white font-weight-bold title"> 
              View More Locksmith Services 
        </h2>

    </div>
    <div class="col-12 col-sm-6 col-md pt-lg-5 pb-lg-5 bg-white pl-lg-5">
        <h2 class="service-title b-f highlight3 font-weight-bold h3 text-capitalize mb-3 ms-lg-0 ms-3">
            Residential Locksmith
        </h2>
        <ul class="ms-lg-0 ms-3 bulletList">
            <?php
                $title = '';
                $i= 0;
                foreach ($menuData['locksmith-services']['residential-locksmith'] as $item => $data) {
                    $i++;
                    $title = str_replace('-', ' ',  $item);
                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>">
                    <h3 class="text-capitalize d-inline h4"><?php echo $title ; ?></h3>
                </a>

            </li> <?php
            }
          ?>
        </ul>
    </div>
    <div class="col-sm-6 col-md pt-lg-5 pb-lg-5 bg-white">
        <h2 class="service-title b-f highlight3 font-weight-bold h3 text-capitalize mb-3 ms-lg-0 ms-3">
            Commercial Locksmith
        </h2>
        <ul class="ms-lg-0 ms-3 bulletList">
            <?php
                $title = '';
                $i= 0;
                foreach ($menuData['locksmith-services']['commercial-locksmith'] as $item => $data) {
                    $i++;
                    $title = str_replace('-', ' ',  $item);
                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>">
                    <h3 class="text-capitalize d-inline h4"><?php echo $title ; ?></h3>
                </a>

            </li> <?php
            }
          ?>
        </ul>

        </ul>
    </div>
    <div class="col-12 col-sm-6 col-md pt-lg-5 pb-lg-5 bg-white pl-lg-5">
        <h2 class="service-title b-f highlight3 font-weight-bold h3 text-capitalize mb-3 ms-lg-0 ms-3">
            Car Locksmith
        </h2>
        <ul class="ms-lg-0 ms-3 bulletList">
            <?php
                $title = '';
                $i= 0;
                foreach ($menuData['locksmith-services']['car-locksmith'] as $item => $data) {
                    $i++;
                    $title = str_replace('-', ' ',  $item);
                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>">
                    <h3 class="text-capitalize d-inline h4"><?php echo $title ; ?></h3>
                </a>

            </li> <?php
            }
          ?>
        </ul>
    </div>
    <div class="col-12 col-sm-6 col-md pt-lg-5 pb-lg-5 bg-white pl-lg-5">
        <h2 class="service-title b-f highlight3 font-weight-bold h3 text-capitalize mb-3 ms-lg-0 ms-3">
            Emergency Locksmith
        </h2>
        <ul class="ms-lg-0 ms-3 bulletList">
            <?php
                $title = '';
                $i= 0;
                foreach ($menuData['locksmith-services']['emergency-locksmith'] as $item => $data) {
                    $i++;
                    $title = str_replace('-', ' ',  $item);
                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>">
                    <h3 class="text-capitalize d-inline h4"><?php echo $title ; ?></h3>
                </a>

            </li> <?php
            }
          ?>
        </ul>
    </div>

</div>
