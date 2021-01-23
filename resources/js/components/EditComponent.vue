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
                        <a data-toggle="tab" href="#tab_3-3">
                            <i class="fa fa-lock"></i> Datos colegiado </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_2-2">
                            <i class="fa fa-picture-o"></i> Foto de Perfil </a>
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
                                <label class="control-label">Nombres:</label>
                                <input type="text" v-model="respuesta.nombres" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Apellido Paterno:</label>
                                <input type="text" v-model="respuesta.paterno" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Apellido Materno:</label>
                                <input type="text" v-model="respuesta.materno" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">DNI:</label>
                                <input type="text" v-model="respuesta.dni" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Género:</label>
                                <select class="form-control"  data-placeholder="Choose a Category"  v-model="respuesta.genero">
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label class="control-label">Estado Civil:</label>
                               
                                <select class="form-control"  data-placeholder="Choose a Category"  v-model="respuesta.estadoCivil">
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
                                <input type="text" v-model="respuesta.celular" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Direccion:</label>
                                <input type="text" v-model="respuesta.direccion" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Fecha de Nacimiento:</label>
                                <input type="date" v-model="respuesta.fechaNacimiento" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Lugar de Nacimiento:</label>
                                <input type="text" v-model="respuesta.lugarNacimiento" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">País:</label>
                            
                                <select class="form-control"  data-placeholder="Choose a Category"  v-model="respuesta.paisNacimiento">
                                    <option value="AFG">Afghanistan</option>
                                    <option value="ALB">Albania</option>
                                    <option value="DZA">Algeria</option>
                                    <option value="ASM">American Samoa</option>
                                    <option value="AND">Andorra</option>
                                    <option value="AGO">Angola</option>
                                    <option value="AIA">Anguilla</option>
                                    <option value="ATA">Antarctica</option>
                                    <option value="ATG">Antigua and Barbuda</option>
                                    <option value="ARG">Argentina</option>
                                    <option value="ARM">Armenia</option>
                                    <option value="ABW">Aruba</option>
                                    <option value="AUS">Australia</option>
                                    <option value="AUT">Austria</option>
                                    <option value="AZE">Azerbaijan</option>
                                    <option value="BHS">Bahamas</option>
                                    <option value="BHR">Bahrain</option>
                                    <option value="BGD">Bangladesh</option>
                                    <option value="BRB">Barbados</option>
                                    <option value="BLR">Belarus</option>
                                    <option value="BEL">Belgium</option>
                                    <option value="BLZ">Belize</option>
                                    <option value="BEN">Benin</option>
                                    <option value="BMU">Bermuda</option>
                                    <option value="BTN">Bhutan</option>
                                    <option value="BOL">Bolivia</option>
                                    <option value="BIH">Bosnia and Herzegovina</option>
                                    <option value="BWA">Botswana</option>
                                    <option value="BVT">Bouvet Island</option>
                                    <option value="BRA">Brazil</option>
                                    <option value="IOT">British Indian Ocean Territory</option>
                                    <option value="BRN">Brunei</option>
                                    <option value="BGR">Bulgaria</option>
                                    <option value="BFA">Burkina Faso</option>
                                    <option value="BDI">Burundi</option>
                                    <option value="KHM">Cambodia</option>
                                    <option value="CMR">Cameroon</option>
                                    <option value="CAN">Canada</option>
                                    <option value="CPV">Cape Verde</option>
                                    <option value="CYM">Cayman Islands</option>
                                    <option value="CAF">Central African Republic</option>
                                    <option value="TCD">Chad</option>
                                    <option value="CHL">Chile</option>
                                    <option value="CHN">China</option>
                                    <option value="CXR">Christmas Island</option>
                                    <option value="CCK">Cocos (Keeling) Islands</option>
                                    <option value="COL">Colombia</option>
                                    <option value="COM">Comoros</option>
                                    <option value="COG">Congo</option>
                                    <option value="COD">Congo, The Democratic Republic of the</option>
                                    <option value="COK">Cook Islands</option>
                                    <option value="CRI">Costa Rica</option>
                                    <option value="HRV">Croatia</option>
                                    <option value="CIV">Cte dIvoire</option>
                                    <option value="CUB">Cuba</option>
                                    <option value="CYP">Cyprus</option>
                                    <option value="CZE">Czech Republic</option>
                                    <option value="DNK">Denmark</option>
                                    <option value="DJI">Djibouti</option>
                                    <option value="DMA">Dominica</option>
                                    <option value="DOM">Dominican Republic</option>
                                    <option value="TMP">East Timor</option>
                                    <option value="ECU">Ecuador</option>
                                    <option value="EGY">Egypt</option>
                                    <option value="SLV">El Salvador</option>
                                    <option value="GNQ">Equatorial Guinea</option>
                                    <option value="ERI">Eritrea</option>
                                    <option value="EST">Estonia</option>
                                    <option value="ETH">Ethiopia</option>
                                    <option value="FLK">Falkland Islands</option>
                                    <option value="FRO">Faroe Islands</option>
                                    <option value="FJI">Fiji Islands</option>
                                    <option value="FIN">Finland</option>
                                    <option value="FRA">France</option>
                                    <option value="GUF">French Guiana</option>
                                    <option value="PYF">French Polynesia</option>
                                    <option value="ATF">French Southern territories</option>
                                    <option value="GAB">Gabon</option>
                                    <option value="GMB">Gambia</option>
                                    <option value="GEO">Georgia</option>
                                    <option value="DEU">Germany</option>
                                    <option value="GHA">Ghana</option>
                                    <option value="GIB">Gibraltar</option>
                                    <option value="GRC">Greece</option>
                                    <option value="GRL">Greenland</option>
                                    <option value="GRD">Grenada</option>
                                    <option value="GLP">Guadeloupe</option>
                                    <option value="GUM">Guam</option>
                                    <option value="GTM">Guatemala</option>
                                    <option value="GIN">Guinea</option>
                                    <option value="GNB">Guinea-Bissau</option>
                                    <option value="GUY">Guyana</option>
                                    <option value="HTI">Haiti</option>
                                    <option value="HMD">Heard Island and McDonald Islands</option>
                                    <option value="VAT">Holy See (Vatican City State)</option>
                                    <option value="HND">Honduras</option>
                                    <option value="HKG">Hong Kong</option>
                                    <option value="HUN">Hungary</option>
                                    <option value="ISL">Iceland</option>
                                    <option value="IND">India</option>
                                    <option value="IDN">Indonesia</option>
                                    <option value="IRN">Iran</option>
                                    <option value="IRQ">Iraq</option>
                                    <option value="IRL">Ireland</option>
                                    <option value="ISR">Israel</option>
                                    <option value="ITA">Italy</option>
                                    <option value="JAM">Jamaica</option>
                                    <option value="JPN">Japan</option>
                                    <option value="JOR">Jordan</option>
                                    <option value="KAZ">Kazakstan</option>
                                    <option value="KEN">Kenya</option>
                                    <option value="KIR">Kiribati</option>
                                    <option value="KWT">Kuwait</option>
                                    <option value="KGZ">Kyrgyzstan</option>
                                    <option value="LAO">Laos</option>
                                    <option value="LVA">Latvia</option>
                                    <option value="LBN">Lebanon</option>
                                    <option value="LSO">Lesotho</option>
                                    <option value="LBR">Liberia</option>
                                    <option value="LBY">Libyan Arab Jamahiriya</option>
                                    <option value="LIE">Liechtenstein</option>
                                    <option value="LTU">Lithuania</option>
                                    <option value="LUX">Luxembourg</option>
                                    <option value="MAC">Macao</option>
                                    <option value="MKD">Macedonia</option>
                                    <option value="MDG">Madagascar</option>
                                    <option value="MWI">Malawi</option>
                                    <option value="MYS">Malaysia</option>
                                    <option value="MDV">Maldives</option>
                                    <option value="MLI">Mali</option>
                                    <option value="MLT">Malta</option>
                                    <option value="MHL">Marshall Islands</option>
                                    <option value="MTQ">Martinique</option>
                                    <option value="MRT">Mauritania</option>
                                    <option value="MUS">Mauritius</option>
                                    <option value="MYT">Mayotte</option>
                                    <option value="MEX">Mexico</option>
                                    <option value="FSM">Micronesia, Federated States of</option>
                                    <option value="MDA">Moldova</option>
                                    <option value="MCO">Monaco</option>
                                    <option value="MNG">Mongolia</option>
                                    <option value="MSR">Montserrat</option>
                                    <option value="MAR">Morocco</option>
                                    <option value="MOZ">Mozambique</option>
                                    <option value="MMR">Myanmar</option>
                                    <option value="NAM">Namibia</option>
                                    <option value="NRU">Nauru</option>
                                    <option value="NPL">Nepal</option>
                                    <option value="NLD">Netherlands</option>
                                    <option value="ANT">Netherlands Antilles</option>
                                    <option value="NCL">New Caledonia</option>
                                    <option value="NZL">New Zealand</option>
                                    <option value="NIC">Nicaragua</option>
                                    <option value="NER">Niger</option>
                                    <option value="NGA">Nigeria</option>
                                    <option value="NIU">Niue</option>
                                    <option value="NFK">Norfolk Island</option>
                                    <option value="PRK">North Korea</option>
                                    <option value="MNP">Northern Mariana Islands</option>
                                    <option value="NOR">Norway</option>
                                    <option value="OMN">Oman</option>
                                    <option value="PAK">Pakistan</option>
                                    <option value="PLW">Palau</option>
                                    <option value="PSE">Palestine</option>
                                    <option value="PAN">Panama</option>
                                    <option value="PNG">Papua New Guinea</option>
                                    <option value="PRY">Paraguay</option>
                                    <option value="PER">Peru</option>
                                    <option value="PHL">Philippines</option>
                                    <option value="PCN">Pitcairn</option>
                                    <option value="POL">Poland</option>
                                    <option value="PRT">Portugal</option>
                                    <option value="PRI">Puerto Rico</option>
                                    <option value="QAT">Qatar</option>
                                    <option value="ROM">Romania</option>
                                    <option value="REU">Runion</option>
                                    <option value="RUS">Russian Federation</option>
                                    <option value="RWA">Rwanda</option>
                                    <option value="SHN">Saint Helena</option>
                                    <option value="KNA">Saint Kitts and Nevis</option>
                                    <option value="LCA">Saint Lucia</option>
                                    <option value="SPM">Saint Pierre and Miquelon</option>
                                    <option value="VCT">Saint Vincent and the Grenadines</option>
                                    <option value="WSM">Samoa</option>
                                    <option value="SMR">San Marino</option>
                                    <option value="STP">Sao Tome and Principe</option>
                                    <option value="SAU">Saudi Arabia</option>
                                    <option value="SEN">Senegal</option>
                                    <option value="SYC">Seychelles</option>
                                    <option value="SLE">Sierra Leone</option>
                                    <option value="SGP">Singapore</option>
                                    <option value="SVK">Slovakia</option>
                                    <option value="SVN">Slovenia</option>
                                    <option value="SLB">Solomon Islands</option>
                                    <option value="SOM">Somalia</option>
                                    <option value="ZAF">South Africa</option>
                                    <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                    <option value="KOR">South Korea</option>
                                    <option value="ESP">Spain</option>
                                    <option value="LKA">Sri Lanka</option>
                                    <option value="SDN">Sudan</option>
                                    <option value="SUR">Suriname</option>
                                    <option value="SJM">Svalbard and Jan Mayen</option>
                                    <option value="SWZ">Swaziland</option>
                                    <option value="SWE">Sweden</option>
                                    <option value="CHE">Switzerland</option>
                                    <option value="SYR">Syria</option>
                                    <option value="TWN">Taiwan</option>
                                    <option value="TJK">Tajikistan</option>
                                    <option value="TZA">Tanzania</option>
                                    <option value="THA">Thailand</option>
                                    <option value="TGO">Togo</option>
                                    <option value="TKL">Tokelau</option>
                                    <option value="TON">Tonga</option>
                                    <option value="TTO">Trinidad and Tobago</option>
                                    <option value="TUN">Tunisia</option>
                                    <option value="TUR">Turkey</option>
                                    <option value="TKM">Turkmenistan</option>
                                    <option value="TCA">Turks and Caicos Islands</option>
                                    <option value="TUV">Tuvalu</option>
                                    <option value="UGA">Uganda</option>
                                    <option value="UKR">Ukraine</option>
                                    <option value="ARE">United Arab Emirates</option>
                                    <option value="GBR">United Kingdom</option>
                                    <option value="USA">United States</option>
                                    <option value="UMI">United States Minor Outlying Islands</option>
                                    <option value="URY">Uruguay</option>
                                    <option value="UZB">Uzbekistan</option>
                                    <option value="VUT">Vanuatu</option>
                                    <option value="VEN">Venezuela</option>
                                    <option value="VNM">Vietnam</option>
                                    <option value="VGB">Virgin Islands, British</option>
                                    <option value="VIR">Virgin Islands, U.S.</option>
                                    <option value="WLF">Wallis and Futuna</option>
                                    <option value="ESH">Western Sahara</option>
                                    <option value="YEM">Yemen</option>
                                    <option value="YUG">Yugoslavia</option>
                                    <option value="ZMB">Zambia</option>
                                    <option value="ZWE">Zimbabwe</option>
                                </select>  
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label">Departamento: {{departamento}}</label>
                                
                                <select class="form-control"  data-placeholder="Choose a Category"  v-model="departamento">
                                    <option v-for="item in departamentos" :key="item.codigo" :value="item.valor">{{item.valor}}</option>
                                    
                                </select> 
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label">Provincia: {{provincia}}</label>
                                

                                <select class="form-control"  data-placeholder="Choose a Category"  v-model="provincia">
                                    <option v-for="item in filtroProvincia" :key="item.codigo" :value="item.valor">{{item.valor}}</option>
                                    
                                </select> 
                            
                            </div>

                            <div class="form-group">
                                <label class="control-label">Distrito: {{respuesta.ubigeoNacimiento}}</label>
                                
                                <select class="form-control"  data-placeholder="Choose a Category"  v-model="respuesta.ubigeoNacimiento">
                                    <option v-for="item in filtroDistrito" :key="item.codigo" :value="item.codigo">{{item.valor}}</option>
                                    
                                </select>   
                             </div>

                            <div class="form-group">
                                <label class="control-label">Usuario : (Cambios)</label>
                                <input type="text" placeholder="admin" class="form-control" disabled /> </div>
                            <div class="margiv-top-10">
                                <button  type="submit" class="btn green"> Guardar </button>
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
                                        <img :src="'/img/' + respuesta.nombreFoto " alt="" /> </div>
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
                            <div class="form-group">
                                <label class="control-label">Código CIP/Usuario:</label>
                                <input type="text" v-model="respuesta.codigoCIP" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Sede</label>
                                 <select class="form-control"  data-placeholder="Choose a Category"  v-model="respuesta.ubigeoSede">
                                    <option value="210101">Puno</option>
                                    <option value="211101">Juliaca</option>
                                </select>  
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado:</label>
                                
                                <select class="form-control"  data-placeholder="Choose a Category"  v-model="respuesta.estadoUsuario">
                                    <option value="10">Habil</option>
                                    <option value="11">No Habil</option>
                                </select>  
                            </div>
                            <div class="form-group">
                                <label class="control-label">Condición:</label>
                                
                                <select class="form-control"  data-placeholder="Choose a Category"  v-model="respuesta.tipoColegiado">
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
                                <label class="control-label">Email:</label>
                                <input type="text" v-model="respuesta.email" class="form-control" /> </div>
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
    mounted(){
        axios.get(`/api/params`).then((response) =>{
            this.departamentos = response.data.departamento;
            this.provincias = response.data.provincia;
            this.distritos = response.data.distrito;

            var codigoD = this.respuesta.ubigeoNacimiento;
            var codigoP;
            var codigo_depa;
            for(var j=0;j<this.distritos.length;j++){
                if(codigoD == this.distritos[j].codigo){
                    codigoP = this.distritos[j].extra;
                }
            }
            for(var j=0;j<this.provincias.length;j++){
                if(codigoP == this.provincias[j].codigo){
                    this.provincia = this.provincias[j].valor;
                    codigo_depa= this.provincias[j].extra;
                }
            }
            for(var j=0;j<this.departamentos.length;j++){
                if(codigo_depa == this.departamentos[j].codigo){
                    this.departamento = this.departamentos[j].valor;
                }
            }

        });


    },
    data (){
        return{
            respuesta: this.datos,
            password:null,
            imagen:[],


            departamentos:[],
            provincias:[],
            distritos:[],

           departamento:null,
            provincia:null,
            distrito:null,
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
                name:(this.respuesta.nombres +' '+this.respuesta.paterno +' '+ this.respuesta.materno).toUpperCase(),
                nombres:this.respuesta.nombres,
				paterno:this.respuesta.paterno ,
                materno:this.respuesta.materno ,
                
                username:this.respuesta.username,
                estadoCivil:this.respuesta.estadoCivil,
                genero:this.respuesta.genero,
                estadoCivil: this.estadoCivil,
                
                lugarNacimiento:this.respuesta.lugarNacimiento, 
                fechaNacimiento:this.respuesta.fechaNacimiento, 
                paisNacimiento:this.respuesta.paisNacimiento, 


				email:this.respuesta.email ,
				celular:this.respuesta.celular ,
                dni:this.respuesta.dni ,
                
				codigoCIP:this.respuesta.codigoCIP ,
				usuarioCreador:this.respuesta.usuarioCreador ,
                direccion:this.respuesta.direccion ,
                password:this.password,

                ubigeoSede:this.respuesta.ubigeoSede,
                estadoUsuario:10,
                tipoColegiado:1

				
            };
            axios.put(`/user/${this.respuesta.id}`,params).then((response)=>{
			
                console.log('tag', response)
				document.location.href = "../../user/"+this.respuesta.id;
			
            });
			
        },

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
       obtenerDistrito(){

       }
    }

}

</script>