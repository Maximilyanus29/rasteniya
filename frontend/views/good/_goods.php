<?php foreach ($goods as $good): ?>

    <div class="product-layout product-grid col-lg-4 col-md-6 col-sm-6 col-xs-12" data-id="<?= $good->id ?>">
        <div class="product-thumb transition">
            <div class="image">
                <a href="/good/<?= $good->provider->slug ?>/<?= $good->slug ?>" data-href>
                    <img data-img src="<?= $good->getImage()->getUrl('540x400') ?>" alt="<?= $good->name ?>" title="<?= $good->name ?>" class="img-responsive">
                </a>
            </div>

            <div class="caption">
                <a href="/good/<?= $good->provider->slug ?>/<?= $good->slug ?>" data-name ><?= $good->name ?> </a>
                <p class="description" style="height: 80px;" data-desc><?= $good->description ?>..</p>
                <div id="option_406" class="option" style="height: 0px;"></div>
<!--                <div class="rating">-->
<!--                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>-->
<!--                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>-->
<!--                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>-->
<!--                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>-->
<!--                    <span class="fa fa-stack"><i class="far fa-star fa-stack-2x"></i></span>-->
<!--                    <sup><a onclick="location=&#39;http://opt.voodland.com/semena/semena-sosny-obyknovennoj-#tab-review&#39;"></a></sup>										</div>-->
                <p class="price" data-price>
                    <?= !empty($good->discount_price) ? $good->discount_price : $good->price ?>
                </p>
            </div>

            <div class="cart" data-id="<?= $good->id ?>">
                <button type="button"
                        class="add_to_cart button btn btn-default"
                        data-toggle="tooltip"
                        data-action="cart"
                        data-city="<?= $good->provider->city->slug ?>"
                        data-original-title="В корзину">
                    <i class="fa fa-shopping-basket"></i>
                    <span class="hidden-sm">В корзину</span>
                </button>
<!--                <button type="button"-->
<!--                        class="wishlist btn btn-default"-->
<!--                        data-toggle="tooltip"-->
<!--                        data-action="favorite"-->
<!--                        data-original-title="В закладки">-->
<!--                    <i class="fa fa-heart"></i>-->
<!--                </button>-->
<!--                <button type="button"-->
<!--                        class="compare btn btn-default"-->
<!--                        data-toggle="tooltip"-->
<!--                        data-action="compare"-->
<!--                        data-original-title="В сравнение">-->
<!--                    <i class="fa fa-exchange-alt"></i>-->
<!--                </button>-->
            </div>
        </div>
    </div>
<?php endforeach; ?>