<?php
// Media --------------------

$texture		= isset( $settings->texture ) ? $settings->texture : false;
$textureClass	= !empty( $model->texture ) && $model->texture !== 'texture' ? $model->texture : null;

// Max Cover ----------------

$maxCover = isset( $settings->maxCover ) ? $settings->maxCover : false;

// Background ---------------

$bkg		= isset( $settings->background ) ? $settings->background : false;
$bkgClass	= !empty( $settings->backgroundClass ) ? $settings->backgroundClass : null;
?>
<?php if( $bkg ) { ?>
	<div class="page-bkg <?= $bkgClass ?>"></div>
	<?php if( $texture ) { ?>
		<div class="<?= $textureClass ?>"></div>
	<?php } ?>
<?php } ?>

<?php if( $maxCover ) { ?>
	<div class="max-cover"></div>
<?php } ?>
