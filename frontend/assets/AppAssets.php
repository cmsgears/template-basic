<?php
namespace frontend\assets;

// Yii Imports
use \Yii;

class AppAssets extends \yii\web\AssetBundle {

	// Variables ---------------------------------------------------

	// Variables -----------------------------

	// Public -----------------

    public $basePath 	= '@webroot';
    public $baseUrl 	= '@web';

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
        'yii\web\YiiAsset'
    ];

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	public function init()  {

		parent::init();

		// Do initialization
	}

	// Instance methods --------------------------------------------

	// AppAssets -----------------------------

}