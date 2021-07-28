<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Good */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Товары";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-index">

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'name',
            [
                'attribute'=> 'provider_id',
                'value'=> function($model){
                   return $model->provider->username;
                }
            ],
            'weight',
            'height',
            'width',
            'volume',
            //'have_wrap',
            'quantity',
//            'slug',
            'price',
//            'discount_price',
            'vendor_code',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
