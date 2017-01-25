<?php
// Common resources required by Yii Applications
Yii::setAlias( '@common', dirname( __DIR__ ) );
Yii::setAlias( '@themes', dirname( dirname( __DIR__ ) ) . '/themes/' );
Yii::setAlias( '@widgets', dirname( dirname( __DIR__ ) ) . '/widgets' );
Yii::setAlias( '@uploads', dirname( dirname( __DIR__ ) ) . '/uploads/' );

// Yii Applications
Yii::setAlias( '@console', dirname( dirname( __DIR__ ) ) . '/console' );
Yii::setAlias( '@backend', dirname( dirname( __DIR__ ) ) . '/backend' );
Yii::setAlias( '@frontend', dirname( dirname( __DIR__ ) ) . '/frontend' );
