<?php
return yii\helpers\ArrayHelper::merge(
	require( __DIR__ . '/../../common/config/test-env.php' ),
	require( __DIR__ . '/main.php' ),
	require( __DIR__ . '/main-env.php' ),
	require( __DIR__ . '/test.php' ),
	[
		// Additionals
	]
);
