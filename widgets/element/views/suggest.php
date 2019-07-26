<?php
$title = $widget->title;

$type	= $widget->type;
$ctype	= $widget->ctype;
$label	= $widget->label;
$model	= $widget->model;

$disabled	= $widget->disabled;

$notes		= $widget->notes;
$showNotes	= $widget->showNotes;

$mapperTemplate	= $widget->mapperTemplate;

$app		= $widget->app;
$controller	= $widget->controller;
$action		= $widget->action;
$actionUrl	= $widget->actionUrl;

$mapAction		= $widget->mapAction;
$mapActionUrl	= $widget->mapActionUrl;

$deleteAction		= $widget->deleteAction;
$deleteActionUrl	= $widget->deleteActionUrl;

$modelObjects = $widget->modelObjects;
?>
<div class="mapper mapper-auto mapper-auto-items" template="<?= $mapperTemplate ?>">
	<div class="auto-fill auto-fill-basic">
		<?php if( !$disabled ) { ?>
		<div class="auto-fill-source" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $actionUrl ?>" cmt-keep cmt-custom>
			<div class="relative">
				<div class="auto-fill-search form-group clearfix">
					<?php if( isset( $label ) ) { ?>
						<label><?= $label ?></label>
					<?php } ?>
					<div class="frm-icon-element icon-right">
						<span class="icon cmti cmti-search"></span>
						<input class="cmt-key-up auto-fill-text search-name" type="text" name="name" placeholder="Search" autocomplete="off" />
					</div>
					<?php if( isset( $type ) ) { ?>
						<input class="search-type" type="hidden" name="type" value="<?= $type ?>" />
					<?php } ?>
				</div>
				<div class="auto-fill-items-wrap">
					<ul class="auto-fill-items vnav"></ul>
				</div>
			</div>
		</div>
		<div class="trigger-map-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $mapAction ?>" action="<?= $mapActionUrl ?>">
			<input type="hidden" name="itemId" />
			<?php if( isset( $ctype ) ) { ?>
				<input type="hidden" name="ctype" value="<?= $ctype ?>" />
			<?php } ?>
			<span class="cmt-click"></span>
		</div>
		<div class="filler-height"></div>
		<div class="mapper-items auto-fill-target">
		<?php
			foreach( $modelObjects as $modelObject ) {

				$object		= $modelObject->model;
				$deleteUrl	= "$deleteActionUrl&cid=$modelObject->id";
		?>
			<div class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $deleteAction ?>" action="<?= $deleteUrl ?>">
				<span class="spinner hidden-easy">
					<span class="cmti cmti-spinner-1 spin"></span>
				</span>
				<span class="mapper-item-remove btn-icon-o"><i class="icon cmti cmti-close cmt-click"></i></span>
				<span class="name"><?= $object->name ?></span>
				<input class="cid" type="hidden" name="cid" value="<?= $modelObject->id ?>" />
			</div>
		<?php } ?>
		</div>
		<?php } else { ?>
		<div class="mapper-items auto-fill-target">
			<?php
				foreach( $modelObjects as $modelObject ) {

					$object = $modelObject->model;
			?>
			<div class="mapper-item">
				<span class="name"><?= $object->name ?></span>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>

<?php if( !$disabled && $showNotes && !empty( $showNotes ) ) { ?>
	<div class="clear filler-height"></div>
	<div class="note"><?= $notes ?></div>
<?php } ?>

<?php
include __DIR__ . '/templates/object.php';
