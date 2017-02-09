<?php

$params = yii\helpers\ArrayHelper::merge(
    require( __DIR__ . '/../../common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
    'id' => 'app-admin',
    'basePath' => dirname( __DIR__ ),
    'controllerNamespace' => 'admin\controllers',
    'defaultRoute' => 'core/site/index',
    // Uncomment it to load all the services in case controller actions are not configured to load components on demand excluding bootstrappers
    //'bootstrap' => [ 'log', 'core', 'forms', 'snsLogin', 'newsletter', 'notify', 'foxSlider' ],
    'bootstrap' => [ 'log', 'core' ],
    'modules' => [
        'core' => [
            'class' => 'cmsgears\core\admin\Module'
        ],
		'forms' => [
            'class' => 'cmsgears\forms\admin\Module'
        ],
        'snslogin' => [
            'class' => 'cmsgears\social\login\admin\Module'
        ],
        'newsletter' => [
            'class' => 'cmsgears\newsletter\admin\Module'
        ],
        'notify' => [
            'class' => 'cmsgears\notify\admin\Module'
        ],
        'foxslider' => [
            'class' => 'foxslider\admin\Module'
        ]
    ],
    'components' => [
        'view' => [
			'theme' => [
            	'class' => 'themes\admin\Theme',
            	'childs' => [
            		// Child themes
            		// Override parent theme css
            		// Add additional js
            	]
			]
        ],
        'request' => [
            'csrfParam' => '_csrf-admin',
		    'parsers' => [
		        'application/json' => 'yii\web\JsonParser'
		    ]
        ],
        'user' => [
            'enableAutoLogin' => true,
            'loginUrl' => '@web/login',
            'identityCookie' => [ 'name' => '_identity-admin', 'httpOnly' => true ]
        ],
        'session' => [
            'name' => 'cmg-basic-admin'
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
				// APIX Rules ---------------------------
				// Catch All -------------
				'apix/<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
				// Core Module -----------
				'apix/<controller:\w+>/<action:[\w\-]+>' => 'core/apix/<controller>/<action>',
				// Regular Rules ------------------------
				// Catch All -------------
				'<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
				// Common Actions --------
				'<action:(login|logout|dashboard|forgot-password|reset-password|activate-account)>' => 'core/site/<action>'
			]
		],
        'core' => [
        	'loginRedirectPage' => '/dashboard',
        	'logoutRedirectPage' => '/login'
        ],
        'sidebar' => [
        	'class' => 'cmsgears\core\admin\components\Sidebar',
        	'modules' => [ 'notify', 'foxslider', 'forms', 'core', 'newsletter' ],
        	'plugins' => [
        		'socialMeta' => [ 'twitter-meta', 'facebook-meta' ],
        		'fileManager' => [ 'file' ]
        	]
        ],
        'dashboard' => [
        	'class' => 'cmsgears\core\admin\components\Dashboard',
        	'modules' => [ 'core' ]
        ]
    ],
    'params' => $params
];