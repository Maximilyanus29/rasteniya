<?php

    $articles = \common\models\Article::find()->all();

?>

<aside id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs ">
    <div class="list-group">
        <?php foreach ($articles as $article) : ?>
            <a href="/blog/<?= $article->slug ?>" class="list-group-item"> <?= $article->name ?></a>
        <?php endforeach; ?>
    </div>

</aside>