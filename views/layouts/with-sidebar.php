<section class="innerPage">

	<?php partial('innerPageBanner')?>

	<div class="container">

	
    <?php partial('breadcrumb'); ?>
	

		<div class="row">

			<div class="col-sm-3 innerPage__sidebar">

				<aside>

					<?php partial('sidebar')?>

				</aside>

			</div>

			<div class="col-sm-9 innerPage__content">

				<main>

					<?php echo $body_content; ?>

				</main>

			</div>

		</div>

	</div>

</section>