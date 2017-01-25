<?php
namespace frontend\assets;

// Yii Imports
use \Yii;

class AppAssets extends \yii\web\AssetBundle {

	// Variables ---------------------------------------------------

	// Public ----

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
        'yii\web\YiiAsset'
    ];

	// Constructor and Initialisation ------------------------------

	public function __construct()  {

		parent::__construct();
	}
}