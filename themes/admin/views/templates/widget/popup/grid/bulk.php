<?php
$title	= $widget->title;
$modal	= $widget->modal;
$data	= $widget->data;
$popId	= isset( $data[ 'popupId' ] ) ? $data[ 'popupId' ] : 'popup-grid-bulk';

$model		= $data[ 'model' ];
$app		= $data[ 'app' ];
$controller	= $data[ 'controller' ];
$action		= $data[ 'action' ];
$url		= $data[ 'url' ];
?>
<div id="<?= $popId ?>" class="popup popup-admin popup-medium <?= $modal ? 'popup-modal' : null ?>">
	<div class="popup-screen"></div>
	<?php if( $widget->bkg ) { ?>
		<div class="popup-bkg <?= $widget->bkgClass ?>" <?= isset( $widget->bkgUrl ) ? " style=\"background-image:url($widget->bkgUrl);\"" : null ?>></div>
	<?php } ?>
	<div class="popup-screen-listener"></div>
	<div class="popup-data <?= isset( $widget->size ) ? "popup-data-$widget->size" : null ?>">
		<span class="popup-close">
			<span class="icon fa fa-2x fa-close"></span>
		</span>
		<?php if( $widget->bkgData ) { ?>
			<div class="popup-data-bkg <?= $widget->bkgDataClass ?>" <?= isset( $widget->bkgDataUrl ) ? "style=\"background-image:url($widget->bkgDataUrl);\"" : null ?>></div>
		<?php } ?>
		<div class="popup-header">
			<div class="popup-title"><?= $title ?></div>
		</div>
		<div class="popup-content-wrap">
			<div class="popup-content">
				<div class="filler-height filler-height-medium"></div>
				<form cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $url ?>">
					<div class="spinner max-area-cover-color">
						<div class="valign-center cmti cmti-2x cmti-spinner-9 spin"></div>
					</div>
					<div class="filler-height"></div>
					<p class="align align-center">Are you sure you want to apply <b class='action'></b> action on selected <?= $model ?> ?</p>
					<input type="hidden" name="action" />
					<input type="hidden" name="column" />
					<input type="hidden" name="target" />
					<div class="filler-height filler-height-medium"></div>
					<div class="align align-center"><input class="frm-element-medium" type="submit" value="Apply" /></div>
				</form>
			</div>
		</div>
	</div>
</div>
