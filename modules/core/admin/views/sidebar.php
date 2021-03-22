<?php
// Yii Imports
use yii\helpers\Html;

// Basic Imports
use modules\core\common\config\CoreGlobal;
use cmsgears\forms\common\config\FormsGlobal;

$core	= Yii::$app->core;
$user	= $core->getUser();
$siteId	= Yii::$app->core->siteId;
?>

<?php if( $core->hasModule( 'bcore' ) && $user->isPermitted( CoreGlobal::PERM_CORE ) ) { ?>
	<div id="sidebar-elements" class="collapsible-tab has-children <?= $parent === 'sidebar-elements' ? 'active' : null ?>">
		<span class="marker"></span>
		<div class="tab-header">
			<div class="tab-icon"><span class="cmti cmti-newspaper"></span></div>
			<div class="tab-title">UI Elements</div>
		</div>
		<div class="tab-content clear <?= $parent === 'sidebar-elements' ? 'expanded visible' : null ?>">
			<ul>
				<li class='element <?= $child === 'element' ? 'active' : null ?>'><?= Html::a( 'Elements', [ '/bcore/element/all' ] ) ?></li>
				<li class='block <?= $child === 'block' ? 'active' : null ?>'><?= Html::a( 'Blocks', [ '/bcore/block/all' ] ) ?></li>
				<li class='element-template <?= $child === 'element-template' ? 'active' : null ?>'><?= Html::a( 'Element Templates', [ '/bcore/element/template/all' ] ) ?></li>
				<li class='block-template <?= $child === 'block-template' ? 'active' : null ?>'><?= Html::a( 'Block Templates', [ '/bcore/block/template/all' ] ) ?></li>
			</ul>
		</div>
	</div>
<?php } ?>
<?php if( $core->hasModule( 'bcore' ) && $user->isPermitted( FormsGlobal::PERM_FORM_ADMIN ) ) { ?>
	<div id="sidebar-form" class="collapsible-tab has-children <?= $parent === 'sidebar-form' ? 'active' : null ?>">
		<div class="row tab-header">
			<div class="tab-icon"><span class="cmti cmti-checkbox-b-active"></span></div>
			<div class="tab-title">Forms</div>
		</div>
		<div class="tab-content clear <?= $parent === 'sidebar-form' ? 'expanded visible' : null ?>">
			<ul>
				<li class='form <?= $child === 'form' ? 'active' : null ?>'><?= Html::a( "Forms", ['/bcore/form/all'] ) ?></li>
				<li class='config <?= $child === 'config' ? 'active' : null ?>'><?= Html::a( "Configs", ['/forms/config/all'] ) ?></li>
				<li class='template <?= $child === 'template' ? 'active' : null ?>'><?= Html::a( "Templates", ['/forms/form/template/all'] ) ?></li>
			</ul>
		</div>
	</div>
<?php } ?>
