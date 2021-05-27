<div class="container">
    <ul class="breadcrumb">
        <li><a href="http://opt.voodland.com/"><i class="fa fa-home"></i></a></li>
        <li><a href="http://opt.voodland.com/index.php?route=blog/latest">Статьи</a></li>
    </ul>
    <div class="row">
        <?= $this->render('_aside') ?>

        <div class="row categorywall covers">
            <?php foreach ($providers as $provider) : ?>
                <div class="product-layout-1" style="float:left;width:290px;padding:0 10px">
                    <div class="categorywall_thumbnail product-thumb">
                        <div class="image">
                            <a rel="nofollow" href="/provider/<?=$provider['slug'] ?>">
                                <img class="img-responsive" src="<?=$provider->getImage()->getUrl('200x200') ?>" alt="<?=$provider['name'] ?> "></a>
                        </div>
                        <h4 style="padding-left:10px">
                            <a class="category_name" href="/provider/<?=$provider['slug'] ?>"><?=$provider['name'] ?> </a>
                        </h4>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>