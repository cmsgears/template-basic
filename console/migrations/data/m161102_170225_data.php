<?php
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\resources\Form;
use cmsgears\core\common\models\resources\FormField;
use cmsgears\core\common\models\resources\Gallery;

use cmsgears\core\common\utilities\DateUtil;

class m161102_170225_data extends \yii\db\Migration {

	// Private Variables

	private $prefix;

	private $site;

	private $master;

	public function init() {

		// Fixed
		$this->prefix	= 'cmg_';

		$this->site		= Site::findBySlug( Yii::$app->migration->siteSlug );
		$this->master	= User::findByUsername( Yii::$app->migration->siteMaster );

		Yii::$app->core->setSite( $this->site );
	}

    public function up() {

		// Site Forms
		$this->insertContactForm();
       	$this->insertFeedbackForm();

		// Test Gallery
		$this->insertFiles();
		$this->insertGalleries();
    }

	private function insertContactForm() {

		$formTemplate	= Template::findBySlugType( 'form', CoreGlobal::TYPE_FORM );

		$this->insert( $this->prefix . 'core_form', [
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

		$this->batchInsert( $this->prefix . 'core_form_field', $columns, $fields );
	}

    private function insertFeedbackForm() {

        $this->insert( $this->prefix . 'core_form', [
            'siteId' => $this->site->id, 'templateId' => null,
            'createdBy' => $this->master->id, 'modifiedBy' => $this->master->id,
            'name' => 'Feedback', 'slug' => 'feedback',
            'type' => CoreGlobal::TYPE_SITE,
            'description' => 'feedback form',
            'successMessage' => 'Thanks for providing your valuable feedback.',
            'captcha' => false,
            'visibility' => Form::VISIBILITY_PROTECTED,
            'active' => true, 'userMail' => false,'adminMail' => true,
            'createdAt' => DateUtil::getDateTime(),
            'modifiedAt' => DateUtil::getDateTime()
        ]);

        $config = Form::findBySlugType( 'feedback', CoreGlobal::TYPE_SITE );

        $columns = [ 'formId', 'name', 'label', 'type', 'compress', 'validators', 'order', 'icon', 'htmlOptions' ];

        $fields = [
            [ $config->id, 'rating', 'Rating', FormField::TYPE_CHECKBOX, false, 'required', 0, NULL, NULL ],
            [ $config->id, 'review', 'Review', FormField::TYPE_TEXT, 0, 'required', false, NULL, NULL ],
            [ $config->id, 'name', 'Review', FormField::TYPE_TEXT, 0, 'required', false, NULL, NULL ],
            [ $config->id, 'email', 'Review', FormField::TYPE_TEXT, 0, 'required', false, NULL, NULL ]
        ];

        $this->batchInsert( $this->prefix . 'core_form_field', $columns, $fields );
    }

	private function insertFiles() {

		$columns = [ 'id', 'createdBy', 'modifiedBy', 'title', 'description', 'name', 'extension', 'directory', 'size', 'visibility', 'type', 'url', 'medium', 'thumb', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt' ];

		$files	= [
			[1,$this->master->id, $this->master->id,'Item 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','4f9dd9e0a7471181b4b7a4729407d96a','jpg','gallery',0.5,0,'image','2015-08-16/gallery/4f9dd9e0a7471181b4b7a4729407d96a.jpg',null,'2015-08-16/gallery/4f9dd9e0a7471181b4b7a4729407d96a-thumb.jpg','Item 1','',0,DateUtil::getDateTime(), DateUtil::getDateTime()],
			[2,$this->master->id, $this->master->id,'Item 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','925e82814e15d5e9832c74f75e594418','JPG','gallery',0.5,0,'image','2015-08-16/gallery/925e82814e15d5e9832c74f75e594418.JPG',null,'2015-08-16/gallery/925e82814e15d5e9832c74f75e594418-thumb.JPG','Item 2','',0,DateUtil::getDateTime(), DateUtil::getDateTime()],
			[3,$this->master->id, $this->master->id,'Item 3','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','ec7435a559fff465d91e1e959f025942','JPG','gallery',0.5,0,'image','2015-08-16/gallery/ec7435a559fff465d91e1e959f025942.JPG',null,'2015-08-16/gallery/ec7435a559fff465d91e1e959f025942-thumb.JPG','Item 3','',0,DateUtil::getDateTime(), DateUtil::getDateTime()],
			[4,$this->master->id, $this->master->id,'Item 4','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','d998309764ae3d095760bb152098b0f5','jpg','gallery',0.5,0,'image','2015-08-16/gallery/d998309764ae3d095760bb152098b0f5.jpg',null,'2015-08-16/gallery/d998309764ae3d095760bb152098b0f5-thumb.jpg','Item 4','',0,DateUtil::getDateTime(), DateUtil::getDateTime()],
			[5,$this->master->id, $this->master->id,'Item 5','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','ea69dce0c8624a6b4b761243ef5975d7','JPG','gallery',0.5,0,'image','2015-08-16/gallery/ea69dce0c8624a6b4b761243ef5975d7.JPG',null,'2015-08-16/gallery/ea69dce0c8624a6b4b761243ef5975d7-thumb.JPG','Item 5','',0,DateUtil::getDateTime(), DateUtil::getDateTime()],
			[6,$this->master->id, $this->master->id,'Item 6','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','d2935c354804cd46b07c03f0f06db069','jpg','gallery',0.5,0,'image','2015-08-16/gallery/d2935c354804cd46b07c03f0f06db069.jpg',null,'2015-08-16/gallery/d2935c354804cd46b07c03f0f06db069-thumb.jpg','Item 6','',0,DateUtil::getDateTime(), DateUtil::getDateTime()]
		];

		$this->batchInsert( $this->prefix . 'core_file',$columns, $files );
	}

	private function insertGalleries() {

		$columns 	= [ 'siteId', 'templateId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'title', 'description', 'active', 'createdAt', 'modifiedAt' ];

		$galleries	= [
			[ $this->site->id,null,$this->master->id, $this->master->id,'main','main',CoreGlobal::TYPE_SITE,'About Us','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1, DateUtil::getDateTime(), DateUtil::getDateTime()]
		];

		$this->batchInsert( $this->prefix . 'core_gallery', $columns, $galleries );

		$main		= Gallery::findBySlug( 'main', true );

		$columns 	= [ 'modelId', 'parentId', 'parentType', 'type', 'order', 'active' ];

		$items		= [
			[1,$main->id,CoreGlobal::TYPE_GALLERY,null,0,1],
			[2,$main->id,CoreGlobal::TYPE_GALLERY,null,0,1],
			[3,$main->id,CoreGlobal::TYPE_GALLERY,null,0,1],
			[4,$main->id,CoreGlobal::TYPE_GALLERY,null,0,1],
			[5,$main->id,CoreGlobal::TYPE_GALLERY,null,0,1],
			[6,$main->id,CoreGlobal::TYPE_GALLERY,null,0,1]
		];

		$this->batchInsert( $this->prefix . 'core_model_file', $columns, $items );
	}

    public function down() {

        echo "m161102_170225_data will be deleted with m160621_014408_core.\n";
    }
}