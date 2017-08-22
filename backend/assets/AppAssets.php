<?php
namespace backend\assets;

// Yii Imports
use Yii;

class AppAssets extends \yii\web\AssetBundle {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $basePath 	= '@webroot';
	public $baseUrl 	= '@web';

	// Load css
	public $css		= [
		//'styles/main.css'
	];

	// Load JS
	public $js = [
		//'scripts/main.js'
	];

	// Load dependencies first
	public $depends = [
		//'yii\web\YiiAsset'
	];

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

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
