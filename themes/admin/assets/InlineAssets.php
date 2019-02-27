<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace themes\admin\assets;

// Yii Imports
use yii\helpers\Url;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * InlineAssets registers the global variables.
 *
 * @since 1.0.0
 */
class InlineAssets extends AssetBundle {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	public function registerAssetFiles( $view ) {

		parent::registerAssetFiles( $view );

		$rootUrl = Url::toRoute( '/', true );

		$siteUrl = "var siteUrl	= '$rootUrl';
					var ajaxUrl	= '" . $rootUrl ."apix/';
					var fileUploadUrl	= '" . $rootUrl . "apix/file/file-handler';";

		$view->registerJs( $siteUrl, View::POS_END );
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// InlineAssets --------------------------

}
