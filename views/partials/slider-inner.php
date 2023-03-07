<?php
    $pageName = 'conway-beach-locksmith';
    $pageName = pageName();  
    // echo $pageName;
    
    $image_caption = "Locksmith Service";
    $image =  "about/home-lockout.jpg"; 
    $meta = include 'App/innerSliderData.php';
   //var_dump($meta[$pageName]);

   if ( $pageName == 'locked-out-of-house')  $pageName = 'home-lockout'; 
   if ( $pageName == 'locked-out-of-business')  $pageName = 'office-lockout'; 


  // if (  strpos($_SERVER['REQUEST_URI'], 'service-areas')  !== false) {
  //   $pageName = 'myrtle-beach-locksmith'; 
  // } 
  if (!array_key_exists($pageName,$meta)) {
    $pageName = 'conway-beach-locksmith'; 
  }
 

?> 
<!-- slider -->
<div class="col-sm-12 col-md-6 col-lg-7 about-carousel owl-carousel float-sm-none float-md-right">
  <?php
   
  if (array_key_exists($pageName,$meta)) {

      foreach ( $meta[$pageName]['items']  as $item => $data) { 
        $title = $data['title'];
        $caption = $data['alt'];
        $image = $data['image']; 
       
     ?>        
      <div class="item">
          <figure>
            <img src="<?php echo assets('img/'. $image );?>"  width="768" height="auto"
                alt="<?php echo $caption; ?>" title="<?php echo $title; ?>" />
            <figcaption><?php echo $caption; ?></figcaption>
        </figure> 
      </div> 
    <?php  }  ?>
<?php  } ?> 
</div>