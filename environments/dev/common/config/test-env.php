<?php

$config = yii\helpers\ArrayHelper::merge(
	require( __DIR__ . '/main.php' ),
	require( __DIR__ . '/main-env.php' ),
	require( __DIR__ . '/test.php' ),
	[
		'components' => [
			'db' => [
				'class' => 'yii\db\Connection',
				'dsn' => 'mysql:host=localhost;dbname=cmgdemobasic',
				'username' => 'cmgdemobasic',
				'password' => 'Cmg#Basic*60',
				'charset' => 'utf8'
			]
		]
	]
);

return $config;