<?php
namespace widgets\block;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class BlockSuggest extends \cmsgears\core\common\widgets\mappers\ObjectSuggest {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $type	= CoreGlobal::TYPE_BLOCK;
	public $ctype	= CoreGlobal::TYPE_BLOCK;

	public $mapperTemplate = 'blockMapperTemplate';

	public $notes = '<b>Notes</b>: Type in search box to filter elements and select the element to map.';

	public $actionUrl = 'bcore/block/auto-search';

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		$this->modelObjects = isset( $this->model ) ? $this->model->activeModelBlocks : [];
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// BlockSuggest --------------------------

}
