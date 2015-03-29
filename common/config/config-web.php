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
        'cmgFileManager' => [
        	'class' => 'cmsgears\core\common\components\FileManager',
        	'uploadDirectory' => '/office/development/project-files/cdn/cmsgears/',
        	'uploadUrl' => '/cdn/cmsgears/'
        ],
        'cmgCoreMessage' => [
        	'class' => 'cmsgears\core\common\components\MessageDbCore',
        ],
        'cmgCoreMailer' => [
        	'class' => 'cmsgears\core\common\components\MailerCore'
        ],
        'cmgFormsMessage' => [
        	'class' => 'cmsgears\forms\common\components\MessageDbForms',
        ],
        'cmgFormsMailer' => [
        	'class' => 'cmsgears\forms\common\components\MailerForms'
        ]
    ]
];

?>