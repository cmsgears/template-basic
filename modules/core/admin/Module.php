<?php
namespace modules\core\admin;

// Yii Imports
use Yii;

/**
 * The Admin Module of Core Module.
 *
 * @since 1.0.0
 */
class Module extends \cmsgears\core\common\base\Module {

	// Variables ---------------------------------------------------

	// Globals ----------------

	// Public -----------------

	public $controllerNamespace = 'modules\core\admin\controllers';

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		$this->setViewPath( '@modules/core/admin/views' );
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Module --------------------------------

	public function getSidebarHtml() {

		return Yii::getAlias( '@modules' ) . '/core/admin/views/sidebar.php';
	}

}
