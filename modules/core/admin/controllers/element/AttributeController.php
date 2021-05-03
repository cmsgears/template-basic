<?php
namespace modules\core\admin\controllers\element;

// Yii Imports
use Yii;
use yii\helpers\Url;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class AttributeController extends \cmsgears\core\admin\controllers\base\AttributeController {

	// Variables ---------------------------------------------------

	// Globals ----------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		// Permission
		$this->crudPermission = CoreGlobal::PERM_CORE;

		// Config
		$this->title	= 'Element Attribute';
		$this->apixBase	= 'bcore/element/attribute';

		// Services
		$this->modelService		= Yii::$app->factory->get( 'objectMetaService' );
		$this->parentService	= Yii::$app->factory->get( 'elementService' );

		// Sidebar
		$this->sidebar = [ 'parent' => 'sidebar-elements', 'child' => 'element' ];

		// Return Url
		$this->returnUrl = Url::previous( 'element-attributes' );
		$this->returnUrl = isset( $this->returnUrl ) ? $this->returnUrl : Url::toRoute( [ '/bcore/element/attribute/all' ], true );

		// All Url
		$allUrl = Url::previous( 'elements' );
		$allUrl = isset( $allUrl ) ? $allUrl : Url::toRoute( [ '/bcore/element/all' ], true );

		// Breadcrumbs
		$this->breadcrumbs	= [
			'base' => [
				[ 'label' => 'Home', 'url' => Url::toRoute( '/dashboard' ) ],
				[ 'label' => 'Elements', 'url' =>  $allUrl ]
			],
			'all' => [ [ 'label' => 'Element Attributes' ] ],
			'create' => [ [ 'label' => 'Element Attributes', 'url' => $this->returnUrl ], [ 'label' => 'Create' ] ],
			'update' => [ [ 'label' => 'Element Attributes', 'url' => $this->returnUrl ], [ 'label' => 'Update' ] ],
			'delete' => [ [ 'label' => 'Element Attributes', 'url' => $this->returnUrl ], [ 'label' => 'Delete' ] ]
		];
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Controller ----

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// AttributeController -------------------

	public function actionAll( $pid ) {

		Url::remember( Yii::$app->request->getUrl(), 'element-attributes' );

		return parent::actionAll( $pid );
	}

}
