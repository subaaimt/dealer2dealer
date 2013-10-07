<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo SITE_NAME.' - '.$title; ?></title>
        <link rel="stylesheet" href="<?php echo BASE_URL ?>css/bootstrap.css">
        <?php getCss(); ?>
        <script src="<?php echo BASE_URL ?>js/jquery.js"></script>
        <script src="<?php echo BASE_URL ?>js/bootstrap.js"></script>
        <?php getJs(); ?>
        <script type="text/javascript">
            var baseurl = '<?php echo BASE_URL;?>';
        </script>
    </head>
    <body>
<div class="container">
   
        <?php echo $viewcontent; ?>
   
  </div>
    </body>
</html>


