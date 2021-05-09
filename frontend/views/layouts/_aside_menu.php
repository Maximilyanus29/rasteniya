<?php

$categories = Yii::$app->db->createCommand(
    'SELECT category.id, category.name, category.parent_id, category.slug, COUNT(good.id) as count FROM `category`
                    LEFT join good on category.id = good.category_id
                    GROUP by category.id
                    ORDER by category.id
'
)

    ->queryAll();


?>

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
