<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

$content			= isset( $settings->content ) ? $settings->content : $widget->content;
$contentTitle		= isset( $settings->contentTitle ) && $settings->contentTitle && !empty( $model->displayName ) ? $model->displayName : $widget->contentTitle;
$contentInfo		= isset( $settings->contentInfo ) && $settings->contentInfo && !empty( $model->description ) ? $model->description : $widget->contentInfo;
$contentSummary		= isset( $settings->contentSummary ) && $settings->contentSummary && !empty( $model->summary ) ? $model->summary : $widget->contentSummary;
$contentData		= isset( $settings->contentData ) && $settings->contentData && !empty( $model->content ) ? $model->content : $widget->contentData;

$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : $widget->contentClass;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : $widget->contentDataClass;

$purifySummary	= isset( $settings->purifySummary ) ? $settings->purifySummary : true;
$purifyContent	= isset( $settings->purifyContent ) ? $settings->purifyContent : true;
?>
<?php if( $content ) { ?>
	<div class="card-content <?= $contentClass ?>">
		<?php if( !empty( $contentTitle ) ) { ?>
			<div class="card-content-title"><?= $contentTitle ?></div>
		<?php } ?>
		<?php if( !empty( $contentInfo ) ) { ?>
			<div class="card-content-info reader"><?= $contentInfo ?></div>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<div class="card-content-summary reader"><?= $purifySummary ? HtmlPurifier::process( $contentSummary ) : $contentSummary ?></div>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="card-content-data <?= $contentDataClass ?>"><?= $purifyContent ? HtmlPurifier::process( $contentData ) : $contentData ?></div>
		<?php } ?>
		<?php include $buffer; ?>
		<?php include $attributes; ?>
	</div>
<?php } ?>
