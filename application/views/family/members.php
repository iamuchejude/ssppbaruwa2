<div class="wraper container-fluid">
    <div class="page-title"> 
        <h3 class="title"><?= $title ?></h3> 
    </div>

	<div class="row">
        <div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Showing all Members</h3></div>
				<div class="panel-body table-rep-plugin">
					<?php
						if($this->session->flashdata('delete_member_message') !== null) {
					?>
						<div class="alert alert-<?= $this->session->flashdata('delete_member_message')['code'] ?>">
							<?= $this->session->flashdata('delete_member_message')['msg'] ?>
						</div>
					<?php
						}
					?>
					<div class="table-responsive" data-pattern="priority-columns">
						<table id="tech-companies-1" class="table  table-striped">
							<thead>
								<tr>
									<th><center>SN</center></th>
									<th>Prefix</th>
									<th data-priority="1">Firstname</th>
									<th data-priority="3">Lastname</th>
									<th data-priority="1">Gender</th>
									<th data-priority="6">Date of Birth</th>
									<th data-priority="3">Email</th>
									<th data-priority="6">Phone Number</th>
									<th data-priority="6">Status</th>
									<th data-priority="6">Date Created</th>
									<th data-priority="6">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(count($members) >= 1) {
										for($i=0; $i<count($members); $i++) {
											if($members[$i]->status == 'Single') {
												$class = 'info';
											} elseif($members[$i]->status == 'Married') {
												$class = 'success';
											} elseif($members[$i]->status == 'Divorced') {
												$class = 'danger';
											} else {
												$class = 'warning';
											}
								?>
									<tr>
										<td><center><?= $i+1 ?></center></td>
										<th><?= $members[$i]->prefix; ?></th>
										<th><?= $members[$i]->first_name; ?></th>
										<td><?= $members[$i]->last_name; ?></td>
										<td><?= $members[$i]->gender; ?></td>
										<td style="min-width: 150px;">
											<?= $members[$i]->day_of_birth; ?> 
											<?= $members[$i]->month_of_birth; ?>,
											<?= $members[$i]->year_of_birth; ?>
										</td>
										<td><?= $members[$i]->email; ?></td>
										<td style="min-width: 150px;"><?= $members[$i]->phone; ?></td>
										<td><span class="label label-<?= $class ?>"><?= $members[$i]->status; ?></span></td>
										<td style="min-width: 150px;"><?= date('d M, Y', $members[$i]->created_at); ?></td>
										<td style="min-width: 300px">
											<button data-mid="<?= $i+1 ?>" data-target="#con-view-modal" data-ctoggle="modal" data-toggle="modal" class="btn btn-info btn-rounded btn-sm m-b-5 w-xs"><i class="fa fa-eye"></i> View</button>
											<a href="edit_member/<?= $i+1 ?>"><button class="btn btn-warning btn-rounded btn-sm m-b-5 w-xs"><i class="fa fa-edit"></i> Edit</button></a>
											<a href="delete_member/<?= $i+1 ?>"><button class="btn btn-danger btn-rounded btn-sm m-b-5 w-xs"><i class="fa fa-trash"></i> Delete</button></a>
										</td>  
									</tr>
								<?php
										}
									} else {

									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </div>
	</div> 

	<!-- Modals -->
	<div id="con-view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h4 class="modal-title">View Member</h4> 
				</div> 
				<div class="modal-body" id="view_content"></div>
			</div>
		</div>
	</div>
	
</div>
