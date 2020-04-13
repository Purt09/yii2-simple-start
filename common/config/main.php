<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => 'YOUR APP CLIENT ID',
                    'clientSecret' => 'YOUR APP CLIENT SECRET',
                    'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
                ],
            ],
        ],
    ],
    'bootstrap' => ['media'],
    'modules' => [
        'media' => [
            'class' => pantera\media\Module::className(),
            'permissions' => ['admin'],
        ],
        'pages' => 'bupy7\pages\Module',
        'controllerMap' => [
            'manager' => [
                'class' => 'bupy7\pages\controllers\ManagerController',
                'as access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
            ],
        ],
        'pathToImages' => '@webroot/images',
        'urlToImages' => '@web/images',
        'pathToFiles' => '@webroot/files',
        'urlToFiles' => '@web/files',
        'uploadImage' => false,
        'uploadFile' => false,
        'addImage' => false,
        'addFile' => false,
    ],
];
