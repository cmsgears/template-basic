<?php
// CMG Imports
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

// Basic Imports
use modules\core\common\config\CoreGlobal;

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

		$this->insertTemplates();

		$this->insertElements();

		$this->insertBlocks();

		$this->insertMappings();
	}

	private function insertFiles() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'tag', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'small', 'thumb', 'placeholder', 'smallPlaceholder', 'caption', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[ 104001, $site->id, $master->id, $master->id, 'file1', NULL, 'file1', '', 'jpg', 'gallery', 0.0951, 1500, 'image', NULL, '2019-03-26/gallery/file1.jpg', '2019-03-26/gallery/file1-medium.jpg', '2019-03-26/gallery/file1-small.jpg', '2019-03-26/gallery/file1-thumb.jpg', '2019-03-26/gallery/file1-pl.jpg', '2019-03-26/gallery/file1-small-pl.jpg', NULL, NULL, NULL, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Element Templates
			[ 101001, $master->id, $master->id, 'Card', 'card', 'element', null, null, true, 'Default layout for card elements.', null, null, null, null, null, null, null, 'templates\models\core\settings\ElementSettings', '@templates/core/element/card/default/forms', 'default', true, null, false, '@templates/core/element/card/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-default" }', null, null ],
			[ 101002, $master->id, $master->id, 'Box', 'box', 'element', null, null, true, 'Default layout for box elements.', null, null, null, null, null, null, null, 'templates\models\core\settings\ElementSettings', '@templates/core/element/box/default/forms', 'default', true, null, false, '@templates/core/element/box/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "box box-basic box-default" }', null, null ],
			// Block Templates
			[ 101003, $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, 'block', null, null, true, 'Default layout for blocks.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ 101004, $master->id, $master->id, 'Max', 'max', 'block', null, null, true, 'Default layout for max blocks.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max" }', null, null ],
			[ 101005, $master->id, $master->id, 'Testimonial', 'testimonial', 'block', null, null, true, 'Testimonial layout for blocks showing testimonials.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/testimonial', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-testimonial" }', null, null ],
			[ 101006, $master->id, $master->id, 'FoxSlider', 'foxslider', 'block', null, null, true, 'FoxSlider layout for blocks showing slider. The block slug must be same as that of foxslider.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/foxslider', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-max-buffer block-foxslider" }', null, null ],
			[ 101007, $master->id, $master->id, 'Features', 'features', 'block', null, null, true, 'Default layout for features block.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/features', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ 101008, $master->id, $master->id, 'Contact', 'contact', 'block', null, null, true, 'Default layout for contact block.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/contact', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertElements() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$cardElement	= Template::findGlobalBySlugType( 'card', CoreGlobal::TYPE_ELEMENT );
		$boxElement		= Template::findGlobalBySlugType( 'box', CoreGlobal::TYPE_ELEMENT );

		$columns = [ 'id', 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$elements = [
			[ 10001, $site->id, NULL, $cardElement->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Feature 1', 'feature-1', 'element', 'icon', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-feature" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","header":"1","headerIcon":"1","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentRaw":"","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","purifySummary":"1","purifyContent":"1"}}', NULL, 0, NULL ],
			[ 10002, $site->id, NULL, $cardElement->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Feature 2', 'feature-2', 'element', 'icon', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-feature" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","header":"1","headerIcon":"1","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentRaw":"","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","purifySummary":"1","purifyContent":"1"}}', NULL, 0, NULL ],
			[ 10003, $site->id, NULL, $cardElement->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Feature 3', 'feature-3', 'element', 'icon', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-feature" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","header":"1","headerIcon":"1","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentRaw":"","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","purifySummary":"1","purifyContent":"1"}}', NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $elements );

		$columns = [ 'id', 'modelId', 'name', 'label', 'type', 'active', 'order', 'valueType', 'value', 'data' ];

		$metas = [
			//[ 100001, 10001, 'facebook', 'Facebook', '', 1, 0, 'text', 'https://www.facebook.com/', NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object_meta', $columns, $metas );
	}

	private function insertBlocks() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$defaultBlock	= Template::findGlobalBySlugType( 'default', CoreGlobal::TYPE_BLOCK );
		$featuresBlock	= Template::findGlobalBySlugType( 'features', CoreGlobal::TYPE_BLOCK );
		$contactBlock	= Template::findGlobalBySlugType( 'contact', CoreGlobal::TYPE_BLOCK );
		$fxsBlock		= Template::findGlobalBySlugType( 'foxslider', CoreGlobal::TYPE_BLOCK );

		$columns = [ 'id', 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$blocks = [
			[10201, $site->id, NULL, $fxsBlock->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Main Slider', 'main-slider', 'block', 'icon', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(),'{ "id": "slider-main", "class": "block block-foxslider cmt-block", "cmt-block": "block-auto" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","fixedBkg":"0","scrollBkg":"0","parallaxBkg":"0","bkgClass":"","texture":"0","maxCover":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","boxWrapClass":"","boxWrapper":"","boxClass":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","elements":"0","elementType":"","widgets":null,"widgetType":null}}',NULL,0,NULL],
			[10202, $site->id, NULL, $featuresBlock->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Features', 'features', 'block', 'icon', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(),'{ "id": "block-features", "class": "block block-max cmt-block", "cmt-block": "block-auto" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","fixedBkg":"0","scrollBkg":"0","parallaxBkg":"0","bkgClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}',NULL,0,NULL],
			[10203, $site->id, NULL, $contactBlock->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Contact', 'contact', 'block', 'icon', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(),'{ "id": "block-contact", "class": "block block-max cmt-block", "cmt-block": "block-auto" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","fixedBkg":"0","scrollBkg":"0","parallaxBkg":"0","bkgClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}',NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $blocks );

		$metas = [
			//[ 200001, 10201, 'facebook', 'Facebook', '', 1, 0, 'text', 'https://www.facebook.com/', NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object_meta', $columns, $metas );
	}

	private function insertMappings() {

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'pinned', 'featured', 'nodes' ];

		$mappings = [
			[ 100001, 10001, 10201, CoreGlobal::TYPE_BLOCK, CoreGlobal::TYPE_ELEMENT, 0, 1, 0, 0, NULL ],
			[ 100002, 10002, 10201, CoreGlobal::TYPE_BLOCK, CoreGlobal::TYPE_ELEMENT, 0, 1, 0, 0, NULL ],
			[ 100003, 10003, 10201, CoreGlobal::TYPE_BLOCK, CoreGlobal::TYPE_ELEMENT, 0, 1, 0, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_object', $columns, $mappings );
	}

	public function down() {

		echo "m181019_046641_objects will be deleted with m160621_014408_core.\n";
	}

}
