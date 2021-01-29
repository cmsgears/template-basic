<?php
// CMG Imports
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;
use cmsgears\cms\common\models\entities\Menu;

use cmsgears\core\common\utilities\DateUtil;

// Blog Imports
use modules\core\common\config\CoreGlobal;

class m181214_025806_links extends \cmsgears\core\common\base\Migration {

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

		$this->insertLinks();

		$this->insertLinkMappings();
	}

	private function insertLinks() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'pageId', 'createdBy', 'modifiedBy', 'name', 'title', 'url', 'type', 'icon', 'order', 'absolute', 'private', 'createdAt', 'modifiedAt', 'htmlOptions', 'urlOptions', 'data' ];

		$links = [
			[ 10001, $site->id, NULL, $master->id, $master->id, 'Home', NULL, '/', 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ 10002, $site->id, 2, $master->id, $master->id, 'Login', NULL, NULL, 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ 10003, $site->id, 4, $master->id, $master->id, 'Register', NULL, NULL, 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ 10004, $site->id, 11, $master->id, $master->id, 'About', 'About Us', NULL, 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ 10005, $site->id, 12, $master->id, $master->id, 'Terms', 'Terms & Conditions', NULL, 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ 10006, $site->id, 13, $master->id, $master->id, 'Privacy', 'Privacy Policy', NULL, 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ 10007, $site->id, NULL, $master->id, $master->id, 'Blog', 'Blog', '/blog/search', 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ 10008, $site->id, NULL, $master->id, $master->id, 'Contact Us', NULL, '/form/contact-us', 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ 10009, $site->id, 14, $master->id, $master->id, 'Feedback', NULL, NULL, 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ],
			[ 10010, $site->id, 15, $master->id, $master->id, 'Testimonial', NULL, NULL, 'site', NULL, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_link', $columns, $links );
	}

	private function insertLinkMappings() {

		$site	= $this->site;
		$master	= $this->master;

		$main	= Menu::findBySlugType( 'main', CmsGlobal::TYPE_MENU );
		$sec	= Menu::findBySlugType( 'secondary', CmsGlobal::TYPE_MENU );
		$link	= Menu::findBySlugType( 'links', CmsGlobal::TYPE_MENU );

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active' ];

		$mappings = [
			[ 100001, 10001, $main->id, 'menu', NULL, 0, 1 ],
			[ 100002, 10004, $main->id, 'menu', NULL, 0, 1 ],
			[ 100003, 10005, $main->id, 'menu', NULL, 0, 1 ],
			[ 100004, 10006, $main->id, 'menu', NULL, 0, 1 ],
			[ 100005, 10001, $sec->id, 'menu', NULL, 0, 1 ],
			[ 100006, 10004, $sec->id, 'menu', NULL, 0, 1 ],
			[ 100007, 10005, $sec->id, 'menu', NULL, 0, 1 ],
			[ 100008, 10006, $sec->id, 'menu', NULL, 0, 1 ],
			[ 100009, 10007, $link->id, 'menu', NULL, 0, 1 ],
			[ 100010, 10008, $link->id, 'menu', NULL, 0, 1 ],
			[ 100011, 10009, $link->id, 'menu', NULL, 0, 1 ],
			[ 100012, 10010, $link->id, 'menu', NULL, 0, 1 ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_link', $columns, $mappings );
	}

	public function down() {

		echo "m181214_025806_links will be deleted with m160621_014408_core.\n";
	}

}
