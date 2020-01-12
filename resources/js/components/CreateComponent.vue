<template>
	<div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Gestor Usuarios: Añadir Nuevo Usuario</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" class="horizontal-form" @submit.prevent="subirdDatos">
                        <div class="form-body">
                            <h3 class="form-section">Detalles Cuenta</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombres *</label>
                                        <input type="text" v-model="nombres"  class="form-control" placeholder="Nombres" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Apellido Paterno *</label>
                                        <input type="text" v-model="paterno"  class="form-control" placeholder="Apellido Paterno" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Apellido Materno *</label>
                                        <input type="text" v-model="materno"  class="form-control" placeholder="Apellido Materno" required>
                                    </div>                       
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <!-- <div class="form-group has-error">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Lim">
                                        <span class="help-block"> This field has error. </span>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="control-label">Género</label>
                                        <select class="form-control">
                                            <option value="">Masculino</option>
                                            <option value="">Femenino</option>
                                        </select>
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label">Código CIP/Usuario *</label>
                                        <input type="text" v-model="codigoCIP"  class="form-control" placeholder="Código CIP" required>
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label">DNI</label>
                                        <input type="number"  v-model="dni" class="form-control" placeholder="DNI">
                                    </div> 
                                </div>
                                <!--/span-->
                            </div>
                            <hr/>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">                                  
                                    <div class="form-group">
                                        <label class="control-label">Contraseña</label>
                                        <input type="password" v-model="password"  class="form-control" placeholder="Contraseña" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Confirmar Contraseña</label>
                                        <input type="password" v-model="password"  class="form-control" placeholder="Confirmar Contraseña" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email *</label>
                                        <input type="email" v-model="email"   class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">celular</label>
                                        <input type="phone" v-model="celular"   class="form-control" placeholder="Email" >
                                    </div>   
   
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">RUC</label>
                                        <input type="number" v-model="ruc"   class="form-control" placeholder="RUC">
                                    </div>   
                                    <div class="form-group">
                                        <label class="control-label">Fecha de Nacimiento</label>
                                        <input type="date" v-model="fechaNacimiento" class="form-control" placeholder="dd/mm/yyyy"> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Lugar de Nacimiento</label>
                                        <input type="text" v-model="lugarNacimiento"  class="form-control" placeholder="Lugar de Nacimiento">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">SEDE</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="Category 1">Category 1</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <hr/>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Departamento</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                           <option v-for="item in ciudad" :key="item" :value="item">{{item.valor}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">País</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option :value="paisNacimiento">{{paisNacimiento}}</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Distrito</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="Category 1">Category 1</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Provincia</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="Category 1">Category 1</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Lugar de Nacimiento</label>
                                        <input type="text" v-model="direccion" class="form-control" placeholder="Lugar de Nacimiento">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Condicion</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="Category 1">Category 1</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Enviar E-mail a este Usuario</label>
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>SI </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> NO </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Distrito</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="Category 1">Category 1</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Estado Civil</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="Category 1">Category 1</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="Category 1">Category 1</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            
                            <!--/row-->
                            <h3 class="form-section">Información de Trabajo</h3>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nombre de la Empresa</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" class="form-control"> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Departamento</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                         <option v-for="item in ciudad" :key="item" :value="item">{{item.valor}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Distrito</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="Category 1">Category 1</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirección Empresa</label>
                                        <input type="text" class="form-control"> </div>
                                
                                    <div class="form-group">
                                        <label class="control-label">Provincia</label>
                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option v-for="item in ciudad" :key="item" :value="item">{{item}}</option>

                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label>Teléfono Centro Laboral</label>
                                        <input type="text" class="form-control"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="button" v-on:click="date()" class="btn default">Cancel</button>
                            <button type="submit" class="btn blue">
                                <i class="fa fa-check"></i> Save</button>
                        </div>
                    </form>
                    {{ciudad}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['ciudad'],

   data(){
       return{
		//id:"7857",
        
        
        mamani:"mamani",
		name:'JUAN', 
		username:'JUAN', 
		email:'juan@gmail.com', 
		password:'123456789', 
        usertype:'deprecated',
         
		block:'0', 
        sendEmail:'0',
         
		registerDate:"2016-03-05 15:25:44", 
		lastvisitDate:"2016-03-05 15:25:44", 
		activation:0, 
		params:'{}', 
		codigoCIP:'101012', 
		paterno:'quispe', 
		materno:'mamani', 
		nombres:'juan andres', 
		ruc:'20932658', 
		paisNacimiento:'Peru',
		direccion:'Jr Nestor Molina',            
		dni:'0121444', 		
		celular:'93658412',		
		tipoColegiado:'1',			
        usuarioCreador:'admin',
        lugarNacimiento:'puno',
        fechaNacimiento:""
		
       }
   },
   methods:{
       subirdDatos(){
           const params ={
               id:null, 
               name:(this.nombres +' '+this.paterno +' '+ this.materno).toUpperCase(), 
               username:this.codigoCIP, 
               email:this.email, 
               password:this.password, 
               usertype:this.usertype, 
               block:this.block, 
               sendEmail:this.sendEmail, 
               registerDate:this.registerDate, 
               lastvisitDate:this.lastvisitDate, 
               activation:this.activation, 
               params:this.params, 
               codigoCIP:this.codigoCIP, 
               paterno:this.paterno, 
               materno:this.materno, 
               nombres:this.nombres,

			   ruc:this.ruc, 
               estadoUsuario:10, 
               lugarNacimiento:this.lugarNacimiento, 
               fechaNacimiento:this.fechaNacimiento, 
               //ubigeoNacimiento:'', 
               paisNacimiento:this.paisNacimiento, 
               //ubigeoDomicilio:'', 
               direccion:this.direccion, 
               //zona:'', 
               //codigoPostal:'', 
               //estadoCivil:null,
               dni:this.dni, 
                //telefono:'', 
                celular:this.celular, 
                //celular1:'', 
                //fax:'', 
                //emailcip:'', 
                //genero:'', 
                //pasaporte:'', 
                //url:'',
                tipoColegiado:this.tipoColegiado, 
                //ultimoPago: '000000', 
                //habilHasta: '000000', 
                usuarioCreador:this.usuarioCreador, 
                //usuarioModificador:'', 
                fechaModificacion:null, 
                //nombreFoto:null, 
                //oferta:'', 
                //ubigeoSede:'', 
                //nombreFirma:'', 
                //tipoTarjeta:'0'
            };
            axios.post('/user', params).then((response)=>{
                
                if(response.data.success){
                  
                     document.location.href = "../../user/" 
                    this.newMensaje="";
                }else {

                }
            
            })
       },
       destroyDatos(){
           axios.delete(`api/cip/${this.id}`).then(()=>{
               console.log("se elimino", this.id)
           })
       },
       date(){
           var a = new Date()
           console.log('tag', a.getFullYear()+"-"+a.getMonth()+"-"+a.getDate()+" "+a.getHours()+":"+ a.getMinutes()+":"+a.getSeconds())
       }
   }
}
</script>
