<?php
$dataProvider	= $widget->dataProvider;
$models			= $dataProvider->getModels();

$columns		= count( $widget->cardColumns ) > 0 ? $widget->cardColumns : $widget->gridColumns;
$actions		= $widget->actions;

$actionView		= $widget->actionView;
?>
<div class="grid-cards-wrap <?= $widget->layout == 'card' ? 'active' : null ?>">
	<div class="grid-cards row">
		<?php

			if( count( $models ) > 0 ) {

				$gridCards	= $widget->gridCards;
				$root		= $gridCards[ 'root' ];
				$factor		= $gridCards[ 'factor' ];

				foreach( $models as $model ) {

					$id		= $model->id;
					$index	= 0;
		?>
			<div class="card grid-card <?= $root . $factor ?>">
				<div class="card-header grid-card-header row">
					<div class="colf colf5 card-title grid-card-title">
						<span class="data cmt-choice">
							<label>
								<input class="grid-bulk-single grid-bulk-<?= $id ?>" type="checkbox" data-id=<?= $id ?> />
								<span class="label cmti cmti-checkbox"></span>
							</label>
						</span>
					</div>
					<div class="colf colf5x4 grid-card-actions">
						<?= $widget->render( $actionView, [ 'widget' => $widget, 'model' => $model ] ) ?>
					</div>
				</div>
				<div class="card-data grid-card-data cscroller">
				<?php

					foreach ( $columns as $key => $column ) {

						$title	= null;
						$value 	= null;

						if( is_array( $column ) ) {

							$title	= $column[ 'title' ];
							$value	= $column[ 'generate' ];
							$value	= $value( $model );
						}
						else {

							$title	= $column;
							$value 	= !in_array( $key, [ 'bulk', 'actions' ] ) ? $model->$key : null;
						}

						if( !in_array( $key, [ 'bulk', 'actions' ] ) ) {
				?>
					<div class="row">
						<div class="col col5x2 bold"><?= $title ?></div>
						<div class="col col5x3"><?= $value ?></div>
					</div>
				<?php } } ?>
				</div>
				<div class="card-footer grid-card-footer">
					<?php if( isset( $model->createdAt ) ) { ?>
						<span class="inline-block left">Created At</span>
						<span class="inline-block right"><?= $model->createdAt ?></span>
					<?php } ?>
				</div>
			</div>
		<?php
				}
		?>
		<?php } ?>
	</div>
</div>
