<?php

return [
	'yii\web\JqueryAsset' => false,
	'common' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/cmnazxrs-20170816.css' ],
		'js' => [ 'scripts/cmnazxrs-20170816.js' ],
		'depends' => [ 'cmsgears\core\common\assets\Jquery' ]
	],
	'public' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/pubazxrs-20170816.css' ],
		'js' => [ 'scripts/pubazxrs-20170816.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/prvazxrs-20170816.css' ],
		'js' => [ 'scripts/prvazxrs-20170816.js' ],
		'depends' => [ 'public' ]
	],
	'child' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/chdazxrs-20170816.css' ],
		'js' => [ 'scripts/chdazxrs-20170816.js' ],
		'depends' => [ 'common' ]
	]
];
