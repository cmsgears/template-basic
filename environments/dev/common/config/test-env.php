<?php
return yii\helpers\ArrayHelper::merge(
	require __DIR__ . '/main.php',
	require __DIR__ . '/main-env.php',
	require __DIR__ . '/test.php',
	[
		'components' => [
			'db' => [
				'class' => 'yii\db\Connection',
				'dsn' => 'mysql:host=localhost;dbname=basicdemo_test',
				'username' => 'basicdemo',
				'password' => 'Demo#Basic*60',
				'charset' => 'utf8'
			]
		]
	]
);
