<?php

$models  = \common\models\Provider::find()->all();

?>


<aside id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs ">
    <div class="list-group">
        <?php foreach ($models as $model) : ?>
            <a href="/blog/<?= $model->slug ?>" class="list-group-item"> <?= $model->name ?></a>
        <?php endforeach; ?>
    </div>
</aside>