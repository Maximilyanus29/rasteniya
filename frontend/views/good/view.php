<?php

use frontend\components\Helper;

\frontend\assets\ViewAsset::register($this);
?>


<div class="container">

    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <?= Helper::generateBreadCrumps($good->categories) ?>

        <li><?= $good->name ?></li>
    </ul>

    <div class="row">
        <div id="content" class="col-xs-12" data-id="<?= $good->id ?>">

            <?php if ($good->provider->city_id != Helper::getCity()->id) : ?>
                <div class="alert alert-danger" role="alert">
                    Внимание! Этот товар находится в городе <?= $good->provider->city->name ?>
                </div>
            <?php endif; ?>



            <div id="product" class="row product-block">

                <div class="col-sm-12">
                    <h1 class="heading">
                        <span><?= $good->name ?></span>
                    </h1>
                </div>





                <div class="col-sm-6 col-md-5">



                    <p>
                        <input type="checkbox" id="fullscreen" />
                        <label for="fullscreen">Полный экран</label>
                    </p>
                    <!-- The container for the list of example images -->

                    <input type="hidden" data-img src="<?= $good->getImage()->getUrl() ?>">
                    <div id="links" class="links" >

                        <?php foreach ($good->getImages() as $image) : ?>
                            <a title="<?= $good->name ?>" href="<?= $image->getUrl() ?>"
                               data-srcset="
                               <?= $image->getUrl('75') ?> 75w,
                               <?= $image->getUrl('150') ?> 150w,
                               <?= $image->getUrl('100') ?> 100w,
                               <?= $image->getUrl('240') ?> 240w,
                               <?= $image->getUrl('320') ?> 320w,
                               <?= $image->getUrl('500') ?> 500w,
                               <?= $image->getUrl('640') ?> 640w,
                               <?= $image->getUrl('800') ?> 800w,
                               <?= $image->getUrl('1024') ?> 1024w,
                               <?= $image->getUrl('1600') ?> 1600w,
                               <?= $image->getUrl('2048') ?> 2048w"
                               data-gallery="">

                                <img loading="lazy"
                                     src="<?= $image->getUrl() == $good->getImage()->getUrl() ? $image->getUrl() : $image->getUrl('75x75') ?>"
                                     alt="<?= $good->name ?>">
                            </a>


                        <?php endforeach; ?>



                    </div>
                    <!-- The Gallery as lightbox dialog -->
                    <div
                            id="blueimp-gallery"
                            class="blueimp-gallery"
                            aria-label="image gallery"
                            aria-modal="true"
                            role="dialog"
                    >
                        <div class="slides" aria-live="polite"></div>
                        <h3 class="title"></h3>
                        <a
                                class="prev"
                                aria-controls="blueimp-gallery"
                                aria-label="previous slide"
                                aria-keyshortcuts="ArrowLeft"
                        ></a>
                        <a
                                class="next"
                                aria-controls="blueimp-gallery"
                                aria-label="next slide"
                                aria-keyshortcuts="ArrowRight"
                        ></a>
                        <a
                                class="close"
                                aria-controls="blueimp-gallery"
                                aria-label="close"
                                aria-keyshortcuts="Escape"
                        ></a>
                        <a
                                class="play-pause"
                                aria-controls="blueimp-gallery"
                                aria-label="play slideshow"
                                aria-keyshortcuts="Space"
                                aria-pressed="false"
                                role="button"
                        ></a>
                        <ol class="indicator"></ol>
                    </div>




                </div>


                <div class="col-sm-6 col-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">Производитель:
                                    <a data-href href="/provider/<?= $good->provider->slug ?>">
                                        <span class="provider-id" data-name="<?= $good->provider_id ?>" ><?= $good->provider->fio ?></span>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-6">Артикул: <?= $good->vendor_code ?></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <ul class="list-unstyled price">
                        <li><span data-price ><?= $good->price ?>р.</span></li>
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
                                <button type="button" class="add_to_cart button btn btn-lg"
                                        data-toggle="tooltip"
                                        title=""
                                        id="button-cart"
                                        data-city="<?= $good->provider->city->slug ?>"
                                        data-id="<?= $good->id ?>"
                                        data-original-title="В корзину"><i class="fa fa-shopping-basket"></i><span>В корзину</span>
                                </button>
                            </div>
                        </li>
                    </ul>
                    <div id="option" class="option row">
                        <div class="col-xs-12">
                            <hr>
                        </div>
<!--                        <div class="col-xs-12"><h5 class="heading"><span>Доступные варианты</span></h5></div>-->
<!--                        <div class="form-group required options_select col-xs-12 col-sm-6">-->
<!--                            <label class="control-label" for="input-option828">Вес (г)</label>-->
<!--                            <select name="option[828]" id="input-option828" class="form-control">-->
<!--                                <option value=""> --- Выберите ---</option>-->
<!--                                <option value="754">1000</option>-->
<!--                                <option value="778">3000</option>-->
<!--                            </select>-->
<!--                        </div>-->
                    </div>
                    <hr style="margin-top:0">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 visible-xs visible-sm visible-md">
                            <hr>
                        </div>
<!--                        <div class="rating col-xs-7 col-sm-8 col-md-12 col-lg-6">-->
<!--                            <i class="far fa-star"></i>-->
<!--                            <i class="far fa-star"></i>-->
<!--                            <i class="far fa-star"></i>-->
<!--                            <i class="far fa-star"></i>-->
<!--                            <i class="far fa-star"></i>-->
<!--                            <i class="fa fa-comments-o" aria-hidden="true"></i>-->
<!--                            <a href="http://opt.voodland.com/"-->
<!--                               onclick="-->
<!--                               $(&#39;a[href=\&#39;#tab-review\&#39;]&#39;).trigger(&#39;click&#39;);-->
<!--                               scroll_to(&#39;#tab-review&#39;); return false;">-->
<!--                                -->
<!--                                <span class="hidden-xs">0 отзывов</span>-->
<!--                                <span class="visible-xs">0</span>-->
<!--                            </a>-->
<!--                        </div>-->
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
<!--                <div class="col-sm-12 col-md-2">-->
<!--                    <div class="product_button btn-group hidden-xs hidden-sm">-->
<!--                        <button type="button" data-toggle="tooltip" class="btn btn-default" title=""-->
<!--                                onclick="callback(&#39;Вопрос о товаре&#39;, &#39;335&#39;);"-->
<!--                                data-original-title="Вопрос о товаре"><i class="fa fa-question"></i></button>-->
<!--                        <button type="button" data-toggle="tooltip" class="wishlist btn btn-default" title=""-->
<!--                                onclick="wishlist.add(&#39;335&#39;);" data-original-title="В закладки"><i-->
<!--                                class="fa fa-heart"></i></button>-->
<!--                        <button type="button" data-toggle="tooltip" class="compare btn btn-default" title=""-->
<!--                                onclick="compare.add(&#39;335&#39;);" data-original-title="В сравнение"><i-->
<!--                                class="fa fa-exchange-alt"></i></button>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="product_banners">-->
<!--                            <script>max_height_div('.product_banners div div');</script>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <hr class="visible-xs visible-sm">-->
<!--                </div>-->
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="http://opt.voodland.com/#tab-description" data-toggle="tab" aria-expanded="true">
                                <i class="far fa-file-alt" aria-hidden="true"></i>Описание</a>
                        </li>
                        <li class="">
                            <a href="http://opt.voodland.com/#tab-review" data-toggle="tab" aria-expanded="false"><i class="fa fa-comments" aria-hidden="true"></i>Отзывов
                                (0)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-description">
                            <span style="font-weight: bold;" data-desc >
                                <?= $good->description ?>
                            </span>

                        </div>
                        <div class="tab-pane" id="tab-review">
                            <div id="review">
                                <p>Нет отзывов об этом товаре.</p>
                                <div class="review_pagination">
                                    <div class="text-right"></div>
                                    <div class="text-right">
                                        <button class="btn btn-primary"
                                                onclick="$(&#39;#form-review&#39;).slideToggle();">Написать отзыв
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" id="form-review" action="/common/create-review" method="post">
                                <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
                                <div class="rev_form well well-sm">
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-name">Ваше имя</label>
                                            <input type="text" name="Review[username]" value="" id="input-name"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label"
                                                   for="input-review-minus"
                                                   name="Review[disadvantages]"
                                            >Достоинства:</label>
                                            <textarea name="Review[dignity]" rows="5" id="input-review-minus"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-review-plus">Недостатки:</label>
                                            <textarea name="Review[disadvantages]" rows="5" id="input-review-plus"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-review">Ваш отзыв</label>
                                            <textarea name="Review[comment]" rows="5" id="input-review"
                                                      class="form-control"></textarea>
                                            <div class="help-block">
                                                <span style="color: #FF0000;">Примечание:</span>
                                                HTML разметка не поддерживается! Используйте обычный текст.

                                                <span style="color: #FF0000;" id="review_form_hint">Необходимо заполнить все поля</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label">Рейтинг</label>
                                            <div class="review_star">
                                                <div class="rating-area">
                                                    <input type="radio" id="star-5" name="Review[rating]" value="5">
                                                    <label for="star-5" title="Оценка «5»"></label>
                                                    <input type="radio" id="star-4" name="Review[rating]" value="4">
                                                    <label for="star-4" title="Оценка «4»"></label>
                                                    <input type="radio" id="star-3" name="Review[rating]" value="3">
                                                    <label for="star-3" title="Оценка «3»"></label>
                                                    <input type="radio" id="star-2" name="Review[rating]" value="2">
                                                    <label for="star-2" title="Оценка «2»"></label>
                                                    <input type="radio" id="star-1" name="Review[rating]" value="1">
                                                    <label for="star-1" title="Оценка «1»"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right clearfix">
                                        <button type="submit" id="button-review" data-loading-text="Загрузка..."
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



            <hr>
            <p>
                <i class="fa fa-tag" data-toggle="tooltip" title="" data-original-title="Теги:"></i>
                <a href="/good/<?= $good->slug ?>"><?= $good->name ?></a>
            </p>
            <hr style="margin-bottom:20px">
        </div>
    </div>
</div>


