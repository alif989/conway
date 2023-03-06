<section class="innerPage">
	<?php partial('innerPageBanner')?>

	<div class="container">

		<div class="row">

			<!-- <div class="col-xs-12">
				<//?php echo Flight::breadcrumb(); ?>
			</div>
 -->
			<div class="col-sm-9 innerPage__content blog-wrapper">

				<main>

					<?php echo $body_content; ?>

				</main>

			</div>

			<div class="col-sm-3 innerPage__sidebar">

				<aside>

					<?php partial('blog/sidebar')?>

				</aside>

			</div>

		</div>

	</div>

</section>