<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ViewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/gallery.css',

    ];
    public $js = [



        'js/gallery/modernizr.js',
        'js/gallery/jquery.mobile.min.js',
        'js/gallery/main.js',

//        'js/zoom.js',
        'js/good/view.js',


    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
        AppAsset::class,
//        'yii\bootstrap\BootstrapAsset',
    ];
}
