<?php
// Yii Imports
use yii\helpers\Url;

$core		= Yii::$app->core;
$user		= Yii::$app->user->getIdentity();

// Sidebar
$sidebar	= $this->context->sidebar;
$parent 	= isset( $sidebar[ 'parent' ] ) ? $sidebar[ 'parent' ] : '';
$child 		= isset( $sidebar[ 'child' ] ) ? $sidebar[ 'child' ] : '';
?>
<div class="collapsible-menu collapsible-menu-admin">

	<div id="sidebar-dasboard" class="collapsible-tab <?php if( strcmp( $parent, 'sidebar-dashboard' ) == 0 ) echo 'active'; ?>">
		<span class="marker"></span>
		<div class="tab-header">
			<a href="<?php echo Url::toRoute( [ '/dashboard' ] ); ?>">
				<div class="tab-icon"><span class="cmti cmti-dashboard"></span></div>
				<div class="tab-title">Dashboard</div>
			</a>
		</div>
	</div>

	<?= Yii::$app->sidebar->getSidebarHtml( $parent, $child ) ?>

	<?php if( $core->hasModule( 'core' ) && $user->isPermitted( 'core' ) ) { ?>
		<div id="sidebar-settings" class="collapsible-tab <?php if( strcmp( $parent, 'sidebar-settings' ) == 0 ) echo 'active'; ?>">
			<span class="marker"></span>
			<div class="tab-header">
				<a href="<?php echo Url::toRoute( [ '/settings/index' ] ); ?>">
					<div class="tab-icon"><span class="cmti cmti-setting"></span></div>
					<div class="tab-title">Settings</div>
				</a>
			</div>
		</div>
	<?php } ?>

	<div class="collapsible-tab" id="btn-logout">
		<span class="marker"></span>
		<div class="tab-header">
			<a href="<?php echo Url::toRoute( [ '/core/site/logout' ] ); ?>" class="clearfix">
				<div class="tab-icon"><span class="cmti cmti-power"></span></div>
				<div class="tab-title">Logout</div>
			</a>
		</div>
	</div>

</div>
