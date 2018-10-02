<link href="<?= base_url() ?>assets/velonic/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/velonic/css/bootstrap-reset.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/velonic/css/style.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/velonic/css/helper.css" rel="stylesheet">
<div class="row"> 
	<div class="col-md-3">
		<div class="form-group"> 
			<img src="<?= base_url() ?>uploads/img/member/<?= $member[0]->photo ?>" alt="Member Photo" class="img-responsive">
		</div>
	</div> 
	<div class="col-md-8">
		<div class="col-md-4">
			<div class="form-group"> 
				<label class="control-label">Prefix</label> <br>
				<?= $member[0]->prefix ?>
			</div>
		</div>
		<div class="col-md-8"> 
			<div class="form-group">
				<label class="control-label">Firstname</label> <br>
				<?= $member[0]->first_name ?>
			</div>
		</div> 
		<div class="col-md-6"> 
			<div class="form-group">
				<label class="control-label">Lastname</label> <br>
				<?= $member[0]->last_name ?>
			</div>
		</div>
		<div class="col-md-6"> 
			<div class="form-group">
				<label class="control-label">Date of Birth</label> <br>
				<?= $member[0]->day_of_birth; ?> 
				<?= $member[0]->month_of_birth; ?>,
				<?= $member[0]->year_of_birth; ?>
			</div>
		</div> 
	</div>
</div> 
<div class="row">
	<div class="col-md-4">
		<div class="form-group"> 
			<label class="control-label">Gender</label> <br>
			<?= $member[0]->gender ?>
		</div>
	</div> 
	<div class="col-md-4"> 
		<div class="form-group">
			<label class="control-label">Phone</label> <br>
			<?= $member[0]->phone ?>
		</div>
	</div>
	<div class="col-md-4"> 
		<div class="form-group">
			<label class="control-label">Email</label> <br>
			<?= $member[0]->email ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"> 
			<label class="control-label">Gender</label> <br>
			<?= $member[0]->profession ?>
		</div>
	</div> 
	<div class="col-md-4"> 
		<div class="form-group">
			<label class="control-label">Phone</label> <br>
			<?= $member[0]->status ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group"> 
			<label class="control-label">Soceity(ies)</label> <br>
			<?php
				echo $member[0]->soceity;
			?>
		</div>
	</div>
</div>

<div class="modal-footer"> 
    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button> 
    <a href="edit_member/<?= $member[0]->id ?>">
		<button type="button" class="btn btn-warning">Edit</button> 
	</a>
</div>
