<?php

return [
	'yii\web\JqueryAsset' => false,
	'common' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/cmnbzxrs-20170816.css' ],
		'js' => [ 'scripts/cmnbzxrs-20170816.js' ],
		'depends' => [ 'cmsgears\core\common\assets\Jquery' ]
	],
	'landing' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/ladbzxrs-20170816.css' ],
		'js' => [ 'scripts/ladbzxrs-20170816.js' ],
		'depends' => [ 'common' ]
	],
	'public' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/pubbzxrs-20170816.css' ],
		'js' => [ 'scripts/pubbzxrs-20170816.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/prvbzxrs-20170816.css' ],
		'js' => [ 'scripts/prvbzxrs-20170816.js' ],
		'depends' => [ 'common' ]
	]
];
