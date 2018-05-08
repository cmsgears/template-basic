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
	'bootstrap' => [
		'log',
		'core', 'forms', 'snsConnect', 'newsletter', 'notify',
		'foxSlider'
	],
    'modules' => [
        'core' => [
            'class' => 'cmsgears\core\admin\Module'
        ],
		'forms' => [
            'class' => 'cmsgears\forms\admin\Module'
        ],
        'snsconnect' => [
            'class' => 'cmsgears\social\connect\admin\Module'
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
				'childs' => [ 'themes\adminchild\Theme' ]
			]
		],
		'request' => [
			'csrfParam' => '_csrf-cmg-basic-admin',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser'
			]
		],
		'user' => [
			'identityCookie' => [ 'name' => '_identity-cmg-basic-admin', 'httpOnly' => true ]
		],
		'session' => [
			'name' => 'cmg-basic-admin'
		],
		'errorHandler' => [
			'errorAction' => 'core/site/error'
		],
		'assetManager' => [
			'bundles' => require( __DIR__ . '/' . ( YII_ENV_PROD ? 'assets-prod.php' : 'assets-dev.php' ) )
		],
		'urlManager' => [
			'rules' => [
				// api request rules ---------------------------
				// Generic - 3, 4 and 5 levels - catch all
				'api/<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/api/<controller>/<action>',
				'api/<module:\w+>/<controller:[\w\-]+>/<pcontroller:[\w\-]+>/<action:[\w\-]+>' => '<module>/api/<controller>/<pcontroller>/<action>',
				'api/<module:\w+>/<pcontroller1:\w+>/<pcontroller2:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/api/<pcontroller1>/<pcontroller2>/<controller>/<action>',
				// apix request rules --------------------------
				// Core - 2 levels
				'apix/<controller:[\w\-]+>/<action:[\w\-]+>' => 'core/apix/<controller>/<action>',
				// Generic - 3, 4 and 5 levels - catch all
				'apix/<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
				'apix/<module:\w+>/<pcontroller:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<pcontroller>/<controller>/<action>',
				'apix/<module:\w+>/<pcontroller1:[\w\-]+>/<pcontroller2:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<pcontroller1>/<pcontroller2>/<controller>/<action>',
				// regular request rules -----------------------
				// Core - 2 levels
				'<controller:[\w\-]+>/<action:[\w\-]+>' => 'core/<controller>/<action>',
				// Module Pages - 3, 4 and 5 levels - catch all
				'<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
				'<module:\w+>/<pcontroller:[\w\-]+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<pcontroller>/<controller>/<action>',
				'<module:\w+>/<pcontroller1:[\w\-]+>/<pcontroller2:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<pcontroller1>/<pcontroller2>/<controller>/<action>',
				// Standard Pages
				'<action:(login|logout|dashboard|forgot-password|reset-password|activate-account)>' => 'core/site/<action>'
			]
		],
        'core' => [
        	'loginRedirectPage' => '/dashboard',
        	'logoutRedirectPage' => '/login'
        ],
        'sidebar' => [
        	'class' => 'cmsgears\core\admin\components\Sidebar',
        	'modules' => [ 'foxslider', 'forms', 'core', 'notify', 'newsletter' ],
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
