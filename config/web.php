<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'QGaxtZ1JSpuTLToUARAtU6hP_y_EuT44',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' =>[
          //  'class'=>'app\components\NewUrlRule',
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules' => [
                
                'news/<year:\d{4}>/items-list' => 'news/items-list',
                [
                'pattern' => 'news/<category:\w+>/items-list',
                'route' => 'news/items-list',
                'defaults' => ['category' => 'shopping'],
                ],
                [
                'pattern'=>'<lang:\w+>/<controller>/<action>',
                'route'=>'<controller>/<action>',
                ]
            ],
        ],
    ],
    'params' => $params,
    
    
    

    
    
    
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        //'allowedIPs' => [ '127.0.0.1', '::1', '1.2.3.4']
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

    
    /**
     * 'log' => [
'traceLevel' => YII_DEBUG ? 3 : 0,
'targets' => [
[
'class' => 'yii\log\FileTarget',
'levels' => ['error', 'warning'],
],
],
],
     */



return $config;
