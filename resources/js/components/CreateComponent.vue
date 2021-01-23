<template>
	<div class="row">
        
        <div class="col-md-12">
            <div class="alert alert-success" v-if="correcto" role="alert">
               SE registro Correctamente!
            </div>
            <div class="alert alert-danger" v-if="incorrecto" role="alert">
               Error al registrar!
            </div>
            <div class="portlet box red-intense">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>Datos Colegiado - Ingreso
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" class="horizontal-form" @submit.prevent="subirdDatos">
                        <div class="form-body">
                            <h3>Datos Personales</h3>
                            <hr style="border: 1px solid red;" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombres: *</label>
                                        <input type="text" v-model="nombres"  class="form-control" placeholder="Nombres" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Apellido Paterno: *</label>
                                        <input type="text" v-model="paterno"  class="form-control" placeholder="Apellido Paterno" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Apellido Materno: *</label>
                                        <input type="text" v-model="materno"  class="form-control" placeholder="Apellido Materno" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Género:</label>
                                        <select class="form-control" v-model="genero">
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Ruc:</label>
                                        <input type="text" v-model="ruc"  class="form-control" placeholder="Nombres" required autofocus>
                                    </div> 
                                     <!-- <div class="form-group">
                                        <label class="control-label">Firma:</label>
                                        <input type="file"   class="form-control" placeholder="Nombres"  >
                                    </div>    -->
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Dni:</label>
                                        <input type="number"  v-model="dni" class="form-control" placeholder="DNI">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Estado Civil:</label>
                                        <select class="form-control" v-model="estadoCivil" >
                                            <option value="1">Soltero</option>
                                            <option value="2">Casado</option>
                                            <option value="5">Conviviente</option>
                                            <option value="4">Divorciado</option>
                                            <option value="3">Viudo(a)</option>
                                            <option value="6">No Consigna</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label">Celular:</label>
                                        <input type="phone" v-model="celular"   class="form-control" placeholder="Email" >
                                    </div>                                 
                                    <div class="form-group">
                                        <label class="control-label">Dirección:</label>
                                        <input type="text" v-model="direccion"  class="form-control" placeholder="Direccion">
                                    </div> 
                                    <!-- <div class="form-group">
                                        <label class="control-label">Foto:</label>
                                        <input type="file"   class="form-control" placeholder="Nombres"  >
                                    </div>   -->
                                </div>
                                <!--/span-->
                            </div>
                            <h3  >Datos del Colegiado Y Cuenta</h3>
                            <hr style="border: 1px solid red;" >
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">  
                                    <div class="form-group">
                                        <label class="control-label">Código CIP/Usuario: *</label>
                                        <input type="text" v-model="codigoCIP"  class="form-control" placeholder="Código CIP" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email: *</label>
                                        <input type="email" v-model="email"   class="form-control" placeholder="Email" required>
                                    </div>                                  
                                    <div class="form-group">
                                        <label class="control-label">Contraseña:</label>
                                        <input type="password" v-model="password"  class="form-control" placeholder="Contraseña" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Confirmar Contraseña:</label>
                                        <input type="password" v-model="password_confirmation"  class="form-control" placeholder="Confirmar Contraseña" required>
                                    </div>
                                    
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Sede:</label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="ubigeoSede">
                                            <option value="210101">Puno</option>
                                            <option value="211101">Juliaca</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Estado: </label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="estadoUsuario" >
                                            <option value="10">Habil</option>
                                            <option value="11">No Habil</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Condición: </label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="tipoColegiado" >
                                            <option value="5">En Tramite</option>
                                            <option value="0">Fallecido</option>
                                            <option value="1">Incorporado</option>
                                            <option value="7">Incorporado Nacional</option>
                                            <option value="6">Nacional</option>
                                            <option value="4">Temporal</option>
                                            <option value="2">Transferido Nacional</option>
                                            <option value="3">Vitali</option>
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
                                <!--/span-->
                            </div>
                            <hr/>
                            <!--/row-->
                            <h3>Ubigeo</h3>
                            <hr style="border: 1px solid red;" >
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de Nacimiento:</label>
                                        <input type="date" v-model="fechaNacimiento" class="form-control" placeholder="dd/mm/yyyy"> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Departamento:</label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="departamento">
                                            <option v-for="item in departamentos" :key="item.valor" >
                                                {{item.valor}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Lugar de Nacimiento:</label>
                                        <input type="text" class="form-control" placeholder="Lugar de Nacimiento">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Provincia:</label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="provincia" >
                                            <option v-for="item in filtroProvincia" :key="item.codigo" >
                                                {{item.valor}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">País: {{paisNacimiento}}</label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="paisNacimiento">
                                            <option v-for="item in pais" :key="item.codigo" :value="item.codigo">{{item.valor}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Distrito: {{distrito}}</label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="distrito">
                                            <option v-for="item in filtroDistrito" :key="item.codigo" :value="item.codigo">{{item.valor}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!--/row-->
                            <h3>Información de Trabajo</h3>
                            <hr style="border: 1px solid red;" >
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nombre de la Empresa:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cargo:</label>
                                        <input type="text" class="form-control"> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Departamento:</label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="departamentoTraba">
                                         <option v-for="item in departamentos" :key="item.valor" >
                                            {{item.valor}}
                                        </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Distrito: {{distritoTraba}}</label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="distritoTraba" >
                                            <option v-for="item in filtroDistritoTraba" :key="item.codigo" :value="item.codigo" >{{item.valor}}</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirección Empresa:</label>
                                        <input type="text" class="form-control"> </div>
                                
                                    <div class="form-group">
                                        <label class="control-label">Provincia:</label>
                                        <select class="form-control" data-placeholder="Choose a Category" v-model="provinciaTraba" >
                                            <option v-for="item in filtroProvinciaTraba" :key="item.codigo" >
                                                {{item.valor}}
                                            </option>   
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label>Teléfono Centro Laboral:</label>
                                        <input type="text" class="form-control"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="button" v-on:click="date()" class="btn default">Cancel</button>
                            <template v-if="!validator">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i>Guardar
                                </button>
                            </template>
                            <template v-else>
                                <button type="button" class="btn red" disabled:true>
                                    <i class="fa fa-pause-circle"></i>Confirme la contraseña
                                </button>
                            </template>
                        </div>
                    </form>
                    <!-- <div>
                        {{imagen}}
                        <input type="file" name="image" @change="getImage" accept="image/*">
                        <button @click="updateAvatar">Subir Imagen</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $ from 'jquery'
export default {
    props:['pais'],
    mounted(){
        axios.get(`/api/params`).then((response) =>{
            this.departamentos = response.data.departamento;
            this.provincias = response.data.provincia;
            this.distritos = response.data.distrito;
        });
    },
   data(){
       return{
        correcto:false,
        incorrecto:false,
        imagen : null,


		//id:"7857",
        departamentos:[],
        provincias:[],
        distritos:[],

        departamento:null,
        provincia:null,
        distrito:null,

        departamentoTraba:null,
        provinciaTraba:null,
        distritoTraba:null,
        ubigeoSede:null,

        nombres:'juan andres', 
        paterno:'quispe', 
        materno:'mamani', 
        dni:'0121444',
        celular:'93658412',
        direccion:'Jr Nestor Molina',            
        estadoCivil:null,
        genero:null,         
                 
		codigoCIP:'101012', 		
		email:'juan@gmail.com', 
        password:'123456789', 
        password_confirmation:"123456789",
        estadoUsuario:null,


        usertype:'deprecated',
        
		block:'0', 
        sendEmail:'0',
         
		registerDate:"2016-03-05 15:25:44", 
		lastvisitDate:"2016-03-05 15:25:44", 
		activation:0, 
        
        
        params:'{}', 
		


		ruc:'20932658', 
		paisNacimiento:null,

		tipoColegiado:null,

        usuarioCreador:'admin',

        lugarNacimiento:'puno',

        fechaNacimiento:null
		
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
               paterno:this.paterno.toUpperCase(), 
               materno:this.materno.toUpperCase(), 
               nombres:this.nombres.toUpperCase(),

			   ruc:this.ruc, 
               estadoUsuario:this.estadoUsuario, 
               lugarNacimiento:this.lugarNacimiento, 
               fechaNacimiento:this.fechaNacimiento, 
               ubigeoNacimiento:this.distrito,  

               
               
               paisNacimiento:this.paisNacimiento, 
               //ubigeoDomicilio:'', 
               direccion:this.direccion, 
               //zona:'', 
               //codigoPostal:'', 
               estadoCivil:this.estadoCivil,
               dni:this.dni, 
                //telefono:'', 
                celular:this.celular, 
                //celular1:'', 
                //fax:'', 
                //emailcip:'', 
                genero:this.genero, 
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
                ubigeoSede:this.ubigeoSede, 
                //nombreFirma:'', 
                //tipoTarjeta:'0'
            };
          
            
     
            axios.post('/user', params).then((response)=>{
                
                if(response.data.success){
                  
                    document.location.href = "../../user/" 
   
                }else {
                    this.incorrecto=true; 
                   
                }
            
            })
       },



        getImage(event){
        //Asignamos la imagen a  nuestra data
        this.imagen = event.target.files[0];
        },
        updateAvatar(){
            //Creamos el formData
            var data = new  FormData();
            //Añadimos la imagen seleccionada
            data.append('avatar', this.imagen);
            //Añadimos el método PUT dentro del formData
            // Como lo hacíamos desde un formulario simple _(no ajax)_
            data.append('_method', 'POST');
            //Enviamos la petición
            axios.post('/dashboard/avatar',data)
            .then(response => {
                console.log('tag', response)
            })
        }


   },
   computed:{
       filtroProvincia(){
           var numero = []
           for(var i = 0; i<this.departamentos.length; i++){
               if(this.departamento == this.departamentos[i].valor){
                   numero.push(this.departamentos[i].codigo)
               }
           }
           return this.provincias.filter((juego)=> juego.extra == numero);
       },
       filtroDistrito(){
           var numero = []
           for(var i = 0; i<this.provincias.length; i++){
               if(this.provincia == this.provincias[i].valor){
                   numero.push(this.provincias[i].codigo)
               }
           }
           return this.distritos.filter((juego)=> juego.extra == numero);
       },
       filtroProvinciaTraba(){
           var numero = []
           for(var i = 0; i<this.departamentos.length; i++){
               if(this.departamentoTraba == this.departamentos[i].valor){
                   numero.push(this.departamentos[i].codigo)
               }
           }
           return this.provincias.filter((juego)=> juego.extra == numero);
       },
        filtroDistritoTraba(){
           var numero = []
           for(var i = 0; i<this.provincias.length; i++){
               if(this.provinciaTraba == this.provincias[i].valor){
                   numero.push(this.provincias[i].codigo)
               }
           }
           return this.distritos.filter((juego)=> juego.extra == numero);
       },
       validator(){
           if(this.password === this.password_confirmation){
                return false
           }
           else {
               return true
           }
           
       }
   }
}
</script>
