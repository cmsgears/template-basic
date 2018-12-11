<?php
// Yii Imports
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Activate Account | ' . $coreProperties->getSiteTitle();
?>

<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-public', 'class' => 'cmt-block block block-basic' ],
	'content' => true
]);?>

	<h2 class="align align-center">Activate Account</h2>
	<div class="filler-height"></div>

	<?php if( Yii::$app->session->hasFlash( 'message' ) ) { ?>
		<p><?= Yii::$app->session->getFlash( 'message' ) ?></p>
	<?php
		}
		else {
	?>
	<?php $form = ActiveForm::begin( [ 'id' => 'frm-activate-account', 'options' => [ 'class' => 'form' ] ] ); ?>

	<?= Yii::$app->formDesigner->getIconPassword( $form, $model, 'password', [ 'placeholder' => 'Password' ], 'cmti cmti-key', false ) ?>
	<?= Yii::$app->formDesigner->getIconPassword( $form, $model, 'password_repeat', [ 'placeholder' => 'Repeat Password' ], 'cmti cmti-key', false ) ?>

	<div class="filler-height"></div>
	<div class="row">
		<div class="colf colf2 align align-left">
			<?= Html::a( "Login", [ '/login' ] ) ?>
		</div>
		<div class="colf colf2 align align-right">
			<input class="element-medium" type="submit" value="Activate" />
		</div>
	</div>

	<?php
			ActiveForm::end();
		}
	?>

<?php BasicBlock::end(); ?>
