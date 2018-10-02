<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $page_title ?></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/custoom/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
	<header class="clear" id="home">
		<div class="container">
			<div class="left logo">
				<a href="#">
					<img src="https://upload.wikimedia.org/wikipedia/commons/5/5a/NEW_DREAMS_LOGO.png" alt="SSPP LOGO">
				</a>
			</div>
			<div class="right nav">
				<nav>
					<ul>
						<li><a href="javascript:void(0)" id="#home" class="menu">Home</a></li>
						<li><a href="javascript:void(0)" id="#about" class="menu">About</a></li>
						<li><a href="javascript:void(0)" id="#activities" class="menu">Activities</a></li>
						<!-- <li><a href="javascript:void(0)">Gallery</a></li> -->
						<li><a href="https://ssppbaruwa.blogspot.com" target="_blank">Blog</a></li>
						<li><a href="javascript:void(0)" id="#contact" class="menu">Contact</a></li>	
					</ul>
				</nav>
				<div class="header-btn">
					<a href="javascript:void(0)" id="navToggle"><button class="btn btn-sm btn-default"><i class="fa fa-navicon"></i></button><a>
					<a href="<?= base_url() ?>family"><button class="btn btn-sm btn-default login">Login</button></a>
				</div>
			</div>
		</div>
	</header>
