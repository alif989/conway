<?php 

  function assets($asset = '') {
       return 'https://'. $_SERVER['HTTP_HOST'] . '/assets/' ;
  }

?>

<?php $count = 0; $counterHelper = 1; foreach (require ('../App/galleryDataMore.php') as $key => $values): ?>
  <?php foreach ($values as $k => $value): ?>
      <?php $count++;?>

      <?  if($count % 5 == 0 || $count == 1){ ?>
      <div class="cbp-loadMore-block<?php echo $counterHelper++?>">
      <?php }?>
        <div class="cbp-item <?php echo $key ?>">
            <a href="<?php echo assets()."img/".$value['image']."?i=1200x900/89ca22" ?>" class="cbp-caption cbp-lightbox" data-title="<?php echo $value['title']; ?>">
              <div class="cbp-caption-defaultWrap">
                  <img src="<?php echo assets()."img/".$value['image'] ?>" alt="<?php echo $value['alt']; ?>">
              </div>
              <div class="cbp-caption-activeWrap">
                  <div class="cbp-l-caption-alignCenter">
                      <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-title"><?php echo $value['title']; ?></div>
                      </div>
                  </div>
              </div>
            </a>
        </div>
      <?php if($count % 5 == 4){ ?>
      </div>

      <?php }?>
  <?php endforeach;?>

<?php endforeach;?>
