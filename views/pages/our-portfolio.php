<?php Flight::set('innerPageBannerTitle', 'Our Portfolio')?>


<div class="container-fluid">
  
  <div class="galleryMain-slider inner mt-5">
    <div class="row">
      <div class="col-lg-10 ml-lg-auto mr-lg-auto">
        <h3 class="text-center"> Myrtle Beach Locksmith in Myrtle Beach, SC area</h3>
        <p class="text-center w-75 ml-auto mr-auto mb-4"><a href="<?php echo url('/'); ?>" title="Myrtle Beach Locksmith">Myrtle Beach Locksmith</a> maintains a team of <a href="<?php echo url('accredetd-locksmith'); ?>" title="fully certified and accredited">fully certified and accredited</a>  lock and key experts who have undergone rigorous training according to the top standards of the locksmith industry. Our team takes pride in their ability to harness their expertise to provide you with rapid, convenient, and workable solutions to lock, key, and security issues of even the highest complexity. When you work with Myrtle Beach Locksmith, your Myrtle Beach, SC property will receive the benefit of service provided by a team of the most technically talented and knowleagle lock experts throughout the entirety of the State of Florida.  Here are few projects listed below:</p>

<div class="innerGallery__carousel text-center">
		<div class="container-fluid">

			<div id="js-filters-mosaic-flat" class="cbp-l-filters-buttonCenter">
			    <div data-filter="*" class="cbp-filter-item hvr-bounce-to-right">
			        All <div class="cbp-filter-counter"></div>
			    </div>

			    <?php foreach (require ('App/galleryData.php') as $key => $value): ?>
				    <div data-filter=".<?php echo $key ?>" class="cbp-filter-item cbp-filter-item-active  hvr-bounce-to-right">
				        <?php echo str_replace("-", " ", $key) ?> <div class="cbp-filter-counter"></div>
				    </div>
					<?php endforeach;?>
			</div>

			<div id="js-grid-mosaic-flat" class="cbp cbp-l-grid-mosaic-flat">
				<?php foreach (require ('App/galleryData.php') as $key => $values): ?>
					<?php foreach ($values as $k => $value): ?>
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
					<?php endforeach;?>
				<?php endforeach;?>

			</div>
			<div id="js-grid-mosaic-flat-loadMore" class="cbp-l-loadMore-button">
		    <a href="galleryMore/loadMore.php" class="cbp-l-loadMore-link" rel="nofollow">
		      <span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
		      <span class="cbp-l-loadMore-loadingText">LOADING...</span>
		      <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
		    </a>
		  </div>
    </div>
     
        
      </div>
    </div>
  </div>
</div>