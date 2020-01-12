<?php

namespace cippuno\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //
    public function index()
  {
    return "saludo desde controller";
  }
  public function busquedaColegiados(Request $request) {


    //$tipoBusqueda = $request->get('tipoBusqueda');
    //$tipoBusqueda = $request->tipoBusqueda;
    //$textoBusqueda = Input::get('textoBusqueda');

      $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
              if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
              C.fechaPago, C.habilHasta 
              FROM cippuno.cip_users A 
              left join cippuno.cip_users_especialidads B on B.codigoCIP = A.codigoCIP
              LEFT JOIN cippuno.cip_pagos C on C.codigoCIP = A.codigoCIP
              WHERE A.codigoCIP like '%39231%'
              order by C.fechaPago DESC limit 1";

      //$integrantes = DB::connection('mysql')->select($sql);

    
      $resultadoView = array(
                      "success" => true,
                      "mensaje"    => 'mensajess',
                    );

      return json_encode($resultadoView);

  }
}
