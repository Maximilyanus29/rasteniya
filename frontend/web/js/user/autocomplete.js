

$.ajax({
    url: "test.html",
    context: document.body,
    success: function(){
        $(this).addClass("done");
    }
});



const hiddenCityInput = document.getElementById('provider-city_id');
const city = document.getElementById('city');


$( ".for-off-autocomplete-chrome" ).on('click', (e) => {
    city.focus();
})


$( "#city" ).autocomplete({
    source: function(request, response){
        // организуем кроссдоменный запрос
        $.ajax({
            url: "/common/city-autocomplete",
            dataType: "json",
            // параметры запроса, передаваемые на сервер (последний - подстрока для поиска):
            data:{
                featureClass: "P",
                style: "full",
                maxRows: 12,
                name: request.term
            },
            // обработка успешного выполнения запроса
            success: function(data){

                // приведем полученные данные к необходимому формату и передадим в предоставленную функцию response
                response($.map(data, function(item){
                    hiddenCityInput.value = item.id;
                    return{
                        label: item.name ,
                        value: item.name
                    }
                }));


            }
        });
    },
    minLength: 2
});
