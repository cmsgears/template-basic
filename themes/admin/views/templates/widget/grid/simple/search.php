<?php
$searchColumns	= $widget->searchColumns;

// Searching
$search		= Yii::$app->request->getQueryParam( 'search' );
$keywords	= Yii::$app->request->getQueryParam( 'keywords' );
?>

<div class="grid-search-wrap">
	<span class="grid-search">
		<span class="search-field inline-block">
			<input type="text" name="keywords" value="<?= $keywords ?>" placeholder="Keywords" />
			<select class="cmt-select-c">
				<option value="select">Select Field</option>
				<?php foreach ( $searchColumns as $key => $value ) { ?>

					<?php if( $search === $key ) { ?>
						<option value="<?= $key ?>" selected><?= $value ?></option>
					<?php } else { ?>
						<option value="<?= $key ?>"><?= $value ?></option>
					<?php } ?>
				<?php } ?>
			</select>
			<span class="grid-search-trigger btn btn-small">Search</span>
		</span>
	</span>
</div>
