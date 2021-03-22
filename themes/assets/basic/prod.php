<?php

return [
	'yii\web\JqueryAsset' => false,
	'lazy' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'js' => [ 'basic/lzycmgbi-20200401.js' ]
	],
	'fa' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/fawcmgbi-20200401.css' ]
	],
	'common' => [
		'class' => 'cmsgears\core\common\base\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/cmncmgbi-20200401.css' ],
		'js' => [ 'basic/cmncmgbi-20200401.js' ],
		'depends' => [ 'lazy', 'fa', 'cmsgears\assets\jquery\Jquery' ]
	],
	'landing' => [
		'class' => 'cmsgears\core\common\base\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/ladcmgbi-20200401.css' ],
		'js' => [ 'basic/ladcmgbi-20200401.js' ],
		'depends' => [ 'common' ]
	],
	'public' => [
		'class' => 'cmsgears\core\common\base\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/pubcmgbi-20200401.css' ],
		'js' => [ 'basic/pubcmgbi-20200401.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'cmsgears\core\common\base\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'basic/prvcmgbi-20200401.css' ],
		'js' => [ 'basic/prvcmgbi-20200401.js' ],
		'depends' => [ 'common' ]
	]
];
