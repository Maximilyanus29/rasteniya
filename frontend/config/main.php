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
                'good/sale' => 'good/sale',
                'good/search' => 'good/search',
                'blog/<slug:[a-zA-Z-]+>' => 'blog/view',

                'good/<provider:[a-zA-Z-]+>/<slug:[-\w+]+>' => 'good/view',

                'category/<slug:[a-zA-Z-]+>' => 'good/category',



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

        'cart' => [
            'class' => 'devanych\cart\Cart',
            'storageClass' => 'devanych\cart\storage\SessionStorage',
            'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
            'params' => [
                'key' => 'cart',
                'expire' => 604800,
                'productClass' => 'common\models\Good',
                'productFieldId' => 'id',
                'productFieldPrice' => 'price',
            ],
        ],

        'favorite' => [
            'class' => 'devanych\cart\Cart',
            'storageClass' => 'devanych\cart\storage\SessionStorage',
            'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
            'params' => [
                'key' => 'favorite',
                'expire' => 604800,
                'productClass' => 'common\models\Good',
                'productFieldId' => 'id',
                'productFieldPrice' => 'price',
            ],
        ],

        'compare' => [
            'class' => 'devanych\cart\Cart',
            'storageClass' => 'devanych\cart\storage\SessionStorage',
            'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
            'params' => [
                'key' => 'compare',
                'expire' => 604800,
                'productClass' => 'common\models\Good',
                'productFieldId' => 'id',
                'productFieldPrice' => 'price',
            ],
        ],

    ],
    'modules' => [
        'local' => [
            'class' => 'frontend\modules\local\Module',
            // ... другие настройки модуля ...
        ],
        'user' => [
            'class' => 'frontend\modules\user\Module',
        ],
        'provider' => [
            'class' => 'frontend\modules\provider\Module',
        ],
    ],
    'params' => $params,
];
