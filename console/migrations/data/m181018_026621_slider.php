<?php
// CMG Imports
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

// Basic Imports
use modules\core\common\config\CoreGlobal;

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

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'tag', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'small', 'thumb', 'placeholder', 'smallPlaceholder', 'ogg', 'webm', 'caption', 'altText', 'link', 'shared', 'srcset', 'sizes', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			[ 102001, $site->id, $master->id, $master->id, 'slide-1', NULL, 'Slide 1', '', 'jpg', 'gallery', 0.1178, 1500, 'image', NULL, '2019-07-25/gallery/slide-1.jpg', '2019-07-25/gallery/slide-1-medium.jpg', '2019-07-25/gallery/slide-1-small.jpg', '2019-07-25/gallery/slide-1-thumb.jpg', '2019-07-25/gallery/slide-1-pl.jpg', '2019-07-25/gallery/slide-1-small-pl.jpg', NULL, NULL, NULL, NULL, NULL, 0, '1920,1152,576', '(max-width: 1920px) 100vw, 1920px', DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, 0, NULL ],
			[ 102002, $site->id, $master->id, $master->id, 'slide-2', NULL, 'Slide 2', '', 'jpg', 'gallery', 0.1909, 1500, 'image', NULL, '2019-07-25/gallery/slide-2.jpg', '2019-07-25/gallery/slide-2-medium.jpg', '2019-07-25/gallery/slide-2-small.jpg', '2019-07-25/gallery/slide-2-thumb.jpg', '2019-07-25/gallery/slide-2-pl.jpg', '2019-07-25/gallery/slide-2-small-pl.jpg', NULL, NULL, NULL, NULL, NULL, 0, '1920,1152,576', '(max-width: 1920px) 100vw, 1920px', DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, 0, NULL ],
			[ 102003, $site->id, $master->id, $master->id, 'slide-3', NULL, 'Slide 3', '', 'jpg', 'gallery', 0.1575, 1500, 'image', NULL, '2019-07-25/gallery/slide-3.jpg', '2019-07-25/gallery/slide-3-medium.jpg', '2019-07-25/gallery/slide-3-small.jpg', '2019-07-25/gallery/slide-3-thumb.jpg', '2019-07-25/gallery/slide-3-pl.jpg', '2019-07-25/gallery/slide-3-small-pl.jpg', NULL, NULL, NULL, NULL, NULL, 0, '1920,1152,576', '(max-width: 1920px) 100vw, 1920px', DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertSlider() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'slug', 'title', 'description', 'status', 'fullPage', 'slideWidth', 'slideHeight', 'scrollAuto', 'scrollType', 'circular', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$sliders = [
			[ 10001, $site->id, $master->id, $master->id, 'Main Slider', 'main-slider', '', 'Main Slider used on landing page.', 16000, 1, 1920, 800, 1, 0, 1, '2018-05-25 07:15:45', '2018-11-14 08:12:27', '{ "class": "fx-slider fx-slider-regular" }', NULL, '{"settings":{"loadAssets":"0","bullets":"1","bulletsIndexing":"0","bulletClass":"","controls":"1","lControlClass":"text text-gray-l bold cmti cmti-1-5x cmti-angle-left","rControlClass":"text text-gray-l bold cmti cmti-1-5x cmti-angle-right","lControlContent":"","rControlContent":"","autoScrollDuration":"","stopOnHover":"1","sliderWidth":"","sliderHeight":"","slideDimMax":"1","slideWidth":"","slideHeight":"","slideArrangement":"filmstrip","resizeBkgImage":"0","bkgImageClass":"","responsiveImage":"0","autoHeight":"1","duration":"500","preSlideChange":"","postSlideChange":"","onSlideClick":"","slideTemplate":"reader","slideTemplateDir":"@templates\/foxslider","slideTexture":"texture","genericContent":"","lazyLoad":"1","lazySmall":"0","lazyImageUrl":"","lazyLoadImage":"lazy\/slider-1920-800.jpg"}}', NULL, 0, NULL ]
		];

		$this->batchInsert( 'fxs_slider', $columns, $sliders );

		$columns = [ 'id', 'sliderId', 'imageId', 'name', 'title', 'description', 'url', 'order', 'content' ];

		$slides = [
			[100001, 10001, 102001, 'Slide 1', '', '', '', 0, '' ],
			[100002, 10001, 102002, 'Slide 2', '', '', '', 0, '' ],
			[100003, 10001, 102003, 'Slide 3', '', '', '', 0, '' ]
		];

		$this->batchInsert( 'fxs_slide', $columns, $slides );
	}

	public function down() {

		echo "m181018_026621_slider will be deleted with m160621_014408_core.\n";
	}

}
