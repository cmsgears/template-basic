<?php

return [
    'vendorPath' => dirname( dirname( __DIR__ ) ) . '/vendor',
    'components' => [
    	// Yii Components ----------------
    	// Need user component in console apps to assign user in charge to apply db changes using services having author behavior.
        'user' => [
        	'class' => 'yii\web\User',
            'identityClass' => 'cmsgears\core\common\models\entities\User'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
		],
		// Service factory primarily used to locate and use model services, but it can be used for other models related to service operations.
		// Controller must specify the modules required for actions in order to initialise the modules on demand.
		'factory' => [
			'class' => 'cmsgears\core\common\components\ObjectFactory'
		],
		// Core Module -------------------
        'core' => [
        	'class' => 'cmsgears\core\common\components\Core',
        	'editorClass' => 'cmsgears\widgets\cleditor\ClEditor',
        	'rbacFilters' => [
        		'owner' => 'cmsgears\core\common\filters\OwnerFilter'
        	]
        ],
        // Mail components having pre-defined methods to send mails
        'mail' => [
        	'class' => 'cmsgears\core\common\components\Mailer',
        	// Child mail components loaded on demand
        	'components' => [
        		'forms' => [
        			'class' => 'cmsgears\forms\common\components\Mailer'
        		],
        		'snsLogin' => [
        			'class' => 'cmsgears\social\login\common\components\Mailer'
        		],
        		'newsletter' => [
        			'class' => 'cmsgears\newsletter\common\components\Mailer'
        		],
        		'notify' => [
        			'class' => 'cmsgears\notify\common\components\Mailer'
        		]
        	]
        ],
        // Message components having pre-defined messages to show warnings and errors
        'message' => [
        	'class' => 'cmsgears\core\common\components\MessageSource',
        	// Child message components loaded on demand
        	'components' => [
        		'forms' => [
        			'class' => 'cmsgears\forms\common\components\MessageSource'
        		],
        		'newsletter' => [
        			'class' => 'cmsgears\newsletter\common\components\MessageSource'
        		],
        		'notify' => [
        			'class' => 'cmsgears\notify\common\components\MessageSource'
        		]
        	]
        ],
        'formDesigner' => [
        	'class' => 'cmsgears\core\common\components\FormDesigner'
        ],
		'templateManager' => [
			'class' => 'cmsgears\core\common\components\TemplateManager',
			'templatesPath' => null,
			'renderers' => [
				'default' => 'Default',
				//'twig' => 'Twig',
				//'smarty' => 'Smarty'
			]
		],
		'eventManager' => [
			'class' => 'cmsgears\core\common\components\EventManager'
		],
		// Forms Module ------------------
		'forms' => [
			'class' => 'cmsgears\forms\common\components\Form'
		],
        // SNS Login Module --------------
        'snsLogin' => [
        	'class' => 'cmsgears\social\login\common\components\SnsLogin'
        ],
		// Newsletter Module -------------
		'newsletter' => [
			'class' => 'cmsgears\newsletter\common\components\Newsletter'
		],
		// Notify Module -----------------
		'notify' => [
			'class' => 'cmsgears\notify\common\components\Notify'
		],
		// CMG Plugins -------------------
		'fileManager' => [
			'class' => 'cmsgears\files\components\FileManager'
		],
		'iconManager' => [
			'class' => 'cmsgears\icons\components\IconManager'
		],
		// FoxSlider CMG Module ----------
		'foxSlider' => [
			'class' => 'foxslider\common\components\Core'
		]
    ]
];