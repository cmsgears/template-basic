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

class m181018_026621_slider extends \cmsgears\core\common\base\Migration {

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

		$this->insertSlider();
	}

	private function insertFiles() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'tag', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'thumb', 'caption', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[ 102001, $site->id, $master->id, $master->id,'lifestyle',NULL,'Lifestyle','','jpg','gallery',0.2991,1500,'image',NULL,'2018-11-14/gallery/lifestyle.jpg','2018-11-14/gallery/lifestyle-medium.jpg','2018-11-14/gallery/lifestyle-thumb.jpg','','','',0,'2018-11-14 07:31:44','2018-11-14 07:54:13',NULL,NULL,NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertSlider() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'slug', 'title', 'description', 'status', 'fullPage', 'slideWidth', 'slideHeight', 'scrollAuto', 'scrollType', 'circular', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$sliders = [
			//[ 10001, $site->id, $master->id, $master->id, 'Main Slider', 'main-slider', '', 'Main Slider used on landing page.', 16000, 1, 1920, 750, 1, 0, 1, '2018-05-25 07:15:45', '2018-11-14 08:12:27', '{ "class": "fx-slider fx-slider-regular" }', NULL, '{"settings":{"loadAssets":"0","bullets":"1","bulletsIndexing":"0","bulletClass":"","controls":"1","lControlClass":"text text-gray-l bold cmti cmti-1-5x cmti-angle-left","rControlClass":"text text-gray-l bold cmti cmti-1-5x cmti-angle-right","lControlContent":"","rControlContent":"","autoScrollDuration":"","stopOnHover":"1","sliderWidth":"","sliderHeight":"","slideDimMax":"1","slideWidth":"","slideHeight":"","slideArrangement":"filmstrip","resizeBkgImage":"0","bkgImageClass":"fluid","autoHeight":"1","preSlideChange":"","postSlideChange":"","slideTemplate":"reader","slideTemplateDir":"@themeTemplates\/foxslider","slideTexture":"texture","genericContent":""}}', NULL, 0, NULL ]
		];

		$this->batchInsert( 'fxs_slider', $columns, $sliders );

		$columns = [ 'id', 'sliderId', 'imageId', 'name', 'title', 'description', 'url', 'order', 'content' ];

		$slides = [
			//[100001, 10001, 102001, 'Lifestyle', '', '', '', 0, '' ]
		];

		$this->batchInsert( 'fxs_slide', $columns, $slides );
	}

	public function down() {

		echo "m181018_026621_slider will be deleted with m160621_014408_core.\n";
	}

}
