<template>
    <div class="row container">
        
        <div class="col-md-3">
            <ul class="list-unstyled profile-nav">
                <li>
                    <img :src="'http://localhost:8000/img/'+datos.nombreFoto" class="img-responsive pic-bordered" alt="" />
                    <a  class="profile-edit"> {{datos.id}} </a>
                </li>
                <li>
                    <a > Nombres:  {{datos.nombres.toUpperCase()}} </a>
                </li>
                 <li>
                    <a > Apellido Paterno:  {{datos.paterno. toUpperCase()}}   </a>
                </li>
                 <li>
                    <a > Apellido Materno:   {{datos.materno.toUpperCase()}}   </a>
                </li>
                <li>
                    <a > Codigo 
                        <span> {{datos.username}} </span>
                    </a>
                </li>
                <li>
                    <a > Activo : 
                         {{datos.habilHasta}} 
                    </a>
                </li>
               
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-8 profile-info">
                    <h1 class="font-green sbold uppercase">
                        {{datos.name}}
                    </h1>

                    <p> 
                        Correo Electronico:
                        <a href=""> {{datos.email}} </a>
                    </p>
                    <ul class="list-inline">
                        <li>
                            <i class="fa fa-map-marker"></i>Direccion: {{datos.direccion}} </li>
                        <li>
                            <i class="fa fa-calendar"></i>fecha de nacimiento: {{datos.fechaNacimiento}} </li>
                        <li>
                            <i class="fa fa-user"></i>DNI: {{datos.dni}}
                        <li>
                        <li>
                            
                            <i class="fa fa-briefcase"></i>RUC: {{datos.ruc}} </li>
                        <li>
                            <i class="fa fa-bank"></i> {{datos.codigoCIP}} </li>
                        
                    </ul>
                </div>
                <!--end col-md-8-->
                <!-- <div class="col-md-4">
                    <div class="portlet sale-summary">
                        <div class="portlet-title">
                            <div class="caption font-red sbold"> Sales Summary </div>
                            <div class="tools">
                                <a class="reload" href="javascript:;"> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="sale-info"> TODAY SOLD
                                        <i class="fa fa-img-up"></i>
                                    </span>
                                    <span class="sale-num"> 23 </span>
                                </li>
                                <li>
                                    <span class="sale-info"> WEEKLY SALES
                                        <i class="fa fa-img-down"></i>
                                    </span>
                                    <span class="sale-num"> 87 </span>
                                </li>
                                <li>
                                    <span class="sale-info"> TOTAL SOLD </span>
                                    <span class="sale-num"> 2377 </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <!--end col-md-4-->
            </div>
            <!--end row-->
            <div class="tabbable-line tabbable-custom-profile">
                <ul class="nav nav-tabs">
                    <!-- <li class="active">
                        <a href="#tab_1_11" data-toggle="tab"> Latest Customers </a>
                    </li> -->
                    <li class="active">
                        <a href="#tab_1_22" data-toggle="tab"> Historial </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- <div class="tab-pane active" id="tab_1_11">
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <i class="fa fa-briefcase"></i> Company </th>
                                        <th class="hidden-xs">
                                            <i class="fa fa-question"></i> Descrition </th>
                                        <th>
                                            <i class="fa fa-bookmark"></i> Amount </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Pixel Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Server hardware purchase </td>
                                        <td> 52560.10$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Smart House </a>
                                        </td>
                                        <td class="hidden-xs"> Office furniture purchase </td>
                                        <td> 5760.00$
                                            <span class="label label-warning label-sm"> Pending </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> FoodMaster Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                        <td> 12400.00$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> WaterPure Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Payment for Jan 2013 </td>
                                        <td> 610.50$
                                            <span class="label label-danger label-sm"> Overdue </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Pixel Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Server hardware purchase </td>
                                        <td> 52560.10$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Smart House </a>
                                        </td>
                                        <td class="hidden-xs"> Office furniture purchase </td>
                                        <td> 5760.00$
                                            <span class="label label-warning label-sm"> Pending </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> FoodMaster Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                        <td> 12400.00$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                    <!--tab-pane-->
                    <div class="tab-pane active" id="tab_1_22">
                        <div class="tab-pane active" id="tab_1_1_1">
                            <div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
                                <ul class="feeds">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-success">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> observacion de los datos
                                                        <span class="label label-danger label-sm"> accion principal
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> justo ahora</div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> cambio de contraseña </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> cambio de imagen </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> usuario creado </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-success">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 40 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-warning">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New user registered. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 1.5 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-success">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-inverse label-sm"> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-default">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 3 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-warning">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 5 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 18 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-default">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 21 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 22 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-default">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 21 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 22 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-default">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 21 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 22 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-default">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 21 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 22 hours </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--tab-pane-->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['datos'],
    data (){
     return{
         dato:{
             img:'logot.png'
         }
     }
    },
           
    methods:{
        eliminar(){
            //Ingresamos un mensaje a mostrar
            var mensaje = confirm("¿Esta seguro de eliminar este usuario?");
            //Detectamos si el usuario acepto el mensaje
            if (mensaje) {
            // alert("¡Gracias por aceptar!");
                axios.delete(`/user/${this.datos.id}`).then(() => {
                    console.log('hi'); 
                });
            }
            //Detectamos si el usuario denegó el mensaje
            else {
            alert("¡Haz denegado el mensaje!");
            }
            
            
        },
        editar(id){
            document.location.href = "../../user/"+id + "/edit";
        }
    }
}
</script>
