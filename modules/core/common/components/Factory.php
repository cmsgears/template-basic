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

	}

	/**
	 * Registers mapper services.
	 */
	public function registerMapperServices() {

		$factory = Yii::$app->factory->getContainer();

	}

	/**
	 * Registers entity services.
	 */
	public function registerEntityServices() {

		$factory = Yii::$app->factory->getContainer();

	}

	/**
	 * Registers resource aliases.
	 */
	public function registerResourceAliases() {

		$factory = Yii::$app->factory->getContainer();

	}

	/**
	 * Registers mapper aliases.
	 */
	public function registerMapperAliases() {

		$factory = Yii::$app->factory->getContainer();

	}

	/**
	 * Registers entity aliases.
	 */
	public function registerEntityAliases() {

		$factory = Yii::$app->factory->getContainer();

	}

}
