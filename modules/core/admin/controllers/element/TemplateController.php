<?php
namespace modules\core\admin\controllers\element;

// Yii Imports
use Yii;
use yii\helpers\Url;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class TemplateController extends \cmsgears\core\admin\controllers\base\TemplateController {

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

		// Type
		$this->type		= CoreGlobal::TYPE_ELEMENT;
		$this->apixBase	= 'bcore/element/template';

		// Sidebar
		$this->sidebar = [ 'parent' => 'sidebar-elements', 'child' => 'element-template' ];

		// Return Url
		$this->returnUrl = Url::previous( 'element-templates' );
		$this->returnUrl = isset( $this->returnUrl ) ? $this->returnUrl : Url::toRoute( [ '/bcore/element/template/all' ], true );

		// Breadcrumbs
		$this->breadcrumbs = [
			'base' => [
				[ 'label' => 'Home', 'url' => Url::toRoute( '/dashboard' ) ]
			],
			'all' => [ [ 'label' => 'Element Templates' ] ],
			'create' => [ [ 'label' => 'Element Templates', 'url' => $this->returnUrl ], [ 'label' => 'Add' ] ],
			'update' => [ [ 'label' => 'Element Templates', 'url' => $this->returnUrl ], [ 'label' => 'Update' ] ],
			'delete' => [ [ 'label' => 'Element Templates', 'url' => $this->returnUrl ], [ 'label' => 'Delete' ] ],
			'data' => [ [ 'label' => 'Element Templates', 'url' => $this->returnUrl ], [ 'label' => 'Data' ] ],
			'attributes' => [ [ 'label' => 'Element Templates', 'url' => $this->returnUrl ], [ 'label' => 'Attributes' ] ],
			'config' => [ [ 'label' => 'Element Templates', 'url' => $this->returnUrl ], [ 'label' => 'Config' ] ],
			'settings' => [ [ 'label' => 'Element Templates', 'url' => $this->returnUrl ], [ 'label' => 'Settings' ] ]
		];
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Controller ----

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// TemplateController --------------------

	public function actionAll( $config = [] ) {

		Url::remember( Yii::$app->request->getUrl(), 'element-templates' );

		return parent::actionAll( $config );
	}

}
