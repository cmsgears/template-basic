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
            'tests/codeception/bin/yii'
        ],
        'setCookieValidationKey' => [
            'backend/config/config-env.php',
            'frontend/config/config-env.php',
        ],
        'createSymlink' => [
        	// add symlinks here
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
            'backend/config/config-env.php',
            'frontend/config/config-env.php',
        ],
        'createSymlink' => [
        	// add symlinks here
        ]
    ],
];

?>