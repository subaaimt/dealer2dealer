<html>
    <head>
        <title> DEALS 2 DEALERS </title>
        <link href="<?php echo BASE_URL ?>css/bootstrap_custom.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo BASE_URL ?>css/dealer.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="css/jqueryslidemenu.css" />

        <?php getCss(); ?>

        <link rel="stylesheet" type="text/css" href="css/elastislide.css" />

        <script type="text/javascript" src="<?php echo BASE_URL ?>js/jquery.js"></script>
        <script src="<?php echo BASE_URL ?>js/bootstrap.js"></script>
        <script src="<?php echo BASE_URL ?>js/jcarousellite_1.0.1.js"></script>
        <?php getJs(); ?>
        <script type="text/javascript">
            var baseurl = '<?php echo BASE_URL; ?>';
        </script>
    </head>

    <body>
        <div class="container">

            <?php include_once('views/layout/elements/header_dealer.php'); ?>

            <div class="main">

                <div>
                    <?php include_once('views/layout/elements/dealer_menu.php'); ?>
                </div>




                <div class="maincontent"> 
                    <div class="sidebar_left">

                        <div>
                            <?php include_once('views/layout/elements/regions.php'); ?>
                        </div>
                    </div>



                    <div class="content">


                        <?php echo $viewcontent; ?>


                    </div>





                </div>

            </div>

            <div class="footer_container">
                <?php include_once('views/layout/elements/footer_dealer.php'); ?>
            </div>

            <div class="copyright">Copyright &copy; 2013 <a href=""> Deals 2 Dealers </a> - All Rights Reserved. </div>
        </div>
        <script>
            $(function() {
                $(".right_image").jCarouselLite({
                    vertical: true,
                    auto: 2000

                });
                $(".leftslider").jCarouselLite({
                    vertical: true,
                    auto: 2000

                });
            });
        </script>

    </body>
</html>