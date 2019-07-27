<?php
// Yii Imports
use yii\helpers\Html;

// Basic Imports
use widgets\element\ElementWidget;

$elementType = !empty( $settings->elementType ) ? $settings->elementType : null;

$boxWrapClass	= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : 'row';
$boxWrapper		= !empty( $settings->boxWrapper ) ? $settings->boxWrapper : null;
$boxClass		= !empty( $settings->boxClass ) ? $settings->boxClass : 'row';
?>
<?php if( $elements ) { ?>
	<div class="page-box-wrap <?= $boxWrapClass ?>">
		<?php
			$elements = [];

			if( empty( $elementType ) ) {

				$elements = $model->activeElements;
			}
			else {

				$elements = Yii::$app->factory->get( 'elementService' )->getActiveByType( $elementType );
			}

			foreach( $elements as $element ) {

				$elementContent = ElementWidget::widget( [ 'model' => $element ] );

				if( !empty( $boxClass ) ) {

					echo Html::tag( $boxWrapper, $elementContent, [ 'class' => $boxClass ] );
				}
				else {

					echo $elementContent;
				}
			}
		?>
	</div>
<?php } ?>
