<?php

$params = array_merge(
    require( dirname( dirname( __DIR__ ) ) . '/common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [ 'log', 'cmgCore' ],
    'controllerNamespace' => 'console\controllers',
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning']
                ],
            ],
        ]
    ],
    'params' => $params
];

?>