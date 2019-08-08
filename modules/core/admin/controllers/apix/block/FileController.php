<?php
namespace modules\core\admin\controllers\apix\block;

// Yii Imports
use Yii;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class FileController extends \cmsgears\core\admin\controllers\apix\base\FileController {

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

		// Services
		$this->parentService = Yii::$app->factory->get( 'blockService' );
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Controller ----

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// FileController ------------------------

}
