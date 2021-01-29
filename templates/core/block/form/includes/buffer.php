<?php
// CMG Imports
use cmsgears\widgets\aform\AjaxFormWidget;
?>

<?php if( $widget->buffer ) { ?>
	<div class="block-widget-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<div class="block-content-buffer">
	<?= AjaxFormWidget::widget( [ 'slug' => $model->slug ] ) ?>
</div>

<?php include "$defaultIncludes/attributes.php"; ?>
