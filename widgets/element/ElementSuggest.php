<?php
namespace widgets\element;
// Basic Imports
use modules\core\common\config\CoreGlobal;

class ElementSuggest extends \cmsgears\core\common\widgets\mappers\ObjectSuggest {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $type	= CoreGlobal::TYPE_ELEMENT;
	public $ctype	= CoreGlobal::TYPE_ELEMENT;

	public $mapperTemplate = 'elementMapperTemplate';

	public $notes = '<b>Notes</b>: Type in search box to filter elements and select the element to map.';

	public $actionUrl = 'bcore/element/auto-search';

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		$this->modelObjects = isset( $this->model ) ? $this->model->activeModelElements : [];
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// ElementSuggest ------------------------

}
