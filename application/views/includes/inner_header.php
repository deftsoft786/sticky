<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>sticky discounts | <?php echo @$title; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Datatable style -->
        <link href="<?php echo base_url('assets/css/inner.css') ?>" rel="stylesheet" type="text/css" />
        <!--jquery ui-->
        <link href="<?php echo base_url('assets/css/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css" />
       <!--dropzone for image upload-->
        <link href="<?php echo base_url('assets/css/dropzone.css') ?>" rel="stylesheet" type="text/css" />
       <!--datetimepicker-->
        <link href="<?php echo base_url('assets/css/jquery.datetimepicker.css') ?>" rel="stylesheet" type="text/css" />
       

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery 1.10.2 -->
        <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
        
    </head>
    
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo site_url('dashboard'); ?>" class="logo">
               <img src="<?php echo base_url('assets/images/stick.png'); ?>" style="width: 170px;" />
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <?php
                        $usernameArr = explode('*', $admin_data["username"]);
                        if ($admin_data["role"] == 1)
                            $role_name = 'Administrator';
                        if ($admin_data["role"] == 2)
                            $role_name = 'Reviewer';
                        if($admin_data["role"] == 3)
                             $role_name = 'Store Owner';
                        
                        ?>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo htmlentities($usernameArr[0]) ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">

                                    <p>
                                        <?php echo htmlentities($usernameArr[1]) ?> <?php echo htmlentities($usernameArr[2]) ?> - <?php echo $role_name; ?>
                                        <small> Last Login: <?php echo date('M-d-Y H:i:s', strtotime($usernameArr[3])) ?> </small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('settings') ?>" class="btn btn-default btn-flat">Settings</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo site_url('dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                            <!----------------------------For admin and moderatore------------------------------------------------------------->
                            <?php if($this->tank_auth->is_admin() || $this->tank_auth->is_mod()){ ?>
                            <li>
                                <a href="<?php echo site_url('store'); ?>">
                                    <i class="fa fa-university"></i> <span>Store Owners</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('regions'); ?>">
                                    <i class="fa fa-map-marker"></i> <span>Regions</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('sub_regions'); ?>">
                                    <i class="fa fa-pie-chart"></i> <span> Sub Regions</span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo site_url('product_categories'); ?>">
                                    <i class="fa fa-cubes"></i> <span> Product Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('user'); ?>">
                                    <i class="fa fa-users"></i> <span>Users</span>
                                </a>
                            </li> 
                              <li>
                                <a href="<?php echo site_url('homepage_settings'); ?>">
                                    <i class="fa fa-cog"></i> <span>Homepage Settings</span>
                                </a>
                            </li>                            
                           <li>
                                <a href="<?php echo site_url('comments'); ?>">
                                    <i class="fa fa-comments"></i> <span>Reviews</span>
                                    <small class="badge pull-right bg-red" id="pending_approval_count_comment"></small>
                                </a>
                            </li>
                            
                             
                         <?php
                            if ($admin_data["role"] == 1) {
                            ?>
                            <li>
                                <a href="<?php echo site_url('staff'); ?>">
                                    <i class="fa fa-user"></i> <span>Staff</span>
                                </a>
                            </li>
                           <?php 
                            }
                            ?> 
                             
<?php } elseif($this->tank_auth->is_store_owner()){ ?>
<!----------------------------For store owner------------------------------------------------------------->
                        <li>
                            <a href="<?php echo site_url('manage_stores'); ?>">
                                <i class="fa fa-home"></i><span>Manage Stores</span>
                            </a>
                        </li>
                        

<?php } ?>
                        <li>
                            <a href="<?php echo site_url('settings'); ?>">
                                <i class="fa fa-cogs"></i> <span>Settings</span>
                            </a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('auth/logout'); ?>">
                                <i class="fa fa-power-off"></i> <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>