<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace frontend\assets;

/**
 * The mail asset bundle of backend application.
 *
 * @since 1.0.0
 */
class AppAssets extends \yii\web\AssetBundle {

	// Variables ---------------------------------------------------

	// Globals ----------------

	// Public -----------------

	public $basePath	= '@webroot';
	public $baseUrl		= '@web';

	// Load css
	public $css = [
		//'styles/main.css'
	];

	// Load JS
	public $js = [
		//'scripts/main.js'
	];

	// Load dependencies first
	public $depends = [
		'cmsgears\assets\jquery\Jquery'
	];

	// Protected --------------

	// Private ----------------

	// Constructor and Initialisation ------------------------------

	public function init()  {

		parent::init();

		// Override parent
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// AppAssets -----------------------------

}
