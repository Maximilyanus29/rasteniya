<div class="container" itemscope="" itemtype="http://schema.org/Article">
    <ul class="breadcrumb ">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/blog">Статьи</a></li>
        <li><a href="/blog/<?= $article->slug ?>"><?= $article->name ?></a></li>
    </ul>
    <div class="row">
        <?= $this->render('_aside') ?>

        <?= $this->render('../good/_goods', ['goods' => $goods ]) ?>



    </div>
</div>