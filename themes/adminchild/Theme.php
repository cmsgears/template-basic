<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace themes\adminchild;

// CMG Imports
use themes\adminchild\assets\ChildAssets;

/**
 * Theme registers the assets available in admin child theme.
 *
 * @since 1.0.0
 */
class Theme {

	// Variables ---------------------------------------------------

	// Globals ----------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	public function registerAssets( $view ) {

		ChildAssets::register( $view );
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Theme ---------------------------------

}
