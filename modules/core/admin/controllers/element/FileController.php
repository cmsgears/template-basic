<?php
namespace modules\core\admin\controllers\element;

// Yii Imports
use Yii;
use yii\helpers\Url;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class FileController extends \cmsgears\core\admin\controllers\base\FileController {

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
		$this->title	= 'Element File';
		$this->apixBase	= 'bcore/element/file';

		// Services
		$this->parentService = Yii::$app->factory->get( 'elementService' );

		// Sidebar
		$this->sidebar = [ 'parent' => 'sidebar-elements', 'child' => 'element' ];

		// Return Url
		$this->returnUrl = Url::previous( 'element-files' );
		$this->returnUrl = isset( $this->returnUrl ) ? $this->returnUrl : Url::toRoute( [ '/bcore/element/file/all' ], true );

		// All Url
		$allUrl = Url::previous( 'elements' );
		$allUrl = isset( $allUrl ) ? $allUrl : Url::toRoute( [ '/bcore/element/all' ], true );

		// Breadcrumbs
		$this->breadcrumbs	= [
			'base' => [
				[ 'label' => 'Home', 'url' => Url::toRoute( '/dashboard' ) ],
				[ 'label' => 'Elements', 'url' =>  $allUrl ]
			],
			'all' => [ [ 'label' => 'Element Files' ] ],
			'create' => [ [ 'label' => 'Element Files', 'url' => $this->returnUrl ], [ 'label' => 'Create' ] ],
			'update' => [ [ 'label' => 'Element Files', 'url' => $this->returnUrl ], [ 'label' => 'Update' ] ],
			'delete' => [ [ 'label' => 'Element Files', 'url' => $this->returnUrl ], [ 'label' => 'Delete' ] ]
		];
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Controller ----

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// FileController ------------------------

	public function actionAll( $pid ) {

		Url::remember( Yii::$app->request->getUrl(), 'element-files' );

		return parent::actionAll( $pid );
	}

}
