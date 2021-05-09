<div class="container">
    <ul class="breadcrumb">
        <li><a href="http://opt.voodland.com/"><i class="fa fa-home"></i></a></li>
        <li><a href="http://opt.voodland.com/index.php?route=blog/latest">Статьи</a></li>
    </ul>
    <div class="row">
        <?= $this->render('_aside') ?>


        <div id="content" class="col-sm-9 showcase-list"><h1>Блог </h1>
            <div class="row">
                <div class="col-xs-12">
                    <hr>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 hidden-xs"></div>
                <div class="col-xs-6 col-sm-5 col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-3 text-right">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort"></i><span
                                    class="hidden-xs hidden-sm hidden-md">Сортировка:</span></span>
                        <select id="input-sort" class="form-control" onchange="location = this.value;">
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;blog_category_id=&amp;sort=p.sort_order&amp;order=ASC">
                                По умолчанию
                            </option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;blog_category_id=&amp;sort=pd.name&amp;order=ASC">
                                Названию (по возрастанию)
                            </option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;blog_category_id=&amp;sort=pd.name&amp;order=DESC">
                                Названию (по убыванию)
                            </option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;sort=p.date_added&amp;order=ASC">
                                Дата (по возрастанию)
                            </option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;sort=p.date_added&amp;order=DESC"
                                    selected="selected">Дата (по убыванию)
                            </option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;sort=rating&amp;order=DESC">
                                Рейтингу (по убыванию)
                            </option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;sort=rating&amp;order=ASC">
                                Рейтингу (по возрастанию)
                            </option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;sort=p.viewed&amp;order=DESC">
                                Просмотрам (по убыванию)
                            </option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;sort=p.viewed&amp;order=ASC">
                                Просмотрам (по возрастанию)
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-right">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-eye"></i><span
                                    class="hidden-xs hidden-sm hidden-md">На странице:</span></span>
                        <select id="input-limit" class="form-control" onchange="location = this.value;">
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;limit=20"
                                    selected="selected">20
                            </option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;limit=25">25</option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;limit=50">50</option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;limit=75">75</option>
                            <option value="http://opt.voodland.com/index.php?route=blog/latest&amp;limit=100">100
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="article_list col-xs-12">

                    <?php foreach ($articles as $article) : ?>
                    <div class="image_description row">
                        <div class="image col-xs-12 col-sm-12 col-md-3"><img
                                    src="http://opt.voodland.com/image/cache/catalog/Voodland%20Market%20/%20%D0%B1%D0%B5%D0%B7%20%D0%BD%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F-300x300.png"
                                    alt="Помогите нам стать лучше!!!" class="img-responsive"
                                    onclick="location='/blog/<?= $article->slug ?>'"
                                    style="cursor:pointer"></div>
                        <div style="margin:0 0 10px" class="col-xs-12 visible-xs"></div>
                        <div class="col-xs-12 col-sm-12 col-md-9">
                            <h4 onclick="location='/blog/<?= $article->slug ?>'"
                                style="cursor:pointer"><?= $article->name ?></h4>
                            <div class="description">&nbsp; <?= mb_strlen($article->description) > 20 ? substr($article->description, 0, 20).".." : $article->description?></div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <hr>
                                </div>
                                <div class="col-xs-3"><a
                                            href="/blog/<?= $article->slug ?>">подробнее</a>
                                </div>
                                <div class="posted col-xs-9">
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i><?= date('d.m.Y', $article->created_at) ?></span>
<!--                                    <span><i class="fa fa-eye" aria-hidden="true"></i>1130</span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; ?>

                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 text-left"></div>

            </div>


<!--            <div class="row product_carousel">-->
<!--                <h3 class="heading"><span>Последние Статьи</span></h3>-->
<!--                <div class="article_wrapper">-->
<!--                    <div class="article_to_category_1044540686 owl-carousel owl-theme"-->
<!--                         style="opacity: 1; display: block;">-->
<!--                        <div class="owl-wrapper-outer">-->
<!--                            <div class="owl-wrapper"-->
<!--                                 style="width: 2400px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px);">-->
<!--                                <div class="owl-item" style="width: 240px;">-->
<!--                                    <div class="article_module">-->
<!--                                        <div class="image">-->
<!--                                            <a onclick="location='http://opt.voodland.com/blog-voodland/pomogite-nam-stat-luchshe%21%21%21'"-->
<!--                                               title="Помогите нам стать лучше!!!"><img-->
<!--                                                        src="http://opt.voodland.com/image/cache/catalog/Voodland%20Market%20/%20%D0%B1%D0%B5%D0%B7%20%D0%BD%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F-200x200.png"-->
<!--                                                        class="img-responsive" alt="Помогите нам стать лучше!!!"></a>-->
<!--                                        </div>-->
<!--                                        <div class="name" style="height: 36px;"><a-->
<!--                                                    href="http://opt.voodland.com/blog-voodland/pomogite-nam-stat-luchshe%21%21%21"-->
<!--                                                    title="">Помогите нам стать лучше!!!</a></div>-->
<!--                                        <div class="description" style="height: 72px;">&nbsp; В настоящее время я хочу-->
<!--                                            сделать наш сайт е..<br><a-->
<!--                                                    onclick="location.href='http://opt.voodland.com/blog-voodland/pomogite-nam-stat-luchshe%21%21%21';"-->
<!--                                                    style="text-decoration:underline">подробнее</a></div>-->
<!--                                        <hr>-->
<!--                                        <div class="posted">-->
<!--                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>30.01.2019</span>-->
<!--                                            <span><i class="fa fa-eye" aria-hidden="true"></i>1130</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="owl-item" style="width: 240px;">-->
<!--                                    <div class="article_module">-->
<!--                                        <div class="image">-->
<!--                                            <a onclick="location='http://opt.voodland.com/blog-voodland/moja-zdorovaja-planeta'"-->
<!--                                               title="Voodland Моя здоровая Планета"><img-->
<!--                                                        src="http://opt.voodland.com/image/cache/catalog/%20%D0%B7%D0%B4%D0%BE%D1%80%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%BF%D0%BB%D0%B0%D0%BD%D0%B5%D1%82%D0%B0/%20%D0%9C%D0%BE%D1%8F%20%D0%B7%D0%B4%D0%BE%D1%80%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%BF%D0%BB%D0%B0%D0%BD%D0%B5%D1%82%D0%B0%201-200x200.jpg"-->
<!--                                                        class="img-responsive" alt="Voodland Моя здоровая Планета"></a>-->
<!--                                        </div>-->
<!--                                        <div class="name" style="height: 36px;"><a-->
<!--                                                    href="http://opt.voodland.com/blog-voodland/moja-zdorovaja-planeta"-->
<!--                                                    title="">Voodland Моя здоровая Планета</a></div>-->
<!--                                        <div class="description" style="height: 72px;">В 2019 году мы начинаем новое-->
<!--                                            движение, социальный..<br><a-->
<!--                                                    onclick="location.href='http://opt.voodland.com/blog-voodland/moja-zdorovaja-planeta';"-->
<!--                                                    style="text-decoration:underline">подробнее</a></div>-->
<!--                                        <hr>-->
<!--                                        <div class="posted">-->
<!--                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>12.12.2018</span>-->
<!--                                            <span><i class="fa fa-eye" aria-hidden="true"></i>20152</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="owl-item" style="width: 240px;">-->
<!--                                    <div class="article_module">-->
<!--                                        <div class="image">-->
<!--                                            <a onclick="location='http://opt.voodland.com/blog-voodland/posadka-kizilnika-blestjashhego-v-belgorode'"-->
<!--                                               title="Посадка кизильника блестящего в Белгороде"><img-->
<!--                                                        src="http://opt.voodland.com/image/cache/catalog/blog/kizilnik-v-belgorode/image013-200x200.jpg"-->
<!--                                                        class="img-responsive"-->
<!--                                                        alt="Посадка кизильника блестящего в Белгороде"></a>-->
<!--                                        </div>-->
<!--                                        <div class="name" style="height: 36px;"><a-->
<!--                                                    href="http://opt.voodland.com/blog-voodland/posadka-kizilnika-blestjashhego-v-belgorode"-->
<!--                                                    title="">Посадка кизильника блестящего в Белгороде</a></div>-->
<!--                                        <div class="description" style="height: 72px;">В этой статье хочу поделиться с-->
<!--                                            Вами информацией, ..<br><a-->
<!--                                                    onclick="location.href='http://opt.voodland.com/blog-voodland/posadka-kizilnika-blestjashhego-v-belgorode';"-->
<!--                                                    style="text-decoration:underline">подробнее</a></div>-->
<!--                                        <hr>-->
<!--                                        <div class="posted">-->
<!--                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>06.10.2017</span>-->
<!--                                            <span><i class="fa fa-eye" aria-hidden="true"></i>1843</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="owl-item" style="width: 240px;">-->
<!--                                    <div class="article_module">-->
<!--                                        <div class="image">-->
<!--                                            <a onclick="location='http://opt.voodland.com/blog-voodland/thailand'"-->
<!--                                               title="Путешествие в Тайланд"><img-->
<!--                                                        src="http://opt.voodland.com/image/cache/catalog/blog/tailand/image009-200x200.jpg"-->
<!--                                                        class="img-responsive" alt="Путешествие в Тайланд"></a>-->
<!--                                        </div>-->
<!--                                        <div class="name" style="height: 36px;"><a-->
<!--                                                    href="http://opt.voodland.com/blog-voodland/thailand" title="">Путешествие-->
<!--                                                в Тайланд</a></div>-->
<!--                                        <div class="description" style="height: 72px;">Здравствуйте!Сегодня я хочу-->
<!--                                            рассказать и показать ..<br><a-->
<!--                                                    onclick="location.href='http://opt.voodland.com/blog-voodland/thailand';"-->
<!--                                                    style="text-decoration:underline">подробнее</a></div>-->
<!--                                        <hr>-->
<!--                                        <div class="posted">-->
<!--                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>04.05.2017</span>-->
<!--                                            <span><i class="fa fa-eye" aria-hidden="true"></i>2225</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="owl-item" style="width: 240px;">-->
<!--                                    <div class="article_module">-->
<!--                                        <div class="image">-->
<!--                                            <a onclick="location='http://opt.voodland.com/blog-voodland/georgia'"-->
<!--                                               title="Грузия"><img-->
<!--                                                        src="http://opt.voodland.com/image/cache/catalog/blog/geografia-orders/1-200x200.png"-->
<!--                                                        class="img-responsive" alt="Грузия"></a>-->
<!--                                        </div>-->
<!--                                        <div class="name" style="height: 36px;"><a-->
<!--                                                    href="http://opt.voodland.com/blog-voodland/georgia"-->
<!--                                                    title="">Грузия</a></div>-->
<!--                                        <div class="description" style="height: 72px;">За время нашей работы, в течение-->
<!--                                            3-х лет, мы отпра..<br><a-->
<!--                                                    onclick="location.href='http://opt.voodland.com/blog-voodland/georgia';"-->
<!--                                                    style="text-decoration:underline">подробнее</a></div>-->
<!--                                        <hr>-->
<!--                                        <div class="posted">-->
<!--                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>19.02.2017</span>-->
<!--                                            <span><i class="fa fa-eye" aria-hidden="true"></i>2165</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="owl-controls clickable">-->
<!--                            <div class="owl-buttons">-->
<!--                                <div class="owl-prev"><i class="fa fa-chevron-left"></i></div>-->
<!--                                <div class="owl-next"><i class="fa fa-chevron-right"></i></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->


            <script type="text/javascript">
                module_type_view('carousel', '.article_to_category_1044540686');
            </script>
        </div>
    </div>
</div>