<?php
// Basic Imports
use widgets\block\BlockWidget;

$blockType = !empty( $settings->blockType ) ? $settings->blockType : null;
?>
<?php if( $blocks ) { ?>
	<div class="page-block-wrap">
		<?php
			$blocks = [];

			if( empty( $blockType ) ) {

				$blocks = $model->activeBlocks;
			}
			else {

				$blocks = Yii::$app->factory->get( 'blockService' )->getActiveByType( $blockType );
			}

			foreach( $blocks as $block ) {
		?>
				<?= BlockWidget::widget( [ 'model' => $block ] ) ?>
		<?php } ?>
	</div>
<?php } ?>
