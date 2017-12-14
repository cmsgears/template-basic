<?php

return [
	'components' => [
		'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=basicdemo',
			'username' => 'basicdemo',
			'password' => 'Demo#Basic*60',
			'charset' => 'utf8'
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail'
		]
	]
];
