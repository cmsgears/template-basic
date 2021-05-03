<?php
namespace modules\core\common\models\entities;

// Basic Imports
use modules\core\common\config\CoreGlobal;

use modules\core\common\models\interfaces\mappers\IElement;

use modules\core\common\models\traits\mappers\ElementTrait;

class Block extends \cmsgears\core\common\models\entities\ObjectData implements IElement {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Protected --------------

	protected $modelType = CoreGlobal::TYPE_BLOCK;

	// Private ----------------

	// Traits ------------------------------------------------------

	use ElementTrait;

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Model ---------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// Block ---------------------------------

	// Static Methods ----------------------------------------------

	// Yii parent classes --------------------

	// yii\db\ActiveRecord ----

	// CMG parent classes --------------------

	// Block ---------------------------------

	// Read - Query -----------

	// Read - Find ------------

	// Create -----------------

	// Update -----------------

	// Delete -----------------

}
