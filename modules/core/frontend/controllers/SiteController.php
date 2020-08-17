<?php
namespace modules\core\frontend\controllers;

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

		return $this->render( 'faqs' );
	}

	private function setPageData( $action ) {

		$store = [
			'index' => [
				"name" => "Home", "summary" => "The home page", "description" => "The home page",
				"keywords" => "Home", "robot" => "noindex,follow"
			],
			'login' => [
				"name" => "Login", "summary" => "Login", "description" => "Login",
				"keywords" => "Login", "robot" => "noindex,follow"
			],
			'register' => [
				"name" => "Register", "summary" => "Register", "description" => "Register",
				"keywords" => "Register", "robot" => "noindex,follow"
			],
			'confirm-account' => [
				"name" => "Confirm Account", "summary" => "Confirm Account", "description" => "Confirm Account",
				"keywords" => "Confirm Account", "robot" => "noindex,follow"
			],
			'activate-account' => [
				"name" => "Activate Account", "summary" => "Activate Account", "description" => "Activate Account",
				"keywords" => "Activate Account", "robot" => "noindex,follow"
			],
			'forgot-password' => [
				"name" => "Forgot Password", "summary" => "Forgot Password", "description" => "Forgot Password",
				"keywords" => "Forgot Password", "robot" => "noindex,follow"
			],
			'reset-password' => [
				"name" => "Reset Password", "summary" => "Reset Password", "description" => "Reset Password",
				"keywords" => "Reset Password", "robot" => "noindex,follow"
			],
			'reset-password-otp' => [
				"name" => "Reset Password OTP", "summary" => "Reset Password OTP", "description" => "Reset Password OTP",
				"keywords" => "Reset Password OTP", "robot" => "noindex,follow"
			],
			'feedback' => [
				"name" => "Feedback", "summary" => "Feedback", "description" => "Feedback",
				"keywords" => "Feedback", "robot" => "noindex,follow"
			],
			'testimonial' => [
				"name" => "Testimonial", "summary" => "Testimonial", "description" => "Testimonial",
				"keywords" => "Testimonial", "robot" => "noindex,follow"
			],
			'terms' => [
				"name" => "Terms & Conditions", "summary" => "Terms & Conditions", "description" => "Terms & Conditions",
				"keywords" => "Terms, Conditions", "robot" => "noindex,follow"
			],
			'privacy' => [
				"name" => "Privacy Policy", "summary" => "Privacy Policy", "description" => "Privacy Policy",
				"keywords" => "Privacy, Policy", "robot" => "noindex,follow"
			],
			'faqs' => [
				"name" => "FAQs", "summary" => "FAQs", "description" => "FAQs",
				"keywords" => "FAQs", "robot" => "noindex,follow"
			],
			'renovating' => [
				"name" => "Maintance", "summary" => "Maintinace", "description" => "Maintincae",
				"keywords" => "Manitinace", "robot" => "noindex,follow"
			]
		];

		if( isset( $store[ $action->id ] ) ) {

			$model	= new Carrier();
			$data	= (object) $store[ $action->id ];

			$model->data = '{ "plugins": { "seo": ' . json_encode( $data ) . ' } }';

			$this->view->params[ 'model' ] = $model;
		}
	}

}
