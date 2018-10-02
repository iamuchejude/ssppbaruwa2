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
						if($this->session->flashdata('member_edit_message') !== null) {
					?>
						<div class="alert alert-<?= $this->session->flashdata('member_edit_message')['code'] ?>">
							<?= $this->session->flashdata('member_edit_message')['msg'] ?>
						</div>
					<?php
						}
					?>
					<div class=" form">
                    	<form class="cmxform tasi-form" method="POST" action="<?= base_url() ?>family/update_member/<?= $member[0]->id ?>" novalidate="novalidate">
                            <div class="row">
								<div class="col-sm-2">
									<div class="form-group ">
										<label class="control-label">Prefix<span class="text-danger">*</span></label>
										<div>
											<select class="form-control " name="prefix">
												<option value=""></option>
												<?php
													$prefixes = array (
														'Dr' => 'Dr.',
														'Mr' => 'Mr.',
														'Mrs' => 'Mrs.',
														'Miss' => 'Miss',
														'Sir' => 'Sir',
														'Lady' => 'Lady'
													);
													foreach($prefixes as $prefix => $value) {
												?>
<option value="<?= $value ?>" <?= $member[0]->prefix == $value ? 'selected' : '' ?>><?= $prefix ?></option>
												<?php 
													} 
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group ">
										<label class="control-label">Firstname<span class="text-danger">*</span></label>
										<div>
											<input class="form-control " type="text" name="first_name" value="<?= $member[0]->first_name ?>" required="" aria-required="true">
										</div>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group ">
										<label class="control-label">Lastname<span class="text-danger">*</span></label>
										<div>
											<input class="form-control " type="text" name="last_name" value="<?= $member[0]->last_name ?>" required="" aria-required="true">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group ">
										<label class="control-label">Gender</label>
										<div>
											<select class="form-control " name="gender">
												<option value=""></option>
												<option value="Male" <?= $member[0]->gender == 'Male' ? 'selected' : '' ?>>Male</option>
												<option value="Female" <?= $member[0]->gender == 'Female' ? 'selected' : '' ?>>Female</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group ">
										<label class="control-label">Phone Number<span class="text-danger">*</span></label>
										<div>
											<input class="form-control " type="text" name="phone" value="<?= $member[0]->phone ?>" required="" aria-required="true">
										</div>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group ">
										<label class="control-label">Email Address</label>
										<div>
											<input class="form-control " type="email" name="email" value="<?= $member[0]->email ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group ">
												<label class="control-label">Day</label>
												<div>
													<input class="form-control " type="number" minlength="1" maxlength="2" name="day_of_birth" value="<?= $member[0]->day_of_birth ?>">
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group ">
												<label class="control-label">Month</label>
												<div>
													<input class="form-control " type="text" name="month_of_birth" value="<?= $member[0]->month_of_birth ?>">
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group ">
												<label class="control-label">Year</label>
												<div>
													<input class="form-control " type="number" minlength="4" maxlength="4" name="year_of_birth" value="<?= $member[0]->year_of_birth ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-sm-5">
									<div class="form-group ">
										<label class="control-label">Status</label>
										<div>
											<select class="form-control " name="status">
												<option value=""></option>
												<option value="Single" <?= $member[0]->status == 'Single' ? 'selected' : '' ?>>Single</option>
												<option value="Married" <?= $member[0]->status == 'Married' ? 'selected' : '' ?>>Married</option>
												<option value="Divorced" <?= $member[0]->status == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
											</select>
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group ">
										<label class="control-label">Baptism</label>
										<div>
											<select class="form-control " name="baptism">
												<option value=""></option>
												<option value="1" <?= json_decode($member[0]->sacraments)->baptism == 1 ? 'selected' : '' ?>>Yes</option>
												<option value="0" <?= json_decode($member[0]->sacraments)->baptism == 0 ? 'selected' : '' ?>>No</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group ">
										<label class="control-label">Confirmation</label>
										<div>
											<select class="form-control " name="confirmation">
												<option value=""></option>
												<option value="1" <?= json_decode($member[0]->sacraments)->confirmation == 1 ? 'selected' : '' ?>>Yes</option>
												<option value="0" <?= json_decode($member[0]->sacraments)->confirmation == 0 ? 'selected' : '' ?>>No</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group ">
										<label class="control-label">Holy Eucharist</label>
										<div>
											<select class="form-control " name="holy_eucharist">
												<option value=""></option>
												<option value="1" <?= json_decode($member[0]->sacraments)->holy_eucharist == 1 ? 'selected' : '' ?>>Yes</option>
												<option value="0" <?= json_decode($member[0]->sacraments)->holy_eucharist == 0 ? 'selected' : '' ?>>No</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group ">
										<label class="control-label">Matrimony</label>
										<div>
											<select class="form-control " name="matrimony">
												<option value=""></option>
												<option value="1" <?= json_decode($member[0]->sacraments)->matrimony == 1 ? 'selected' : '' ?>>Yes</option>
												<option value="0" <?= json_decode($member[0]->sacraments)->matrimony == 0 ? 'selected' : '' ?>>No</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group ">
										<label for="csoceity" class="control-label">Soceity</label>
										<div class="">
											<?php
												foreach($societies as $society) {
											?>
												<label class="cr-styled" style="margin: 3px">
													<input type="checkbox" value="<?= $society->short_name ?>" name="soceities[]">
													<i class="fa"></i> 
													<?= $society->name ?>
												</label>
											<?php
												}
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8">
									<div class="form-group ">
										<label for="cprofession" class="control-label">Profession</label>
										<div>
											<input class="form-control " type="text" name="profession" value="<?= $member[0]->profession ?>">
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
                                <button class="btn btn-success" type="submit">Update Member</button>
                                <button class="btn btn-default" type="reset">Cancel</button>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
		</div>
	</div>

</div>
