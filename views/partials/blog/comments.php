<?php if (Flight::get('useWPcommnets') === true && $commentsStatus == 'open') {?>

	<hr />

	<h4 class="text-center">Leave a comment</h4>


	<form action="<?php echo url('blog/comment/add/' . $post_id) ?>" id="theForm" class="comment__form">

	<div class="row">

	  <div class="form-group col-sm-6">
	  	<div class="input">
			<input type="text" name="name" placeholder="Name" class="form-control">
		</div>
	  </div>

	  <div class="form-group col-sm-6">
	  	<div class="input">
			<input type="email" name="email" placeholder="Email" class="form-control">
		</div>
	  </div>

	 </div>


	  <div class="form-group">
	  	<div class="input">
			<textarea name="comment" placeholder="Comment..." class="form-control"></textarea>
		</div>
	  </div>

	<button type="submit" data-loading-text="Loading..." id="submitBtn" class="button button_primary">Submit</button>

	</form>

	<div class="blog-comments" id="<?php echo $post_id ?>">

		<?php if (count($comments)) {?>
			<h3>Comments</h3>
			<hr />
		<?php }?>

		<ul class="list-unstyled blog-comments__list">

		<?php if (count($comments)) {?>

			<?php foreach ($comments as $comment) {?>
				<li>
					<div class='comment__content'>
					<div class='blog__comment__author'>
					<b><i class="fa fa-comment"></i> <?php echo htmlspecialchars($comment->comment_author) ?></b> replied <?php echo Carbon\Carbon::parse($comment->comment_date)->diffForHumans() ?></div>
					<p>"<?php echo htmlspecialchars($comment->comment_content) ?>"</p>
					</div>
				</li>
			<?php }?>


		</ul>

		<?php echo partial('blog/pagination', array('paginator' => $comments->appends($_GET), 'elements' => $elements)); ?>

		<?php }?>

	</div>

<?php }?>