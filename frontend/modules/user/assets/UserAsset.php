<?php

namespace frontend\modules\user\assets;

use backend\assets\AppAsset;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class UserAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/user/autocoplete.css',
        '/css/jquery-ui.css',

    ];
    public $js = [
        'js/jquery-ui.js',

        '/js/typeahead.bundle.js',
        '/js/user/autocomplete.js',

    ];

    public $depends = [
        AppAsset::class,

    ];
}
