<?php
defined( 'YII_DEBUG' ) or define( 'YII_DEBUG', true );
defined( 'YII_ENV' ) or define( 'YII_ENV', 'dev' );

require( __DIR__ . '/../../vendor/autoload.php' );
require( __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php' );
require( __DIR__ . '/../../common/config/bootstrap.php' );

$config = yii\helpers\ArrayHelper::merge(
    require( __DIR__ . '/../../common/config/config-web.php' ),
    require( __DIR__ . '/../../common/config/config-env.php' ),
    require( __DIR__ . '/../config/config-web.php' ),
    require( __DIR__ . '/../config/config-env.php' )
);

$application = new yii\web\Application( $config );
$application->run();
?>