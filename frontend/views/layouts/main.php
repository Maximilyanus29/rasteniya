<?php
/* @var $this yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use frontend\assets\CustomAsset;
use yii\helpers\Html;

CustomAsset::register($this);

$providers = \common\models\Provider::find()->all();

$request = Yii::$app->request;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html dir="ltr" lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <base href=".">
    <meta name="description" content="декоративные-растения-для-ландшафтного-дизайна, купить-растения, большой-выбор-саженцев-из-ведущих-питомников, посадочный-материал-для-городского-и-загородного-озеленения, вудлэнд, выбор-и-покупка-растений-от-проверенных-поставщиков, маркет-растений, саженцы-хвойных-растений, саженцы-лиственных-растений, сеянцы, саженцы-плодовых-растений, купить-саженцы-растений, где-купить-растения, купить-декоративные-растения">
    <meta name="keywords" content="декоративные-растения, выбор-и-покупка-растений-от-проверенных-поставщиков, купить-растения, о-декоративных-растениях, декоративными-растениями, купить-саженцы, саженцы, купить-сеянцы, купить-хвойные-растения, лиственные, кустарники, декоративные-кустарники, цветущие-кустарники, магазин-растений, садовый-центр, растения-для-сада, декоративные-деревья, хвойные-растения, растения-купить, продажа-растений, посадочный-материал, питомник-саженцев, озеленение, интернет-магазин-растений, плодовые-саженцы, саженцы-деревьев, купить-деревья, деревья, саженцы-плодовых-деревьев, растения-продажа, питомник-растений, декоративное-растение, интернет-магазин-саженцев, вудлэнд, woodlend, woodland, посадка-деревьев, посадка-растений">

    <?php $this->head() ?>

</head>
<body class="common-home" style="">
<?php $this->beginBody() ?>

<?= $this->render('_nav'); ?>

<?= $this->render('_header'); ?>

<div id="main_content">
    <?= $content ?>
</div>

<?= $this->render('_footer'); ?>


<!-- Modal -->
<div  id="change_city" >
    <div class="myclass">
    <?php foreach ($providers as $provider) : ?>

        <li><a href="//<?= $provider->city->slug ?>.rasteniya"><?= $provider->city->name ?></a></li>
    <?php endforeach; ?>
    </div>
</div>

<div  id="modal-info" class="modal-info" >
    <p></p>
</div>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage()?>
