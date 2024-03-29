<?php
$siteProperties = $this->context->getSiteProperties();

// Config -------------------------

$data			= json_decode( $model->data );
$settings		= isset( $data->settings ) ? $data->settings : [];
$templateClass	= isset( $model->template ) ? "page-default page-form page-form-regular page-{$model->template->slug}" : 'page-default page-form page-form-regular';

// Includes -----------------------

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/page/default/includes';
$elementIncludes	= Yii::getAlias( '@templates' ) . '/core/form/default/includes';
$widgetIncludes		= null;
$blockIncludes		= Yii::getAlias( '@templates' ) . '/core/form/default/includes';
$templateIncludes	= Yii::getAlias( '@templates' ) . '/core/form/default/includes';

$buffer			= "$templateIncludes/buffer.php";
$preObjects		= "$defaultIncludes/objects-pre.php";
$innerObjects	= "$defaultIncludes/objects-inner.php";
$outerObjects	= "$defaultIncludes/objects-outer.php";
?>
<?php include "$templateIncludes/options.php"; ?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/objects-config.php"; ?>
<div <?= $options ?>>
	<?php include "$templateIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$templateIncludes/header.php"; ?>
		<div class="page-content-row row">
			<?php include "$defaultIncludes/content.php"; ?>
		</div>
		<?php include $outerObjects; ?>
	</div>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
