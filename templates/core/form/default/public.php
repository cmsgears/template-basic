<?php
$siteProperties = $this->context->getSiteProperties();

// Config -------------------------

$data			= json_decode( $model->data );
$settings		= isset( $data->settings ) ? $data->settings : [];
$templateClass	= isset( $model->template ) ? "page-default page-{$model->template->slug}" : 'page-default';

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/page/default/includes';
$elementIncludes	= Yii::getAlias( '@templates' ) . '/core/form/default/includes';
$widgetIncludes		= null;
$blockIncludes		= Yii::getAlias( '@templates' ) . '/core/form/default/includes';
$templateIncludes	= Yii::getAlias( '@templates' ) . '/core/form/default/includes';

$buffer			= dirname( __FILE__ ) . '/includes/buffer.php';
$preObjects		= "$defaultIncludes/objects-pre.php";
$innerObjects	= "$defaultIncludes/objects-inner.php";
$outerObjects	= "$defaultIncludes/objects-outer.php";
?>
<?php include "$templateIncludes/options.php"; ?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/objects-config.php"; ?>

	<?php include "$templateIncludes/background.php"; ?>
	
		<?php include "$defaultIncludes/header.php"; ?>
	
			<?php include "$defaultIncludes/content.php"; ?>
		
		<?php include $outerObjects; ?>
	

<?php include "$defaultIncludes/scripts.php"; ?>


