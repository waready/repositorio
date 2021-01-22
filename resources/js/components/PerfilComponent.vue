<template>
    <div class="row container">
        
        <div class="col-md-3">
            <ul class="list-unstyled profile-nav">
                <li>
                    <img :src="'/img/'+datos.nombreFoto" class="img-responsive pic-bordered" alt="" />
                    <a  class="profile-edit"> {{datos.id}} </a>
                </li>
                <li>
                    <a> Nombres:  {{datos.nombres.toUpperCase()}} </a>
                </li>
                 <li>
                    <a> Apellido Paterno:  {{datos.paterno. toUpperCase()}}   </a>
                </li>
                 <li>
                    <a> Apellido Materno:   {{datos.materno.toUpperCase()}}   </a>
                </li>
                <li>
                    <a> Codigo Cip
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
                                        
                    <h2 class="font-  uppercase" >
                        <div v-for="item in especialidad.mensaje" :key="item.id">
                                {{item.titulo}}
                        </div>
                    </h2>
                    <h3 class="font-green  uppercase">
                        
                        {{datos.name}}
                    </h3>

                    <p> 
                        Correo Electronico:
                        <a > {{datos.email}} </a>
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
                                <a class="reload" href=""> </a>
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
                    <li class="active">
                        <a href="#tab_1_11" data-toggle="tab"> Eliminar </a>
                    </li>
                    <li class="">
                        <a href="#tab_1_22" data-toggle="tab"> Historial </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1_11">
                        <div class="portlet-body">
                            <div>
                                <div class="margin-top-10">
                                    <a @click="eliminar" class="btn red"> Eliminar Usuario </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tab-pane-->
                    <div class="tab-pane " id="tab_1_22">
                        <div class="tab-pane " id="tab_1_1_1">
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
                                        <a href="">
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
    props:['datos','especialidad'],
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
                axios.delete(`/user/${this.datos.id}`).then((response) => {
                    //console.log('tag', response)
                   document.location.href = "../../user/";
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
