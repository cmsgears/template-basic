<?php
// Common resources required by Applications
Yii::setAlias( '@common', dirname( __DIR__ ) );
Yii::setAlias( '@modules', dirname( dirname( __DIR__ ) ) . '/modules' );
Yii::setAlias( '@templates', dirname( dirname( __DIR__ ) ) . '/templates' );
Yii::setAlias( '@themes', dirname( dirname( __DIR__ ) ) . '/themes' );
Yii::setAlias( '@widgets', dirname( dirname( __DIR__ ) ) . '/widgets' );
Yii::setAlias( '@uploads', dirname( dirname( __DIR__ ) ) . '/uploads' );

// Applications
Yii::setAlias( '@console', dirname( dirname( __DIR__ ) ) . '/console' );
Yii::setAlias( '@backend', dirname( dirname( __DIR__ ) ) . '/backend' );
Yii::setAlias( '@frontend', dirname( dirname( __DIR__ ) ) . '/frontend' );
Yii::setAlias( '@rest', dirname( dirname( __DIR__ ) ) . '/rest' );
