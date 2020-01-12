<template>
    <div>
        <div class="row">
            <div class="col-md-2">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1">
                            <i class="fa fa-briefcase"></i> Especilidad {{especialidad.length}} </a>
                        <span class="after"> </span>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_2">
                            <i class="fa fa-plus"></i> Agregar Nuevo  </a>
                    </li>
                    <!-- <li>
                        <a data-toggle="tab" href="#tab_3">
                            <i class="fa fa-leaf"></i> Terms Of Service </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_1">
                            <i class="fa fa-info-circle"></i> License Terms </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_2">
                            <i class="fa fa-tint"></i> Payment Rules </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_3">
                            <i class="fa fa-plus"></i> Other Questions </a> 
                    </li>-->
                </ul>
            </div>
            <div class="col-md-10">
                <div class="tab-content">
                    <div id="tab_1" class="tab-pane active">
                        <div id="accordion1" class="panel-group">
                            <div class="panel">
                                <div class="portlet-body">
                                    <!-- <div class="btn-group">
                                        <a   @click="crearEspecialidad" class="btn sbold green"> 
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div> -->
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Titulo Profecional </th>
                                                    <th> Especialidad</th>
                                                    <th> codigoCIP </th>
                                                    <th> fecha Incorporacion </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(especialidad, index) in respuesta" :key="especialidad.id">
                                                    <td> {{index + 1 }}</td>
                                                    <td> {{especialidad.tituloProfesional}}</td>
                                                    <td> 
                                                        <template v-if="especialidad.idEspecialidad == '1'">
                                                            AGRICOLAS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '2'">
                                                            AGROINDUSTRIALES
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '3'">
                                                            AGRONOMÍA
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '4'">
                                                            CIVILES
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '5'">
                                                            ECONOMISTAS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '6'">
                                                            ELECTRICISTAS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '7'">
                                                            ELECTRONICA
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '8'">
                                                            ESTADISTICOS 
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '9'">
                                                            GEOLOGOS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '10'">
                                                            MECANICOS ELECTRICISTAS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '11'">
                                                            METALURGISTAS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '12'">
                                                            MINAS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '13'">
                                                            PESQUEROS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '14'">
                                                             QUIMICOS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '15'">
                                                            SISTEMAS
                                                         </template>
                                                        <template v-if="especialidad.idEspecialidad == '16'">
                                                            TOPOGRAFOS
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '17'">
                                                            AMBIENTAL Y FORESTAL
                                                        </template>
                                                        <template v-if="especialidad.idEspecialidad == '18'">
                                                            CAP. TEMPORAL
                                                        </template>
                                                    </td>
                                                    <td> {{especialidad.codigoCIP}} </td>
                                                    <td>
                                                        <span class="label label-sm label-success"> {{especialidad.fechaIncorporacion}} </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab_2" class="tab-pane">
                        <!-- <div id="accordion2" class="panel-group">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                    </h4>
                                </div>
                                <div id="accordion2_1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                            haven't heard of them accusamus labore sustainable VHS. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                            haven't heard of them accusamus labore sustainable VHS. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                    </h4>
                                </div>
                                <div id="accordion2_2" class="panel-collapse collapse">
                                    <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                        enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                        moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                        ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                        VHS. </div>
                                </div>
                            </div>
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
                                    </h4>
                                </div>
                                <div id="accordion2_3" class="panel-collapse collapse">
                                    <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                        enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                        moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                        ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                        VHS. </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
                                    </h4>
                                </div>
                                <div id="accordion2_4" class="panel-collapse collapse">
                                    <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                        nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                        craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
                                    </h4>
                                </div>
                                <div id="accordion2_5" class="panel-collapse collapse">
                                    <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                        nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                        craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                                        wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
                                    </h4>
                                </div>
                                <div id="accordion2_6" class="panel-collapse collapse">
                                    <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                        nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                        craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                                        wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
                                    </h4>
                                </div>
                                <div id="accordion2_7" class="panel-collapse collapse">
                                    <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                        nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                        craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                                        wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                </div>
                            </div>
                        </div> -->
                          <form role="form" action="#"  v-on:submit.prevent="crearEspecialidad()">
                            <div class="form-group">
                                <label class="control-label">Capitulo</label>
                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" v-model="capitulo" required>
                                    <option value="1">AGRICOLAS</option>
                                    <option value="2">AGROINDUSTRIALES</option>
                                    <option value="3">AGRONOMÍA</option>
                                    <option value="4">CIVILES</option>
                                    <option value="5">ECONOMISTAS</option>
                                    <option value="6">ELECTRICISTAS</option>
                                    <option value="7">ELECTRONICA</option>
                                    <option value="8">ESTADISTICOS </option>
                                    <option value="9">GEOLOGOS</option>
                                    <option value="10">MECANICOS ELECTRICISTAS</option>
                                    <option value="11">METALURGISTAS</option>
                                    <option value="12">MINAS</option>
                                    <option value="13">PESQUEROS</option>
                                    <option value="14">QUIMICOS</option>
                                    <option value="15">SISTEMAS</option>
                                    <option value="16">TOPOGRAFOS</option>
                                    <option value="17">AMBIENTAL Y FORESTAL</option>
                                    <option value="18">CAP. TEMPORAL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Especialidad</label>
                                <template v-if="capitulo == '1'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="Category 1">AGRICOLA</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '2'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">AGROINDUSTRIAL</option>
                                        <option value="">INDUSTRIAS ALIMENTARIAS</option>
                                        <option value="">ALIMENTOS</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '3'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">AGRONOMÍA</option>
                                        <option value="">ZOOTECNIA</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '4'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">CIVIL</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '5'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">ECONOMIA</option>
                                        <option value="">COMERCIAL</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '6'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">ELECTRICISTAS</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '7'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">ELECTRONICOS</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '8'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">ESTADISTICA</option>
                                        <option value="">ESTADISTICA E INFORMATICA</option>
                                        <option value="">INFORMATICA</option>   
                                    </select>
                                </template>
                                <template v-if="capitulo == '9'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">GEOLOGOS</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '10'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">MECANICOS</option>
                                        <option value="">MECANICOS ELECTRICISTAS</option>
                                        <option value="">MECATRONICOS</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '11'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">METALURGISTAS</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '12'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">MINAS</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '13'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">PESQUERIA ACUICULTOR</option>
                                        <option value="">PESQUEROS</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '14'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">QUIMICOS</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '15'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">EMPRESARIAL Y DE SISTEMAS</option>
                                        <option value="">INDUSTRIALES</option>
                                        <option value="">SISTEMAS</option>
                                        <option value="">SISTEMAS COMPUTACIONALES</option>
                                        <option value="">SISTEMAS E INFORMATICA</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '16'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">TOPOGRAFO Y AGRIMENSOR</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '17'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">AMBIENTAL</option>
                                        <option value="">SANITARIO</option>
                                        <option value="">SANITARIO Y AMBIENTAL</option>
                                        <option value="">FORESTAL</option>
                                    </select>
                                </template>
                                <template v-if="capitulo == '18'">
                                    <select class="form-control"  data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">EMPRESARIAL E INFORMATICA</option>
                                        <option value="">ENERGIAS RENOVABLES</option>
                                        <option value="">GEOGRAFOS</option>
                                        <option value="">SEGURIDAD Y GESTION MINERA</option>
                                        <option value="">TEXTIL Y DE CONFECCIONES</option>
                                    </select>
                                </template>
                            

                                
                            </div>
                            <div class="form-group">
                                 <label class="control-label">Institucion</label>
                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="Category 1">Category 1</option>
                                    <option value="Category 2">Category 2</option>
                                    <option value="Category 3">Category 5</option>
                                    <option value="Category 4">Category 4</option>
                                </select>
                            </div>
                            <div class=" row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                    <label class="control-label">Fecha de Incorporación</label>
                                    <input type="date"  class="form-control" /> </div>
                                    <div class="form-group">
                                    <label class="control-label">Fecha de Promoción</label>
                                    <input type="date" class="form-control" /> </div>
                                    <div class="form-group">
                                    <label class="control-label">Fecha de Graduación</label>
                                    <input type="date" class="form-control" /> </div>
                                    <div class="form-group">
                                    <label class="control-label">Fecha de Revalidación</label>
                                    <input type="date"  class="form-control" /> </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Título Profesional</label>
                                        <input type="text"  class="form-control" /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Número de Resolución</label>
                                        <input type="text"  class="form-control" /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Folio de Resolución</label>
                                        <input type="text"  class="form-control" /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Hoja de Resolución</label>
                                        <input type="text"  class="form-control" /> 
                                    </div>
 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Núm. Resolución Revalidación</label>
                                <input type="text"  class="form-control" />
                            </div>
                             <div class="form-group">
                                <label class="control-label">Fecha de Inscripción</label>
                                <input type="date"  class="form-control" /> </div>
                                <div class="form-group">
                                <label class="control-label">Fecha de Juramentación</label>
                                <input type="date" class="form-control" /> </div>

                            <div class="margiv-top-10">
                                <button  type="submit" class="btn green"> Save Changes </button>
                                <a  class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                    <!-- <div id="tab_3" class="tab-pane">
                        <div id="accordion3" class="panel-group">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                    </h4>
                                </div>
                                <div id="accordion3_1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
                                        <p> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                            craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                            you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                    </h4>
                                </div>
                                <div id="accordion3_2" class="panel-collapse collapse">
                                    <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                        enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                        moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                        ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                        VHS. </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
                                    </h4>
                                </div>
                                <div id="accordion3_3" class="panel-collapse collapse">
                                    <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                        enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                        moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                        ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                        VHS. </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
                                    </h4>
                                </div>
                                <div id="accordion3_4" class="panel-collapse collapse">
                                    <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                        nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                        craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
                                    </h4>
                                </div>
                                <div id="accordion3_5" class="panel-collapse collapse">
                                    <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                        nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                        craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                                        wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
                                    </h4>
                                </div>
                                <div id="accordion3_6" class="panel-collapse collapse">
                                    <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                        nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                        craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                                        wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
                                    </h4>
                                </div>
                                <div id="accordion3_7" class="panel-collapse collapse">
                                    <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                        nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                        craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                                        wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
            respuesta: this.especialidad,
            capitulo:"",
        }
    },
    methods:{
        crearEspecialidad(){
            const params ={

				id: this.datos.id,  
                cip:this.datos.codigoCIP,
                iss:this.capitulo,
				
            };
            console.log(params, 'funciona el botton')
            axios.post('/especilidad', params).then((response)=>{
                document.location.href = "../../user/"+this.datos.id;
                if(response.data.success){
                    this.newMensaje="";
                }else {

                }
            
            })

        }
    }
    
}
</script>