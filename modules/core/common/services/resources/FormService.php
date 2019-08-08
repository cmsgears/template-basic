<?php
namespace modules\core\common\services\resources;

// Yii Imports
use Yii;
use yii\data\Sort;

// Basic Imports
use modules\core\common\services\interfaces\resources\IFormService;

class FormService extends \cmsgears\forms\common\services\entities\FormService implements IFormService {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	public static $modelClass = '\modules\core\common\models\resources\Form';

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// CategoryService -----------------------

	// Data Provider ------

	public function getPage( $config = [] ) {

		$modelClass	= static::$modelClass;
		$modelTable	= $this->getModelTable();

		$templateTable = Yii::$app->factory->get( 'templateService' )->getModelTable();

		// Sorting ----------

		$sort = new Sort([
			'attributes' => [
				'id' => [
					'asc' => [ "$modelTable.id" => SORT_ASC ],
					'desc' => [ "$modelTable.id" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Id'
				],
	            'template' => [
	                'asc' => [ "$templateTable.name" => SORT_ASC ],
	                'desc' => [ "$templateTable.name" => SORT_DESC ],
	                'default' => SORT_DESC,
	                'label' => 'Template'
	            ],
				'name' => [
					'asc' => [ "$modelTable.name" => SORT_ASC ],
					'desc' => [ "$modelTable.name" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Name'
				],
				'slug' => [
					'asc' => [ "$modelTable.slug" => SORT_ASC ],
					'desc' => [ "$modelTable.slug" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Slug'
				],
	            'type' => [
	                'asc' => [ "$modelTable.type" => SORT_ASC ],
	                'desc' => [ "$modelTable.type" => SORT_DESC ],
	                'default' => SORT_DESC,
	                'label' => 'Type'
	            ],
	            'icon' => [
	                'asc' => [ "$modelTable.icon" => SORT_ASC ],
	                'desc' => [ "$modelTable.icon" => SORT_DESC ],
	                'default' => SORT_DESC,
	                'label' => 'Icon'
	            ],
				'title' => [
					'asc' => [ "$modelTable.title" => SORT_ASC ],
					'desc' => [ "$modelTable.title" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Title'
				],
				'captcha' => [
					'asc' => [ "$modelTable.captcha" => SORT_ASC ],
					'desc' => [ "$modelTable.captcha" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Captcha'
				],
				'visibility' => [
					'asc' => [ "$modelTable.visibility" => SORT_ASC ],
					'desc' => [ "$modelTable.visibility" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Visibility'
				],
				'status' => [
					'asc' => [ "$modelTable.status" => SORT_ASC ],
					'desc' => [ "$modelTable.status" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Status'
				],
				'umail' => [
					'asc' => [ "$modelTable.userMail" => SORT_ASC ],
					'desc' => [ "$modelTable.userMail" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'User Mail'
				],
				'amail' => [
					'asc' => [ "$modelTable.adminMail" => SORT_ASC ],
					'desc' => [ "$modelTable.adminMail" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Admin Mail'
				],
				'unsubmit' => [
					'asc' => [ "$modelTable.uniqueSubmit" => SORT_ASC ],
					'desc' => [ "$modelTable.uniqueSubmit" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Unique Submit'
				],
				'upsubmit' => [
					'asc' => [ "$modelTable.updateSubmit" => SORT_ASC ],
					'desc' => [ "$modelTable.updateSubmit" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Update Submit'
				],
				'cdate' => [
					'asc' => [ "$modelTable.createdAt" => SORT_ASC ],
					'desc' => [ "$modelTable.createdAt" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Created At'
				],
				'udate' => [
					'asc' => [ "$modelTable.modifiedAt" => SORT_ASC ],
					'desc' => [ "$modelTable.modifiedAt" => SORT_DESC ],
					'default' => SORT_DESC,
					'label' => 'Updated At'
				]
			],
			'defaultOrder' => [
				'id' => SORT_DESC
			]
		]);

		if( !isset( $config[ 'sort' ] ) ) {

			$config[ 'sort' ] = $sort;
		}

		// Query ------------

		// Filters ----------

		// Params
		$type	= Yii::$app->request->getQueryParam( 'type' );
		$status	= Yii::$app->request->getQueryParam( 'status' );
		$filter	= Yii::$app->request->getQueryParam( 'model' );

		// Filter - Type
		if( isset( $type ) ) {

			$config[ 'conditions' ][ "$modelTable.type" ] = $type;
		}

		// Filter - Status
		if( isset( $status ) && isset( $modelClass::$urlRevStatusMap[ $status ] ) ) {

			$config[ 'conditions' ][ "$modelTable.status" ]	= $modelClass::$urlRevStatusMap[ $status ];
		}

		// Filter - Model
		if( isset( $filter ) ) {

			switch( $filter ) {

				case 'captcha': {

					$config[ 'conditions' ][ "$modelTable.captcha" ] = true;

					break;
				}
				case 'umail': {

					$config[ 'conditions' ][ "$modelTable.userMail" ] = true;

					break;
				}
				case 'amail': {

					$config[ 'conditions' ][ "$modelTable.adminMail" ] = true;

					break;
				}
				case 'unsubmit': {

					$config[ 'conditions' ][ "$modelTable.uniqueSubmit" ] = true;

					break;
				}
				case 'upsubmit': {

					$config[ 'conditions' ][ "$modelTable.updateSubmit" ] = true;

					break;
				}
			}
		}

		// Searching --------

		$searchCol = Yii::$app->request->getQueryParam( 'search' );

		if( isset( $searchCol ) ) {

			$search = [
				'name' => "$modelTable.name",
				'title' => "$modelTable.title",
				'desc' => "$modelTable.description",
				'success' => "$modelTable.description",
				'failure' => "$modelTable.description",
				'summary' => "$modelTable.summary",
				'content' => "$modelTable.content"
			];

			$config[ 'search-col' ] = $search[ $searchCol ];
		}

		// Reporting --------

		$config[ 'report-col' ]	= [
			'name' => "$modelTable.name",
			'title' => "$modelTable.title",
			'desc' => "$modelTable.description",
			'success' => "$modelTable.success",
			'failure' => "$modelTable.failure",
			'summary' => "$modelTable.summary",
			'content' => "$modelTable.content",
			'captcha' => "$modelTable.captcha",
			'status' => "$modelTable.status",
			'visibility' => "$modelTable.visibility",
			'umail' => "$modelTable.userMail",
			'amail' => "$modelTable.adminMail",
			'unsubmit' => "$modelTable.uniqueSubmit",
			'upsubmit' => "$modelTable.updateSubmit"
		];

		// Result -----------

		return parent::findPage( $config );
	}

	// Read ---------------

	// Read - Models ---

	// Read - Lists ----

	// Read - Maps -----

	// Read - Others ---

	// Create -------------

	// Update -------------

	// Delete -------------

	// Bulk ---------------

	// Notifications ------

	// Cache --------------

	// Additional ---------

	// Static Methods ----------------------------------------------

	// CMG parent classes --------------------

	// CategoryService -----------------------

	// Data Provider ------

	// Read ---------------

	// Read - Models ---

	// Read - Lists ----

	// Read - Maps -----

	// Read - Others ---

	// Create -------------

	// Update -------------

	// Delete -------------

}
