<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Supr admin</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Core stylesheets do not remove -->
    <link href="<?php echo base_url()?>stylesheets/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>stylesheets/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>stylesheets/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>stylesheets/icons.css" rel="stylesheet" type="text/css" />

    <!-- Plugins stylesheets -->
    <link href="<?php echo base_url()?>scripts/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>scripts/misc/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>scripts/misc/search/tipuesearch.css" type="text/css" rel="stylesheet" />
     <link href="<?php echo base_url()?>scripts/tables/dataTables/jquery.dataTables.css" type="text/css" rel="stylesheet" />

    <link href="<?php echo base_url()?>scripts/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="<?php echo base_url()?>stylesheets/main.css" rel="stylesheet" type="text/css" /> 

    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="<?php echo base_url()?>stylesheets/custom.css" rel="stylesheet" type="text/css" /> 
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>media/images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>media/images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>media/images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>media/images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>media/images/apple-touch-icon-57-precomposed.png" />
    
    <script type="text/javascript">
        //adding load class to body and hide page
        document.documentElement.className += 'loadstate';
    </script>
    
    <!-- Important plugins put in all pages -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.mousewheel.js"></script>
    </head>

    <body>


<div id="qLoverlay"></div>
    <div id="qLbar"></div>
        
    <div id="header">

        <div class="navbar">
            <div class="navbar-inner">
              <div class="container-fluid">
                <a class="brand" href="<?php echo base_url()?>inicio/index">Inicio</a>
                <div class="nav-no-collapse">
                    <ul class="nav">
                        <li class="active">
                            <a href="<?php echo base_url().$modulo?>/index" class="tip" title="Regresar a <?php echo $modulo?>"><span class="icon16 icomoon-icon-screen-2"></span> <?php echo $modulo?></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-mail-3"></span>Mensajes <span class="notification">8</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="messages">    
                                        <li class="header">Tienes<strong> (10) </strong>  mensajes sin leer</li>
                                        <li>
                                           <span class="icon"><span class="icon16 icomoon-icon-user-3"></span></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>Sammy Morerira</strong></a><span class="time">35 min ago</span></span>
                                            <span class="msg">I have question about new function ...</span>
                                        </li>                                        
                                        <li class="view-all"><a href="#">Ver todos los mensajes <span class="icon16 icomoon-icon-arrow-right-8"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-bell-2"></span>Notificaciones <span class="notification"><?php echo count($notificaciones);?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="notif">
                                        <?php foreach ($notificaciones as $key) {?>
                                        <li>
                                           
                                                <span class="icon"><span class="<?php echo $key['not_icono']?>"></span></span>
                                                <span class="event"><?php echo $key['numero'].' '.$key['not_mensaje']?></span>
                                            
                                        </li>
                                        <?php } ?>                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                  
                    <ul class="nav pull-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="<?php echo base_url()?>media/user.png" alt="" class="image" /> 
                                <span class="txt"><?php echo $username?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-user-3"></span>Edit profile</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-comments-2"></span>Approve comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-plus-2"></span>Add user</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url()?>auth/logout"><span class="icon16 icomoon-icon-exit"></span> Salir</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
              </div>
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 

    </div><!-- End #header -->

    <div id="wrapper">

        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        
        <!--Left Sidebar collapse button-->  
        <div class="collapseBtn leftbar">
             <a href="" class="tipR" title="Ocultar barra de menus"><span class="icon12 minia-icon-layout"></span></a>
        </div>

        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <div id="sidebar">

            <div class="shortcuts">
                <ul>
                    <li><a href="support.html" title="Support section" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                    <li><a href="#" title="Database backup" class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                    <li><a href="charts.html" title="Sales statistics" class="tip"><span class="icon24 icomoon-icon-pie-2"></span></a></li>
                    <li><a href="#" title="Write post" class="tip"><span class="icon24 icomoon-icon-pencil"></span></a></li>
                </ul>
            </div><!-- End search -->            

            <div class="sidenav">

                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">Navegacion</h5>
                </div><!-- End .sidenav-widget -->

                <div class="mainnav">
                    <ul>
                                    <?php
                                    foreach ($menu1 as $m1)
                                    {
                                        $total=0;
                                        $hijos=array();
                                        if($m1['opc_hijo']==1)
                                        {
                                            $hijo="menu_item add_menu";
                                            foreach ($menu2 as $m2) 
                                            {
                                                if($m2['opc_padre']==$m1['opc_id'])
                                                {
                                                    $total++;
                                                    $hijos[]=array('opc_nombre'=>$m2['opc_nombre'],'opc_funcion'=>$m2['opc_funcion'],'opc_descripcion'=>$m2['opc_descripcion']);                        
                                                }
                                            }
                                        }
                                        else
                                            $hijo="menu_item";
                                ?>
                                        <li><a class="tipB" href="<?php echo base_url().$modulo.'/'.$m1['opc_funcion']?>" title="<?php echo $m1['opc_descripcion']?>"><span class="icon16 icomoon-icon-grid-view"></span><?php echo $m1['opc_nombre']?></a>
                                <?php
                                    if($m1['opc_hijo']==1)
                                        {
                                ?>
                                            <ul class="sub">
                                <?php
                                            foreach ($hijos as $m2) 
                                            {
                                    ?>
                                                    <li><a class="tipB" href="<?php echo base_url().$modulo.'/'.$m1['opc_funcion'].'/'.$m2['opc_funcion']?>" title="<?php echo $m2['opc_descripcion']?>"><span class="icon16 icomoon-icon-arrow-right-2"></span><?php echo $m2['opc_nombre']?></a></li>
                                    <?php
                                            }
                                    ?>
                                            </ul>
                                        </li>
                                    <?php
                                        }
                                    }
                                ?>
                    </ul>
                </div>
            </div><!-- End sidenav -->
        </div><!-- End #sidebar -->

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->
                <div class="heading">
                    <h3><?php print_r($descripcion)?></h3>
                    <ul class="breadcrumb">
                        <li>Ud se encuentra aqui:</li>
                        <li>
                            <a href="<?php echo base_url().$modulo?>/index" class="tip" title="Regresar a <?php echo $modulo?>">
                                <span class="icon16 icomoon-icon-screen-2"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-2"></span>
                            </span>
                        </li>
                        <li class="active"><?php echo $modulo." ".$control." ".$funcion?></li>
                    </ul>

                </div><!-- End .heading-->
               
                    <mp:Content />
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    </div><!-- End #wrapper -->
    
    <!-- Le javascript
    ================================================== -->
    

    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.mousewheel.js"></script>    

    <!-- Charts plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/charts/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/charts/flot/jquery.flot.grow.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/charts/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/charts/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/charts/flot/jquery.flot.tooltip_0.4.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/charts/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/charts/knob/jquery.knob.js"></script><!-- Circular sliders and stats -->

    <!-- Misc plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/misc/fullcalendar/fullcalendar.min.js"></script><!-- Calendar plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/misc/qtip/jquery.qtip.min.js"></script><!-- Custom tooltip plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/misc/totop/jquery.ui.totop.min.js"></script> <!-- Back to top plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/forms/select/select2.min.js"></script>
    <!-- Search plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/misc/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/misc/search/tipuesearch_data.js"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/misc/search/tipuesearch.js"></script>

    <!-- Form plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/forms/watermark/jquery.watermark.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/forms/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/forms/tiny_mce/jquery.tinymce.js"></script>
    
    <!-- Fix plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/fix/ios-fix/ios-orientationchange-fix.js"></script>

    <!-- Table plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>scripts/tables/dataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/tables/responsive-tables/responsive-tables.js"></script><!-- Make tables responsive -->

    <!-- Important Place before main.js  -->
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>scripts/fix/touch-punch/jquery.ui.touch-punch.min.js"></script><!-- Unable touch for JQueryUI -->
    <script type="text/javascript" src="<?php echo base_url()?>js/supr-theme/jquery-ui-timepicker-addon.js"></script>

    <!-- grocery crud plugins  --> 
    <script type="text/javascript" src="<?php echo base_url()?>assets/grocery_crud/themes/satelite/js/flexigrid.js"></script> 
    <script type="text/javascript" src="<?php echo base_url()?>assets/grocery_crud/themes/satelite/js/jquery.form.js"></script>

    

    <!-- Init plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>js/main.js"></script><!-- Core js functions -->    
    <script type="text/javascript" src="<?php echo base_url()?>js/dashboard.js"></script><!-- Init plugins only for page -->
    <script type="text/javascript" src="<?php echo base_url()?>js/datatable.js"></script><!-- Init plugins only for page -->
    
    

    </body>
</html>