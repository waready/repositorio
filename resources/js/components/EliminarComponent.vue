<template>
    <div>
        <div class="margin-top-10">
            <a href="javascript:;" class="btn red"> Save Changes </a>
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