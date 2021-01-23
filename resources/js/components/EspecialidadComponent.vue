<template>
    <div>
        <div class="row">
            <div class="col-md-3">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class=""  v-for="(item) in respuesta" :key="item.id">
                        <a data-toggle="tab" href="#tab_1"  @click="identificadorEspe(item)">
                            <i class="fa fa-briefcase"></i> {{item.especialdiad}} 
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_2">
                            <i class="fa fa-plus"></i> Agregar Nuevo  </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="tab-content">
                    <div id="tab_1" class="tab-pane active">
                        <div v-if="mostrar">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>ESPECIALIDAD
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form action="" class="form-horizontal" v-on:submit.prevent="editarEspecialidad()">
                                        <div class="form-body">
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Capítulo:</label>
                                                <div class="col-md-5">

                                                    <select  class="form-control input-circle" :disabled="edit"  v-model="info.capitulo"  >
                                                        <option value="AGRICOLAS">AGRICOLAS</option>
                                                        <option value="AGROINDUSTRIALES">AGROINDUSTRIALES</option>
                                                        <option value="AGRONOMÍA">AGRONOMÍA</option>
                                                        <option value="CIVILES">CIVILES</option>
                                                        <option value="ECONOMISTAS">ECONOMISTAS</option>
                                                        <option value="ELECTRICISTAS">ELECTRICISTAS</option>
                                                        <option value="ELECTRONICA">ELECTRONICA</option>
                                                        <option value="ESTADISTICOS">ESTADISTICOS </option>
                                                        <option value="GEOLOGOS">GEOLOGOS</option>
                                                        <option value="MECANICOS ELECTRICISTAS">MECANICOS ELECTRICISTAS</option>
                                                        <option value="METALURGISTAS">METALURGISTAS</option>
                                                        <option value="MINAS">MINAS</option>
                                                        <option value="PESQUEROS">PESQUEROS</option>
                                                        <option value="QUIMICOS">QUIMICOS</option>
                                                        <option value="SISTEMAS">SISTEMAS</option>
                                                        <option value="TOPOGRAFÍA">TOPOGRAFÍA</option>
                                                        <!-- <option value="AMBIENTAL Y FORESTAL">AMBIENTAL Y FORESTAL</option> -->
                                                        <option value="CAP. TEMPORAL">CAP. TEMPORAL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Especialidad:</label>
                                                
                                                <div class="col-md-5">
                                                
                                                    <template v-if="info.capitulo == 'AGRICOLAS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="6">AGRICOLA</option>
                                                            <option value="34">SANITARIO</option>
                                                            <option value="32">SANITARIO Y AMBIENTAL</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'AGROINDUSTRIALES'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="13">AGROINDUSTRIAL</option>
                                                            <option value="29">ALIMENTOS</option>
                                                            <option value="15">INDUSTRIAS ALIMENTARIAS</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'AGRONOMÍA'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="1">AGRONOMÍA</option>
                                                            <option value="25">AMBIENTAL</option>
                                                            <option value="2">ZOOTECNIA</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'CIVILES'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="3">CIVIL</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'ECONOMISTAS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="7">ECONOMIA</option>
                                                            <option value="35">COMERCIAL</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'ELECTRICISTAS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="9">ELECTRICISTAS</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'ELECTRONICA'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="8">ELECTRONICOS</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'ESTADISTICOS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="4">ESTADISTICA</option>
                                                            <option value="24">ESTADISTICA E INFORMATICA</option>
                                                            <option value="5">INFORMATICA</option>   
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'GEOLOGOS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="12">GEOLOGOS</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'MECANICOS ELECTRICISTAS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="10">MECANICOS</option>
                                                            <option value="11">MECANICOS ELECTRICISTAS</option>
                                                            <option value="30">MECATRONICOS</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'METALURGISTAS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="17">METALURGISTAS</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'MINAS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="21">MINAS</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'PESQUEROS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="28">PESQUERIA ACUICULTOR</option>
                                                            <option value="18">PESQUEROS</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'QUIMICOS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="16">QUIMICOS</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'SISTEMAS'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="33">EMPRESARIAL Y DE SISTEMAS</option>
                                                            <option value="14">INDUSTRIALES</option>
                                                            <option value="31">INDUSTRIAS ALIMENTARIAS</option>
                                                            <option value="23">SISTEMAS</option>
                                                            <option value="27">SISTEMAS COMPUTACIONALES</option>
                                                            <option value="26">SISTEMAS E INFORMATICA</option>
                                                        </select>
                                                    </template>
                                                    <template v-if="info.capitulo == 'TOPOGRAFÍA'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="20">TOPOGRAFO Y AGRIMENSOR</option>
                                                        </select>
                                                    </template>
                                                    <!-- <template v-if="info.capitulo == 'AMBIENTAL Y FORESTAL'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            
                                                            <option value="34">SANITARIO</option>
                                                            <option value="32">SANITARIO Y AMBIENTAL</option>
                                                            
                                                        </select>
                                                    </template> -->
                                                    <template v-if="info.capitulo == 'CAP. TEMPORAL'">
                                                        <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idEspecialidad">
                                                            <option value="37">EMPRESARIAL E INFORMÁTICA</option>
                                                            <option value="38">ENERGÍAS RENOVABLES</option>
                                                            <option value="19">FORESTALES</option>
                                                            <option value="22">GEÓGRAFOS</option>
                                                            <option value="36">SEGURIDAD Y GESTIÓN MINERA</option>
                                                            <option value="39">TEXTIL Y DE CONFECCIONES</option>
                                                        </select>
                                                    </template>     
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Institución:</label>
                                                <div class="col-md-7">
                                                    <!-- <input type="text" v-model="info.institucion" class="form-control input-circle" :disabled="edit"> -->
                                                    <select class="form-control input-circle" :disabled="edit"  data-placeholder="Choose a Category" v-model="info.idInstitucion">
                                                        <option v-for="item in uni" :key="item.codigo" :value="item.codigo">{{item.valor}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Fecha de Incorporación:</label>
                                                <div class="col-md-5">
                                                    <input type="date" v-model="info.fechaIncorporacion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Fecha de Promoción:</label>
                                                <div class="col-md-5">
                                                    <input type="date" v-model="info.fechaPromocion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Fecha de Graduación:</label>
                                                <div class="col-md-5">
                                                    <input type="date" v-model="info.fechaGraduacion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Título Profesional:</label>
                                                <div class="col-md-5">
                                                    <input type="text" v-model="info.tituloProfesional" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Número de Resolución:</label>
                                                <div class="col-md-3">
                                                    <input type="text" v-model="info.numeroResolucion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Folio de Resolución:</label>
                                                <div class="col-md-3">
                                                    <input type="text" v-model="info.folioResolucion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Hoja de Resolución:</label>
                                                <div class="col-md-3">
                                                    <input type="text" v-model="info.hojaResolucion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Fecha de Revalidación:</label>
                                                <div class="col-md-5">
                                                    <input type="date" v-model="info.fechaRevalidacion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Núm. Resolución Revalidación:</label>
                                                <div class="col-md-5">
                                                    <input type="text" v-model="info.resolucionRevalidacion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Fecha de Inscripción:</label>
                                                <div class="col-md-5">
                                                    <input type="date" v-model="info.fechaInscripcion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                            <div class="form-group input-sm">
                                                <label class="col-md-4 control-label">Fecha de Juramentación:</label>
                                                <div class="col-md-5">
                                                    <input type="date" v-model="info.fechaJuramentacion" class="form-control input-circle" :disabled="edit" > 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9" >
                                                    <template v-if="!edit">
                                                        <button type="submit" class="btn btn-circle  green">Submit</button>
                                                        <button type="button" class="btn btn-circle grey-salsa btn-outline" @click="edit=true">Cancel</button>
                                                    </template>
                                                    <template v-else>
                                                        <button type="submit"  class="btn btn-circle red" style="display:" @click="eliminarEspecialidad(info.id)">Eliminar</button>
                                                        <button  type="button" class="btn btn-circle grey-salsa btn" @click="edit=false"> Editar</button> 
                                                        
                                                    </template>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    <!-- END FORM-->
                                </div>
                                </div>


                            </div>
                        </div>
                    <div id="tab_2" class="tab-pane">
                      <h4>Agregar Institución <button class="btn btn-circle" @click="isShow = !isShow"> <span class="badge badge-secondary">Nueva</span> </button></h4>
                        <form role="form" action="#"  v-on:submit.prevent="crearEspecialidad()">
                            <div class="form-group">
                                <label class="control-label">Capitulo</label>
                                <select class="form-control" data-placeholder="Choose a Category"  v-model="espe.capitulo" required>

                                    <option value="AGRICOLAS">AGRICOLAS</option>
                                    <option value="AGROINDUSTRIALES">AGROINDUSTRIALES</option>
                                    <option value="AGRONOMÍA">AGRONOMÍA</option>
                                    <option value="CIVILES">CIVILES</option>
                                    <option value="ECONOMISTAS">ECONOMISTAS</option>
                                    <option value="ELECTRICISTAS">ELECTRICISTAS</option>
                                    <option value="ELECTRONICA">ELECTRONICA</option>
                                    <option value="ESTADISTICOS">ESTADISTICOS </option>
                                    <option value="GEOLOGOS">GEOLOGOS</option>
                                    <option value="MECANICOS ELECTRICISTAS">MECANICOS ELECTRICISTAS</option>
                                    <option value="METALURGISTAS">METALURGISTAS</option>
                                    <option value="MINAS">MINAS</option>
                                    <option value="PESQUEROS">PESQUEROS</option>
                                    <option value="QUIMICOS">QUIMICOS</option>
                                    <option value="SISTEMAS">SISTEMAS</option>
                                    <option value="TOPOGRAFOS">TOPOGRAFOS</option>
                                    <option value="AMBIENTAL Y FORESTAL">AMBIENTAL Y FORESTAL</option>
                                    <option value="CAP. TEMPORAL">CAP. TEMPORAL</option>
                                </select>
                            </div>
                            <div class="form-group">    
                                {{espe.idEspecialidad}}

                                <label class="control-label">Especialidad</label>
                                <template v-if="espe.capitulo == ''"  v-model="espe.idEspecialidad">
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="">NINGUNO</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'AGRICOLAS'"  v-model="espe.idEspecialidad">
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="6">AGRICOLA</option>
                                        <option value="34">SANITARIO</option>
                                        <option value="32">SANITARIO Y AMBIENTAL</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'AGROINDUSTRIALES'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="13">AGROINDUSTRIAL</option>
                                        <option value="29">ALIMENTOS</option>
                                        <option value="15">INDUSTRIAS ALIMENTARIAS</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'AGRONOMÍA'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="1">AGRONOMÍA</option>
                                        <option value="25">AMBIENTAL</option>
                                        <option value="2">ZOOTECNIA</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'CIVILES'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="3">CIVIL</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'ECONOMISTAS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="7">ECONOMIA</option>
                                        <option value="35">COMERCIAL</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'ELECTRICISTAS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="9">ELECTRICISTAS</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'ELECTRONICA'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="8">ELECTRONICOS</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'ESTADISTICOS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="4">ESTADISTICA</option>
                                        <option value="24">ESTADISTICA E INFORMATICA</option>
                                        <option value="5">INFORMATICA</option>   
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'GEOLOGOS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="12">GEOLOGOS</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'MECANICOS ELECTRICISTAS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="10">MECANICOS</option>
                                        <option value="11">MECANICOS ELECTRICISTAS</option>
                                        <option value="30">MECATRONICOS</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'METALURGISTAS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="17">METALURGISTAS</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'MINAS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="21">MINAS</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'PESQUEROS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="28">PESQUERIA ACUICULTOR</option>
                                        <option value="18">PESQUEROS</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'QUIMICOS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="16">QUIMICOS</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'SISTEMAS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="33">EMPRESARIAL Y DE SISTEMAS</option>
                                        <option value="14">INDUSTRIALES</option>
                                        <option value="31">INDUSTRIAS ALIMENTARIAS</option>
                                        <option value="23">SISTEMAS</option>
                                        <option value="27">SISTEMAS COMPUTACIONALES</option>
                                        <option value="26">SISTEMAS E INFORMATICA</option>
                                    </select>
                                </template>
                                <template v-if="espe.capitulo == 'TOPOGRAFOS'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="20">TOPÓGRAFO Y AGRIMENSOR</option>
                                    </select>
                                </template>
                                <!-- <template v-if="espe.capitulo == 'AMBIENTAL Y FORESTAL'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        
                                        <option value="34">SANITARIO</option>
                                        <option value="32">SANITARIO Y AMBIENTAL</option>
                                        
                                    </select>
                                </template> -->
                                <template v-if="espe.capitulo == 'CAP. TEMPORAL'" >
                                    <select class="form-control " v-model="espe.idEspecialidad">
                                        <option value="37">EMPRESARIAL E INFORMÁTICA</option>
                                        <option value="38">ENERGÍAS RENOVABLES</option>
                                        <option value="19">FORESTALES</option>
                                        <option value="22">GEÓGRAFOS</option>
                                        <option value="36">SEGURIDAD Y GESTIÓN MINERA</option>
                                        <option value="39">TEXTIL Y DE CONFECCIONES</option>
                                    </select>
                                </template>                        
                            </div>
                            <div class="form-group">
                                <label class="control-label">Institución</label>
                                <select class="form-control"  data-placeholder="Choose a Category"  v-model="espe.institucion">
                                    <option v-for="item in uni" :key="item.codigo" :value="item.codigo">{{item.valor}}</option>
                                </select>
                            </div>
                            <div class=" row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                    <label class="control-label">Fecha de Incorporación</label>
                                    <input type="date" v-model="espe.fechaIncorporacion" class="form-control" /> </div>
                                    <div class="form-group">
                                    <label class="control-label">Fecha de Promoción</label>
                                    <input type="date" v-model="espe.fechaPromocion" class="form-control" /> </div>
                                    <div class="form-group">
                                    <label class="control-label">Fecha de Graduación</label>
                                    <input type="date" v-model="espe.fechaGraduacion" class="form-control" /> </div>
                                    <div class="form-group">
                                    <label class="control-label">Fecha de Revalidación</label>
                                    <input type="date" v-model="espe.fechaRevalidacion" class="form-control" /> </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Título Profesional</label>
                                        <input type="text" v-model="espe.tituloProfesional" 
                                         class="form-control" /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Número de Resolución</label>
                                        <input type="text" v-model="espe.numeroResolucion"  class="form-control" /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Folio de Resolución</label>
                                        <input type="text" v-model="espe.folioResolucion"   class="form-control" /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Hoja de Resolución</label>
                                        <input type="text" v-model="espe.hojaResolucion"  class="form-control" /> 
                                    </div>
 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Núm. Resolución Revalidación</label>
                                <input type="text" maxlength="10" v-model="espe.resolucionRevalidacion"  class="form-control" />
                            </div>
                             <div class="form-group">
                                <label class="control-label">Fecha de Inscripción</label>
                                <input type="date" v-model="espe.fechaInscripcion"  class="form-control" /> </div>
                                <div class="form-group">
                                <label class="control-label">Fecha de Juramentación</label>
                                <input type="date" v-model="espe.fechaJuramentacion" class="form-control" /> </div>

                            <div class="margiv-top-10">
                                
                                <button  type="submit" class="btn green"> Save Changes </button>
                                <a  class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>

            <div>
                <simple-modal v-model="isShow" title="Agregar Institución Superior">
                    <template slot="body">
                        <div class="col-md-12">
                            <form v-on:submit.prevent="crearInstitucion()">

                            
                                <div class="form-group">
                                    <label class="control-label">Nueva Institución</label>
                                    <input type="text"  v-model="institucion" 
                                        class="form-control" /> 
                                </div>
                        
                                <button class="btn btn-danger">OK</button>
                                <div>
                                    <hr>
                                </div>
                            </form>
                        </div>
                    </template>
                    <template slot="footer">
                        
                    </template>
                </simple-modal>

            </div>



    </div>
</template>
<script>
import SimpleModal from 'simple-modal-vue'
export default {
      props:['datos','especialidad','uni'],
      components: { SimpleModal },
    data (){
        return{
            isShow: false,
            institucion: "",
            respuesta: this.especialidad.mensaje,
            espe:{
                capitulo:"",
                idEspecialidad:"",
                institucion:"",
                fechaIncorporacion:"",
                fechaPromocion:"",
                fechaGraduacion:"",
                fechaRevalidacion:"",
                tituloProfesional:"",
                numeroResolucion:"",
                folioResolucion:"",
                hojaResolucion:"",
                resolucionRevalidacion:"",
                fechaInscripcion:"", 
                fechaJuramentacion:"" 
            },
            info:[],
            mostrar:false,
            edit:true
        }
    },
    methods:{
        crearEspecialidad(){
            const params ={

				id: this.datos.id,  
                cip:this.datos.codigoCIP,
                iss:this.espe.idEspecialidad,
                institucion:this.espe.institucion,
                fechaIncorporacion:this.espe.fechaIncorporacion,
                fechaPromocion:this.espe.fechaPromocion,
                fechaGraduacion:this.espe.fechaGraduacion,
                fechaRevalidacion:this.espe.fechaRevalidacion,
                tituloProfesional:this.espe.tituloProfesional,
                numeroResolucion:this.espe.numeroResolucion,
                folioResolucion:this.espe.folioResolucion,
                hojaResolucion:this.espe.hojaResolucion,
                resolucionRevalidacion:this.espe.resolucionRevalidacion,
                fechaInscripcion:this.espe.fechaInscripcion, 
                fechaJuramentacion:this.espe.fechaJuramentacion,
				
            };
            console.log(params, 'funciona el botton')
            axios.post('/especilidad', params).then((response)=>{
                document.location.href = "../../user/"+this.datos.id;
                if(response.data.success){
                    this.newMensaje="";
                }else {

                }
            
            })

        },
        crearInstitucion(){
            const institucion ={
                inst: this.institucion.toUpperCase()
            }
             axios.post('/institucion', institucion).then((response)=>{
                //document.location.href = "../../user/"+this.datos.id;
                if(response.data.success){
                    this.newMensaje="";
                }else {

                }
            
            })
        },
        eliminarEspecialidad(id){
            //Ingresamos un mensaje a mostrar
            var mensaje = confirm("¿Esta seguro de eliminar la especialidad?");
            //Detectamos si el usuario acepto el mensaje
            if (mensaje) {
            // alert("¡Gracias por aceptar!");
                axios.delete(`/especilidad/${id}`).then(() => {
                    document.location.href = "../../user/"+this.datos.id;
                });
            }
            //Detectamos si el usuario denegó el mensaje
            else {
            alert("¡Haz denegado el mensaje!");
            }
        },
        editarEspecialidad(){
            //console.info('tag', items);
            axios.put(`/especilidad/${this.info.id}`,this.info).then((respuesta) => {
                document.location.href = "../../user/"+this.datos.id;
            });
        },
        identificadorEspe(dato){
            console.log(dato);
            this.info = dato;
            this.mostrar = true
        }
    }
    
}
</script>

