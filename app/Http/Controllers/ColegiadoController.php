<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;
use App\cip_pagos;

class ColegiadoController extends Controller
{
    public function pagoColegiados()
    {
  
      $sql = 'SELECT idConceptoPago, conceptoPago, montoPago FROM cip_pagosconfig where lVigente =1 '; 
      $conceptoPago = DB::select($sql);
  
      $user = "usuarioggg";
      return view('pago')->with('user',$user)->with('conceptoPago', $conceptoPago);
    }
  
    public function busquedaColegiados(Request $request) {
  
  
      $tipoBusqueda = $request->get('tipoBusqueda');
      $textoBusqueda = $request->get('textoBusqueda');
      
      /*Crear tabla q guarde ultimo periodo de pago y habilidad*/
        if($tipoBusqueda == 1 and $textoBusqueda != "")
        {
          $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
          if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
          DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
          FROM cippuno.cip_users A 
          left join cippuno.cip_users_especialidads B on B.codigoCIP = A.codigoCIP
          LEFT JOIN cippuno.cip_pagos C on C.codigoCIP = A.codigoCIP
          WHERE A.codigoCIP like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1";
        }
        else if ($tipoBusqueda == 2 and $textoBusqueda != "") 
        {
          $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
          if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
          DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta  
          FROM cippuno.cip_users A 
          left join cippuno.cip_users_especialidads B on B.codigoCIP = A.codigoCIP
          LEFT JOIN cippuno.cip_pagos C on C.codigoCIP = A.codigoCIP
          WHERE A.dni like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1"; 
        }

        else if ($tipoBusqueda == 3 and $textoBusqueda != "") 
        {
          $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
          if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
          DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
          FROM cippuno.cip_users A 
          left join cippuno.cip_users_especialidads B on B.codigoCIP = A.codigoCIP
          LEFT JOIN cippuno.cip_pagos C on C.codigoCIP = A.codigoCIP
          WHERE A.name like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1"; 
        }

  
  
        $users = DB::select($sql);
        //$integrantes = DB::connection('mysql')->select($sql);
          if($users)
          {
            
            $sql = "SELECT A.codigoCIP, A.id, B.periodoPago, DATE_FORMAT(DATE_ADD(CONCAT(B.periodoPago,'01'), INTERVAL 3 MONTH), '%Y%m') as fHabil FROM cip_pagos A inner join cip_pagodetalle B on B.idPago = A.id and idConceptoPago = '01' WHERE A.codigoCIP =".$users[0]->codigoCIP." ORDER BY B.id DESC limit 1";
  
            $sql = "SELECT A.codigoCIP, A.id, A.ultimoPago as periodoPago, A.habilHasta as fHabil  from cip_users A WHERE A.codigoCIP = ".$users[0]->codigoCIP." ";
  
            $fpagos = DB::select($sql);
  
            $sql = "SELECT id, nroDocumento, codigoCIP, totalDeuda, nroCuotas, fecha, estado from cip_fraccionamiento where codigoCIP = ".$users[0]->codigoCIP." and estado = 1 limit 1";
  
            $fraccionamiento = DB::select($sql);
  
            $resultadoView = array(
                        "success" => true,
                        "mensaje"    => $users,
                        "fpdata" => $fpagos
                      );    
          }   
          else
          {
            $resultadoView = array(
                        "success" => false,
                        "mensaje"    => "Los datos de busqueda no encontraron ninguna coincidencia",
                      ); 
          }
      
        return json_encode($resultadoView);
  
    }
  
    
    
    public function registroPago(Request $request)
    {
        //$periodo = $request->get('periodo');
        $periodo = $_POST['periodo'];
        $codigoCIP = $_POST['dtCodigoCIP'];
        $totalPago = $_POST['totalPago'];
        $tipoDocumento = $_POST['tipoDocumento'];
  
        $concepto = $_POST['idConceptoPago'];
  
        $usuarioRegistro = 'guerrerocippuno';
  
        $sql = 'SELECT serieRecibo, nroRecibo FROM cip_pagosettings WHERE tipoDocumento ='.$tipoDocumento.' and usuario ="'.$usuarioRegistro.'"';
        $recibo = DB::select($sql);
  
        $serieRecibo = $recibo[0]->serieRecibo;
        $nroRecibo = $recibo[0]->nroRecibo;
        $reciboNuevo = $nroRecibo + 1;
  
        $cippagos = new cip_pagos();
  
        $cippagos->tipoDocumento = $tipoDocumento;
        $cippagos->serieRecibo = $serieRecibo;
        $cippagos->nroRecibo = $reciboNuevo;
        $cippagos->codigoCIP = $codigoCIP;
        $cippagos->habilHasta = '201900';
        $cippagos->tipoPago = '1';
        $cippagos->fechaPago = date("Y/m/d H:i:s");
        $cippagos->tipoMoneda = '1';
        $cippagos->idFormaPago = '1';
        $cippagos->total = $totalPago;
        $cippagos->estado = '1';
        $cippagos->usuarioCreador = $usuarioRegistro;
        $cippagos->fechaCreacion = date("Y/m/d H:i:s");
        $cippagos->fechaModificacion = date("Y/m/d H:i:s");
        
        if($cippagos->save())
        {
          $idTransaccion = $cippagos->getKey();
  
          $sqlUpdate = 'UPDATE cip_pagosettings SET nroRecibo ='.$reciboNuevo.'  WHERE tipoDocumento ='.$tipoDocumento.' and usuario ="'.$usuarioRegistro.'"';
  
          DB::update($sqlUpdate);
  
        }      
  
        $tam = sizeof($_POST['idConceptoPago']); 
        $conceptoPago = $_POST['idConceptoPago'];
  
        $individualPago = $_POST['individualPago'];
        $periodoMes = $_POST['pMes'];
  
        //$pagoDetalle_ = new cip_pagodetalle();
        $flagPeriodo = '00';
        for($i = 0; $i < $tam; $i++)
        {
          /*
          $pagoDetalle_ = new cip_pagodetalle();
  
          $pagoDetalle_->idPago = $idTransaccion;
          $pagoDetalle_->idConceptoPago = $conceptoPago[$i];
          $pagoDetalle_->montoPago = $individualPago[$i];
          $pagoDetalle_->save();
          */
          
          if($conceptoPago[$i] == '01')
          {
            $flagPeriodo = $periodoMes[$i]; 
          }
  
          $sqlInsert = 'INSERT INTO cip_pagodetalle (idPago, idConceptoPago, periodoPago, montoPago) values ('.$idTransaccion.', \''.$conceptoPago[$i].'\', '.$periodoMes[$i].','.$individualPago[$i].')';
  
          DB::insert($sqlInsert);
  
        }
  
        if($flagPeriodo != '00')
        {
          $sql = "SELECT DATE_FORMAT(DATE_ADD(CONCAT(B.periodoPago,'01'), INTERVAL 3 MONTH), '%Y%m') as fHabil FROM cip_pagos A
  inner join cip_pagodetalle B on B.idPago = A.id and B.idConceptoPago = '01'
  
  WHERE A.id = ".$idTransaccion." order by B.id DESC limit 1";
          
          
  
          $fHabilidad = DB::select($sql);
  
          //$serieRecibo = $fHabilidad[0]->fHabil;
  
          $sqlUpdate = 'UPDATE cip_pagos SET habilHasta ='.$fHabilidad[0]->fHabil.'  WHERE id ='.$idTransaccion.' ';
  
          DB::update($sqlUpdate);
  
          $sqlUpdate = 'UPDATE cip_users SET habilHasta =\''.$fHabilidad[0]->fHabil.'\',  ultimoPago = \''.$flagPeriodo.'\' WHERE codigoCIP =\''.$codigoCIP.'\' ';
  
          DB::update($sqlUpdate);
  
        }
  
        $resultadoView = array(
                        "success" => true,
                        "mensaje" => $idTransaccion,
                        "tam" => $conceptoPago[0]
                      );
  
        return json_encode($resultadoView);
  
    }
  
    public function pdfPrint()
    {
      /*$pdf = App::make('dompdf.wrapper');
      $pdf->loadHTML('<h1> TEXTO </h1>');
  
      return $pdf->stream();
      */
      $pdf = PDF::loadHTML('<h1> TEXTO ooo</h1>');
  
      return $pdf->stream();
  
    }
  
    public function pdfPrintBoucher(Request $request)
    {
      //$idTransaccion = $_POST['idTransaccion'];
      $idTransaccion = $request->get('idTransaccion');
  
      //$pdf = PDF::loadHTML('<h1> TEXTO ooo'.$idTransaccion.'</h1>');
      $sql="SELECT B.name, B.codigoCIP, A.nroRecibo, A.fechaCreacion, A.total FROM cip_pagos A 
              inner join cip_users B on B.codigoCIP = A.codigoCIP 
  
              where A.id =".$idTransaccion." limit 1";
      
      $datoPersona = DB::select($sql);
  
      $sql="SELECT A.periodoPago, B.conceptoPago, A.montoPago FROM cip_pagodetalle A 
            inner join cip_pagosconfig B on B.idConceptoPago = A.idConceptoPago and B.lVigente = 1 
            where A.idPago =".$idTransaccion."";
      
      $datoPago = DB::select($sql);
  
      $pdf = PDF::loadView('printComprobante',['colegiado'=>$datoPersona,'pagos'=>$datoPago]);
  
      return $pdf->stream();
    }
  
    public function vistaComprobante(Request $request)
    {
      return view('printComprobante');
    }
  
  
    public function fraccionamiento()
    {
  
      $sql = 'SELECT idConceptoPago, conceptoPago, montoPago FROM cip_pagosconfig';
      $conceptoPago = DB::select($sql);
  
      $user = "usuarioggg";
      return view('fraccionamiento')->with('user',$user);
    }
  
    public function busquedaColegiadosFrac(Request $request) {
  
  
          $tipoBusqueda = $request->get('tipoBusqueda');
          $textoBusqueda = $request->get('textoBusqueda');
          
          /*Crear tabla q guarde ultimo periodo de pago y habilidad*/
            if($tipoBusqueda == 1 and $textoBusqueda != "")
            {
              $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
              if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
              DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
              FROM cippuno.cip_users A 
              left join cippuno.cip_users_especialidads B on B.codigoCIP = A.codigoCIP
              LEFT JOIN cippuno.cip_pagos C on C.codigoCIP = A.codigoCIP
              WHERE A.codigoCIP like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1";
            }
            else if ($tipoBusqueda == 2 and $textoBusqueda != "") 
            {
              $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
              if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
              DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta  
              FROM cippuno.cip_users A 
              left join cippuno.cip_users_especialidads B on B.codigoCIP = A.codigoCIP
              LEFT JOIN cippuno.cip_pagos C on C.codigoCIP = A.codigoCIP
              WHERE A.dni like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1"; 
            }
  
            else if ($tipoBusqueda == 3 and $textoBusqueda != "") 
            {
              $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
              if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
              DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
              FROM cippuno.cip_users A 
              left join cippuno.cip_users_especialidads B on B.codigoCIP = A.codigoCIP
              LEFT JOIN cippuno.cip_pagos C on C.codigoCIP = A.codigoCIP
              WHERE A.name like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1"; 
            }
  
  
  
        $users = DB::select($sql);
        //$integrantes = DB::connection('mysql')->select($sql);
          if($users)
          {
            
            $sql = "SELECT A.codigoCIP, A.id, B.periodoPago, DATE_FORMAT(DATE_ADD(CONCAT(B.periodoPago,'01'), INTERVAL 3 MONTH), '%Y%m') as fHabil FROM cip_pagos A inner join cip_pagodetalle B on B.idPago = A.id and idConceptoPago = '01' WHERE A.codigoCIP =".$users[0]->codigoCIP." ORDER BY B.id DESC limit 1";
  
            $sql = "SELECT A.codigoCIP, A.id, A.ultimoPago as periodoPago, A.habilHasta as fHabil  from cip_users A WHERE A.codigoCIP = ".$users[0]->codigoCIP." ";
            $fpagos = DB::select($sql);
  
            $ultimoPago = substr($fpagos[0]->periodoPago, 0,4)."-".substr($fpagos[0]->periodoPago, 4,2)."-01";
  
            $sql = "SELECT TIMESTAMPDIFF(MONTH, '".$ultimoPago."', LAST_DAY(DATE_FORMAT(NOW(), '%Y-%m-%d'))) as nMeses, DATE_FORMAT(NOW(), '%Y-%m-%d') as dateHoy";
  
            $numMeses = DB::select($sql);
  
            $sql = "select idMontoPago, dFechaIni, dFechaFin, nMonto from cip_montopago where lVigente = 1 order by dFechaIni ASC";
  
            $bitacoraPago = DB::select($sql); 
  
            $nTotalDeuda = 0;
            for($i=1; $i<=$numMeses[0]->nMeses; $i++)
            {
              $date[$i] = date("Y-m-d",strtotime("+".$i." months",strtotime($ultimoPago)));
  
              for($j = sizeof($bitacoraPago)-1;$j>=0;$j--)
              {
                $fechaBitacora = strtotime($bitacoraPago[$j]->dFechaIni);
                $fechaP = strtotime($date[$i]); 
                if($fechaP>=$fechaBitacora)
                {
                  $dcom[$i] = $date[$i].'->'.$bitacoraPago[$j]->nMonto; 
                  $nTotalDeuda = $nTotalDeuda + $bitacoraPago[$j]->nMonto; 
                  break;
                }
              }
  
            }
  
  
  
            $resultadoView = array(
                        "success" => true,
                        "mensaje"    => $users,
                        "fpdata" => $fpagos,
                        "ultimoPago" =>$ultimoPago,
                        "nTotalDeuda" => $nTotalDeuda,
                        "bitacoraPago"=> $bitacoraPago
                      );    
          }   
          else
          {
            $resultadoView = array(
                        "success" => false,
                        "mensaje"    => "Los datos de busqueda no encontraron ninguna coincidencia",
                      ); 
          }
      
        return json_encode($resultadoView);
  
    }
  
}
