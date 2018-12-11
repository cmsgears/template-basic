<?php
// Yii Imports
use yii\helpers\Html;

$reportColumns	= $widget->reportColumns;
$dateClass		= $widget->dateClass;

$report = Yii::$app->request->getQueryParam( 'report' );
?>
<?php if( count( $reportColumns ) > 0 ) { ?>
<div class="grid-report-wrap form <?= $report ? 'show-report' : null ?>">
	<div class="grid-report">
		<div class="row grid-report-fields max-cols-50">
		<?php
			foreach ( $reportColumns as $key => $reportColumn ) {

				$title	= $reportColumn[ 'title' ];
				$type	= $reportColumn[ 'type' ];

				switch( $type ) {

					case 'text': {

						$filter	= Yii::$app->request->getQueryParam( $key . '-find' );
		?>
						<div class="colf colf2 row">
							<div class="colf colf3 bold"><?= $title ?></div>
							<div class="colf colf3x2"><input class="report-field" type="text" name="<?= $key ?>-find" value="<?= isset( $filter ) ? $filter : null ?>" placeholder="<?= $title ?>" /></div>
						</div>
		<?php
						break;
					}
					case 'flag': {

						$flag	= Yii::$app->request->getQueryParam( $key . '-flag' );
		?>
						<div class="colf colf2 row">
							<div class="colf colf3 bold"><?= $title ?></div>
							<div class="colf colf3x2">
								<span class='cmt-switch cmt-checkbox'>
									<input id="<?= $key . '-flag' ?>" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
									<label for='<?= $key . '-flag' ?>'></label>
									<input class="report-field" type="hidden" name="<?= $key . '-flag' ?>" value="<?= isset( $flag ) ? $flag : 0 ?>" />
								</span>
							</div>
						</div>
		<?php
						break;
					}
					case 'select': {

						$filter	= Yii::$app->request->getQueryParam( $key . '-match' );
						$filter	= isset( $filter ) ? $filter : null;
		?>
						<div class="colf colf2 row">
							<div class="colf colf3 bold"><?= $title ?></div>
							<div class="colf colf3x2">
								<?= Html::dropDownList( "$key-match", $filter, $reportColumn[ 'options' ], [ 'class' => 'report-field cmt-select' ] ) ?>
							</div>
						</div>
		<?php
						break;
					}
					case 'range': {

						$start	= Yii::$app->request->getQueryParam( $key . '-start' );
						$end	= Yii::$app->request->getQueryParam(  $key . '-end' );
		?>
						<div class="colf colf2 row">
							<div class="colf colf3 bold"><?= $title ?></div>
							<div class="colf colf3 range-wrap">
								<input class="report-field" type="text" name="<?= $key ?>-start" value="<?= isset( $start ) ? $start : null ?>" placeholder="Start" />
							</div>
							<div class="colf colf3 range-wrap">
								<input class="report-field" type="text" name="<?= $key ?>-end" value="<?= isset( $end ) ? $end : null ?>" placeholder="End" />
							</div>
						</div>
		<?php
						break;
					}
					case 'date': {

						$start	= Yii::$app->request->getQueryParam( $key . '-start' );
						$end	= Yii::$app->request->getQueryParam(  $key . '-end' );
		?>
						<div class="colf colf2 row">
							<div class="colf colf3 bold"><?= $title ?></div>
							<div class="colf colf3 date-wrap">
								<div class="frm-icon-element icon-right">
									<span class="cmti cmti-calendar-o"></span>
									<input class="report-field <?= $dateClass ?>" type="text" name="<?= $key ?>-start" value="<?= isset( $start ) ? $start : null ?>" placeholder="Start Date" />
								</div>
							</div>
							<div class="colf colf3 date-wrap">
								<div class="frm-icon-element icon-right">
									<span class="cmti cmti-calendar-o"></span>
									<input class="report-field <?= $dateClass ?>" type="text" name="<?= $key ?>-end" value="<?= isset( $end ) ? $end : null ?>" placeholder="End Date" />
								</div>
							</div>
						</div>
		<?php
						break;
					}
				}
			}
		?>
		</div>
		<div class="grid-report-actions">
			<span class="trigger-report-generate btn btn-medium">Generate</span>
			<span class="trigger-report-clear btn btn-medium">Reset</span>
		</div>
	</div>
	<div class="filler-height"></div>
</div>
<?php } ?>
