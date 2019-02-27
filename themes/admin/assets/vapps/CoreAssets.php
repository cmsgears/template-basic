<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace themes\admin\assets\vapps;

// Yii Imports
use yii\web\AssetBundle;
use yii\web\View;

/**
 * CoreAssets registers the Velocity Apps of Core Module.
 *
 * @since 1.0.0
 */
class CoreAssets extends AssetBundle {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Path Configuration
	public $sourcePath = '@bower/cmt-velocity-apps/src';

	// Load JS
	public $js = [
		'apps/core/data.js',
		'apps/core/social.js',
		'apps/core/gallery.js',
		'apps/core/mapper.js',
		'apps/core/services/address.js',
		'apps/core/services/location.js',
		'apps/core/services/file.js',
		'apps/core/services/meta.js',
		'apps/core/services/model.js',
		'apps/core/services/user.js',
		'apps/core/controllers/main.js',
		'apps/core/controllers/address.js',
		'apps/core/controllers/location.js',
		'apps/core/controllers/file.js',
		'apps/core/controllers/meta.js',
		'apps/core/controllers/model.js',
		'apps/core/controllers/user.js'
	];

	// JS Position
	public $jsOptions = [
		'position' => View::POS_END
	];

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// CoreAssets ----------------------------

}
