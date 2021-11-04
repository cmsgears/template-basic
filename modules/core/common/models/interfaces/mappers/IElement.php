<?php
namespace modules\core\common\models\interfaces\mappers;

interface IElement {

	/**
	 * Return all the element mappings associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\mappers\ModelElement[]
	 */
	public function getModelElements();

	/**
	 * Return all the active element mappings associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\mappers\ModelElement[]
	 */
	public function getActiveModelElements();

	/**
	 * Return all the elements associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\entities\ModelElement[]
	 */
	public function getElements();

	/**
	 * Return all the active elements associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\entities\ModelElement[]
	 */
	public function getActiveElements();

	/**
	 * Return all the active elements associated with the parent.
	 *
	 * @return \cmsgears\cms\common\models\entities\ModelElement[]
	 */
	public function getDisplayElements();

}
