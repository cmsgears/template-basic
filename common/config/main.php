<?php

return [
    'vendorPath' => dirname( dirname( __DIR__ ) ) . '/vendor',
    'components' => [
        'user' => [
        	'class' => 'yii\web\User',
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
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning' ]
                ]
            ]
        ],
		// CMG Modules - Core
		'factory' => [
			'class' => 'cmsgears\core\common\components\ObjectFactory'
		],
        'core' => [
        	'class' => 'cmsgears\core\common\components\Core',
        	'editorClass' => 'cmsgears\widgets\cleditor\ClEditor',
        	'rbacFilters' => [
        		'owner' => 'cmsgears\core\common\filters\OwnerFilter'
        	]
        ],
        'coreMessage' => [
        	'class' => 'cmsgears\core\common\components\MessageSource',
        ],
        'coreMailer' => [
        	'class' => 'cmsgears\core\common\components\Mailer'
        ],
        'formDesigner' => [
        	'class' => 'cmsgears\core\common\components\FormDesigner'
        ],
		'templateManager' => [
			'class' => 'cmsgears\core\common\components\TemplateManager',
			'templatesPath' => null,
			'renderers' => [
				'default' => 'Default',
				'twig' => 'Twig',
				'smarty' => 'Smarty'
			]
		],
		'eventManager' => [
			'class' => 'cmsgears\core\common\components\EventManager'
		],
		// CMG Modules - Forms
		'forms' => [
			'class' => 'cmsgears\forms\common\components\Form'
		],
		'formsMessage' => [
			'class' => 'cmsgears\forms\common\components\MessageSource',
		],
		'formsMailer' => [
			'class' => 'cmsgears\forms\common\components\Mailer'
		],
        // CMG Modules - SNS Login
        'snsLogin' => [
        	'class' => 'cmsgears\social\login\common\components\SnsLogin'
        ],
        'snsLoginMailer' => [
        	'class' => 'cmsgears\social\login\common\components\Mailer'
        ],
		// CMG Modules - Newsletter
		'newsletter' => [
			'class' => 'cmsgears\newsletter\common\components\Newsletter'
		],
		'newsletterMessage' => [
			'class' => 'cmsgears\newsletter\common\components\MessageSource'
		],
		'newsletterMailer' => [
			'class' => 'cmsgears\newsletter\common\components\Mailer'
		],
		// CMG Modules - Notify
		'notify' => [
			'class' => 'cmsgears\notify\common\components\Notify'
		],
		'notifyMessage' => [
			'class' => 'cmsgears\notify\common\components\MessageSource'
		],
		'notifyMailer' => [
			'class' => 'cmsgears\notify\common\components\Mailer'
		],
		// CMG Plugins
		'fileManager' => [
			'class' => 'cmsgears\files\components\FileManager'
		],
		'iconManager' => [
			'class' => 'cmsgears\icons\components\IconManager'
		],
		// FoxSlider
		'foxSlider' => [
			'class' => 'foxslider\common\components\Core'
		]
    ]
];