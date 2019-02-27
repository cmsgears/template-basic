<?php
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use themes\admin\assets\InlineAssets;

InlineAssets::register( $this );

$this->registerAssetBundle( 'private' );

// Register Child theme Assets
//$this->theme->registerChildAssets( $this );
$this->registerAssetBundle( 'child' );

// Variables available for headers, sidebars and footers included within this layout
$coreProperties = $this->context->getCoreProperties();
$themePath		= Yii::getAlias( '@themes/admin' );
$user			= Yii::$app->user->getIdentity();
$microSidebar	= $user->getDataConfigMeta( CoreGlobal::DATA_SIDEBAR_MICRO );
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= $coreProperties->getLanguage() ?>">
	<head>
		<?php include "$themePath/views/headers/main.php"; ?>
	</head>
	<body>
		<?php $this->beginBody(); ?>
		<div id="pre-loader-main" class="pre-loader valign-center align align-center">
			<div class="valign-center cmti cmti-4x cmti-spinner-1 spin"></div>
		</div>
		<?php include "$themePath/views/headers/private.php"; ?>
		<div class="container container-main container-private row max-cols-100 col-filler-wrap">
			<div class="colf colf15x2 col-filler sidebar-filler"></div>
			<div id="sidebar-main" class="colf colf15x2 sidebar-main <?= isset( $microSidebar ) && $microSidebar ? "sidebar-micro" : null ?>">
				<?php include "$themePath/views/sidebars/main.php"; ?>
			</div>
			<div class="colf colf15x13 content-wrap content-main-wrap">
				<div class="content">
					<?php include "$themePath/views/includes/breadcrumbs.php"; ?>
					<?= $content ?>
					<?php include "$themePath/views/includes/dashboard.php"; ?>
				</div>
			</div>
		</div>
		<?php include "$themePath/views/footers/private.php"; ?>
		<?php $this->endBody(); ?>
	</body>
</html>
<?php $this->endPage(); ?>
