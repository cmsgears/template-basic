<?php
// Yii Imports
use yii\helpers\HtmlPurifier;
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;
use cmsgears\core\common\utilities\CodeGenUtil;
// Header -------------------
$header				= isset( $settings->header ) ? $settings->header : $widget->header;
$headerIcon			= isset( $settings->headerIcon ) ? $settings->headerIcon : $widget->headerIcon;
$headerIconClass	= !empty( $model->icon ) ? $model->icon : $widget->headerIconClass;
$headerTitle		= isset( $settings->headerTitle ) && $settings->headerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->headerTitle;
$headerInfo			= isset( $settings->headerInfo ) && $settings->headerInfo && !empty( $model->description ) ? $model->description : $widget->headerInfo;
$headerContent		= isset( $settings->headerContent ) && $settings->headerContent && !empty( $model->summary ) ? HtmlPurifier::process( $model->summary ) : $widget->headerContent;
$lazyAvatar			= isset( $settings->lazyAvatar ) ? $settings->lazyAvatar : $widget->lazyAvatar;
$resAvatar			= isset( $settings->resAvatar ) ? $settings->resAvatar : $widget->resAvatar;

$avatarObj		= $model->avatar;
$avatar			= ( isset( $settings->defaultAvatar ) && $settings->defaultAvatar ) || $widget->defaultAvatar ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : $lazyAvatar ? CodeGenUtil::getSmallUrl( $avatarObj, [ 'image' => $avatar ] ) : CodeGenUtil::getFileUrl( $avatarObj, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $headerIconUrl ) ? $headerIconUrl : $widget->headerIconUrl;

$lazyAvatar	= isset( $avatarObj ) & $lazyAvatar ? true : false;

$avatarUrl		= $lazyAvatar ? $avatarObj->getSmallPlaceholderUrl() : $headerIconUrl;
$iconLazyClass	= $lazyAvatar ? 'cmt-lazy-img' : ( isset( $avatarObj ) ? ( $resAvatar ? 'cmt-res-img' : null ) : null );

$smallUrl		= isset( $iconLazyClass ) ? $avatarObj->getSmallUrl() : null;
$iconSrcset		= isset( $iconLazyClass ) ? $avatarObj->generateSrcset() : null;
$iconSizes		= isset( $iconLazyClass ) ? $avatarObj->sizes : null;
$iconLazyAttrs	= isset( $iconLazyClass ) ? "data-src=\"$smallUrl\" data-srcset=\"$iconSrcset\" data-sizes=\"$iconSizes\"" : null;
?>
<?php if( $header ) { ?>
	<div class="box-header-wrap">
		<div class="box-header">
			<div class="row row-large max-cols-50">
				<div class="colf colf2">
					<?php if( $headerIcon && !empty( $headerIconClass ) && $headerIconClass !== 'icon' ) { ?>
						<div class="box-header-icon">
							<?php if( $contentAvatar ) { ?>
								<img class="fluid" src="<?= "$resourceUrl/images/setting.png" ?>" />
							<?php } ?>
						</div>
					<?php } ?>
					<?php if( $headerIcon && !empty( $headerIconUrl ) ) { ?>
						<div class="box-header-icon">
							<img class="fluid <?= $iconLazyClass ?>" src="<?= $avatarUrl ?>" <?= $iconLazyAttrs ?> />
						</div>
					<?php } ?>
					<?php if( !empty( $headerTitle ) ) { ?>
							<div class="box-header-title">
								<h4><?= $model->title?></h4>
							</div>
					<?php } ?>
				</div>
				<div class="colf colf2">
					<?php if( !empty( $headerInfo ) ) { ?>
						<div class="box-header-info">
								<p><?= $model->content?></p>
							</div>
					<?php } ?>
					<?php if( !empty( $headerContent ) ) { ?>
						<div class="box-header-content reader"><?= $headerContent ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
