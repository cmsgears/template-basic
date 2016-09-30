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
                    'levels' => [ 'error', 'warning' ],
                ],
            ]
        ],
        'cmgCore' => [
        	'class' => 'cmsgears\core\common\components\Core',
        	'editorClass' => 'cmsgears\widgets\cleditor\ClEditor'
        ],
        'cmgCoreMessage' => [
        	'class' => 'cmsgears\core\common\components\MessageSource',
        ],
        'cmgCoreMailer' => [
        	'class' => 'cmsgears\core\common\components\Mailer'
        ],
		'formDesigner' => [
        	'class' => 'cmsgears\core\common\components\FormDesigner'
        ],
        'fileManager' => [
        	'class' => 'cmsgears\files\components\FileManager'
        ],
        'iconManager' => [
        	'class' => 'cmsgears\icons\components\IconManager'
        ],
        'templateSource' => [
        	'class' => 'cmsgears\core\common\components\TemplateSource',
        	'templatesPath' => null,
        	'renderers' => [
        		'default' => 'Default'
        	]
        ],
        'cmgFormsMessage' => [
        	'class' => 'cmsgears\forms\common\components\MessageSource',
        ],
        'cmgFormsMailer' => [
        	'class' => 'cmsgears\forms\common\components\Mailer'
        ]
    ]
];

?>