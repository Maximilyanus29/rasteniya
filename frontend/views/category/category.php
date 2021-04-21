<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\assets\FootwearAsset;

FootwearAsset::register($this);

$this->title = 'Обувь';
$this->params['breadcrumbs'][] = $this->title;

$this->params['bodyClass']='page_category ev_shoes';
//page_category ev_shoes
?>



<div class="delivery_header_info_mobile">Бесплатная доставка и обмен по России и Беларуси до 10 марта</div>

<ul class="breadcrumbs" itemscope="" itemtype="https://schema.org/BreadcrumbList">

    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">

        <a itemprop="item" href="https://lichi.com/ru/ru"><span itemprop="name">Главная</span></a>

        <meta itemprop="position" content="1">
    </li>
    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="https://lichi.com/ru/ru/category/shoes"><span itemprop="name">Обувь</span></a>
        <meta itemprop="position" content="2">
    </li>
</ul>
<div id="product_fast_preview">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAwAAAAQAAgMAAAArSNaTAAAACVBMVEX////c3Nz09PRD5yjAAAABwklEQVR42u3ZMWorMRAG4NmFhci9j2AIOUWO4MIyKn0UkTts6pTBp3zFPlKnCz98X6F6pWGkmdkqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+bX2Eb6CN6M8/zTbqO3gD23sb6y15A9c2llt0BrQRnQXLrY3tmnyJ9jbO0RdpX677e+75j9o/HnttqTFY+rzM+qz9EZsB46XqtfXYLDjfj3XGPgN9VtWe+xCse1XVHhuAqtefhT8ppp+zqmp9phbUlz6OVE6tR8/Hl2+xG4iPwP8cqOeX++CvvP0sqe3AzH6JW6/sWmi/H5dRagjWPk7R/cDS5zm6I6ujJ54teC7RW/JUomq9t3EJPv/8ydyWPhuNn07H/x84VRuVXUy3awEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Gv/AFnHNN+duNJvAAAAAElFTkSuQmCC" data-src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAwAAAAQAAgMAAAArSNaTAAAACVBMVEX////c3Nz09PRD5yjAAAABwklEQVR42u3ZMWorMRAG4NmFhci9j2AIOUWO4MIyKn0UkTts6pTBp3zFPlKnCz98X6F6pWGkmdkqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+bX2Eb6CN6M8/zTbqO3gD23sb6y15A9c2llt0BrQRnQXLrY3tmnyJ9jbO0RdpX677e+75j9o/HnttqTFY+rzM+qz9EZsB46XqtfXYLDjfj3XGPgN9VtWe+xCse1XVHhuAqtefhT8ppp+zqmp9phbUlz6OVE6tR8/Hl2+xG4iPwP8cqOeX++CvvP0sqe3AzH6JW6/sWmi/H5dRagjWPk7R/cDS5zm6I6ujJ54teC7RW/JUomq9t3EJPv/8ydyWPhuNn07H/x84VRuVXUy3awEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Gv/AFnHNN+duNJvAAAAAElFTkSuQmCC" alt="" style="display: block;">
</div>

<input type="hidden" name="last_filter" id="last_filter" value="">
<div class="product-mobile-filter visible-xs-block">
    <div class="product-filter">
        <div class="filter-select-2">
            <div class="input" onclick="is_ready &amp;&amp; _app_.category.show_all_filter(this);">
                <div class="filter-select-input">Фильтры</div>
                <div class="filter-select-caret"></div>
            </div>
        </div>
        <div class="filter-select pull-right">
            <div class="input" onclick="is_ready &amp;&amp; _app_.category.ev_open_filter(this);">
                <div class="filter-select-input">Сортировка</div>
                <div class="filter-select-caret"></div>
            </div>
            <div class="drop-down">
                <div class="drop-down-option">
                    <input id="mobile_sort_newest" type="radio" class="ui-control-checkbox round" onchange="is_ready &amp;&amp; _app_.category.sort_products(&#39;newest&#39;);" checked="">
                    <label for="mobile_sort_newest">По новизне</label>
                </div>
                <div class="drop-down-option">
                    <input id="mobile_sort_popular" type="radio" class="ui-control-checkbox round" onchange="is_ready &amp;&amp; _app_.category.sort_products(&#39;popular&#39;);">
                    <label for="mobile_sort_popular">По популярности</label>
                </div>
                <div class="drop-down-option">
                    <input id="mobile_sort_asc" type="radio" class="ui-control-checkbox round" onchange="is_ready &amp;&amp; _app_.category.sort_products(&#39;asc&#39;);">
                    <label for="mobile_sort_asc">По возрастанию цены</label>
                </div>
                <div class="drop-down-option">
                    <input id="mobile_sort_desc" type="radio" class="ui-control-checkbox round" onchange="is_ready &amp;&amp; _app_.category.sort_products(&#39;desc&#39;);">
                    <label for="mobile_sort_desc">По убыванию цены</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-filter" id="category_filter">
    <div class="filter-select">
        <div class="input" onclick="is_ready &amp;&amp; _app_.category.ev_open_filter(this, false);">
            <div class="filter-select-input">Цвет</div>
            <div class="filter-select-caret"></div>
        </div>
        <div class="drop-down">
            <div class="drop-down-option">
                <input id="_116" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 116, false);" class="ui-control-checkbox round">
                <label for="_116" class="colorize"><span style="background-color: #5d3707"></span>Коричневый</label>
            </div>
            <div class="drop-down-option">
                <input id="_117" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 117, false);" class="ui-control-checkbox round">
                <label for="_117" class="colorize"><span style="background-color: #000000"></span>Черный</label>
            </div>
            <div class="drop-down-option">
                <input id="_119" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 119, false);" class="ui-control-checkbox round">
                <label for="_119" class="colorize"><span style="background-color: #ffffff"></span>Белый</label>
            </div>
            <div class="drop-down-option">
                <input id="_122" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 122, false);" class="ui-control-checkbox round">
                <label for="_122" class="colorize"><span style="background-color: #e2cdb5"></span>Бежевый</label>
            </div>
        </div>
    </div>
    <div class="filter-select">
        <div class="input" onclick="is_ready &amp;&amp; _app_.category.ev_open_filter(this, false);">
            <div class="filter-select-input">Размер</div>
            <div class="filter-select-caret"></div>
        </div>
        <div class="drop-down">
            <div class="drop-down-option">
                <input id="_7" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 7, false);" class="ui-control-checkbox round">
                <label for="_7" class="colorize"><span style="background-color: #ececec"></span>35</label>
            </div>
            <div class="drop-down-option">
                <input id="_10" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 10, false);" class="ui-control-checkbox round">
                <label for="_10" class="colorize"><span style="background-color: #ececec"></span>36</label>
            </div>
            <div class="drop-down-option">
                <input id="_12" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 12, false);" class="ui-control-checkbox round">
                <label for="_12" class="colorize"><span style="background-color: #ececec"></span>37</label>
            </div>
            <div class="drop-down-option">
                <input id="_8" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 8, false);" class="ui-control-checkbox round">
                <label for="_8" class="colorize"><span style="background-color: #ececec"></span>38</label>
            </div>
            <div class="drop-down-option">
                <input id="_9" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 9, false);" class="ui-control-checkbox round">
                <label for="_9" class="colorize"><span style="background-color: #ececec"></span>39</label>
            </div>
            <div class="drop-down-option">
                <input id="_11" type="checkbox" onchange="is_ready &amp;&amp; _app_.category.set_filter(this, 11, false);" class="ui-control-checkbox round">
                <label for="_11" class="colorize"><span style="background-color: #ececec"></span>40</label>
            </div>
        </div>
    </div>
    <div class="filter-select pull-right hidden-xs">
        <div class="input" onclick="is_ready &amp;&amp; _app_.category.ev_open_filter(this);">
            <div class="filter-select-input">Сортировка</div>
            <div class="filter-select-caret"></div>
        </div>
        <div class="drop-down">
            <div class="drop-down-option">
                <input id="pc_sort_newest" type="radio" class="ui-control-checkbox round" onchange="is_ready &amp;&amp; _app_.category.sort_products(&#39;newest&#39;);" checked="">
                <label for="pc_sort_newest">По новизне</label>
            </div>
            <div class="drop-down-option">
                <input id="pc_sort_popular" type="radio" class="ui-control-checkbox round" onchange="is_ready &amp;&amp; _app_.category.sort_products(&#39;popular&#39;);">
                <label for="pc_sort_popular">По популярности</label>
            </div>
            <div class="drop-down-option">
                <input id="pc_sort_asc" type="radio" class="ui-control-checkbox round" onchange="is_ready &amp;&amp; _app_.category.sort_products(&#39;asc&#39;);">
                <label for="pc_sort_asc">По возрастанию цены</label>
            </div>
            <div class="drop-down-option">
                <input id="pc_sort_desc" type="radio" class="ui-control-checkbox round" onchange="is_ready &amp;&amp; _app_.category.sort_products(&#39;desc&#39;);">
                <label for="pc_sort_desc">По убыванию цены</label>
            </div>
        </div>
    </div>
</div>

<?php foreach ($goods as $good): ?>

    <?= $good->name ?>

<?php endforeach; ?>

<div class="row" id="product_container" itemscope="" itemtype="http://schema.org/ItemList" style="visibility: visible;">
    <link itemprop="url" href="https://lichi.com/ru/ru/category/shoes">
    <!-- NEW -->
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="product" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
            <span itemprop="url" content="https://lichi.com/ru/ru/product/38644"></span>

            <div class="product_area" onmouseenter="is_ready &amp;&amp; _app_.ui.product_hover(this)" onmouseleave="is_ready &amp;&amp; _app_.ui.product_hover_out(this, &#39;product_fast_buy_select_38644&#39;)">
                <div class="product_fast_like">
                    <div onclick="_app_.ui.add_to_favorite(this, 38644);" class="btn-fast-like"><i></i></div>
                </div>
                <a href="https://lichi.com/ru/ru/product/38644">
                    <div class="image">
                        <div class="image-block" id="p_i_b_38644">
                            <div class="swiper-container swiper-container-initialized swiper-container-horizontal" data-product-slider="p_i_b_38644">
                                <div class="swiper-wrapper" id="swiper-wrapper-6c8a8964c43bc2bd" aria-live="polite" style="transform: translate3d(-494px, 0px, 0px); transition: all 0ms ease 0s;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="3" style="width: 494px;" role="group" aria-label="1 / 6">
                                        <img src="/images/9fa13d565e14773a404f3a00728437b2.jpg" data-src="https://static.lichi.com/product/38644/9fa13d565e14773a404f3a00728437b2.jpg?v=3_3850137&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38644/9fa13d565e14773a404f3a00728437b2.jpg?v=3_3850137&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="2 / 6">
                                        <img src="/images/ced2735d7ac3605a178382a3fb87373f.jpg" data-src="https://static.lichi.com/product/38644/ced2735d7ac3605a178382a3fb87373f.jpg?v=0_3850134&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38644/ced2735d7ac3605a178382a3fb87373f.jpg?v=0_3850134&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 494px;" role="group" aria-label="3 / 6">
                                        <img src="/images/1fed80ca76b4862c592890360b81fd1e.jpg" data-src="https://static.lichi.com/product/38644/1fed80ca76b4862c592890360b81fd1e.jpg?v=1_3850135&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38644/1fed80ca76b4862c592890360b81fd1e.jpg?v=1_3850135&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="2" style="width: 494px;" role="group" aria-label="4 / 6">
                                        <img src="/images/c3f7d9a999c419a70da6251873946579.jpg" data-src="https://static.lichi.com/product/38644/c3f7d9a999c419a70da6251873946579.jpg?v=2_3850136&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38644/c3f7d9a999c419a70da6251873946579.jpg?v=2_3850136&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="3" style="width: 494px;" role="group" aria-label="5 / 6">
                                        <img src="/images/9fa13d565e14773a404f3a00728437b2.jpg" data-src="https://static.lichi.com/product/38644/9fa13d565e14773a404f3a00728437b2.jpg?v=3_3850137&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38644/9fa13d565e14773a404f3a00728437b2.jpg?v=3_3850137&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="6 / 6">
                                        <img src="/images/ced2735d7ac3605a178382a3fb87373f.jpg" data-src="https://static.lichi.com/product/38644/ced2735d7ac3605a178382a3fb87373f.jpg?v=0_3850134&amp;resize=size-middle" alt="" class=" ls-is-cached lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38644/ced2735d7ac3605a178382a3fb87373f.jpg?v=0_3850134&amp;resize=size-middle&quot;);">
                                    </div></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                        <div class="image-section">
                            <meta itemprop="image" content="https://static.lichi.com/product/38644/ced2735d7ac3605a178382a3fb87373f.jpg?v=0_3850134&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38644&#39;,&#39;p_i_38644_0&#39;, 0);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38644&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38644/1fed80ca76b4862c592890360b81fd1e.jpg?v=1_3850135&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38644&#39;,&#39;p_i_38644_1&#39;, 1);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38644&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38644/c3f7d9a999c419a70da6251873946579.jpg?v=2_3850136&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38644&#39;,&#39;p_i_38644_2&#39;, 2);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38644&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38644/9fa13d565e14773a404f3a00728437b2.jpg?v=3_3850137&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38644&#39;,&#39;p_i_38644_3&#39;, 3);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38644&#39;)"></div>
                        </div>
                    </div>
                </a>
                <div class="sizes" id="product_fast_buy_select_38644">
                    <div class="size_select" onclick="is_ready &amp;&amp; _app_.ui.product_fast_buy_button(this, &#39;product_fast_buy_select_38644&#39;)">
                        Добавить                </div>
                    <div class="size_select_2">
                        <div class="title">Выберите размер</div>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80552, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">35</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80551, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">36</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80547, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">37</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80548, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">38</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80549, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">39</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80550, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">40</a>
                    </div>
                </div>
            </div>
            <div class="brand_name">
                &nbsp;
            </div>
            <a href="https://lichi.com/ru/ru/product/38644">
                <div class="product_name" itemprop="name">
                    Босоножки на каблуке            </div>
                <div class="product_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                    <link itemprop="availability" href="http://schema.org/InStock">


                    <strong>

                        <span itemprop="price" content="3499">3 499</span>
                        <span itemprop="priceCurrency" content="RUR">руб.</span>
                    </strong>
                </div>
            </a>
            <div class="product_colors">
                <div class="color border" title="Белый" style="background-color: #ffffff"></div>
                <a itemprop="url" href="https://lichi.com/ru/ru/product/38541">
                    <div class="color" title="Бежевый" style="background-color: #e2cdb5">
                        <span class="sb-only">
                            Босоножки на каблуке / Бежевый                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="product" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
            <span itemprop="url" content="https://lichi.com/ru/ru/product/38548"></span>

            <div class="product_area" onmouseenter="is_ready &amp;&amp; _app_.ui.product_hover(this)" onmouseleave="is_ready &amp;&amp; _app_.ui.product_hover_out(this, &#39;product_fast_buy_select_38548&#39;)">
                <div class="product_fast_like">
                    <div onclick="_app_.ui.add_to_favorite(this, 38548);" class="btn-fast-like"><i></i></div>
                </div>
                <a href="https://lichi.com/ru/ru/product/38548">
                    <div class="image">
                        <div class="image-block" id="p_i_b_38548">
                            <div class="swiper-container swiper-container-initialized swiper-container-horizontal" data-product-slider="p_i_b_38548">
                                <div class="swiper-wrapper" id="swiper-wrapper-a10c598dca4151be1" aria-live="polite" style="transform: translate3d(-494px, 0px, 0px); transition: all 0ms ease 0s;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="5" style="width: 494px;" role="group" aria-label="1 / 8">
                                        <img src="/images/643315bc02501b6703dd17bfbb7fd3c2.jpg" data-src="https://static.lichi.com/product/38548/643315bc02501b6703dd17bfbb7fd3c2.jpg?v=5_3850341&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38548/643315bc02501b6703dd17bfbb7fd3c2.jpg?v=5_3850341&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="2 / 8">
                                        <img src="/images/2b98a9f86260f1c6d0c753ee77153fed.jpg" data-src="https://static.lichi.com/product/38548/2b98a9f86260f1c6d0c753ee77153fed.jpg?v=0_3850338&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38548/2b98a9f86260f1c6d0c753ee77153fed.jpg?v=0_3850338&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 494px;" role="group" aria-label="3 / 8">
                                        <img src="/images/57a58182493fc4563c800c066d3d363c.jpg" data-src="https://static.lichi.com/product/38548/57a58182493fc4563c800c066d3d363c.jpg?v=1_3849575&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38548/57a58182493fc4563c800c066d3d363c.jpg?v=1_3849575&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="2" style="width: 494px;" role="group" aria-label="4 / 8">
                                        <img src="/images/c8c221cce2c51450333d614dc7ac9a3b.jpg" data-src="https://static.lichi.com/product/38548/c8c221cce2c51450333d614dc7ac9a3b.jpg?v=2_3850362&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38548/c8c221cce2c51450333d614dc7ac9a3b.jpg?v=2_3850362&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="3" style="width: 494px;" role="group" aria-label="5 / 8">
                                        <img src="/images/301b560234898d628d58c08acd6cae1e.jpg" data-src="https://static.lichi.com/product/38548/301b560234898d628d58c08acd6cae1e.jpg?v=3_3850339&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38548/301b560234898d628d58c08acd6cae1e.jpg?v=3_3850339&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="4" style="width: 494px;" role="group" aria-label="6 / 8">
                                        <img src="/images/e890db5a44b95a63ed1a8ba41d6df66a.jpg" data-src="https://static.lichi.com/product/38548/e890db5a44b95a63ed1a8ba41d6df66a.jpg?v=4_3850340&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38548/e890db5a44b95a63ed1a8ba41d6df66a.jpg?v=4_3850340&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="5" style="width: 494px;" role="group" aria-label="7 / 8">
                                        <img src="/images/643315bc02501b6703dd17bfbb7fd3c2.jpg" data-src="https://static.lichi.com/product/38548/643315bc02501b6703dd17bfbb7fd3c2.jpg?v=5_3850341&amp;resize=size-middle" alt="" class=" ls-is-cached lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38548/643315bc02501b6703dd17bfbb7fd3c2.jpg?v=5_3850341&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="8 / 8">
                                        <img src="/images/2b98a9f86260f1c6d0c753ee77153fed.jpg" data-src="https://static.lichi.com/product/38548/2b98a9f86260f1c6d0c753ee77153fed.jpg?v=0_3850338&amp;resize=size-middle" alt="" class=" ls-is-cached lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38548/2b98a9f86260f1c6d0c753ee77153fed.jpg?v=0_3850338&amp;resize=size-middle&quot;);">
                                    </div></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                        <div class="image-section">
                            <meta itemprop="image" content="https://static.lichi.com/product/38548/2b98a9f86260f1c6d0c753ee77153fed.jpg?v=0_3850338&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38548&#39;,&#39;p_i_38548_0&#39;, 0);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38548&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38548/57a58182493fc4563c800c066d3d363c.jpg?v=1_3849575&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38548&#39;,&#39;p_i_38548_1&#39;, 1);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38548&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38548/c8c221cce2c51450333d614dc7ac9a3b.jpg?v=2_3850362&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38548&#39;,&#39;p_i_38548_2&#39;, 2);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38548&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38548/301b560234898d628d58c08acd6cae1e.jpg?v=3_3850339&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38548&#39;,&#39;p_i_38548_3&#39;, 3);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38548&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38548/e890db5a44b95a63ed1a8ba41d6df66a.jpg?v=4_3850340&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38548&#39;,&#39;p_i_38548_4&#39;, 4);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38548&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38548/643315bc02501b6703dd17bfbb7fd3c2.jpg?v=5_3850341&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38548&#39;,&#39;p_i_38548_5&#39;, 5);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38548&#39;)"></div>
                        </div>
                    </div>
                </a>
                <div class="sizes" id="product_fast_buy_select_38548">
                    <div class="size_select" onclick="is_ready &amp;&amp; _app_.ui.product_fast_buy_button(this, &#39;product_fast_buy_select_38548&#39;)">
                        Добавить                </div>
                    <div class="size_select_2">
                        <div class="title">Выберите размер</div>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80574, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">35</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80575, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">36</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80578, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">37</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80576, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">38</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80573, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">39</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80577, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">40</a>
                    </div>
                </div>
            </div>
            <div class="brand_name">
                &nbsp;
            </div>
            <a href="https://lichi.com/ru/ru/product/38548">
                <div class="product_name" itemprop="name">
                    Босоножки на платформе            </div>
                <div class="product_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                    <link itemprop="availability" href="http://schema.org/InStock">


                    <strong>

                        <span itemprop="price" content="3499">3 499</span>
                        <span itemprop="priceCurrency" content="RUR">руб.</span>
                    </strong>
                </div>
            </a>
            <div class="product_colors">
                <div class="color" title="Коричневый" style="background-color: #5d3707"></div>
                <a itemprop="url" href="https://lichi.com/ru/ru/product/38641">
                    <div class="color" title="Черный" style="background-color: #000000">
                        <span class="sb-only">
                            Босоножки на платформе / Черный                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="product" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
            <span itemprop="url" content="https://lichi.com/ru/ru/product/38643"></span>

            <div class="product_area" onmouseenter="is_ready &amp;&amp; _app_.ui.product_hover(this)" onmouseleave="is_ready &amp;&amp; _app_.ui.product_hover_out(this, &#39;product_fast_buy_select_38643&#39;)">
                <div class="product_fast_like">
                    <div onclick="_app_.ui.add_to_favorite(this, 38643);" class="btn-fast-like"><i></i></div>
                </div>
                <a href="https://lichi.com/ru/ru/product/38643">
                    <div class="image">
                        <div class="image-block" id="p_i_b_38643">
                            <div class="swiper-container swiper-container-initialized swiper-container-horizontal" data-product-slider="p_i_b_38643">
                                <div class="swiper-wrapper" id="swiper-wrapper-7104ec1b722f6312c" aria-live="polite" style="transform: translate3d(-494px, 0px, 0px); transition: all 0ms ease 0s;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="3" style="width: 494px;" role="group" aria-label="1 / 6">
                                        <img src="/images/f3c213b09cbea398727eb93cfc37c646.jpg" data-src="https://static.lichi.com/product/38643/f3c213b09cbea398727eb93cfc37c646.jpg?v=3_3850347&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38643/f3c213b09cbea398727eb93cfc37c646.jpg?v=3_3850347&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="2 / 6">
                                        <img src="/images/3ce1ae47fd3d4a8a7ce8533eaa9c1b8d.jpg" data-src="https://static.lichi.com/product/38643/3ce1ae47fd3d4a8a7ce8533eaa9c1b8d.jpg?v=0_3850345&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38643/3ce1ae47fd3d4a8a7ce8533eaa9c1b8d.jpg?v=0_3850345&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 494px;" role="group" aria-label="3 / 6">
                                        <img src="/images/08727ce5f2f2ffd226890c218068ade6.jpg" data-src="https://static.lichi.com/product/38643/08727ce5f2f2ffd226890c218068ade6.jpg?v=1_3850131&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38643/08727ce5f2f2ffd226890c218068ade6.jpg?v=1_3850131&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="2" style="width: 494px;" role="group" aria-label="4 / 6">
                                        <img src="/images/7af36d022899866e73091eff3138f365.jpg" data-src="https://static.lichi.com/product/38643/7af36d022899866e73091eff3138f365.jpg?v=2_3850346&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38643/7af36d022899866e73091eff3138f365.jpg?v=2_3850346&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="3" style="width: 494px;" role="group" aria-label="5 / 6">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAwAAAAQAAgMAAAArSNaTAAAACVBMVEX////c3Nz09PRD5yjAAAABwklEQVR42u3ZMWorMRAG4NmFhci9j2AIOUWO4MIyKn0UkTts6pTBp3zFPlKnCz98X6F6pWGkmdkqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+bX2Eb6CN6M8/zTbqO3gD23sb6y15A9c2llt0BrQRnQXLrY3tmnyJ9jbO0RdpX677e+75j9o/HnttqTFY+rzM+qz9EZsB46XqtfXYLDjfj3XGPgN9VtWe+xCse1XVHhuAqtefhT8ppp+zqmp9phbUlz6OVE6tR8/Hl2+xG4iPwP8cqOeX++CvvP0sqe3AzH6JW6/sWmi/H5dRagjWPk7R/cDS5zm6I6ujJ54teC7RW/JUomq9t3EJPv/8ydyWPhuNn07H/x84VRuVXUy3awEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Gv/AFnHNN+duNJvAAAAAElFTkSuQmCC" data-src="https://static.lichi.com/product/38643/f3c213b09cbea398727eb93cfc37c646.jpg?v=3_3850347&amp;resize=size-middle" alt="" class="a-image">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="6 / 6">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAwAAAAQAAgMAAAArSNaTAAAACVBMVEX////c3Nz09PRD5yjAAAABwklEQVR42u3ZMWorMRAG4NmFhci9j2AIOUWO4MIyKn0UkTts6pTBp3zFPlKnCz98X6F6pWGkmdkqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+bX2Eb6CN6M8/zTbqO3gD23sb6y15A9c2llt0BrQRnQXLrY3tmnyJ9jbO0RdpX677e+75j9o/HnttqTFY+rzM+qz9EZsB46XqtfXYLDjfj3XGPgN9VtWe+xCse1XVHhuAqtefhT8ppp+zqmp9phbUlz6OVE6tR8/Hl2+xG4iPwP8cqOeX++CvvP0sqe3AzH6JW6/sWmi/H5dRagjWPk7R/cDS5zm6I6ujJ54teC7RW/JUomq9t3EJPv/8ydyWPhuNn07H/x84VRuVXUy3awEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Gv/AFnHNN+duNJvAAAAAElFTkSuQmCC" data-src="https://static.lichi.com/product/38643/3ce1ae47fd3d4a8a7ce8533eaa9c1b8d.jpg?v=0_3850345&amp;resize=size-middle" alt="" class="a-image">
                                    </div></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                        <div class="image-section">
                            <meta itemprop="image" content="https://static.lichi.com/product/38643/3ce1ae47fd3d4a8a7ce8533eaa9c1b8d.jpg?v=0_3850345&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38643&#39;,&#39;p_i_38643_0&#39;, 0);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38643&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38643/08727ce5f2f2ffd226890c218068ade6.jpg?v=1_3850131&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38643&#39;,&#39;p_i_38643_1&#39;, 1);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38643&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38643/7af36d022899866e73091eff3138f365.jpg?v=2_3850346&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38643&#39;,&#39;p_i_38643_2&#39;, 2);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38643&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38643/f3c213b09cbea398727eb93cfc37c646.jpg?v=3_3850347&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38643&#39;,&#39;p_i_38643_3&#39;, 3);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38643&#39;)"></div>
                        </div>
                    </div>
                </a>
                <div class="sizes" id="product_fast_buy_select_38643">
                    <div class="size_select" onclick="is_ready &amp;&amp; _app_.ui.product_fast_buy_button(this, &#39;product_fast_buy_select_38643&#39;)">
                        Добавить                </div>
                    <div class="size_select_2">
                        <div class="title">Выберите размер</div>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80561, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">35</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80562, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">36</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80566, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">37</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80564, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">38</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80565, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">39</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80563, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">40</a>
                    </div>
                </div>
            </div>
            <div class="brand_name">
                &nbsp;
            </div>
            <a href="https://lichi.com/ru/ru/product/38643">
                <div class="product_name" itemprop="name">
                    Босоножки с ремешком            </div>
                <div class="product_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                    <link itemprop="availability" href="http://schema.org/InStock">


                    <strong>

                        <span itemprop="price" content="3499">3 499</span>
                        <span itemprop="priceCurrency" content="RUR">руб.</span>
                    </strong>
                </div>
            </a>
            <div class="product_colors">
                <div class="color border" title="Белый" style="background-color: #ffffff"></div>
                <a itemprop="url" href="https://lichi.com/ru/ru/product/38642">
                    <div class="color" title="Бежевый" style="background-color: #e2cdb5">
                        <span class="sb-only">
                            Босоножки с ремешком / Бежевый                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="product" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
            <span itemprop="url" content="https://lichi.com/ru/ru/product/38641"></span>

            <div class="product_area" onmouseenter="is_ready &amp;&amp; _app_.ui.product_hover(this)" onmouseleave="is_ready &amp;&amp; _app_.ui.product_hover_out(this, &#39;product_fast_buy_select_38641&#39;)">
                <div class="product_fast_like">
                    <div onclick="_app_.ui.add_to_favorite(this, 38641);" class="btn-fast-like"><i></i></div>
                </div>
                <a href="https://lichi.com/ru/ru/product/38641">
                    <div class="image">
                        <div class="image-block" id="p_i_b_38641">
                            <div class="swiper-container swiper-container-initialized swiper-container-horizontal" data-product-slider="p_i_b_38641">
                                <div class="swiper-wrapper" id="swiper-wrapper-a6980ca1d738363b" aria-live="polite" style="transform: translate3d(-494px, 0px, 0px); transition: all 0ms ease 0s;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="4" style="width: 494px;" role="group" aria-label="1 / 7">
                                        <img src="/images/d342b83ce4f62b34468d2c3b22cc7352.jpg" data-src="https://static.lichi.com/product/38641/d342b83ce4f62b34468d2c3b22cc7352.jpg?v=4_3850337&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38641/d342b83ce4f62b34468d2c3b22cc7352.jpg?v=4_3850337&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="2 / 7">
                                        <img src="/images/b58e7bd39d1b5cfa0b99994ae72048d7.jpg" data-src="https://static.lichi.com/product/38641/b58e7bd39d1b5cfa0b99994ae72048d7.jpg?v=0_3850335&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38641/b58e7bd39d1b5cfa0b99994ae72048d7.jpg?v=0_3850335&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 494px;" role="group" aria-label="3 / 7">
                                        <img src="/images/62ebdecc2f97881c5d835664d0b60550.jpg" data-src="https://static.lichi.com/product/38641/62ebdecc2f97881c5d835664d0b60550.jpg?v=1_3850122&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38641/62ebdecc2f97881c5d835664d0b60550.jpg?v=1_3850122&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="2" style="width: 494px;" role="group" aria-label="4 / 7">
                                        <img src="/images/025d5e4cc81a2be910399e633cb8abed.jpg" data-src="https://static.lichi.com/product/38641/025d5e4cc81a2be910399e633cb8abed.jpg?v=2_3850387&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38641/025d5e4cc81a2be910399e633cb8abed.jpg?v=2_3850387&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="3" style="width: 494px;" role="group" aria-label="5 / 7">
                                        <img src="/images/2975ac2cc9fe4ef73ac462481573e2e2.jpg" data-src="https://static.lichi.com/product/38641/2975ac2cc9fe4ef73ac462481573e2e2.jpg?v=3_3850336&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38641/2975ac2cc9fe4ef73ac462481573e2e2.jpg?v=3_3850336&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="4" style="width: 494px;" role="group" aria-label="6 / 7">
                                        <img src="/images/d342b83ce4f62b34468d2c3b22cc7352.jpg" data-src="https://static.lichi.com/product/38641/d342b83ce4f62b34468d2c3b22cc7352.jpg?v=4_3850337&amp;resize=size-middle" alt="" class=" ls-is-cached lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38641/d342b83ce4f62b34468d2c3b22cc7352.jpg?v=4_3850337&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="7 / 7">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAwAAAAQAAgMAAAArSNaTAAAACVBMVEX////c3Nz09PRD5yjAAAABwklEQVR42u3ZMWorMRAG4NmFhci9j2AIOUWO4MIyKn0UkTts6pTBp3zFPlKnCz98X6F6pWGkmdkqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+bX2Eb6CN6M8/zTbqO3gD23sb6y15A9c2llt0BrQRnQXLrY3tmnyJ9jbO0RdpX677e+75j9o/HnttqTFY+rzM+qz9EZsB46XqtfXYLDjfj3XGPgN9VtWe+xCse1XVHhuAqtefhT8ppp+zqmp9phbUlz6OVE6tR8/Hl2+xG4iPwP8cqOeX++CvvP0sqe3AzH6JW6/sWmi/H5dRagjWPk7R/cDS5zm6I6ujJ54teC7RW/JUomq9t3EJPv/8ydyWPhuNn07H/x84VRuVXUy3awEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Gv/AFnHNN+duNJvAAAAAElFTkSuQmCC" data-src="https://static.lichi.com/product/38641/b58e7bd39d1b5cfa0b99994ae72048d7.jpg?v=0_3850335&amp;resize=size-middle" alt="" class="a-image">
                                    </div></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                        <div class="image-section">
                            <meta itemprop="image" content="https://static.lichi.com/product/38641/b58e7bd39d1b5cfa0b99994ae72048d7.jpg?v=0_3850335&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38641&#39;,&#39;p_i_38641_0&#39;, 0);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38641&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38641/62ebdecc2f97881c5d835664d0b60550.jpg?v=1_3850122&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38641&#39;,&#39;p_i_38641_1&#39;, 1);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38641&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38641/025d5e4cc81a2be910399e633cb8abed.jpg?v=2_3850387&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38641&#39;,&#39;p_i_38641_2&#39;, 2);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38641&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38641/2975ac2cc9fe4ef73ac462481573e2e2.jpg?v=3_3850336&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38641&#39;,&#39;p_i_38641_3&#39;, 3);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38641&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38641/d342b83ce4f62b34468d2c3b22cc7352.jpg?v=4_3850337&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38641&#39;,&#39;p_i_38641_4&#39;, 4);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38641&#39;)"></div>
                        </div>
                    </div>
                </a>
                <div class="sizes" id="product_fast_buy_select_38641">
                    <div class="size_select" onclick="is_ready &amp;&amp; _app_.ui.product_fast_buy_button(this, &#39;product_fast_buy_select_38641&#39;)">
                        Добавить                </div>
                    <div class="size_select_2">
                        <div class="title">Выберите размер</div>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80601, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">35</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80602, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">36</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80597, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">37</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80598, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">38</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80599, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">39</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80600, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">40</a>
                    </div>
                </div>
            </div>
            <div class="brand_name">
                &nbsp;
            </div>
            <a href="https://lichi.com/ru/ru/product/38641">
                <div class="product_name" itemprop="name">
                    Босоножки на платформе            </div>
                <div class="product_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                    <link itemprop="availability" href="http://schema.org/InStock">


                    <strong>

                        <span itemprop="price" content="3499">3 499</span>
                        <span itemprop="priceCurrency" content="RUR">руб.</span>
                    </strong>
                </div>
            </a>
            <div class="product_colors">
                <div class="color" title="Черный" style="background-color: #000000"></div>
                <a itemprop="url" href="https://lichi.com/ru/ru/product/38548">
                    <div class="color" title="Коричневый" style="background-color: #5d3707">
                        <span class="sb-only">
                            Босоножки на платформе / Коричневый                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="product" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
            <span itemprop="url" content="https://lichi.com/ru/ru/product/38541"></span>

            <div class="product_area" onmouseenter="is_ready &amp;&amp; _app_.ui.product_hover(this)" onmouseleave="is_ready &amp;&amp; _app_.ui.product_hover_out(this, &#39;product_fast_buy_select_38541&#39;)">
                <div class="product_fast_like">
                    <div onclick="_app_.ui.add_to_favorite(this, 38541);" class="btn-fast-like"><i></i></div>
                </div>
                <a href="https://lichi.com/ru/ru/product/38541">
                    <div class="image">
                        <div class="image-block" id="p_i_b_38541">
                            <div class="swiper-container swiper-container-initialized swiper-container-horizontal" data-product-slider="p_i_b_38541">
                                <div class="swiper-wrapper" id="swiper-wrapper-6c622692b0a47f06" aria-live="polite" style="transform: translate3d(-494px, 0px, 0px); transition: all 0ms ease 0s;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="3" style="width: 494px;" role="group" aria-label="1 / 6">
                                        <img src="/images/5eae87d5a3eee21c55a307f2fa472ef9.jpg" data-src="https://static.lichi.com/product/38541/5eae87d5a3eee21c55a307f2fa472ef9.jpg?v=3_3848688&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38541/5eae87d5a3eee21c55a307f2fa472ef9.jpg?v=3_3848688&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="2 / 6">
                                        <img src="/images/351e8a39a999b33d97770ead757202d5.jpg" data-src="https://static.lichi.com/product/38541/351e8a39a999b33d97770ead757202d5.jpg?v=0_3848686&amp;resize=size-middle" alt="" class=" ls-is-cached lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38541/351e8a39a999b33d97770ead757202d5.jpg?v=0_3848686&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 494px;" role="group" aria-label="3 / 6">
                                        <img src="/images/76cc14cb8bf37b7e35fbbc0f488a78fc.jpg" data-src="https://static.lichi.com/product/38541/76cc14cb8bf37b7e35fbbc0f488a78fc.jpg?v=1_3850109&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38541/76cc14cb8bf37b7e35fbbc0f488a78fc.jpg?v=1_3850109&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="2" style="width: 494px;" role="group" aria-label="4 / 6">
                                        <img src="/images/276cb075098c4dca7e7f1d388196ff1c.jpg" data-src="https://static.lichi.com/product/38541/276cb075098c4dca7e7f1d388196ff1c.jpg?v=2_3848687&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38541/276cb075098c4dca7e7f1d388196ff1c.jpg?v=2_3848687&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="3" style="width: 494px;" role="group" aria-label="5 / 6">
                                        <img src="/images/5eae87d5a3eee21c55a307f2fa472ef9.jpg" data-src="https://static.lichi.com/product/38541/5eae87d5a3eee21c55a307f2fa472ef9.jpg?v=3_3848688&amp;resize=size-middle" alt="" class=" ls-is-cached lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38541/5eae87d5a3eee21c55a307f2fa472ef9.jpg?v=3_3848688&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="6 / 6">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAwAAAAQAAgMAAAArSNaTAAAACVBMVEX////c3Nz09PRD5yjAAAABwklEQVR42u3ZMWorMRAG4NmFhci9j2AIOUWO4MIyKn0UkTts6pTBp3zFPlKnCz98X6F6pWGkmdkqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+bX2Eb6CN6M8/zTbqO3gD23sb6y15A9c2llt0BrQRnQXLrY3tmnyJ9jbO0RdpX677e+75j9o/HnttqTFY+rzM+qz9EZsB46XqtfXYLDjfj3XGPgN9VtWe+xCse1XVHhuAqtefhT8ppp+zqmp9phbUlz6OVE6tR8/Hl2+xG4iPwP8cqOeX++CvvP0sqe3AzH6JW6/sWmi/H5dRagjWPk7R/cDS5zm6I6ujJ54teC7RW/JUomq9t3EJPv/8ydyWPhuNn07H/x84VRuVXUy3awEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Gv/AFnHNN+duNJvAAAAAElFTkSuQmCC" data-src="https://static.lichi.com/product/38541/351e8a39a999b33d97770ead757202d5.jpg?v=0_3848686&amp;resize=size-middle" alt="" class="a-image">
                                    </div></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                        <div class="image-section">
                            <meta itemprop="image" content="https://static.lichi.com/product/38541/351e8a39a999b33d97770ead757202d5.jpg?v=0_3848686&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38541&#39;,&#39;p_i_38541_0&#39;, 0);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38541&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38541/76cc14cb8bf37b7e35fbbc0f488a78fc.jpg?v=1_3850109&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38541&#39;,&#39;p_i_38541_1&#39;, 1);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38541&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38541/276cb075098c4dca7e7f1d388196ff1c.jpg?v=2_3848687&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38541&#39;,&#39;p_i_38541_2&#39;, 2);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38541&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38541/5eae87d5a3eee21c55a307f2fa472ef9.jpg?v=3_3848688&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38541&#39;,&#39;p_i_38541_3&#39;, 3);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38541&#39;)"></div>
                        </div>
                    </div>
                </a>
                <div class="sizes" id="product_fast_buy_select_38541">
                    <div class="size_select" onclick="is_ready &amp;&amp; _app_.ui.product_fast_buy_button(this, &#39;product_fast_buy_select_38541&#39;)">
                        Добавить                </div>
                    <div class="size_select_2">
                        <div class="title">Выберите размер</div>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80544, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">35</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80541, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">36</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80543, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">37</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80542, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">38</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80545, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">39</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80546, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">40</a>
                    </div>
                </div>
            </div>
            <div class="brand_name">
                &nbsp;
            </div>
            <a href="https://lichi.com/ru/ru/product/38541">
                <div class="product_name" itemprop="name">
                    Босоножки на каблуке            </div>
                <div class="product_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                    <link itemprop="availability" href="http://schema.org/InStock">


                    <strong>

                        <span itemprop="price" content="3499">3 499</span>
                        <span itemprop="priceCurrency" content="RUR">руб.</span>
                    </strong>
                </div>
            </a>
            <div class="product_colors">
                <div class="color" title="Бежевый" style="background-color: #e2cdb5"></div>
                <a itemprop="url" href="https://lichi.com/ru/ru/product/38644">
                    <div class="color border" title="Белый" style="background-color: #ffffff">
                        <span class="sb-only">
                            Босоножки на каблуке / Белый                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="product" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
            <span itemprop="url" content="https://lichi.com/ru/ru/product/38642"></span>

            <div class="product_area" onmouseenter="is_ready &amp;&amp; _app_.ui.product_hover(this)" onmouseleave="is_ready &amp;&amp; _app_.ui.product_hover_out(this, &#39;product_fast_buy_select_38642&#39;)">
                <div class="product_fast_like">
                    <div onclick="_app_.ui.add_to_favorite(this, 38642);" class="btn-fast-like"><i></i></div>
                </div>
                <a href="https://lichi.com/ru/ru/product/38642">
                    <div class="image">
                        <div class="image-block" id="p_i_b_38642">
                            <div class="swiper-container swiper-container-initialized swiper-container-horizontal" data-product-slider="p_i_b_38642">
                                <div class="swiper-wrapper" id="swiper-wrapper-eb571097aa6d9496c" aria-live="polite" style="transform: translate3d(-494px, 0px, 0px); transition: all 0ms ease 0s;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="4" style="width: 494px;" role="group" aria-label="1 / 7">
                                        <img src="/images/bf19ccdefff43bfa35a87f061e40c232.jpg" data-src="https://static.lichi.com/product/38642/bf19ccdefff43bfa35a87f061e40c232.jpg?v=4_3850344&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38642/bf19ccdefff43bfa35a87f061e40c232.jpg?v=4_3850344&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="2 / 7">
                                        <img src="/images/0bdf6d47c6a1dc71af0cbd133554511c.jpg" data-src="https://static.lichi.com/product/38642/0bdf6d47c6a1dc71af0cbd133554511c.jpg?v=0_3850342&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38642/0bdf6d47c6a1dc71af0cbd133554511c.jpg?v=0_3850342&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 494px;" role="group" aria-label="3 / 7">
                                        <img src="/images/75d59594afc46184b13d81648095441c.jpg" data-src="https://static.lichi.com/product/38642/75d59594afc46184b13d81648095441c.jpg?v=1_3850126&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38642/75d59594afc46184b13d81648095441c.jpg?v=1_3850126&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="2" style="width: 494px;" role="group" aria-label="4 / 7">
                                        <img src="/images/563692e1a6165e0dc799126d2dacc5ff.jpg" data-src="https://static.lichi.com/product/38642/563692e1a6165e0dc799126d2dacc5ff.jpg?v=2_3850127&amp;resize=size-middle" alt="" class=" lazyloaded" style="background-image: url(&quot;https://static.lichi.com/product/38642/563692e1a6165e0dc799126d2dacc5ff.jpg?v=2_3850127&amp;resize=size-middle&quot;);">
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="3" style="width: 494px;" role="group" aria-label="5 / 7">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAwAAAAQAAgMAAAArSNaTAAAACVBMVEX////c3Nz09PRD5yjAAAABwklEQVR42u3ZMWorMRAG4NmFhci9j2AIOUWO4MIyKn0UkTts6pTBp3zFPlKnCz98X6F6pWGkmdkqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+bX2Eb6CN6M8/zTbqO3gD23sb6y15A9c2llt0BrQRnQXLrY3tmnyJ9jbO0RdpX677e+75j9o/HnttqTFY+rzM+qz9EZsB46XqtfXYLDjfj3XGPgN9VtWe+xCse1XVHhuAqtefhT8ppp+zqmp9phbUlz6OVE6tR8/Hl2+xG4iPwP8cqOeX++CvvP0sqe3AzH6JW6/sWmi/H5dRagjWPk7R/cDS5zm6I6ujJ54teC7RW/JUomq9t3EJPv/8ydyWPhuNn07H/x84VRuVXUy3awEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Gv/AFnHNN+duNJvAAAAAElFTkSuQmCC" data-src="https://static.lichi.com/product/38642/672996e2f391525cac07d63eb8bd5517.jpg?v=3_3850343&amp;resize=size-middle" alt="" class="a-image">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="4" style="width: 494px;" role="group" aria-label="6 / 7">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAwAAAAQAAgMAAAArSNaTAAAACVBMVEX////c3Nz09PRD5yjAAAABwklEQVR42u3ZMWorMRAG4NmFhci9j2AIOUWO4MIyKn0UkTts6pTBp3zFPlKnCz98X6F6pWGkmdkqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+bX2Eb6CN6M8/zTbqO3gD23sb6y15A9c2llt0BrQRnQXLrY3tmnyJ9jbO0RdpX677e+75j9o/HnttqTFY+rzM+qz9EZsB46XqtfXYLDjfj3XGPgN9VtWe+xCse1XVHhuAqtefhT8ppp+zqmp9phbUlz6OVE6tR8/Hl2+xG4iPwP8cqOeX++CvvP0sqe3AzH6JW6/sWmi/H5dRagjWPk7R/cDS5zm6I6ujJ54teC7RW/JUomq9t3EJPv/8ydyWPhuNn07H/x84VRuVXUy3awEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Gv/AFnHNN+duNJvAAAAAElFTkSuQmCC" data-src="https://static.lichi.com/product/38642/bf19ccdefff43bfa35a87f061e40c232.jpg?v=4_3850344&amp;resize=size-middle" alt="" class="a-image">
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 494px;" role="group" aria-label="7 / 7">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAwAAAAQAAgMAAAArSNaTAAAACVBMVEX////c3Nz09PRD5yjAAAABwklEQVR42u3ZMWorMRAG4NmFhci9j2AIOUWO4MIyKn0UkTts6pTBp3zFPlKnCz98X6F6pWGkmdkqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+bX2Eb6CN6M8/zTbqO3gD23sb6y15A9c2llt0BrQRnQXLrY3tmnyJ9jbO0RdpX677e+75j9o/HnttqTFY+rzM+qz9EZsB46XqtfXYLDjfj3XGPgN9VtWe+xCse1XVHhuAqtefhT8ppp+zqmp9phbUlz6OVE6tR8/Hl2+xG4iPwP8cqOeX++CvvP0sqe3AzH6JW6/sWmi/H5dRagjWPk7R/cDS5zm6I6ujJ54teC7RW/JUomq9t3EJPv/8ydyWPhuNn07H/x84VRuVXUy3awEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Gv/AFnHNN+duNJvAAAAAElFTkSuQmCC" data-src="https://static.lichi.com/product/38642/0bdf6d47c6a1dc71af0cbd133554511c.jpg?v=0_3850342&amp;resize=size-middle" alt="" class="a-image">
                                    </div></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                        <div class="image-section">
                            <meta itemprop="image" content="https://static.lichi.com/product/38642/0bdf6d47c6a1dc71af0cbd133554511c.jpg?v=0_3850342&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38642&#39;,&#39;p_i_38642_0&#39;, 0);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38642&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38642/75d59594afc46184b13d81648095441c.jpg?v=1_3850126&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38642&#39;,&#39;p_i_38642_1&#39;, 1);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38642&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38642/563692e1a6165e0dc799126d2dacc5ff.jpg?v=2_3850127&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38642&#39;,&#39;p_i_38642_2&#39;, 2);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38642&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38642/672996e2f391525cac07d63eb8bd5517.jpg?v=3_3850343&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38642&#39;,&#39;p_i_38642_3&#39;, 3);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38642&#39;)"></div>
                            <meta itemprop="image" content="https://static.lichi.com/product/38642/bf19ccdefff43bfa35a87f061e40c232.jpg?v=4_3850344&amp;resize=size-middle">
                            <div class="section" onmouseenter="is_ready &amp;&amp; _app_.ui.product_photo_hover(&#39;p_i_b_38642&#39;,&#39;p_i_38642_4&#39;, 4);" onmouseleave="is_ready &amp;&amp; _app_.ui.product_photo_hover_out(&#39;p_i_b_38642&#39;)"></div>
                        </div>
                    </div>
                </a>
                <div class="sizes" id="product_fast_buy_select_38642">
                    <div class="size_select" onclick="is_ready &amp;&amp; _app_.ui.product_fast_buy_button(this, &#39;product_fast_buy_select_38642&#39;)">
                        Добавить                </div>
                    <div class="size_select_2">
                        <div class="title">Выберите размер</div>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80579, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">35</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80582, true);_app_.ui.product_fast_buy_button_close(this);" class="size_select">36</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80583, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">37</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80580, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">38</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80581, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">39</a>
                        <a href="javascript:void(0);" onclick="_app_.cart.fast_add(this, 80584, false);_app_.ui.product_fast_buy_button_close(this);" class="size_select not_found">40</a>
                    </div>
                </div>
            </div>
            <div class="brand_name">
                &nbsp;
            </div>
            <a href="https://lichi.com/ru/ru/product/38642">
                <div class="product_name" itemprop="name">
                    Босоножки с ремешком            </div>
                <div class="product_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                    <link itemprop="availability" href="http://schema.org/InStock">


                    <strong>

                        <span itemprop="price" content="3499">3 499</span>
                        <span itemprop="priceCurrency" content="RUR">руб.</span>
                    </strong>
                </div>
            </a>
            <div class="product_colors">
                <div class="color" title="Бежевый" style="background-color: #e2cdb5"></div>
                <a itemprop="url" href="https://lichi.com/ru/ru/product/38643">
                    <div class="color border" title="Белый" style="background-color: #ffffff">
                        <span class="sb-only">
                            Босоножки с ремешком / Белый                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<noscript>
    <hr/>
    <ul class="pagination">
        <li class="active"><a href="https://lichi.com/ru/ru/category/shoes/page-1">1</a></li>
    </ul>
</noscript>

<script>
    var $category = {"url_ajax":"category\/get_category_product_list","url_filter":"https:\/\/lichi.com\/ru\/ru\/category\/shoes","url_sort":"https:\/\/lichi.com\/ru\/ru\/category\/shoes","max_page":1,"page":1,"count":6,"category":"shoes","filter":[],"sort":"newest"}</script></div>




