<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace modules\core\common\models\resources;

// CMG Imports
use cmsgears\core\common\models\interfaces\resources\IData;

use cmsgears\core\common\models\traits\resources\DataTrait;

/**
 * It's a placeholder class in absence of a valid model to generate the SEO data.
 */
class Carrier extends \yii\base\Model implements IData {

	public $name;
	public $summary;
	public $description;

	public $data;

	use DataTrait;

	public function getDisplayName() {

		return $this->name;
	}

}
