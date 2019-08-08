<?php
namespace templates\models\core\settings;

// Yii Imports
use Yii;

class FormSettings extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Background
	public $background;
	public $backgroundClass;

	// Texture
	public $texture;

	// Header
	public $header; // Show Header
	public $headerIcon; // Show Header Icon using Model Icon
	public $headerTitle; // Show Header Title using Model Title
	public $headerInfo; // Show Header Info using Model Description
	public $headerContent; // Show Header Content using Model Summary
	public $headerIconUrl; // Show Header Icon using Icon Url irrespective of Model Icon
	public $headerFluid;
	public $headerScroller;
	public $headerElements;
	public $headerElementType;

	// Content

	public $content; // Show content
	public $contentTitle; // Show Model Title within content
	public $contentInfo; // Show Model Description within content
	public $contentSummary; // Show Model Summary within content
	public $contentData; // Show Model Content within content

	public $maxCover;

	public $contentClass;
	public $contentDataClass;

	public $styles;
	public $scripts;

	// Footer
	public $footer; // Show Footer
	public $footerIcon; // Show Footer Icon using Model Icon
	public $footerIconClass; // Show Footer Icon using css class irrespective of Model Icon
	public $footerIconUrl; // Show Footer Icon using Icon Url irrespective of Model Icon
	public $footerTitle; // Show Footer Title using Model Title
	public $footerTitleData; // Show Footer Title using Title Data irrespective of Model Title
	public $footerInfo; // Show Footer Info using Model Description
	public $footerInfoData; // Show Footer Info using Info Data irrespective of Model Description
	public $footerContent; // Show Footer Content using Model Summary
	public $footerContentData; // Show Footer Content using Content Data irrespective of Model Summary
	public $footerElements;
	public $footerElementType;

	// Form
	public $formClass;
	public $formCaptchaAction;
	public $wrapCaptcha = true;
	public $wrapActions = true;
	public $labels = true;
	public $split4060 = true;

	// Elements
	public $elements;
	public $elementsBeforeContent;
	public $elementsWithContent;
	public $elementsOrder;
	public $elementType;

	public $boxWrapClass;
	public $boxWrapper;
	public $boxClass;

	// Blocks
	public $blocks;
	public $blocksBeforeContent;
	public $blocksWithContent;
	public $blocksOrder;
	public $blockType;

	// Purify
	public $purifySummary = true;
	public $purifyContent = true;

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Model ---------

	/**
	 * @inheritdoc
	 */
	public function rules() {

		return [
			[ [ 'footerContentData', 'styles', 'scripts' ], 'safe' ],
			[ [ 'background', 'texture', 'maxCover' ], 'boolean' ],
			[ [ 'elements', 'blocks' ], 'boolean' ],
			[ [ 'header', 'headerIcon', 'headerTitle', 'headerInfo', 'headerContent', 'headerFluid', 'headerScroller', 'headerElements' ], 'boolean' ],
			[ [ 'content', 'contentTitle', 'contentInfo', 'contentSummary', 'contentData' ], 'boolean' ],
			[ [ 'footer', 'footerIcon', 'footerTitle', 'footerInfo', 'footerContent', 'footerElements' ], 'boolean' ],
			[ [ 'elementsBeforeContent', 'blocksBeforeContent' ], 'boolean' ],
			[ [ 'elementsWithContent', 'blocksWithContent' ], 'boolean' ],
			[ [ 'wrapCaptcha', 'wrapActions', 'labels', 'split4060' ], 'boolean' ],
			[ [ 'purifySummary', 'purifyContent' ], 'boolean' ],
			[ [ 'elementType', 'headerElementType', 'footerElementType', 'blockType', 'boxWrapper' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ 'formCaptchaAction', 'string', 'min' => 1, 'max' => Yii::$app->core->xLargeText ],
			[ [ 'backgroundClass', 'contentClass', 'contentDataClass', 'boxWrapClass', 'boxClass', 'formClass' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ [ 'footerIconClass', 'footerTitleData' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxxLargeText ],
			[ 'footerInfoData' , 'string', 'min' => 1, 'max' => Yii::$app->core->xtraLargeText ],
			[ [ 'elementsOrder', 'blocksOrder' ], 'number', 'integerOnly' => true, 'min' => 0 ],
			[ [ 'headerIconUrl', 'footerIconUrl' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxLargeText ]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'headerFluid' => 'Fluid Header'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// FormSettings --------------------------

}
