<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Provider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profit_in_percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'importFile')->fileInput() ?>


    <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
        'data' => $citites,
        'options' => ['placeholder' => 'Выбрать город'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
