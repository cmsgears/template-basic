<?php

$params = array_merge(
    require( __DIR__ . '/../../common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
	'id' => 'app-console',
	'basePath' => dirname( __DIR__ ),
	// Bootstrap all possible components for console apps in order to load all services available for all console controllers
	'bootstrap' => [ 'log', 'core', 'forms', 'snsLogin', 'newsletter', 'notify', 'foxSlider' ],
	'controllerNamespace' => 'console\controllers',
	'modules' => [
		// Console specific modules based on project needs
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
        ],
		// CMG Modules - Core
		'migration' => [
			'class' => 'cmsgears\core\common\components\Migration',
			'siteName' => 'CMSGears',
			'siteTitle' => 'CMSGears Demo',
			'primaryDomain' => 'cmsgears.com',
			'defaultSite' => 'http://demo.cmsgears.com/templates/basic/admin/',
			'defaultAdmin' => 'http://demo.cmsgears.com/templates/basic/',
			'uploadsUrl' => 'http://localhost/cmgdemobasic/uploads/'
		]
	],
	'params' => $params
];