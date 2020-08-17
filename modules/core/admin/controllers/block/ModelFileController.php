<?php
namespace modules\core\admin\controllers\block;

// Yii Imports
use Yii;
use yii\helpers\Url;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class ModelFileController extends \cmsgears\core\admin\controllers\base\ModelFileController {

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
		$this->title	= 'Block File';
		$this->apixBase	= 'bcore/block/model-file';

		// Services
		$this->parentService = Yii::$app->factory->get( 'blockService' );

		// Sidebar
		$this->sidebar = [ 'parent' => 'sidebar-blocks', 'child' => 'block' ];

		// Return Url
		$this->returnUrl = Url::previous( 'block-files' );
		$this->returnUrl = isset( $this->returnUrl ) ? $this->returnUrl : Url::toRoute( [ '/bcore/block/model-file/all' ], true );

		// All Url
		$allUrl = Url::previous( 'blocks' );
		$allUrl = isset( $allUrl ) ? $allUrl : Url::toRoute( [ '/bcore/block/all' ], true );

		// Breadcrumbs
		$this->breadcrumbs	= [
			'base' => [
				[ 'label' => 'Home', 'url' => Url::toRoute( '/dashboard' ) ],
				[ 'label' => 'Blocks', 'url' =>  $allUrl ]
			],
			'all' => [ [ 'label' => 'Block Files' ] ],
			'create' => [ [ 'label' => 'Block Files', 'url' => $this->returnUrl ], [ 'label' => 'Create' ] ],
			'update' => [ [ 'label' => 'Block Files', 'url' => $this->returnUrl ], [ 'label' => 'Update' ] ],
			'delete' => [ [ 'label' => 'Block Files', 'url' => $this->returnUrl ], [ 'label' => 'Delete' ] ]
		];
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Controller ----

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// ModelFileController -------------------

	public function actionAll( $pid ) {

		Url::remember( Yii::$app->request->getUrl(), 'block-files' );

		return parent::actionAll( $pid );
	}

}
