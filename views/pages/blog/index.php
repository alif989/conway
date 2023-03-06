<?php Flight::set('innerPageBannerTitle', 'Blog')?>

<?php if (count($posts)) {?>
<ul class="blog-list list-unstyled">

<?php foreach ($posts as $post) {?>

<li>
	<div class="blog-content">
		<?php if (isset($post->thumbnail)) {?>
			<a href="<?php echo url('blog/' . $post->slug) ?>" title="<?php echo $post->title ?>">
				<img src="<?php echo $post->image ?>" class="blog-content__post-image img-responsive" alt="<?php echo $post->title ?>" title="<?php echo $post->title ?>">
			</a>
		<?php }?>
		<h3 class="blog-content__post-title"><a href="<?php echo url('blog/' . $post->slug) ?>" title="<?php echo $post->title ?>"><?php echo $post->title ?></a></h3>

		<p><?php echo $post->excerpt ?></p>

		<ul class="list-inline small blog-content__post-meta">
			<li><i class="fa fa-clock-o" aria-hidden="true"></i> Published: <?php echo Carbon\Carbon::parse($post->created_at)->diffForHumans() ?></li>
			<li><i class="fa fa-user" aria-hidden="true"></i> Author: <?php echo $post->author->nickname ?></li>

			<?php if (Flight::get('useWPcommnets') === true && $post->comment_status == 'open') {?>
				<li><i class="fa fa-comments" aria-hidden="true"></i> Comments: <?php echo $post->comment_count ? $post->comment_count : 0 ?></li>
			<?php }?>
		</ul>
	</div>
</li>

<?php }?>

</ul>
	<?php echo partial('blog/pagination', array('paginator' => $posts->appends($_GET), 'elements' => $elements)); ?>
<?php } else {?>

<div class="alert alert-info"><b>Sorry:</b> No posts found</div>

<?php }?>


