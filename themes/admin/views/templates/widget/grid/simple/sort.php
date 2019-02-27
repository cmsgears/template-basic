<?php
$sortColumns	= $widget->sortColumns;

// Sorting
$sort			= Yii::$app->request->getQueryParam( 'sort' );
$sortAsc		= isset( $sort ) && $sort[0] === '-' ? false : true;
$sort			= isset( $sort ) && $sort[0] === '-' ? substr( $sort, 1 ) : $sort;
?>
<?php if( count( $sortColumns ) > 0 ) { ?>
<span class="grid-sort-wrap">
	<span class="grid-sort">
		<select class="cmt-select-c">
			<option value="select">Select Sort</option>
			<?php foreach ( $sortColumns as $key => $value ) { ?>

				<?php if( $sort === $key ) { ?>
					<option class="sort <?= $sortAsc ? 'sort-asc' : 'sort-desc' ?>" value="<?= $key ?>" data-sort="<?= $sortAsc ? "-$key" : $key ?>" selected><?= $value ?></option>
				<?php } else { ?>
					<option class="sort" value="<?= $key ?>" data-sort="<?= $key ?>"><?= $value ?></option>
				<?php } ?>
			<?php } ?>
		</select>
	</span>
</span>
<?php } ?>
