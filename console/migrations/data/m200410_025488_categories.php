<?php
// CMG Imports
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\resources\Category;
use cmsgears\core\common\models\resources\Option;

use cmsgears\core\common\utilities\DateUtil;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class m200410_025488_categories extends \cmsgears\core\common\base\Migration {

	// Public Variables

	// Private Variables

	private $cmgPrefix;
	private $sitePrefix;

	private $site;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;
		$this->sitePrefix	= Yii::$app->migration->sitePrefix;

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( Yii::$app->migration->getSiteMaster() );

		Yii::$app->core->setSite( $this->site );
	}

	public function up() {

		$this->insertOptionGroups();

		$this->insertOptions();
	}

	private function insertOptionGroups() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'description', 'featured', 'lValue', 'rValue', 'createdAt', 'modifiedAt' ];

		$groups = [
			// Generic
			//[ 10001, $site->id, $master->id, $master->id, 'test', 'test', CoreGlobal::TYPE_OPTION_GROUP, 'test', false, 1, 2, DateUtil::getDateTime(), DateUtil::getDateTime() ],
		];

		$this->batchInsert( $this->cmgPrefix . 'core_category', $columns, $groups );
	}

	private function insertOptions() {

		//$test	= Category::findBySlugType( 'test', CoreGlobal::TYPE_OPTION_GROUP );

		$optionColumns = [ 'id', 'categoryId', 'name', 'value', 'icon', 'active', 'order', 'input', 'htmlOptions', 'content', 'data' ];

		$options = [
			//[ 100001, $test->id, 'Test', 'Test', NULL, 1, 0, 0, NULL, NULL, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_option', $optionColumns, $options );
	}

	public function down() {

		echo "m200410_025488_categories will be deleted with m160621_014408_core.\n";
	}

}
