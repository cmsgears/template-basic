<?php

$params = array_merge(
	require( dirname( dirname( __DIR__ ) ) . '/common/config/params.php' ),
	require( __DIR__ . '/params.php' )
);

return [
	'id' => 'app-console',
	'basePath' => dirname(__DIR__),
	'bootstrap' => [
		'log',
		'core', 'forms', 'snsLogin', 'newsletter', 'notify',
		'foxSlider'
	],
	'controllerNamespace' => 'console\controllers',
	'modules' => [
		'core' => [
			'class' => 'cmsgears\core\frontend\Module'
		],
		'forms' => [
			'class' => 'cmsgears\forms\frontend\Module'
		],
		'snslogin' => [
			'class' => 'cmsgears\social\login\frontend\Module'
		],
		'newsletter' => [
			'class' => 'cmsgears\newsletter\frontend\Module'
		],
		'notify' => [
			'class' => 'cmsgears\notify\frontend\Module'
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
