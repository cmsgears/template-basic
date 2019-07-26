<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = isset( $data->settings ) ? $data->settings : [];

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/block/default/includes';
$testiIncludes		= Yii::getAlias( '@breeze' ) . '/templates/cms/block/testimonial/includes';
$baseIncludes		= Yii::getAlias( '@templates' ) . '/core/block/default/includes';

$buffer			= "$testiIncludes/buffer.php";
$preObjects		= "$baseIncludes/objects-pre.php";
$postObjects	= "$baseIncludes/objects-post.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$baseIncludes/objects-config.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="block-content-wrap">
	<?php include "$defaultIncludes/header.php"; ?>
	<?php include "$defaultIncludes/content.php"; ?>
	<?php include "$defaultIncludes/footer.php"; ?>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
