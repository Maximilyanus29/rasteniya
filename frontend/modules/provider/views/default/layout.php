<div class="container">
    <ul class="breadcrumb">
        <li><a href="http://opt.voodland.com/"><i class="fa fa-home"></i></a></li>
        <li><a href="http://opt.voodland.com/index.php?route=account/account">Личный кабинет</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">

            <?= $this->render($view, ['model'=>$model]) ?>

        </div>
        <aside id="column-right" class="col-sm-4 col-md-4 col-lg-3 hidden-xs ">
            <?= $this->render('_aside') ?>
        </aside>
    </div>
</div>