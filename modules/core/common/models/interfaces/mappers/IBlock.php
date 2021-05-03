<?php
namespace modules\core\common\models\interfaces\mappers;

interface IBlock {

	/**
	 * Return all the block mappings associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\mappers\ModelBlock[]
	 */
	public function getModelBlocks();

	/**
	 * Return all the active block mappings associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\mappers\ModelBlock[]
	 */
	public function getActiveModelBlocks();

	/**
	 * Return all the blocks associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\entities\ModelBlock[]
	 */
	public function getBlocks();

	/**
	 * Return all the active blocks associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\entities\ModelBlock[]
	 */
	public function getActiveBlocks();

	/**
	 * Return all the active blocks associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\entities\ModelBlock[]
	 */
	public function getDisplayBlocks();

}
