<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = isset( $data->settings ) ? $data->settings : [];

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/element/box/default/includes';
$templateIncludes	= Yii::getAlias( '@templates' ) . '/core/element/box/default/includes';

$buffer		= "$templateIncludes/buffer.php";
$attributes	= "$defaultIncludes/attributes.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="box-content-wrap">
	<div class="data-zigzag-part-1">
		<?php include "$defaultIncludes/header.php"; ?>
	</div>
	<div class="data-zigzag-part-2">
		<?php include "$defaultIncludes/content.php"; ?>
	</div>
	<?php include "$defaultIncludes/footer.php"; ?>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
