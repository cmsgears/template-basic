<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = isset( $data->settings ) ? $data->settings : [];

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/element/card/default/includes';
$templateIncludes	= Yii::getAlias( '@templates' ) . '/core/element/easyCustomisation/default/includes';

$buffer		= "$templateIncludes/buffer.php";
$attributes	= "$defaultIncludes/attributes.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="block-content">
	<div class="block-content-buffer">
		<?php include "$defaultIncludes/header.php"; ?>
		<?php include "$templateIncludes/buffer.php"; ?>
		<?php include "$defaultIncludes/footer.php"; ?>
	</div>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
