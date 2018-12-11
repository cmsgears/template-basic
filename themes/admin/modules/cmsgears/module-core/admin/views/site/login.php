<?php
// Yii Imports
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Login | ' . $coreProperties->getSiteTitle();
?>

<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-public', 'class' => 'cmt-block block block-basic' ],
	'content' => true
]);?>

	<h2 class="align align-center">Login</h2>
	<div class="filler-height"></div>

	<?php $form = ActiveForm::begin( [ 'id' => 'frm-login', 'options' => [ 'class' => 'form' ] ] ); ?>

	<?= Yii::$app->formDesigner->getIconInput( $form, $model, 'email', [ 'icon' => 'cmti cmti-user-full', 'options' => [ 'placeholder' => 'Email/Username' ] ] ) ?>
	<?= Yii::$app->formDesigner->getIconPassword( $form, $model, 'password', [ 'options' => [ 'placeholder' => 'Password' ] ] ) ?>
	<?= Yii::$app->formDesigner->getIconCheckbox( $form, $model, 'rememberMe', null, 'cmti cmti-checkbox', 'Remember Me' ) ?>

	<div class="filler-height"></div>
	<div class="row">
		<div class="colf colf2 align align-left">
			<?= Html::a( "Forgot Password ?", [ '/forgot-password' ] ) ?>
		</div>
		<div class="colf colf2 align align-right">
			<input class="element-medium" type="submit" value="Login" />
		</div>
	</div>

	<?php ActiveForm::end(); ?>

<?php BasicBlock::end(); ?>
