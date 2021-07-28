<?php
use yii\helpers\Url;


$absoluteUrl = Yii::$app->request->getPathInfo();
//var_dump($searchModel->sort);die;

?>

<div class="container">

    <ul class="breadcrumb ">
        <li><a href="http://opt.voodland.com/"><i class="fa fa-home"></i></a></li>
        <li><?= $mainCategory->name ?></li>
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

                <?php foreach ($categories as $category):
                    if($category['parent_id']==0):
                    ?>




                    <a href="/category/<?= $category['slug'] ?>"
                       class="list-group-item <?= $mainCategory->id ==  $category['id'] || $mainCategory->parent_id == $category['id']  ? "active" : "" ?>"
                    >

                        <?= $category['name'] ?>

                        (<?= $category['count'] ?>)


                    </a>

                        <?php foreach ($categories as $subcategory):
                        if($category['parent_id']!==0&&$subcategory['parent_id']==$category['id']):
                            ?>




                            <a href="/category/<?= $subcategory['slug'] ?>"
                               class="list-group-item <?= $mainCategory->id ==  $subcategory['id'] || $mainCategory->parent_id == $subcategory['id']  ? "active" : "" ?>"
                            >
                                -

                                <?= $subcategory['name'] ?>

                                (<?= $subcategory['count'] ?>)
                            </a>




                        <?php endif;
                    endforeach; ?>


                <?php endif;
                endforeach; ?>

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
        <div id="content" class="col-sm-8 col-md-8 col-lg-9">
            <h1 class="heading"><span><?= $mainCategory->name ?></span></h1>
            <div class="row">
                <div class="category-info">
                    <div class="col-xs-12">
                        <hr>
                        <div class="image">
                            <img src="<?= $mainCategory->getImage()->getUrl('80x80') ?>" alt="<?= $mainCategory->name ?>" title="<?= $mainCategory->name ?>" class="img-thumbnail">
                        </div>
                        <div class="description">
                            <p>
                                <span style="font-weight: bold;"><?= $mainCategory->name ?></span>
                                <p><?= $mainCategory->name ?></p>
                                <br>
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="category_list row">
                <?php foreach ($categories as $category):
                    if($category['parent_id']!==0 && $category['parent_id'] == $mainCategory->id ):
                        ?>


                        <div class="category col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <a href="/category/<?= $category['slug'] ?>">
                                <p style="height: 14px;"><?= $category['name'] ?> (<?= $category['count'] ?>)</p>
                            </a>
                        </div>



                    <?php endif;
                endforeach; ?>


            </div>
<!--            <p style="margin:0">-->
<!--                <a href="http://opt.voodland.com/index.php?route=product/compare" id="compare-total">Сравнение товаров (0)</a>-->
<!--            </p>-->
            <div class="row">

                <div class="col-xs-12"><hr></div>

                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 hidden-xs"><div class="btn-group"></div></div>

                <div class="col-xs-6 col-sm-5 col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-3 text-right">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort"></i><span class="hidden-xs hidden-sm hidden-md">Сортировка:</span></span>
                        <select id="input-sort" class="form-control" onchange="sort(this);">

                            <option value="price" <?= ($searchModel->sort == 'price') && (empty($searchModel->order)) ? 'selected' : ''?> >По умолчанию</option>
                            <option value="name" <?= ($searchModel->sort == 'name')  ? 'selected' : ''?>>Название (А - Я)</option>
                            <option value="-name" <?= ($searchModel->sort == '-name') ? 'selected' : ''?>>Название (Я - А)</option>
                            <option value="price" <?= ($searchModel->sort == 'price')  ? 'selected' : ''?>>Цена (низкая &gt; высокая)</option>
                            <option value="-price" <?= ($searchModel->sort == '-price') ? 'selected' : ''?>>Цена (высокая &gt; низкая)</option>
                            <option value="-rating" <?= ($searchModel->sort == '-rating') ? 'selected' : ''?>>Рейтинг (начиная с высокого)</option>
                            <option value="rating" <?= ($searchModel->sort == 'rating') ? 'selected' : ''?>>Рейтинг (начиная с низкого)</option>
                            <option value="vendor_code" <?= ($searchModel->sort == 'vendor_code') ? 'selected' : ''?>>Код Товара (А - Я)</option>
                            <option value="-vendor_code" <?= ($searchModel->sort == '-vendor_code') ? 'selected' : ''?>>Код Товара (Я - А)</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-right">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-eye"></i><span class="hidden-xs hidden-sm hidden-md">Показать:</span></span>
                        <select id="input-limit" class="form-control" onchange="pagination(this)">
                            <option value="15" <?= intval($searchModel->limit) == 15 ? 'selected' : ''?>>15</option>
                            <option value="25" <?=intval($searchModel->limit) == 25 ? 'selected' : ''?>>25</option>
                            <option value="50" <?=intval($searchModel->limit) == 50 ? 'selected' : ''?>>50</option>
                            <option value="75" <?=intval($searchModel->limit) == 75 ? 'selected' : ''?>>75</option>
                            <option value="100" <?=intval($searchModel->limit) == 100 ? 'selected' : ''?>>100</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12"><hr></div>
            </div>

            <div class="products-block row">
                <?= $this->render('_goods', ['goods' => $goods]) ?>
            </div>

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
