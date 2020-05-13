
@extends('seed.metronic')

@section('content')
    <div class="row">
        
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Cip-usuarios</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a   href="user/create"class="btn sbold green"> Agregar Nuevo 
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                           
                        </div>
                            {{-- <div class="col-md-2">
                                <div class="btn-group">
                                    <button id="sample_editable_1_new" class="btn sbold green"> Agregar Nuevo 
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-inline">
                                    <form class="form-group" action="{{ url('searchDni')}}"  method="POST">
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group">
                                            <select class="form-control " name="tipoBusqueda" id="tipoBusqueda">
                                                        
                                                <option value="1">Código CIP</option>
                                                <option value="2">DNI</option>
                                                <option value="3">Nombre</option>
                                                
                                            </select> <i></i> 
                                            <input type="search" name="search" class="form-control" placeholder="busqueda">
                                            
                                            <select class="form-control " name="mes" id="tipoBusqueda">
                                                        
                                                <option value="1">Enero</option>
                                                <option value="2">Febreo</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>

                                                
                                            </select> <i></i> 
                                            <input type="number" name="dia" min="1" max="31" class="form-control">

                                            <select class="form-control " name="tipoColegiado" id="tipoBusqueda">
                                                        
                                                <option value="">- Tipo de Colegiado -</option>
                                                <option value="0">FALLECIDO</option>
                                                <option value="1">INCORPORADO</option>
                                                <option value="2">TRANSFERIDO NACIONAL</option>
                                                <option value="3">VITALICIO</option>
                                                <option value="4">TEMPORAL</option>
                                                <option value="5">EN TRAMITE</option>
                                                <option value="6">NACIONAL</option>
                                                <option value="7">INCORPORADO NACIONAL</option>

                                                
                                            </select> <i></i> 
                                            <select class="form-control " name="condicion" id="tipoBusqueda">
                                                <option value="">- Condicion -</option>        
                                                <option value="10">Habil</option>
                                                <option value="11">No Habil</option> 
                                            </select> <i></i> 
                                            <button type="submit" class="btn btn-circle green" >Buscar <i class="glyphicon glyphicon-search"></i></button>
                                            
                                        </div>

                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    Perfil
                                </th>
                                <th> Codigo  </th>
                                <th> Nombres </th>
                                <th> Apellido Paterno </th>
                                <th> Apellido Materno</th>
                                <th> Email</th>
                                <th> Ultimo Pago</th>
                                <th> Tipo de Colegiado</th>
                                <th>Condicion</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cip_user as $users )
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="user/{{$users->id}}">
                                            <i class="fa fa-user"></i>
                                        </a>
                                    </td>
                                    <td>{{$users->codigoCIP}}</td>
                                    <td>{{$users->nombres}}</td>
                                    <td>{{$users->paterno}}</td>
                                    <td>{{$users->materno}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->ultimoPago}}</td>
                                    
                                    <td>
                                        {{-- {{$users->tipoColegiado}} --}}
                                        <template v-if="{{$users->tipoColegiado}} == 0">FALLECIDO</template>
                                        <template v-if="{{$users->tipoColegiado}} == 1">INCORPORADO</template>
                                        <template v-if="{{$users->tipoColegiado}} == 2">TRANSFERIDO NACIONAL</template>
                                        <template v-if="{{$users->tipoColegiado}} == 3">VITALICIO</template>
                                        <template v-if="{{$users->tipoColegiado}} == 4">TEMPORAL</template>
                                        <template v-if="{{$users->tipoColegiado}} == 5">EN TRAMITE</template>
                                        <template v-if="{{$users->tipoColegiado}} == 6">NACIONAL</template>
                                        <template v-if="{{$users->tipoColegiado}} == 7">INCORPORADO NACIONAL</template>
                                    </td>
                                    <td >
                                        <template v-if="{{$users->estadoUsuario}} == 10">
                                          
                                            <i  class="fa fa-check"></i>

                                        </template>
                                        <template v-if="{{$users->estadoUsuario}} == 11">
                                            <i class="fa fa-close"></i>
                                        </template>
                                    
                                    </td>
                                    <td>
                                        <a href="user/{{$users->id}}#tab_1_3">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $cip_user->links() }}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection
                    
             