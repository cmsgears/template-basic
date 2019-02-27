<?php

return [
	'yii\web\JqueryAsset' => false,
	'common' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/cmnazxrs-20181201.css' ],
		'js' => [ 'scripts/cmnazxrs-20181201.js' ],
		'depends' => [ 'cmsgears\assets\jquery\Jquery' ]
	],
	'public' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/pubazxrs-20181201.css' ],
		'js' => [ 'scripts/pubazxrs-20181201.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/prvazxrs-20181201.css' ],
		'js' => [ 'scripts/prvazxrs-20181201.js' ],
		'depends' => [ 'common' ]
	],
	'child' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/chdazxrs-20181201.css' ],
		'js' => [ 'scripts/chdazxrs-20181201.js' ],
		'depends' => [ 'common' ]
	]
];
