<?php
// Config
$coreProperties = $this->context->getCoreProperties();
$themeIncludes	= Yii::getAlias( '@themes/admin/views/includes' );
$apixBase		= $this->context->apixBase;

// Page
$this->title = 'Profile | User';
?>
<div class="data-crud-wrap data-crud-wrap-basic">
	<div class="data-crud-wrap-main">
		<?php include "$themeIncludes/components/crud/user/profile/basic.php"; ?>
		<?php include "$themeIncludes/components/crud/user/profile/address.php"; ?>
	</div>
</div>
