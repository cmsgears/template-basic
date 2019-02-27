<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Error | ' . $coreProperties->getSiteTitle();

$message = nl2br( Html::encode( $message ) );
?>
<?php if ( Yii::$app->user->isGuest ) { ?>

<?= BasicBlock::widget([
	'options' => [ 'id' => 'block-public', 'class' => 'cmt-block block block-basic' ],
	'content' => true,
	'contentData' => "<h2 class=\"align align-center\">Error</h2><div class=\"filler-height\"></div><p>$message</p>"
]) ?>

<?php } else { ?>

	<h2 class="align align-center">Error</h2>
	<div class="filler-height"></div>
	<p><?= $message ?></p>

<?php } ?>
