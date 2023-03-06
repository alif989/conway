
	<div class="blog-search">
		<form action="<?php echo url('blog') ?>" class="form-inline" method="GET">
		  <div class="blog-search__input">
			  <div class="input">
			  	<input type="text" class="form-control" id="search" name="search" placeholder="Search...">
			  </div>
		    
		    <button type="submit" class="button button_primary">Go</button>
		  </div>
		</form>
	</div>


	<h4>Categories</h4>
	<ul class="list-unstyled Sidebar__services">
		<?php foreach (getBlogCategories() as $category) {?>
			<li><i class="fa fa-tag" aria-hidden="true"></i>
				<a href="<?php echo url('blog/category/' . $category->slug) ?>" title="<?php echo $category->name ?>"><?php echo $category->name ?></a>
			</li>
		<?php }?>
	</ul>

	<?php partial('blog/latest-posts');?>

	<ul class="list-inline text-center blog-tags">
		<?php $tag_colors = array('default', 'primary', 'success', 'info', 'warning', 'danger');?>
		<?php foreach (getBlogTags() as $tag) {?>
			<li class="blog-tags__item">
				<a class="label label-<?php echo $tag_colors[array_rand($tag_colors, 1)] ?>" href="<?php echo url('blog/tag/' . $tag->slug) ?>" title="<?php echo $tag->name ?>"><?php echo $tag->name ?></a>
			</li>
		<?php }?>
	</ul>


