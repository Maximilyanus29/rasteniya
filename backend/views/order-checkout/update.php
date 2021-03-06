<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderCheckout */

$this->title = 'Update Order Checkout: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Order Checkouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-checkout-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
