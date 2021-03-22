<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$header		= isset( $settings->header ) ? $settings->header : false;
$headerIcon	= isset( $settings->headerIcon ) ? $settings->headerIcon : false;

$headerTitle	= isset( $settings->headerTitle ) && $settings->headerTitle ? $model->displayName : null;
$headerInfo		= isset( $settings->headerInfo ) && $settings->headerInfo ? $model->description : null;
$headerFluid	= isset( $settings->headerFluid ) ? $settings->headerFluid : false;
$headerScroller	= isset( $settings->headerScroller ) ? $settings->headerScroller : false;

$avatarObj		= isset( $model->avatar ) ? $model->avatar : null;
$avatar			= isset( $settings->defaultAvatar ) && $settings->defaultAvatar ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= isset( $model->avatar ) ? ( $lazyAvatar ? CodeGenUtil::getSmallUrl( $avatarObj, [ 'image' => $avatar ] ) : CodeGenUtil::getFileUrl( $avatarObj, [ 'image' => $avatar ] ) ) : CodeGenUtil::getFileUrl( null, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : $headerIconUrl;

$lazyAvatar	= isset( $avatarObj ) ? true : false;

$avatarUrl		= $lazyAvatar ? $avatarObj->getSmallPlaceholderUrl() : $headerIconUrl;
$iconLazyClass	= $lazyAvatar ? 'cmt-lazy-img' : isset( $avatarObj ) ? 'cmt-res-img' : null;

$smallUrl		= isset( $iconLazyClass ) ? $avatarObj->getSmallUrl() : null;
$iconSrcset		= isset( $iconLazyClass ) ? $avatarObj->generateSrcset() : null;
$iconSizes		= isset( $iconLazyClass ) ? $avatarObj->sizes : null;
$iconLazyAttrs	= isset( $iconLazyClass ) ? "data-src=\"$smallUrl\" data-srcset=\"$iconSrcset\" data-sizes=\"$iconSizes\"" : null;
?>
<?php if( $header ) { ?>
	<div class="page-header-wrap">
		<div class="page-header page-header-text">
			<?php if( $headerIcon && !empty( $headerIconClass ) && $headerIconClass !== 'icon' ) { ?>
				<div class="page-header-icon">
					<i class="<?= $headerIconClass ?>"></i>
				</div>
			<?php } ?>
			<?php if( $headerIcon && !empty( $headerIconUrl ) ) { ?>
				<div class="page-header-icon">
					<img class="fluid <?= $iconLazyClass ?>" src="<?= $avatarUrl ?>" <?= $iconLazyAttrs ?> />
				</div>
			<?php } ?>
			<?php if( !empty( $headerTitle ) ) { ?>
				<h1 class="page-header-title"><?= $headerTitle ?></h1>
			<?php } ?>
			<?php if( !empty( $headerInfo ) ) { ?>
				<h2 class="page-header-info reader"><?= $headerInfo ?></h2>
			<?php } ?>
		</div>
	</div>
<?php } ?>
