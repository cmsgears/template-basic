<?php
// Yii Imports
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\form\BasicFormWidget;

$formClass			= !empty( $settings->formClass ) ? $settings->formClass : 'form';
$formCaptchaAction	= !empty( $settings->formCaptchaAction ) ? $settings->formCaptchaAction : '/forms/form/captcha';

$wrapCaptcha	= isset( $settings->wrapCaptcha ) ? $settings->wrapCaptcha : true;
$wrapActions	= isset( $settings->wrapActions ) ? $settings->wrapActions : true;
$labels			= isset( $settings->labels ) ? $settings->labels : true;
$split4060		= isset( $settings->split4060 ) ? $settings->split4060 : true;
?>
<div class="page-content-buffer">
	<div class="page-form rounded rounded-medium">
		<?php if( Yii::$app->session->hasFlash( 'message' ) ) {  ?>
			<p class="margin margin-medium-v"><?=Yii::$app->session->getFlash( 'message' )?></p>
		<?php } else { ?>
			<?php $activeForm = ActiveForm::begin( [ 'options' => [ 'class' => $formClass ] ] ); ?>

				<?= BasicFormWidget::widget([
					'model' => $model, 'form' => $form,
					'activeForm' => $activeForm, 'captchaAction' => $formCaptchaAction,
					'wrapCaptcha' => $wrapCaptcha, 'wrapActions' => $wrapActions,
					'labels' => $labels, 'split4060' => $split4060
				]) ?>

			<?php ActiveForm::end(); ?>
		<?php } ?>
	</div>
</div>
