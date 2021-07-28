

$(document).ready(function() {
    $('.js-example-basic-single').select2({
        ajax: {
            url: '/test/city-autocomplete',
        }
    });







    let auto = document.getElementById('auto');

    auto.addEventListener('input', evt => {
        let value = evt.target.value;


        $.ajax({
            url: '/test/sphinx',
            type: 'get',
            data: {
                data: value
            },
            success: function(res){
                console.log(res);
            },
            error: function(){
                // alert('Error!');
            }
        });

    })





});



