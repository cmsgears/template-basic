<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

// CMG Imports
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\resources\Form;
use cmsgears\core\common\models\resources\FormField;

use cmsgears\core\common\utilities\DateUtil;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class m200413_031480_forms extends \cmsgears\core\common\base\Migration {

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

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'code', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'small', 'thumb', 'placeholder', 'smallPlaceholder', 'ogg', 'webm', 'caption', 'altText', 'link', 'shared', 'srcset', 'sizes', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[ 108001, $site->id, $master->id, $master->id, 'test', NULL, 'test', '', 'jpg', 'banner', 0.123, 1500, 'image', NULL, '2020-08-11/banner/test.jpg', '2020-08-11/banner/test-medium.jpg', '2020-08-11/banner/test-small.jpg', '2020-08-11/banner/test-thumb.jpg', '2020-08-11/banner/test-pl.jpg', '2020-08-11/banner/test-small-pl.jpg', NULL, NULL, NULL, NULL, NULL, 0, '1920,1152,576', '(max-width: 1920px) 100vw, 1920px', DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertFormTemplates() {

		$master	= $this->master;

		$columns = [ 'id', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'frontend', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Form - Default
			[ 111001, $master->id, $master->id, 'Default', CoreGlobal::TEMPLATE_DEFAULT, CoreGlobal::TYPE_FORM, null, null, true, false, 'It can be used to display public forms.', null, null, null, null, null, null, null, 'templates\models\core\settings\FormSettings', '@templates/core/form/default/forms', 'default', true, 'form/default', false, '@templates/core/form/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page page-basic page-form page-form-regular" }', null, '{"tsettings":{"background":"0","backgroundClass":"","texture":"0","maxCover":"0","maxCoverClass":"","header":"1","headerIcon":"1","headerTitle":"1","headerInfo":"1","headerContent":"1","headerIconUrl":"","headerFluid":"0","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","formClass":"","formCaptchaAction":"","wrapCaptcha":"1","wrapActions":"1","labels":"1","split4060":"1","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","purifySummary":"1","purifyContent":"1"}}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertForms() {

		$site	= $this->site;
		$master	= $this->master;

		$vis	= Form::VISIBILITY_PUBLIC;
		$status	= Form::STATUS_ACTIVE;

		$formTemplate = Template::findGlobalBySlugType( 'default', CoreGlobal::TYPE_FORM );

		$columns = [ 'id', 'siteId', 'templateId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'description', 'success', 'captcha', 'visibility', 'status', 'userMail', 'adminMail', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$models = [
			[ 10001, $site->id, $formTemplate->id, $master->id, $master->id, 'Contact Us', 'contact-us', CoreGlobal::TYPE_FORM, null, null, null, 'Thanks for contacting us.', true, $vis, $status, false, true, DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form', $columns, $models );
	}

	private function insertFormFields() {

		$form = Form::findBySlugType( 'contact-us', CoreGlobal::TYPE_FORM );

		$columns = [ 'id', 'formId', 'optionGroupId', 'name', 'label', 'type', 'compress', 'validators', 'order', 'active', 'icon', 'htmlOptions' ];

		$fields	= [
			[ 100001, $form->id, NULL, 'name', 'Name', FormField::TYPE_TEXT, false, 'required', 0, 1, NULL, '{"field":{"placeholder":"Name"}, "wrapper":{"options":{"class":"form-group col col2"}}}' ],
			[ 100002, $form->id, NULL, 'email', 'Email', FormField::TYPE_TEXT, false, 'required', 0, 1, NULL, '{"field":{"placeholder":"Email"}, "wrapper":{"options":{"class":"form-group col col2"}}}' ],
			[ 100003, $form->id, NULL, 'subject', 'Subject', FormField::TYPE_TEXT, false, 'required', 0, 1, NULL, '{"field":{"placeholder":"Subject"}, "wrapper":{"options":{"class":"form-group col col1"}}}' ],
			[ 100004, $form->id, NULL, 'message', 'Message', FormField::TYPE_TEXTAREA, false, 'required', 0, 1, NULL, '{"field":{"placeholder":"Message"}, "wrapper":{"options":{"class":"form-group col col1"}}}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form_field', $columns, $fields );
	}

	private function updateForms() {

		$desc = [
			'Submit the Form to Contact Us.'
		];

		$seo = [
			'"plugins": { "seo": { "name": "Contact Us", "summary": "Contact Us", "desc": "Contact Us", "keywords": "Contact Us", "robot": "noindex,follow" } }'
		];

		$settings = [
			'"settings":{"background":"0","backgroundClass":"","texture":"0","maxCover":"0","maxCoverClass":"","header":"1","headerIcon":"1","headerTitle":"1","headerInfo":"1","headerContent":"1","headerIconUrl":"","headerFluid":"0","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","formClass":"","formCaptchaAction":"","wrapCaptcha":"1","wrapActions":"1","labels":"1","split4060":"0","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","purifySummary":"1","purifyContent":"1"}'
		];

		$data = [
			'{' . $seo[ 0 ] . ',' . $settings[ 0 ] . ' }'
		];

		$options = [
			'{ "class": "form row max-cols-100" }'
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

		echo "m200413_031480_forms will be deleted with m160621_014408_core.\n";
	}

}
