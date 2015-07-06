<?php

return [
    'vendorPath' => dirname( dirname( __DIR__ ) ) . '/vendor',
    'components' => [
        'user' => [
            'identityClass' => 'cmsgears\core\common\models\entities\User',
            'enableAutoLogin' => true,
            'loginUrl' => '@web/login'
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
        'formatter' => [
        	'dateFormat' => 'yyyy-MM-dd',
        	'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss'
        ],
        'errorHandler' => [
            'errorAction' => 'cmgcore/site/error',
        ],
        'cmgCore' => [
        	'class' => 'cmsgears\core\common\components\Core'
        ],
        'cmgCoreMessage' => [
        	'class' => 'cmsgears\core\common\components\MessageSource',
        ],
        'cmgCoreMailer' => [
        	'class' => 'cmsgears\core\common\components\Mailer'
        ],
        'cmgFormsMessage' => [
        	'class' => 'cmsgears\forms\common\components\MessageSource',
        ],
        'cmgFormsMailer' => [
        	'class' => 'cmsgears\forms\common\components\Mailer'
        ],
        'fileManager' => [
        	'class' => 'cmsgears\files\components\FileManager',
        	'uploadUrl' => 'http://localhost/cmgdemobasic/uploads/'
        ]
    ]
];

?>