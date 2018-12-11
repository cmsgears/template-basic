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
use cmsgears\core\common\models\entities\Role;
use cmsgears\core\common\models\entities\Theme;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;
use cmsgears\core\common\models\entities\Locale;

class m181017_021452_sites extends \cmsgears\core\common\base\Migration {

	// Public Variables

	// Private Variables

	private $cmgPrefix;
	private $sitePrefix;

	private $site;

	private $master;

	private $locale;

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

		$this->updateSite();

		$this->insertSites();

		$this->insertSitesMeta();

		$this->insertSiteUsers();

		$this->insertSiteMembers();
	}

	private function insertFiles() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'thumb', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[100001, $site->id, $master->id, $master->id,'ZxeQNBgZ_iykl1XEcrbNkvEa-5DjdLqP','site','','jpg','slider',0.228,1500,'image',NULL,'2018-05-25/slider/ZxeQNBgZ_iykl1XEcrbNkvEa-5DjdLqP.jpg','2018-05-25/slider/ZxeQNBgZ_iykl1XEcrbNkvEa-5DjdLqP-medium.jpg','2018-05-25/slider/ZxeQNBgZ_iykl1XEcrbNkvEa-5DjdLqP-thumb.jpg','','',0,'2018-05-25 07:16:46','2018-05-25 07:16:46',NULL,NULL,NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function updateSite() {

		//$this->update( $this->cmgPrefix . 'core_site', [ 'bannerId' => 100001 ], [ 'slug' => 'main' ] );
	}

	private function insertSites() {

		$master	= $this->master;
		$theme	= Theme::findBySlug( 'news' );

		$columns = [ 'id', 'themeId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'title', 'order', 'active', 'createdAt', 'modifiedAt' ];

		$sites = [
			//[ 101, $theme->id, 100001, null, $master->id, $master->id, 'Forum', 'forum', 'Forum', 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime() ],
			//[ 102, $theme->id, 100002, null, $master->id, $master->id, 'Support', 'support', 'Support', 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime() ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_site', $columns, $sites );
	}

	private function insertSitesMeta() {

	}

	private function insertSiteUsers() {

		// Default password for all test users is test#123
		// Super Admin i.e. demomaster must change username, password and email on first login and remove other users if required.

		$columns = [ 'id', 'localeId', 'genderId', 'avatarId', 'bannerId', 'videoId', 'templateId' , 'status', 'email', 'username', 'slug', 'passwordHash' , 'type' , 'icon' , 'title' , 'firstName' , 'middleName', 'lastName' , 'name', 'message', 'description', 'dob', 'mobile', 'phone', 'emailVerified', 'mobileVerified', 'timeZone', 'avatarUrl', 'websiteUrl', 'verifyToken', 'verifyTokenValidTill', 'resetToken', 'resetTokenValidTill', 'registeredAt', 'lastLoginAt', 'lastActivityAt', 'authKey', 'otp', 'otpValidTill', 'accessToken', 'accessTokenType', 'tokenCreatedAt', 'tokenAccessedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$this->locale = Locale::findByCode( 'en_US' );

		$users	= [
			//[5,$this->locale->id,NULL,NULL,NULL,NULL,NULL,User::STATUS_ACTIVE,'example@example.com','example','example','$2y$13$Ut5b2RskRpGA9Q0nKSO6Xe65eaBHdx/q8InO8Ln6Lt3HzOK4ECz8W',CoreGlobal::TYPE_DEFAULT,'icon','','Example','','','Archana','','',NULL,'7259224413','',1,0,NULL,'','','xnaNUktj2Lh0F3WtGjvcgm7viJMu0i2N',NULL,NULL,NULL,'2018-12-07 12:32:25',NULL,NULL,'tFhJLcg8qQa6hRm01eW9miO9cfxNcDhm',645105,'2018-12-14 11:12:25',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_user', $columns, $users );
	}

	private function insertSiteMembers() {

		$site = $this->site;

		$userRole = Role::findBySlugType( CoreGlobal::ROLE_USER, CoreGlobal::TYPE_SYSTEM );

		$columns = [ 'id', 'siteId', 'userId', 'roleId', 'pinned', 'featured', 'createdAt', 'modifiedAt' ];

		$members = [
			//[10001,$site->id,5,$userRole->id,0,0,'2018-12-07 18:02:25','2018-12-07 18:05:04']
		];

		$this->batchInsert( $this->cmgPrefix . 'core_site_member', $columns, $members );
	}

	public function down() {

		echo "m181017_021452_sites will be deleted with m160621_014408_core.\n";
	}

}
