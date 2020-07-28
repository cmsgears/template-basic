<?php
// Yii Imports
use yii\helpers\Html;
// Basic Imports
use widgets\element\ElementWidget;

$elementType = !empty( $settings->elementType ) ? $settings->elementType : $widget->elementType;

$boxWrapClass	= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : $widget->boxWrapClass;
$boxWrapper		= !empty( $settings->boxWrapper ) ? $settings->boxWrapper : $widget->boxWrapper;
$boxClass		= !empty( $settings->boxClass ) ? $settings->boxClass : $widget->boxClass;
?>
<?php if( $elements ) { ?>
	<div class="block-box-wrap <?= $boxWrapClass ?>">
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
