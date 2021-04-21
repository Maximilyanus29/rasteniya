<?php

?>

<div class="container">

    <ul class="breadcrumb ">
        <li><a href="http://opt.voodland.com/"><i class="fa fa-home"></i></a></li>
        <li><?= $category['name'] ?></li>
    </ul>

    <div class="row">
        <aside id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs ">



            <script type="text/javascript"><!--
                $('#button-filter').on('click', function() {
                    filter = [];

                    $('input[name^=\'filter\']:checked').each(function(element) {
                        filter.push(this.value);
                    });

                    location = 'http://opt.voodland.com/khvojnye-rasteniya/&filter=' + filter.join(',');
                });
                //--></script>
            <div class="list-group">

                <?php foreach ($categories as $category): ?>

                    <a href="/category/<?= $category['slug'] ?>" class="list-group-item <?= $mainCategory['slug'] === $category['slug'] ? "active" : "" ?>"> <?= $mainCategory['slug'] !== $category['slug'] ? "-" : "" ?> <?= $category['name'] ?> (<?= $category['count'] ?>)</a>


                <?php endforeach; ?>

            </div>
            <div class="list-group">


                <a href="/article/slug" class="list-group-item"> article</a>

            </div>
            <div id="banner0" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 1080px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px); transform-origin: 135px center; perspective-origin: 135px center;"><div class="owl-item" style="width: 270px;"><div class="item">
                                <a href="http://opt.voodland.com/khvojnye-rasteniya/tuya/"><img src="/images/danica1-250x250.jpg" alt="Туя" class="img-responsive"></a>
                            </div></div><div class="owl-item" style="width: 270px;"><div class="item">
                                <a href="http://opt.voodland.com/khvojnye-rasteniya/listvennitsa/"><img src="/images/blue_dwarf1-250x250.jpg" alt="Лиственница" class="img-responsive"></a>
                            </div></div></div></div>

            </div>
            <script type="text/javascript"><!--
                $('#banner0').owlCarousel({
                    items: 6,
                    autoPlay: 3000,
                    singleItem: true,
                    navigation: false,
                    pagination: false,
                    transitionStyle: 'fade'
                });
                --></script>
        </aside>
        <div id="content" class="col-sm-8 col-md-8 col-lg-9">			<h1 class="heading"><span><?= $category['name'] ?></span></h1>
            <div class="row">
                <div class="category-info">
                    <div class="col-xs-12">
                        <hr>
                        <div class="image">
                            <img src="/images/hvoin_plants-80x80.jpg" alt="<?= $category['name'] ?>" title="<?= $category['name'] ?>" class="img-thumbnail">
                        </div>
                        <div class="description">
                            <p>
                                <span style="font-weight: bold;"><?= $category['name'] ?></span>
                                <p><?= $category['name'] ?></p>
                                <br>
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="category_list row">

                <?php foreach ($categories as $category): ?>

                    <div class="category col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <a href="/category/<?= $category['slug'] ?>">
                            <p style="height: 14px;"><?= $category['name'] ?> (<?= $category['count'] ?>)</p>
                        </a>
                    </div>

                <?php endforeach; ?>


            </div>
            <p style="margin:0"><a href="http://opt.voodland.com/index.php?route=product/compare" id="compare-total">Сравнение товаров (0)</a></p>				<div class="row">
                <div class="col-xs-12"><hr></div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 hidden-xs">
                    <div class="btn-group">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-5 col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-3 text-right">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort"></i><span class="hidden-xs hidden-sm hidden-md">Сортировка:</span></span>
                        <select id="input-sort" class="form-control" onchange="location = this.value;">
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?sort=p.sort_order&amp;order=ASC" selected="selected">По умолчанию</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?sort=pd.name&amp;order=ASC">Название (А - Я)</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?sort=pd.name&amp;order=DESC">Название (Я - А)</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?sort=p.price&amp;order=ASC">Цена (низкая &gt; высокая)</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?sort=p.price&amp;order=DESC">Цена (высокая &gt; низкая)</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?sort=rating&amp;order=DESC">Рейтинг (начиная с высокого)</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?sort=rating&amp;order=ASC">Рейтинг (начиная с низкого)</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?sort=p.model&amp;order=ASC">Код Товара (А - Я)</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?sort=p.model&amp;order=DESC">Код Товара (Я - А)</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-right">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-eye"></i><span class="hidden-xs hidden-sm hidden-md">Показать:</span></span>
                        <select id="input-limit" class="form-control" onchange="location = this.value;">
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?limit=15" selected="selected">15</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?limit=25">25</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?limit=50">50</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?limit=75">75</option>
                            <option value="http://opt.voodland.com/khvojnye-rasteniya/?limit=100">100</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12"><hr></div>
            </div>
            <div class="products-block row">

                <?php foreach ($goods as $good): ?>

                    <div class="product-layout product-grid col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-thumb transition">

                            <div class="image">

                                <a href="/good/<?= $good->slug ?>">
                                    <img src="/images/_сосны с лого 3-500x400.png" alt="Семена сосны обыкновенной " title="Семена сосны обыкновенной " class="img-responsive">
                                </a>
                            </div>
                            <div class="caption">
                                <a href="/good/<?= $good->slug ?>" style="height: 22px;"><?= $good->name ?> </a>
                                <p class="description" style="height: 80px;"><?= $good->name ?>..</p>
                                <div id="option_406" class="option" style="height: 0px;">
                                </div>
                                <div class="rating">
                                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                    <sup><a onclick="location=&#39;http://opt.voodland.com/semena/semena-sosny-obyknovennoj-#tab-review&#39;"></a></sup>										</div>
                                <p class="price">
                                    <?= !empty($good->discount_price) ? $good->discount_price : $good->price ?>																																</p>
                            </div>
                            <div class="cart">
                                <button type="button" class="add_to_cart button btn btn-default  406" data-toggle="tooltip" title="" onclick="cart.add(406)" data-original-title="В корзину"><i class="fa fa-shopping-basket"></i><span class="hidden-sm">В корзину</span></button>
                                <button type="button" class="wishlist btn btn-default" data-toggle="tooltip" title="" onclick="wishlist.add(&#39;406&#39;);" data-original-title="В закладки"><i class="fa fa-heart"></i></button>									<button type="button" class="compare btn btn-default" data-toggle="tooltip" title="" onclick="compare.add(&#39;406&#39;);" data-original-title="В сравнение"><i class="fa fa-exchange-alt"></i></button>								</div>
                        </div>

                    </div>

                <?php endforeach; ?>


                <div class="product-layout product-grid col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="product-thumb transition">

                        <div class="image">

                            <a href="http://opt.voodland.com/semena/semena-sosny-obyknovennoj-">
                                <img src="/images/_сосны с лого 3-500x400.png" alt="Семена сосны обыкновенной " title="Семена сосны обыкновенной " class="img-responsive">
                            </a>
                        </div>
                        <div class="caption">
                            <a href="http://opt.voodland.com/semena/semena-sosny-obyknovennoj-" style="height: 22px;">Семена сосны обыкновенной </a>
                            <p class="description" style="height: 80px;">Сосна обыкновенная.
                                Семена развиваются в шишках, которые созревают поздно осенью следующего года,
                                ..</p>
                            <div id="option_406" class="option" style="height: 0px;">
                            </div>
                            <div class="rating">
                                <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>
                                <sup><a onclick="location=&#39;http://opt.voodland.com/semena/semena-sosny-obyknovennoj-#tab-review&#39;"></a></sup>										</div>
                            <p class="price">
                                9000.00р.																																</p>
                        </div>
                        <div class="cart">
                            <button type="button" class="add_to_cart button btn btn-default  406" data-toggle="tooltip" title="" onclick="cart.add(406)" data-original-title="В корзину"><i class="fa fa-shopping-basket"></i><span class="hidden-sm">В корзину</span></button>
                            <button type="button" class="wishlist btn btn-default" data-toggle="tooltip" title="" onclick="wishlist.add(&#39;406&#39;);" data-original-title="В закладки"><i class="fa fa-heart"></i></button>									<button type="button" class="compare btn btn-default" data-toggle="tooltip" title="" onclick="compare.add(&#39;406&#39;);" data-original-title="В сравнение"><i class="fa fa-exchange-alt"></i></button>								</div>
                    </div>



                </div>
            </div>
            <script>
                var window_width = $(window).width();

            </script>
            <div class="pagination_wrap row">
                <div class="col-sm-6 text-left"></div>
                <div class="col-sm-6 text-right">Показано с 1 по 1 из 1 (всего 1 страниц)</div>
            </div>
            <div class="cat_desc row"></div>
            <div class="row">
                <div class="col-xs-12"></div>
            </div>
        </div>
    </div>
</div>

<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 0,
                "item" :
                {
                    "@id": "http://opt.voodland.com/",
                    "name": "Voodland.com"
                }
            }, 									{
                "@type": "ListItem",
                "position": 1,
                "item" :
                {
                    "@id": "http://opt.voodland.com/khvojnye-rasteniya/",
                    "name": "Хвойные деревья"
                }
            }								]
    }
</script>

<script>
    $(document).ready(function() {
        fly_menu('1');	fly_cart();	fly_callback('Заказ звонка');		uni_live_search('', '', '1', '', '5', 'Все результаты поиска', 'Ничего не найдено');	});
    var uni_cart_type = 'popup',
        uni_descr_hover = '',
        uni_attr_hover = '',
        uni_option_hover = '';
</script>
