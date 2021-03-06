<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru-RU',
    'components' => [
        'assetManager' => [
            'linkAssets' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'UsrAuth'],
                '<controller>/view/<id:\d+>' => '<controller>/view',
                '<controller>/update/<id:\d+>' => '<controller>/update',
                '<controller>/delete/<id:\d+>' => '<controller>/delete',
            ],
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\UsrAuth',
            'enableAutoLogin' => true,
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'common\components\i18n\DbMessageSource',
                    'sourceLanguage' => 'en-US',
                    'enableCaching' => false,
                    'messageTable' => 'message',
                    'sourceMessageTable' => 'source_message',
                ],
            ],
        ],
    ],
];
