<?php

return [
	'yii\web\JqueryAsset' => false,
	'common' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/cmnazxrs-20200401.css' ],
		'js' => [ 'scripts/cmnazxrs-20200401.js' ],
		'depends' => [ 'cmsgears\assets\jquery\Jquery' ]
	],
	'public' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/pubazxrs-20200401.css' ],
		'js' => [ 'scripts/pubazxrs-20200401.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/prvazxrs-20200401.css' ],
		'js' => [ 'scripts/prvazxrs-20200401.js' ],
		'depends' => [ 'common' ]
	],
	'child' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/chdazxrs-20200401.css' ],
		'js' => [ 'scripts/chdazxrs-20200401.js' ],
		'depends' => [ 'common' ]
	]
];
