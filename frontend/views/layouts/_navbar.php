<?php

    $categories = \common\models\Category::getStructCategories();

?>


<nav id="menu" class=" navbar">
    <div class="navbar-header">
        <span id="category">Каталог</span>
        <button type="button" class="btn-navbar navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse"><i class="fa fa-bars" aria-hidden="true"></i>
        </button>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">

            <?php foreach ($categories as $category): ?>

            <?php if (empty($category['childs'])): ?>

                <li>
                    <a href="/category/<?= $category['slug'] ?>"><?= $category['name'] ?></a>
                </li>

            <?php else: ?>


            <li class="has-children">
                <a href="/category/<?= $category['slug'] ?>">
                    <?= $category['name'] ?>
                    <i class="fas fa-angle-down fa-fw"></i>
                </a>

                <span class="dropdown-toggle visible-xs visible-sm">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </span>

                <div class="dropdown-menu column-1">
                    <div class="dropdown-inner row">

                        <?php foreach ($category['childs'] as $child): ?>

                        <ul class="list-unstyled col-sm-12">
                            <li>
                                <a href="/category/<?= $child['slug'] ?>">
                                    <i class="fas fa-angle-right"></i><?= $child['name'] ?>
                                </a>
                            </li>
                        </ul>

                        <?php endforeach; ?>


                    </div>
                </div>
            </li>

            <?php endif; ?>


            <?php endforeach; ?>



        </ul>
    </div>
</nav>
