<div class="data-crud">
	<div class="data-crud-title">Change Password</div>
	<form class="form" cmt-app="core" cmt-controller="user" cmt-action="account" action="user/account">
		<?php include "$themeIncludes/components/spinners/form.php"; ?>
		<div class="data-crud-form">
			<div class="row">
				<div class="col col3 hidden-easy">
					<div class="form-group">
						<label>Old Password *</label>
						<input type="password" name="ResetPassword[oldPassword]" placeholder="Old Password" />
						<span  class="error" cmt-error="ResetPassword[oldPassword]"></span>
					</div>
				</div>
				<div class="col col3">
					<div class="form-group">
						<label>Password *</label>
						<input type="password" name="ResetPassword[password]" placeholder="Password" />
						<span  class="error" cmt-error="ResetPassword[password]"></span>
					</div>
				</div>
				<div class="col col3">
					<div class="form-group">
						<label>Repeat Password *</label>
						<input type="password" name="ResetPassword[password_repeat]" placeholder="Repeat Password" />
						<span  class="error" cmt-error="ResetPassword[password_repeat]"></span>
					</div>
				</div>
			</div>
		</div>
		<div>
			<input type="hidden" name="ResetPassword[email]" value="<?= $user->email ?>" />
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
		</div>
	</form>
</div>
