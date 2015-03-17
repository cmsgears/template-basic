<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=cmgdemobasic',
            'username' => 'cmgdemobasic',
            'password' => 'cmgdemobasic',
            'charset' => 'utf8'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail'
        ]
    ]
];

?>