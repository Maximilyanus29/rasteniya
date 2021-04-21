$(function() {
	$('#subscribe').find('button').on('click', function() {
		
		var form = $(this).parent().parent().parent(), data = form.find('input').serialize(), btn = form.find('button');
	
		$('.text-danger, .tooltip').remove();
		
		$.ajax({
			url:'index.php?route=extension/module/uni_subscribe/add',
			type:'post',
			data:data,
			dataType:'json',
			beforeSend: function() {
				btn.button('loading');
				$('#subscribe .alert').remove();
			},
			complete: function() {
				btn.button('reset');
			},
			success: function(json) {
				if (json['error']) {
					$('#subscribe input[name="email"]').after('<span class="alert">'+json['error']+'</span>');
				}
			
				if (json['alert']) {
					$('#subscribe .subscribe-input > div').addClass('show-pass');
					$('#subscribe .subscribe-input input').attr('disabled', false);
				} else {
					$('.email, .pass').removeClass('show-pass');
				}

				if (json['success']) {
					html = '<div id="uni-subscribe-form" class="modal fade">';
					html += '<div class="modal-dialog">';
					html += '<div class="modal-content">';
					html += '<div class="modal-header">';
					html += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
					html += '<h4 class="modal-title">'+json['success_title']+'</h4>';
					html += '</div>';
					html += '<div class="modal-body">'+json['success']+'</div>';
					html += '</div>';
					html += '</div>';
					html += '</div>';
					
					$('html body').append(html);
					$('#uni-subscribe-form').modal('show');
				}
			}
		});
	});
});