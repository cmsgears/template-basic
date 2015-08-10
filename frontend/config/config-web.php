<?php

$params = yii\helpers\ArrayHelper::merge(
    require( dirname( dirname( __DIR__ ) ) . '/common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'cmgcore/site/index',
    'bootstrap' => [ 'log', 'cmgCore' ],
    'modules' => [
        'cmgcore' => [
            'class' => 'cmsgears\core\frontend\Module'
        ],
        'cmgforms' => [
            'class' => 'cmsgears\forms\frontend\Module'
        ]
    ],
    'components' => [
        'view' => [
            'theme' => 'themes\basic\Theme'
        ],
        'urlManager' => [
	        'rules' => [
	        	// apix request rules
	        	'apix/<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
	        	'apix/<controller:(user|file)>/<action:[\w\-]+>' => 'cmgcore/apix/<controller>/<action>',
	        	'apix/<action:(login|register)>' => 'cmgcore/apix/site/<action>',
	        	'apix/<action:(contact)>' => 'cmgforms/apix/site/<action>',
				// regular request rules
	        	'<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
	        	'<action:(home)>' => 'cmgcore/user/<action>',
	        	'<action:(login|logout|register|forgot-password|reset-password|activate-account|confirm-account)>' => 'cmgcore/site/<action>',
	        	'<action:(contact|feedback)>' => 'cmgforms/site/<action>'
	        ]
		],
        'cmgCore' => [
        	'loginRedirectPage' => '/cmgcore/user/home'
        ]
    ],
    'params' => $params
];

?>