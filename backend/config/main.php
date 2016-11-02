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
    'bootstrap' => [ 'log', 'core', 'forms', 'snsLogin', 'newsletter', 'notify', 'foxSlider' ],
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
        ],
    ],
    'components' => [
        'view' => [
			'theme' => [
            	'class' => 'themes\admin\Theme',
            	'childs' => [
            		// Child themes to override theme css and to add additional js 
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
            'identityCookie' => [ 'name' => '_identity-admin', 'httpOnly' => true ]
        ],
        'session' => [
            'name' => 'basic-admin'
        ],
        'errorHandler' => [
            'errorAction' => 'core/site/error',
        ],
        'urlManager' => [
			'rules' => [
				// APIX Rules
				'apix/<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
				'apix/<controller:\w+>/<action:[\w\-]+>' => 'core/apix/<controller>/<action>',
				// Regular Rules
				'<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
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