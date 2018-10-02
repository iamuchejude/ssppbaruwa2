        
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="active"><a href="<?= base_url() ?>family/dashboard"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a></li>
                    <li class="has-submenu"><a href="javascript:void(0)"><i class="ion-person-stalker"></i> <span class="nav-label">Members</span><span class="badge bg-danger"><?= $totalFamily ?></span></a>
                        <ul class="list-unstyled">
                            <li><a href="<?= base_url() ?>family/members">All Members</a></li>
                            <li><a href="<?= base_url() ?>family/add_member">Add Member</a></li>
                        </ul>
					</li>
                    <li><a href="<?= base_url() ?>family/settings"><i class="ion-gear-b"></i> <span class="nav-label">Settings</span></a></li>					
                </ul>
            </nav>
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				                
                <!-- Left navbar -->
                <nav class=" navbar-default" role="navigation">
                    <!-- Right navbar -->
                    <ul class="nav navbar-nav navbar-right top-menu top-right-menu">  
                        <!-- user login dropdown start-->
                        <li class="dropdown text-center">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                <img alt="Family Photo" src="<?= base_url() ?>uploads/img/family/<?= $this->session->photo ?>" class="img-circle profile-img thumb-sm">
                                <span class="username"><?= ucfirst($this->session->name); ?> </span> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                                <li><a href="<?= base_url() ?>family/settings"><i class="fa fa-cog"></i> Settings</a></li>
                                <li><a href="<?= base_url() ?>family/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->       
                    </ul>
                    <!-- End right navbar -->
                </nav>
                
            </header>
            <!-- Header Ends -->
