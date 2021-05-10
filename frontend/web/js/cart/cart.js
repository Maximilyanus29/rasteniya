document.addEventListener('DOMContentLoaded', () => {

    let smallCartBlockBuffer = null;

    const updateSecondCartWhenInHeaderLine = (block) => {



        const cart__blocks = document.querySelectorAll('#cart');

        setTimeout(()=> {
            const cart__blocks_open = document.querySelector('#cart.open');

            cart__blocks.forEach(el => {
                el.innerHTML = cart__blocks_open.innerHTML;
            });
        },1100)










    };

    const addToCartBlock = (smallCard, quantity, goodtotalPrice) => {


        const cart__blocks = document.querySelectorAll('#unicart');
        const cart__block = cart__blocks[0];
        const lItems = cart__block.querySelectorAll('tr');

        let issetInSmallCard = false;

        lItems.forEach(el => {
            if (el.dataset?.id == smallCard.dataset.id){

                issetInSmallCard = true;

            }
        });


        const good_id = smallCard.querySelector('[data-id]');
        const good_desc = smallCard.querySelector('[data-desc]').innerHTML;
        const good_href = smallCard.querySelector('[data-href]');
        const good_name = smallCard.querySelector('[data-name]').innerHTML;
        const good_price = smallCard.querySelector('[data-price]').innerHTML;
        const good_img = smallCard.querySelector('[data-img]');


        const template = `
            <li data-id="${good_id.dataset.id}">
                <table class="cart table table-striped">
                    <tbody><tr>
                        <td class="image">
                            <a href="${good_href.getAttribute('href')}">
                            <img src="${good_img.getAttribute('src')}" alt="${good_name}" title="${good_name}" class="img-thumbnail"></a>
                        </td>
                        <td class="name text-left">
                            <a href="${good_href.getAttribute('href')}">${good_name} </a>
                            <br>- <small>${good_desc.substr(0, 25) + "..."}</small>
                        </td>
                        <td class="quantity text-right">
                            <div class="input-group" style="max-width:100px;">
            
                                <input type="text" name="quantity[${quantity}]" value="${quantity}" size="1" class="form-control">
            
                                <span>
            
                                <i class="fa fa-plus btn btn-default"></i>
                                <i class="fa fa-minus btn btn-default"></i>
            
                            </span>
                            </div>
                        </td>
            
                        <td class="total text-right">${parseInt(good_price * quantity)} р.</td>
            
                        <td class="remove text-center">
                            <button type="button" title="Удалить">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </li>
        `;

        if (issetInSmallCard == false){

            const ul = cart__block.querySelector('.dropdown-menu');
            ul.innerHTML = template + ul.innerHTML

        }else{

            const ul = cart__block.querySelector('.dropdown-menu');

            let li = ul.querySelectorAll('li');

            li.forEach(ell => {
                if (ell.dataset?.id == smallCard.dataset.id){
                    ell.querySelector('input').value = quantity;
                    let elPrice__block = ell.querySelector('.total.text-right')
                    elPrice__block.innerHTML =  parseInt(goodtotalPrice);
                }
            })
        }

        // updateSecondCartWhenInHeaderLine(cart__block);

    };


    const insertCountCart = quantity => {
        const cart_count_span = document.querySelectorAll('#cart-total');

        cart_count_span.forEach(el => {
            el.innerHTML = quantity;
        })
    }


    const calculateSmallCart = el => {

        const li = el.closest('tr');

        const input = li.querySelector('input');

        const id = li.dataset?.id;


        $.ajax({
            url: `/cart/set-quantity-to-cart`,
            type: 'get',
            dataType: 'json',
            data: {
                id : id,
                quantity : input.value,
            },
            success: function(data) {

                console.log(data.goodtotalPrice)

                li.querySelector('.total.text-right').innerHTML = data.goodtotalPrice + " р.";

                let deliveryPrice = document.querySelectorAll(".delivery td");

                let totalPrice = document.querySelectorAll(".total_table .total td");

                let totaltotalPrice = document.querySelector("#totatotalsum");

                // deliveryPrice[deliveryPrice.length-1].innerHTML = data.totalPrice + " р.";
                totalPrice[totalPrice.length-1].innerHTML = data.totalPrice + " р.";
                totaltotalPrice.innerHTML = data.totalPrice + " р.";



                insertCountCart(data.count);

                // updateSecondCartWhenInHeaderLine(li.closest('#cart'));

                return true;

            }
        });

    }


    $(document).on('click keyup', '#unicart', event => {
        event.stopPropagation();
        let target = event.target;
        const product__block = event.target.closest('tr');
        const quantity = product__block.querySelector('input');



        if (target.tagName == "I"){


            if (target.classList.contains('fa-plus')){

                quantity.value = parseInt(quantity.value) + 1;

                calculateSmallCart(target)

            }else if (target.classList.contains('fa-minus')){
                if (quantity.value == 1) return;
                quantity.value -= 1;

                calculateSmallCart(target)

            }else if (target.classList.contains('fa-times')){

                console.log('delete')

                $.ajax({
                    url: `/cart/remove-from-cart`,
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id : product__block.dataset.id,
                    },
                    success: function(data) {

                        product__block.remove();

                        document.querySelectorAll('.table.table-bordered .text-right')[1].innerHTML = data.totalPrice + " р.";

                        insertCountCart(data.count);

                        let deliveryPrice = document.querySelectorAll(".delivery td");
                        let totalPrice = document.querySelectorAll(".total_table .total td");

                        let totaltotalPrice = document.querySelector("#totatotalsum");

                        // deliveryPrice[deliveryPrice.length-1].innerHTML = data.totalPrice + " р.";
                        totalPrice[totalPrice.length-1].innerHTML = data.totalPrice + " р.";
                        totaltotalPrice.innerHTML = data.totalPrice + " р.";


                    }
                });

            }
        }else if (target.tagName == "INPUT"){
            calculateSmallCart(target)
        }



        // fa-plus

    })


});


