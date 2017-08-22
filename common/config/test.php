<?php
return [
    'id' => 'app-common-tests',
    'basePath' => dirname( __DIR__ ),
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'cmsgears\core\common\models\entities\User'
        ]
    ]
];
