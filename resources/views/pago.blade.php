<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        
        <title>SISTEMA DE ADMINISTRACION FINANCIERA</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
		<style type="text/css">
            .my-custom-scrollbar {
            position: relative;
            height: 200px;
            overflow: auto;
            }
            .table-wrapper-scroll-y {
            display: block;
            }

            .lbinformacion {
                color: orange; 
                font-weight: bold;                
            }

            .colorTab { 

                color: blue;

            }

        </style>
		
		</head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="../assets/layouts/layout/img/logocip1.png" width="170"/> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default"> 7 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold">12 pending</span> notifications</h3>
                                    <a href="page_user_profile_1.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Server #12 overloaded. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">10 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Server #2 not responding. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">14 hrs</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> Application error. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">2 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Database overloaded 68%. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> A user IP blocked. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">4 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Storage Server #4 not responding dfdfdfd. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">5 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> System Error. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">9 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Storage server failed. </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default"> 4 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">7 New</span> Messages</h3>
                                    <a href="app_inbox.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="../assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
                                                </span>
                                                <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <span class="badge badge-default"> 3 </span>
                            </a>
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">12 pending</span> tasks</h3>
                                    <a href="app_todo.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Application deployment</span>
                                                    <span class="percent">65%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">65% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile app release</span>
                                                    <span class="percent">98%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">98% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Database migration</span>
                                                    <span class="percent">10%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">10% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Web server upgrade</span>
                                                    <span class="percent">58%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">58% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile development</span>
                                                    <span class="percent">85%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">85% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New UI release</span>
                                                    <span class="percent">38%</span>
                                                </span>
                                                <span class="progress progress-striped">
                                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">38% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> Nick </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="page_user_profile_1.html">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li>
                                    <a href="app_calendar.html">
                                        <i class="icon-calendar"></i> My Calendar </a>
                                </li>
                                <li>
                                    <a href="app_inbox.html">
                                        <i class="icon-envelope-open"></i> My Inbox
                                        <span class="badge badge-danger"> 3 </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="app_todo.html">
                                        <i class="icon-rocket"></i> My Tasks
                                        <span class="badge badge-success"> 7 </span>
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="page_user_lock_1.html">
                                        <i class="icon-lock"></i> Lock Screen </a>
                                </li>
                                <li>
                                    <a href="page_user_login_1.html">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="javascript:;" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        
                        <li class="heading">
                            <h3 class="uppercase">Modulos</h3>
                        </li>
                       
                        <li class="nav-item  start">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Colegiados</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/user/create" class="nav-link ">
                                        <span class="title">Registro</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/user" class="nav-link ">
                                        <span class="title">Busqueda</span>
                                        <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/user" class="nav-link ">
                                        <span class="title">Actualización</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-item active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Pagos</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a href="/pagos" class="nav-link ">
                                        <span class="title">Pagos</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="/fraccionamiento" class="nav-link ">
                                        <span class="title">Fraccionamiento</span>
                                    </a>
                                </li>
                            </ul>    
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Facturacion</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="http://admin.cippuno.org.pe/facturacion/vistas/escritorio.php" class="nav-link ">
                                        <span class="title">Ingreso
                                            </span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_controls_md.html" class="nav-link ">
                                        <span class="title">Resumen Diario
                                            </span>
                                    </a>
                                </li>
                                
                            </ul>
                            
                            
                        </li>
                         <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Reporte</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="form_controls.html" class="nav-link ">
                                        <span class="title">bUsqueda
                                            </span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_controls_md.html" class="nav-link ">
                                        <span class="title">General
                                            </span>
                                    </a>
                                </li>
                                
                            </ul>
                            
                            
                        </li>
                       <li> 
                           </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <!-- BEGIN GENERAL PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-blue-sharp"></i>
                                            <span class="caption-subject font-blue-sharp bold uppercase">Sistema de cobranza: aportaciones</span>
                                        </div>
                                        <div class="actions">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-cloud-upload"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-wrench"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                        <form id="frmBusqueda" class="form-horizontal" role="form">

                                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                                        <div class="form-body">
                                            <div class="form-group">
                                                
                                                <div class="col-md-2">
                                                    <select class="form-control input-sm" name="tipoBusqueda" id="tipoBusqueda">
                                                        
                                                        <option value="1">Código CIP</option>
                                                        <option value="2">DNI</option>
                                                        <option value="3">Nombre</option>
                                                        
                                                    </select> <i></i> 
                                                </div>
                                                <div class="col-md-3">
                                                
                                                    
                                                    <input type="text" class="form-control input-sm"  name="textoBusqueda" id="textoBusqueda" placeholder="Datos de Búsqueda"> </div>
                                                    
                                                
                                                <div class="col-md-1">
                                                    <button type="submit" class="btn btn-circle green" href="javascript:void(0);">Buscar</button>
                                                </div>

                                                <div class="col-md-3" class="alert alert-info" id="lbinformacion" >
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        </form>

                                        </div>
                                        <form id="frmBusqueda" class="form-horizontal" novalidate="novalidate">
                                        <div class="row">
                                        
                                            <div class="form-body">
                                            <div class="form-group">
                                                
                                                <label class="control-label col-md-1">Nombre</label>
                                                <div class="col-md-3">
                                                <input type="text" name="nombreColegiado" id="nombreColegiado" placeholder="Datos de Búsqueda" class="form-control input-sm">
                                                </div>

                                                <label class="control-label col-md-1">Código CIP</label>
                                                <div class="col-md-1">
                                                <input type="text" name="codigoColegiado" id="codigoColegiado" placeholder="Código CIP" class="form-control input-sm">
                                                </div>

                                                <label class="control-label col-md-1">Condición</label>
                                                <div class="col-md-2">
                                                <input type="text" name="condicionColegiado" id="condicionColegiado" placeholder="Condición" class="form-control input-sm">
                                                </div>

                                                <label class="control-label col-md-1">Especialidad</label>
                                                <div class="col-md-2">
                                                <input type="text" name="especialidadColegiado" id="especialidadColegiado" placeholder="Especialidad" class="form-control input-sm">
                                                </div>

                                            </div>
                                            </div>
                                        
                                        </div>
                                        <div class="row">
                                            <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-1">Fecha</label>
                                                <div class="col-md-2">
                                                <input type="text" name="dataFecha" id="dataFecha" placeholder="Fecha" class="form-control input-sm">
                                                </div>

                                                <label class="control-label col-md-1">Ultimo pago</label>
                                                <div class="col-md-2">
                                                
                                                <input type="text" name="ultimoPagoView" id="ultimoPagoView" placeholder="Ultimo Pago" class="form-control input-sm" style="font-weight: bold; background: #ebffeb">
                                                <input type="hidden" name="ultimoPago" id="ultimoPago" placeholder="Ultimo Pago" class="form-control input-sm">
                                                
                                                </div>

                                                <label class="control-label col-md-1">Habil Hasta</label>
                                                <div class="col-md-2">
                                                <input type="text" name="habilHastaView" id="habilHastaView" placeholder="Habil Hasta" class="form-control input-sm" style="font-weight: bold; background: #ebffeb">
                                                <input type="hidden" name="habilHasta" id="habilHasta" placeholder="Habil Hasta" class="form-control input-sm">
                                                
                                                </div>

                                            </div>
                                            </div>
                                        </div>
                                        </form>

                                        

                                        <form id="frmPagos" class="form-horizontal" novalidate="novalidate">
                                        <div class="row">
                                            <div class="form-body">
                                            <div class="form-group">

                                                <label class="control-label col-md-1">Tipo Documento</label>
                                                <div class="col-md-2">
                                                    <select name="tipoDocumento" id="tipoDocumento" class="form-control input-sm">
                                                
                                                    <option value="1">Aportaciones</option>
                                                    <option value="4" selected="">Boleta Venta</option>
                                                    <option value="3">Constancia</option>
                                                    <option value="5">Factura</option>
                                                    <option value="2">Fraccionamiento</option>
                                                
                                                    </select> <i></i> 
                                                </div>

                                                <label class="control-label col-md-1">Nro. Recibo</label>
                                                <div class="col-md-1">
                                                <input type="text" name="serieRecibo" id="serieRecibo" placeholder="Nro. Recibo" class="form-control input-sm">
                                                </div>
                                                <div class="col-md-2">
                                                <input type="text" name="nroRecibo" id="nroRecibo" placeholder="Nro. Recibo" class="form-control input-sm">
                                                </div>

                                            </div>
                                            </div>
                                        </div>


                                        <div class="row" id="dDetallePago" style="visibility: hidden">

                                        <div class="portlet-body">
                                        <div class="tabbable-line">
                                        <ul class="nav nav-tabs nav-tabs-lg" style="background: #f0f0f0">
                                            <li class="active colorTab"  >
                                                <a href="#tab_1" data-toggle="tab"><b>
                                                <i class="fa fa-money"></i>
                                                Detalles del Pago </b></a>
                                            </li>
                                            <li class="colorTab">
                                                <a href="#tab_2" data-toggle="tab" class="colorTab" > Por Fecha
                                                </a>
                                            </li>
                                            <li class="colorTab" class="colorTab">
                                                <a href="#tab_3" data-toggle="tab" > Certificados
                                                </a>
                                            </li>
                                            <li class="colorTab" class="colorTab">
                                                <a href="#tab_4" data-toggle="tab" id="tabMultas"> Multas
                                                </a>
                                            </li>
                                            <li class="colorTab">
                                                <a href="#tab_5" data-toggle="tab" id="tabFraccionamiento"> Fraccionamiento
                                                </a>
                                            </li>
                                            <li class="colorTab">
                                                <a href="#tab_6" data-toggle="tab" >
                                                Deudas
                                                <span class="badge badge-success"> 2 </span>
                                                </a>
                                            </li>
                                            <li class="colorTab">
                                                <a href="#tab_7" data-toggle="tab" > Presentes
                                                </a>
                                            </li>
                                        </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1">

                                        
                                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                                        
                                        <input type="hidden" name="dtCodigoCIP" id="dtCodigoCIP" >


                                        <div class="col-md-1">
                                                <label class="control-label">Periodo</label>
                                                <select name="periodo" id="periodo" class="form-control input-sm">
                                                    
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019" selected="">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                    
                                                </select> <i></i> 
                                                <br>
                                                <select name="periodoMes" id="periodoMes" multiple="multiple" class="form-control input-sm" style="height: 240px;">
                                                    
                                                        <option value="01">Enero</option>
                                                        <option value="02">Febrero</option>
                                                        <option value="03">Marzo</option>
                                                        <option value="04">Abril</option>
                                                        <option value="05" selected="">Mayo</option>
                                                        <option value="06">Junio</option>
                                                        <option value="07">Julio</option>
                                                        <option value="08">Agosto</option>
                                                        <option value="09">Setiembre</option>
                                                        <option value="10">Octubre</option>
                                                        <option value="11">Noviembre</option>
                                                        <option value="12">Diciembre</option>
                                                    
                                                </select> <i></i> 

                                            </div>
                                                    <div class="col-md-11">
                                            <div class="row">
                                            
                                                <label class="control-label col-md-2">Concepto de pago</label>
                                                <div class="col-md-3">
                                                <select name="conceptoPago" id="conceptoPago" class="form-control input-sm">
                                            

                                                
                                                    
                                                </select>

                                                </div>

                                                 <label class="control-label col-md-1">Total concepto</label>
                                                <div class="col-md-2">
                                                <input type="text" name="totalConcepto" id="totalConcepto" placeholder="Total Concepto" value="" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-2">Otro concepto / Institución</label>
                                                <div class="col-md-3">
                                                <input type="text" name="otroConcepto" class="form-control input-sm">
                                                </div>

                                                <label class="control-label col-md-1">Total a Pagar</label>
                                                <div class="col-md-2">
                                                <input type="text" name="totalPago" id="totalPago" placeholder="Pago Total"  style="font-weight: bold; background: #ebffeb" class="form-control input-sm">
                                                </div>

                                                <label class="control-label col-md-1">Monto Recibido</label>
                                                <div class="col-md-1">
                                                    <input type="text" name="montoRecibido" id="montoRecibido" placeholder="0.00" value="" class="form-control input-sm">
                                                </div>
                                                <div class="col-md-2">
                                                <div id="dTotalCambio">
                                                    <h4>Cambio: <b>S/ 00.00</b></h4>    
                                                </div>
                                                    
                                                </div>


                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <a class="btn btn-circle green btn-sm " href="javascript:void(0);" onclick="fnAgregar()">Agregar</a>
                                                    <a class="btn btn-circle red btn-sm " href="javascript:void(0);" onclick="fnQuitar()">Quitar</a>

                                                    <a class="btn btn-circle green-meadow btn-sm " href="javascript:void(0);" onclick="fnHabilitar()">Habilitar</a>
                                                    <button type="submit" class="btn btn-circle blue btn-sm " href="javascript:void(0);">Grabar</button>

                                                    
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <div class="table-responsive" style="margin-top: 5px">
                                                
                                                <table class="table table-hover" id="tablePagos">
                                                    <thead>
                                                        <tr style="background-color: #cddc39">
                                                            
                                                            <th width="10%">Periodo</th>
                                                            <th width="40%">Concepto</th>
                                                            <th width="10%">Total</th>
                                                            <th width="10%">Quitar</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="tablePagosBody">
                                                        
                                                    </tbody>

                                                </table>
                                            
                                                </div>
                                            </div>


                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_2">
                                                        <div id="ctabPorFecha">
                                    
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_3">
                                                        <div id="ctabCertificado">
                                    
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_4">
                                                        <div id="ctabMultas">
                                    
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_5">
                                                        <div id="ctabFracc">
                                    
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_6">
                                                        <div id="ctabDeuda">
                                    
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_7">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        

                                            

                                            
                                        </form>

                                        <?php 
                                            //print_r($integrantes);
                                            
                                  foreach ($conceptoPago as $val) {
                                    echo "<input type='hidden' id='".$val->idConceptoPago."' name ='".$val->idConceptoPago."' value='".$val->montoPago."'> ";
                                  }
                                ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END GENERAL PORTLET-->
                          
                            
                        </div>
                        
                    </div>

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                <div class="page-quick-sidebar">
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Colegio de Ingenieros del Perú - Consejo Departamental Puno
</h4>
                </div>
                <div class="modal-body">
                  <div class="note note-success">
                    
                    <p>
                        Gracias! El pago ha sido realizado correctamente.
                    </p>
                    
                    
                </div>
                </div>
                <div class="modal-footer">

                    <a id="printBoucher" class="btn blue btn-sm " href="pdfPrint" target="_blank"><i class="fa fa-print"></i> Imprimir</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
              
            </div>
        </div>

        <div class="modal fade bs-modal-lg in" id="modalColegiados" role="dialog">
            <div class="modal-dialog modal-lg">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Colegio de Ingenieros del Perú - Consejo Departamental Puno
</h4>
                </div>
                <div class="modal-body">
                  
                <div class="table-scrollable table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Apellidos y Nombres </th>
                                <th> DNI</th>
                                <th> Codigo CIP </th>
                                <th> Acción </th>
                            </tr>
                        </thead>
                        <tbody id = "tableColegiados">
                            
                            
                        </tbody>
                    </table>
                </div>
                
                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
              
            </div>
        </div>

        <div class="modal fade" id="modalCalculadora" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Colegio de Ingenieros del Perú - Consejo Departamental Puno
</h4>
                </div>
                <div class="modal-body">
                  <div class="note note-success">
                    

                    <div id="dTotalPago">
                        <h3>Total Pago <b>S/ 00.00</b></h3>    
                    </div>
                    
                </div>
                <!--div class="row">
                    <div class="col-md-4">
                        <h5><b>Ingrese monto recibido:</b></h5>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="montoRecibido" id="montoRecibido" placeholder="Total Concepto" value="0.00" class="form-control input-sm">
                    </div>
                    <div class="col-md-4">
                    <div id="dTotalCambio">
                        <h4>Cambio: <b>S/ 00.00</b></h4>    
                    </div>
                        
                    </div>   
                </div-->
                
                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
              
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2014 &copy; Metronic by keenthemes.
                <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <!--script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script-->
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>



        <!--script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script-->

        <script type="text/javascript">

            var bitacoraPago;

            var e = new Array();
            e['01']='00';
            e['02']='01';
            e['03']='02';
            e['04']='03';
            e['05']='04';
            e['06']='05';
            e['07']='06';
            e['08']='07';
            e['09']='08';
            e['10']='09';
            e['11']='10';
            e['12']='11';

            var mes_Print = new Array();

            mes_Print['01']= "Enero";
            mes_Print['02']= "Febrero";
            mes_Print['03']= "Marzo";
            mes_Print['04']= "Abril";
            mes_Print['05']= "Mayo";
            mes_Print['06']= "Junio";
            mes_Print['07']= "Julio";
            mes_Print['08']= "Agosto";
            mes_Print['09']= "Septiembre";
            mes_Print['10']= "Octubre";
            mes_Print['11']= "Noviembre";
            mes_Print['12']= "Diciembre";

            var monthJ_mN = new Array();
            monthJ_mN[0] = "01";
            monthJ_mN[1] = "02";
            monthJ_mN[2] = "03";
            monthJ_mN[3] = "04";
            monthJ_mN[4] = "05";
            monthJ_mN[5] = "06";
            monthJ_mN[6] = "07";
            monthJ_mN[7] = "08";
            monthJ_mN[8] = "09";
            monthJ_mN[9] = "10";
            monthJ_mN[10] = "11";
            monthJ_mN[11] = "12";

            var selecPOption = new Array();
            var mapOption = new Array();

            var ind_tr = 0;

            function busquedaNombre()
            {
                var token = $("#token").val();

                    $.ajax({ //Process the form using $.ajax()
                        type      : 'POST', //Method type
                        url       : 'busquedaColegiadosNombre', //Your form processing file URL
                        headers   : {'X-CSRF-TOKEN':token},
                        data      : $('#frmBusqueda').serialize(), //Forms name
                        dataType  : 'json',
                        success   : function(data) {
                                        if (data.success) { //If fails

                                            $("#tableColegiados").html("");                                            
                                            
                                            datos = data.data;
                                            for(var i = 0 ; i < datos.length; i++)
                                            {
                                                markup = "<tr>"+
                                                    "<td> "+(i+1)+" </td>"+
                                                    "<td> "+datos[i].nombres+"</td>"+
                                                    "<td> "+datos[i].dni+"</td>"+
                                                    "<td> "+datos[i].codigoCIP+"</td>"+
                                                    "<td>"+
                                                        "<button type='button' class='btn btn-transparent green btn-outline btn-circle btn-sm active'  onclick='callActionName("+datos[i].codigoCIP+");'> Aceptar </button>"+
                                                    "</td>"+
                                                "</tr>";

                                                $("#tableColegiados").append(markup);
                                            }

                                            
                                            $('#modalColegiados').modal('show');
                                        }
                                        else {
                                                alert(data.mensaje);
                                        }

                                    }
                    });
            }

            function busquedaColegiado()
            {
                var token = $("#token").val();

                    $.ajax({ //Process the form using $.ajax()
                        type      : 'POST', //Method type
                        url       : 'busquedaColegiados', //Your form processing file URL
                        headers   : {'X-CSRF-TOKEN':token},
                        data      : $('#frmBusqueda').serialize(), //Forms name
                        dataType  : 'json',
                        success   : function(data) {
                                        if (data.success) { //If fails

                                            $("#dDetallePago").css('visibility', 'visible');

                                            var datos=data.mensaje;
                                            var fdata=data.fpdata;
                                            var especialidad = data.especialidad;

                                            bitacoraPago = data.bitacoraPago;
                                            
                                            $("#nombreColegiado").val(datos[0].nombres);

                                            $("#codigoColegiado").val(datos[0].codigoCIP);
                                            
                                            $("#condicionColegiado").val(datos[0].estadoHabil);

                                            $("#dataFecha").val(datos[0].fechaActual);

                                            $("#ultimoPagoView").val(mes_Print[fdata[0].periodoPago.substr(4,2)] +"-"+fdata[0].periodoPago.substr(0,4));
                                            $("#ultimoPago").val(fdata[0].periodoPago);

                                            $("#habilHastaView").val(mes_Print[fdata[0].fHabil.substr(4,2)] +"-"+ fdata[0].fHabil.substr(0,4));
                                            $("#habilHasta").val(fdata[0].fHabil);
                                            

                                            $("#dtCodigoCIP").val(datos[0].codigoCIP);

                                            espacio="";
                                            especialidadPrint = "";
                                            for(var i = 0; i < especialidad.length; i++)
                                            {
                                                
                                                if(i>0){espacio = ", ";}
                                                especialidadPrint += espacio+especialidad[i].valor;
                                            }

                                            $("#especialidadColegiado").val(especialidadPrint);


                                            var conceptoPFrac = data.conceptoPagoFrac;

                                            fnPrintInformacion(data.conceptoPagoDeuda,conceptoPFrac, datos[0].estadoHabil);

                                            fnReportFecha(data.reportFecha);
                                            fnReportCertificado(data.reportCertificado);
                                            fnReportMultas(data.reportMultas);
                                            fnReportFracc(data.reportFracc);
                                            fnReportDeudas(data.conceptoPagoDeuda,data.conceptoPagoFrac)

                                            readSelecOption(data.conceptoPagoDeuda,conceptoPFrac,data.conceptoPago,datos[0].estadoHabil);

                                            cleanTablePagos();

                                            //


                                        }
                                        else {

                                            $("#nombreColegiado").val('');

                                            $("#codigoColegiado").val('');
                                            
                                            $("#condicionColegiado").val('');

                                            $("#dataFecha").val('');

                                            $("#ultimoPagoView").val('');
                                            $("#ultimoPago").val('');

                                            $("#habilHastaView").val('');
                                            $("#habilHasta").val('');

                                            $("#dtCodigoCIP").val('');

                                                $("#dDetallePago").css('visibility', 'hidden');


                                            cleanTablePagos();


                                                alert(data.mensaje);
                                            }
                                        }
                    });
            }
            function fnReportDeudas(data_deuda, data_fracc)
            {
                $("#ctabDeuda").html('');
                var ind = 1;
                cad = " <div class = 'col-md-6'>"+
                        "<table class='table table-condensed table-hover'> " +
                        "<thead>" + 
                            "<tr>" +
                                "<th > # </th>"+
                                "<th > Concepto de Pago </th>"+
                                "<th > Monto </th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>";
                        datTabla = "";
                for(var i = 0 ; i < data_deuda.length; i++)
                {
                    datTabla +=  "<tr>"+
                                
                                "<td>"+(ind++)+
                                "</td>"+
                                "<td>"+data_deuda[i].conceptoPago+
                                "</td>"+
                                "<td>"+data_deuda[i].montoPago+
                                "</td>"+

                                "</tr>";

                }
                var fechaUltPago ='';
                for(var i = 0 ; i < data_fracc.length; i++)
                {
                    datTabla +=  "<tr>"+
                                
                                "<td>"+(ind++)+
                                "</td>"+
                                "<td>"+data_fracc[i].conceptoPago+
                                "</td>"+
                                "<td>"+data_fracc[i].montoPago+
                                "</td>"+

                                "</tr>";
                    fechaUltPago = data_fracc[i].fecha;

                }

                var ultimoPago = $("#ultimoPago").val();
                var dataFecha = $("#dataFecha").val();

                var tamDataFracc = data_fracc.length;

                if(data_fracc.length >0)
                {
                    ultimoPago = data_fracc[tamDataFracc-1].fecha.substr(0,4) + data_fracc[tamDataFracc-1].fecha.substr(5,2);
                }

                console.log("---->"+ultimoPago);
                var fechaComparacion = new Date(ultimoPago.substr(0,4), e[ultimoPago.substr(4,2)], '01');

                var fechaActual = new Date(dataFecha.substr(0,4),e[dataFecha.substr(5,2)],dataFecha.substr(8,2));
                
                var totalDeudaAp = 0;
                for(var k = 1 ; ; k++)
                {

                    fechaComparacion.setMonth( fechaComparacion.getMonth() + 1 );

                    if(fechaComparacion <= fechaActual){}
                    else{ break;}

                    var montoBitacora = 0;
                    for(var i=bitacoraPago.length-1; i >=0 ; i--)
                    {
                        var fechaBitacora = new Date(bitacoraPago[i].dFechaIni.substr(0,4),e[bitacoraPago[i].dFechaIni.substr(5,2)],bitacoraPago[i].dFechaIni.substr(8,2));
                        if(fechaComparacion >= fechaBitacora)
                        {
                            montoBitacora=bitacoraPago[i].nMonto;
                            
                            break;
                        }
                        
                    }
                    
                    totalDeudaAp += montoBitacora;                            
                    //ind_tr++;
                
                }

                datTabla +=  "<tr>"+
                                
                                "<td>"+(ind++)+
                                "</td>"+
                                "<td>"+"Aportaciones"+
                                "</td>"+
                                "<td>"+totalDeudaAp+
                                "</td>"+

                                "</tr>";

                cad += datTabla + "<tbody></table></div>";
                
                $("#ctabDeuda").html(cad);
            }
            function fnReportFracc(dataReport)
            {
                $("#ctabFracc").html('');
                cad = " <table class='table table-condensed table-hover'> " +
                        "<thead>" + 
                            "<tr>" +
                                "<th> # </th>"+
                                "<th> Nro. Documento </th>"+
                                "<th> Fecha </th>"+
                                "<th> Deuda Total </th>"+
                                "<th> Nro. Cuotas </th>"+
                                "<th> Usuario</th>"+
                                "<th> Estado</th>"+
                                "<th> Imprimir</th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>";
                        datTabla = "";
                for(var i = 0 ; i < dataReport.length; i++)
                {
                    datTabla +=  "<tr>"+
                                
                                "<td>"+(i+1)+
                                "</td>"+
                                "<td>"+dataReport[i].nroDocumento+
                                "</td>"+
                                "<td>"+dataReport[i].fechaCreacion+
                                "</td>"+
                                "<td>"+dataReport[i].totalDeuda+
                                "</td>"+
                                "<td>"+dataReport[i].nroCuotas+
                                "</td>"+
                                "<td>"+dataReport[i].name+
                                "</td>"+
                                "<td>"+dataReport[i].estado+
                                "</td>"+
                                "<td>"+"<a href='#tab_1'><i class='fa fa-print'></i></a>"+
                                "</td>"+
                                "</tr>";

                }

                cad += datTabla + "<tbody></table>";
                
                $("#ctabFracc").html(cad);
            }
            function fnReportMultas(dataReport)
            {
                $("#ctabMultas").html('');
                cad = " <table class='table table-condensed table-hover'> " +
                        "<thead>" + 
                            "<tr>" +
                                "<th> # </th>"+
                                "<th> Descripción </th>"+
                                "<th> Periodo </th>"+
                                "<th> Monto </th>"+
                                "<th> Resolución </th>"+
                                "<th> Usuario</th>"+
                                "<th> Fecha</th>"+
                                "<th> Estado</th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>";
                        datTabla = "";
                for(var i = 0 ; i < dataReport.length; i++)
                {
                    datTabla +=  "<tr>"+
                                
                                "<td>"+(i+1)+
                                "</td>"+
                                "<td>"+dataReport[i].descripcion+
                                "</td>"+
                                "<td>"+dataReport[i].periodoPago+
                                "</td>"+
                                "<td>"+dataReport[i].montoPago+
                                "</td>"+
                                "<td>"+dataReport[i].resTipoPago+
                                "</td>"+
                                "<td>"+dataReport[i].name+
                                "</td>"+
                                "<td>"+dataReport[i].fechaCreacion+
                                "</td>"+
                                "<td>"+dataReport[i].estado+
                                "</td>"+
                                "</tr>";

                }

                cad += datTabla + "<tbody></table>";
                
                $("#ctabMultas").html(cad);
            }
            function fnReportCertificado(dataReport)
            {
                $("#ctabCertificado").html('');
                cad = " <table class='table table-condensed table-hover'> " +
                        "<thead>" + 
                            "<tr>" +
                                "<th> # </th>"+
                                "<th> Tipo de Certificado </th>"+
                                "<th> Especialidad</th>"+
                                "<th> Asunto</th>"+
                                "<th> Nro. Recibo </th>"+
                                "<th> Fecha</th>"+
                                "<th> Nro.</th>"+
                                "<th> Imprimir</th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>";
                        datTabla = "";
                for(var i = 0 ; i < dataReport.length; i++)
                {
                    datTabla +=  "<tr>"+
                                
                                "<td>"+(i+1)+
                                "</td>"+
                                "<td>"+dataReport[i].conceptoPago+
                                "</td>"+
                                "<td>"+dataReport[i].valor+
                                "</td>"+
                                "<td>"+dataReport[i].asunto+
                                "</td>"+
                                "<td>"+dataReport[i].recibo+
                                "</td>"+
                                "<td>"+dataReport[i].fecha+
                                "</td>"+
                                "<td>"+dataReport[i].nroConstancia+
                                "</td>"+
                                "<td>"+"<a href='#tab_1'><i class='fa fa-print'></i></a>"+
                                "</td>"+
                                "</tr>";

                }

                cad += datTabla + "<tbody></table>";
                
                $("#ctabCertificado").html(cad);
            }
            function fnReportFecha(dataReport)
            {
                $("#ctabPorFecha").html('');
                cad = " <table class='table table-condensed table-hover'> " +
                        "<thead>" + 
                            "<tr>" +
                                "<th> # </th>"+
                                "<th> Nro. Recibo </th>"+
                                "<th> Fecha </th>"+
                                "<th> Total </th>"+
                                "<th> Usuario </th>"+
                                "<th> Imprimir </th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>";
                        datTabla = "";
                for(var i = 0 ; i < dataReport.length; i++)
                {
                    datTabla +=  "<tr>"+
                                
                                "<td>"+(i+1)+
                                "</td>"+
                                "<td>"+dataReport[i].recibo+
                                "</td>"+
                                "<td>"+dataReport[i].fechaPago+
                                "</td>"+
                                "<td>"+dataReport[i].total+
                                "</td>"+
                                "<td>"+dataReport[i].name+
                                "</td>"+
                                "<td>"+"<a href='#tab_1'><i class='fa fa-print'></i></a>"+
                                "</td>"+
                                "</tr>";

                }

                cad += datTabla + "<tbody></table>";
                
                $("#ctabPorFecha").html(cad);
            }

            function fnPrintInformacion(deuda,fraccionamiento,habilidad)
            {
                informacion = "";
                console.log("habilidad->"+habilidad);   
                
                    infoHabilidad ='<label class="control-label" style="color: #05c3d9; font-weight: bold"> ('+habilidad+') </label>';
                if(habilidad == 'NO HABIL')
                {
                    infoHabilidad ='<label class="control-label" style="color: red; font-weight: bold"> ('+habilidad+') </label>';
                }
                
                    informacion+=infoHabilidad;
                if(fnTieneDeuda(deuda))
                {
                    informacion+='<label class="control-label lbinformacion" > (Multa) </label>';
                }
                if(fnTieneFracc(fraccionamiento))
                {
                    informacion+='<label class="control-label lbinformacion" > (Fraccionamiento)</label>';
                }

                $("#lbinformacion").html("Condición: "+informacion);


                var contMultas = deuda.length;

                if(contMultas>0)
                {
                    
                    $("#tabMultas").html("Multas<span class='badge badge-danger'> "+contMultas+" </span>");
                }
                else
                {
                    $("#tabMultas").html("Multas");   
                }

                var contFracc = fraccionamiento.length;

                if(contFracc > 0)
                {
                    $("#tabFraccionamiento").html("Fraccionamiento<span class='badge badge-blue'> 1 </span>");
                }
                else
                {
                    $("#tabFraccionamiento").html("Fraccionamiento");
                }

            }

            function fnHabilitar()
            {
                var ultimoPago = $("#ultimoPago").val();
                var dataFecha = $("#dataFecha").val();

                var fechaComparacion = new Date(ultimoPago.substr(0,4), e[ultimoPago.substr(4,2)], '01');

                var fechaActual = new Date(dataFecha.substr(0,4),e[dataFecha.substr(5,2)],dataFecha.substr(8,2));
                console.log("fActual->"+fechaActual);
                for(var k = 1 ; ; k++)
                {

                    fechaComparacion.setMonth( fechaComparacion.getMonth() + 1 );

                    if(fechaComparacion <= fechaActual){}
                    else{ break;}

                    var montoBitacora = 0;
                    for(var i=bitacoraPago.length-1; i >=0 ; i--)
                    {
                        var fechaBitacora = new Date(bitacoraPago[i].dFechaIni.substr(0,4),e[bitacoraPago[i].dFechaIni.substr(5,2)],bitacoraPago[i].dFechaIni.substr(8,2));
                        if(fechaComparacion >= fechaBitacora)
                        {
                            montoBitacora=bitacoraPago[i].nMonto;
                            
                            break;
                        }
                        
                    }
                    periodoMesPrint = fechaComparacion.getFullYear()+''+monthJ_mN[fechaComparacion.getMonth()];
                    console.log("Date->"+k+"->"+periodoMesPrint);

                    var markup = "<tr id='tr_"+ind_tr+"'>"+
                                    
                                    "<td>"+periodoMesPrint+
                                    "<input type='hidden' name='pMes[]' value='"+periodoMesPrint+"'>"+
                                    "</td>"+
                                    "<td>"+"Aportación"+
                                    "<input type='hidden' name='idConceptoPago[]' value='"+"01"+"'>"+
                                    "</td>"+
                                    "<td>"+montoBitacora+
                                    "<input type='hidden' name='individualPago[]' value='"+montoBitacora+"'>"+
                                    "</td>"+
                                    "<td><button type='button' class='btn btn-transparent red btn-outline btn-circle btn-sm active' onclick='deletePago("+ind_tr+");'> Quitar </button></td>"+
                                "</tr>";
                        ind_tr++;
                        $("#tablePagos").append(markup);
                }
                calculaTotal();

            }

            function cleanTablePagos()
            {
                $("#tablePagosBody").html('');
                $("#totalPago").val(0);
                ind_tr = 0;
                $("#montoRecibido").val('');
                $("#dTotalCambio").html("<h4>Cambio: <b>S/ 0.00 </b></h4>");
                
            }

            function cleanCalculadora()
            {
                $("#montoRecibido").val('');
                $("#dTotalCambio").html("<h4>Cambio: <b>S/ 0.00 </b></h4>");
            }

            function callActionName(codigoCIP)
            {

                $('#modalColegiados').modal('hide');
                $("#tipoBusqueda option:selected").removeAttr("selected");
                $("#tipoBusqueda option[value=3]").attr('selected', 'selected');

                $("#textoBusqueda").val(codigoCIP);
                
                busquedaColegiado();
    
            }

            $(document).ready(function() {
                
            $('#frmBusqueda').submit(function(event) { //Trigger on form submit
                     

                    var tipoBusqueda = $("#tipoBusqueda").val();
                    var textoBusqueda = $("#textoBusqueda").val();

                    if(tipoBusqueda == '3')
                    {
                        busquedaNombre();
                    }
                    else
                    {
                        busquedaColegiado();
                    }

                   
                    event.preventDefault(); //Prevent the default submit

                    
                });

            
            $("#conceptoPago" ).change( function() {
                    console.log($(this).val());
                    //var datoMonto = $("#"+$(this).val()).val();
                    
                    $("#totalConcepto").val(mapOption[$(this).val()]);

                });

            

            $('#frmPagos').submit(function(event) { //Trigger on form submit
                
                var periodoMes = $("input[name='pMes[]']").map(function(){return $(this).val();}).get();
                var conceptoPago = $("input[name='idConceptoPago[]']").map(function(){return $(this).val();}).get();
                var ultimoPago = $("#ultimoPago").val();

                console.log('tamaño->'+periodoMes.length);

                const mySet = new Set();
                var cont = 0;
                for(var i = 0; i<periodoMes.length; i++)
                {
                    if (conceptoPago[i] == '01') 
                    {   
                        
                        //mySet.add(parseInt(periodoMes[i]));
                        mySet.add(periodoMes[i]);
                        cont++;
                    }
                }

                var fValOtroConcepto = false;

                if(cont == 0 && periodoMes.length > 0)
                {
                    fValOtroConcepto = true;
                }

                console.log('->'+ cont);
                var valUltimo = '';
                for (let item of mySet)
                {
                    console.log(item);
                    valUltimo = item;
                }

                var sizeSet = mySet.size;

                console.log(mySet.size);
                console.log(valUltimo);

                console.log('Y ->'+ultimoPago.substr(0,4));
                console.log('M ->'+ultimoPago.substr(4,2));

                var d1 = new Date(ultimoPago.substr(0,4), ultimoPago.substr(4,2), '01');
                var d2 = new Date(valUltimo.substr(0,4), valUltimo.substr(4,2), '01');
                console.log("fecUltimo->"+d1);
                var ydiff = d2.getYear() - d1.getYear();
                var mdiff = d2.getMonth() - d1.getMonth();
                var ddiff = 1 + d2.getDate() - d1.getDate();

                var diff = ydiff*12 + mdiff ;

                console.log('diff->' + diff);
                var secuenciaValida = false;
                if(cont == sizeSet && sizeSet == diff)
                {
                    secuenciaValida = true;
                }

                if(secuenciaValida || fValOtroConcepto)
                {
                    var token = $("#token").val();

                    $.ajax({ //Process the form using $.ajax()
                        type      : 'POST', //Method type
                        url       : 'registroPago', //Your form processing file URL
                        headers   : {'X-CSRF-TOKEN':token},
                        data      : $('#frmPagos').serialize(), //Forms name
                        dataType  : 'json',
                        success   : function(data) {
                                        if (data.success) { //If fails

                                            var datos=data.mensaje;
                                            $("#printBoucher").attr("href", "pdfPrint?idTransaccion="+datos);
                                            $('#myModal').modal('show');
                                            
                                            
                                        }
                                        else {
                                                alert(data.mensaje);
                                            }
                                        }
                    });
                }
                else
                {
                    alert("No se puede guardar una secuencia de meses incorrectos.");
                }
                    /*
                   

                    */
                    event.preventDefault(); //Prevent the default submit
                    
                    
                });

            });
            
            function fnTieneDeuda(dataDeuda)
            {
                flag = false;
                console.log("tam->"+dataDeuda.length);
                if(dataDeuda.length>0)
                {
                    flag = true;
                }

                return flag;
            }

            function fnTieneFracc(dataFracc)
            {
                flag = false;

                if(dataFracc.length>0)
                {
                    flag = true;
                }

                return flag;
            }


            function readSelecOption(lista1, lista2, lista3, habilidad)
            {
                $("#conceptoPago").html('');
                selecPOption = lista1;
                

                var flagCondicion = false;
                var flagDeuda = fnTieneDeuda(lista1);
                var flagCondConstancia = false;

                if(habilidad == 'NO HABIL' || flagDeuda == true)
                {
                    flagCondicion = true;
                }

                if(lista2.length > 0 || flagDeuda == true)
                {
                    flagCondConstancia = true;
                }

                Array.prototype.push.apply(selecPOption, lista2);
                Array.prototype.push.apply(selecPOption, lista3);

                var nArray = new Array();
                for(var i = 0; i<selecPOption.length; i++)
                {
                    
                    idFDeuda = selecPOption[i].idConceptoPago;
                    nArray[selecPOption[i].idConceptoPago] = selecPOption[i].montoPago;

                    markup = '<option value="'+selecPOption[i].idConceptoPago+'">'+selecPOption[i].conceptoPago+'</option>';

                    if(idFDeuda == '01')
                    {
                        markup = '<option value="'+selecPOption[i].idConceptoPago+'" selected="selected">'+selecPOption[i].conceptoPago+'</option>';
                    }

                    if((idFDeuda == '91' || idFDeuda == '92' || idFDeuda == '90') && flagCondicion == true)
                    {
                        markup = '';
                    }

                    if(idFDeuda == '17' && flagCondConstancia == true)
                    {
                        markup = '';
                    }
                    
                    $("#conceptoPago").append(markup);
                }

                mapOption = nArray;

                $("#totalConcepto").val(mapOption['01']);

            }
        </script>

        <script type="text/javascript">
            function calculaTotal()
            {   var totalMonto = 0;
                
                var monto = $("input[name='individualPago[]']").map(function(){return $(this).val();}).get();
                monto.forEach(function(element) {
                    totalMonto=totalMonto+parseFloat(element);
                });
                

                console.log(totalMonto);
                $("#totalPago").val(totalMonto);

                $("#dTotalPago").html("<h3>Total Pago <b>S/ "+totalMonto+"</b></h3>");

                //for (var i = 0; i <inps.length; i++) {
            }

            function fnAgregar()
            {
                var periodo = $("#periodo").val();
                var periodoMes = $("#periodoMes").val();
                var idConceptoPago = $("#conceptoPago").val();
                var conceptoPago = $( "#conceptoPago option:selected" ).text();
                var totalConcepto = $("#totalConcepto").val();

                var ultimoPago = $("#ultimoPago").val();


                var valCont = 0;

                periodoMes.forEach(function(element) {
                  
                  var pmes = periodo+element;

                    if(pmes <= ultimoPago )
                    {
                        console.log('No puede ser menor.');
                        valCont ++;
                    }
                    else
                    {
                        var markup = "<tr id='tr_"+ind_tr+"'>"+
                                    
                                    "<td>"+pmes+
                                    "<input type='hidden' name='pMes[]' value='"+pmes+"'>"+
                                    "</td>"+
                                    "<td>"+conceptoPago+
                                    "<input type='hidden' name='idConceptoPago[]' value='"+idConceptoPago+"'>"+
                                    "</td>"+
                                    "<td>"+totalConcepto+
                                    "<input type='hidden' name='individualPago[]' value='"+totalConcepto+"'>"+
                                    "</td>"+
                                    "<td><button type='button' class='btn btn-transparent red btn-outline btn-circle btn-sm active' onclick='deletePago("+ind_tr+");'> Quitar </button></td>"+
                                "</tr>";
                        ind_tr++;
                        $("#tablePagos").append(markup);   
                    }


                });

                if(valCont > 0)
                {
                    alert("El mes de pago no puede ser menor al Ultimo pago realizado");
                }

                calculaTotal();
                cleanCalculadora();
            }
            function deletePago(ind)
            {
                $( "#tr_"+ind ).remove();
                calculaTotal();
                cleanCalculadora();
            }
            function fnQuitar()
            {
                cleanTablePagos();
                /*
                $("#tablePagos").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
                });*/

                calculaTotal();
                cleanCalculadora();
            } 

            function fnCalculadora()
            {
                $('#modalCalculadora').modal('show');
            }

            $( "#montoRecibido" ).keyup(function() {

                var montoRecibido = $("#montoRecibido").val();
                var totalPago = $("#totalPago").val();
                var cambio = montoRecibido - totalPago;

                $("#dTotalCambio").html("<h4>Cambio: <b>S/ "+cambio+"</b></h4>");
              
            });
            

        </script>

        <script type="text/javascript">
        
        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        
        $(document).ready(function() {
            
            //pageSetUp();
            $("#myModal").on('hidden.bs.modal', function () {
            
            location.reload();

            });

            $('.datepicker').datepicker();

        })



        </script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>