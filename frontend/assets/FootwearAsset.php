<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class FootwearAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',

        'css/footwear.css',
    ];
    public $js = [
//        'js/5e6ca0857c347638a95b3cf2.js.Без названия',
//        'js/a9d9d1b0257dda96d595bd00149cccdb.min.js.Без названия',
//        'js/app.min.js.Без названия',
//        'js/config.js.Без названия',
//        'js/core.js.Без названия',
//        'js/event.js.Без названия',
//        'js/events.js.Без названия',
//        'js/identify.js.Без названия',
//        'js/js',
//        'js/libs.min.js.Без названия',
//        'js/main.2a04f3ee.js.Без названия',
//        'js/tag.js.Без названия',



    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
