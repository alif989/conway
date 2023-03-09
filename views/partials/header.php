<?php $menuData = include 'App/menuData.php';  ?>
<header id="mainHeader" class="header">

<div class="d-flex flex-row c-links flex-nowrap align-items-center justify-content-end header-top nav-font mr-3 mt-2 mb-2"> 
 
<a class="mr-lg-1 mr-xl-2 pl-2 pr-2 cw nav-font d-none d-lg" href="<?php echo url('services/commercial-locksmith');?>" title="Commercial Locksmith">
 LOCKSMIHTH CONWAY  
</a>

<a class="mr-lg-1 mr-xl-2 pl-2 pr-2 cw nav-font" href="<?php echo url('services/emergency-locksmith');?>" title="Emergency Locksmith">
 EMERGENCY LOCKSMITH  
</a>
<a class="mr-lg-1 mr-xl-2 pl-2 pr-2 cw nav-font d-xl" href="<?php echo url('services/residential-locksmith');?>" title="Residential Locksmith">
        RESIDENTIAL LOCKSMIHTH 
</a>
<!-- <a class="mr-lg-1 mr-xl-2 pl-2 pr-2 cw nav-font d-xl" href="<?php echo url('services/commercial-locksmith');?>" title="Commercial Locksmith">
RESIDENTIAL LOCKSMIHTH 
</a> -->
<a class="mr-lg-1 mr-xl-2 pl-2 pr-2 cw nav-font d-xl" href="<?php echo url('services/car-locksmith');?>" title="Car Locksmith">
CAR LOCKSMIHTH 
</a> 

<a  title="Call Now" class="phone-link cw"  onclick="return gtag_report_conversion('tel:<?php echo phone(true, false)?>');"  href="tel:<?php echo phone(true, false)?>"><i class="fal fa-phone"></i> <?php echo phone(true, false)?></a> 
        
    </div>

    <nav class="navbar navbar-expand-lg pt-lg-0 pt-sm-0 pl-0 pr-0 pb-lg-2">
        <div class="d-flex d-lg-none header-phoneMob">
            <a href="#" class="button col-6 text-uppercase  pt-2 pb-2 light-font text-white" data-toggle="modal" data-target="#quote-popup">Get A Quote</a>
            <a title="Call Now" onclick="return gtag_report_conversion('tel:<?php echo phone(true, false)?>');"   href="tel:<?php echo phone(true, false)?>" class="col-6 pt-2 pb-2 light-font text-white size-3"><i class="fal fa-phone"></i> <?php echo phone(true, false)?></a>
        </div>
    <!-- <div class="placeholder col d-lg-none d-none d-sm-none d-xl-block pt-2 pb-2 align-self-end text-uppercase border-0 border-right-0 border-left-0">
      <span class="invisible">placeh</span>
    </div> -->
        <a class="navbar-brand align-self-center pb-0 ml-3 mb-0" title="Conway Locksmith - Best Locksmith in Conway, SC" href="<?php echo url('/')?>">
            <img src="<?php echo assets('img/logo.png')?>" width="260" height="auto" class="img-fluid" alt="Conway Locksmith - Best Locksmith in Conway, SC">
        </a>
        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <div class="collapse navbar-collapse no-gutters align-items-center justify-content-center mr-1 mt-3" id="navbarSupportedContent">
            <ul class="navbar-nav col text-uppercase justify-content-end align-items-center"> 
                <li class="nav-item border-0 border-left-0 text-center dropdown custom-dropdown">
                    <a class="nav-link" href="#"
                        title="About Our Locksmith Company">About <i class="fal fa-angle-down"></i></a>
                        <ul class="dropdown-menu animated fadeIn">
                        <?php
                         $title = '';
                                foreach ($menuData['our-locksmith-company']  as $item => $data) {
                                $title = ucwords(str_replace('-', ' ',  $item));
                                ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a>
                                    </li> <?php
                            }
                      ?>
                    </ul>
                </li>
                <li class="nav-item border-0 border-left-0 text-center dropdown custom-dropdown">
                    <a class="nav-link" href="#">
                       
                        <span class="d-sm-xl">Locksmith </span>  Services  
                        <i class="fal fa-angle-down"></i></a>
                    <div class="dropdown-menu animated fadeIn nav-services">
                        <div class="row">
                            <div class="col">
                                <h3 class="mt-3 pl-3 lead cw">Residential Locksmith</h3>
                                <ul>
                                <?php
                                    $title = '';
                                    $i= 0;
                                    foreach ($menuData['locksmith-services']['residential-locksmith'] as $item => $data) {
                                            $i++;
                                    $title = str_replace('-', ' ',  $item);
                                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a>     </li> <?php
                                    }
                                ?>
                                </ul>
                            </div>
                            <div class="col">
                            <h3 class="mt-3 pl-3 lead cw">Car Locksmith</h3>
                                <ul>
                                <?php
                                    $title = '';
                                    $i= 0;
                                    foreach ($menuData['locksmith-services']['car-locksmith'] as $item => $data) {
                                            $i++;
                                    $title = str_replace('-', ' ',  $item);
                                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a>     </li> <?php
                                    }
                                ?>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                <h3 class="mt-3 pl-3 lead cw">Commercial Locksmith</h3>
                                <?php
                                    $title = '';
                                    $i= 0;
                                    foreach ($menuData['locksmith-services']['commercial-locksmith'] as $item => $data) {
                                            $i++;
                                    $title = str_replace('-', ' ',  $item);
                                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a>     </li> <?php
                                    }
                                ?>
                                </ul>
                            </div>
                            <div class="col">
                            <h3 class="mt-3 pl-3 lead cw">Emergency Locksmith</h3>
                                <ul>
                                <?php
                                    $title = '';
                                    $i= 0;
                                    foreach ($menuData['locksmith-services']['emergency-locksmith'] as $item => $data) {
                                            $i++;
                                    $title = str_replace('-', ' ',  $item);
                                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a>     </li> <?php
                                    }
                                ?>
                                </ul>
                            </div>
                        </div>
                     </div>
                </li>
                <li class="nav-item border-0 border-left-0 text-center d-xl">
                    <a class="nav-link" href="<?php echo url('conway-beach-locksmith')?>"
                        title="Conway Locksmith">Conway Beach Locksmith</a>
                        
                </li> 
                <li class="nav-item border-0 border-left-0 text-center dropdown custom-dropdown">
                    <a class="nav-link" href="#" title="Products">Products <i class="fal fa-angle-down"></i></a>
                    <ul class="dropdown-menu animated fadeIn">
                        <?php
                        $title = '';
                            foreach ($menuData['products']  as $item => $data) {
                            $title = str_replace('-', ' ',  $item);
                            ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a>
                                </li> <?php
                        }
                     ?>
                 </ul>
                </li>
                 <li class="nav-item border-0 border-left-0 text-center">
                    <a class="nav-link" href="<?php echo url('blog')?>" title="Blog">Blog</a>
                </li>  
              
                <!-- <li class="nav-item border-0 border-left-0 text-center dropdown custom-dropdown">
                    <a class="nav-link" href="#" title="Service Areas">Service Areas <i class="fal fa-angle-down"></i></a>
                    
                        <div class="row">
                            <div class="col">
                            <ul class="dropdown-menu animated fadeIn">
                                <?php
                                $title = '';
                                    foreach ($menuData['service-areas']  as $item => $data) {
                                    $title = str_replace('-', ' ',  $item);
                                    ?><li><a href="<?php echo url($data)?>" title="<?php echo $title ; ?>"><?php echo $title ; ?></a>
                                        </li> <?php
                                }
                            ?>
                        </ul>
                            </div>
                        </div> 
                   
                  
                </li>  -->
        
                <li class="nav-item border-0 border-left-0 text-center">
                    <a class="nav-link" href="<?php echo url('customer-reviews')?>" title="Customer Reviews">Reviews</a>
                </li>
                <li class="nav-item border-0 border-left-0 text-center">
                    <a class="nav-link" href="<?php echo url('our-portfolio')?>" title="Portfolio">Portfolio</a>
                </li>
                <li class="nav-item border-0 border-left-0 text-center">
                    <a class="nav-link" href="<?php echo url('contact')?>" title="Contact">Contact</a>
                </li> 
                <li  class="nav-item border-0 border-left-0 text-center">
                <a href="#" title="FREE ESTIMATE" class="button button_primary cta_button" data-toggle="modal" data-target="#quote-popup">  GET A QUOTE </a>
                </li>
                
                 
                
            </ul>
             
        </div>
    </nav>
</header>