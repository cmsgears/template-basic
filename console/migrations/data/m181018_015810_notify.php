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
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

class m181018_015810_notify extends \cmsgears\core\common\base\Migration {

	// Public variables

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

		// Templates
		$this->insertNotificationTemplates();
    }

	/**
	 * Notification Templates
	 */
	private function insertNotificationTemplates() {

		$columns = [ 'id', 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'description', 'active', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$templates = [
			//[ 100001, $this->master->id, $this->master->id, 'Register', 'register', null, 'notification', 'Trigger Notification and Email to Admin, when new organization is registered by site users.', true, 'twig', 0, null, false, null, DateUtil::getDateTime(), DateUtil::getDateTime(), 'New Organization "{{orgName | raw }}" is registered', '{"config":{"admin":"1","user":"0","adminEmail":"1","userEmail":"0"}}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

    public function down() {

        echo "m181018_015810_notify will be deleted with m160621_014408_core.\n";

        return true;
    }

}
