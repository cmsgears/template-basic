<?php

$params = yii\helpers\ArrayHelper::merge(
    require( dirname( dirname( __DIR__ ) ) . '/common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
    'id' => 'app-admin',
    'basePath' => dirname( __DIR__ ),
    'controllerNamespace' => 'admin\controllers',
    'defaultRoute' => 'cmgcore/site/index',
    'bootstrap' => [ 'log', 'cmgCore' ],
    'modules' => [
        'cmgcore' => [
            'class' => 'cmsgears\core\admin\Module'
        ],
        'cmgforms' => [
            'class' => 'cmsgears\forms\admin\Module'
        ]
    ],
    'components' => [
        'view' => [
            'theme' => 'themes\admin\Theme'
        ],
        'urlManager' => [
	        'rules' => [
	        	// apix request rules
	        	'apix/<controller:(user|file)>/<action:[\w\-]+>' => 'cmgcore/apix/<controller>/<action>',
	        	'apix/<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
				// regular request rules
	        	'<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
	        	'<action:(login|logout|dashboard)>' => 'cmgcore/site/<action>'
	        ]
		],
        'cmgCore' => [
        	'loginRedirectPage' => '/dashboard',
        	'logoutRedirectPage' => '/login'
        ],
        'sidebar' => [
        	'class' => 'cmsgears\core\admin\components\Sidebar',
        	'modules' => [ 'cmgcore' ]
        ],
        'dashboard' => [
        	'class' => 'cmsgears\core\admin\components\Dashboard',
        	'modules' => [ 'cmgcore' ]
        ]
    ],
    'params' => $params
];

?>