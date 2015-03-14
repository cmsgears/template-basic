<?php

return [
    'Development' => [
        'path' => 'dev',
        'setWritable' => [
            'admin/runtime',
            'admin/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
        ],
        'setExecutable' => [
            'yii',
            'tests/codeception/bin/yii'
        ],
        'setCookieValidationKey' => [
            'admin/config/config-env.php',
            'frontend/config/config-env.php',
        ],
    ],
    'Production' => [
        'path' => 'prod',
        'setWritable' => [
            'admin/runtime',
            'admin/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
        ],
        'setExecutable' => [
            'yii'
        ],        
        'setCookieValidationKey' => [
            'admin/config/config-env.php',
            'frontend/config/config-env.php',
        ],
    ],
];

?>