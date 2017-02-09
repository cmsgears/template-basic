<?php
$params = yii\helpers\ArrayHelper::merge(
    require( dirname( dirname( __DIR__ ) ) . '/common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname( __DIR__ ),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'cmgcore/site/index',
    // Uncomment it to load all the services in case controller actions are not configured to load components on demand excluding bootstrappers
    //'bootstrap' => [ 'log', 'core', 'forms', 'snsLogin', 'newsletter', 'notify', 'foxSlider' ],
    'bootstrap' => [ 'log', 'core' ],
	'modules' => [
		'core' => [
			'class'	=> 'cmsgears\core\frontend\Module'
		],
		'forms' => [
			'class' => 'cmsgears\forms\frontend\Module'
		],
        'snslogin' => [
            'class' => 'cmsgears\social\login\admin\Module'
        ],
		'newsletter' => [
			'class' => 'cmsgears\newsletter\frontend\Module'
		],
		'notify' => [
			'class' => 'cmsgears\notify\frontend\Module'
		]
	],
    'components' => [
        'view' => [
			'theme' => [
            	'class' => 'themes\blog\Theme',
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
            'enableAutoLogin' => true,
            'loginUrl' => '@web/login',
            'identityCookie' => [ 'name' => '_identity-app', 'httpOnly' => true ]
        ],
        'session' => [
            'name' => 'cmg-basic-app'
        ],
        'errorHandler' => [
            'errorAction' => 'core/site/error'
        ],
        'log' => [
            'targets' => [
				[
                    'class' => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning' ]
                ]
            ]
        ],
        'urlManager' => [
	        'rules' => [
				// apix request rules --------------------------
				// Forms - site forms
				'apix/form/<slug:[\w\-]+>' => 'forms/apix/form/submit',
				// Core - 2 levels
				'apix/<controller:\w+>/<action:[\w\-]+>' => 'core/apix/<controller>/<action>',
				// Generic - 3 and 4 levels - must be last, since it got wildcard in prefix
				[
					'class' => 'yii\web\GroupUrlRule',
					'prefix' => 'apix/<module:\w+>',
					'routePrefix' => '<module>/apix',
					'rules' => [
						'<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
						'<pcontroller:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<pcontroller>/<controller>/<action>'
	                ]
				],
				// regular request rules -----------------------
	        	// SNS Login
	        	'sns/<controller:\w+>/<action:[\w\-]+>' => 'snslogin/<controller>/<action>',
				// Forms
				'form/<slug:[\w\-]+>' => 'forms/form/single',
				// Core Module Pages
				'<controller:\w+>/<action:[\w\-]+>' => 'core/<controller>/<action>',
				// Generic - Module Pages
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