<?php

namespace cippuno\Http\Controllers;

use cippuno\Http\Controllers\Controller;

class PruebaController extends Controller
{
  public function index()
  {
    return "saludo desde controller";
  }
  public function busquedaColegiados() {

    //$users = User::all();
     
    /*$resultado = DB::table('cliente')->join('reclamo', 'cliente.id', '=', 'reclamo.cliente_id')
        ->get(array('reclamo.id', 'cliente.tipoPersona','cliente.primerNombre','cliente.apellidoPaterno','cliente.apellidoMaterno','reclamo.detalle', ));*/

        //return View::make('registro_bpc.registroBPC');
    
    //return View::make('registro_bpc.registroBPC')->with('resultado',$resultado);
        /*if($request->ajax())
        {
          return response()->json([
              "mensaje" =>'mensaje ___'
            ]);
        }
        */

        
    
      $resultadoView = array(
                      "success" => true,
                      "mensaje"    => 'mensajess',
                    );

      return json_encode($resultadoView);

  }
}