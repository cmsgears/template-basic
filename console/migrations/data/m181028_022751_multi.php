<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

// CMG Imports
use cmsgears\core\common\models\entities\Locale;
use cmsgears\core\common\models\entities\ObjectData;
use cmsgears\core\common\models\entities\Role;
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class m181028_022751_multi extends \cmsgears\core\common\base\Migration {

	// Public Variables

	// Private Variables

	private $cmgPrefix;
	private $sitePrefix;

	private $site;
	private $locale;

	private $sites;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;
		$this->sitePrefix	= Yii::$app->migration->sitePrefix;

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( Yii::$app->migration->getSiteMaster() );

		Yii::$app->core->setSite( $this->site );

		$this->sites = [
			'main'
		];

		$this->locale = Locale::findByCode( 'en_US' );
	}

	public function up() {

		$this->insertUsers();

		foreach( $this->sites as $site ) {

			$this->site = Site::findBySlug( $site );

			$this->insertSiteMembers();
		}

		$this->updateAutoIncs();
	}

	private function insertUsers() {

		$columns = [ 'localeId', 'status', 'email', 'username', 'type', 'passwordHash', 'firstName', 'lastName', 'name', 'registeredAt', 'lastLoginAt', 'authKey' ];

		$users	= [
			//[ $this->locale->id, User::STATUS_ACTIVE, "testuser1@example.com", 'testuser1', CoreGlobal::TYPE_DEFAULT, '$2y$13$Ut5b2RskRpGA9Q0nKSO6Xe65eaBHdx/q8InO8Ln6Lt3HzOK4ECz8W', 'Test', 'User 1', 'Test User 1', DateUtil::getDateTime(), DateUtil::getDateTime(), 'SQ1LLCWEPva4IKuQklILLGDpmUTGzq8E' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_user', $columns, $users );
	}

	private function insertSiteMembers() {

		$siteId = $this->site->id < 10 ? '0' . $this->site->id : $this->site->id;

		$adminRole = Role::findBySlugType( 'admin', CoreGlobal::TYPE_SYSTEM );

		//$test1	= User::findByUsername( 'testuser1' );

		$columns = [ 'id', 'siteId', 'userId', 'roleId', 'createdAt', 'modifiedAt' ];

		$members = [
			//[ intval( '1' . $siteId . '01' ), $this->site->id, $test1->id, $adminRole->id, DateUtil::getDateTime(), DateUtil::getDateTime() ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_site_member', $columns, $members );
	}

	private function updateAutoIncs() {

		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_site AUTO_INCREMENT = 10001" );
		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_site_member AUTO_INCREMENT = 1000001" );

		$this->execute( "ALTER TABLE fxs_slider AUTO_INCREMENT = 100001" );
		$this->execute( "ALTER TABLE fxs_slide AUTO_INCREMENT = 1000001" );

		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_object AUTO_INCREMENT = 1000001" );
		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_model_object AUTO_INCREMENT = 1000001" );

		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_form AUTO_INCREMENT = 1000001" );
		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_form_field AUTO_INCREMENT = 1000001" );

		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_template AUTO_INCREMENT = 1000001" );

		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_category AUTO_INCREMENT = 1000001" );
		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_model_category AUTO_INCREMENT = 1000001" );
		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_option AUTO_INCREMENT = 1000001" );
		$this->execute( "ALTER TABLE {$this->cmgPrefix}core_model_option AUTO_INCREMENT = 1000001" );
	}

	public function down() {

		echo "m181028_022751_multi will be deleted with m160621_014408_core.\n";
	}

}
