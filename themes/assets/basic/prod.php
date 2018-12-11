<?php

return [
	'yii\web\JqueryAsset' => false,
	'common' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/cmncmgbi-20181201.css' ],
		'js' => [ 'basic/cmncmgbi-20181201.js' ],
		'depends' => [ 'cmsgears\assets\jquery\Jquery' ]
	],
	'landing' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/ladcmgbi-20181201.css' ],
		'js' => [ 'basic/ladcmgbi-20181201.js' ],
		'depends' => [ 'common' ]
	],
	'public' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/pubcmgbi-20181201.css' ],
		'js' => [ 'basic/pubcmgbi-20181201.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/prvcmgbi-20181201.css' ],
		'js' => [ 'basic/prvcmgbi-20181201.js' ],
		'depends' => [ 'common' ]
	]
];
