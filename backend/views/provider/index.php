<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Provider */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Поставщики";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provider-index">
    <p>
        <?= Html::a(Yii::t('app', 'Создать поставщика'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'name',
            'address',
            'profit_in_percent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
