<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CustomAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'css/iziModal.min.css',

    ];
    public $js = [

        "js/iziModal.min.js",
        "js/endcustom.js",



    ];
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $depends = [
        AppAsset::class,

    ];
}
