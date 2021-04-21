<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\Good */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="good-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'provider_id') ?>

    <?= $form->field($model, 'weight') ?>

    <?= $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'width') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'have_wrap') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'discount_price') ?>

    <?php // echo $form->field($model, 'vendor_code') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
