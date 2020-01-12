
@extends('seed.metronic')

@section('content')
    <div class="row">   
        
            <!-- END PAGE HEADER-->
        <div class="profile" >
            <div class="tabbable-line tabbable-full-width">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"> Datos </a>
                    </li>
                    <li>
                        <a href="#tab_1_3" data-toggle="tab"> Editar </a>
                    </li>
                    <li>
                        <a href="#tab_1_6" data-toggle="tab"> Especialidad </a>
                    </li>
                </ul>
                {{-- <perfil-component :datos="{{$message}}"></perfil-component>   --}}
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="tab_1_1">
                        <perfil-component :datos="{{$message}}"></perfil-component>
                    </div>
                        
                    <!--tab_1_2-->
                    <div class="tab-pane" id="tab_1_3"> 
                        <edit-component :datos="{{$message}}"
                        csrf-token ="{{csrf_token()}}"></edit-component>
                    </div>
                    
                    <!--end tab-pane-->
                    <div class="tab-pane" id="tab_1_6">
                        
                        <especialidad-component :especialidad=" {{$especialidad}}"  :datos="{{$message}}" ></especialidad-component>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
                
        
           
@endsection   