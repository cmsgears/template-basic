<?php
$filters	= $widget->filters;
?>
<?php if( count( $filters ) > 0 ) { ?>
<span class="grid-filters-wrap">
	<span class="grid-filters" data-cols="<?= join( ',', array_keys( $filters ) ) ?>">
		<select class="cmt-select-c">
			<option value="select">Select Filter</option>
			<?php
				foreach ( $filters as $column => $options ) {

					$colFilter	= Yii::$app->request->getQueryParam( $column );

					foreach ( $options as $key => $filter ) {
			?>

				<?php if( isset( $colFilter ) && $colFilter === $key ) { ?>
					<option class="filter" data-col="<?= $column ?>" value="<?= $key ?>" selected><?= $filter ?></option>
				<?php } else { ?>
					<option class="filter" data-col="<?= $column ?>" value="<?= $key ?>"><?= $filter ?></option>
				<?php } ?>
			<?php
					}
				}
			?>
		</select>
	</span>
</span>
<?php } ?>
