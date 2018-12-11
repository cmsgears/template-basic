<?php

return [
	'bootstrap' => [ 'gii' ],
	'modules' => [
		'gii' => 'yii\gii\Module'
	],
	'components' => [
		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			'baseUrl' => 'http://localhost/basicdemo/frontend/web'
		],
		// CMG Modules - Core
		'migration' => [
			'class' => 'cmsgears\core\common\components\Migration',
			'cmgPrefix' => 'cmg_',
			'sitePrefix' => 'basic_',
			'siteName' => 'Basic',
			'siteTitle' => 'Basic Demo',
			'siteMaster' => 'demomaster',
			'primaryDomain' => 'dev.vcdevhub.com',
			'defaultSite' => 'http://localhost/basicdemo/frontend/web',
			'defaultAdmin' => 'http://localhost/basicdemo/backend/web',
			'uploadsUrl' => 'http://localhost/basicdemo/uploads'
		]
	]
];
