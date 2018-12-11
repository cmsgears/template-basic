<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

class m181019_046641_objects extends \cmsgears\core\common\base\Migration {

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

		$this->insertFiles();

		$this->insertMappings();
	}

	private function insertFiles() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'thumb', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[104001, $site->id, $master->id, $master->id, '52kX-CFrTeK4svunJboqrtzQuOkTqQgO','logo-mail','','png','avatar',0.0107,1500,'image',NULL,'2018-11-01/avatar/52kX-CFrTeK4svunJboqrtzQuOkTqQgO.png','2018-11-01/avatar/52kX-CFrTeK4svunJboqrtzQuOkTqQgO-medium.png','2018-11-01/avatar/52kX-CFrTeK4svunJboqrtzQuOkTqQgO-thumb.png','','',0,DateUtil::getDateTime(), DateUtil::getDateTime(),NULL,NULL,NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertMappings() {

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'pinned', 'featured', 'nodes' ];

		$mappings = [
			//[ 100001, $popsPosts->id, $mainSidebar->id, 'sidebar', 'widget', 0, 1, 0, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_object', $columns, $mappings );
	}

	public function down() {

		echo "m181019_046641_objects will be deleted with m160621_014408_core.\n";
	}

}
