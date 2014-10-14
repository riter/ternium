<!DOCTYPE html>

    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title_page; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/styles.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery.fs.selecter.css">
        <script src="<?php echo $this->webroot; ?>js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- <script src="<?php echo $this->webroot; ?>js/vendor/jquery-1.11.0.min.js"></script> -->
        <script src="<?php echo $this->webroot; ?>js/jquery.js"></script>
        <script src="<?php echo $this->webroot; ?>js/Jqueryvalidation.js"></script>
        
        
    </head>
    <body>
        <section class="content-privado" id="content">
                 <?php echo $this->fetch('content'); ?>  
        </section>        
    </body>
</html>
