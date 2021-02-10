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

    <head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        
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
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
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

        
        @media print{

            @page {
           /* declaraciones Css */
           font-size: 10px !important;
            }

            #divTop {
                display: none;
            }
            #divReporteDM #tablePrint {
                border: 1px solid black;
                font-size: 10px !important;
            }
            .portlet-title {
                display: none;
            }
            .portlet.light.bordered {
                border: 0px solid #e7ecf1!important;   
            }

            header.onlyprint {
                position: fixed; /* Display only on print page (each) */
                top: 0; /* Because it's header */
            }

            footer.onlyprint {
                position: fixed;
                bottom: 0; /* Because it's footer */
            }
        }

        @media screen {
            
            header.onlyprint, footer.onlyprint{
                display: none; /* Hide from screen */
            }


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
                        
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> Nick </span>
                                <!--i class="fa fa-angle-down"></i-->
                            </a>
                            
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

                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Pagos</span>
                                <span class="arrow"></span>
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
                         <li class="nav-item  active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Reporte</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/reporteDM" class="nav-link ">
                                        <span class="title">Diario - Mensual
                                            </span>
                                    </a>
                                </li>
                                <li class="nav-item active open">
                                    <a href="/rptCertif" class="nav-link ">
                                        <span class="title">Certificados
                                            </span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/rptFracc" class="nav-link ">
                                        <span class="title">Rpt Fraccionamientos
                                            </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="/rptOpeColegiado" class="nav-link ">
                                        <span class="title">Operaciones Colegiado
                                            </span>
                                    </a>
                                </li>
                                <!--li class="nav-item  ">
                                    <a href="/rptDetalle" class="nav-link ">
                                        <span class="title">Detallado
                                            </span>
                                    </a>
                                </li-->
                                
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
                                            <span class="caption-subject font-blue-sharp bold uppercase">Sistema de cobranza: Reporte de Certificados</span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row" id="divTop">

                                        <form id="frmRptCertificados" class="" role="form">
                                        <input type="hidden" id="token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="control-label col-md-1 form-horizontal" style="text-align: right;">Desde: </label>

                                        <div class="col-md-2">
                                                
                                        <div class="input-group date" id="datepicker_">
                                            <input type="text" name="fechaDesde" class="form-control input-sm" id="fechaDesde" value="{{$fechaActual[0]->fecha}}">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                        </div>
                                        </div>

                                        <label class="control-label col-md-1 form-horizontal" style="text-align: right;">Hasta: </label>

                                        <div class="col-md-2">
                                                
                                        <div class="input-group date" id="datepicker_">
                                            <input type="text" name="fechaHasta" class="form-control input-sm" id="fechaHasta" value="{{$fechaActual[0]->fecha}}">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                        </div>
                                        </div>

                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-circle green" href="javascript:void(0);">Consultar</button>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-1">

                                        <input type="button" id="btnExport" class="btn purple mt-ladda-btn ladda-button btn-outline btn-circle" value=" Exportar Excel " />

                                        </div>

                                        <div class="col-md-1">

                                        <input type='button' id='btn' class="btn btn-circle dark" value='Imprimir' onclick='printDiv("divReporteDM");'>

                                        <!--button class="btn blue mt-ladda-btn ladda-button btn-outline btn-circle" onclick="window.print()">Imprimir</button-->
                                        </div>

                                        </div>

                                            
                                        </form>

                                        </div>
                                        <br>
                                        <header class="onlyprint" >Reporte emitido el: {{ date('Y')}}</header>
                                        <div class="row" id="divReporteDM">
                                            
                                        </div>
                                        <footer class="onlyprint" id="pageFooter">
                                        Content Goes Here</footer>
                                       
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

              </div>
              
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> Colegio de Ingenieros del Perú - Sede Puno
                
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

        <script src="assets/global/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datepicker/bootstrap-timepicker.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        
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
            

        </script>

        <script type="text/javascript">
        
        

        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        
        $(document).ready(function() {
            
            //pageSetUp();
            $("#myModal").on('hidden.bs.modal', function () {
            
            //location.reload();
            busquedaColegiado();

            });

            $('#fechaDesde').datepicker({
                format: 'yyyy-mm-dd' 
            });

            $('#fechaHasta').datepicker({
                format: 'yyyy-mm-dd' 
            });

            $('#frmRptCertificados').submit(function(event) {

                var token = $("#token").val();

                    $.ajax({ //Process the form using $.ajax()
                        type      : 'POST', //Method type
                        url       : 'rptCertificados', //Your form processing file URL
                        headers   : {'X-CSRF-TOKEN':token},
                        data      : $('#frmRptCertificados').serialize(), //Forms name
                        dataType  : 'json',
                        success   : function(data) {
                                        if (data.success)
                                        {
                                            fnReporteDiarioMensual(
                                                data.arCertData
                                                )
                                        }
                                        else
                                        {
                                            alert(data.mensaje);
                                        }
                                    }
                    });


            event.preventDefault();
            });

        })

        function fnReporteDiarioMensual(
                                        arCertData
                                        )
        {
            console.log(arCertData[0].fecha);
            $("#divReporteDM").html('');
                cad = " <table class='table table-striped table-bordered table-hover table-checkable order-column' id='tablePrint'> " +

                        "<thead>" + 
                            "<tr>" +
                                "<th style='width:3%'> # </th>"+
                                "<th style='width:8%'> Fecha </th>"+
                                "<th style='width:6%'> ID </th>"+
                                "<th style='width:8%'> Nro. Certificado</th>"+
                                "<th style='width:8%'> Comprobante Serie - Número</th>"+
                                "<th style='width:7%'> Código CIP </th>"+
                                "<th style='width:20%'> Nombres del Colegiado </th>"+
                                "<th style='width:15%'> Especialidad </th>"+
                                "<th style='width:18%'> Tipo de Certificado</th>"+
                                "<th style='width:7%'> Total</th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>";
                        datTabla = "";
                sumTotal = 0;
                for(var i = 0 ; i < arCertData.length; i++)
                {
                    datTabla +=  "<tr>"+
                                
                                "<td style='text-align: right;'>"+(i+1)+
                                "</td>"+
                                "<td>"+arCertData[i].fecha+
                                "</td>"+
                                "<td>"+arCertData[i].identificador+
                                "</td>"+
                                "<td>"+arCertData[i].nroCertificado+
                                "</td>"+
                                "<td>"+arCertData[i].nroComprobante+
                                "</td>"+
                                "<td style='text-align: right;'>"+arCertData[i].codigoCIP+
                                "</td>"+
                                "<td>"+arCertData[i].nombres+
                                "</td>"+
                                "<td>"+arCertData[i].especialidad+
                                "</td>"+
                                "<td>"+arCertData[i].conceptoPago+
                                "</td>"+
                                "<td style='text-align: right;'>"+arCertData[i].montoPago.toFixed(2)+
                                "</td>"+
                                "</tr>";

                    sumTotal +=arCertData[i].montoPago;

                }
                    datTabla +=  "<tr>"+
                                "<td colspan='9' style='text-align: right;'>"+"Total:"+
                                "</td>"+
                                "<td style='text-align: right;'>"+sumTotal.toFixed(2)+
                                "</td>"+
                                "</tr>";
                cad += datTabla + "<tbody></table>";
                
                $("#divReporteDM").html(cad);
        }

        $("#btnExport").click(function(e) {
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#divReporteDM').html()));
        e.preventDefault();
    });

        function printDiv(div) 
{

  var divToPrint=document.getElementById(div);

  var newWin=window.open('','win3','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=800,height=640,directories=no,location=no');

  newWin.document.open();

  newWin.document.write('<html><head><style type="text/css"> table, th, td {'+
  'border-collapse: collapse; border: 1px solid black; font: 10px Arial; padding: 5px;}</style></head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
        </script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>