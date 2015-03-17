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
        'foxslider' => [
            'class' => 'foxslider\module\Module'
        ]
    ],
    'components' => [
        'view' => [
            'theme' => 'themes\admin\Theme'
        ],
        'urlManager' => [
	        'rules' => [
	        	// apix request rules
	        	'apix/<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
				// regular request rules
	        	'<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
	        	'<controller:\w+>/<action:[\w\-]+>' => 'cmgcore/site/<action>',
	        	'<action:(login|dashboard)>' => 'cmgcore/site/<action>'
	        ]
		],
        'cmgCore' => [
        	'useRbac' => true,
        	'loginRedirectPage' => '/dashboard',
        	'logoutRedirectPage' => '/login',
        	'editorClass' => 'cmsgears\cleditor\ClEditor',
        ]
    ],
    'params' => $params
];

?>