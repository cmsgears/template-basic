<?php
// Config
$coreProperties = $this->context->getCoreProperties();
$themeIncludes	= Yii::getAlias( '@themes/admin/views/includes' );

// Page
$this->title = 'Settings | User';

$model = $user;
?>
<div class="data-crud-wrap data-crud-wrap-basic">
	<div class="data-crud-wrap-main">
		<?php include "$themeIncludes/components/crud/user/settings/password.php"; ?>
		<?php include "$themeIncludes/components/crud/user/settings/privacy.php"; ?>
		<?php include "$themeIncludes/components/crud/user/settings/notifications.php"; ?>
		<?php include "$themeIncludes/components/crud/user/settings/reminders.php"; ?>
	</div>
</div>
