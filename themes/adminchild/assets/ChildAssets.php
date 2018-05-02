<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace themes\adminchild\assets;

// Yii Imports
use yii\web\View;
use yii\web\AssetBundle;

/**
 * ChildAssets registers the assets available in admin child theme.
 *
 * @since 1.0.0
 */
class ChildAssets extends AssetBundle {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Path Configuration
	public $sourcePath = '@themes/adminchild/resources';

	// Load CSS
    public $css	= [
        'styles/main.css'
    ];

	// CSS Position
	public $cssOptions = [
		'position' => View::POS_HEAD
	];

	// Load Javascript
    public $js = [
        'scripts/main.js'
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

	// ChildAssets ---------------------------

}
