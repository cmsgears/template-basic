<?php

return [
	'yii\web\JqueryAsset' => false,
	'lazy' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'js' => [ 'basic/lzycmgbi-20190402.js' ]
	],
	'fa' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/fawcmgbi-20190402.css' ]
	],
	'common' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/cmncmgbi-20190402.css' ],
		'js' => [ 'basic/cmncmgbi-20190402.js' ],
		'depends' => [ 'lazy', 'fa', 'cmsgears\assets\jquery\Jquery' ]
	],
	'landing' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/ladcmgbi-20190402.css' ],
		'js' => [ 'basic/ladcmgbi-20190402.js' ],
		'depends' => [ 'common' ]
	],
	'public' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/pubcmgbi-20190402.css' ],
		'js' => [ 'basic/pubcmgbi-20190402.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/prvcmgbi-20190402.css' ],
		'js' => [ 'basic/prvcmgbi-20190402.js' ],
		'depends' => [ 'common' ]
	]
];
