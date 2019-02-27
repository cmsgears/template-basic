<?php
// Yii Imports
use yii\widgets\LinkPager;

// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

$dataProvider	= $widget->dataProvider;
$pagination		= $dataProvider->getPagination();
$pageCount		= $pagination->getPageCount();

$limits			= $widget->limits;
$limit			= $widget->limit;

$import			= $widget->import;
$export			= $widget->export;
?>

<?php if( $pagination->totalCount > 0 ) { ?>
<div class="grid-footer-wrap">
	<div class="grid-footer row">
		<div class="grid-footer-info colf colf12x3">
			<?php if( $pageCount > 0 ) { ?>
				<span class="text"><?= CodeGenUtil::getPaginationDetail( $dataProvider ) ?></span>
			<?php } ?>
		</div>
		<div class="grid-footer-options colf colf12x9">
			<?php if( $import ) { ?>
				<span class="btn btn-medium"><i class="fa fa-upload"></i> Import XML</span>
				<span class="filler-tab"></span>
			<?php } ?>
			<?php if( $export ) { ?>
				<span class="btn btn-medium"><i class="fa fa-download"></i> Export XML</span>
				<span class="filler-tab"></span>
			<?php } ?>
			<?php if( count( $limits ) > 0 && $pageCount >= 2 ) { ?>
			<span class="inline-block">
				<span class="text">View Per Page</span>
				<span class="wrap-limits inline-block">
					<select class="cmt-select-c">
						<option value="select">Select Limit</option>
						<?php foreach ( $limits as $key ) { ?>

							<?php if( $limit == $key ) { ?>
								<option value="<?= $key ?>" selected><?= $key ?></option>
							<?php } else { ?>
								<option value="<?= $key ?>"><?= $key ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</span>
			</span>
			<span class="filler-tab"></span>
			<?php } ?>
			<?= LinkPager::widget([
					'pagination' => $pagination, 'options' => [ 'class' => 'pagination pagination-grid' ],
					'nextPageLabel' => '<i class="icon fa fa-angle-right"></i>',
					'prevPageLabel' => '<i class="icon fa fa-angle-left"></i>',
					'firstPageLabel' => '<i class="icon fa fa-angle-double-left"></i>',
					'lastPageLabel' => '<i class="icon fa fa-angle-double-right"></i>'
			]) ?>
		</div>
	</div>
</div>
<?php } ?>