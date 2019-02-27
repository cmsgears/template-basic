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

class Theme {

	public function registerAssets( $view ) {

		ChildAssets::register( $view );
	}
}
