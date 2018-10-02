<div class="form-area-header">
	<h1>Create an account</h1>
	<p>Fill the form below to create an account for your family</p>
</div>
<form action="<?= base_url() ?>auth/family_register" method="post">
	<?php if($this->session->flashdata('register_message') !== null) { ?>
		<p class="flashdata clear <?= $this->session->flashdata('register_message')['code']; ?>"><?= $this->session->flashdata('register_message')['msg']; ?></p>
	<?php } ?>
	<div class="row two clear">
		<div class="input-group">
			<label>Family Name</label>
			<input type="text" name="name" required placeholder="Family Name">
		</div>
		<div class="input-group">
			<label>Phone Number</label>
			<input type="text" name="phone" required placeholder="Phone Number">
		</div>
	</div>
	<div class="row one clear">
		<div class="input-group">
			<label>Residential Address</label>
			<input type="text" name="address" required placeholder="Residential Address">
		</div>
	</div>
	<div class="row three clear">
		<div class="input-group">
			<label>City</label>
			<input type="text" name="city" required placeholder="City">
		</div>
		<div class="input-group">
			<label>State</label>
			<input type="text" name="state" required placeholder="State">
		</div>
		<div class="input-group">
			<label>Country</label>
			<select name="country" required value="<?= $this->session->country ?>">
				<option value="">Select</option>
				<option value="Nigeria">Nigeria</option>
				<option value="Ghana">Ghana</option>
				<option value="Togo">Togo</option>
			</select>
		</div>
	</div>
	<div class="row two clear">
		<div class="input-group">
			<label>Passkey</label>
			<input type="password" name="passkey" required placeholder="Passkey">
		</div>
		<div class="input-group">
			<label>Passkey</label>
			<input type="password" name="verify_passkey" required placeholder="Passkey">
		</div>
	</div>
	<button class="full" type="submit">Register</button>
</form>
<div class="clear" style="padding: 10px 0; text-align: center; margin-top: 30px;">
	<p>Already have an account? <a href="<?= base_url() ?>family/login">Login now</a></p>
</div>
