<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

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

}
