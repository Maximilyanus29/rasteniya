<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

frontend\modules\user\assets\UserAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\Provider */
/* @var $form ActiveForm */
?>
<div class="reg-shop-form">

    <?php $form = ActiveForm::begin(); ?>





        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'address') ?>

    <div class="for-off-autocomplete-chrome">
        <label class="control-label" for="provider-address">* Город</label>
        <input id="city" type="text" class="form-control" placeholder="Выберите город" autocomplete="off" <input onfocus="this.setAttribute('type', 'text');" type="text">>
        <div class="hidden"></div>
    </div>



    <?= $form->field($model, 'city_id')->hiddenInput(['placeholder'=>'Выберите город','id'=>'provider-city_id'])->label(false)?>



    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- reg-shop-form -->
