<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cip_users_especialidad;
use App\cip_users;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nuevo = DB::table('cip_users')->get();
        //return $nuevo;
        $nuevo = new Collection();
          return $nuevo;
        $cursosDeAlumnos = DB::table('cip_users_especialidad')
        ->whereIn('id',$nuevo->pluck('codigoCIP'))
        ->get();

        $nuevo->map(function($row) use ($cursosDeAlumnos){
            $row->cursos = DB::table('cursos')->whereIn(
                'id', $cursosDeAlumnos->where('codigoCIP',$row->codigoCIP)->pluck('id')
            );
        });

        return $cursosDeAlumnos;
        
       // $cip_user = cip_users_especialidad::paginate(10000);
        //         SELECT A.valor AS capitulo, B.valor AS especialidad FROM cip_param A 
        // left join cip_param B ON B.grupo = '052' AND B.extra = A.codigo
        // WHERE A.grupo = '051';
        // $hola = "select * from cip_users A
        //     left join cip_users_especialidads B on B.codigoCIP = A.codigoCIP
        //     left join cip_param C on C.grupo = '053' and C.codigo = B.idEspecialidad limit 100";

        // ;
        $datos = DB::table('cip_users_especialidad as A')->select('A.id','A.codigoCIP', 'A.idEspecialidad','C.valor as capitulo', 'B.valor as especialidad','D.extra as hola')
        ->leftJoin('cip_param as B', 'B.codigo', 'A.idEspecialidad')
        ->leftJoin('cip_param as C', 'C.codigo', 'B.extra')
        ->leftJoin('cip_param as D', 'D.codigo', 'B.extra')
       
        ->where([
            ['A.codigoCIP','admin'],
            ['B.grupo','052'],
            ['C.grupo','051'],
            ['D.grupo','053']
            ])
        ->get();
        $hola = "select * from cip_users A
            left join cip_users_especialidad B on B.codigoCIP = A.codigoCIP
            left join cip_param C on C.grupo = '053' and C.codigo = B.idEspecialidad limit 100";   
        
        $nuevo = DB::table('cip_users as A')
        //->select('*')
         ->select('A.id','A.codigoCIP' ,'nombres','paterno','materno','email','ultimoPago','tipoColegiado','estadoUsuario')   
   
         ->leftJoin('cip_users_especialidad as B', 'B.codigoCIP','A.codigoCIP')
         ->leftJoin('cip_param as C','C.codigo', 'B.idEspecialidad')
         ->leftJoin('cip_param as D','D.codigo', 'A.estadoUsuario')
         ->leftJoin('cip_param as F','F.codigo', 'A.tipoColegiado')
        
         ->where([['C.grupo', '053'],['D.grupo','007'],['F.grupo','008']])
         
         ->paginate(10);

         $cip_user = cip_users::paginate(10);

            $retro = null;
            $tam=sizeof($cip_user);
        for ($i=0;$i<$tam;$i++){
            $dat  = $cip_user[$i]->codigoCIP;
            $datos = DB::table('cip_users_especialidad as A')->select('A.id','A.codigoCIP', 'A.idEspecialidad','C.valor as capitulo', 'B.valor as especialidad','D.extra as hola')
        ->leftJoin('cip_param as B', 'B.codigo', 'A.idEspecialidad')
        ->leftJoin('cip_param as C', 'C.codigo', 'B.extra')
        ->leftJoin('cip_param as D', 'D.codigo', 'B.extra')
       
        ->where([
            ['A.codigoCIP',$dat],
            ['B.grupo','052'],
            ['C.grupo','051'],
            ['D.grupo','053']
            ])
        ->get();
            //$datoPersona = DB::select($hola);
            $retro = array(
                "datos" => $cip_user,
                "espe"  => $datos,
            );

            return $nuevo;

        }

   

        // $hola = "SELECT A.id,A.codigoCIP, A.idEspecialidad,C.valor AS capitulo, B.valor AS especialdiad FROM cip_users_especialidad A
        // LEFT JOIN cip_param B ON B.grupo = '052' AND B.codigo = A.idEspecialidad
        // LEFT JOIN cip_param C ON C.grupo = '051' AND C.codigo = B.extra 
        // WHERE A.codigoCIP = '174282' ";
        // $especialidad = cip_users_especialidad::pagiante(100);
         //$datoPersona = DB::select($hola);
        // return $datoPersona;
    //    $resultadoView = array(
    //     //"success" => true,
    //     //"mensaje"  => $datoPersona,
    //     "otros" => $hola,
    //     //"nuevo"=> $nuevo
    //   );   


      //$perro =  json_encode($resultadoView);
      return \DataTables::of($nuevo)->make('true');
     // return $nuevo;
        //return view('usuario.espe',compact('perro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //return $request;
     

        $especialidad = new cip_users_especialidad();

        $especialidad -> idUser = $request->id;
        $especialidad -> codigoCIP = $request->cip;
        $especialidad -> idEspecialidad = $request->iss;
        $especialidad -> idInstitucion  = $request ->institucion ;
        $especialidad -> fechaIncorporacion  = $request ->fechaIncorporacion;
        $especialidad -> fechaPromocion  = $request ->fechaPromocion;
        $especialidad -> fechaGraduacion  = $request ->fechaGraduacion;
        $especialidad -> fechaRevalidacion  = $request ->fechaRevalidacion;
        $especialidad -> tituloProfesional  = $request ->tituloProfesional ;
        $especialidad -> numeroResolucion  = $request ->numeroResolucion ;
        $especialidad -> folioResolucion  = $request ->folioResolucion ;
        $especialidad -> hojaResolucion  = $request ->hojaResolucion ;
        $especialidad -> resolucionRevalidacion  = $request ->resolucionRevalidacion ;
        $especialidad -> fechaJuramentacion  = $request ->fechaJuramentacion ;

        $saved =$especialidad -> save();

        $data = [];
        $data['success'] = $saved;
        return back();

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $especialidad = cip_users_especialidad::find($id);
        
        
    
        $especialidad -> idEspecialidad = $request->idEspecialidad;
        $especialidad -> idInstitucion  = $request ->idInstitucion ;
        $especialidad -> fechaIncorporacion  = $request ->fechaIncorporacion;
        $especialidad -> fechaPromocion  = $request ->fechaPromocion;
        $especialidad -> fechaGraduacion  = $request ->fechaGraduacion;
        $especialidad -> fechaRevalidacion  = $request ->fechaRevalidacion;
        $especialidad -> tituloProfesional  = $request ->tituloProfesional ;
        $especialidad -> numeroResolucion  = $request ->numeroResolucion ;
        $especialidad -> folioResolucion  = $request ->folioResolucion ;
        $especialidad -> hojaResolucion  = $request ->hojaResolucion ;
        $especialidad -> resolucionRevalidacion  = $request ->resolucionRevalidacion ;
        $especialidad -> fechaJuramentacion  = $request ->fechaJuramentacion ;
        $especialidad -> fechaInscripcion= $request ->fechaInscripcion;

//fechaInscripcion: null


         $especialidad-> save();
        //$saved =$especialidad -> save();

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = cip_users_especialidad::find($id);
         
        $message -> delete();
    }
    public function vista(){
        return view ('usuario.nuevo');
    }
}
