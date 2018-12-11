<?php
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
?>
<div class="data-crud">
	<div class="data-crud-title">Privacy</div>
	<div class="data-crud-form">
		<div class="row">
			<div class="col col2">
				<div class="frm-field row" cmt-app="core" cmt-controller="user" cmt-action="settings" action="user/toggle-meta?key=show_email&ctype=<?= CoreGlobal::SETTINGS_PRIVACY ?>" cmt-keep>
					<span class="cmt-switch cmt-checkbox">
						<input id="privacy_show_email" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for="privacy_show_email"></label>
						<input class="cmt-click" type="hidden" name="value" value="<?php if( isset( $privacy[ 'show_email' ] ) ) echo $privacy[ 'show_email' ]->value; ?>" />
					</span>
					<span class="inline-block padding padding-default-h">Share email</span>
				</div>
			</div>
			<div class="col col2">
				<div class="frm-field row" cmt-app="core" cmt-controller="user" cmt-action="settings" action="user/toggle-meta?key=show_mobile&ctype=<?= CoreGlobal::SETTINGS_PRIVACY ?>" cmt-keep>
					<span class="cmt-switch cmt-checkbox">
						<input id="privacy_show_mobile" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for="privacy_show_mobile"></label>
						<input class="cmt-click" type="hidden" name="value" value="<?php if( isset( $privacy[ 'show_mobile' ] ) ) echo $privacy[ 'show_mobile' ]->value; ?>" />
					</span>
					<span class="inline-block padding padding-default-h">Share mobile number</span>
				</div>
			</div>
		</div>
		<div class="filler-height filler-height-small"></div>
		<div class="row">
			<div class="col col2">
				<div class="frm-field row" cmt-app="core" cmt-controller="user" cmt-action="settings" action="user/toggle-meta?key=show_address&ctype=<?= CoreGlobal::SETTINGS_PRIVACY ?>" cmt-keep>
					<span class="cmt-switch cmt-checkbox">
						<input id="privacy_show_address" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for="privacy_show_address"></label>
						<input class="cmt-click" type="hidden" name="value" value="<?php if( isset( $privacy[ 'show_address' ] ) ) echo $privacy[ 'show_address' ]->value; ?>" />
					</span>
					<span class="inline-block padding padding-default-h">Share primary address</span>
				</div>
			</div>
		</div>
	</div>
</div>
