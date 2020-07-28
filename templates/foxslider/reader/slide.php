<?php
$slideImage = $slide->image;

$slideName		= $slide->name;
$slideTitle		= $slide->name;
$slideUrl		= $slide->url;
$slideDesc		= $slide->description;
$slideContent	= $slide->content;

$slideTexture	= isset( $widget->slideTexture ) ? "<div class=\"$widget->slideTexture\"></div>" : null;
$content		= "<div class=\"wrap-slide-content\">";

if( isset( $slideImage ) ) {

	$smallUrl	= $slideImage->getSmallUrl();
	$mediumUrl	= $slideImage->getMediumUrl();
	$imageUrl	= $slideImage->getFileUrl();

	$imageTitle		= $slideImage->title;
	$imageCaption	= $slideImage->caption;
	$imageAlt		= $slideImage->altText;
	$imageDesc		= $slideImage->description;

	$lazyImg = !empty( $widget->lazyImageUrl ) ? $widget->lazyImageUrl : ( $widget->lazySmall ? $slideImage->getSmallPlaceholderUrl() : $slideImage->getPlaceholderUrl() );

	if( isset( $widget->lazyLoad ) && $widget->lazyLoad ) {

		$srcset = $slideImage->generateSrcset( true );
		$sizes	= $slideImage->srcset;

		$content = "<div class=\"fxs-lazy fxs-lazy-bkg wrap-slide-content\" style=\"background-image:url($lazyImg)\" data-lazy=\"0\" data-src=\"$imageUrl\" data-srcset=\"$srcset\" data-sizes=\"$sizes\">";
	}
	else if( isset( $widget->responsiveImage ) && $widget->responsiveImage ) {

		$srcset = $slideImage->generateSrcset( true );
		$sizes	= $slideImage->srcset;

		$content = "<div class=\"fxs-lazy fxs-lazy-bkg wrap-slide-content\" style=\"background-image:url($imageUrl)\" data-lazy=\"0\" data-src=\"$imageUrl\" data-srcset=\"$srcset\" data-sizes=\"$sizes\">";
	}
	else {

		$content = "<div class=\"wrap-slide-content\" style=\"background-image:url($imageUrl)\">";
	}

	if( $fxOptions[ 'resizeBkgImage' ] ) {

		$srcset = $slideImage->generateSrcset();
		$sizes	= $slideImage->sizes;

		$imgClass = $fxOptions[ 'bkgImageClass' ];

		if( isset( $widget->lazyLoad ) && $widget->lazyLoad ) {

			$content = "<img src=\"$lazyImg\" class=\"fxs-lazy fxs-lazy-img $imgClass\" alt=\"$imageAlt\" data-lazy=\"0\" data-src=\"$imageUrl\" data-srcset=\"$srcset\" data-sizes=\"$sizes\" />
						<div class=\"wrap-slide-content\">";
		}
		else if( isset( $widget->responsiveImage ) && $widget->responsiveImage ) {

			$content = "<img src=\"$imageUrl\" class=\"fxs-lazy fxs-lazy-img $imgClass\" alt=\"$imageAlt\" data-lazy=\"0\" data-src=\"$imageUrl\" data-srcset=\"$srcset\" data-sizes=\"$sizes\" />
						<div class=\"wrap-slide-content\">";
		}
		else {

			$content = "<img src=\"$imageUrl\" class=\"$imgClass\" alt=\"$imageAlt\" srcset=\"$srcset\" sizes=\"$sizes\" />
						<div class=\"wrap-slide-content\">";
		}
	}
}
?>

<?php if( isset( $slideUrl ) && strlen( $slideUrl ) > 0 ) { ?>
	<div class="slide">
		<a href="<?= $slideUrl ?>">
			<?= $content ?>
				<?= $slideTexture ?>
				<div class="slide-content">									
						<div class="fxs-content reader">
							<h2><?= $slideTitle ?></h2>
							<?= $slideDesc ?>
							<?= $imageDesc ?>
							<p class="padding padding-small"><?= $slideContent ?></p>
						</div>					
				</div>
			</div>
		</a>
	</div>
<?php } else { ?>
	<div class="slide">
		<?= $content ?>
			<?= $slideTexture ?>
			<div class="slide-content">				
				<div class="fxs-content reader">
					<h2><?= $slideTitle ?></h2>
					<?= $slideDesc ?>
					<?= $imageDesc ?>
					<p class="padding padding-small"><?= $slideContent ?></p>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
