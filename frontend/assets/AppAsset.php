<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'https://pro.fontawesome.com/releases/v5.10.0/css/all.css',
        'css/stylesheet.css',
//        'css/font-awesome.min.css',
        'css/elements_0.css',
        'css/progroman.citymanager.css',
        'css/categorywall.css',
        'css/custom_footer.css',
        'css/notification.css',
        'css/subscribe.css',
    ];
    public $js = [

        'js/tag.js',
//        'js/jquery-2.1.1.min.js',
        'js/bootstrap.min.js',
        'js/common.js',
        'js/jquery.progroman.autocomplete.js',
        'js/jquery.progroman.citymanager.js',
        'js/owl.carousel.min.js',
        'js/subscribe.js',



    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
