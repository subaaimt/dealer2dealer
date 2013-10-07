<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo SITE_NAME . ' - ' . $title; ?></title>
        <link rel="stylesheet" href="<?php echo BASE_URL ?>css/bootstrap.css">
        <?php getCss(); ?>
        <script src="<?php echo BASE_URL ?>js/jquery.js"></script>
        <script src="<?php echo BASE_URL ?>js/bootstrap.js"></script>
        <?php getJs(); ?>
        <script type="text/javascript">
            var baseurl = '<?php echo BASE_URL; ?>';
        </script>
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
                    <a class="brand" href="#">Dealer2Dealer</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            Logged in as <a href="#" class="navbar-link">Username</a>
                        </p>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list" style="margin-top: 24px">
                            <li class="nav-header">My Menu</li>
                            <li class=""><a href="#">Add Property</a></li>
                            <li class=""><a href="<?php echo BASE_URL ?>user/properties">Manage  Property</a></li>
                            <li class=""><a href="<?php echo BASE_URL ?>user/myaccount">My Account</a></li>
                            <li class=""><a href="<?php echo BASE_URL ?>user/changepassword">Change Password</a></li>
                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->
                <div class="span9">
                    <?php echo $viewcontent; ?>
                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; Company 2013</p>
            </footer>

        </div><!--/.fluid-container-->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->


    </body>
</html>
