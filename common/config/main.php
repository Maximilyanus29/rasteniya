<?php
return [
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@telegram' => '@vendor/danog/MadelineProto',
        '@root'   => '@app/..',
        '@imageBuffer'   => '@root/files/images/buffer',
        '@imageCache'   => '@root/files/images/cache',
        '@imageStore'   => '@root/files/images/store',
        '@image'   => '@root/files/images',


    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => '@imageStore', //path to origin images
            'imagesCachePath' => '@imageCache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@image/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
//            'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
    ],

];
