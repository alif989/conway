<section class="innerPage">

  <?php partial('innerPageBanner')?>

   
  <?php partial('special-inner-links')?>

   <div class="container">
 

    <?php partial('breadcrumb'); ?>

    <div class="row">

      <div class="col-lg-3 innerPage-sidebar pt-4 order-2 order-lg-1">

        <aside>

          <?php partial('sidebar')?>

        </aside>

      </div>

      <div class="col-lg-9 innerPage-content pt-4 order-1 order-lg-2">

        <main>

          <?php echo $body_content; ?>

        </main>

      </div>
  


    </div>

  </div>

</section>

<?php partial('review-home')?> 