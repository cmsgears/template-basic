<?php
return [
    'id' => 'app-site-tests',
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets'
        ],
        'urlManager' => [
            'showScriptName' => true
        ],
		'request' => [
			'cookieValidationKey' => 'test'
		]
    ]
];
