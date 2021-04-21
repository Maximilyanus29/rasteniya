<?php

use frontend\components\Helper; ?>


<div class="container">

    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <?= Helper::generateBreadCrumps($good->categories) ?>

        <li><?= $good->name  ?></li>
    </ul>

    <div class="row">
        <div id="content" class="col-xs-12">
            <div id="product" class="row product-block">
                <div class="col-sm-12"><h1 class="heading"><span><?= $good->name ?></span></h1></div>
                <div class="col-sm-6 col-md-5">
                    <ul class="thumbnails">
                        <li>
                            <a class="thumbnail"
                               href="http://opt.voodland.com/image/cache/catalog/list_derev/akaciy/robiniya_lzheakatsiya_semena-1200x800.jpg"
                               data-key="0">
                                <img src="/images/robiniya_lzheakatsiya_semena-200x180.jpg"
                                     data-zoom-image="http://opt.voodland.com/image/cache/catalog/list_derev/akaciy/robiniya_lzheakatsiya_semena-1200x800.jpg"
                                     title="Семена акации" alt="Семена акации">
                            </a>
                        </li>
                        <li id="additional-img" class="additional none owl-carousel owl-theme"
                            style="opacity: 1; display: block;">
                            <div class="owl-wrapper-outer">
                                <div class="owl-wrapper"
                                     style="width: 486px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);">
                                    <div class="owl-item" style="width: 81px;"><a class="thumbnail selected"
                                                                                  href="http://opt.voodland.com/image/cache/catalog/list_derev/akaciy/robiniya_lzheakatsiya_semena-1200x800.jpg"
                                                                                  title="Семена акации"
                                                                                  data-image="http://opt.voodland.com/image/cache/catalog/list_derev/akaciy/robiniya_lzheakatsiya_semena-200x180.jpg"
                                                                                  data-zoom-image="http://opt.voodland.com/image/cache/catalog/list_derev/akaciy/robiniya_lzheakatsiya_semena-1200x800.jpg"
                                                                                  data-key="0">
                                            <img src="/images/robiniya_lzheakatsiya_semena-74x74.jpg"
                                                 title="Семена акации" alt="Семена акации" class="img-responsive">
                                        </a></div>
                                    <div class="owl-item" style="width: 81px;"><a class="thumbnail"
                                                                                  href="http://opt.voodland.com/image/cache/catalog/semena/akaciia%20white/IMG_3162-1200x800.JPG"
                                                                                  title="Семена акации"
                                                                                  data-image="http://opt.voodland.com/image/cache/catalog/semena/akaciia%20white/IMG_3162-200x180.JPG"
                                                                                  data-zoom-image="http://opt.voodland.com/image/cache/catalog/semena/akaciia%20white/IMG_3162-1200x800.JPG"
                                                                                  data-key="1">
                                            <img src="/images/IMG_3162-74x74.JPG" title="Семена акации"
                                                 alt="Семена акации" class="img-responsive">
                                        </a></div>
                                    <div class="owl-item" style="width: 81px;"><a class="thumbnail"
                                                                                  href="http://opt.voodland.com/image/cache/catalog/%20%D0%BB%D0%B5%D1%82%D0%BE%202016/1m-1200x800.jpg"
                                                                                  title="Семена акации"
                                                                                  data-image="http://opt.voodland.com/image/cache/catalog/%20%D0%BB%D0%B5%D1%82%D0%BE%202016/1m-200x180.jpg"
                                                                                  data-zoom-image="http://opt.voodland.com/image/cache/catalog/%20%D0%BB%D0%B5%D1%82%D0%BE%202016/1m-1200x800.jpg"
                                                                                  data-key="2">
                                            <img src="/images/1m-74x74.jpg" title="Семена акации"
                                                 alt="Семена акации" class="img-responsive">
                                        </a></div>
                                </div>
                            </div>


                            <div class="owl-controls clickable" style="display: none;">
                                <div class="owl-buttons">
                                    <div class="owl-prev"><i class="fa fa-chevron-left fa-2x"></i></div>
                                    <div class="owl-next"><i class="fa fa-chevron-right fa-2x"></i></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">Производитель: <a
                                        href="http://opt.voodland.com/voodland"><span><?= $good->provider->name ?></span></a></div>
                                <div class="col-sm-6 col-md-6">Артикул: <?= $good->vendor_code ?></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <ul class="list-unstyled price">
                        <li><span><?= $good->price ?>р.</span></li>
                        <li>
                            <hr>
                            <div class="form-group quantity">
                                <label class="control-label hidden-xs" for="input-quantity">Кол-во</label>
                                <input type="hidden" name="product_id" value="335">
                                <input type="text" name="quantity" value="1" size="2" id="input-quantity"
                                       class="form-control">
                                <span>
											<i class="fa fa-plus btn btn-default"
                                               onclick="quantity(this, &#39;1&#39;, &#39;+&#39;);"></i>
											<i class="fa fa-minus btn btn-default"
                                               onclick="quantity(this, &#39;1&#39;, &#39;-&#39;);"></i>
										</span>
                                <button type="button" class="add_to_cart button btn btn-lg  335"
                                        data-toggle="tooltip" title="" id="button-cart"
                                        data-original-title="В корзину"><i class="fa fa-shopping-basket"></i><span>В корзину</span>
                                </button>
                            </div>
                        </li>
                    </ul>
                    <div id="option" class="option row">
                        <div class="col-xs-12">
                            <hr>
                        </div>
                        <div class="col-xs-12"><h5 class="heading"><span>Доступные варианты</span></h5></div>
                        <div class="form-group required options_select col-xs-12 col-sm-6">
                            <label class="control-label" for="input-option828">Вес (г)</label>
                            <select name="option[828]" id="input-option828" class="form-control">
                                <option value=""> --- Выберите ---</option>
                                <option value="754">1000</option>
                                <option value="778">3000</option>
                            </select>
                        </div>
                    </div>
                    <hr style="margin-top:0">
                    <div class="row">
                        <div class="share col-sm-12 col-md-12 col-lg-6">
                            <div id="goodshare" data-socials="vkontakte,facebook,twitter,viber,whatsapp">
                                <div class="vkontakte" data-social="vkontakte"><span
                                        data-counter="vkontakte">1</span></div>
                                <div class="facebook" data-social="facebook"><span data-counter="facebook">0</span>
                                </div>
                                <div class="twitter" data-social="twitter"></div>
                                <div class="viber" data-social="viber"></div>
                                <div class="whatsapp" data-social="whatsapp"></div>
                                <link href="/images/goodshare.css" rel="stylesheet" type="text/css"
                                      media="screen">
                            </div>
                            <script src="/images/goodshare.js.Без названия"></script>
                            <link href="/images/goodshare.css" rel="stylesheet" media="screen">
                        </div>
                        <div class="col-sm-12 col-md-12 visible-xs visible-sm visible-md">
                            <hr>
                        </div>
                        <div class="rating col-xs-7 col-sm-8 col-md-12 col-lg-6">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="fa fa-comments-o" aria-hidden="true"></i><a href="http://opt.voodland.com/"
                                                                                  onclick="$(&#39;a[href=\&#39;#tab-review\&#39;]&#39;).trigger(&#39;click&#39;); scroll_to(&#39;#tab-review&#39;); return false;"><span
                                    class="hidden-xs">0 отзывов</span><span class="visible-xs">0</span></a>
                        </div>
                        <div class="btn-group col-xs-5 col-sm-4 visible-xs visible-sm">
                            <button type="button" data-toggle="tooltip" class="btn btn-default" title=""
                                    onclick="callback(&#39;Вопрос о товаре&#39;, &#39;335&#39;);"
                                    data-original-title="Вопрос о товаре"><i class="fa fa-question"></i></button>
                            <button type="button" data-toggle="tooltip" class="wishlist btn btn-default" title=""
                                    onclick="wishlist.add(&#39;335&#39;);" data-original-title="В закладки"><i
                                    class="fa fa-heart"></i></button>
                            <button type="button" data-toggle="tooltip" class="compare btn btn-default" title=""
                                    onclick="compare.add(&#39;335&#39;);" data-original-title="В сравнение"><i
                                    class="fa fa-exchange-alt"></i></button>
                        </div>
                        <div class="col-sm-12 col-md-12 visible-xs visible-sm visible-md">
                            <hr>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="product_button btn-group hidden-xs hidden-sm">
                        <button type="button" data-toggle="tooltip" class="btn btn-default" title=""
                                onclick="callback(&#39;Вопрос о товаре&#39;, &#39;335&#39;);"
                                data-original-title="Вопрос о товаре"><i class="fa fa-question"></i></button>
                        <button type="button" data-toggle="tooltip" class="wishlist btn btn-default" title=""
                                onclick="wishlist.add(&#39;335&#39;);" data-original-title="В закладки"><i
                                class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" class="compare btn btn-default" title=""
                                onclick="compare.add(&#39;335&#39;);" data-original-title="В сравнение"><i
                                class="fa fa-exchange-alt"></i></button>
                    </div>
                    <div class="row">
                        <div class="product_banners">
                            <script>max_height_div('.product_banners div div');</script>
                        </div>
                    </div>
                    <hr class="visible-xs visible-sm">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="http://opt.voodland.com/#tab-description" data-toggle="tab"
                                              aria-expanded="true"><i class="far fa-file-alt"
                                                                      aria-hidden="true"></i>Описание</a></li>
                        <li class=""><a href="http://opt.voodland.com/#tab-review" data-toggle="tab"
                                        aria-expanded="false"><i class="fa fa-comments" aria-hidden="true"></i>Отзывов
                                (0)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-description"><span style="font-weight: bold;">
                                <?= $good->description ?>
                        </div>
                        <div class="tab-pane" id="tab-review">
                            <div id="review"><p>Нет отзывов об этом товаре.</p>
                                <div class="review_pagination">
                                    <div class="text-right"></div>
                                    <div class="text-right">
                                        <button class="btn btn-primary"
                                                onclick="$(&#39;#form-review&#39;).slideToggle();">Написать отзыв
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" id="form-review">
                                <div class="rev_form well well-sm">
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-name">Ваше имя</label>
                                            <input type="text" name="name" value="" id="input-name"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label"
                                                   for="input-review-minus">Достоинства:</label>
                                            <textarea name="plus" rows="5" id="input-review-minus"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-review-plus">Недостатки:</label>
                                            <textarea name="minus" rows="5" id="input-review-plus"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-review">Ваш отзыв</label>
                                            <textarea name="text" rows="5" id="input-review"
                                                      class="form-control"></textarea>
                                            <div class="help-block"><span style="color: #FF0000;">Примечание:</span>
                                                HTML разметка не поддерживается! Используйте обычный текст.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label">Рейтинг</label>
                                            <div class="review_star">
                                                <input type="radio" name="rating" value="1">
                                                <input type="radio" name="rating" value="2">
                                                <input type="radio" name="rating" value="3">
                                                <input type="radio" name="rating" value="4">
                                                <input type="radio" name="rating" value="5">
                                                <div class="stars">
                                                    <i class="far fa-star"></i><i class="far fa-star"></i><i
                                                        class="far fa-star"></i><i class="far fa-star"></i><i
                                                        class="far fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right clearfix">
                                        <button type="button" id="button-review" data-loading-text="Загрузка..."
                                                class="btn btn-primary">Отправить свой отзыв
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row product_carousel">
                <h3 class="heading"><span>Рекомендуем посмотреть</span></h3>
                <div class="products product_related owl-carousel owl-theme" style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer">
                        <div class="owl-wrapper" style="width: 580px; left: 0px; display: block;">
                            <div class="owl-item" style="width: 290px;">
                                <div class="product-layout">
                                    <div class="product-thumb transition">
                                        <div class="image">
                                            <a href="http://opt.voodland.com/semena/semena-sosny-obyknovennoj-">
                                                <img src="/images/_сосны с лого 3-200x180.png"
                                                     alt="Семена сосны обыкновенной "
                                                     title="Семена сосны обыкновенной " class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="caption">
                                            <a href="http://opt.voodland.com/semena/semena-sosny-obyknovennoj-"
                                               style="height: 22px;">Семена сосны обыкновенной </a>
                                            <p class="description" style="height: 80px;">Сосна обыкновенная.
                                                Семена развиваются в шишках, которые созревают поздно осенью
                                                следующего года,
                                                ..</p>
                                            <div id="option_406" class="option">
                                            </div>
                                            <div class="rating">
                                                    <span class="fa fa-stack"><i
                                                            class="far fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i
                                                        class="far fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i
                                                        class="far fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i
                                                        class="far fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i
                                                        class="far fa-star fa-stack-2x"></i></span>
                                                <sup><a onclick="location=&#39;http://opt.voodland.com/semena/semena-sosny-obyknovennoj-#tab-review&#39;"></a></sup>
                                            </div>
                                            <p class="price">
                                                9000.00р. </p>
                                        </div>
                                        <div class="cart">
                                            <button type="button" class="add_to_cart button btn btn-default  406"
                                                    data-toggle="tooltip" title=""
                                                    onclick="cart.add(&#39;406&#39;);"
                                                    data-original-title="В корзину"><i
                                                    class="fa fa-shopping-basket"></i><span class="hidden-sm">В корзину</span>
                                            </button>
                                            <button type="button" class="wishlist btn btn-default"
                                                    data-toggle="tooltip" title=""
                                                    onclick="wishlist.add(&#39;406&#39;);"
                                                    data-original-title="В закладки"><i class="fa fa-heart"></i>
                                            </button>
                                            <button type="button" class="compare btn btn-default"
                                                    data-toggle="tooltip" title=""
                                                    onclick="compare.add(&#39;406&#39;);"
                                                    data-original-title="В сравнение"><i
                                                    class="fa fa-exchange-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-controls clickable" style="display: none;">
                        <div class="owl-buttons">
                            <div class="owl-prev"><i class="fa fa-chevron-left"></i></div>
                            <div class="owl-next"><i class="fa fa-chevron-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                module_type_view('carousel', '.product_related');
            </script>
            <hr>
            <p>
                <i class="fa fa-tag" data-toggle="tooltip" title="" data-original-title="Теги:"></i>
                <a href="http://opt.voodland.com/index.php?route=product/search&amp;tag=%D0%A1%D0%B5%D0%BC%D0%B5%D0%BD%D0%B0%20%D0%B0%D0%BA%D0%B0%D1%86%D0%B8%D0%B8">Семена
                    акации</a>
            </p>
            <hr style="margin-bottom:20px">
        </div>
    </div>
</div>