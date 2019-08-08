<?php
return [
    'id' => 'app-console-tests',
    'basePath' => dirname( __DIR__ ),
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'cmsgears\core\common\models\entities\User'
        ]
    ]
];
