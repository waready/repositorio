<template>
    <div >

        <div class="row profile-account">
            <div class="col-md-3">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1-1">
                            <i class="fa fa-cog"></i> Datos  Personales </a>
                        <span class="after"> </span>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_2-2">
                            <i class="fa fa-picture-o"></i> Foto de Perfil </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_3-3">
                            <i class="fa fa-lock"></i> Cambio de contraseña </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_4-4">
                            <i class="fa fa-eye"></i> Privacidad Y Roles </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div id="tab_1-1" class="tab-pane active">
                        <form role="form" action="#"   v-on:submit.prevent="enviarEdit()">
                            <div class="form-group">
                                <label class="control-label">Nombres</label>
                                <input type="text" v-model="respuesta.nombres" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Apellido Paterno</label>
                                <input type="text" v-model="respuesta.paterno" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Apellido Materno</label>
                                <input type="text" v-model="respuesta.materno" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">DNI</label>
                                <input type="text" v-model="respuesta.dni" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Numero de Celular</label>
                                <input type="text" v-model="respuesta.celular" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Codigo Cip</label>
                                <input type="text" v-model="respuesta.codigoCIP" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" v-model="respuesta.email" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Direccion</label>
                                <input type="text" v-model="respuesta.direccion" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Usuario : (Cambios)</label>
                                <input type="text" placeholder="admin" class="form-control" disabled /> </div>
                            <div class="margiv-top-10">
                                <button  type="submit" class="btn green"> Save Changes </button>
                                <a  class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                    <div id="tab_2-2" class="tab-pane">
                        <p> suba su nueva imagen por favor!
                            </p>
                        <form  role="form" method="POST" enctype="multipart/form-data"  action="/imagen">
                            <input type="hidden" name="_token" v-model="csrfToken">
                            <input type="hidden" name="id" v-model="respuesta.id">
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img :src="'http://localhost:8000/img/' + respuesta.nombreFoto " alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> Selecione Imagen </span>
                                            <span class="fileinput-exists"> Canbiar </span>
                                            <input type="file" name="image"> </span>
                                        <a  class="btn default fileinput-exists" data-dismiss="fileinput"> Quitar </a>
                                    </div>
                                </div>
                                <div class="clearfix margin-top-10">
                                    <span class="label label-danger"> NOTA! </span>
                                    <span> (menor a 10 mb ) en formato jpg.</span>
                                </div>
                            </div>
                            <div class="margin-top-10">
                                <button type="submit" class="btn green"> Guardar </button>
                                <a class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                    <div id="tab_3-3" class="tab-pane">
                        
                        <form action="#"  v-on:submit.prevent="enviarEdit()">
                            <!-- <div class="form-group">
                                <label class="control-label">Cambia tu Password</label>
                                <input type="password" class="form-control" /> </div> -->
                            <div class="form-group">
                                <label class="control-label">Nueva Password (opcional)</label>
                                <input type="password" v-model="password" class="form-control" /> </div>
                            <!-- <div class="form-group">
                                <label class="control-label">Re-type New Password</label>
                                <input type="password" class="form-control" /> </div>    -->
                            <div class="margin-top-10">
                                <button type="submit" class="btn green"> Change Password </button>
                                <a class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                    <div id="tab_4-4" class="tab-pane">
                        <form action="#">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td> pagos y remuneraciones </td>
                                    <td>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                <span></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> crear usuarios nuevos </td>
                                    <td>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                <span></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> generar reportes </td>
                                    <td>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                <span></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> colegiado limitado </td>
                                    <td>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="optionsRadios41" value="option1" checked/> Yes
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="optionsRadios41" value="option2" /> No
                                                <span></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!--end profile-settings-->
                            <div class="margin-top-10">
                                <a href="javascript:;" class="btn green"> Save Changes </a>
                                <a href="javascript:;" class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end col-md-9-->
        </div>
    </div>
</template>
<script>
export default {
    props:['datos','csrfToken' ],
    data (){
        return{
            respuesta: this.datos,
            password:null,
            imagen:[]
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
        },
        enviarEdit(){
			  const params ={

				paterno:this.respuesta.paterno ,
				materno:this.respuesta.materno ,
				name:this.respuesta.name ,
				username:this.respuesta.username ,
				email:this.respuesta.email ,
				celular:this.respuesta.celular ,
				dni:this.respuesta.dni ,
				codigoCIP:this.respuesta.codigoCIP ,
				usuarioCreador:this.respuesta.usuarioCreador ,
                direccion:this.respuesta.direccion ,
                password:this.password,
				
            };
            axios.put(`/user/${this.respuesta.id}`,params).then((response)=>{
			
                console.log('tag', response)
				document.location.href = "../../user/"+this.respuesta.id;
			
            });
			
        },

    }
}

</script>