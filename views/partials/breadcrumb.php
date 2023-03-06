<?php $menuData = include 'App/menuData.php';  ?>
<?php  
      $link = $_SERVER['REQUEST_URI'];  
      $link_array = explode('/',$link);
      //$pageurl = end($link_array); 
       $pageurl =  pageName();

      if(array_key_exists($pageurl, $menuData['our-locksmith-company'])){        
        if($pageurl !== 'our-locksmith-company'){
            Flight::breadcrumb()->add('Our Company' ,  'our-locksmith-company');  
        }
      } 
      if( array_key_exists($pageurl, $menuData['locksmith-services']['residential-locksmith'] ) ||
          array_key_exists($pageurl, $menuData['locksmith-services']['car-locksmith'] ) ||
          array_key_exists($pageurl, $menuData['locksmith-services']['commercial-locksmith'] ) ||
          array_key_exists($pageurl, $menuData['locksmith-services']['emergency-locksmith'] )        
        ){        
        if($pageurl !== 'locksmith-services'){
            Flight::breadcrumb()->add('Locksmith Services' ,  'services');  
        }
      }
      if(array_key_exists($pageurl, $menuData['products'])){        
        if($pageurl !== 'products'){
            Flight::breadcrumb()->add('Products' ,  'products');  
        }
      }
    Flight::breadcrumb()->add( Flight::get('innerPageBannerTitle') ,  Flight::get('innerPageBannerTitle') ); 
  ?>
  <div class="row  no-gutters mt-5 mb-3">
    <div class="col-sm-12">
    <div class="breadcrumb text-left list-inline p-0 mb-0">						 
        <?php  echo Flight::breadcrumb();  ?>
      </div>
    </div>
  </div>
