document.addEventListener('DOMContentLoaded', () => {
    $('#modal-info').iziModal();


    const checkout_block = `<li class="checkout">
                                <div>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td class="text-right"><strong>Итого:</strong></td>
                                            <td class="text-right">1234 р.</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <p class="text-right">
                                        <a href="/cart" class="btn btn-primary">Оформление заказа</a>
                                    </p>
                                </div>
                            </li>`;

    const emptyCartBlock = `<li style="padding-top:0;border-top:none" class="cart_empty">
                                <p class="text-center">Ваша корзина пуста!</p>
                            </li>`;

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


        const cart__blocks = document.querySelectorAll('#cart');
        const cart__block = cart__blocks[0];
        const lItems = cart__block.querySelectorAll('.dropdown-menu li');

        let issetInSmallCard = false;

        lItems.forEach(el => {
            if (el.dataset?.id == smallCard.dataset.id){

                issetInSmallCard = true;

            }
        });

        // checkout_block


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

        if (issetInSmallCard === false){

                const ul = cart__block.querySelector('.dropdown-menu');
                ul.innerHTML = template + ul.innerHTML;

                if (ul.querySelector('.cart_empty')){
                    ul.querySelector('.cart_empty').remove();

                }

                if (!ul.querySelector('.checkout')){
                    ul.innerHTML += checkout_block;
                }

        }else{

            const ul = cart__block.querySelector('.dropdown-menu');

            let li = ul.querySelectorAll('li');

            li.forEach(ell => {
                if (ell.dataset?.id == smallCard.dataset.id){

                    console.log(ell);
                    console.log(quantity);

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

        const li = el.closest('li');

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

                console.log(li.closest('ul').querySelectorAll('.table.table-bordered .text-right')[1]);


                li.closest('ul').querySelectorAll('.table.table-bordered .text-right')[1].innerHTML = data.totalPrice + " р.";


                insertCountCart(data.count);

                // updateSecondCartWhenInHeaderLine(li.closest('#cart'));

                return true;

            }
        });

    }


    $(document).on('click keyup', '#cart', event => {
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

                let li = target.closest('li');

                $.ajax({
                    url: `/cart/remove-from-cart`,
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id : li.dataset.id,
                    },
                    success: function(data) {

                        let ul = target.closest('ul');

                        target.closest('li').remove();

                        if (ul.querySelectorAll('li').length === 1){
                            ul.innerHTML = emptyCartBlock;

                            insertCountCart(data.count);
                        }else{
                            document.querySelectorAll('.table.table-bordered .text-right')[1].innerHTML = data.totalPrice + " р.";

                            insertCountCart(data.count);
                        }



                        // updateSecondCartWhenInHeaderLine(target.closest('#cart'));


                    }
                });

            }
        }else if (target.tagName == "INPUT"){
            calculateSmallCart(target)
        }



            // fa-plus

    })

    const products = document.querySelectorAll('.product-layout');

    if (!products) return false;

    const host = location.host;

    if(host.includes('.')){
        var subdomain = location.host.split('.')[0];
    }

    //for small card begin
    const smallCardCartHandler = event => {
        let target = event.target;

        let goodCard = event.target.closest('.product-layout');

        if (target.tagName = "BUTTON"){

            target = target.closest('button');

            const action = target.dataset.action;

            const parent = target.closest('.cart');

            const good_id = parseInt(parent.dataset.id);

            const good_city_slug = target.dataset.city;

            if (good_city_slug !== subdomain){
                if (!confirm("Этот товар находится в другом городе, хотите ли заказать его?")){
                    return;
                }
            }




            $.ajax({
                url: `/cart/add-to-${action}`,
                type: 'get',
                dataType: 'json',
                data: {
                    id : good_id,
                    quantity : 1,
                },
                success: function(data) {

                    if (action == 'cart'){



                        addToCartBlock(goodCard, data.quantity, data.goodtotalPrice);


                        insertCountCart(data.count);

                        if (data.notice){
                            $('#modal-info p').html(data.notice);
                            $('#modal-info').iziModal('open');
                        }
                    }

                    return true;
                }
            });
        }
    }

    products.forEach(el => {
        el.addEventListener('click', smallCardCartHandler);
    })

    //for small card begin end


    /*For good view*/

    const button_to_cart = document.getElementById('button-cart');
    const input_quantity = document.getElementById('input-quantity');

    if (!button_to_cart) return false;

    button_to_cart.addEventListener('click', event => {
        let target = event.target;

        if (target.tagName !== "BUTTON"){
            target = target.closest('button');
        }

        const goodCard = document.getElementById('content');

        const good_city_slug = target.dataset.city;

        if (good_city_slug !== subdomain){
            if (!confirm("Этот товар находится в другом городе, хотите ли заказать его?")){
                return;
            }
        }

        $.ajax({
            url: `/cart/add-to-cart`,
            type: 'get',
            dataType: 'json',
            data: {
                id : target.dataset.id,
                quantity : input_quantity.value,
            },
            success: function(data) {

                addToCartBlock(goodCard, data.quantity, data.goodtotalPrice);

                insertCountCart(data.count);

                return true;
            }
        });
    })

    /*for good view end
    * */
});


