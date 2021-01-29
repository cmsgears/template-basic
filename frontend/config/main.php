<?php

$params = yii\helpers\ArrayHelper::merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/params.php'
);

return [
	'id' => 'app-site',
	'name' => 'Basic Demo',
	'version' => '1.0.0',
	'basePath' => dirname( __DIR__ ),
	'controllerNamespace' => 'frontend\controllers',
	'defaultRoute' => 'core/site/index',
	//'catchAll' => [ 'core/site/maintenance' ],
	'bootstrap' => [
		'log',
		'core', 'coreFactory', 'forms', 'formsFactory', 'breeze',
		'newsletter', 'newsletterFactory', 'notify', 'notifyFactory',
		'snsConnect', 'snsConnectFactory',
		'foxSlider',
		'basicCoreFactory'
	],
	'modules' => [
		'core' => [
			'class' => 'modules\core\frontend\Module'
		],
		'forms' => [
			'class' => 'cmsgears\forms\frontend\Module'
		],
		'newsletter' => [
			'class' => 'cmsgears\newsletter\frontend\Module'
		],
		'notify' => [
			'class' => 'cmsgears\notify\frontend\Module'
		],
		'snsconnect' => [
			'class' => 'cmsgears\social\connect\frontend\Module'
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
			'csrfParam' => '_csrf-basic-site',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser'
			]
		],
		'user' => [
			'identityCookie' => [
				'name' => '_identity-basic-site',
				'httpOnly' => true
			]
		],
		'session' => [
			'name' => 'basic-site'
		],
		'errorHandler' => [
			'errorAction' => 'core/site/error'
		],
		'assetManager' => [
			'bundles' => require( dirname( dirname( __DIR__ ) ) . '/themes/assets/basic/' . ( YII_ENV_PROD ? 'prod.php' : 'dev.php' ) )
		],
		'urlManager' => [
			'rules' => [
				// apix request rules --------------------------
				// Forms - site forms
				'apix/form/<slug:[\w\-]+>' => 'forms/apix/form/submit',
				// Core - 2 levels
				'apix/<controller:[\w\-]+>/<action:[\w\-]+>' => 'core/apix/<controller>/<action>',
				// Generic - 3, 4 and 5 levels - catch all
				'apix/<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
				'apix/<module:\w+>/<pcontroller:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<pcontroller>/<controller>/<action>',
				'apix/<module:\w+>/<pcontroller1:[\w\-]+>/<pcontroller2:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<pcontroller1>/<pcontroller2>/<controller>/<action>',
				// regular request rules -----------------------
				// Forms
				'form/<slug:[\w\-]+>' => 'forms/form/single',
				// Core - 2 levels
				'<controller:[\w\-]+>/<action:[\w\-]+>' => 'core/<controller>/<action>',
				// Module Pages - 3, 4 and 5 levels - catch all
				'<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
				'<module:\w+>/<pcontroller:[\w\-]+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<pcontroller>/<controller>/<action>',
				'<module:\w+>/<pcontroller1:[\w\-]+>/<pcontroller2:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<pcontroller1>/<pcontroller2>/<controller>/<action>',
				// Standard Pages
				'<action:(home|profile|calendar|account|address|settings)>' => 'core/user/<action>',
				'<action:(login|logout|register|forgot-password|reset-password|reset-password-otp|activate-account|confirm-account|feedback|testimonial|colors|theme)>' => 'core/site/<action>'
			]
		],
		'core' => [
			'loginRedirectPage' => '/home',
			'logoutRedirectPage' => '/'
		]
	],
	'params' => $params
];
