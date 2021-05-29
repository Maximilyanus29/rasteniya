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
        "css/blueimp-gallery.css",
        "css/blueimp-gallery-indicator.css",
        "css/blueimp-gallery-video.css",
        "css/demo/demo.css",

    ];

    public $js = [



        'js/gallery/modernizr.js',
        'js/gallery/jquery.mobile.min.js',
        'js/gallery/main.js',



        "js/blueimp-helper.js",
        "js/blueimp-gallery.js",
        "js/blueimp-gallery-fullscreen.js",
        "js/blueimp-gallery-indicator.js",
        "js/blueimp-gallery-video.js",
        "js/blueimp-gallery-youtube.js",
        "js/vendor/jquery.js",
        "js/jquery.blueimp-gallery.js",
        "js/demo/demo.js",





        'js/good/view.js',


    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
        AppAsset::class,


//        'yii\bootstrap\BootstrapAsset',
    ];
}
