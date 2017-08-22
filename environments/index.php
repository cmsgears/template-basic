<?php

return [
	'Development' => [
		'path' => 'dev',
		'setWritable' => [
			'backend/runtime',
			'backend/web/assets',
			'frontend/runtime',
			'frontend/web/assets',
			'uploads'
		],
		'setExecutable' => [
			'yii',
			'yii_test'
		],
		'setCookieValidationKey' => [
			'backend/config/main-env.php',
			'frontend/config/main-env.php',
		]
	],
	'Production' => [
		'path' => 'prod',
		'setWritable' => [
			'backend/runtime',
			'backend/web/assets',
			'frontend/runtime',
			'frontend/web/assets',
			'uploads'
		],
		'setExecutable' => [
			'yii'
		],
		'setCookieValidationKey' => [
			'backend/config/main-env.php',
			'frontend/config/main-env.php',
		]
	]
];
