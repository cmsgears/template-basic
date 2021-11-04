<?php
namespace modules\core\common\models\traits\mappers;

// CMG Imports
use cmsgears\core\common\models\base\CoreTables;

// Basic Imports
use modules\core\common\config\CoreGlobal;

use modules\core\common\models\entities\Block;
use modules\core\common\models\mappers\ModelBlock;

trait BlockTrait {

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

	// BlockTrait ----------------------------

	/**
	 * @inheritdoc
	 */
	public function getModelBlocks() {

		$modelObjectTable	= CoreTables::getTableName( CoreTables::TABLE_MODEL_OBJECT );
		$mapperType			= CoreGlobal::TYPE_BLOCK;
		$objectTable		= CoreTables::getTableName( CoreTables::TABLE_OBJECT_DATA );

		return ModelBlock::find()
			->leftJoin( $objectTable, "$modelObjectTable.modelId=$objectTable.id" )
			->where( "$modelObjectTable.parentId=$this->id AND $modelObjectTable.parentType='$this->modelType' AND $modelObjectTable.type='$mapperType' AND $objectTable.shared=1" )
			->orderBy( [ "$modelObjectTable.order" => SORT_DESC, "$modelObjectTable.id" => SORT_ASC ] )
			->all();
	}

	/**
	 * @inheritdoc
	 */
	public function getActiveModelBlocks() {

		$modelObjectTable	= CoreTables::getTableName( CoreTables::TABLE_MODEL_OBJECT );
		$mapperType			= CoreGlobal::TYPE_BLOCK;
		$objectTable		= CoreTables::getTableName( CoreTables::TABLE_OBJECT_DATA );

		return ModelBlock::find()
			->leftJoin( $objectTable, "$modelObjectTable.modelId=$objectTable.id" )
			->where( "$modelObjectTable.parentId=$this->id AND $modelObjectTable.parentType='$this->modelType' AND $modelObjectTable.type='$mapperType' AND $objectTable.shared=1 AND $modelObjectTable.active=1" )
			->orderBy( [ "$modelObjectTable.order" => SORT_DESC, "$modelObjectTable.id" => SORT_ASC ] )
			->all();
	}

	/**
	 * @inheritdoc
	 */
	public function getBlocks() {

		$modelObjectTable	= CoreTables::getTableName( CoreTables::TABLE_MODEL_OBJECT );
		$mapperType			= CoreGlobal::TYPE_BLOCK;
		$objectTable		= CoreTables::getTableName( CoreTables::TABLE_OBJECT_DATA );

		return Block::find()
			->leftJoin( $modelObjectTable, "$modelObjectTable.modelId=$objectTable.id" )
			->where( "$modelObjectTable.parentId=$this->id AND $modelObjectTable.parentType='$this->modelType' AND $modelObjectTable.type='$mapperType'" )
			->orderBy( [ "$modelObjectTable.order" => SORT_DESC, "$modelObjectTable.id" => SORT_ASC ] )
			->all();
	}

	/**
	 * @inheritdoc
	 */
	public function getActiveBlocks() {

		$modelObjectTable	= CoreTables::getTableName( CoreTables::TABLE_MODEL_OBJECT );
		$mapperType			= CoreGlobal::TYPE_BLOCK;
		$objectTable		= CoreTables::getTableName( CoreTables::TABLE_OBJECT_DATA );

		return Block::find()
			->leftJoin( $modelObjectTable, "$modelObjectTable.modelId=$objectTable.id" )
			->where( "$modelObjectTable.parentId=$this->id AND $modelObjectTable.parentType='$this->modelType' AND $modelObjectTable.type='$mapperType' AND $modelObjectTable.active=1" )
			->orderBy( [ "$modelObjectTable.order" => SORT_DESC, "$modelObjectTable.id" => SORT_ASC ] )
			->all();
	}

	/**
	 * @inheritdoc
	 */
	public function getDisplayBlocks() {

		$modelObjectTable	= CoreTables::getTableName( CoreTables::TABLE_MODEL_OBJECT );
		$mapperType			= CoreGlobal::TYPE_BLOCK;
		$objectTable		= CoreTables::getTableName( CoreTables::TABLE_OBJECT_DATA );

		return Block::find()
			->leftJoin( $modelObjectTable, "$modelObjectTable.modelId=$objectTable.id" )
			->where( "$modelObjectTable.parentId=$this->id AND $modelObjectTable.parentType='$this->modelType' AND $modelObjectTable.type='$mapperType' AND $modelObjectTable.active=1" )
			->orderBy( [ "$modelObjectTable.order" => SORT_DESC, "$modelObjectTable.id" => SORT_ASC ] )
			->all();
	}

	// Static Methods ----------------------------------------------

	// Yii classes ---------------------------

	// CMG classes ---------------------------

	// BlockTrait ----------------------------

	// Read - Query -----------

	// Read - Find ------------

	// Create -----------------

	// Update -----------------

	// Delete -----------------

}
