<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\widgets\ActiveForm;
use cmsgears\core\common\widgets\Editor;
use cmsgears\icons\widgets\IconChooser;

// SF Imports
$coreProperties = $this->context->getCoreProperties();
$title			= $this->context->title;
$this->title	= "{$title} Settings | " . $coreProperties->getSiteTitle();
$returnUrl		= $this->context->returnUrl;

Editor::widget();
?>
<div class="box-crud-wrap row">
	<div class="box-crud-wrap-main row">
		<?php $form = ActiveForm::begin( [ 'id' => 'frm-settings', 'options' => [ 'class' => 'form' ] ] ); ?>
		<div class="row max-cols-100">
			<div class="col col3x2">
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Background</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'bkg', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'texture', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'defaultAvatar', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'defaultBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'lazyBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'resBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'bkgClass' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'bkgVideo', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Header</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'header', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerIcon', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerTitle', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerInfo', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'lazyAvatar', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'resAvatar', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'headerIconUrl' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Content</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'content', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentInfo', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentTitle', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentSummary', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentData', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'maxCover', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'contentClass' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'contentDataClass' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'purifySummary', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'purifyContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Footer</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footer', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footerIcon', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footerTitle', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footerInfo', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footerContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'footerIconUrl' ) ?>
								</div>
								<div class="col col4">
									<?= IconChooser::widget( [ 'model' => $model, 'attribute' => 'footerIconClass', 'options' => [ 'class' => 'icon-picker-wrap' ] ] ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'footerTitleData' )->textarea() ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'footerInfoData' )->textarea() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Attributes</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col5">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'metas', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col5x2">
									<?= $form->field( $settings, 'metaType' ) ?>
								</div>
								<div class="col col5x2">
									<?= $form->field( $settings, 'metaWrapClass' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col col3">
				<div class="content-wysiwyg">
					<label>Element Styles</label>
					<?= $form->field( $settings, 'styles' )->textarea( [ 'rows' => '5' ] )->label( false ) ?>
				</div>
				<div class="content-wysiwyg">
					<label>Element Scripts</label>
					<?= $form->field( $settings, 'scripts' )->textarea( [ 'rows' => '5' ] )->label( false ) ?>
				</div>
				<div class="content-wysiwyg">
					<label>Raw Content</label>
					<?= $form->field( $settings, 'contentRaw' )->textarea( [ 'rows' => '5' ] )->label( false ) ?>
				</div>
				<div class="content-wysiwyg">
					<label>Footer Content Data</label>
					<?= $form->field( $settings, 'footerContentData' )->textarea( [ 'class' => 'content-editor' ] )->label( false ) ?>
				</div>
			</div>
		</div>
		<div class="filler-height filler-height-medium"></div>
		<div class="align align-right">
			<?= Html::a( 'View All', $returnUrl, [ 'class' => 'btn btn-medium' ] ); ?>
			<input class="frm-element-medium" type="submit" value="Submit" />
		</div>
		<div class="filler-height filler-height-medium"></div>
		<?php ActiveForm::end(); ?>
	</div>
</div>
