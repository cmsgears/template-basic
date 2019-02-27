<script id="addItemTemplate" type="text/x-handlebars-template">
	<div class="cmt-gallery-item-uploader" type="image" directory="gallery">
		<div class="row margin margin-bottom-small">
			<label class="align align-center">Image</label>
			<div class="uploader uploader-basic uploader-small">
				<div class="file-dragger">
					<div class="drag-wrap"></div>
				</div>
				<div class="file-chooser show-chooser">
					<span class="btn">Choose</span>
					<input class="input" type="file" />
				</div>
				<div class="file-data"></div>
				<div class="file-preloader">
					<div class="file-preloader-bar"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<form class="form frm-split-40-60" cmt-app="gallery" cmt-controller="item" cmt-action="add" action="<?= $apixBase ?>/slide/create?id=<?= $slider->id ?>">
				<?php include "$themeIncludes/components/spinners/form.php"; ?>
				<div class="file-info">
					<input name="File[name]" class="name" type="hidden" />
					<input name="File[extension]" class="extension" type="hidden" />
					<input name="File[directory]" value="gallery" type="hidden" />
					<input name="File[type]" value="image" type="hidden" />
					<input name="File[changed]" class="change" type="hidden" />
				</div>
				<div class="file-fields">
					<div class="row">
						<div class="colf colf15x7">
							<div class="form-group">
								<label>Slide Title</label>
								<input class="title" name="Slide[name]" placeholder="Title" type="text" />
								<span  class="error" cmt-error="Slide[name]"></span>
							</div>
						</div>
						<div class="colf colf15"></div>
						<div class="colf colf15x7">
							<div class="form-group">
								<label>Slide Url</label>
								<input name="Slide[url]" placeholder="Url" type="text" />
								<span  class="error" cmt-error="Slide[url]"></span>
								<input type="hidden" name="Slide[sliderId]" value="<?= $slider->id ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="colf colf15x7">
							<div class="form-group">
								<label>Image Caption</label>
								<input class="caption" name="File[caption]" placeholder="Caption" type="text" />
								<span  class="error" cmt-error="File[caption]"></span>
							</div>
						</div>
						<div class="colf colf15"></div>
						<div class="colf colf15x7">
							<div class="form-group">
								<label>Image Alt</label>
								<input class="alt" name="File[altText]" placeholder="Alternative Text" type="text" />
								<span  class="error" cmt-error="File[altText]"></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Slide Description</label>
						<textarea class="desc" name="Slide[description]" placeholder="Description"></textarea>
						<span  class="error" cmt-error="Slide[description]"></span>
					</div>
					<div class="form-group">
						<label>Slide content</label>
						<textarea name="Slide[content]" placeholder="Content"></textarea>
						<span  class="error" cmt-error="Slide[content]"></span>
					</div>
				</div>
				<div class="data-crud-message">
					<span  class="error" cmt-error="File[name]"></span>
					<div class="message success"></div>
					<div class="message warning"></div>
					<div class="message error"></div>
				</div>
				<div class="data-crud-actions align align-right">
					<input class="frm-element-medium" type="submit" value="Create" />
				</div>
			</form>
		</div>
	</div>
</script>

<script id="updateItemTemplate" type="text/x-handlebars-template">
	<div class="cmt-gallery-item-uploader row max-cols-50" type="image" directory="gallery">
		<div class="row margin margin-bottom-small">
			<label class="align align-center">Image</label>
			<div class="uploader uploader-basic uploader-small">
				<div class="file-dragger">
					<div class="drag-wrap"></div>
				</div>
				<div class="file-chooser show-chooser">
					<span class="btn">Choose</span>
					<input class="input" type="file" />
				</div>
				<div class="file-data"></div>
				<div class="file-preloader">
					<div class="file-preloader-bar"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<form class="form frm-split-40-60" cmt-app="gallery" cmt-controller="item" cmt-action="update" action="<?= $apixBase ?>/slide/update?id=<?= $slider->id ?>&cid={{mid}}&fid={{fid}}">
				<div class="file-info">
					<input name="File[id]" class="id" type="hidden" value="{{fid}}" />
					<input name="File[name]" class="name" type="hidden" value="{{name}}" />
					<input name="File[extension]" class="extension" type="hidden" value="{{extension}}" />
					<input name="File[directory]" value="gallery" type="hidden" />
					<input name="File[type]" value="image" type="hidden" />
					<input name="File[changed]" class="change" type="hidden" />
				</div>
				<div class="file-fields">
					<div class="row">
						<div class="colf colf15x7">
							<div class="form-group">
								<label>Slide Title</label>
								<input class="title" name="Slide[name]" placeholder="Title" type="text" value="{{title}}" />
								<span  class="error" cmt-error="Slide[name]"></span>
							</div>
						</div>
						<div class="colf colf15"></div>
						<div class="colf colf15x7">
							<div class="form-group">
								<label>Slide Url</label>
								<input name="Slide[url]" placeholder="Url" type="text" value="{{link}}" />
								<span  class="error" cmt-error="Slide[url]"></span>
								<input type="hidden" name="Slide[sliderId]" value="<?= $slider->id ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="colf colf15x7">
							<div class="form-group">
								<label>Image Caption</label>
								<input class="caption" name="File[caption]" placeholder="Caption" type="text" value="{{caption}}" />
								<span  class="error" cmt-error="File[caption]"></span>
							</div>
						</div>
						<div class="colf colf15"></div>
						<div class="colf colf15x7">
							<div class="form-group">
								<label>Image Alt</label>
								<input class="alt" name="File[altText]" placeholder="Alternative Text" type="text" value="{{altText}}" />
								<span  class="error" cmt-error="File[altText]"></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Slide Description</label>
						<textarea class="desc" name="Slide[description]" placeholder="Description">{{description}}</textarea>
						<span  class="error" cmt-error="Slide[description]"></span>
					</div>
					<div class="form-group">
						<label>Slide Content</label>
						<textarea name="Slide[content]" placeholder="Content">{{content}}</textarea>
						<span  class="error" cmt-error="Slide[content]"></span>
					</div>
				</div>
				<div class="data-crud-message">
					<span  class="error" cmt-error="File[name]"></span>
					<div class="message success"></div>
					<div class="message warning"></div>
					<div class="message error"></div>
				</div>
				<div class="data-crud-actions align align-right">
					<span class="cmt-gallery-item-close btn btn-medium">Cancel</span>
					<input class="frm-element-medium" type="submit" value="Update" />
				</div>
			</form>
		</div>
	</div>
</script>

<script id="itemViewTemplate" type="text/x-handlebars-template">

<div class="cmt-gallery-item card card-gallery-item" data-id="{{mid}}">
	<div class="card-content-wrap">
		<div class="cmt-gallery-item-header card-header row">
			<div class="col col3x2 title align align-left" title="{{title}}">{{title}}</div>
			<div class="col col3 align align-right">
				<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="get" action="<?= $apixBase ?>/slide/get?id=<?= $slider->id ?>&cid={{mid}}&fid={{fid}}">
					<span class="spinner hidden-easy">
						<span class="icon cmti cmti-spinner-1 spin"></span>
					</span>
					<i class="icon cmti cmti-edit cmt-click"></i>
				</span>
				<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="delete" action="<?= $apixBase ?>/slide/delete?id=<?= $slider->id ?>&cid={{mid}}&fid={{fid}}">
					<span class="spinner hidden-easy">
						<span class="icon cmti cmti-spinner-1 spin"></span>
					</span>
					<i class="icon cmti cmti-bin cmt-click"></i>
				</span>
			</div>
		</div>
		<div class="cmt-gallery-item-data card-data">
			<div class="card-image bkg-image" style="background-image:url({{thumbUrl}})"></div>
		</div>
	</div>
</div>

</script>

<script id="itemRefreshTemplate" type="text/x-handlebars-template">

<div class="cmt-gallery-item-data card-data">
	<div class="card-image bkg-image" style="background-image:url({{thumbUrl}})"></div>
</div>

</script>
