<?php
namespace themes\adminchild;

// BZ Imports
use themes\adminchild\assets\ChildAssets;

class Theme {

	public function registerAssets( $view ) {

		ChildAssets::register( $view );
	}
}
