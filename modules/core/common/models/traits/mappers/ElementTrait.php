<?php
namespace modules\core\common\models\traits\mappers;

// CMG Imports
use cmsgears\core\common\models\base\CoreTables;

// Basic Imports
use modules\core\common\config\CoreGlobal;

use modules\core\common\models\entities\Element;
use modules\core\common\models\mappers\ModelElement;

trait ElementTrait {

	// Variables ---------------------------------------------------

	// Globals ----------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii classes ---------------------------

	// CMG interfaces ------------------------

	// CMG classes ---------------------------

	// Validators ----------------------------

	// ElementTrait --------------------------

	/**
	 * @inheritdoc
	 */
	public function getModelElements() {

		$modelObjectTable	= CoreTables::getTableName( CoreTables::TABLE_MODEL_OBJECT );
		$mapperType			= CoreGlobal::TYPE_ELEMENT;

		return $this->hasMany( ModelElement::class, [ 'parentId' => 'id' ] )
			->where( "$modelObjectTable.parentType='$this->modelType' AND $modelObjectTable.type='$mapperType'" )
			->orderBy( [ "$modelObjectTable.order" => SORT_DESC, "$modelObjectTable.id" => SORT_ASC ] );
	}

	/**
	 * @inheritdoc
	 */
	public function getActiveModelElements() {

		$modelObjectTable	= CoreTables::getTableName( CoreTables::TABLE_MODEL_OBJECT );
		$mapperType			= CoreGlobal::TYPE_ELEMENT;

		return $this->hasMany( ModelElement::class, [ 'parentId' => 'id' ] )
			->where( "$modelObjectTable.parentType=:ptype AND $modelObjectTable.type=:type AND $modelObjectTable.active=:active", [ ':ptype' => $this->modelType, ':type' => $mapperType, ':active' => true ] )
			->orderBy( [ "$modelObjectTable.order" => SORT_DESC, "$modelObjectTable.id" => SORT_ASC ] );
	}

	/**
	 * @inheritdoc
	 */
	public function getElements() {

		$modelObjectTable	= CoreTables::getTableName( CoreTables::TABLE_MODEL_OBJECT );
		$mapperType			= CoreGlobal::TYPE_ELEMENT;
		$objectTable		= CoreTables::getTableName( CoreTables::TABLE_OBJECT_DATA );

		return Element::find()
			->leftJoin( $modelObjectTable, "$modelObjectTable.modelId=$objectTable.id" )
			->where( "$modelObjectTable.parentId=:pid AND $modelObjectTable.parentType=:ptype AND $modelObjectTable.type=:type", [ ':pid' => $this->id, ':ptype' => $this->modelType, ':type' => $mapperType ] )
			->orderBy( [ "$modelObjectTable.order" => SORT_DESC, "$modelObjectTable.id" => SORT_ASC ] )
			->all();
	}

	/**
	 * @inheritdoc
	 */
	public function getActiveElements() {

		$modelObjectTable	= CoreTables::getTableName( CoreTables::TABLE_MODEL_OBJECT );
		$mapperType			= CoreGlobal::TYPE_ELEMENT;
		$objectTable		= CoreTables::getTableName( CoreTables::TABLE_OBJECT_DATA );

		return Element::find()
			->leftJoin( $modelObjectTable, "$modelObjectTable.modelId=$objectTable.id" )
			->where( "$modelObjectTable.parentId=:pid AND $modelObjectTable.parentType=:ptype AND $modelObjectTable.type=:type AND $modelObjectTable.active=:active", [ ':pid' => $this->id, ':ptype' => $this->modelType, ':type' => $mapperType, ':active' => true ] )
			->orderBy( [ "$modelObjectTable.order" => SORT_DESC, "$modelObjectTable.id" => SORT_ASC ] )
			->all();
	}

	// Static Methods ----------------------------------------------

	// Yii classes ---------------------------

	// CMG classes ---------------------------

	// ElementTrait --------------------------

	// Read - Query -----------

	// Read - Find ------------

	// Create -----------------

	// Update -----------------

	// Delete -----------------

}
