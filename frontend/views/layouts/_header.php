<?php

$cart = Yii::$app->cart;


?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div id="logo">
                    <a href="/"><img src="/images/_без названия.png" title="Voodland.com"
                                                        alt="Voodland.com" class="img-responsive"></a>
                </div>
            </div>
            <div class="col-xs-9 col-sm-4 col-md-3 col-md-push-5">
                <div id="phone">
                    <div class="phone dropdown-toggle pull-right" data-toggle="dropdown">
                        <div><i class="fa fa-phone"></i> <span>8(930)086-74-11</span> <i
                                    class="fa fa-chevron-down hidden-xs"></i></div>
                        <div>Ежедневно, с 10:00 до 20:00</div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="tel:+7930086-74-11">
                                <i class="fa fa-phone"></i>
                                <span>+7930086-74-11</span>
                            </a>
                        </li>
                        <li>
                            <a href="whatsapp://send?phone=+79300867411">
                                <i class="fab fa-whatsapp"></i>
                                <span>+79300867411</span>
                            </a>
                        </li>
                        <li>
                            <a href="viber://chat?number=+79300867411">
                                <i class="fab fa-viber"></i>
                                <span>+79300867411</span>
                            </a>
                        </li>
                        <li class="text">
                            <hr style="margin-top:5px;">
                            <p>Напишите нам!</p></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-1 col-md-push-5">
                <div id="cart" class="btn-group pull-right ">
                    <button type="button" data-toggle="dropdown" data-loading-text="Загрузка..."
                            class="btn dropdown-toggle"><i class="fa fa-shopping-basket"></i> <span
                                id="cart-total"><?= $cart->getTotalCount() ?></span></button>

                    <ul class="dropdown-menu pull-right">
                        <?php if ($cart->getTotalCount() > 0 ) : ?>
                            <?php foreach ($cart->getItemIds() as $item) :
                                $item = $cart->getItem($item);
                                $product = $item->getProduct()
                                ?>
                                <li data-id="<?= $product->id ?>">
                                    <table class="cart table table-striped">
                                        <tbody>
                                        <tr>
                                            <td class="image">
                                                <a href="/good/<?= $product->provider->slug ?>/<?= $product->slug ?>">
                                                    <img src="<?= $product->getImage()->getUrl('40x40') ?>" alt="<?= $product->name ?>"
                                                         title="<?= $product->name ?>"
                                                         class="img-thumbnail">
                                                </a>
                                            </td>
                                            <td class="name text-left">
                                                <a href="/good/<?= $product->provider->slug ?>/<?= $product->slug ?>"><?= $product->name ?></a>
                                                <br>- <small><?= substr($product->description,0, 18)  ?></small>
                                            </td>
                                            <td class="quantity text-right">
                                                <div class="input-group" style="max-width:100px;">

                                                    <input type="text"
                                                           name="quantity[<?= $product->id ?>]"
                                                           value="<?= $item->getQuantity() ?>"

                                                           size="1"
                                                           class="form-control">

                                                    <span>

                                                    <i class="fa fa-plus btn btn-default"></i>
                                                    <i class="fa fa-minus btn btn-default"></i>

                                                </span>
                                                </div>
                                            </td>

                                            <td class="total text-right"><?= $item->getCost(true) ?> р.</td>

                                            <td class="remove text-center">
                                                <button type="button"
                                                        title="Удалить">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>

                            <?php endforeach;?>

                            <li class="checkout">
                                <div>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td class="text-right"><strong>Итого:</strong></td>
                                            <td class="text-right"><?= $cart->getTotalCost(true) ?>р.</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <p class="text-right">
                                        <a href="/cart" class="btn btn-primary">Оформление заказа</a>
                                    </p>
                                </div>
                            </li>

                        <?php else: ?>
                            <li style="padding-top:0;border-top:none" class="cart_empty">
                                <p class="text-center">Ваша корзина пуста!</p>
                            </li>
                        <?php endif; ?>

                    </ul>
                    <script>
                        function p_array() {
                        }

                        function replace_button(product_id, options) {
                            $('.' + product_id).html('<i class="" aria-hidden="true"></i> <span class="hidden-sm">В корзине</span>').addClass('in_cart');
                        }

                        function return_button(product_id) {
                            $('.' + product_id).html('<i class="fa fa-shopping-basket" aria-hidden="true"></i> <span class="hidden-sm">В корзину</span>').removeClass('in_cart');
                        }

                        $(document).ready(function () {
                            p_array();
                        });
                    </script>
                </div>
            </div>
            <div id="div_search" class="col-xs-12 col-sm-6 col-md-4 col-lg-5 hidden-sm col-md-pull-4">
                <div id="search" class="search_form input-group se">
                    <input type="hidden" name="filter_category_id" value="">
                    <div class="cat_id input-group-btn">
<!--                        <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">-->
<!--                            <span>Везде</span><i class="fa fa-chevron-down"></i>-->
<!--                        </button>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li data-id=""><a>Везде</a></li>-->
<!--                            <li data-id="188"><a>Для выращивания растений</a></li>-->
<!--                            <li data-id="20"><a>Хвойные деревья</a></li>-->
<!--                            <li data-id="18"><a>Лиственные деревья</a></li>-->
<!--                            <li data-id="164"><a>Хвойные кустарники</a></li>-->
<!--                            <li data-id="25"><a>Лиственные кустарники</a></li>-->
<!--                            <li data-id="57"><a>Плодовые растения</a></li>-->
<!--                            <li data-id="166"><a>Растения для доращивания</a></li>-->
<!--                            <li data-id="33"><a>Розы</a></li>-->
<!--                            <li data-id="34"><a>Уход за растениями</a></li>-->
<!--                        </ul>-->
                    </div>
                    <input type="text" name="search" value="" placeholder="Поиск" class="form-control input-lg"
                           autocomplete="off">
                    <span class="input-group-btn">
		<button type="button" class="search btn btn-default btn-lg"><i class="fa fa-search"></i></button>
	</span>
                </div>
                <div id="live-search" class="live-search div_search" style="display: block;">
                    <ul>

                    </ul>
                </div>
                <div id="search_phrase" class="hidden-xs hidden-sm">
                    Например: <a>найти</a></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-9 col-xl-16 col-md-push-4 col-lg-push-3 col-xl-push-2">
                <ul class="menu_links">
                    <li>
                        <a href="/good/sale" title="Акции">
                            <span><i class="fa fa-thumbs-up"></i></span>
                            Акции </a>
                    </li>
                    <li>
                        <a href="/blog/" title="Блог ">
                            <span><i class="fab fa-blogger-b"></i></span>
                            Блог </a>
                    </li>
                    <li>
                        <a href="/page/contacts" title="Контакты">
                            <span><i class="fa fa-edit"></i></span>
                            Контакты </a>
                    </li>
<!--                    <li>-->
<!--                        <a href="/" title="Купить оптом">-->
<!--                            <span><i class="fa fa-shopping-basket"></i></span>-->
<!--                            Купить оптом </a>-->
<!--                    </li>-->
                </ul>

            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-4 col-md-pull-8 col-lg-pull-9 col-xl-pull-8">

                <?= $this->render('_navbar'); ?>

                <div class="container"></div>



            </div>
            <div id="div_search2" class="col-xs-12 col-sm-6 col-md-5 visible-sm">
                <div id="search" class="search_form input-group se">
                    <input type="hidden" name="filter_category_id" value="">
                    <div class="cat_id input-group-btn">
<!--                        <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">-->
<!--                            <span>Везде</span><i class="fa fa-chevron-down"></i></button>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li data-id=""><a>Везде</a></li>-->
<!--                            <li data-id="188"><a>Для выращивания растений</a></li>-->
<!--                            <li data-id="20"><a>Хвойные деревья</a></li>-->
<!--                            <li data-id="18"><a>Лиственные деревья</a></li>-->
<!--                            <li data-id="164"><a>Хвойные кустарники</a></li>-->
<!--                            <li data-id="25"><a>Лиственные кустарники</a></li>-->
<!--                            <li data-id="57"><a>Плодовые растения</a></li>-->
<!--                            <li data-id="166"><a>Растения для доращивания</a></li>-->
<!--                            <li data-id="33"><a>Розы</a></li>-->
<!--                            <li data-id="34"><a>Уход за растениями</a></li>-->
<!--                        </ul>-->
                    </div>
                    <input type="text" name="search" value="" placeholder="Поиск" class="form-control input-lg"
                           autocomplete="off">
                    <span class="input-group-btn">
		<button type="button" class="search btn btn-default btn-lg"><i class="fa fa-search"></i></button>
	</span>
                </div>
                <div id="search_phrase" class="hidden-xs hidden-sm">
                    Например: <a>найти</a></div>
            </div>
            <script>$('#div_search > *').clone().appendTo('#div_search2');</script>
        </div>
    </div>
</header>