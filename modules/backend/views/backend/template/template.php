<?php echo View::factory('backend/template/top') ?>
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">APP<b>Market</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                            <span class="hidden-xs"><?php echo $admin['username'] ? $admin['username'] : 'Admin'  ?></span>&nbsp;<i class="fa fa-sort-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header" style="height:80px;background-color: #888">
<!--                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->

                                <p>
                                    <?php echo isset($admin['username']) ? $admin['username'] : 'Admin'  ?> - <?php echo isset($admin['role_name']) ? $admin['role_name'] : 'Administrator'?>
                                    <small>注册于 <?php echo isset($admin['created']) ? date('Y-m-d',$admin['created']) : '2016-05-07'?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
<!--                            <li class="user-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-xs-4 text-center">-->
<!--                                        <a href="#">Followers</a>-->
<!--                                    </div>-->
<!--                                    <div class="col-xs-4 text-center">-->
<!--                                        <a href="#">Sales</a>-->
<!--                                    </div>-->
<!--                                    <div class="col-xs-4 text-center">-->
<!--                                        <a href="#">Friends</a>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <!-- /.row -->
<!--                            </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a id="changepwd" class="btn btn-default btn-flat">修改密码</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo URL::base(TRUE); ?>backend/auth/logout" class="btn btn-default btn-flat">登 出</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo View::factory('backend/template/leftsidebar')->bind('config', $config) ?>

    <?php echo View::factory('backend/template/content_header') ?>
    <?php echo isset($content) ? $content : null; ?>
    <?php echo View::factory('backend/template/content_footer') ?>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="#">Mozic</a>.</strong> All rights
        reserved.
    </footer>

</div>
<?php echo View::factory('backend/template/bottom')->set(['controller'=>$controller,'action'=>$action]) ?>