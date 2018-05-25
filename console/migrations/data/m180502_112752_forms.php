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

use cmsgears\core\common\base\Migration;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\resources\Form;
use cmsgears\core\common\models\resources\FormField;

use cmsgears\core\common\utilities\DateUtil;

class m180502_112752_forms extends Migration {

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

		$this->insertContactForm();
	}

	private function insertContactForm() {

		$formTemplate = Template::findBySlugType( 'form', CoreGlobal::TYPE_FORM );

		$this->insert( $this->cmgPrefix . 'core_form', [
			'siteId' => $this->site->id, 'templateId' => $formTemplate->id,
			'createdBy' => $this->master->id, 'modifiedBy' => $this->master->id,
			'name' => 'Contact Us', 'slug' => 'contact-us',
			'type' => CoreGlobal::TYPE_SITE,
			'description' => 'contact form',
			'success' => 'Thanks for contacting us.',
			'captcha' => true,
			'visibility' => Form::VISIBILITY_PUBLIC,
			'status' => Form::STATUS_ACTIVE, 'userMail' => false, 'adminMail' => true,
			'createdAt' => DateUtil::getDateTime(),
			'modifiedAt' => DateUtil::getDateTime()
		]);

		$config	= Form::findBySlugType( 'contact-us', CoreGlobal::TYPE_SITE );

		$columns = [ 'formId', 'name', 'label', 'type', 'compress', 'validators', 'order', 'icon', 'htmlOptions' ];

		$fields	= [
			[ $config->id, 'name', 'Name', FormField::TYPE_TEXT, false, 'required', 0, NULL, '{"placeholder":"Name"}' ],
			[ $config->id, 'email', 'Email', FormField::TYPE_TEXT, false, 'required', 0, NULL, '{"placeholder":"Email"}' ],
			[ $config->id, 'subject', 'Subject', FormField::TYPE_TEXT, false, 'required', 0, NULL, '{"placeholder":"Subject"}' ],
			[ $config->id, 'message', 'Message', FormField::TYPE_TEXTAREA, false, 'required', 0, NULL, '{"placeholder":"Message"}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form_field', $columns, $fields );
	}

	public function down() {

		echo "m180502_112752_forms will be deleted with m160621_014408_core.\n";
	}

}
