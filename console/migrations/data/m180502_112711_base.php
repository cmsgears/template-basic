<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use cmsgears\core\common\base\Migration;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

class m180502_112711_base extends Migration {

	// Public Variables

	// Private Variables

	private $cmgPrefix;
	private $sitePrefix;

	private $site;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;
		$this->sitePrefix	= Yii::$app->migration->sitePrefix;

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( Yii::$app->migration->getSiteMaster() );

		Yii::$app->core->setSite( $this->site );
	}

	public function up() {

		$this->updateSiteMeta();
	}

	private function updateSiteMeta() {

		$metaService = Yii::$app->factory->get( 'siteMetaService' );

		$siteFonts	= $metaService->getByNameType( $this->site->id, 'fonts', 'frontend' );

		$siteFonts->value = 'OpenSans, OpenSans Bold';

		$metaService->update( $siteFonts );
	}

	public function down() {

		echo "m180502_112711_base will be deleted with m160621_014408_core.\n";
	}

}
