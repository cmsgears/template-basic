<?php
$title	= $widget->title;
$layout	= $widget->layout;
?>
<div class="grid-options-wrap row">
	<div class="colf colf12x6">
		<?= $bulkHtml ?>
	</div>
	<div class="colf colf12x6 align align-right">
		<?= $searchHtml ?>
		<?php if( $widget->grid ) { ?>
			<i class="trigger-layout-switch btn-icon cmti cmti-grid <?= $layout == 'data' ? 'active' : null ?>" layout="data" title="Grid Layout"></i>
		<?php } ?>
		<?php if( $widget->table ) { ?>
			<i class="trigger-layout-switch btn-icon cmti cmti-table <?= $layout == 'table' ? 'active' : null ?>" layout="table" title="Table Layout"></i>
		<?php } ?>
		<?php if( $widget->list ) { ?>
			<i class="trigger-layout-switch btn-icon cmti cmti-list <?= $layout == 'list' ? 'active' : null ?>" layout="list" title="List Layout"></i>
		<?php } ?>
		<?php if( $widget->card ) { ?>
			<i class="trigger-layout-switch btn-icon cmti cmti-grid-o <?= $layout == 'card' ? 'active' : null ?>" layout="card" title="Card Layout"></i>
		<?php } ?>
	</div>
</div>
