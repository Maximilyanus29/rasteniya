
$('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
    $.ajax({
        url: 'index.php?route=product/product/getRecurringDescription',
        type: 'post',
        data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
        dataType: 'json',
        beforeSend: function() {
            $('#recurring-description').html('');
        },
        success: function(json) {
            $('.alert-dismissible, .text-danger').remove();

            if (json['success']) {
                $('#recurring-description').html(json['success']);
            }
        }
    });
});


$('button[id^=\'button-upload\']').on('click', function() {
    var node = this;

    $('#form-upload').remove();

    $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

    $('#form-upload input[name=\'file\']').trigger('click');

    if (typeof timer != 'undefined') {
        clearInterval(timer);
    }

    timer = setInterval(function() {
        if ($('#form-upload input[name=\'file\']').val() != '') {
            clearInterval(timer);

            $.ajax({
                url: 'index.php?route=tool/upload',
                type: 'post',
                dataType: 'json',
                data: new FormData($('#form-upload')[0]),
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(node).button('loading');
                },
                complete: function() {
                    $(node).button('reset');
                },
                success: function(json) {
                    $('.text-danger').remove();

                    if (json['error']) {
                        $(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
                    }

                    if (json['success']) {
                        alert(json['success']);

                        $(node).parent().find('input').val(json['code']);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    }, 500);
});

    $('#review').delegate('.pagination a', 'click', function(e) {
        e.preventDefault();

        $('#review').fadeOut('slow');

        $('#review').load(this.href);

        $('#review').fadeIn('slow');
    });

$('#review').load('index.php?route=product/product/review&product_id={{ product_id }}');

$('#button-review').on('click', function() {
    $.ajax({
        url: 'index.php?route=product/product/write&product_id={{ product_id }}',
        type: 'post',
        dataType: 'json',
        data: $("#form-review").serialize(),
        beforeSend: function() {
            $('#button-review').button('loading');
        },
        complete: function() {
            $('#button-review').button('reset');
        },
        success: function(json) {
            $('.alert-dismissible').remove();

            if (json['error']) {
                $('#review').after('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
            }

            if (json['success']) {
                $('#review').after('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

                $('input[name=\'name\']').val('');
                $('textarea[name=\'text\']').val('');
                $('input[name=\'rating\']:checked').prop('checked', false);
            }
        }
    });
});
/*

$(document).ready(function() {
    $('.thumbnails').magnificPopup({
        type:'image',
        delegate: 'a',
        gallery: {
            enabled: true
        }
    });
});
*/



//
// document.addEventListener('DOMContentLoaded', () => {
//
//     const button_to_cart = document.getElementById('button-cart');
//     const input_quantity = document.getElementById('input-quantity');
//
//     console.log(button_to_cart);
//
//     button_to_cart.addEventListener('click', event => {
//         let target = event.target;
//
//         if (target.tagName !== "BUTTON"){
//             target = target.closest('button');
//         }
//
//         console.log(target)
//         console.log(target.dataset.id)
//
//
//
//
//         $.ajax({
//             url: `/cart/add-to-cart`,
//             type: 'get',
//             dataType: 'json',
//             data: {
//                 id : target.dataset.id,
//                 quantity : input_quantity.value,
//             },
//             success: function(data) {
//
//
//
//
//                 return true;
//
//             }
//         });
//
//     })
//
//
//
// });
//

