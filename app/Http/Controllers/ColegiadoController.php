<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

use App\cip_pagos;
use App\cip_fraccionamiento;
use App\cip_fraccionamientodetalle;
use App\cip_fraccionamientomeses;
use App\cip_pagodetalle;
use App\cip_constancias;

use Codedge\Fpdf\Fpdf\Fpdf;
use Response;

class ColegiadoController extends Controller
{

  public function pagoColegiados()
  {

    $sql = 'SELECT idConceptoPago, conceptoPago, montoPago FROM cip_pagosconfig where lVigente =1 '; 
    $conceptoPago = DB::select($sql);

    $sql = "SELECT codigo, valor, extra FROM cip_param where grupo = '003';";
    $departamento = DB::select($sql);

    $user = "usuarioggg";
    return view('pago')->with('user',$user)
                      ->with('conceptoPago', $conceptoPago)
                      ->with('departamento', $departamento);
  }

  public function busquedaColegiadosNombre(Request $request) {

    $tipoBusqueda = $request->get('tipoBusqueda');
    $textoBusqueda = $request->get('textoBusqueda');

    $sql = "SELECT concat(paterno,' ', materno,', ', nombres) as nombres, dni, codigoCIP 
            FROM cip_users 
            where concat(paterno,' ',materno,' ',nombres) like '%".$textoBusqueda."%' 
            and codigoCIP is not null
            order by paterno asc limit 20";
            
    $users = DB::select($sql);
      
    if($users)
    {

     $resultadoView = array(
                      "success" => true,
                      "mensaje" => "Datos encontrados",
                      "data" => $users,
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

  public function busquedaColegiados(Request $request) {


        $tipoBusqueda = $request->get('tipoBusqueda');
        $textoBusqueda = $request->get('textoBusqueda');
        
        /*Crear tabla q guarde ultimo periodo de pago y habilidad*/
          if($tipoBusqueda == 1 and $textoBusqueda != "")
          {
            $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
            if(DATE_FORMAT(NOW(), '%Y-%m-%d') <= LAST_DAY(STR_TO_DATE(concat(C.habilHasta,'01'),'%Y%m%d')), 'HABIL', 'NO HABIL') estadoHabil,
            DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
            FROM cip_users A 
            left join cip_users_especialidads B on B.codigoCIP = A.codigoCIP
            LEFT JOIN cip_pagos C on C.codigoCIP = A.codigoCIP
            WHERE A.codigoCIP like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1";
          }
          else if ($tipoBusqueda == 2 and $textoBusqueda != "") 
          {
            $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
            if(DATE_FORMAT(NOW(), '%Y-%m-%d') <= LAST_DAY(STR_TO_DATE(concat(C.habilHasta,'01'),'%Y%m%d')), 'HABIL', 'NO HABIL') estadoHabil,
            DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta  
            FROM cip_users A 
            left join cip_users_especialidads B on B.codigoCIP = A.codigoCIP
            LEFT JOIN cip_pagos C on C.codigoCIP = A.codigoCIP
            WHERE A.dni like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1"; 
          }

          else if ($tipoBusqueda == 3 and $textoBusqueda != "") 
          {
            $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
            if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
            DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
            FROM cip_users A 
            left join cip_users_especialidads B on B.codigoCIP = A.codigoCIP
            LEFT JOIN cip_pagos C on C.codigoCIP = A.codigoCIP
            WHERE A.name like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1"; 
          }



      $users = DB::select($sql);
      //$integrantes = DB::connection('mysql')->select($sql);
        if($users)
        {
          
          $sql = "SELECT A.codigoCIP, A.id, B.periodoPago, DATE_FORMAT(DATE_ADD(CONCAT(B.periodoPago,'01'), INTERVAL 3 MONTH), '%Y%m') as fHabil FROM cip_pagos A inner join cip_pagodetalle B on B.idPago = A.id and idConceptoPago = '01' WHERE A.codigoCIP =".$users[0]->codigoCIP." ORDER BY B.id DESC limit 1";

          $sql = "SELECT A.codigoCIP, A.id, A.ultimoPago as periodoPago, A.habilHasta as fHabil  from cip_users A WHERE A.codigoCIP = ".$users[0]->codigoCIP." ";

          $fpagos = DB::select($sql);

          $sql = "SELECT CONCAT('OP',B.tipoPago,B.id) as idConceptoPago, 
            B.descripcion as conceptoPago, 
            B.montoPago, '0000-00-00' as fecha FROM cip_otrospagosdetalle A 
            inner join cip_otrospagos B on B.id = A.idOtroPago
            where A.codigoCIP = '".$users[0]->codigoCIP."' and A.idPago = 0;";
          $conceptoPagoDeuda = DB::select($sql);

          $sql = "SELECT cast(concat('FR',lpad(B.nroCuota,2,'0'),A.id) as CHAR(10) ) as idConceptoPago,
    CAST(if(B.nroCuota = 0,'Fracc. Cuota Inicial',concat('Fracc. Cuota Nro. ', B.nroCuota)) AS CHAR(50)) as conceptoPago, 
    B.montoPago, CAST(B.fechaPago AS DATE) as fecha from cip_fraccionamiento A
inner join cip_fraccionamientodetalle B on B.idFraccionamiento = A.id and idPago = 0
                  where A.codigoCIP = '".$users[0]->codigoCIP."' and A.estado = 1 ".
                  " ";
           
          $conceptoPagoFrac = DB::select($sql);

          $sql = 'SELECT idConceptoPago, conceptoPago, montoPago, fecha FROM cip_pagosconfig where lVigente =1 ';
          $conceptoPago = DB::select($sql);

          $sql = "select idMontoPago, dFechaIni, dFechaFin, nMonto from cip_montopago where lVigente = 1 order by dFechaIni ASC";

          $bitacoraPago = DB::select($sql);

          $sql = "SELECT A.codigoCIP ,A.idEspecialidad, B.valor FROM cip_users_especialidads A
          left join cip_param B on B.grupo = '053' and B.codigo = A.idEspecialidad 
          where A.codigoCIP = '".$users[0]->codigoCIP."' order by A.id asc";

          $especialidad = DB::select($sql); 

          $sql = "select concat(A.serieRecibo,'-',A.nroRecibo) as recibo, A.fechaPago, A.total, B.name, A.estado 
from cip_pagos A
left join cip_users B on B.username = A.usuarioCreador
where A.codigoCIP = '".$users[0]->codigoCIP."' order by A.id desc;";

          $reportFecha = DB::select($sql);

          $sql = "SELECT A.id, A.codigoCIP, A.nroRecibo, A.tipo, B.conceptoPago, C.valor, A.asunto, 
                      concat(A.serieRecibo,'-',A.nroRecibo) as recibo, 
                      A.fecha, concat('A-',LPAD(A.nroConstancia,7,'0')) as nroConstancia 
                  FROM cip_constancias A
                  LEFT JOIN cip_pagosconfig B on B.idConceptoPago = A.tipo
                  LEFT JOIN cip_param C on C.grupo = '053' and C.codigo = A.idEspecialidad
                  where 
                  A.estado = 1 and
                  A.codigoCIP = '".$users[0]->codigoCIP."' order by A.id desc;";

          $reportCertificado = DB::select($sql);

          $sql = "SELECT B.descripcion, B.periodoPago, B.montoPago, 
                  B.resTipoPago, C.name, B.fechaCreacion, 
                  if(idPago != 0, 'Pagado','Por pagar') as estado
                  FROM cip_otrospagosdetalle A
                  left join cip_otrospagos B on B.id = A.idOtroPago
                  left join cip_users C on C.username = B.usuarioCreador
                  where A.codigoCIP = '".$users[0]->codigoCIP."' order by B.id desc;";

          $reportMultas = DB::select($sql);

          $sql = "SELECT concat(A.nroDocumento,'-', SUBSTR(A.fecha, 1,4)) as nroDocumento, 
                  A.fechaCreacion, A.totalDeuda, A.nroCuotas, B.name,
                  if(A.estado = 1, 'Activo', 'Pagado') as estado
                  FROM cip_fraccionamiento A 
                  left join cip_users B on B.username = A.usuarioCreador
                  where A.codigoCIP = '".$users[0]->codigoCIP."';";

          $reportFracc = DB::select($sql);
          

          $resultadoView = array(
                      "success" => true,
                      "mensaje" => $users,
                      "fpdata" => $fpagos,
                      "conceptoPagoDeuda" => $conceptoPagoDeuda,
                      "conceptoPagoFrac" => $conceptoPagoFrac,
                      "conceptoPago" => $conceptoPago,
                      "bitacoraPago" => $bitacoraPago,
                      "especialidad" => $especialidad, 
                      "reportFecha" => $reportFecha,
                      "reportCertificado" => $reportCertificado,
                      "reportMultas" => $reportMultas,
                      "reportFracc" => $reportFracc,            
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

  function descFracc($cadena)
  {
    $v = (int) $cadena;
    return 'Fracc. Cuota Nro.'.$v;
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
        
        if($conceptoPago[$i] == '01')
        {
          $flagPeriodo = $periodoMes[$i]; 
        }
        /*
        $cippagod = new cip_pagodetalle();

        $cippagod->idPago = $idTransaccion;
        $cippagod->idConceptoPago = "'".$conceptoPago[$i]."'";
        $cippagod->periodoPago = "'".$periodoMes[$i]."'";
        $cippagod->montoPago = $individualPago;
        */
        $caseCad = substr($conceptoPago[$i], 0, 2);
        $desc_otroConcepto = '';
        if($caseCad == 'FR')
        {
          //$cippagod->otroConcepto = "'".'Fracc. Cuota Nro.'.substr($conceptoPago[$i], 2, 2)."'";
          $desc_otroConcepto = 'Fracc. Cuota Nro.'.substr($conceptoPago[$i], 2, 2);
        }
        if($caseCad == 'OP')
        {
          $idOtroPago_ = substr($conceptoPago[$i], 4, strlen($conceptoPago[$i])-4);
          $sql = "SELECT id, descripcion, tipoPago FROM db_cip.cip_otrospagos where id = ".$idOtroPago_."";

          $datOtroPago = DB::select($sql);
          $desc_otroConcepto = $datOtroPago[0]->descripcion;          
        }

        $sqlInsert = 'INSERT INTO cip_pagodetalle (idPago, idConceptoPago, otroConcepto, periodoPago, montoPago) values ('.$idTransaccion.', \''.$conceptoPago[$i].'\',  \''.$desc_otroConcepto.'\', '.$periodoMes[$i].','.$individualPago[$i].')';  

        DB::insert($sqlInsert);

        if($conceptoPago[$i] == '90' || $conceptoPago[$i] == '91' || $conceptoPago[$i] == '92' || $conceptoPago[$i] == '93')
          {
          if($conceptoPago[$i] == '90')
            {
              $cipConstancias = new cip_constancias();

              $cipConstancias->idPago = $idTransaccion;
              $cipConstancias->codigoCIP = $codigoCIP;
              $cipConstancias->idEspecialidad = '0';
              $cipConstancias->serieRecibo = $serieRecibo;
              $cipConstancias->nroRecibo = $reciboNuevo;
              $cipConstancias->estado = 1;
              $cipConstancias->habilHasta = '';
              $cipConstancias->fecha = date("Y/m/d H:i:s");
              $cipConstancias->tipo = $conceptoPago[$i];
              $cipConstancias->institucion = '-';
              $cipConstancias->asunto = 'CERTIFICADO DE HABILIDAD GENÉRICO';
              $cipConstancias->modalidad = '';
              $cipConstancias->monto = 0.00;

              $cipConstancias->save();
            }

          if($conceptoPago[$i] == '91')
            {
              $cipConstancias = new cip_constancias();

              $cipConstancias->idPago = $idTransaccion;
              $cipConstancias->codigoCIP = $codigoCIP;
              $cipConstancias->idEspecialidad = '0';
              $cipConstancias->serieRecibo = $serieRecibo;
              $cipConstancias->nroRecibo = $reciboNuevo;
              $cipConstancias->estado = 1;
              $cipConstancias->habilHasta = '';
              $cipConstancias->fecha = date("Y/m/d H:i:s");
              $cipConstancias->tipo = $conceptoPago[$i];
              $cipConstancias->ubigeo = '210101';
              $cipConstancias->institucion = '-';
              $cipConstancias->asunto = 'CERTIFICADO DE HABILIDAD ESPECÍFICO';
              $cipConstancias->modalidad = '';
              $cipConstancias->monto = 0.00;

              $cipConstancias->save();
            }

            if($conceptoPago[$i] == '92')
            {
              $cipConstancias = new cip_constancias();

              $cipConstancias->idPago = $idTransaccion;
              $cipConstancias->codigoCIP = $codigoCIP;
              $cipConstancias->idEspecialidad = '0';
              $cipConstancias->serieRecibo = $serieRecibo;
              $cipConstancias->nroRecibo = $reciboNuevo;
              $cipConstancias->estado = 1;
              $cipConstancias->habilHasta = '';
              $cipConstancias->fecha = date("Y/m/d H:i:s");
              $cipConstancias->tipo = $conceptoPago[$i];
              $cipConstancias->ubigeo = '210101';
              $cipConstancias->institucion = '-';
              $cipConstancias->asunto = '';
              $cipConstancias->zona = '';
              $cipConstancias->direccion = '';
              $cipConstancias->modalidad = '';
              $cipConstancias->monto = 0.00;

              $cipConstancias->save();
            }

            if($conceptoPago[$i] == '93')
            {
              $cipConstancias = new cip_constancias();

              $cipConstancias->idPago = $idTransaccion;
              $cipConstancias->codigoCIP = $codigoCIP;
              $cipConstancias->idEspecialidad = '0';
              $cipConstancias->serieRecibo = $serieRecibo;
              $cipConstancias->nroRecibo = $reciboNuevo;
              $cipConstancias->estado = 1;
              $cipConstancias->habilHasta = '';
              $cipConstancias->fecha = date("Y/m/d H:i:s");
              $cipConstancias->tipo = $conceptoPago[$i];
              $cipConstancias->ubigeo = '210101';
              $cipConstancias->institucion = '-';
              $cipConstancias->asunto = '';
              $cipConstancias->modalidad = '01';
              $cipConstancias->monto = 0.00;

              $cipConstancias->save();
            }


            $sqlUpdate = "UPDATE  cip_constancias 
                              set habilHasta = 
                                  (select habilHasta 
                                  from cip_users B 
                                  where B.codigoCIP = '".$codigoCIP."' LIMIT 1) 
                          where codigoCIP = '".$codigoCIP."' and idPago = '".$idTransaccion."';";

          DB::update($sqlUpdate); 

          }

        //$cippagod->save();
        
        if($caseCad == 'FR')
        {
          $idFraccionamiento_ = substr($conceptoPago[$i], 4, strlen($conceptoPago[$i])-4);
          $nroCuota_ = (int)substr($conceptoPago[$i], 2, 2);

          $sqlUpdate = 'UPDATE cip_fraccionamientodetalle SET idPago ='.$idTransaccion.'  WHERE idFraccionamiento ='.$idFraccionamiento_.' and nroCuota ="'. $nroCuota_ .'"';

          DB::update($sqlUpdate);

          $sql = "SELECT DATE_FORMAT(DATE_ADD(fechaPago, INTERVAL 1 MONTH), '%Y%m') as fHabil, fechaPago from cip_fraccionamientodetalle WHERE idFraccionamiento =".$idFraccionamiento_." and nroCuota =". $nroCuota_ ."";

          $fHabilidad = DB::select($sql);

          $sqlUpdate = 'UPDATE cip_pagos SET habilHasta ='.$fHabilidad[0]->fHabil.'  WHERE id ='.$idTransaccion.' ';

          DB::update($sqlUpdate);

          $sqlUpdate = 'UPDATE cip_users SET habilHasta =\''.$fHabilidad[0]->fHabil.'\',  ultimoPago = \''.$fHabilidad[0]->fechaPago.'\' WHERE codigoCIP =\''.$codigoCIP.'\' ';

          DB::update($sqlUpdate);

          $sqlUpdate = 'UPDATE cip_constancias SET habilHasta =\''.$fHabilidad[0]->fHabil.'\' WHERE codigoCIP =\''.$codigoCIP.'\' and idPago =\''.$idTransaccion.'\' ';

          DB::update($sqlUpdate);          

        }

        if($caseCad == 'OP')
        {
          $idOtroPago_ = substr($conceptoPago[$i], 4, strlen($conceptoPago[$i])-4);
          
          $sqlUpdate = 'UPDATE cip_otrospagosdetalle SET idPago ='.$idTransaccion.'  WHERE idOtroPago ='.$idOtroPago_.' and codigoCIP ="'. $codigoCIP .'"';

          DB::update($sqlUpdate);          
        }

        /*$sqlInsert = 'INSERT INTO cip_pagodetalle (idPago, idConceptoPago, periodoPago, montoPago) values ('.$idTransaccion.', \''.$conceptoPago[$i].'\', '.$periodoMes[$i].','.$individualPago[$i].')'; */


        /*if(substr($conceptoPago[$i], 0, 2) == 'FR')
        {
        $sqlInsert = 'INSERT INTO cip_pagodetalle (idPago, idConceptoPago, otroConcepto, periodoPago, montoPago) values ('.$idTransaccion.', \''.$conceptoPago[$i].'\',  \''.descFracc($conceptoPago[$i],2,2).'\', '.$periodoMes[$i].','.$individualPago[$i].')';          
        }

        DB::insert($sqlInsert);*/

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

        $sqlUpdate = 'UPDATE cip_constancias SET habilHasta =\''.$fHabilidad[0]->fHabil.'\' WHERE codigoCIP =\''.$codigoCIP.'\' and idPago =\''.$idTransaccion.'\' ';

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

    $sql="SELECT A.periodoPago, if(B.conceptoPago is null, A.otroConcepto, B.conceptoPago) as conceptoPago, A.montoPago  FROM cip_pagodetalle A 
          left join cip_pagosconfig B on B.idConceptoPago = A.idConceptoPago and B.lVigente = 1 
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

          $usuarioRegistro = 'guerrerocippuno';

      $sql = 'SELECT serieRecibo, nroRecibo FROM cip_fraccionamientosettings WHERE usuario ="'.$usuarioRegistro.'" and lVigente = 1';
      $recibo = DB::select($sql);

          $serieRecibo = $recibo[0]->serieRecibo;
      $nroRecibo = $recibo[0]->nroRecibo;
      $reciboNuevo = $nroRecibo + 1;

      $sql = "SELECT CONCAT('OP',B.tipoPago,B.id) as idConceptoPago, 
            B.descripcion as conceptoPago, 
            B.montoPago, '0000-00-00' as fecha FROM cip_otrospagosdetalle A 
            inner join cip_otrospagos B on B.id = A.idOtroPago
            where A.codigoCIP = '".$users[0]->codigoCIP."' and A.idPago = 0;";
          $conceptoPagoDeuda = DB::select($sql);

          $sql = "select cast(concat('FR',lpad(B.nroCuota,2,'0'),A.id) as CHAR(10) ) as idConceptoPago,
    CAST(if(B.nroCuota = 0,'Fracc. Cuota Inicial',concat('Fracc. Cuota Nro. ', B.nroCuota)) AS CHAR(50)) as conceptoPago, 
    B.montoPago, CAST(B.fechaPago AS DATE) as fecha from cip_fraccionamiento A
inner join cip_fraccionamientodetalle B on B.idFraccionamiento = A.id and idPago = 0
                  where A.codigoCIP = '".$users[0]->codigoCIP."' and A.estado = 1 ".
                  " ";
           
          $conceptoPagoFrac = DB::select($sql);

          $resultadoView = array(
                      "success" => true,
                      "mensaje"    => $users,
                      "fpdata" => $fpagos,
                      "ultimoPago" =>$ultimoPago,
                      "nTotalDeuda" => $nTotalDeuda,
                      "bitacoraPago" => $bitacoraPago,
                      "nroRecibo" =>$reciboNuevo,
                      "conceptoPagoDeuda" =>$conceptoPagoDeuda,
                      "conceptoPagoFrac" =>$conceptoPagoFrac,
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

  public function registroFraccionamiento(Request $request)
  {
      //$periodo = $request->get('periodo');

      $codigoCIP = $_POST['dtCodigoCIP'];
      $nroDocumento = $_POST['nroDocumento'];
      $nroCuotas = $_POST['nroCuotas'];
      $deudaTotalPago = $_POST['deudaTotalPago'];

      $sql = "SELECT A.codigoCIP, A.id, A.ultimoPago as periodoPago, A.habilHasta as fHabil  from cip_users A WHERE A.codigoCIP = ".$codigoCIP." ";
          $fpagos = DB::select($sql);

      $ultimoPago = substr($fpagos[0]->periodoPago, 0,4)."-".substr($fpagos[0]->periodoPago, 4,2)."-01";

      $sql = "select idMontoPago, dFechaIni, dFechaFin, nMonto from cip_montopago where lVigente = 1 order by dFechaIni ASC";

      $bitacoraPago = DB::select($sql);

      
      $file = $request->file('file');

      $path = 'FileFracc';
      $usuarioRegistro = 'guerrerocippuno';

      if($file)
      {
        
        $extension = $file->getClientOriginalExtension();
        $nombre = $file->getClientOriginalName();
        $renombre = $nombre.'.'.$file->getClientOriginalExtension();
        $upload = $file->move($path,$renombre);
      }      
      
      $cipfrac = new cip_fraccionamiento();
      $cipfrac->nroDocumento = $nroDocumento;
      $cipfrac->codigoCIP = $codigoCIP;
      $cipfrac->totalDeuda = $deudaTotalPago;
      $cipfrac->nroCuotas = $nroCuotas;
      $cipfrac->fecha = date("Y-m-d");
      $cipfrac->estado = '1';
      $cipfrac->usuarioCreador = $usuarioRegistro;
      $cipfrac->fechaCreacion = date("Y/m/d H:i:s");
      $cipfrac->fechaModificacion = date("Y/m/d H:i:s");

      if($cipfrac->save())
      {
        $idTransaccion = $cipfrac->getKey();

        $sqlUpdate = 'UPDATE cip_fraccionamientosettings SET nroRecibo ='.$nroDocumento.'  W1HERE usuario ="'.$usuarioRegistro.'" and lVigente = 1';

        DB::update($sqlUpdate);

      }

      $nroCuota = $_POST['nroCuota'];
      $fechaPagoMes = $_POST['fechaPagoMes'];
      $montoPagoMes = $_POST['montoPagoMes'];
      $cantidadMeses = $_POST['cantidadMeses'];

      $k = 1; 

      for($i = 0 ; $i <= $nroCuotas; $i++ )
      {
        $cip_fdetalle = new cip_fraccionamientodetalle();
        $cip_fdetalle->idFraccionamiento = $idTransaccion;
        $cip_fdetalle->idPago = 0;
        $cip_fdetalle->nroCuota = $i;
        $cip_fdetalle->fechaPago = $fechaPagoMes[$i];
        $cip_fdetalle->montoPago = $montoPagoMes[$i];
        $cip_fdetalle->save();

        
        for($j = 0; $j < $cantidadMeses[$i]; $j++)
        {

          $date = date("Y-m-d",strtotime("+".$k." months",strtotime($ultimoPago)));
          $nMontoInsert = 0;
          for($m = sizeof($bitacoraPago)-1;$m>=0;$m--)
          {
            $fechaBitacora = strtotime($bitacoraPago[$m]->dFechaIni);
            $fechaP = strtotime($date); 
            if($fechaP>=$fechaBitacora)
            {
               
              $nMontoInsert = $bitacoraPago[$m]->nMonto; 
              break;
            }
          }

          $cip_fdetallemeses = new cip_fraccionamientomeses();
          $cip_fdetallemeses->idFraccionamiento = $idTransaccion;
          $cip_fdetallemeses->nroCuota = $i;
          $cip_fdetallemeses->periodoPago = substr($date,0,4).substr($date,5,2);; 
          $cip_fdetallemeses->montoPago = $nMontoInsert;
          $cip_fdetallemeses->save();

          $k++;
        }

      }
      

      $resultadoView = array(
                      "success" => true,
                      "mensaje" => $extension,
                      "tam" => $nombre
                    );

      return json_encode($resultadoView);

  }

  public function rptCertificadoData(Request $request)
  {
      $id = $_POST['id'];
      $codigoCIP = $_POST['codigoCIP'];
      $nroRecibo = $_POST['nroRecibo'];
      $tipo = $_POST['tipo'];

      $sql = "SELECT A.codigoCIP, concat(A.paterno,' ',A.materno,', ',A.nombres) as nombres,
    B.idEspecialidad, C.valor, B.fechaIncorporacion 
      from cip_users A 
      left join cip_users_especialidads B on B.codigoCIP = A.codigoCIP
      left join cip_param C on C.grupo = '053' and codigo = B.idEspecialidad
      where A.codigoCIP = '".$codigoCIP."' order by B.fechaIncorporacion desc";

      $dataCert = DB::select($sql);

      $sql = "SELECT id, idPago, codigoCIP, idEspecialidad, 
              nroConstancia, tipo, institucion, asunto, ubigeo,
              zona, direccion, modalidad, monto
      FROM cip_constancias 
      where id = ".$id." and codigoCIP = '".$codigoCIP."' and nroRecibo = ".$nroRecibo." and tipo = ".$tipo." limit 1;";

      $dataformCert = DB::select($sql);

      if($tipo == '91' || $tipo == '92' || $tipo == '93')
      {

      $sql = "SELECT extra 
              from cip_param 
              where grupo = '001' and codigo = '".$dataformCert[0]->ubigeo."' limit 1;";

      $dataUbigeo = DB::select($sql);

      $sql = "SELECT codigo, valor, extra 
              from cip_param where grupo = '001' and extra = '".$dataUbigeo[0]->extra."';";

      $dataDistrito = DB::select($sql);


      $sql = "SELECT codigo, valor, extra 
              from cip_param where grupo = '002' and codigo = '".$dataDistrito[0]->extra."';";

      $dataProvUbigeo = DB::select($sql);

      $sql = "SELECT codigo, valor, extra 
              from cip_param where grupo = '002' and extra = '".$dataProvUbigeo[0]->extra."';";

      $dataProvincia = DB::select($sql);

      $sql = "SELECT codigo, valor, extra 
              from cip_param where grupo = '003' and codigo = '".$dataProvincia[0]->extra."';";

      $dataDepUbigeo = DB::select($sql);

      $sql = "SELECT codigo, valor
              from cip_param where grupo = '003';";

      $dataDepartamento = DB::select($sql);

    $resultadoView = array(
                      "success" => true,
                      "data" => $dataCert,
                      "dataForm" => $dataformCert,
                      "dataDepartamento" => $dataDepartamento,
                      "dataProvincia" => $dataProvincia,
                      "dataDistrito" => $dataDistrito,
                      "selecDep" => $dataProvUbigeo[0]->extra,
                      "selecProv" => $dataUbigeo[0]->extra,
                      "selecDist" => $dataformCert[0]->ubigeo,
                    );
      }

      if($tipo == '90')
      {
           $resultadoView = array(
                      "success" => true,
                      "data" => $dataCert,
                      "dataForm" => $dataformCert,
                    ); 
      }

      return json_encode($resultadoView);
  }

  public function extraeProvincia(Request $request)
  {
    $departamento = $_POST['departamento'];

    $sql = "select codigo, valor, extra from cip_param where grupo = '002' and extra = '".$departamento."';";

    $dataProvincia = DB::select($sql);

    $resultadoView = array(
                      "success" => true,
                      "data" => $dataProvincia,
                    );
    return json_encode($resultadoView); 

  }

  public function extraeDistrito(Request $request)
  {
    $provincia = $_POST['provincia'];

    $sql = "select codigo, valor, extra from cip_param where grupo = '001' and extra = '".$provincia."';";

    $dataDistrito = DB::select($sql);

    $resultadoView = array(
                      "success" => true,
                      "data" => $dataDistrito,
                    );
    return json_encode($resultadoView); 

  }

  public function saveCertificadoHabilidad(Request $request)
  {
    $idConstancia = $_POST['mIdConstancia'];    
    $tipoConstancia = $_POST['mTipoConstancia'];
    $idEspecialidad = $_POST['mHCEEsp'];
    $nroConstancia = $_POST['mHCENumCert'];
    $institucion = $_POST['mHCEEntidad'];
    $ubigeo = $_POST['mHCEDistrito'];
    $asunto = $_POST['mHCEAsunto'];


    if($tipoConstancia == '90')
    {
      $sqlUpdate = "UPDATE cip_constancias SET idEspecialidad = '".$idEspecialidad."', nroConstancia = ".$nroConstancia.", institucion = '".$institucion."', asunto='".$asunto."' where id = ".$idConstancia." and tipo ='".$tipoConstancia."'"; 
    }

    if($tipoConstancia == '91')
    {
      $sqlUpdate = "UPDATE cip_constancias SET idEspecialidad = '".$idEspecialidad."', nroConstancia = ".$nroConstancia.", institucion = '".$institucion."', ubigeo = '".$ubigeo."', asunto='".$asunto."' where id = ".$idConstancia." and tipo ='".$tipoConstancia."'"; 
    }

    if($tipoConstancia == '92')
    {
      $zona = $_POST['mHPPZona'];
      $direccion = $_POST['mHPPDireccion'];

      $sqlUpdate = "UPDATE cip_constancias SET idEspecialidad = '".$idEspecialidad."', nroConstancia = ".$nroConstancia.", institucion = '".$institucion."', ubigeo = '".$ubigeo."', asunto='".$asunto."', zona='".$zona."', direccion = '".$direccion."' where id = ".$idConstancia." and tipo ='".$tipoConstancia."'"; 
    }

    if($tipoConstancia == '93')
    {
      $modalidad = $_POST['mHFCModContrato'];
      $monto = $_POST['mHFCMontoContrato'];

      $sqlUpdate = "UPDATE cip_constancias SET idEspecialidad = '".$idEspecialidad."', nroConstancia = ".$nroConstancia.", institucion = '".$institucion."', ubigeo = '".$ubigeo."', asunto='".$asunto."', modalidad='".$modalidad."', monto = '".$monto."' where id = ".$idConstancia." and tipo ='".$tipoConstancia."'"; 
    }

    DB::update($sqlUpdate);

    $resultadoView = array(
                      "success" => true,
                      "data" => "Datos actualizados correctamente.",
                    );
    return json_encode($resultadoView);     
  }

  public function fpdf()
  {
    $fpdf = new Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Arial', '', 12);
    $fpdf->Cell(50, 25, 'Hello World!');
    
    
    //return $fpdf->Output();//$pdf->stream();
    $headers = ['Content-Type'=>'application/pdf'];
    return Response::make($fpdf->Output(),200,$headers);
  }

  public function rptCertificadoGenerico(Request $request)
  {
    $fpdf = new Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Arial', '', 12);
    $fpdf->Cell(50, 25, 'Hello World!');
    
    
    //return $fpdf->Output();//$pdf->stream();
    $headers = ['Content-Type'=>'application/pdf'];
    return Response::make($fpdf->Output(),200,$headers);
  public function rptCertificados90(Request $request)
  {
    $mes['01']="ENERO";
    $mes['02']="FEBRERO";
    $mes['03']="MARZO";
    $mes['04']="ABRIL";
    $mes['05']="MAYO";
    $mes['06']="JUNIO";
    $mes['07']="JULIO";
    $mes['08']="AGOSTO";
    $mes['09']="SEPTIEMBRE";
    $mes['10']="OCTUBRE";
    $mes['11']="NOVIEMBRE";
    $mes['12']="DICIEMBRE";
    //$idTransaccion = $_POST['idTransaccion'];
    $idCert = $request->get('idCert');

    //$pdf = PDF::loadHTML('<h1> TEXTO ooo'.$idTransaccion.'</h1>');

    $sql = "SELECT A.id, concat(B.nombres,' ',B.paterno,' ',B.materno) as nombres, 
    A.codigoCIP,
    DATE_FORMAT(C.fechaIncorporacion,'%d/%m/%Y') as fechaIncorporacion, D.extra as especialidad,
    A.asunto,
    A.institucion,
    '-' as lugar, DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%d') as vdia, 
            DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%m') as vmes,
            DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%Y') as vyear,
    'PUNO' as consejo, DATE_FORMAT(A.fecha,'%d') as fdia, DATE_FORMAT(A.fecha,'%m') as fmes, SUBSTR(A.fecha, 3, 2) as fyear
FROM cip_constancias A 
left join cip_users B on B.codigoCIP = A.codigoCIP
left join cip_users_especialidads C on C.idEspecialidad = A.idEspecialidad and C.codigoCIP = A.codigoCIP
left join cip_param D on D.grupo = '053' and D.codigo = A.idEspecialidad
            WHERE A.id = ".$idCert.";";

    $data = DB::select($sql);

    $fpdf = new Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Times', '', 10);
    $fpdf->SetY(8);
    $fpdf->SetX(36);
    $fpdf->Cell(0, 25, $data[0]->nombres,0,1);

    $fpdf->SetY(14);
    $fpdf->SetX(70);
    $fpdf->Cell(0, 25, 'PUNO');
    $fpdf->SetX(165);
    $fpdf->Cell(0, 25, $data[0]->codigoCIP);

    $fpdf->SetY(21);
    $fpdf->SetX(45);
    $fpdf->Cell(0, 25, $data[0]->fechaIncorporacion);
    $fpdf->SetX(125);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->especialidad)); 

    $fpdf->SetY(35);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->asunto));

    $fpdf->SetY(42);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->institucion));

    $fpdf->SetY(49);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->lugar));    
    $fpdf->SetX(173);
    $fpdf->Cell(0, 25, $data[0]->vdia);
    $fpdf->SetX(184);
    $fpdf->Cell(0, 25, $data[0]->vmes);
    $fpdf->SetX(195);
    $fpdf->Cell(0, 25, $data[0]->vyear);

    $fpdf->SetY(56);
    $fpdf->SetX(125);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->consejo));
    $fpdf->SetX(157);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fdia));
    $fpdf->SetX(170);
    $fpdf->Cell(0, 25, utf8_decode($mes[$data[0]->fmes]));
    $fpdf->SetX(201);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fyear));

    $fpdf->SetFont('Times', '', 12);
    $fpdf->SetY(115);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, $data[0]->nombres,0,1);

    $fpdf->SetY(123);
    $fpdf->SetX(100);
    $fpdf->Cell(0, 25, $data[0]->consejo,0,1);

    $fpdf->SetY(131);
    $fpdf->SetX(110);
    $fpdf->Cell(0, 25, $data[0]->codigoCIP,0,1);
    $fpdf->SetY(131);
    $fpdf->SetX(172);
    $fpdf->Cell(0, 25, $data[0]->fechaIncorporacion,0,1);

    $fpdf->SetY(139);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->especialidad));

    $fpdf->SetY(178);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->asunto));

    $fpdf->SetY(189);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->institucion));

    $fpdf->SetY(200);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->lugar)); 

    $fpdf->SetY(225);
    $fpdf->SetX(105);
    $fpdf->Cell(0, 25, $data[0]->vdia);
    $fpdf->SetX(121);
    $fpdf->Cell(0, 25, $data[0]->vmes);
    $fpdf->SetX(138);
    $fpdf->Cell(0, 25, $data[0]->vyear);

    $fpdf->SetY(240);
    $fpdf->SetX(88);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->consejo));
    $fpdf->SetX(124);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fdia));
    $fpdf->SetX(141);
    $fpdf->Cell(0, 25, utf8_decode($mes[$data[0]->fmes]));
    $fpdf->SetX(175);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fyear));
    //return $fpdf->Output();//$pdf->stream();
    $headers = ['Content-Type'=>'application/pdf'];
    return Response::make($fpdf->Output(),200,$headers);
    
  }

  public function rptCertificados91(Request $request)
  {
    $mes['01']="ENERO";
    $mes['02']="FEBRERO";
    $mes['03']="MARZO";
    $mes['04']="ABRIL";
    $mes['05']="MAYO";
    $mes['06']="JUNIO";
    $mes['07']="JULIO";
    $mes['08']="AGOSTO";
    $mes['09']="SEPTIEMBRE";
    $mes['10']="OCTUBRE";
    $mes['11']="NOVIEMBRE";
    $mes['12']="DICIEMBRE";
    //$idTransaccion = $_POST['idTransaccion'];
    $idCert = $request->get('idCert');

    //$pdf = PDF::loadHTML('<h1> TEXTO ooo'.$idTransaccion.'</h1>');

    $sql = "SELECT A.id, concat(B.nombres,' ',B.paterno,' ',B.materno) as nombres, 
    A.codigoCIP,
    DATE_FORMAT(C.fechaIncorporacion,'%d/%m/%Y') as fechaIncorporacion, D.extra as especialidad,
    A.asunto,
    A.institucion,
    concat(G.valor,', ',F.valor,', ',E.valor) as lugar, DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%d') as vdia, 
            DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%m') as vmes,
            DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%Y') as vyear,
    'PUNO' as consejo, DATE_FORMAT(A.fecha,'%d') as fdia, DATE_FORMAT(A.fecha,'%m') as fmes, SUBSTR(A.fecha, 3, 2) as fyear,
    
    E.codigo, E.valor as distrito,
    F.codigo, F.valor as provincia,
    G.codigo, G.valor as departamento
    
    FROM cip_constancias A 
    left join cip_users B on B.codigoCIP = A.codigoCIP
    left join cip_users_especialidads C on C.idEspecialidad = A.idEspecialidad and C.codigoCIP = A.codigoCIP
    left join cip_param D on D.grupo = '053' and D.codigo = A.idEspecialidad
    left join cip_param E on E.grupo = '001' and E.codigo = A.ubigeo
    left join cip_param F on F.grupo = '002' and F.codigo = E.extra
    left join cip_param G on G.grupo = '003' and G.codigo = F.extra
            WHERE A.id = ".$idCert.";";

    $data = DB::select($sql);

    $fpdf = new Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Times', '', 10);
    $fpdf->SetY(8);
    $fpdf->SetX(36);
    $fpdf->Cell(0, 25, $data[0]->nombres,0,1);

    $fpdf->SetY(14);
    $fpdf->SetX(70);
    $fpdf->Cell(0, 25, 'PUNO');
    $fpdf->SetX(165);
    $fpdf->Cell(0, 25, $data[0]->codigoCIP);

    $fpdf->SetY(21);
    $fpdf->SetX(45);
    $fpdf->Cell(0, 25, $data[0]->fechaIncorporacion);
    $fpdf->SetX(125);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->especialidad)); 

    $fpdf->SetY(35);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->asunto));

    $fpdf->SetY(42);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->institucion));

    $fpdf->SetY(49);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->lugar));    
    $fpdf->SetX(173);
    $fpdf->Cell(0, 25, $data[0]->vdia);
    $fpdf->SetX(184);
    $fpdf->Cell(0, 25, $data[0]->vmes);
    $fpdf->SetX(195);
    $fpdf->Cell(0, 25, $data[0]->vyear);

    $fpdf->SetY(56);
    $fpdf->SetX(125);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->consejo));
    $fpdf->SetX(157);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fdia));
    $fpdf->SetX(170);
    $fpdf->Cell(0, 25, utf8_decode($mes[$data[0]->fmes]));
    $fpdf->SetX(201);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fyear));

    $fpdf->SetFont('Times', '', 12);
    $fpdf->SetY(115);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, $data[0]->nombres,0,1);

    $fpdf->SetY(123);
    $fpdf->SetX(100);
    $fpdf->Cell(0, 25, $data[0]->consejo,0,1);

    $fpdf->SetY(131);
    $fpdf->SetX(110);
    $fpdf->Cell(0, 25, $data[0]->codigoCIP,0,1);
    $fpdf->SetY(131);
    $fpdf->SetX(172);
    $fpdf->Cell(0, 25, $data[0]->fechaIncorporacion,0,1);

    $fpdf->SetY(139);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->especialidad));

    $fpdf->SetY(178);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->asunto));

    $fpdf->SetY(189);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->institucion));

    $fpdf->SetY(200);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->lugar)); 

    $fpdf->SetY(225);
    $fpdf->SetX(105);
    $fpdf->Cell(0, 25, $data[0]->vdia);
    $fpdf->SetX(121);
    $fpdf->Cell(0, 25, $data[0]->vmes);
    $fpdf->SetX(138);
    $fpdf->Cell(0, 25, $data[0]->vyear);

    $fpdf->SetY(240);
    $fpdf->SetX(88);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->consejo));
    $fpdf->SetX(124);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fdia));
    $fpdf->SetX(141);
    $fpdf->Cell(0, 25, utf8_decode($mes[$data[0]->fmes]));
    $fpdf->SetX(175);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fyear));
    //return $fpdf->Output();//$pdf->stream();
    $headers = ['Content-Type'=>'application/pdf'];
    return Response::make($fpdf->Output(),200,$headers);
    
  }

  public function rptCertificados92(Request $request)
  {
    $mes['01']="ENERO";
    $mes['02']="FEBRERO";
    $mes['03']="MARZO";
    $mes['04']="ABRIL";
    $mes['05']="MAYO";
    $mes['06']="JUNIO";
    $mes['07']="JULIO";
    $mes['08']="AGOSTO";
    $mes['09']="SEPTIEMBRE";
    $mes['10']="OCTUBRE";
    $mes['11']="NOVIEMBRE";
    $mes['12']="DICIEMBRE";
    //$idTransaccion = $_POST['idTransaccion'];
    $idCert = $request->get('idCert');

    //$pdf = PDF::loadHTML('<h1> TEXTO ooo'.$idTransaccion.'</h1>');

    $sql = "SELECT A.id, concat(B.nombres,' ',B.paterno,' ',B.materno) as nombres, 
    A.codigoCIP,
    DATE_FORMAT(C.fechaIncorporacion,'%d/%m/%Y') as fechaIncorporacion, D.extra as especialidad,
    A.asunto,
    A.institucion,
    concat(G.valor,', ',F.valor,', ',E.valor) as lugar, DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%d') as vdia, 
            DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%m') as vmes,
            DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%Y') as vyear,
    'PUNO' as consejo, DATE_FORMAT(A.fecha,'%d') as fdia, DATE_FORMAT(A.fecha,'%m') as fmes, SUBSTR(A.fecha, 3, 2) as fyear,
    
    E.codigo, E.valor as distrito,
    F.codigo, F.valor as provincia,
    G.codigo, G.valor as departamento, 

    A.zona,
    A.direccion
    
    FROM cip_constancias A 
    left join cip_users B on B.codigoCIP = A.codigoCIP
    left join cip_users_especialidads C on C.idEspecialidad = A.idEspecialidad and C.codigoCIP = A.codigoCIP
    left join cip_param D on D.grupo = '053' and D.codigo = A.idEspecialidad
    left join cip_param E on E.grupo = '001' and E.codigo = A.ubigeo
    left join cip_param F on F.grupo = '002' and F.codigo = E.extra
    left join cip_param G on G.grupo = '003' and G.codigo = F.extra
            WHERE A.id = ".$idCert.";";

    $data = DB::select($sql);

    $fpdf = new Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Times', '', 10);
    $fpdf->SetY(8);
    $fpdf->SetX(36);
    $fpdf->Cell(0, 25, $data[0]->nombres,0,1);

    $fpdf->SetY(14);
    $fpdf->SetX(70);
    $fpdf->Cell(0, 25, 'PUNO');
    $fpdf->SetX(165);
    $fpdf->Cell(0, 25, $data[0]->codigoCIP);

    $fpdf->SetY(21);
    $fpdf->SetX(45);
    $fpdf->Cell(0, 25, $data[0]->fechaIncorporacion);
    $fpdf->SetX(111);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->especialidad)); 

    
    $fpdf->SetY(37);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->asunto));

    $fpdf->SetY(45);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->institucion));

    /*$fpdf->SetY(49);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->lugar));    
    $fpdf->SetX(173);
    $fpdf->Cell(0, 25, $data[0]->vdia);
    $fpdf->SetX(184);
    $fpdf->Cell(0, 25, $data[0]->vmes);
    $fpdf->SetX(195);
    $fpdf->Cell(0, 25, $data[0]->vyear);*/

    $fpdf->SetY(54);
    $fpdf->SetX(125);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->consejo));
    $fpdf->SetX(157);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fdia));
    $fpdf->SetX(170);
    $fpdf->Cell(0, 25, utf8_decode($mes[$data[0]->fmes]));
    //$fpdf->SetX(201);
    //$fpdf->Cell(0, 25, utf8_decode($data[0]->fyear));

    $fpdf->SetFont('Times', '', 12);
    $fpdf->SetY(115);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, $data[0]->nombres,0,1);

    $fpdf->SetY(123);
    $fpdf->SetX(100);
    $fpdf->Cell(0, 25, $data[0]->consejo,0,1);

    $fpdf->SetY(131);
    $fpdf->SetX(110);
    $fpdf->Cell(0, 25, $data[0]->codigoCIP,0,1);
    $fpdf->SetY(131);
    $fpdf->SetX(172);
    $fpdf->Cell(0, 25, $data[0]->fechaIncorporacion,0,1);

    $fpdf->SetY(139);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->especialidad));

    $fpdf->SetY(170);
    $fpdf->SetX(74);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->institucion));

    $fpdf->SetY(186);
    $fpdf->SetX(71);
    $fpdf->MultiCell(120, 8, utf8_decode($data[0]->asunto));

    $fpdf->SetY(200);
    $fpdf->SetX(69);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->departamento));
    $fpdf->SetX(149);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->provincia));

    $fpdf->SetY(207);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->distrito));

    $fpdf->SetY(214);
    $fpdf->SetX(105);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->zona)); 

    $fpdf->SetY(221);
    $fpdf->SetX(90);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->direccion)); 

    /*$fpdf->SetY(225);
    $fpdf->SetX(105);
    $fpdf->Cell(0, 25, $data[0]->vdia);
    $fpdf->SetX(121);
    $fpdf->Cell(0, 25, $data[0]->vmes);
    $fpdf->SetX(138);
    $fpdf->Cell(0, 25, $data[0]->vyear);*/

    $fpdf->SetY(240);
    $fpdf->SetX(89);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->consejo));
    $fpdf->SetX(124);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fdia));
    $fpdf->SetX(141);
    $fpdf->Cell(0, 25, utf8_decode($mes[$data[0]->fmes]));
    $fpdf->SetX(175);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fyear));

    //return $fpdf->Output();//$pdf->stream();
    $headers = ['Content-Type'=>'application/pdf'];
    return Response::make($fpdf->Output(),200,$headers);
    
  }

  public function rptCertificados93(Request $request)
  {
    $mes['01']="ENERO";
    $mes['02']="FEBRERO";
    $mes['03']="MARZO";
    $mes['04']="ABRIL";
    $mes['05']="MAYO";
    $mes['06']="JUNIO";
    $mes['07']="JULIO";
    $mes['08']="AGOSTO";
    $mes['09']="SEPTIEMBRE";
    $mes['10']="OCTUBRE";
    $mes['11']="NOVIEMBRE";
    $mes['12']="DICIEMBRE";
    //$idTransaccion = $_POST['idTransaccion'];
    $idCert = $request->get('idCert');

    //$pdf = PDF::loadHTML('<h1> TEXTO ooo'.$idTransaccion.'</h1>');

    $sql = "SELECT A.id, concat(B.nombres,' ',B.paterno,' ',B.materno) as nombres, 
    A.codigoCIP,
    DATE_FORMAT(C.fechaIncorporacion,'%d/%m/%Y') as fechaIncorporacion, D.extra as especialidad,
    A.asunto,
    A.institucion,
    concat(G.valor,', ',F.valor,', ',E.valor) as lugar, DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%d') as vdia, 
            DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%m') as vmes,
            DATE_FORMAT(LAST_DAY(STR_TO_DATE(concat(A.habilHasta,'01'),'%Y%m%d')),'%Y') as vyear,
    'PUNO' as consejo, DATE_FORMAT(A.fecha,'%d') as fdia, DATE_FORMAT(A.fecha,'%m') as fmes, SUBSTR(A.fecha, 3, 2) as fyear,
    
    E.codigo, E.valor as distrito,
    F.codigo, F.valor as provincia,
    G.codigo, G.valor as departamento, 

    A.zona,
    A.direccion,
    if(A.modalidad = '01', 'Firma de Contrato de Obra Pública','Residencia') as modalidad,
    A.monto
    
    FROM cip_constancias A 
    left join cip_users B on B.codigoCIP = A.codigoCIP
    left join cip_users_especialidads C on C.idEspecialidad = A.idEspecialidad and C.codigoCIP = A.codigoCIP
    left join cip_param D on D.grupo = '053' and D.codigo = A.idEspecialidad
    left join cip_param E on E.grupo = '001' and E.codigo = A.ubigeo
    left join cip_param F on F.grupo = '002' and F.codigo = E.extra
    left join cip_param G on G.grupo = '003' and G.codigo = F.extra
            WHERE A.id = ".$idCert.";";

    $data = DB::select($sql);

    $fpdf = new Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Times', '', 10);
    $fpdf->SetY(8);
    $fpdf->SetX(36);
    $fpdf->Cell(0, 25, $data[0]->nombres,0,1);

    $fpdf->SetY(14);
    $fpdf->SetX(70);
    $fpdf->Cell(0, 25, 'PUNO');
    $fpdf->SetX(165);
    $fpdf->Cell(0, 25, $data[0]->codigoCIP);

    $fpdf->SetY(21);
    $fpdf->SetX(45);
    $fpdf->Cell(0, 25, $data[0]->fechaIncorporacion);
    $fpdf->SetX(111);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->especialidad)); 

    
    $fpdf->SetY(37);
    $fpdf->SetX(31);
    //$fpdf->Cell(0, 25, utf8_decode($data[0]->asunto));
    $fpdf->Cell(0, 25, utf8_decode($data[0]->modalidad));
    $fpdf->SetY(47);
    $fpdf->SetX(156);
    $fpdf->MultiCell(53, 4, utf8_decode($data[0]->asunto));

    $fpdf->SetY(45);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->institucion));
    $fpdf->SetX(170);
    $fpdf->Cell(0, 25, "S/ ".utf8_decode($data[0]->monto));

    /*$fpdf->SetY(49);
    $fpdf->SetX(31);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->lugar));    
    $fpdf->SetX(173);
    $fpdf->Cell(0, 25, $data[0]->vdia);
    $fpdf->SetX(184);
    $fpdf->Cell(0, 25, $data[0]->vmes);
    $fpdf->SetX(195);
    $fpdf->Cell(0, 25, $data[0]->vyear);*/

    $fpdf->SetY(54);
    $fpdf->SetX(125);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->consejo));
    $fpdf->SetX(157);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fdia));
    $fpdf->SetX(170);
    $fpdf->Cell(0, 25, utf8_decode($mes[$data[0]->fmes]));
    $fpdf->SetX(201);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fyear));

    $fpdf->SetFont('Times', '', 12);
    $fpdf->SetY(125);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, $data[0]->nombres,0,1);

    $fpdf->SetY(133);
    $fpdf->SetX(100);
    $fpdf->Cell(0, 25, $data[0]->consejo,0,1);

    $fpdf->SetY(141);
    $fpdf->SetX(110);
    $fpdf->Cell(0, 25, $data[0]->codigoCIP,0,1);
    $fpdf->SetY(141);
    $fpdf->SetX(172);
    $fpdf->Cell(0, 25, $data[0]->fechaIncorporacion,0,1);

    $fpdf->SetY(149);
    $fpdf->SetX(60);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->especialidad));

    /*$fpdf->SetY(170);
    $fpdf->SetX(74);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->institucion));*/
    $fpdf->SetY(179);
    $fpdf->SetX(71);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->modalidad));
    $fpdf->SetY(194);
    $fpdf->SetX(71);
    $fpdf->MultiCell(120, 6, utf8_decode($data[0]->asunto));

    $fpdf->SetY(198);
    $fpdf->SetX(76);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->institucion));

    $fpdf->SetY(205);
    $fpdf->SetX(85);
    $fpdf->Cell(0, 25, "S/ ".utf8_decode($data[0]->monto));

    
    $fpdf->SetY(219);
    $fpdf->SetX(79);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->departamento));
    $fpdf->SetX(149);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->provincia));

    $fpdf->SetY(226);
    $fpdf->SetX(72);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->distrito));

    $fpdf->SetY(214);
    $fpdf->SetX(105);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->zona)); 

    $fpdf->SetY(221);
    $fpdf->SetX(90);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->direccion)); 

    /*$fpdf->SetY(225);
    $fpdf->SetX(105);
    $fpdf->Cell(0, 25, $data[0]->vdia);
    $fpdf->SetX(121);
    $fpdf->Cell(0, 25, $data[0]->vmes);
    $fpdf->SetX(138);
    $fpdf->Cell(0, 25, $data[0]->vyear);*/

    $fpdf->SetY(242);
    $fpdf->SetX(89);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->consejo));
    $fpdf->SetX(124);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fdia));
    $fpdf->SetX(141);
    $fpdf->Cell(0, 25, utf8_decode($mes[$data[0]->fmes]));
    $fpdf->SetX(175);
    $fpdf->Cell(0, 25, utf8_decode($data[0]->fyear));

    //return $fpdf->Output();//$pdf->stream();
    $headers = ['Content-Type'=>'application/pdf'];
    return Response::make($fpdf->Output(),200,$headers);
    
  }
}