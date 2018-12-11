<?php
// Yii Imports
use yii\helpers\Url;

$title			= $widget->title;
$reportColumns	= $widget->reportColumns;
?>
<div class="grid-head-wrap row">
	<div class="colf colf12x6">
		<b class="grid-title"><?= $title ?></b>
		<?php if( $widget->add ) { ?>
		<a class="btn btn-small" href="<?= Url::toRoute( [ $widget->addUrl ], true ) ?>">Add</a>
		<?php } ?>
		<?php if( $widget->addPopup ) { ?>
			<span class="btn btn-small popup-trigger" popup="popup-grid-add"></span>
		<?php } ?>
	</div>
	<div class="colf colf12x6 grid-head-options">
		<?= $sortHtml ?>
		<?= $filtersHtml ?>
		<?php if( count( $reportColumns ) > 0 ) { ?>
			<i class="trigger-report-toggle btn-icon cmti cmti-chart-column <?= isset( $report ) ? 'active' : null ?>" title="Generate Report"></i>
		<?php } ?>
	</div>
</div>
