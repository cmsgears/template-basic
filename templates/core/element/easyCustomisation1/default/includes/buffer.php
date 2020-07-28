<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

$resourceUrl		= "http://localhost/basicdemo/frontend/web/";
$content			= isset( $settings->content ) ? $settings->content : $widget->content;
$contentTitle		= isset( $settings->contentTitle ) ? $settings->contentTitle : true;
$contentInfo		= isset( $settings->contentInfo ) ? $settings->contentInfo  : $model->content;
$contentSummary		= isset( $settings->contentSummary ) && $settings->contentSummary && !empty( $model->summary ) ? $model->summary : $widget->contentSummary;

$contentAvatar	= isset( $settings->contentAvatar ) ? $settings->contentAvatar : true;
$contentBanner	= isset( $settings->contentBanner ) ? $settings->contentBanner : false;

$contentData		= isset( $settings->contentData ) || $settings->contentData || !empty( $model->content ) ? $model->content : $widget->contentData;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : $widget->contentClass;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : $widget->contentDataClass;

$purifySummary	= isset( $settings->purifySummary ) ? $settings->purifySummary : true;
$purifyContent	= isset( $settings->purifyContent ) ? $settings->purifyContent : true;

$contentBanner	= $contentBanner && !empty( $bannerUrl );

$cbkgLazyClass	= isset( $lazyBanner ) && $lazyBanner && $contentBanner ? 'cmt-lazy-img' : null;

$cbkgSrcset		= isset( $cbkgLazyClass ) ? $bkgSmallUrl . " 1x, " . $bkgMediumUrl . " 1.5x, " . $bannerObj->getFileUrl() . " 2x" : null;
$cbkgSizes		= isset( $cbkgLazyClass ) ? "(min-width: 1025px) 2x, (min-width: 481px) 1.5x, 1x" : null;
$cbkgLazyAttrs	= isset( $cbkgLazyClass ) ? "data-src=\"$bkgSmallUrl\" data-srcset=\"$cbkgSrcset\" data-sizes=\"$cbkgSizes\"" : null;

?>

<?php if( $content ) { ?>

<div class="box box-basic">
	<div class="box-content-wrap">
		<div class="box-header-wrap bkg bkg-primary">
			<div class="box-header">
				<div class="row row-large max-cols-50">
					
					<div data-aos="fade-right" data-aos-duration="2000"class="colf colf2">
						<div class="box-header-icon">
							<?php if( $contentAvatar ) { ?>
								<img class="fluid" src="<?= "$resourceUrl/images/setting.png" ?>" />
							<?php } ?>
						</div>
						<?php if( $contentTitle ) { ?>
							<div class="box-header-title">
								<h4><?= $model->title?></h4>
							</div>
						<?php } ?>
					</div>
					<div class="colf colf2">
						<?php if( $contentInfo ) { ?>
							<div class="box-header-info">
								<p><?= $model->content?></p>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				
<?php } ?>