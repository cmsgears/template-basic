<?php

return [
	'Development' => [
		'path' => 'dev',
		'setWritable' => [
			'backend/runtime',
			'backend/web/assets',
			'frontend/runtime',
			'frontend/web/assets',
			'console/runtime',
			'rest/runtime',
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
	'Alpha' => [
		'path' => 'alpha',
		'setWritable' => [
			'backend/runtime',
			'backend/web/assets',
			'frontend/runtime',
			'frontend/web/assets',
			'console/runtime',
			'rest/runtime',
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
			'console/runtime',
			'rest/runtime',
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
