
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
                                    <form class="form-group" action="/searchName" method="get">
                                        <div class="form-group">
                                            <label>Nombres o Apellidos</label>
                                            <input type="search" name="search" class="form-control">
                                            <span class="form-group-btn">
                                                <button type="submit" class="btn bg-green-meadow bg-font-green-meadow"><i class="glyphicon glyphicon-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                
                                
                                    <form class="form-group" action="/searchDni" method="get">
                                        <div class="form-group">
                                            <label> Busqueda dni</label>
                                            <input type="search" name="search" class="form-control">
                                            <span class="form-group-btn">
                                                <button type="submit" class="btn bg-green-meadow bg-font-green-meadow"><i class="glyphicon glyphicon-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                
                                
                                    <form class="form-group" action="/searchCodigo" method="get">
                                        <div class="form-group">
                                            <label> Busqueda codigo Cip</label>
                                            <input type="search" name="search" class="form-control">
                                            <span class="form-group-btn">
                                                <button type="submit" class="btn bg-green-meadow bg-font-green-meadow"><i class="glyphicon glyphicon-search"></i></button>
                                            </span>
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
                                <th>Eliminar</th>
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
                                    <td>{{$users->tipoColegiado}}</td>
                                    <td>
                                        <a href="user/{{$users->id}}">
                                            <i class="fa fa-trash"></i>
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
                    
             