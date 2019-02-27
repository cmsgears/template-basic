<?php
// Yii Imports
use yii\helpers\Html;

$model = isset( $parent ) ? $parent : $gallery;

$updateUrl = isset( $parent ) ? "$apixBase/update-gallery?id=$parent->id&cid=$gallery->id" : "$apixBase/update?id=$gallery->id&cid=$gallery->id";
?>
<div id="data-crud-gallery" class="cmt-gallery-item-crud data-crud-wrap data-crud-wrap-basic row">
	<div class="data-crud-wrap-main colf colf15x11">
		<div class="data-crud data-crud-basic">
			<div class="data-crud-title">
				Manage Gallery <?= isset( $parent ) ? "($parent->name)" : null ?>
				<span class="data-crud-title-actions">
					<span class="action">
						<?= Html::a( '<i class="btn-icon cmti cmti-return text text-micro" title="Back"></i>', $returnUrl ) ?>
					</span>
					<span class="action action-update">
						<i class="btn-icon cmti cmti-edit text text-micro" title="Update"></i>
					</span>
				</span>
			</div>
			<form class="form form-gallery hidden-easy" cmt-app="core" cmt-controller="gallery" cmt-action="update" action="<?= $updateUrl ?>" cmt-keep>
				<?php include "$themeIncludes/components/spinners/form.php"; ?>
				<div class="data-crud-form">
					<div class="row">
						<div class="col col3">
							<div class="form-group">
								<label>Name *</label>
								<input type="text" name="Gallery[name]" placeholder="Name" value="<?= $gallery->name ?>" />
								<span  class="error" cmt-error="Gallery[name]"></span>
							</div>
						</div>
						<div class="col col3">
							<div class="form-group">
								<label>Title</label>
								<input type="text" name="Gallery[title]" placeholder="Title" value="<?= $gallery->title ?>" />
								<span  class="error" cmt-error="Gallery[title]"></span>
							</div>
						</div>
						<div class="col col3">
							<div class="form-group">
								<label>Description</label>
								<textarea name="Gallery[description]" placeholder="Description"><?= $gallery->description ?></textarea>
								<span  class="error" cmt-error="Gallery[description]"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="data-crud-message">
					<div class="message success"></div>
					<div class="message warning"></div>
					<div class="message error"></div>
				</div>
				<div class="data-crud-actions row">
					<div class="col col2"></div>
					<div class="col col2">
						<input class="frm-element-medium" type="submit" value="Update" />
					</div>
				</div><hr/>
			</form>
			<div class="cmt-gallery-item-collection data-crud-content">
				<?php
					$modelFiles = $gallery->modelFiles;

					foreach( $modelFiles as $modelFile ) {

						$file = $modelFile->model;
				?>
					<div class="cmt-gallery-item card card-gallery-item" data-id="<?= $modelFile->id ?>">
						<div class="card-content-wrap">
							<div class="cmt-gallery-item-header card-header row">
								<div class="col col3x2 title align align-left" title="<?= $file->title ?>"><?= $file->title ?></div>
								<div class="col col3 align align-right">
									<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="get" action="<?= $apixBase ?>/get-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid=<?= $file->id ?>">
										<span class="spinner hidden-easy">
											<span class="icon cmti cmti-spinner-1 spin"></span>
										</span>
										<i class="icon cmti cmti-edit cmt-click"></i>
									</span>
									<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="delete" action="<?= $apixBase ?>/delete-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid=<?= $file->id ?>">
										<span class="spinner hidden-easy">
											<span class="icon cmti cmti-spinner-1 spin"></span>
										</span>
										<i class="icon cmti cmti-bin cmt-click"></i>
									</span>
								</div>
							</div>
							<div class="cmt-gallery-item-data card-data">
								<div class="card-image bkg-image" style="background-image:url(<?= $file->getThumbUrl() ?>)"></div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="cmt-gallery-item-form data-crud-wrap-sidebar colf colf15x4"></div>
</div>
<?php
include "$themeIncludes/handlebars/gallery/card.php";
