<?php
// Yii Imports
use yii\helpers\Html;
?>
<div class="data-crud">
	<div class="data-crud-title">Address</div>
	<form class="cmt-location form" cmt-app="core" cmt-controller="user" cmt-action="address" action="user/address?ctype=primary" cmt-keep>
		<?php include "$themeIncludes/components/spinners/form.php"; ?>
		<div class="data-crud-form row max-cols-100">
			<div class="row">
				<div class="col col2">
					<div class="form-group">
						<label>Address 1*</label>
						<input type="text" name="Address[line1]" placeholder="Address 1" value="<?= $address->line1 ?>" />
						<span  class="error" cmt-error="Address[line1]"></span>
					</div>
				</div>
				<div class="col col2">
					<div class="form-group">
						<label>Address 2</label>
						<input type="text" name="Address[line2]" placeholder="Address 2" value="<?= $address->line2 ?>" />
						<span  class="error" cmt-error="Address[line2]"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="cmt-location-countries col col3">
					<div class="form-group">
						<label>Country *</label>
						<?= Html::dropDownList( 'Address[countryId]', $address->countryId, $countryMap, [ 'class' => 'cmt-location-country element-60 cmt-select' ] ) ?>
						<span  class="error" cmt-error="Address[countryId]"></span>
					</div>
				</div>
				<div class="cmt-location-provinces col col3" cmt-app="core" cmt-controller="region" cmt-action="optionsList" action="location/region-options" cmt-keep cmt-custom>
					<div class="form-group">
						<label><?= Yii::$app->core->provinceLabel ?> *</label>
						<?= Html::dropDownList( 'Address[provinceId]', $address->provinceId, $provinceMap, [ 'class' => 'cmt-location-province element-60 cmt-select cmt-change' ] ) ?>
						<span  class="error" cmt-error="Address[provinceId]"></span>
						<span class="hidden cmt-click"></span>
					</div>
				</div>
				<div class="cmt-location-regions col col3">
					<div class="form-group">
						<label><?= Yii::$app->core->regionLabel ?></label>
						<?= Html::dropDownList( 'Address[regionId]', $address->regionId, $regionMap, [ 'class' => 'cmt-location-region element-60 cmt-select' ] ) ?>
						<span  class="error" cmt-error="Address[regionId]"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="cmt-location-city-fill col col2 auto-fill auto-fill-basic">
					<div class="form-group">
						<label>City *</label>
						<div class="auto-fill-source" cmt-app="core" cmt-controller="city" cmt-action="autoSearch" action="location/city-search" cmt-keep cmt-custom>
							<div class="relative">
								<div class="auto-fill-search clearfix">
									<div class="frm-icon-element icon-right">
										<span class="icon cmti cmti-search"></span>
										<input target-app="location" class="cmt-key-up auto-fill-text" type="text" name="Address[cityName]" placeholder="Search City" autocomplete="off" value="<?= $address->cityName ?>" />
									</div>
								</div>
								<div class="auto-fill-items-wrap">
									<ul class="auto-fill-items vnav"></ul>
								</div>
							</div>
						</div>
						<div class="auto-fill-target">
							<input class="target" type="hidden" name="Address[cityId]" value="<?= $address->cityId ?>" />
						</div>
						<span  class="error" cmt-error="Address[cityName]"></span>
					</div>
				</div>
				<div class="col col2">
					<div class="form-group">
						<label>Postal Code</label>
						<input type="text" name="Address[zip]" placeholder="Postal Code" value="<?= $address->zip ?>" />
						<span  class="error" cmt-error="Address[zip]"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="Address[phone]" placeholder="Phone" value="<?= $address->phone ?>" />
						<span  class="error" cmt-error="Address[phone]"></span>
					</div>
				</div>
				<div class="col col2">
					<div class="form-group">
						<label>Fax</label>
						<input type="text" name="Address[fax]" placeholder="Fax" value="<?= $address->fax ?>" />
						<span  class="error" cmt-error="Address[fax]"></span>
					</div>
				</div>
			</div>
			<div>
				<input class="cmt-location-latitude" type="hidden" name="Address[latitude]" value="<?= isset( $address->latitude ) ? $address->latitude : 0 ?>" />
				<input class="cmt-location-longitude" type="hidden" name="Address[longitude]" value="<?= isset( $address->longitude ) ? $address->longitude : 0 ?>" />
				<input class="cmt-location-zoom" type="hidden" name="Address[zoomLevel]" value="<?= isset( $address->zoomLevel ) ? $address->zoomLevel : 6 ?>" />
			</div>
		</div>
		<div class="data-crud-message">
			<div class="message success"></div>
			<div class="message warning"></div>
			<div class="message error"></div>
		</div>
		<div class="data-crud-actions">
			<div class="row">
				<div class="colf colf15x7"></div>
				<div class="colf colf15"></div>
				<div class="colf colf15x7">
					<input class="frm-element-medium" type="submit" value="Update" />
				</div>
			</div>
		</div>
	</form>
</div>