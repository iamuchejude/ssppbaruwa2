<div class="form-area-header">
	<h1>Login</h1>
	<p>Fill the form below to login to your family's account</p>
</div>
<form action="<?= base_url() ?>auth/family_login" method="post">
	<?php if($this->session->flashdata('login_message') !== null) { ?>
		<p class="flashdata <?= $this->session->flashdata('login_message')['code']; ?>"><?= $this->session->flashdata('login_message')['msg']; ?></p>
	<?php } ?>
	<div class="row one clear">
		<div class="input-group">
			<label>Family Name</label>
			<input type="text" name="family_name" value="<?= set_value('family_name') ?>" required placeholder="Family Name">
		</div>
	</div>
	<div class="row one clear">
		<div class="input-group">
			<label>Passkey</label>
			<input type="password" name="family_passkey" required placeholder="Passkey">
		</div>
	</div>
	<button class="full" type="submit">Login</button>
</form>
<div class="clear" style="padding: 10px 0; text-align: center; margin-top: 30px;">
	<p>Don't have an account? <a href="<?= base_url() ?>family/register">Register now</a></p>
	<p>Forgot Password? <a href="<?= base_url() ?>family/recover">Recover</a></p>
</div>
