<?php
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\resources\Form;
use cmsgears\core\common\models\resources\FormField;

use cmsgears\core\common\utilities\DateUtil;

class m160623_072922_forms extends \yii\db\Migration {

	// Private Variables

	private $cmgPrefix;
	private $appPrefix;

	private $site;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;
		$this->appPrefix	= Yii::$app->migration->appPrefix;

		$this->site			= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master		= User::findByUsername( Yii::$app->migration->getSiteMaster() );
	}

	public function up() {

		$this->insertContactForm();

		$this->insertFeedbackForm();
	}

	private function insertContactForm() {

		$formTemplate	= Template::findBySlugType( 'form', CoreGlobal::TYPE_FORM );

		$this->insert( $this->cmgPrefix . 'core_form', [
			'siteId' => $this->site->id, 'templateId' => $formTemplate->id,
			'createdBy' => $this->master->id, 'modifiedBy' => $this->master->id,
			'name' => 'Contact Us', 'slug' => 'contact-us',
			'type' => CoreGlobal::TYPE_SITE,
			'description' => 'contact form',
			'successMessage' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.',
			'captcha' => true,
			'visibility' => Form::VISIBILITY_PUBLIC,
			'active' => true, 'userMail' => false,'adminMail' => true,
			'createdAt' => DateUtil::getDateTime(),
			'modifiedAt' => DateUtil::getDateTime()
		]);

		$config	= Form::findBySlugType( 'contact-us', CoreGlobal::TYPE_SITE );

		$columns = [ 'formId', 'name', 'label', 'type', 'compress', 'validators', 'order', 'icon', 'htmlOptions' ];

		$fields	= [
			[ $config->id, 'name', 'Name', FormField::TYPE_TEXT, false, 'required', 0, NULL , '{"placeholder":"Name"}' ],
			[ $config->id, 'email', 'Email', FormField::TYPE_TEXT, false, 'required', 0, NULL , '{"placeholder":"Email"}' ],
			[ $config->id, 'subject', 'Subject', FormField::TYPE_TEXT, false, 'required', 0, NULL , '{"placeholder":"Subject"}' ],
			[ $config->id, 'message', 'Message', FormField::TYPE_TEXTAREA, false, 'required', 0, NULL , '{"placeholder":"Message"}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form_field', $columns, $fields );
	}

	private function insertFeedbackForm() {

		$formTemplate	= Template::findBySlugType( 'form', CoreGlobal::TYPE_FORM );

		$this->insert( $this->cmgPrefix . 'core_form', [
			'siteId' => $this->site->id, 'templateId' => $formTemplate->id,
			'createdBy' => $this->master->id, 'modifiedBy' => $this->master->id,
			'name' => 'Feedback', 'slug' => 'feedback',
			'type' => CoreGlobal::TYPE_SITE,
			'description' => 'feedback form',
			'successMessage' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.',
			'captcha' => false, // It's a protected form
			'visibility' => Form::VISIBILITY_PROTECTED,
			'active' => true, 'userMail' => false,'adminMail' => true,
			'createdAt' => DateUtil::getDateTime(),
			'modifiedAt' => DateUtil::getDateTime(),
			'uniqueSubmit' => true
		]);

		$config	= Form::findBySlugType( 'feedback', CoreGlobal::TYPE_SITE );

		$columns = [ 'formId', 'name', 'label', 'type', 'compress', 'validators', 'order', 'icon', 'htmlOptions' ];

		$fields	= [
			// Notes: Need only message and rating since this form is protected.
			//[ $config->id, 'name', 'Name', FormField::TYPE_TEXT, false, 'required', 0, NULL , '{"placeholder":"Name"}' ],
			//[ $config->id, 'email', 'Email', FormField::TYPE_TEXT, false, 'required', 0, NULL , '{"placeholder":"Email"}' ],
			[ $config->id, 'message', 'Message', FormField::TYPE_TEXTAREA, false, 'required', 0, NULL , '{"placeholder":"Message"}' ],
			[ $config->id, 'rating', 'Rate Your Experience', FormField::TYPE_RATING, false, 'required', 0, NULL , NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_form_field', $columns, $fields );
	}

	public function down() {

		echo "m160623_050713_forms will be deleted with m160621_014408_core.\n";
	}
}
