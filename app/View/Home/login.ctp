<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Steel Frame Calculator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/styles.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery.fs.selecter.css">
        <script src="<?php echo $this->webroot; ?>js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/vendor/jquery-1.11.0.min.js"></script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section>
            <div class="wrapper">
                <div class="login">
                    <div class="logo">
                        <img src="<?php echo $this->webroot; ?>img/logo-steelframe.png" alt="loraxian">
                    </div>
                         <h2>Steel Frame Calculator </h2> 

                    <?php
                    if(isset($login_error))
                        if($login_error == '1') $error= 'style="display: inline;"'; else  $error= 'style="display: none;"'; 
                    else
                        $error= 'style="display: none;"';
                    ?>
                    <span class="error" <?php echo $error; ?> ><!--Incorrect user/pass, please try again.-->
                                 Incorrecto Usuario/contraseña, por favor intente de nuevo. 
                    </span>
                    <!--
                    <form action="">
                        <ul>
                           <li><input class="username" type="text" placeholder="Username"></li>
                           <li><input class="password" type="password" placeholder="Password"></li>
                           <li><a href="reset_password.html">Forgot your password?</a></li>
                           <li><input type="submit" value="Login"></li>
                        </ul>
                    </form>
                    -->
                    <?php  echo $this->Form->create('User', array(                  
                        'inputDefaults' => array(
                            'label' => false,
                            'div' => false,
                            'id' => false,
                            'maxlength' => false,
                            'required' => false
                        )
                    )); ?>
                    <ul>
                        <li> <?php echo $this->Form->input('username', array('placeholder' => 'Email','class' => 'username' )); ?> </li>
                        <li> <?php echo $this->Form->input('password', array('placeholder' => 'Contraseña', 'class' => 'password' )); ?> </li>
                        <li> <!-- <a href="reset_password.html">Forgot your password?</a> --> </li>
                        <li><?php echo $this->Form->end(array('label' => __('Ingresar') )); ?> </li>
                    </ul>
                </div>
               
            </div>
        </section>
        <script src="<?php echo $this->webroot; ?>js/vendor/jquery.placeholder.js"></script>
        <script src="<?php echo $this->webroot; ?>js/plugins.js"></script>
        <script src="<?php echo $this->webroot; ?>js/main.js"></script>
        <script>
            $('input, textarea').placeholder(); 
        </script>
    </body>
</html>
