<?php

return [
	'bootstrap' => [ 'gii' ],
	'modules' => [
		'gii' => 'yii\gii\Module'
	],
	'components' => [
		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			'baseUrl' => 'https://dev.vcdevhub.com/basicdemo/frontend/web'
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
			'defaultSite' => 'https://dev.vcdevhub.com/basicdemo/frontend/web',
			'defaultAdmin' => 'https://dev.vcdevhub.com/basicdemo/backend/web',
			'uploadsUrl' => 'https://dev.vcdevhub.com/basicdemo/uploads'
		]
	]
];
