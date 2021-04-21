<?php
use yii\bootstrap\Nav;

?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->username ?></p>
                    <a href="<?= $directoryAsset ?>/#">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                                        class="fa fa-search"></i></button>
                            </span>
            </div>
        </form>

        <?=
        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    [
                        'label' => '<span class="fa fa-angle-down"></span><span class="text-info">Menu Yii2</span>',
                        'url' => '#'
                    ],
                    ['label' => '<span class="fa fa-file-code-o"></span> Gii', 'url' => ['/gii']],
                    ['label' => '<span class="fa fa-dashboard"></span> Debug', 'url' => ['/debug']],
                ],
            ]
        );
        ?>

        <!-- You can delete next ul.sidebar-menu. It's just demo. -->

        <ul class="sidebar-menu">

            <li >
                <a href="/good/index">
                    <i class="fa fa-dashboard"></i> <span>Товары</span>
                </a>
            </li>
            <li >
                <a href="/provider/index">
                    <i class="fa fa-dashboard"></i> <span>Поставщики</span>
                </a>
            </li>
            <li >
                <a href="/category/index">
                    <i class="fa fa-dashboard"></i> <span>Типы товаров</span>
                </a>
            </li>


        </ul>

    </section>

</aside>
