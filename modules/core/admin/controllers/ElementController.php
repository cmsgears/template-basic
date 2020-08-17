<?php
namespace modules\core\admin\controllers;

// Yii Imports
use Yii;
use yii\helpers\Url;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class ElementController extends \cmsgears\core\admin\controllers\base\ObjectDataController {

	// Variables ---------------------------------------------------

	// Globals ----------------

	// Public -----------------

	public $title;

	// Protected --------------

	// Private ----------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		// Config
		$this->backend		= true;
		$this->frontend		= false;
		$this->shared		= true;
		$this->type			= CoreGlobal::TYPE_ELEMENT;
		$this->templateType = CoreGlobal::TYPE_ELEMENT;
		$this->title		= 'Element';
		$this->apixBase		= 'bcore/element';

		// Services
		$this->modelService = Yii::$app->factory->get( 'elementService' );

		// Sidebar
		$this->sidebar = [ 'parent' => 'sidebar-elements', 'child' => 'element' ];

		// Return Url
		$this->returnUrl = Url::previous( 'elements' );
		$this->returnUrl = isset( $this->returnUrl ) ? $this->returnUrl : Url::toRoute( [ '/bcore/element/all' ], true );

		// Breadcrumbs
		$this->breadcrumbs = [
			'base' => [
				[ 'label' => 'Home', 'url' => Url::toRoute( '/dashboard' ) ]
			],
			'all' => [ [ 'label' => 'Elements' ] ],
			'create' => [ [ 'label' => 'Elements', 'url' => $this->returnUrl ], [ 'label' => 'Add' ] ],
			'update' => [ [ 'label' => 'Elements', 'url' => $this->returnUrl ], [ 'label' => 'Update' ] ],
			'delete' => [ [ 'label' => 'Elements', 'url' => $this->returnUrl ], [ 'label' => 'Delete' ] ],
			'gallery' => [ [ 'label' => 'Elements', 'url' => $this->returnUrl ], [ 'label' => 'Gallery' ] ],
			'data' => [ [ 'label' => 'Elements', 'url' => $this->returnUrl ], [ 'label' => 'Data' ] ],
			'attributes' => [ [ 'label' => 'Elements', 'url' => $this->returnUrl ], [ 'label' => 'Attributes' ] ],
			'config' => [ [ 'label' => 'Elements', 'url' => $this->returnUrl ], [ 'label' => 'Config' ] ],
			'settings' => [ [ 'label' => 'Elements', 'url' => $this->returnUrl ], [ 'label' => 'Settings' ] ]
		];
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Controller ----

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// ElementController ---------------------

	public function actionAll( $config = [] ) {

		Url::remember( Yii::$app->request->getUrl(), 'elements' );

		return parent::actionAll( $config );
	}

}
