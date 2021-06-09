<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [

            'name',
            'slug',

        ],
    ]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <img src="<?= $model->getImage()->getUrl() ?>" alt="">





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
