<?php
namespace modules\core\common\components;

// Yii Imports
use Yii;

class Factory extends \cmsgears\core\common\base\Component {

	// Global -----------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		// Register services
		$this->registerServices();

		// Register service alias
		$this->registerServiceAlias();
	}

	// Instance methods --------------------------------------------

	// Yii parent classes --------------------

	// CMG parent classes --------------------

	// Factory -------------------------------

	public function registerServices() {

		$this->registerResourceServices();
		$this->registerMapperServices();
		$this->registerEntityServices();
	}

	public function registerServiceAlias() {

		$this->registerResourceAliases();
		$this->registerMapperAliases();
		$this->registerEntityAliases();
	}

	/**
	 * Registers resource services.
	 */
	public function registerResourceServices() {

		$factory = Yii::$app->factory->getContainer();

		$factory->set( 'modules\core\common\services\interfaces\resources\IFormService', 'modules\core\common\services\resources\FormService' );
	}

	/**
	 * Registers mapper services.
	 */
	public function registerMapperServices() {

		$factory = Yii::$app->factory->getContainer();

		$factory->set( 'modules\core\common\services\interfaces\mappers\IModelElementService', 'modules\core\common\services\mappers\ModelElementService' );
		$factory->set( 'modules\core\common\services\interfaces\mappers\IModelBlockService', 'modules\core\common\services\mappers\ModelBlockService' );
	}

	/**
	 * Registers entity services.
	 */
	public function registerEntityServices() {

		$factory = Yii::$app->factory->getContainer();

		$factory->set( 'modules\core\common\services\interfaces\entities\IElementService', 'modules\core\common\services\entities\ElementService' );
		$factory->set( 'modules\core\common\services\interfaces\entities\IBlockService', 'modules\core\common\services\entities\BlockService' );
	}

	/**
	 * Registers resource aliases.
	 */
	public function registerResourceAliases() {

		$factory = Yii::$app->factory->getContainer();

		$factory->set( 'formService', 'modules\core\common\services\resources\FormService' );
	}

	/**
	 * Registers mapper aliases.
	 */
	public function registerMapperAliases() {

		$factory = Yii::$app->factory->getContainer();

		$factory->set( 'modelElementService', 'modules\core\common\services\mappers\ModelElementService' );
		$factory->set( 'modelBlockService', 'modules\core\common\services\mappers\ModelBlockService' );
	}

	/**
	 * Registers entity aliases.
	 */
	public function registerEntityAliases() {

		$factory = Yii::$app->factory->getContainer();

		$factory->set( 'elementService', 'modules\core\common\services\entities\ElementService' );
		$factory->set( 'blockService', 'modules\core\common\services\entities\BlockService' );
	}

}
