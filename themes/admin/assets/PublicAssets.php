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
use yii\web\AssetBundle;
use yii\web\View;

/**
 * PublicAssets registers the public assets required for public pages.
 *
 * @since 1.0.0
 */
class PublicAssets extends AssetBundle {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Path Configuration
	public $sourcePath = '@themes/admin/resources';

	// Load css
	public $css = [
		'styles/public.css'
	];

	// CSS Position
	public $cssOptions = [
		'position' => View::POS_HEAD
	];

	// Load JS
	public $js = [
		// vendor
		// templates
		'scripts/templates/public.js',
		// scripts
		'scripts/main.js',
		'scripts/search.js',
		// apix
		'scripts/apix/public.js',
		// apps
		'scripts/apps/public.js'
	];

	// JS Position
	public $jsOptions = [
		'position' => View::POS_END
	];

	// Dependent Assets
	public $depends = [
		'cmsgears\assets\jquery\Jquery',
		'cmsgears\assets\utilities\ImagesLoaded',
		'cmsgears\assets\cmgtools\Velocity',
		'cmsgears\icons\assets\IconAssets',
		'themes\admin\assets\vapps\BaseAssets'
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

	// PublicAssets --------------------------

}
