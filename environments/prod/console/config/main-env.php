<?php

return [
	'components' => [
		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			'baseUrl' => 'https://demo.cmsgears.com/template/basic'
		],
		// CMG Modules - Core
		'migration' => [
			'class' => 'cmsgears\core\common\components\Migration',
			'cmgPrefix' => 'cmg_',
			'sitePrefix' => 'basic_',
			'siteName' => 'Basic',
			'siteTitle' => 'Basic Demo',
			'siteMaster' => 'demomaster',
			'primaryDomain' => 'cmsgears.com',
			'defaultSite' => 'https://demo.cmsgears.com/template/basic',
			'defaultAdmin' => 'https://demo.cmsgears.com/template/basic/admin',
			'uploadsUrl' => 'https://demo.cmsgears.com/template/basic/uploads'
		]
	]
];
