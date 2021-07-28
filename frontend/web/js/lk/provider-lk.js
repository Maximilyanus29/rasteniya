document.addEventListener('DOMContentLoaded', () => {

    document.addEventListener('change', evt => {

        if (evt.target.tagName === "SELECT"){

            evt.target.style.background = "black";

            $.ajax({
                url: '/provider/default/change-order-status',
                type: 'GET',
                data: {
                    id : evt.target.dataset.id,
                    status : evt.target.value,
                },
                success: function(res){
                    if (res.status == true) evt.target.style.background = "none";
                },
                error: function(){
                    evt.target.style.background = "red";
                }
            });


        }
    });
    /*personal cabinet end*/

})


