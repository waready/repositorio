<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cip_users;
use App\cip_params;

use App\cip_users_especialidad;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class getUsers extends Controller
{
    public function index(){

    $cip_user = DB::table('cip_users as A')
      ->select(
        'A.id',
        'A.codigoCIP',
        'A.nombres',
        'A.paterno',
        'A.materno',
        'A.email',
        'A.ultimoPago',
        'A.tipoColegiado',
        'A.estadoUsuario',
        'D.valor AS habiliad',
        'F.valor AS tipo'
      )

      ->leftJoin('cip_param as D', function ($q) {
        $q->on('D.codigo', 'A.estadoUsuario')->where('D.grupo', '007');
      })
      ->leftJoin('cip_param as F', function ($q) {
        $q->on('F.codigo', 'A.tipoColegiado')->where('F.grupo', '008');
      })

      // ->where([['C.grupo', '053'], ['D.grupo', '007'], ['F.grupo', '008']])
      ->paginate(100);

    foreach ($cip_user->items() as &$row) {
      $row->especialidades = DB::table('cip_users_especialidad as B')
        ->leftJoin('cip_param as C', 'C.codigo', 'B.idEspecialidad')
        // ->where('B.codigoCIP', 'A.codigoCIP')
        ->where('B.codigoCIP', $row->codigoCIP)
        ->where('C.grupo', '052')
        ->select(
          'B.idEspecialidad',
          'C.valor AS especialidad'
        )
        ->get();
    }
        //return $cip_user;
        return view('usuario.index',compact('cip_user'));
    }
    public function create()
    {   
        $pais = cip_params::where('grupo','004')->get();
        return view('usuario.create',compact('pais'));
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

        //$message -> lastvisitDate = $request->lastvisitDate;

        $message -> activation = $request->activation;
        $message -> params = $request->params;
     
        $message -> usuarioCreador = $request->usuarioCreador;

        $message -> ubigeoNacimiento = $request ->ubigeoNacimiento;
        $message -> ubigeoSede = $request -> ubigeoSede;

        $message -> fechaNacimiento = $request->fechaNacimiento;
        $message -> fechaModificacion = $request->fechaModificacion;

        
        $message -> direccion  = $request->direccion;
        $message -> celular  = $request->celular;

        $message -> paisNacimiento  = $request->paisNacimiento;

        $message -> tipoColegiado  = $request->tipoColegiado;



        $message -> genero  = $request ->genero;
        $message -> estadoCivil  = $request ->estadoCivil;
        
        $now = new \DateTime();
        
        $message -> registerDate = $now;
        $message -> lastvisitDate = $now;
        //$message ->fechaNacimiento = $request ->fechaNacimiento;
         


        $saved =$message -> save();

       // $data = [];
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
       // return $request;
        $busqueda = $request->post('search');
        $tipocolegiado= $request->post('tipoColegiado');
        $condicion = $request->post('condicion');

        if($request->tipoBusqueda == '3'){
        
            $cip_user = DB::table('cip_users as A')
            ->select(
                'A.id',
                'A.codigoCIP',
                'A.nombres',
                'A.paterno',
                'A.materno',
                'A.email',
                'A.name',
                'A.ultimoPago',
                'A.tipoColegiado',
                'A.estadoUsuario',
                'D.valor AS habiliad',
                'F.valor AS tipo'
            )
        
            ->leftJoin('cip_param as D', function ($q) {
                $q->on('D.codigo', 'A.estadoUsuario')->where('D.grupo', '007');
            })
            ->leftJoin('cip_param as F', function ($q) {
                $q->on('F.codigo', 'A.tipoColegiado')->where('F.grupo', '008');
            })
        
            ->where([['A.name', 'like' , '%'. $busqueda.'%' ],['A.tipoColegiado', 'like' , '%'. $tipocolegiado.'%'],['A.estadoUsuario', 'like' , '%'. $condicion.'%']])
             //->where('A.name', 'like' , '%'. $busqueda.'%')   
            ->paginate(100);
        
            foreach ($cip_user->items() as &$row) {
            $row->especialidades = DB::table('cip_users_especialidad as B')
                ->leftJoin('cip_param as C', 'C.codigo', 'B.idEspecialidad')
                // ->where('B.codigoCIP', 'A.codigoCIP')
                ->where('B.codigoCIP', $row->codigoCIP)
                ->where('C.grupo', '052')
                ->select(
                'B.idEspecialidad',
                'C.valor AS especialidad'
                )
                ->get();
            }   
            return view('usuario.index',compact('cip_user'));
        

        }

        if($request->tipoBusqueda == '2'){
                    //     ])

                    $cip_user = DB::table('cip_users as A')
                    ->select(
                        'A.id',
                        'A.codigoCIP',
                        'A.nombres',
                        'A.paterno',
                        'A.materno',
                        'A.email',
                        'A.name',
                        'A.ultimoPago',
                        'A.tipoColegiado',
                        'A.estadoUsuario',
                        'D.valor AS habiliad',
                        'F.valor AS tipo'
                    )
                
                    ->leftJoin('cip_param as D', function ($q) {
                        $q->on('D.codigo', 'A.estadoUsuario')->where('D.grupo', '007');
                    })
                    ->leftJoin('cip_param as F', function ($q) {
                        $q->on('F.codigo', 'A.tipoColegiado')->where('F.grupo', '008');
                    })
                
                    ->where([['A.tipoColegiado', 'like' , '%'. $tipocolegiado.'%'],
                    ['A.dni', 'like' , '%'. $busqueda.'%'],['A.estadoUsuario', 'like' , '%'. $condicion.'%']])
                     //->where('A.name', 'like' , '%'. $busqueda.'%')   
                    ->paginate(100);
                
                    foreach ($cip_user->items() as &$row) {
                    $row->especialidades = DB::table('cip_users_especialidad as B')
                        ->leftJoin('cip_param as C', 'C.codigo', 'B.idEspecialidad')
                        // ->where('B.codigoCIP', 'A.codigoCIP')
                        ->where('B.codigoCIP', $row->codigoCIP)
                        ->where('C.grupo', '052')
                        ->select(
                        'B.idEspecialidad',
                        'C.valor AS especialidad'
                        )
                        ->get();
                    }   
                    return view('usuario.index',compact('cip_user'));
                     
                           
        }
        if($request->tipoBusqueda == '1'){

        
        //  ])

        $cip_user = DB::table('cip_users as A')
        ->select(
            'A.id',
            'A.codigoCIP',
            'A.nombres',
            'A.paterno',
            'A.materno',
            'A.email',
            'A.name',
            'A.ultimoPago',
            'A.tipoColegiado',
            'A.estadoUsuario',
            'D.valor AS habiliad',
            'F.valor AS tipo'
        )
    
        ->leftJoin('cip_param as D', function ($q) {
            $q->on('D.codigo', 'A.estadoUsuario')->where('D.grupo', '007');
        })
        ->leftJoin('cip_param as F', function ($q) {
            $q->on('F.codigo', 'A.tipoColegiado')->where('F.grupo', '008');
        })
    
        ->where([['A.codigoCIP', 'like' , '%'. $busqueda.'%' ],
        ['A.tipoColegiado', 'like' , '%'. $tipocolegiado.'%'],['A.estadoUsuario', 'like' , '%'. $condicion.'%']])
         //->where('A.name', 'like' , '%'. $busqueda.'%')   
        ->paginate(100);
    
        foreach ($cip_user->items() as &$row) {
        $row->especialidades = DB::table('cip_users_especialidad as B')
            ->leftJoin('cip_param as C', 'C.codigo', 'B.idEspecialidad')
            // ->where('B.codigoCIP', 'A.codigoCIP')
            ->where('B.codigoCIP', $row->codigoCIP)
            ->where('C.grupo', '052')
            ->select(
            'B.idEspecialidad',
            'C.valor AS especialidad'
            )
            ->get();
        }   
        return view('usuario.index',compact('cip_user'));
                            
                          
        }

    }

    public function reporte()
    {     
        $cip_user = DB::table('cip_users as A')
      ->select(
        'A.id',
        'A.codigoCIP',
        'A.nombres',
        'A.paterno',
        'A.name',
        'A.dni',
        'A.celular',
        'A.materno',
        'A.email',
        'A.ultimoPago',
        'G.valor AS sede',
        'A.tipoColegiado',
        'A.estadoUsuario',
        'D.valor AS habiliad',
        'F.valor AS tipo'
      )

      ->leftJoin('cip_param as D', function ($q) {
        $q->on('D.codigo', 'A.estadoUsuario')->where('D.grupo', '007');
      })
      ->leftJoin('cip_param as G', function ($q) {
        $q->on('G.codigo', 'A.ubigeoSede')->where('G.grupo', '001');
      })
      ->leftJoin('cip_param as F', function ($q) {
        $q->on('F.codigo', 'A.tipoColegiado')->where('F.grupo', '008');
      })
      ->paginate(1000);
      

      foreach ($cip_user->items() as &$row) {
        $row->especialidades = DB::table('cip_users_especialidad as B')
          ->leftJoin('cip_param as C', 'C.codigo', 'B.idEspecialidad')
          ->leftJoin('cip_param as D', 'D.codigo', 'C.extra')
          // ->where('B.codigoCIP', 'A.codigoCIP')
          ->where('B.codigoCIP', $row->codigoCIP)
          ->where('C.grupo', '052')
          ->where('D.grupo', '051')

          ->select(

            'B.idEspecialidad',
            'C.valor AS especialidad',
            'D.valor AS Capitulo'
          )
          ->get();
      }

      //return $cip_user;
        return view('usuario.reporte',compact('cip_user'));        
    }

    public function searchCodigo(Request $request)
    {

        $category = request('tipoColegiado');
        $make = request('condicion');

        $cip_user = cip_users::when($category, function ($query) use ($category){
            return $query->where('tipoColegiado', $category);
        })
        ->when($make, function ($query) use ($make) {
            return $query->where('estadoUsuario', $make);
        })->paginate(30);

        // $vehicles = Vehicle::when($category, function ($query) use ($category) {
        //         return $query->where('category', $category);
        //     })
        //     ->when($make, function ($query) use ($make) {
        //         return $query->where('make', $make);
        //     })
        //     ->paginate(10);

         $cip_user->appends(request()->query());

         return view('usuario.reporte', compact('cip_user'));

           // return $cip_user;
    }


/////////////////////////filtros
    public function searchAbil(Request $request)
    {
        $busqueda = $request->get('search');
        $cip_user = DB::table('cip_users')->where('estadoUsuario', 'like' , '%'. $busqueda.'%')->paginate(100);
        return view('usuario.index',compact('cip_user'));
    }
    public function searchDni(Request $request)
    {
        
        // }
        //1968-01-03
        //return $request;
        
        //('%02d', $request->mes);
            $dia = sprintf('%02d', $request->dia);
            $mes = sprintf('%02d', $request->mes);

            

             
        $cip_user = DB::table('cip_users')->where('fechaNacimiento','like', '%'.$mes.'-'.$dia.'%' )->get();
         return view('reporte',compact('cip_user'));
         
    }
    public function cumple()
    {   
        $dia = date("d");
        $mes = date("m");
        

        //return $mes. "  ". $dia;


             
         $cip_user = DB::table('cip_users')->where('fechaNacimiento','like', '%'.$mes.'-'.$dia.'%' )->get();
          return view('reporte',compact('cip_user'));





    }


    public function show($id)
    {

        $busqueda = $id;

        $univercidad = cip_params::where('grupo','050')->get();

            $hola = "SELECT A.id ,A.codigoCIP, A.idEspecialidad, A.idInstitucion, A.fechaIncorporacion, A.fechaPromocion, A.fechaGraduacion, 
            A.tituloProfesional, A.numeroResolucion, A.folioResolucion, A.hojaResolucion, A.fechaRevalidacion, A.resolucionRevalidacion,  A.fechaInscripcion,
            A.fechaJuramentacion,
            D.valor AS institucion, C.valor AS capitulo, B.valor AS especialdiad , F.extra as titulo  FROM cip_users_especialidad A
            LEFT JOIN cip_param D ON D.grupo = '050' AND D.codigo = A.idInstitucion
            LEFT JOIN cip_param B ON B.grupo = '052' AND B.codigo = A.idEspecialidad
            LEFT JOIN cip_param C ON C.grupo = '051' AND C.codigo = B.extra 
            LEFT JOIN cip_param F on F.grupo = '053' AND F.codigo = B.codigo
            WHERE A.idUser = $busqueda ";
            // $especialidad = cip_users_especialidad::pagiante(100);
            $datoPersona = DB::select($hola);
           // return $datoPersona;
           $resultadoView = array(
            "success" => true,
            "mensaje"  => $datoPersona,
          );   
    
    
          $especialidad =  json_encode($resultadoView);
          //return $perro;

        
         //= cip_users_especialidad::find($id);
        $message = cip_users::find($id);
        // $message = DB::table('cip_users as A')
        // //->select('*')
        //  ->select('A.id','A.codigoCIP' ,'nombres','paterno','materno','email','ultimoPago','tipoColegiado','estadoUsuario','C.valor as especialidad' ,'C.extra as titulo','D.valor as habiliad', 'F.valor as tipo')
        //  ->leftJoin('cip_users_especialidad as B', 'B.codigoCIP','A.codigoCIP')
        //  ->leftJoin('cip_param as C','C.codigo', 'B.idEspecialidad')
        //  ->leftJoin('cip_param as D','D.codigo', 'A.estadoUsuario')
        //  ->leftJoin('cip_param as F','F.codigo', 'A.tipoColegiado')
        
        //  ->where([['C.grupo', '053'],['D.grupo','007'],['F.grupo','008'],['A.id',$id]])
        //   ->get();
        //return $especialidad;
        //return $cip_user;
        return view('usuario.show',compact('message','especialidad','univercidad'));
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
        // $busqueda = $id;
        // $especialidad =  cip_users_especialidad::where('idUser', $busqueda)->get([
        //     'id',
        //  ]); 
        // for ($i = 0; $i <count($especialidad) ; $i++) {
        //     $des = cip_users_especialidad::find($especialidad['id']);
        //     $des->delete();
        // }      
         $message = cip_users::find($id);
         
        $message -> delete();
        
        
    }

    public function param(){
        $departamento = cip_params::where('grupo','003')->get();
        $provincia = cip_params::where('grupo','002')->get();
        $distrito = cip_params::where('grupo','001')->get();
        return response()->json([
            'code' =>200,
            'departamento'=> $departamento,
            'provincia'=> $provincia,
            'distrito' =>$distrito
        ]);
    }

    public function upload(Request $request){

        if ($request->hasFile('avatar')) {
            // Si es así , almacenamos en la carpeta public/avatars
            // esta estará dentro de public/defaults/
            $path = public_path('/img');
            $fileName = time().'.'.$request->avatar->getClientOriginalExtension();
            $moved = $request->avatar -> move($path, $fileName);
            return $fileName ;
        }
        return "Noo Llego una imagen";

    }
    
    
}
