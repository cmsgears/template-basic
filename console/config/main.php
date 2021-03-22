<?php

$params = array_merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/params.php'
);

return [
	'id' => 'app-console',
	'basePath' => dirname( __DIR__ ),
	'bootstrap' => [
		'log',
		'core', 'coreFactory', 'forms', 'formsFactory', 'breeze',
		'newsletter', 'newsletterFactory', 'notify', 'notifyFactory',
		'snsConnect', 'snsConnectFactory',
		'foxSlider',
		'basicCoreFactory',
		'core-console'
	],
	'controllerNamespace' => 'console\controllers',
	'controllerMap' => [
		'fixture' => [
			'class' => 'yii\console\controllers\FixtureController',
			'namespace' => 'common\fixtures'
		]
	],
	'modules' => [
		// Console modules
		'core-console' => [
			'class' => 'cmsgears\core\console\Module'
		]
	],
	'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning', 'info' ],
					// 'categories' => [ 'cmsgears\*', 'console\*', '<project>\*' ]
                    'categories' => [ 'cmsgears\*', 'console\*' ]
                ]
            ]
        ]
	],
	'params' => $params
];
