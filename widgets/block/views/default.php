<?php
// Yii Imports
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;
// Basic Imports
use widgets\element\ElementWidget;

$model	= $widget->model;
$data	= $widget->modelData;

// Admin Settings - Override widget settings to be controllable from admin.
$settings = $data->settings ?? null;

// Header -------------------

$header				= $settings->header ?? $widget->header;
$headerIcon			= $settings->headerIcon ?? $widget->headerIcon;
$headerIconClass	= !empty( $model->icon ) ? $model->icon : $widget->headerIconClass;
$headerTitle		= isset( $settings ) && $settings->headerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->headerTitle;
$headerInfo			= isset( $settings ) && $settings->headerInfo && !empty( $model->description ) ? $model->description : $widget->headerInfo;
$headerContent		= isset( $settings ) && $settings->headerContent && !empty( $model->summary ) ? $model->summary : $widget->headerContent;

$avatar			= ( isset( $settings ) && $settings->defaultAvatar ) || $widget->defaultAvatar ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $headerIconUrl ) ? $headerIconUrl : $widget->headerIconUrl;

// Content ------------------

$content			= $settings->content ?? $widget->content;
$contentTitle		= isset( $settings ) && $settings->contentTitle && !empty( $model->displayName ) ? $model->displayName : $widget->contentTitle;
$contentInfo		= isset( $settings ) && $settings->contentInfo && !empty( $model->description ) ? $model->description : $widget->contentInfo;
$contentSummary		= isset( $settings ) && $settings->contentSummary && !empty( $model->summary ) ? $model->summary : $widget->contentSummary;
$contentData		= isset( $settings ) && $settings->contentData && !empty( $model->content ) ? $model->content : $widget->contentData;

$maxCover = $settings->maxCover ?? $widget->maxCover;

$contentClass		= isset( $settings ) && !empty( $settings->contentClass ) ? $settings->contentClass : $widget->contentClass;
$contentDataClass	= isset( $settings ) && !empty( $settings->contentDataClass ) ? $settings->contentDataClass : $widget->contentDataClass;

// Footer -------------------

$footer				= $settings->footer ?? $widget->footer;
$footerIcon			= $settings->footerIcon ?? $widget->footerIcon;
$footerIconClass	= $settings->footerIconClass ?? $widget->footerIconClass;
$footerTitle		= isset( $settings ) && ( $settings->footerTitle && !empty( $settings->footerTitleData ) ) ? $settings->footerTitleData : ( isset( $settings ) && $settings->footerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->footerTitle );
$footerInfo			= isset( $settings ) && ( $settings->footerInfo && !empty( $settings->footerInfoData ) ) ? $settings->footerInfoData : ( isset( $settings ) && $settings->footerInfo && !empty( $model->description ) ? $model->description : $widget->footerInfo );
$footerContent		= isset( $settings ) && ( $settings->footerContent && !empty( $settings->footerContentData ) ) ? $settings->footerContentData : ( isset( $settings ) && $settings->footerContent && !empty( $model->summary ) ? $model->summary : $widget->footerContent );

$footerIconUrl	= isset( $settings ) && !empty( $settings->footerIconUrl ) ? $settings->footerIconUrl : CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$footerIconUrl	= !empty( $footerIconUrl ) ? $footerIconUrl : $widget->footerIconUrl;

// Meta ---------------------

$metas			= $settings->metas ?? $widget->metas;
$metaTypes		= $settings->metaTypes ?? $widget->metaTypes;

$metaWrapClass	= isset( $settings ) && !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : $widget->metaWrapClass;

// Elements -----------------

$elements		= $settings->elements ?? $widget->elements;
$elementType	= $settings->elementType ?? $widget->elementType;

$boxWrapClass	= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : $widget->boxWrapClass;
$boxWrapper		= !empty( $settings->boxWrapper ) ? $settings->boxWrapper : $widget->boxWrapper;
$boxClass		= !empty( $settings->boxClass ) ? $settings->boxClass : $widget->boxClass;

// Background ---------------

$bkg			= $settings->bkg ?? $widget->bkg;
$fixedBkg		= $settings->fixedBkg ?? $widget->fixedBkg;
$scrollBkg		= $settings->scrollBkg ?? $widget->scrollBkg;
$parallaxBkg	= $settings->parallaxBkg ?? $widget->parallaxBkg;
$bkgClass		= $settings->bkgClass ?? $widget->bkgClass;

$texture		= $settings->texture ?? $widget->texture;
$textureClass	= !empty( $model->texture ) ? $model->texture : $widget->textureClass;

$banner		= ( isset( $settings ) && $settings->defaultBanner ) || $widget->defaultBanner ? SiteProperties::getInstance()->getDefaultBanner() : null;
$bannerUrl	= CodeGenUtil::getFileUrl( $model->banner, [ 'image' => $banner ] );
$bkgUrl		= $bannerUrl ?? $widget->bkgUrl;
?>

<?php if( !empty( $bkgUrl ) ) { ?>
	<?php if( $bkg ) { ?>
		<div class="block-bkg <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
	<?php } ?>

	<?php if( $fixedBkg ) { ?>
		<div class="block-bkg-fixed <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
	<?php } ?>

	<?php if( $scrollBkg ) { ?>
		<div class="block-bkg-scroll <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
	<?php } ?>

	<?php if( $parallaxBkg ) { ?>
		<div class="block-bkg-parallax <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
	<?php } ?>
<?php } ?>

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>

<?php if( $maxCover ) { ?>
	<div class="max-cover"></div>
<?php } ?>

<div class="block-content-wrap">
	<?php if( $header ) { ?>
		<div class="block-header-wrap">
			<div class="block-header">
				<?php if( $headerIcon && !empty( $headerIconClass ) && $headerIconClass !== 'icon' ) { ?>
					<div class="block-header-icon">
						<i class="<?= $headerIconClass ?>"></i>
					</div>
				<?php } ?>
				<?php if( $headerIcon && !empty( $headerIconUrl ) ) { ?>
					<div class="block-header-icon">
						<img class="fluid" src="<?= $headerIconUrl ?>" />
					</div>
				<?php } ?>
				<?php if( !empty( $headerTitle ) ) { ?>
					<div class="block-header-title"><?= $headerTitle ?></div>
				<?php } ?>
				<?php if( !empty( $headerInfo ) ) { ?>
					<div class="block-header-info reader"><?= $headerInfo ?></div>
				<?php } ?>
				<?php if( !empty( $headerContent ) ) { ?>
					<div class="block-header-content reader"><?= $headerContent ?></div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>

	<?php if( $content ) { ?>
		<div class="block-content <?= $contentClass ?>">
			<?php if( !empty( $contentTitle ) ) { ?>
				<div class="block-content-title"><?= $contentTitle ?></div>
			<?php } ?>
			<?php if( !empty( $contentInfo ) ) { ?>
				<div class="block-content-info reader"><?= $contentInfo ?></div>
			<?php } ?>
			<?php if( !empty( $contentSummary ) ) { ?>
				<div class="block-content-summary reader"><?= $contentSummary ?></div>
			<?php } ?>
			<?php if( !empty( $contentData ) ) { ?>
				<div class="block-content-data <?= $contentDataClass ?>"><?= $contentData ?></div>
			<?php } ?>
			<div class="block-content-buffer">
				<?php if( isset( $widget->buffer ) ) { ?>
					<?= $widget->bufferData ?>
				<?php } ?>
			</div>
			<?php if( $metas ) { ?>
				<div class="box-content-meta <?= $metaWrapClass ?>">
					<?php

						$metaTypes = preg_split( '/,/', $metaTypes );

						if( count( $metaTypes ) == 1 ) {

							$metas = $model->getActiveMetasByType( $metaTypes[ 0 ] );
						}
						else if( count( $metaTypes ) > 1 ) {

							$metas = $model->getActiveMetasByTypes( $metaTypes );
						}
						else {

							$metas = $model->activeMetas;
						}

						foreach( $metas as $meta ) {

							$title = isset( $meta->label ) ? $meta->label : ucfirst( $meta->name );
					?>
							<div class="box-meta">
								<span class="h5 inline-block"><?= $title ?></span> - <span class="inline-block"><?= $meta->value ?></span>
							</div>
					<?php
						}
					?>
				</div>
			<?php } ?>
			<?php if( $elements ) { ?>
				<div class="block-box-wrap <?= $boxWrapClass ?>">
					<?php
						$elements = $model->activeElements;

						if( !empty( $elementType ) ) {

							$telements	= Yii::$app->factory->get( 'elementService' )->getActiveByType( $elementType );
							$elements	= ArrayHelper::merge( $elements, $telements );
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
		</div>
	<?php } ?>

	<?php if( $footer ) { ?>
		<div class="block-footer-wrap">
			<div class="block-footer">
				<?php if( $footerIcon && !empty( $footerIconClass ) ) { ?>
					<div class="block-footer-icon">
						<i class="<?= $footerIconClass ?>"></i>
					</div>
				<?php } ?>
				<?php if( $footerIcon && !empty( $footerIconUrl ) ) { ?>
					<div class="block-footer-icon">
						<img class="fluid" src="<?= $footerIconUrl ?>" />
					</div>
				<?php } ?>
				<?php if( !empty( $footerTitle ) ) { ?>
					<div class="block-footer-title"><?= $footerTitle ?></div>
				<?php } ?>
				<?php if( !empty( $footerInfo ) ) { ?>
					<div class="block-footer-info reader"><?= $footerInfo ?></div>
				<?php } ?>
				<?php if( !empty( $footerContent ) ) { ?>
					<div class="block-footer-content reader"><?= $footerContent ?></div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</div>
