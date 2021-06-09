<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderCheckout */

$this->title = 'Create Order Checkout';
$this->params['breadcrumbs'][] = ['label' => 'Order Checkouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-checkout-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
