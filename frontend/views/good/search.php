<div class="container">
    <ul class="breadcrumb ">
        <li><a href="http://opt.voodland.com/"><i class="fa fa-home"></i></a></li>
        <li>
            <a href="http://opt.voodland.com/index.php?route=product/search&amp;search=семе&amp;description=true">Поиск</a>
        </li>
    </ul>
    <div class="row">
        <?= $this->render('@app/views/layouts/_aside_menu') ?>

        <div id="content" class="col-sm-8 col-md-8 col-lg-9">

            <?php if ($issetInThisCity === false) : ?>
                <div class="alert alert-danger" role="alert">
                    Внимание! В вашем городе нет таких товаров, показаны товары с других городов
                </div>
            <?php endif; ?>

            <h1 class="heading">
                <span>Поиск - <?= $searchModel->search ?></span>
            </h1>
            <label class="control-label" for="input-search">Поиск</label>

            <form action="/good/search">

                <div class="row">
                    <div class="col-sm-4"><input type="text" name="search" value="<?= $searchModel->search ?>" placeholder="Ключевые слова"
                                                 id="input-search" class="form-control"></div>
                    <div class="col-sm-3">
                        <select name="GoodSearch[category_id]" class="form-control">
                            <option>Все категории</option>
                            <?php $categories = \common\models\Category::find()->all();
                                foreach ($categories as $category):
                            ?>
                                <option value="<?= $category->id ?>" <?= !empty($searchModel->category_id) && $searchModel->category_id == $category->id? "selected" : ""?>><?= $category->name ?></option>

                            <?php endforeach; ?>

                            <option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Акация (Робиния)</option>

                        </select>
                    </div>

                </div>


                <p>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="GoodSearch[with_description]" value="1" id="description" <?= !empty($searchModel->with_description) ? "checked" : ""?>>Искать в описании товаров
                    </label>
                </p>
                <input value="Поиск" type="submit" id="button-search" class="btn btn-primary">
                <hr>
                <h3 class="heading">
                    <span>Товары, соответствующие критериям поиска</span></h3>
                <p style="margin:0">
                    <a href="http://opt.voodland.com/index.php?route=product/compare" id="compare-total">Сравнение товаров (2)</a>
                </p>


                <?= $this->render('_sort', ['searchModel'=> $searchModel]) ?>

            </form>



            <div class="row">

                <?php if (!empty($goods)) : ?>
                    <?= $this->render('_goods', ['goods' => $goods]) ?>
                <?php else: ?>
                    <p style="font-size: 4rem"> Товаров в вашем городе не найдено</p>
                <?php endif; ?>

                <h2>Товары из других городов</h2>
                <?= $this->render('_goods', ['goods' => $recommendedGoods]) ?>



            </div>
            <div class="pagination_wrap row">
                <div class="col-sm-6 text-left"></div>
             </div>


        </div>
    </div>
</div>
