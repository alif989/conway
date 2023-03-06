 $(function() {
 	/* Getting blog post commnets */
	loadComments();

	$(document).on('click','#loadMoreComments',function(){
		var page_next = parseInt($(this).attr('page'))+1;
		loadComments(page_next);
		console.log(page_next);
		$(this).attr('page',page_next);
	});
});



function loadComments(page = 1) {

	if ($('.blog__commnets').length) {

 	$('.blog__commnets').append('<h4 id="comment_loader" class="text-center"><i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i><span>Loading...</span></h4>');

 	var post_id = $('.blog__commnets').attr('id');

	var url = ajaxurl + "blog/comments/" + post_id + "/page/" + page;

	$('.blog__commnets #loadMoreComments').hide();

		$.ajax({

			type: 'GET',
			url: url,

			success: function(response) {

				console.log(response.totalPages);

				if (response.data.length == 0) {

					if (page == 1) {
						$('.blog__commnets').append('<div class="text-center alert alert-info">This post does not have any comments yet...</div>');
					}

				} else {

					if (response.totalPages > page) {
						$('.blog__commnets #loadMoreComments').show();
					}


					$.each( response.data, function( key, val ) {

						var comment = "<li><img src='" + val.avatar + "' class='img-circle post_comment_avatar pull-left'><div class='comment__content'><div class='blog_comment_author'><b>" + val.author + "</b> replied " + val.date + "</div>" + val.body + "</div></li>";

						$('.blog__commnets ul').append(comment);
				
					});

				}

				$('.blog__commnets #comment_loader').remove();

			},

			error: function() {

				$('.blog__commnets #comment_loader').remove();

				$('.blog__commnets').prepend('<div class="text-center alert alert-danger"><b>Error!</b> We could not retrieve blog comments</div>');
			}

		});

 	}



}