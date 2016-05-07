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
    'modules' => [
        'cmgcore' => [
            'class' => 'cmsgears\core\admin\Module'
        ]
    ],
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'cmsgears\core\common\models\entities\User',
            'enableAutoLogin' => true,
            'loginUrl' => '@web/login'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning' ]
                ],
            ],
        ],
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'timeFormat' => 'HH:mm:ss',
            'datetimeFormat' => "yyyy-MM-dd HH:mm:ss"
        ],
        'cmgCore' => [
            'class' => 'cmsgears\core\common\components\Core'
        ],
        'cmgCoreMessage' => [
            'class' => 'cmsgears\core\common\components\MessageSource',
        ],
        'cmgCoreMailer' => [
            'class' => 'cmsgears\core\common\components\Mailer'
        ],
		'fileManager' => [
            'class' => 'cmsgears\files\components\FileManager'
        ],
        'cmgFormsMessage' => [
        	'class' => 'cmsgears\forms\common\components\MessageSource',
        ],
        'cmgFormsMailer' => [
        	'class' => 'cmsgears\forms\common\components\Mailer'
        ]
    ],
    'params' => $params
];

?>