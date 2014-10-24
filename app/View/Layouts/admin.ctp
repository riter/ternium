<?php $controller = $this->request->params['controller']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta http-equiv="Content-type" content="text/htm1;charset=utf-8"/>

        <!-- Apple iOS and Android stuff (do not remove) -->
        <meta name="apple-mobile-web-app-capable" content="no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />

        <!-- Required Stylesheets -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>admin-assets/css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>admin-assets/css/fluid.css" media="screen" />

        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>admin-assets/css/mws.style.css" media="screen" />
       
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>admin-assets/plugins/fileinput/css/fileinput.css" media="screen" />
     <!-- JavaScript Plugins -->
        
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/js/jquery-1.7.1.min.js"></script> 

<!--
        <script type="text/javascript" src="<?php // echo $this->webroot; ?>admin-assets/js/jquery.mousewheel-min.js"></script> 
    -->

        <!-- jQuery-UI Dependent Scripts -->

        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/js/jquery-ui.js"></script>


        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/spinner/ui.spinner.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/timepicker/timepicker-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/js/jquery.ui.touch-punch.min.js"></script>

        <!-- Plugin Scripts -->
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/duallistbox/jquery.dualListBox-1.3.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/jgrowl/jquery.jgrowl-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/fileinput/js/jQuery.fileinput.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/datatables/jquery.dataTables-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/prettyphoto/js/jquery.prettyPhoto-min.js"></script>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/flot/excanvas.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/flot/jquery.flot.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/flot/jquery.flot.pie.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/flot/jquery.flot.stack.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/colorpicker/colorpicker-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/tipsy/jquery.tipsy-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/sourcerer/Sourcerer-1.2-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/placeholder/jquery.placeholder-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/validate/jquery.validate-min.js"></script>

        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/elrte/js/elrte.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/plugins/elfinder/js/elfinder.min.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>admin-assets/plugins/elrte/css/elrte.full.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>admin-assets/plugins/elfinder/css/elfinder.css" media="screen" />

        <!-- Core Script -->
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/js/mws.js"></script>

        <!-- Themer Script (Remove if not needed) -->
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/js/themer.js"></script>
		
        <!-- Demo Scripts (remove if not needed) -->
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/js/demo.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>admin-assets/js/demo.formelements.js"></script>

        <!-- meta block -->
        <?php echo $this->fetch('meta'); ?>
        <!-- css block -->
        <?php echo $this->fetch('css'); ?>
        <!-- script block -->
        <?php echo $this->fetch('script'); ?>

        <!-- admin css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>admin-assets/css/style.css" media="screen" />

        <!-- admin js -->

        <!-- <title><?php echo $title_page; ?> &lsaquo; Admin</title> -->
        <title> Steel Frame Calculator  |  Admin </title>
</head>
<body>
   <!-- Header -->
        <div id="mws-header" class="clearfix">

            <!-- Logo Container -->
            <div id="mws-logo-container">

                <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
                <div id="mws-logo-wrap">
                    <img src="<?php echo $this->webroot; ?>img/logo-steelframe.png" alt="Steelframe Calculator" />
                </div>
            </div>  
            
            <!-- User Tools (notifications, logout, profile, change password) -->
            <div id="mws-user-tools" class="clearfix">
                
                <!-- User Information and functions section -->
                <div id="mws-user-info" class="mws-inset"> 
                    
                    <!-- User Photo -->
                    <div id="mws-user-photo">
                        <?php 
                        $photo= AuthComponent::user('photo');
                       
                        if($photo != ""):
                        ?>
                        <img src="<?php echo $this->webroot; ?>app/webroot/uploads/photo/<?PHP echo $photo; ?>" alt="User Photo" />
                        <?php else: ?>
                        <img src="<?php echo $this->webroot; ?>app/webroot/uploads/photo/default.jpg" alt="User Photo" />
                        <?php endif; ?>
                    </div>

                    <!-- Username and Functions -->
                    <div id="mws-user-functions">
                        <div id="mws-username">
                            Bienvenido, <?php echo AuthComponent::user('nombre'); ?>
                        </div>
                        <ul>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'admin' => true)); ?>">Salir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Main Wrapper -->
        <div id="mws-wrapper">

            <!-- Necessary markup, do not remove -->
            <div id="mws-sidebar-stitch"></div>
            <div id="mws-sidebar-bg"></div>

            <!-- Sidebar Wrapper -->
            <div id="mws-sidebar">
                
                <?php //$user = AuthComponent::user(); ?>
                <!-- Main Navigation -->
              
                 <div id="mws-navigation">
                    <ul>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'dashboard', 'action' => 'index', 'admin' => true)); ?>" class="mws-i-24 i-home">Dashboard</a>
                        </li>
                        <li <?php if ($controller == 'users') echo 'class = "active"'; ?>>
                            <a href="#" class="mws-i-24 i-group-2">Usuarios</a>
                            <ul <?php if ($controller == 'users') echo 'class = ""'; else echo 'class = "closed"'; ?>>
                                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?>">Todos  los Usuarios</a></li>
                                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add', 'admin' => true)); ?>">Adicionar Usuario</a></li>
                            </ul>
                        </li>
                        <li>
                            <a  href="<?php echo $this->Html->url(array('controller'=>'Proveedores',
                                'action' => 'index', 'admin' => true)); ?>" > Proveedores</a>

                                  <ul <?php if ($controller == 'users') 
                                        echo 'class = ""'; 
                                        else echo 'class = "closed"'; ?>>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'proveedores', 'action' => 'index', 'admin' => true)); ?>">Todos  los Proveedores</a></li> 

                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'proveedores', 'action' => 'add', 'admin' => true)); ?>">Adicionar Proveedor</a></li> 
                                </ul> 
                        </li> 
                     
                      
                        <li>
                            <a  href="<?php echo $this->Html->url(array('controller'=>'Provincias',
                                'action' => 'index', 'admin' => true)); ?>" > Provincias</a>

                                <ul <?php if ($controller == 'provincias') 
                                        echo 'class = ""'; 
                                        else echo 'class = "closed"'; ?>>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'provincias', 'action' => 'index', 'admin' => true)); ?>">Todas  las Provincias</a></li> 

                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'provincias', 'action' => 'add', 'admin' => true)); ?>">Adicionar Provincias</a></li> 
                                </ul> 
                        </li> 
                        <li>
                            <a  href="<?php echo $this->Html->url(array('controller'=>'galerias',
                                'action' => 'index', 'admin' => true)); ?>" > Galer&iacute;a </a>


                    <?php   $controller=strtolower($controller); ?> 

                                <ul <?php if ($controller=='galerias') 
                                        echo 'class = ""'; 
                                        else echo 'class = "closed"'; ?>>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'galerias', 'action' => 'index', 'admin' => true)); ?>">Todas  las Im&aacute;genes </a></li> 

                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'galerias', 'action' => 'add', 'admin' => true)); ?>">Adicionar Im&aacute;gen </a></li> 
                                </ul> 
                        </li> 
                        
         
              
                         <li>
                            <?php   $controller=strtolower($controller); ?> 

                            <a  href="<?php echo $this->Html->url(array('controller'=>'Feedbacks',
                                'action' => 'index', 'admin' => true)); ?>" >Feedbacks </a>

                                <ul <?php if ($controller == 'feedbacks') 
                                        echo 'class = ""'; 
                                        else echo 'class = "closed"'; ?>>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'feedbacks', 'action' => 'index', 'admin' => true)); ?>">Todos los Feedbacks </a></li> 

                                    
                                </ul> 
                        </li>  
                          <li>
                            <?php   $controller=strtolower($controller); ?> 

                            <a  href="<?php echo $this->Html->url(array('controller'=>'Profesiones',
                                'action' => 'index', 'admin' => true)); ?>" >Profesiones </a>

                                <ul <?php if ($controller == 'profesiones') 
                                        echo 'class = ""'; 
                                        else echo 'class = "closed"'; ?>>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'profesiones', 'action' => 'index', 'admin' => true)); ?>">Todas las profesiones </a></li> 

                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'profesiones', 'action' => 'add', 'admin' => true)); ?>">Adicionar profesion </a></li> 
                                </ul> 
                        </li>  
                        
                    </ul>
                </div>   
                
            </div>

            <!-- Main Container Start -->
            <div id="mws-container" class="clearfix">
                <div id="flash_message">
                    <?php echo $this->Session->flash(); ?>
                </div>

                <!-- Inner Container Start -->
                <div class="container">
                    <?php echo $this->fetch('content'); ?>
                    <!-- Panels End -->
                </div>
                <!-- Inner Container End -->

                <!-- Footer -->
                <div id="mws-footer">
                    Copyright Steelframe Calculator <?php echo date('Y'); ?>. All Rights Reserved.
                </div>
            </div>
            <!-- Main Container End -->
        </div> 
</body>
</html>