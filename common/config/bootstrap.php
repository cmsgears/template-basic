<?php
// Common resources required by Yii Applications
Yii::setAlias( 'common', dirname( __DIR__ ) );
Yii::setAlias( 'themes', dirname( dirname( __DIR__ ) ) . '/themes' );
Yii::setAlias( 'uploads', dirname( dirname( __DIR__ ) ) . '/uploads' );

// Yii Applications
Yii::setAlias( 'console', dirname( dirname( __DIR__ ) ) . '/console' );
Yii::setAlias( 'admin', dirname( dirname( __DIR__ ) ) . '/admin' );
Yii::setAlias( 'frontend', dirname( dirname( __DIR__ ) ) . '/frontend' );
?>