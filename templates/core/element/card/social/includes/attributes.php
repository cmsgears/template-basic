<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

$metas		= isset( $settings->metas ) ? $settings->metas : $widget->metas;
$metaTypes	= !empty( $settings->metaTypes ) ? $settings->metaTypes : null;

$metaWrapClass = !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : $widget->metaWrapClass;
?>
<?php if( $metas ) { ?>
	<div class="card-content-meta <?= $metaWrapClass ?>">
		<?php
			$metaTypes = isset( $metaTypes ) ? preg_split( '/,/', $metaTypes ) : [];

			// Single Type
			if( count( $metaTypes ) == 1 ) {

				$metas = $model->getActiveMetasByType( $metaTypes[ 0 ] );
			}
			// Multiple Types
			else if( count( $metaTypes ) > 1 ) {

				$metas = $model->getActiveMetasByTypes( $metaTypes );
			}
			// Default Types
			else {

				$metas = $model->getActiveMetasByType( CoreGlobal::TYPE_USER );
			}

			foreach( $metas as $meta ) {

				$title = isset( $meta->label ) ? $meta->label : ucfirst( $meta->name );
				$link	= HtmlPurifier::process( $meta->value );
		?>
				<a href="<?= strip_tags( $link ) ?>">
					<span class="icon icon-rounded icon-bkg <?= $meta->icon ?>" title="<?= $title ?>"></span>
				</a>
		<?php
			}
		?>
	</div>
<?php } ?>
