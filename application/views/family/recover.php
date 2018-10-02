<div class="form-area-header">
	<h1>Recover Password</h1>
	<p>Fill the form below to recover your family's account</p>
</div>
<form action="<?= base_url() ?>auth/family_recover" method="post">
	<?php if($this->session->flashdata('recover_message') !== null) { ?>
		<p class="flashdata <?= $this->session->flashdata('recover_message')['code']; ?>"><?= $this->session->flashdata('recover_message')['msg']; ?></p>
	<?php } ?>
	<div class="row one clear">
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?= set_value('family_email') ?>" required placeholder="Family Email">
		</div>
	</div>
	<button class="full" type="submit">Continue</button>
</form>
<div class="clear" style="padding: 10px 0; text-align: center; margin-top: 30px;">
	<p>Already have an account? <a href="<?= base_url() ?>family/login">Login now</a></p>
	<p>Don't have an account? <a href="<?= base_url() ?>family/register">Register now</a></p>
</div>
