<template>
    <div>
		<form class="smart-form"   v-on:submit.prevent="enviarEdit">
			<header>
				<h1>{{usuarios.name}}</h1>
				<span> nota: para hacer el update se necesita el campo por quien fue creado - SI ESE CAMPO ESTA VACIO NO HAA EL UPDATE</span>
			</header>

			<fieldset>
				<fieldset>
					<div class="row">
						<section class="col col-6">
							<label class="label">PATERNO</label>
							<label class="input"> <i class="icon-prepend fa fa-user"></i>
								<input type="text" name="fname" v-model="usuarios.paterno" placeholder="apellido paterno">
							</label>
						</section>
						<section class="col col-6">
							<label class="label">MATERNO</label>
							<label class="input"> <i class="icon-prepend fa fa-user"></i>
								<input type="text" name="lname" v-model="usuarios.materno" placeholder="apellido materno">
							</label>
						</section>
					</div>
					<section>
						<label class="label">Nombre</label>
						<label class="input">
							<input type="text" v-model="usuarios.name" class="input-sm">
						</label>
					</section>
					<section>
						<label class="label">UserName</label>
						<label class="input">
							<input type="text" v-model="usuarios.username" class="input-sm">
						</label>
					</section>
					<div class="row">
						<section class="col col-6">
							<label class="label">EMAIL</label>
							<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
								<input type="email" name="email" v-model="usuarios.email" placeholder="E-mail">
							</label>
						</section>
						<section class="col col-6">
							<label class="label">CELULAR</label>
							<label class="input"> <i class="icon-prepend fa fa-phone"></i>
								<input type="tel" name="phone" v-model="usuarios.celular" placeholder="Phone" data-mask="(999) 999-9999">
							</label>
						</section>
					</div>
				</fieldset>
				<!-- <section>
					<label class="input"> <i class="icon-append fa fa-lock"></i>
						<input id="password" type="password" v-model="usuarios.password" name="password" placeholder="Password" >
						<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
						
				</section>
				<section>
					<label class="input"> <i class="icon-append fa fa-lock"></i>
						<input id="password-confirm" type="password"   v-model="usuarios.password" name="password_confirmation" required placeholder="Confirm password">
						<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
				</section> -->
				<fieldset>
					<div class="row">
						<section class="col col-5">
							<label class="label">DNI</label>
							<label class="input">
								<input type="text" name="Dni" v-model="usuarios.dni" placeholder="DNI">
							</label>
						</section>
						<section class="col col-5">
							<label class="label">CODIGO CIP</label>
							<label class="input">
								<input type="text" name="codigo cip" v-model="usuarios.codigoCIP" placeholder="Codigo cip">
							</label>
						</section>
						<section class="col col-2">
							<label class="label">CREADOR</label>
							<label class="input">
								<input type="text"  v-model="usuarios.usuarioCreador" style="background:#666973">
							</label>
						</section>
						<section>
							<label class="label">DIRECCION</label>
							<label class="input">
								<input type="text" v-model="usuarios.direccion" class="input-xs">
							</label>
						</section>
					</div>
				</fieldset>							
			</fieldset>
			<footer>
				<button type="submit" class="btn btn-primary" @click="subirdDatos">
					Submit
				</button>
				<button type="button" class="btn btn-default" >
					<a href="/user"> back</a>
				</button>
			</footer>
		</form>
	</div>

</template>
<script>
export default {
    props:["datos"],
    data (){
        return{
            usuarios: this.datos,
        }
    },
	methods:{
		enviarEdit(){
			  const params ={
                
				paterno:this.usuarios.paterno ,
				materno:this.usuarios.materno ,
				name:this.usuarios.name ,
				username:this.usuarios.username ,
				email:this.usuarios.email ,
				celular:this.usuarios.celular ,
				dni:this.usuarios.dni ,
				codigoCIP:this.usuarios.codigoCIP ,
				usuarioCreador:this.usuarios.usuarioCreador ,
				direccion:this.usuarios.direccion ,
				
            };
            axios.put(`/user/${this.usuarios.id}`,params).then((response)=>{
			
						console.log("lsito ")
						// document.location.href = "../../	user";
			
            });
			
		}
	}
    
}
</script>