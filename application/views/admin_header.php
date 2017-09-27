<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>TubeTnr</title>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="<?php echo base_url('assets/js/audio.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/wavesurfer.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/drawer.js') ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/drawer.canvas.js') ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/webaudio.js') ?>"></script>
		
       
		

		<!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
       	<link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/inner.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/TableTools.css') ?>" rel="stylesheet">
        
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="<?php echo base_url('assets/js/html5shiv.js') ?>">
			</script>
			<script src="<?php echo base_url('assets/js/respond.min.js') ?>">
			</script>
		<![endif]-->
		<!-- Custom styles for this template -->
		
	</head>
	<!-- NAVBAR==================================================-->
	<body>
		<div id="wrap">
			<div class="navbar navbar-default navbar-static-top ">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar">
							</span>
							<span class="icon-bar">
						</span>
							<span class="icon-bar">
							</span>
						</button>
						<a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="http://d1qmd9efinvdgo.cloudfront.net/img/logo_tube.png" style="margin-top: -6px;margin-right: 6px;width: 25px;"><img src="http://d1qmd9efinvdgo.cloudfront.net/img/logo2.png" style="width:100px;"/></a>
					</div>
                    <?php
                    if($this->tank_auth->is_admin())
                    {
                    ?>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-LEFT">
                                                        <li>
								<a href="<?php echo site_url('user') ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-user"></span> Users</a>
							</li>
                        	<li>
								<a href="<?php echo site_url('videos') ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-facetime-video"></span> Videos</a>
							</li>
							<li>
                                <a href="<?php echo site_url('clips') ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-film"></span> Video Clips</a>
							</li>
							<li>
								<a href="<?php echo site_url('all_audios') ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-headphones"></span> Audios</a>
							</li>
							<li>
								<a href="<?php echo site_url('audios') ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-volume-up"></span> Audio Clips</a>
							</li>

							<li>
								<a href="<?php echo site_url('requests') ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> Requests</a>
							</li>
                           
							
						</ul>
						<ul class="nav navbar-nav navbar-right">
                             <li>
								<a href="<?php echo site_url('settings') ?>" style="color:#333;">Hi <?php echo $username; ?>!</a>
							</li>
                             <li class="dropdown">
				                <a href="#" class="dropdown-toggle btn btn-default btn-xs" data-toggle="dropdown" ><span class="glyphicon glyphicon-list"></span> </a>
				                <ul class="dropdown-menu">
				                  <li><a href="<?php echo site_url('settings') ?>">Account Settings</a></li>
				                  <li><a href="<?php echo site_url('staff') ?>">Manage Staff</a></li>
				                  <li><a href="<?php echo site_url('auth/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				                </ul>
				              </li>                          
						</ul>
					</div>
                    <?php
                    }
                    else
                    {
                    ?>
                   <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-LEFT">
                                                       
                            <li>
							    <a href="<?php echo site_url('clips') ?>"><span class="glyphicon glyphicon-film"></span> Clips</a>
							</li>
							<li>
								<a href="<?php echo site_url('requests') ?>"><span class="glyphicon glyphicon-edit"></span> Requests</a>
							</li>
                           
							
						</ul>
						<ul class="nav navbar-nav navbar-right">
                             <li>
								<a href="<?php echo site_url('settings') ?>">Hi <?php echo $username; ?>!</a>
							</li>
                             <li class="dropdown">
				                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list"></span> </a>
				                <ul class="dropdown-menu">
				                  <li><a href="<?php echo site_url('settings') ?>">Account Settings</a></li>
				                  <li><a href="<?php echo site_url('auth/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				                </ul>
				              </li>                          
						</ul>
					</div>
                    
                    <?php
                    }
                    ?>
					<!--/.nav-collapse -->
				</div>
			</div>