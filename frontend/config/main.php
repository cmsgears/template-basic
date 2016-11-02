<?php

$params = yii\helpers\ArrayHelper::merge(
    require( dirname( dirname( __DIR__ ) ) . '/common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'core/site/index',
	'bootstrap' => [ 'log', 'core', 'forms', 'snsLogin', 'newsletter', 'notify', 'foxSlider' ],
	'modules' => [
		'core' => [
			'class'	=> 'cmsgears\core\frontend\Module'
		],
		'forms' => [
			'class' => 'cmsgears\forms\frontend\Module'
		],
		'notify' => [
			'class' => 'cmsgears\notify\frontend\Module'
		]
	],
    'components' => [
        'view' => [
			'theme' => [
            	'class' => 'themes\basic\Theme',
            	'childs' => [
            		// Child themes to override theme css and to add additional js 
            	]
			]
        ],
        'request' => [
            'csrfParam' => '_csrf-app',
		    'parsers' => [
		        'application/json' => 'yii\web\JsonParser'
		    ]
        ],
        'user' => [
            'identityCookie' => [ 'name' => '_identity-app', 'httpOnly' => true ]
        ],
        'session' => [
            'name' => 'basic-app'
        ],
        'errorHandler' => [
            'errorAction' => 'core/site/error',
        ],
        'urlManager' => [
	        'rules' => [
				// apix request rules --------------------------
				// Forms - site forms
				'apix/form/<slug:[\w\-]+>' => 'forms/apix/form/submit',
				// Core - 2 levels
				'apix/<controller:\w+>/<action:[\w\-]+>' => 'core/apix/<controller>/<action>',
				// Generic - 3 and 4 levels
				'apix/<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
				'apix/<module:\w+>/<pcontroller:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<pcontroller>/<controller>/<action>',
				// regular request rules -----------------------
	        	// SNS Login
	        	'sns/<controller:\w+>/<action:[\w\-]+>' => 'snslogin/<controller>/<action>',
				// Forms
				'form/<slug:[\w\-]+>' => 'forms/form/single',
				// Core Module Pages
				'<controller:\w+>/<action:[\w\-]+>' => 'core/<controller>/<action>',
				// Module Pages
				'<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
				// Standard Pages
				'<action:(home)>' => 'core/user/<action>',
				'<action:(login|logout|register|forgot-password|reset-password|activate-account|confirm-account)>' => 'core/site/<action>'
	        ]
		],
        'core' => [
        	'loginRedirectPage' => '/home'
        ]
    ],
    'params' => $params
];