<div class="wraper container-fluid">
    <div class="page-title"> 
        <h3 class="title"><?= $title ?></h3> 
    </div>

	<div class="row">
        <div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Update Profile</h3></div>
				<div class="panel-body">
					<?php
						if($this->session->flashdata('update_profile_message') !== null) {
					?>
						<div class="alert alert-<?= $this->session->flashdata('update_profile_message')['code'] ?>">
							<?= $this->session->flashdata('update_profile_message')['msg'] ?>
						</div>
					<?php
						}
					?>
					<div class=" form">
                    	<form class="cmxform tasi-form" method="POST" action="<?= base_url() ?>family/update_profile" novalidate="novalidate">
                            <div class="row">
								<div class="col-sm-4">
									<div class="form-group ">
										<label class="control-label">Name<span class="text-danger">*</span></label>
										<div>
											<input class="form-control " type="text" name="name" value="<?= $this->session->name ?>" required="" aria-required="true">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group ">
										<label class="control-label">Phone Number<span class="text-danger">*</span></label>
										<div>
											<input class="form-control " type="text" name="phone" value="<?= $this->session->phone ?>" required="" aria-required="true">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group ">
										<label class="control-label">Email Address</label>
										<div>
											<input class="form-control " type="email" name="email" value="<?= $this->session->email ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group ">
										<label class="control-label">Residential Address</label>
										<div>
											<input class="form-control " type="text" name="address" value="<?= $this->session->address ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group ">
										<label class="control-label">City of Residence</label>
										<div>
											<input class="form-control " type="text" name="city" value="<?= $this->session->city ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group ">
										<label class="control-label">State of Residence</label>
										<div>
											<input class="form-control " type="text" name="state" value="<?= $this->session->state ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group ">
										<label class="control-label">Country</label>
										<div>
											<select name="country" class="form-control" value="<?= $this->session->country ?>">
												<option value="">Select</option>
												<option value="Nigeria">Nigeria</option>
												<option value="Ghana">Ghana</option>
												<option value="Togo">Togo</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group ">
										<label for="cbcc" class="control-label">Basic Christain Community</label>
										<div>
											<select name="bcc" class="form-control" value="<?= $this->session->bcc ?>">
												<option value="">Select</option>
												<option value="Unique Estate">Unique Estate</option>
												<option value="Two Storey">Two Storey</option>
												<option value="Peace Estate">Peace Estate</option>
												<option value="New London">New London</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group ">
										<label for="cnationality" class="control-label">Nationality</label>
										<div>
											<input class="form-control " type="text" name="nationality" value="<?= $this->session->nationality ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group ">
										<label for="csoo" class="control-label">State of Origin</label>
										<div>
											<input class="form-control " type="text" name="state_of_origin" value="<?= $this->session->state_of_origin ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group ">
										<label for="lga" class="control-label">Local Government Area</label>
										<div>
											<input class="form-control " type="text" name="lga" value="<?= $this->session->lga ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group ">
										<label for="cphoto" class="control-label">Photo</label>
										<div>
											<input class="form-control " type="file" name="photo">
										</div>
									</div>
								</div>
							</div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update Profile</button>
                                <button class="btn btn-default" type="reset">Cancel</button>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Update Passkey</h3></div>
				<div class="panel-body">
					<?php
						if($this->session->flashdata('update_passkey_message') !== null) {
					?>
						<div class="alert alert-<?= $this->session->flashdata('update_passkey_message')['code'] ?>">
							<?= $this->session->flashdata('update_passkey_message')['msg'] ?>
						</div>
					<?php
						}
					?>
					<div class=" form">
                    	<form class="cmxform tasi-form" method="POST" action="<?= base_url() ?>family/update_passkey" novalidate="novalidate">
                            <div class="row">
								<div class="col-sm-6">
									<div class="form-group ">
										<label for="current_passkey" class="control-label">Current Passkey<span class="text-danger">*</span></label>
										<div>
											<input class=" form-control" id="ccurpass" name="current_passkey" type="passkey" required="" aria-required="true">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group ">
										<label for="new_passkey" class="control-label">New Passskey<span class="text-danger">*</span></label>
										<div>
											<input class="form-control " id="cnewpass" type="passkey" name="new_passkey" required="" aria-required="true">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group ">
										<label for="re_new_passkey" class="control-label">Re-enter New Passkey<span class="text-danger">*</span></label>
										<div>
											<input class="form-control " id="crenewpass" type="passkey" name="re_new_passkey" required>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group ">
										<label for="security_question" class="control-label">Security Question (2 + 2)<span class="text-danger">*</span></label>
										<div>
											<input class="form-control " type="number" name="security_question" required="" aria-required="true">
										</div>
									</div>
								</div>
							</div>
                            <div class="form-group">
                                <div>
                                    <button class="btn btn-success" type="submit">Update Passkey</button>
                                    <button class="btn btn-default" type="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div> 
