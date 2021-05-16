<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Provider */

$this->title = Yii::t('app', 'Создание поставщика');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Поставщики'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'citites' => $citites,
    ]) ?>

</div>
