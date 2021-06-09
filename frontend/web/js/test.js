

$(document).ready(function() {
    $('.js-example-basic-single').select2({
        ajax: {
            url: '/test/city-autocomplete',
        }
    });
});


