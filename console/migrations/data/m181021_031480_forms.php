<?php
// CMG Imports
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\resources\Form;
use cmsgears\core\common\models\resources\FormField;

use cmsgears\core\common\utilities\DateUtil;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class m181021_031480_forms extends \cmsgears\core\common\base\Migration {

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

		$this->insertFormTemplates();

		$this->insertForms();
		$this->insertFormFields();

		$this->updateForms();
	}

	private function insertFiles() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'tag', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'small', 'thumb', 'placeholder', 'smallPlaceholder', 'caption', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[ 108001, $site->id, $master->id, $master->id, 'file1', NULL, 'file1', '', 'jpg', 'gallery', 0.0951, 1500, 'image', NULL, '2019-03-26/gallery/file1.jpg', '2019-03-26/gallery/file1-medium.jpg', '2019-03-26/gallery/file1-small.jpg', '2019-03-26/gallery/file1-thumb.jpg', '2019-03-26/gallery/file1-pl.jpg', '2019-03-26/gallery/file1-small-pl.jpg', NULL, NULL, NULL, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertFormTemplates() {

		$master	= $this->master;

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Form - Default
			[ $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CoreGlobal::TYPE_FORM, null, null, true, 'It can be used to display public forms.', null, null, null, null, null, null, null, 'templates\models\core\settings\FormSettings', '@templates/core/form/default/forms', 'default', true, 'form/default', false, '@templates/core/form/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic" }', null, null ],
			[ $master->id, $master->id, 'Contact', 'contact', CoreGlobal::TYPE_FORM, null, null, true, 'It can be used to display contact forms.', null, null, null, null, null, null, null, 'templates\models\core\settings\FormSettings', '@templates/core/form/default/forms', 'default', true, 'form/default', false, '@templates/core/form/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic page-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertForms() {

		$site	= $this->site;
		$master	= $this->master;

		$vis	= Form::VISIBILITY_PUBLIC;
		$status	= Form::STATUS_ACTIVE;

		$formTemplate		= Template::findGlobalBySlugType( 'default', CoreGlobal::TYPE_FORM );
		$contactTemplate	= Template::findGlobalBySlugType( 'contact', CoreGlobal::TYPE_FORM );

		$columns = [ 'id', 'siteId', 'templateId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'description', 'success', 'captcha', 'visibility', 'status', 'userMail', 'adminMail', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			[ 10001, $site->id, $contactTemplate->id, $master->id, $master->id, 'Contact Us', 'contact-us', CoreGlobal::TYPE_FORM, null, null, 'contact form', 'Thanks for contacting us.', true, $vis, $status, false, true, DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form', $columns, $models );
	}

	private function insertFormFields() {

		$form = Form::findBySlugType( 'contact-us', CoreGlobal::TYPE_FORM );

		$columns = [ 'id', 'formId', 'name', 'label', 'type', 'compress', 'validators', 'order', 'icon', 'htmlOptions' ];

		$fields	= [
			[ 100001, $form->id, 'name', 'Name', FormField::TYPE_TEXT, false, 'required', 0, NULL, '{"field":{placeholder":"Name"}}' ],
			[ 100002, $form->id, 'email', 'Email', FormField::TYPE_TEXT, false, 'required', 0, NULL, '{"field":{"placeholder":"Email"}}' ],
			[ 100003, $form->id, 'subject', 'Subject', FormField::TYPE_TEXT, false, 'required', 0, NULL, '{"field":{"placeholder":"Subject"}}' ],
			[ 100004, $form->id, 'message', 'Message', FormField::TYPE_TEXTAREA, false, 'required', 0, NULL, '{"field":{"placeholder":"Message"}}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form_field', $columns, $fields );
	}

	private function updateForms() {

		$desc = [
			'Contact Us'
		];

		$seo = [
			'"plugins": { "seo": { "name": "Contact Us", "summary": "Contact Us", "desc": "Contact Us", "keywords": "Contact Us", "robot": "noindex,follow" } }'
		];

		$settings = [
			'"settings":{"background":"0","backgroundClass":"","texture":"1","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerFluid":"0","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","maxCover":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","formClass":"","formCaptchaAction":"","wrapCaptcha":"1","wrapActions":"1","labels":"0","split4060":"0","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","purifySummary":"1","purifyContent":"1","defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","headerBanner":"1","headerGallery":"0","contentAvatar":"0","contentBanner":"0","contentGallery":"0","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","sidebars":"1","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"1","rightSidebarSlug":"form-right","footerSidebar":null,"footerSidebarSlug":null}'
		];

		$data = [
			'{' . $seo[ 0 ] . ',' . $settings[ 0 ] . ' }'
		];

		$options = [
			'{ "class": "row max-cols-100" }'
		];

		// Contact Form
		$form = Form::findBySlugType( 'contact-us', 'form' );

		// Update Form
		$this->update( $this->cmgPrefix . 'core_form', [ 'texture' => 'texture texture-black', 'title' => 'Contact Us', 'description' => $desc[ 0 ], 'data' => $data[ 0 ], 'htmlOptions' => $options[ 0 ] ], [ 'id' => $form->id ] );

		// Update Form Fields
		//$this->update( $this->cmgPrefix . 'core_form_field', [ ], [ 'formId' => $form->id, 'name' => 'name' ] );

		// Update Template View
		//$this->update( $this->cmgPrefix . 'core_template', [ 'viewPath' => 'views/templates/form/contact' ], [ 'slug' => 'contact', 'type' => 'form' ] );
	}

	public function down() {

		echo "m181021_031480_forms will be deleted with m160621_014408_core.\n";
	}

}
