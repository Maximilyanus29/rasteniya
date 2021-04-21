<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                'category/<slug:[a-zA-Z-]+>' => 'good/category',

                'good/<slug:\w+>' => 'good/view',


//                '//<city:[a-zA-Z]+>.rasteniya' => 'local/default/index',

//                '' => 'site/index',
//                'http://admin.example.com/login' => 'admin/user/login',
//                '//<city:\w+>.rasteniya/' => 'local/default/index',


//                'http://<city>.rastenitya/<controller>/<action>' => 'locale/<controller>/<action>',
//                'http://<city:\w+>.rastenitya/<action>' => 'site/<action>',
//                'http://<city:\w+>.rastenitya/<controller>' => '<controller>/index',
//                'http://<city:\w+>.rastenitya/' => 'site/index',

//                'categories' => 'category/index',
//                'category/<categories:[\w_\/-]+>' => 'category/category',
//
//                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
    ],
    'modules' => [
        'local' => [
            'class' => 'frontend\modules\local\Module',
            // ... другие настройки модуля ...
        ],
    ],
    'params' => $params,
];
