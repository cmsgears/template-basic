<?php

return [
	'yii\web\JqueryAsset' => false,
	'public' => [
		'class' => 'themes\admin\assets\PublicAssets'
	],
	'private' => [
		'class' => 'themes\admin\assets\PrivateAssets'
	],
	'cmtjs' => [
		'class' => 'themes\admin\assets\CmtJsAssets'
	],
	'child' => [
		'class' => 'themes\adminchild\assets\ChildAssets'
	]
];
