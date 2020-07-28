<?php
namespace widgets\element;
// Yii Imports
use Yii;
// Basic Imports
use modules\core\common\config\CoreGlobal;

class ElementWidget extends \cmsgears\core\common\base\ObjectWidget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $options = [ 'class' => 'box' ];

	// Background
	public $bkg			= false;
	public $bkgUrl		= null;
	public $bkgClass	= null;
	public $bkgVideo	= false;
	public $bkgVideoSrc	= null;
	public $bkgLazy		= false;

	// Texture
	public $texture			= false;
	public $textureClass	= null;

	// Header
	public $header			= false;
	public $headerIcon		= false;
	public $headerIconClass	= null;
	public $headerIconUrl	= null;
	public $headerTitle		= null;
	public $headerInfo		= null;
	public $headerContent	= null;

	// Content
	public $content			= false;
	public $contentTitle	= null;
	public $contentInfo		= null;
	public $contentSummary	= null;
	public $contentData		= null;

	public $maxCover = false;

	public $contentClass		= null;
	public $contentDataClass	= null;

	// Footer
	public $footer			= false;
	public $footerIcon		= false;
	public $footerIconClass	= null;
	public $footerIconUrl	= null;
	public $footerTitle		= null;
	public $footerInfo		= null;
	public $footerContent	= null;

	// Meta
	public $metas		= false;
	public $metaTypes	= null;

	public $metaWrapClass = null;

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

    public function init() {

        parent::init();

		$this->modelService = Yii::$app->factory->get( 'elementService' );

		if( isset( $this->slug ) ) {

			// Find Model
			$this->model = $this->modelService->getBySlugType( $this->slug, CoreGlobal::TYPE_ELEMENT );
		}

		if( $this->buffer ) {

			ob_start();

			ob_implicit_flush( false );
		}
    }

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

    public function renderWidget( $config = [] ) {

		// Default background class defined in css as - .bkg-element { background-image: url(<image url>) }
		if( $this->bkg && !isset( $this->bkgUrl ) && !isset( $this->bkgClass ) ) {

			$this->bkgClass	= 'bkg-element';
		}

		return parent::renderWidget( $config );
    }

	// Element -------------------------------

}
