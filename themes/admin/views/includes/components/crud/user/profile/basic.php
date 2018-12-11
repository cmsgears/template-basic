<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\files\widgets\AvatarUploader;
?>
<div class="data-crud">
	<div class="data-crud-title">Basic</div>
	<form class="form" cmt-app="core" cmt-controller="user" cmt-action="profile" action="user/profile" cmt-keep>
		<?php include "$themeIncludes/components/spinners/form.php"; ?>
		<div class="data-crud-form">
			<div class="row">
				<div class="colf colf15x7">
					<?= AvatarUploader::widget([
						'model' => $avatar,
						'clearAction' => true, 'clearActionUrl' => "user/clear-avatar?id=$model->id",
						'cmtController' => 'user', 'cmtClearAction' => 'clearAvatar',
						'info' => true, 'fields' => false, 'dragger' => true
					])?>
				</div>
				<div class="colf colf15"></div>
				<div class="colf colf15x7">
					<div class="form-group">
						<label>First Name *</label>
						<input type="text" name="User[firstName]" placeholder="First Name" value="<?= $model->firstName ?>" />
						<span  class="error" cmt-error="User[firstName]"></span>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="User[lastName]" placeholder="Last Name" value="<?= $model->lastName ?>" />
						<span  class="error" cmt-error="User[lastName]"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="colf colf15x7">
					<div class="form-group">
						<label>Email *</label>
						<?php if( !$coreProperties->isChangeEmail() ) { ?>
							<input type="text" name="User[email]" placeholder="Email" value="<?= $model->email ?>" readonly />
						<?php } else { ?>
							<input type="text" name="User[email]" placeholder="Email" value="<?= $model->email ?>" />
						<?php } ?>
						<span class="error" cmt-error="User[email]"></span>
					</div>
				</div>
				<div class="colf colf15"></div>
				<div class="colf colf15x7">
					<div class="form-group">
						<label>Username *</label>
						<?php if( !$coreProperties->isChangeUsername() ) { ?>
							<input type="text" name="User[username]" placeholder="Username" value="<?= $model->username ?>" readonly />
						<?php } else { ?>
							<input type="text" name="User[username]" placeholder="Username" value="<?= $model->username ?>" />
						<?php } ?>
						<span  class="error" cmt-error="User[username]"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="colf colf15x7">
					<div class="form-group">
						<label>Date of Birth</label>
						<div class="frm-icon-element icon-right">
							<span class="icon cmti cmti-calendar"></span>
							<input type="text" name="User[dob]" placeholder="Date of Birth" value="<?= $model->dob ?>" class="datepicker" />
						</div>
						<span  class="error" cmt-error="User[dob]"></span>
					</div>
				</div>
				<div class="colf colf15"></div>
				<div class="colf colf15x7">
					<div class="form-group">
						<label>Gender</label>
						<?= Html::dropDownList( 'User[genderId]', $model->genderId, $genderMap, [ 'class' => 'element-60 cmt-select' ] ); ?>
						<span  class="error" cmt-error="User[genderId]"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="colf colf15x7">
					<div class="form-group">
						<label>Mobile Number</label>
						<input type="text" name="User[mobile]" placeholder="Mobile Number" value="<?= $model->mobile ?>" />
						<span  class="error" cmt-error="User[mobile]"></span>
					</div>
				</div>
				<div class="colf colf15"></div>
				<div class="colf colf15x7">
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="User[phone]" placeholder="Phone" value="<?= $model->phone ?>" />
						<span  class="error" cmt-error="User[phone]"></span>
					</div>
				</div>
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
