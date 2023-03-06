<section class="section g-h pb-0">

 <a href="<?php echo('our-portfolio'); ?>" class="text-white" title="Our Portfolio"><h2 class="size-2 text-capitalize b-f font-weight-bold cw mb-4 text-center"> PORTFOLIO</h2></a>


    <div class="container-fluid custom-fluid">
    <div id="js-filters-mosaic-flat-home" class="cbp-l-filters-buttonCenter">

        <?php foreach (require ('App/homeGalleryData.php') as $key => $value): ?>
        <div data-filter=".<?php echo $key ?>" class="cbp-filter-item cbp-filter-item-active  hvr-bounce-to-right">
            <?php echo str_replace("-", " ", $key) ?> <div class="cbp-filter-counter"></div>
        </div>
        <?php endforeach;?>
    </div>

    <div id="js-grid-mosaic-flat-home" class="cbp cbp-l-grid-mosaic-flat">
        <?php foreach (require ('App/homeGalleryData.php') as $key => $values): ?>
        <?php foreach ($values as $k => $value): ?>
        <div class="cbp-item <?php echo $key ?>">

            <?php 
                if(isset($value['video'])){
                    $item_link =  $value['video'];
                }else{
                    $item_link =  assets()."img/".$value['image']."?i=1200x900/89ca22";
                } 
                ?>

            <a href="<?php echo $item_link; ?>" class="cbp-caption cbp-lightbox"
                data-title="<?php echo $value['title']; ?>">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo assets()."img/".$value['image'] ?>" alt="<?php echo $value['alt']; ?>">
                    <?php 
                                if(!empty($value['video'])){
                                    echo '<i class="fa-3x fal fa-play-circle position-absolute"></i>';
                                } 
                                ?>
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
        <?php endforeach;?>
        <?php endforeach;?>

    </div>

    </div>
    </div>

</section>