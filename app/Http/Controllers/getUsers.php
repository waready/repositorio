<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cip_users;
use App\cip_params;

use App\cip_users_especialidad;
use Illuminate\Support\Facades\DB;

class getUsers extends Controller
{
    public function index(){
        $cip_user = cip_users::paginate(100);
        $hola = "hola comoe stas";

        return view('usuario.index',compact('cip_user','hola'));
    }
    public function create()
    {   
        $ciudad = cip_params::where('grupo','003')->get();
        return view('usuario.create',compact('ciudad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new cip_users();

        $message -> name = $request->name;
        $message -> username = $request->username;
        $message -> email = $request->email;
        $message -> paterno = $request->paterno;
        $message -> materno = $request->materno;
        $message -> nombres = $request->nombres;

        $message -> ruc = $request->ruc;
        $message -> dni = $request->dni;
        $message -> codigoCIP = $request->codigoCIP;

        if ($request->password) {
           $message -> password = bcrypt($request->password);
        }

        $message -> estadoUsuario = $request->estadoUsuario;
        $message -> lugarNacimiento = $request->lugarNacimiento;
        
        $message -> usertype = $request->usertype;
        $message -> block = $request->block;

        $message -> registerDate = $request->registerDate;
        $message -> lastvisitDate = $request->lastvisitDate;
        $message -> activation = $request->activation;
        $message -> params = $request->params;
     
        $message -> usuarioCreador = $request->usuarioCreador;

        $message -> fechaNacimiento = $request->fechaNacimiento;
        $message -> fechaModificacion = $request->fechaModificacion;
        $message -> direccion  = $request->direccion;
        $message -> celular  = $request->celular;
        //$message -> paisNacimiento  = $request->paisNacimiento;
        $message -> tipoColegiado  = $request->tipoColegiado;
        $message -> genero  = "M";
        $message -> estadoCivil  = 1;
        


        $saved =$message -> save();

        $data = [];
        $data['success'] = $saved;
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchName(Request $request)
    {
        $busqueda = $request->get('search');
        $cip_user = DB::table('cip_users')->where('name', 'like' , '%'. $busqueda.'%')->paginate(20);
        return view('usuario.index',compact('cip_user'));
    }
    public function searchDni(Request $request)
    {
        $busqueda = $request->get('search');
        $cip_user = DB::table('cip_users')->where('dni', 'like' , '%'. $busqueda.'%')->paginate(5);
        return view('usuario.index',compact('cip_user'));
    }
    public function searchCodigo(Request $request)
    {
        $busqueda = $request->get('search');
        $cip_user = DB::table('cip_users')->where('codigoCIP', 'like' , '%'. $busqueda.'%')->paginate(5);
        return view('usuario.index',compact('cip_user'));
    }
    public function show($id)
    {

        $busqueda = $id;
        $especialidad =  cip_users_especialidad::where('idUser', $busqueda)->get([
            'id',
            'idUser',
            'codigoCIP',
            'idEspecialidad',  
            'idInstitucion',  
            'fechaIncorporacion',  
            'fechaPromocion',  
            'fechaGraduacion',  
            'tituloProfesional',  
            'numeroResolucion',  
            'folioResolucion',  
            'hojaResolucion',  
            'fechaRevalidacion',  
            'resolucionRevalidacion',  
            'fechaInscripcion',  
            'fechaJuramentacion',  
            ]);
        
         //= cip_users_especialidad::find($id);
        $message = cip_users::find($id);
        //return $especialidad;
        //return $cip_user;
        return view('usuario.show',compact('message','especialidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $message = cip_users::find($id);
        return view('users.edit',compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $message = cip_users::find($id);

        $message -> paterno  = $request->paterno;
        $message -> materno  = $request->materno;
        $message -> name  = $request->name;
        $message -> username  = $request->username;
        $message -> email  = $request->email;
        $message -> celular  = $request->celular;
        $message -> dni  = $request->dni;
        $message -> codigoCIP  = $request->codigoCIP;
        $message -> usuarioCreador  = $request->usuarioCreador;
        $message -> direccion  = $request->direccion;
        

    
        if ($request->password) {
           $message -> password = bcrypt($request->password);
        }
     
        
        $saved =$message -> save();
        //return $message; 


        $data = [];
        $data['update'] = $saved;
        return $data;
    }
    public function EditarImagen (Request $request){
        //return $request;
        $id=$request->id;
        $message = cip_users::find($id);
         $file = $request->image;

         if ($file){
            $path = public_path('/img');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $moved = $file -> move($path, $fileName);
            $message -> nombreFoto = $fileName;
         }
         $saved =$message -> save();
         //return $message; 
 
 
         $data = [];
         $data['update'] = $saved;
         return back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = cip_users::find($id);
        
        $message -> delete();
        
        
    }
    
}
