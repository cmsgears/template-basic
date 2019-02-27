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
 * NotifyAssets registers the Velocity Apps of Notify Module.
 *
 * @since 1.0.0
 */
class NotifyAssets extends AssetBundle {

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
		'apps/notify/base.js',
		'apps/notify/controllers/notification.js'
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

	// NotifyAssets --------------------------

}
