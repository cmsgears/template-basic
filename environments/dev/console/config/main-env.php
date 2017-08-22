<?php

return [
	'bootstrap' => [ 'gii' ],
	'modules' => [
		'gii' => 'yii\gii\Module'
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
		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			'baseUrl' => 'http://localhost/cmgdemobasic/frontend/web'
		],
		// CMG Modules - Core
		'migration' => [
			'class' => 'cmsgears\core\common\components\Migration',
			'cmgPrefix' => 'cmg_',
			'appPrefix' => 'cmg_',
			'siteName' => 'CMSGears',
			'siteTitle' => 'CMSGears Demo',
			'siteMaster' => 'demomaster',
			'primaryDomain' => 'cmsgears.com',
			'defaultSite' => 'http://localhost/cmgdemobasic/frontend/web',
			'defaultAdmin' => 'http://localhost/cmgdemobasic/backend/web',
			'uploadsUrl' => 'http://localhost/cmgdemobasic/uploads'
		]
	]
];
