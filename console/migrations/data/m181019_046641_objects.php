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

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'code', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'small', 'thumb', 'placeholder', 'smallPlaceholder', 'ogg', 'webm', 'caption', 'altText', 'link', 'backend', 'frontend', 'shared', 'srcset', 'sizes', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			[ 104001, $site->id, $master->id, $master->id, 'about', NULL, 'about', '', 'jpg', 'banner', 0.123, 1500, 'image', NULL, '2020-08-11/banner/about.jpg', '2020-08-11/banner/about-medium.jpg', '2020-08-11/banner/about-small.jpg', '2020-08-11/banner/about-thumb.jpg', '2020-08-11/banner/about-pl.jpg', '2020-08-11/banner/about-small-pl.jpg', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '1920,1152,576', '(max-width: 1920px) 100vw, 1920px', DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertTemplates() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Element Templates
			[ 101001, $master->id, $master->id, 'Card', 'card', CoreGlobal::TYPE_ELEMENT, null, null, true, true, 'Default layout for card elements.', null, null, null, null, null, null, null, 'templates\models\core\settings\ElementSettings', '@templates/core/element/card/default/forms', 'default', true, null, false, '@templates/core/element/card/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card-basic card-default" }', null, null ],
			[ 101002, $master->id, $master->id, 'Card Social', 'card-social', CoreGlobal::TYPE_ELEMENT, null, null, true, true, 'Default layout for card elements.', null, null, null, null, null, null, null, 'templates\models\core\settings\ElementSettings', '@templates/core/element/card/default/forms', 'default', true, null, false, '@templates/core/element/card/social', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card-basic card-social" }', null, null ],
			[ 101003, $master->id, $master->id, 'Box', 'box', CoreGlobal::TYPE_ELEMENT, null, null, true, true, 'Default layout for box elements.', null, null, null, null, null, null, null, 'templates\models\core\settings\ElementSettings', '@templates/core/element/box/default/forms', 'default', true, null, false, '@templates/core/element/box/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "box-basic box-default" }', null, null ],
			[ 101004, $master->id, $master->id, 'Box Social', 'box-social', CoreGlobal::TYPE_ELEMENT, null, null, true, true, 'Default layout for box elements.', null, null, null, null, null, null, null, 'templates\models\core\settings\ElementSettings', '@templates/core/element/box/default/forms', 'default', true, null, false, '@templates/core/element/box/social', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "box-basic box-social" }', null, null ],
			// Max Block - Default, Testimonial, FoxSlider
			[ 101021, $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CoreGlobal::TYPE_BLOCK, null, null, true, true, 'Default layout for blocks.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ 101022, $master->id, $master->id, 'Text', 'text', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'Default layout for blocks showing text.', null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\config\block\TextConfig', '@templates/core/block/text/forms', 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/text', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ 101023, $master->id, $master->id, 'Social', 'social', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'It can be used to display social links using social attributes.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\settings\WidgetSettings', '@breeze/templates/cms/widget/default/forms', 'default', true, null, false, '@templates/core/block/social', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ 101024, $master->id, $master->id, 'Gallery', 'gallery', CoreGlobal::TYPE_BLOCK, null, null, true, false, "Default layout for blocks showing it's gallery.", null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\config\block\GalleryConfig', '@templates/core/block/gallery/forms', 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/gallery', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ 101025, $master->id, $master->id, 'Slider', 'slider', CoreGlobal::TYPE_BLOCK, null, null, true, false, "Default layout for blocks showing slider of it's gallery.", null, null, null, null, null, 'cmsgears\templates\breeze\models\cms\config\block\SliderConfig', '@templates/core/block/slider/gallery/forms', 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/slider/gallery', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default block-slider-default" }', null, null ],
			[ 101026, $master->id, $master->id, 'Attributes Slider', 'attributes-slider', CoreGlobal::TYPE_BLOCK, null, null, true, false, "Default layout for blocks showing slider of it's attributes.", null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/slider/attributes', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default block-slider-attributes" }', null, null ],
			[ 101027, $master->id, $master->id, 'Attributes Accordian', 'attributes-accordian', CoreGlobal::TYPE_BLOCK, null, null, true, false, "Default layout for blocks showing accordian of it's attributes.", null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/accordian/attributes', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			[ 101028, $master->id, $master->id, 'Max', 'max', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'Default layout for max blocks.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max" }', null, null ],
			[ 101029, $master->id, $master->id, 'Announcements', 'announcements', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'Announcements layout for blocks showing announcements.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/announcements', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-announcements" }', null, null ],
			[ 101030, $master->id, $master->id, 'Testimonial', 'testimonial', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'Testimonial layout for blocks showing testimonial form.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/testimonial', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-testimonial" }', null, null ],
			[ 101031, $master->id, $master->id, 'Testimonials', 'testimonials', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'Testimonials layout for blocks showing testimonials.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/testimonials', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-testimonials" }', null, null ],
			[ 101032, $master->id, $master->id, 'Feedback', 'feedback', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'Feedback layout for blocks showing feedback form.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/feedback', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-feedback" }', null, null ],
			[ 101033, $master->id, $master->id, 'Feedbacks', 'feedbacks', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'Feedbacks layout for blocks showing feedbacks.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/feedbacks', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-feedbacks" }', null, null ],
			[ 101034, $master->id, $master->id, 'Newsletter', 'newsletter', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'Feedbacks layout for blocks showing newsletter form.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/newsletter', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-newsletter" }', null, null ],
			[ 101035, $master->id, $master->id, 'FoxSlider', 'foxslider', CoreGlobal::TYPE_BLOCK, null, null, true, false, 'FoxSlider layout for blocks showing slider. The block slug must be same as that of foxslider.', null, null, null, null, null, null, null, 'templates\models\core\settings\BlockSettings', '@templates/core/block/default/forms', 'default', true, null, false, '@templates/core/block/foxslider', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-max block-max-buffer block-foxslider" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertElements() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$cardElement	= Template::findGlobalBySlugType( 'card', CoreGlobal::TYPE_ELEMENT );
		$socialElement	= Template::findGlobalBySlugType( 'card-social', CoreGlobal::TYPE_ELEMENT );
		$boxElement		= Template::findGlobalBySlugType( 'box', CoreGlobal::TYPE_ELEMENT );
		$featureElement	= Template::findByThemeSlugType( 'feature', CoreGlobal::TYPE_ELEMENT );

		$columns = [ 'id', 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'popular', 'backend', 'frontend', 'shared', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$elements = [
			[ 10001, $site->id, NULL, $cardElement->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Info', 'info', CoreGlobal::TYPE_ELEMENT, NULL, 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, 0, 1, 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-info" }', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","maxCover":"0","maxCoverClass":"","header":"1","headerIcon":"0","headerIconUrl":"","headerTitle":"0","headerInfo":"0","headerContent":"1","content":"0","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentRaw":"","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaTypes":"","metaWrapClass":"","purifySummary":"1","purifyContent":"1","metaType":""}}', NULL, 0, NULL ],
			[ 10002, $site->id, NULL, $socialElement->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Social', 'social', CoreGlobal::TYPE_ELEMENT, NULL, 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, 0, 1, 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-social" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","maxCover":"0","maxCoverClass":"","header":"0","headerIcon":"0","headerIconUrl":"","headerTitle":"0","headerInfo":"0","headerContent":"0","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentRaw":"","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"1","metaTypes":"social","metaWrapClass":"menu-social","purifySummary":"1","purifyContent":"1","metaType":""}}', NULL, 0, NULL ],
			[ 10011, $site->id, NULL, $featureElement->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Feature 1', 'feature-1', CoreGlobal::TYPE_ELEMENT, 'icon fas fa-chart-pie', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, 0, 1, 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-feature" }', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","header":"1","headerIcon":"1","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentRaw":"","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","purifySummary":"1","purifyContent":"1"}}', NULL, 0, NULL ],
			[ 10012, $site->id, NULL, $featureElement->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Feature 2', 'feature-2', CoreGlobal::TYPE_ELEMENT, 'icon cmti cmti-earth', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, 0, 1, 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-feature" }', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","header":"1","headerIcon":"1","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentRaw":"","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","purifySummary":"1","purifyContent":"1"}}', NULL, 0, NULL ],
			[ 10013, $site->id, NULL, $featureElement->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Feature 3', 'feature-3', CoreGlobal::TYPE_ELEMENT, 'icon fas fa-flask', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, 0, 1, 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-feature" }', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","header":"1","headerIcon":"1","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentRaw":"","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","purifySummary":"1","purifyContent":"1"}}', NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $elements );

		$columns = [ 'id', 'modelId', 'name', 'label', 'type', 'icon', 'active', 'order', 'valueType', 'value', 'data' ];

		$metas = [
			[ 100001, 10002, 'facebook', 'Facebook', 'social', 'icon cmti cmti-brand cmti-brand-facebook', 1, 0, 'text', 'https://www.facebook.com/', NULL ],
			[ 100002, 10002, 'twitter', 'Twitter', 'social', 'icon cmti cmti-brand cmti-brand-twitter', 1, 0, 'text', 'https://www.twitter.com/', NULL ],
			[ 100003, 10002, 'linkedin', 'LinkedIn', 'social', 'icon cmti cmti-brand cmti-brand-linkedin', 1, 0, 'text', 'https://www.linkedin.com/', NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object_meta', $columns, $metas );
	}

	private function insertBlocks() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$defaultBlock	= Template::findGlobalBySlugType( 'default', CoreGlobal::TYPE_BLOCK );
		$maxBlock		= Template::findGlobalBySlugType( 'max', CoreGlobal::TYPE_BLOCK );
		$fxsBlock		= Template::findGlobalBySlugType( 'foxslider', CoreGlobal::TYPE_BLOCK );

		$aboutBlock		= Template::findByThemeSlugType( 'about', CoreGlobal::TYPE_BLOCK );
		$contactBlock	= Template::findByThemeSlugType( 'contact', CoreGlobal::TYPE_BLOCK );

		$columns = [ 'id', 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'popular', 'backend', 'frontend', 'shared', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$blocks = [
			[ 10201, $site->id, NULL, $fxsBlock->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Main Slider', 'main-slider', CoreGlobal::TYPE_BLOCK, 'icon', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, 0, 1, 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime(),'{ "id": "block-slider-main", "class": "block block-foxslider" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","fixedBkg":"0","scrollBkg":"0","parallaxBkg":"0","bkgClass":"","texture":"0","maxCover":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","boxWrapClass":"","boxWrapper":"","boxClass":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","elements":"0","elementType":"","widgets":null,"widgetType":null}}',NULL,0,NULL],
			[ 10202, $site->id, NULL, $defaultBlock->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Features', 'features', CoreGlobal::TYPE_BLOCK, 'icon', 'texture', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, NULL, 16000, 1500, 0, 0, 0, 0, 1, 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime(),'{ "id": "block-second" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","fixedBkg":"0","scrollBkg":"0","parallaxBkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","header":"0","headerIcon":"0","headerTitle":"1","headerInfo":"1","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentRaw":"","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","elements":"1","elementsBeforeContent":"1","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","purifySummary":"1","purifyContent":"1","widgets":"0","widgetsBeforeContent":"0","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}',NULL,0,NULL],
			[ 10203, $site->id, NULL, $aboutBlock->id, NULL, 104001, NULL, NULL, $master->id, $master->id, 'About', 'about', CoreGlobal::TYPE_BLOCK, 'icon', 'texture', 'About', NULL, NULL, NULL, 16000, 1500, 0, 0, 0, 0, 1, 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime(),'{ "id": "block-common", "class": "block block-basic cmt-block", "cmt-block": "block-half-mauto" }', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ', NULL, '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"1","fixedBkg":"1","scrollBkg":"0","parallaxBkg":"0","bkgClass":"","bkgVideo":"0","texture":"1","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"1","headerContent":"1","headerIconUrl":"","content":"0","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentRaw":"","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","elements":"1","elementsBeforeContent":"0","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","purifySummary":"1","purifyContent":"1","widgets":"0","widgetsBeforeContent":"0","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}',NULL,0,NULL],
			[ 10204, $site->id, NULL, $contactBlock->id, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Contact', 'contact', CoreGlobal::TYPE_BLOCK, 'icon', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, 0, 1, 0, 1, DateUtil::getDateTime(), DateUtil::getDateTime(),'{ "id": "block-common", "class": "block block-basic block-max", "cmt-block": "block-mauto" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","lazyAvatar":"0","resAvatar":"0","defaultBanner":"0","lazyBanner":"0","resBanner":"0","bkg":"0","fixedBkg":"0","scrollBkg":"0","parallaxBkg":"0","bkgClass":"","bkgVideo":"0","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentRaw":"","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","purifySummary":"1","purifyContent":"1","widgets":"0","widgetsBeforeContent":"0","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":""}}',NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $blocks );

		$metas = [
			//[ 200001, 10201, 'facebook', 'Facebook', '', 1, 0, 'text', 'https://www.facebook.com/', NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object_meta', $columns, $metas );
	}

	private function insertMappings() {

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'key', 'order', 'active', 'pinned', 'featured', 'nodes' ];

		$mappings = [
			[ 100004, 10011, 10202, CoreGlobal::TYPE_BLOCK, CoreGlobal::TYPE_ELEMENT, NULL, 0, 1, 0, 0, NULL ],
			[ 100005, 10012, 10202, CoreGlobal::TYPE_BLOCK, CoreGlobal::TYPE_ELEMENT, NULL,  0, 1, 0, 0, NULL ],
			[ 100006, 10013, 10202, CoreGlobal::TYPE_BLOCK, CoreGlobal::TYPE_ELEMENT, NULL, 0, 1, 0, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_object', $columns, $mappings );
	}

	public function down() {

		echo "m181019_046641_objects will be deleted with m160621_014408_core.\n";
	}

}
