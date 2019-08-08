<?php
namespace backend\assets;

/**
 * The main asset bundle of backend application.
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
