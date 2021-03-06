<!DOCTYPE html>
<!-- saved from url=(0054)http://twitter.github.io/bootstrap/examples/fluid.html -->
<html lang="en"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Dealer2Dealer</title>
        <link href="<?php echo BASE_URL ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL ?>css/custom.css" rel="stylesheet" type="text/css" />
        <?php getCss(); ?>   
        <script type="text/javascript" src="<?php echo BASE_URL ?>js/jquery.js"></script>
        <?php getJs(); ?>
        <script type="text/javascript">
            var baseurl = '<?php echo BASE_URL; ?>';
        </script>
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>


        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]--> 
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="<?php echo ''; ?>">Dealer2Dealer</a>
                    <p class="navbar-text pull-right">
                        <a href="<?php echo BASE_URL ?>site/logout" class="navbar-link">Logout</a>
                    </p>
                    <div class="nav-collapse collapse">


                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header">Admin</li>
                            <li ><a href="<?php echo BASE_URL ?>user">Manage Users</a>
                                <ul class="nav nav-list">  
                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>user/unregistereduser">Un-Registered Users</a></li>
                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>user/adduser">Add Un-Registered User</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo BASE_URL ?>manage/banner">Manage Banners</a>
                                <ul class="nav nav-list">                           
                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>manage/addbanner">Add Banner</a></li>
                                </ul>

                            </li>

                            <li ><a href="<?php echo BASE_URL ?>manage/package">Manage Package</a>
                                <ul class="nav nav-list">                           
                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>manage/addpackage">Add Package</a></li>
                                </ul>
                            </li>
                            <li ><a href="<?php echo BASE_URL ?>city/manage">Manage Cities</a>
                                <ul class="nav nav-list">                           
                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>city/addcity">Add City</a></li>
                                </ul>
                            </li>
                            <li ><a href="<?php echo BASE_URL ?>area/manage">Manage Areas</a>
                                <ul class="nav nav-list">                           
                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>area/addarea">Add Area</a></li>
                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>area/approve">Approve Area</a></li>
                                </ul>
                            </li>
                            <li ><a href="<?php echo BASE_URL ?>manage/package">Change Password</a>

                            </li>
                            <li ><a href="<?php echo BASE_URL ?>microsite/manage">Manage Microsites</a>
                                <ul class="nav nav-list">                           
                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>microsite/add">Add Microsite</a></li>
<!--                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>project/approve">Approve Area</a></li>-->
                                </ul>
                            </li>
                            <li ><a href="<?php echo BASE_URL ?>project/manage">Manage Project</a>
                                <ul class="nav nav-list">                           
                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>project/add">Add Project</a></li>
<!--                                    <li><a style="font-size:12px;" href="<?php echo BASE_URL ?>project/approve">Approve Area</a></li>-->
                                </ul>
                            </li>


                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->
                <div class="span9">

                    <?php echo $viewcontent ?>
                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>© Company 2013</p>
            </footer>

        </div><!--/.fluid-container-->
    </body></html>