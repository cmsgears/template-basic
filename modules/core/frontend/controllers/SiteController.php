<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace modules\core\frontend\controllers;

// Yii Imports
use Yii;

// CMG Imports
use cmsgears\core\frontend\config\CoreGlobalWeb;

// Basic Imports
use modules\core\common\models\resources\Carrier;

class SiteController extends \cmsgears\core\frontend\controllers\SiteController {

	// Variables ---------------------------------------------------

	// Globals ----------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Constructor and Initialisation ------------------------------

	public function beforeAction( $action ) {

		$this->setPageData( $action );

		return parent::beforeAction( $action );
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	public function behaviors() {

		$behaviours	= parent::behaviors();

		$behaviours[ 'verbs' ][ 'actions' ][ 'terms' ] = [ 'get' ];
		$behaviours[ 'verbs' ][ 'actions' ][ 'privacy' ] = [ 'get' ];
		$behaviours[ 'verbs' ][ 'actions' ][ 'faqs' ] = [ 'get' ];
		$behaviours[ 'verbs' ][ 'actions' ][ 'help' ] = [ 'get' ];

		return $behaviours;
	}

	// yii\base\Controller ---

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// SiteController ------------------------

	public function actionTerms() {

		$this->layout = CoreGlobalWeb::LAYOUT_PUBLIC;

		return $this->render( 'terms' );
	}

	public function actionPrivacy() {

		$this->layout = CoreGlobalWeb::LAYOUT_PUBLIC;

		return $this->render( 'privacy' );
	}

	public function actionFaqs() {

		$this->layout = CoreGlobalWeb::LAYOUT_PUBLIC;

		$faqs = Yii::$app->params[ 'faqs' ];

		return $this->render( 'faqs', [
			'faqs' => $faqs
		]);
	}

	public function actionHelp() {

		$this->layout = CoreGlobalWeb::LAYOUT_PUBLIC;

		$help = Yii::$app->params[ 'help' ];

		return $this->render( 'help', [
			'help' => $help
		]);
	}

	private function setPageData( $action ) {

		if( isset( Yii::$app->params[ 'pageContent' ][ $action->id ] ) ) {

			$model	= new Carrier();
			$data	= (object) Yii::$app->params[ 'pageContent' ][ $action->id ];

			$model->data = '{ "plugins": { "seo": ' . json_encode( $data ) . ' } }';

			$this->view->params[ 'model' ] = $model;
		}
	}

}
