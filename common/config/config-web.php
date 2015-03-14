<?php

return [
    'vendorPath' => dirname( dirname( __DIR__ ) ) . '/vendor',
    'components' => [
        'user' => [
            'identityClass' => 'cmsgears\core\common\models\entities\User',
            'enableAutoLogin' => true,
            'loginUrl' => 'login'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
		],
        'request' => [
		    'parsers' => [
		        'application/json' => 'yii\web\JsonParser'
		    ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'cmgcore/site/error',
        ],
        'cmgCore' => [
        	'class' => 'cmsgears\core\common\components\Core'
        ],
        'cmgCoreMailer' => [
        	'class' => 'cmsgears\core\common\components\Mailer'
        ],
        'fileManager' => [
        	'class' => 'cmsgears\core\common\components\FileManager',
        	'uploadDirectory' => '<update directory path>',
        	'uploadUrl' => '<update upload directory url>'
        ]
    ]
];

?>