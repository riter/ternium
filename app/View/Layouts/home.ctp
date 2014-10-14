<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

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

        <script src="<?php echo $this->webroot; ?>js/jquery.js"></script>
        <script src="<?php echo $this->webroot; ?>js/Jqueryvalidation.js"></script>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header>
            <div class="wrapper">
                <div class="logo">
                    <!-- <a href="#"><img src="img/logo.png" ></a> -->
                    <?php //echo $this->html->image("logo.png", array("alt"=>"Lorazian", 'url'=> "index"));?>
                    <?php
                    echo $this->Html->link(
                            $this->Html->image("logo.png", array("alt" => "Lorazian")), "/", array('escape' => false)
                    );
                    ?>
                    
                </div>
                
                <div class="right">
                    <div class="search">
                        <form action="">
                            <input type="text" placeholder="Search...">
                        </form>
                    </div>
                    <div class="user">
                        <?php 
                        $user= AuthComponent::user();                     
                        if($user != ""):
                             $photo= AuthComponent::user('photo'); 
                             if($photo != ""):
                        ?>
                        <!--
                        <figure><img src="img/avatar.png" alt="avatar"></figure>
                        
                        <div class="right">
                            <div class="name">Bob Smith</div>
                            <a href="#">Logout</a>
                        </div>
                        -->
                        <figure> <img src="<?php echo $this->webroot; ?>app/webroot/uploads/photo/<?PHP echo $photo; ?>" alt="User Photo" /> </figure>
                            <?php else:  ?>
                            <figure>                               
                                <img src="img/avatar.png" alt="avatar">
                            </figure>
                            <?php endif; ?>
                            <div class="right">
                                <div class="name"><?php echo AuthComponent::user('firstname'); ?></div>
                                <?php echo $this->Html->link('Logout', array('action' => 'logout')); ?>
                                   <!-- <a href="#">Logout</a> -->
                                   <br>
                                <?php  
                                if (AuthComponent::user('role') === '1' ): 
                                    echo $this->Html->link('Admin Dashboard', array('controller' => 'dashboard', 'action' => 'index', 'admin' => true));
                                endif;
                                ?>                                  
                            </div>
                        <?php else: ?>
                        <div class="right">
                            <?php echo $this->Html->link('Login', array('action' => 'login')); ?>
                        </div>    
                        <?php endif; ?>
                        
                        <!--
                        <figure><img src="img/avatar.png" alt="avatar"></figure>
                        
                        <div class="right">
                            <div class="name">Bob Smith</div>
                            <a href="#">Logout</a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </header>
        <section>
            <div class="wrapper">
                <nav>
                    <ul>
                        <li>
                            <?php echo $this->Html->link('Home / News', array('action' => 'index')); ?>
                            <!-- <a href="#" class="active">Home / News</a></li> -->
                        <li>
                            <a href="#">Library</a>
                            <ul class="submenu">
                                <li>
                                    <?php echo $this->Html->link('Videos', array('action' => 'video')); ?>
                                   <!-- <a href="videos.html">Videos</a> -->
                                </li>
                                <li><?php echo $this->Html->link('Documents', array('action' => 'document')); ?>
                                   <!-- <a href="documents.html">Documents</a> -->
                                </li>
                                <li>
                                    <?php echo $this->Html->link('FAQ', array('action' => 'faq')); ?>
                                   <!-- <a href="faq.html">FAQ</a> -->
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Staff Directory', array('action' => 'staff')); ?>
                            <!-- <a href="staff.html">Staff Directory</a> -->
                        </li>
                        <li>
                            <?php echo $this->Html->link('My Profile', array('action' => 'profile')); ?>
                           <!-- <a href="profile.html">My Profile</a> -->
                        </li>
                    </ul>
                </nav>
                <?php echo $this->fetch('content'); ?>
                
            </div>
        </section>
        <script src="<?php echo $this->webroot; ?>js/plugins.js"></script>
        <script src="<?php echo $this->webroot; ?>js/main.js"></script>
    </body>
</html>
