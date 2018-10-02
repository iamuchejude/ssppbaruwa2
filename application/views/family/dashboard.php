<div class="wraper container-fluid">
    <div class="page-title"> 
		<h3 class="title">Welcome, <?= ucfirst($this->session->name); ?>!</h3>
    </div>
	
    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <div class="widget-panel widget-style-2 white-bg">
                <i class="ion-person-stalker text-pink"></i> 
                <h2 class="m-0 counter"><?= $totalFamily ?></h2>
                <div>Members</div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="widget-panel widget-style-2 white-bg">
                <i class="ion-male text-purple"></i> 
                <h2 class="m-0 counter"><?= $totalMale ?></h2>
                <div>Males</div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="widget-panel widget-style-2 white-bg">
                <i class="ion-female text-info"></i> 
                <h2 class="m-0 counter"><?= $totalFemale ?></h2>
                <div>Females</div>
            </div>
        </div>
    </div> <!-- end row -->
</div>
