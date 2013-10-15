<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo SITE_NAME . ' - ' . $title; ?></title>
<link href="<?php echo BASE_URL ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL ?>css/custom.css" rel="stylesheet" type="text/css" />
        <?php getCss(); ?>   

        <?php getJs(); ?>
        <script type="text/javascript">
            var baseurl = '<?php echo BASE_URL; ?>';
        </script>
    </head>

    <body>
        <div class="container">
<?php echo $viewcontent?>
        </div>
    </body>
</html>