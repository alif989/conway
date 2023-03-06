<h4>Latest posts</h4>
<ul class="list-unstyled latest-posts">
	<?php foreach (getLatestPosts() as $latestPost) {?>
		<li class="latest-posts__item">
			<a href="<?php echo url('blog/' . $latestPost->slug) ?>" title="<?php echo $latestPost->name ?>">
				<?php if (isset($latestPost->thumbnail)) {?>
					<img src="<?php echo $latestPost->image ?>" class="img-responsive latest-posts__img" alt="<?php echo $latestPost->title ?>" title="<?php echo $latestPost->title ?>">
				<?php } else {?>
					<img src="<?php echo assets('img/no-image.png') ?>" class="img-responsive latest-posts__img" alt="<?php echo $latestPost->title ?>" />
				<?php }?>

				<div class="latest-posts__title">
					<?php echo $latestPost->title ?>
					<p class="small"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo Carbon\Carbon::parse($latestPost->created_at)->diffForHumans() ?> by <?php echo $latestPost->author->nickname ?></p>
				</div>
			</a>
		</li>
	<?php }?>
</ul>