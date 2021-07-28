<?php

namespace frontend\modules\provider\assets;

use frontend\assets\AppAsset;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ProviderAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        '/css/user/autocoplete.css',
//        '/css/jquery-ui.css',

    ];
    public $js = [
//        '/js/typeahead.bundle.js',
//        '/js/user/autocomplete.js',
        '/js/lk/provider-lk.js',

    ];

    public $depends = [
        AppAsset::class,

    ];
}
