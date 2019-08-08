<?php
namespace widgets\block;

// Yii Imports
use Yii;

// Basic Imports
use modules\core\common\config\CoreGlobal;

class BlockWidget extends \cmsgears\core\common\base\ObjectWidget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $options = [ 'class' => 'block' ];

	// Background
	public $bkg			= false;
	public $fixedBkg	= false;
	public $scrollBkg	= false;
	public $parallaxBkg	= false;
	public $bkgUrl		= null;
	public $bkgClass	= null;
	public $bkgVideo	= false;
	public $bkgVideoSrc	= null;

	// Texture
	public $texture			= false;
	public $textureClass	= null;

	// Block Header
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

	// Block Elements
	public $elements		= false;
	public $elementType		= null;

	public $boxWrapClass	= null;
	public $boxWrapper		= null;
	public $boxClass		= null;

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

    public function init() {

        parent::init();

		$this->modelService = Yii::$app->factory->get( 'blockService' );

		if( isset( $this->slug ) ) {

			// Find Model
			$this->model = $this->modelService->getBySlugType( $this->slug, CoreGlobal::TYPE_BLOCK );
		}

		if( $this->buffer ) {

			ob_start();

			ob_implicit_flush( false );
		}
    }

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

    public function renderWidget( $config = [] ) {

		// Default background class defined in css as - .bkg-block { background-image: url(<image url>) }
		if( $this->bkg && !isset( $this->bkgUrl ) && !isset( $this->bkgClass ) ) {

			$this->bkgClass	= 'bkg-block';
		}

		return parent::renderWidget( $config );
    }

	// Block ---------------------------------

}
