<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cip_users_especialidad;

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
       // $cip_user = cip_users_especialidad::paginate(10000);
        //         SELECT A.valor AS capitulo, B.valor AS especialidad FROM cip_param A 
        // left join cip_param B ON B.grupo = '052' AND B.extra = A.codigo
        // WHERE A.grupo = '051';

        // ;

        $hola = "SELECT A.id,A.codigoCIP, A.idEspecialidad,C.valor AS capitulo, B.valor AS especialdiad FROM cip_users_especialidads A
        LEFT JOIN cip_param B ON B.grupo = '052' AND B.codigo = A.idEspecialidad
        LEFT JOIN cip_param C ON C.grupo = '051' AND C.codigo = B.extra 
        WHERE A.codigoCIP = 'info' ";
        // $especialidad = cip_users_especialidad::pagiante(100);
        $datoPersona = DB::select($hola);
       // return $datoPersona;
       $resultadoView = array(
        "success" => true,
        "mensaje"  => $datoPersona,
      );   


      $perro =  json_encode($resultadoView);
      return $perro;
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
}
