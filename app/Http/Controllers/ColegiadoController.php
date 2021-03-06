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
use App\cip_users_presentes;
use App\cip_fraccionamientofile;

use Codedge\Fpdf\Fpdf\Fpdf;
use Response;
class ColegiadoController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

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

public function hola2($cip) {

    echo "hola:".$cip;
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
            $sql = "SELECT CONCAT(A.paterno,' ',A.materno,', ',A.nombres) as nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
            if(DATE_FORMAT(NOW(), '%Y-%m-%d') <= LAST_DAY(STR_TO_DATE(concat(C.habilHasta,'01'),'%Y%m%d')), 'HABIL', 'NO HABIL') estadoHabil,
              D.valor as descTipoColegiado,
            DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
            FROM cip_users A 
            left join cip_users_especialidad B on B.codigoCIP = A.codigoCIP
            LEFT JOIN cip_pagos C on C.codigoCIP = A.codigoCIP
            left join cip_param D on D.grupo = '008' and D.codigo = A.tipoColegiado
            WHERE A.codigoCIP = '".$textoBusqueda."' order by C.fechaPago DESC limit 1";
            /*
            WHERE A.codigoCIP like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1";*/
          }
          else if ($tipoBusqueda == 2 and $textoBusqueda != "") 
          {
            $sql = "SELECT CONCAT(A.paterno,' ',A.materno,', ',A.nombres) as nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
            if(DATE_FORMAT(NOW(), '%Y-%m-%d') <= LAST_DAY(STR_TO_DATE(concat(C.habilHasta,'01'),'%Y%m%d')), 'HABIL', 'NO HABIL') estadoHabil,
              D.valor as descTipoColegiado,
            DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta  
            FROM cip_users A 
            left join cip_users_especialidad B on B.codigoCIP = A.codigoCIP
            LEFT JOIN cip_pagos C on C.codigoCIP = A.codigoCIP
            left join cip_param D on D.grupo = '008' and D.codigo = A.tipoColegiado
            WHERE A.dni = '".$textoBusqueda."' order by C.fechaPago DESC limit 1"; 
          }

          else if ($tipoBusqueda == 3 and $textoBusqueda != "") 
          {
            $sql = "SELECT CONCAT(A.paterno,' ',A.materno,', ',A.nombres) as nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
            if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
              D.valor as descTipoColegiado,
            DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
            FROM cip_users A 
            left join cip_users_especialidad B on B.codigoCIP = A.codigoCIP
            LEFT JOIN cip_pagos C on C.codigoCIP = A.codigoCIP
            left join cip_param D on D.grupo = '008' and D.codigo = A.tipoColegiado
            WHERE A.name like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1"; 
          }



      $users = DB::select($sql);
      //$integrantes = DB::connection('mysql')->select($sql);
        if($users)
        {
          
          $sql = "SELECT A.codigoCIP, A.id, B.periodoPago, DATE_FORMAT(DATE_ADD(CONCAT(B.periodoPago,'01'), INTERVAL 3 MONTH), '%Y%m') as fHabil FROM cip_pagos A inner join cip_pagodetalle B on B.idPago = A.id and idConceptoPago = '01' WHERE A.codigoCIP =".$users[0]->codigoCIP." ORDER BY B.id DESC limit 1";

          $sql = "SELECT A.codigoCIP, A.id, A.ultimoPago as periodoPago, A.habilHasta as fHabil  from cip_users A WHERE A.codigoCIP = '".$users[0]->codigoCIP."' ";

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

          $sql = "SELECT A.codigoCIP ,A.idEspecialidad, A.fechaIncorporacion, 
          TIMESTAMPDIFF(YEAR, A.fechaIncorporacion, NOW()) as antiguedad,
          B.valor FROM cip_users_especialidad A
          left join cip_param B on B.grupo = '053' and B.codigo = A.idEspecialidad 
          where A.codigoCIP = '".$users[0]->codigoCIP."' order by A.id asc";

          $especialidad = DB::select($sql);
          

          $sql = "SELECT A.serieRecibo, A.nroRecibo, A.codigoCIP, concat(A.serieRecibo,'-',A.nroRecibo) as recibo, A.fechaPago, A.total, B.name, A.estado 
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

          $sql = "SELECT A.id, concat(A.nroDocumento,'-', SUBSTR(A.fecha, 1,4)) as nroDocumento, 
                  A.fechaCreacion, A.totalDeuda, A.nroCuotas, B.name,
                  C.nombreArchivo,
                  if(A.estado = 1, 'Activo', 'Pagado') as estado
                  FROM cip_fraccionamiento A 
                  left join cip_users B on B.username = A.usuarioCreador
                  left join cip_fraccionamientofile C on C.idFraccionamiento = A.id
                  where A.codigoCIP = '".$users[0]->codigoCIP."';";

          $reportFracc = DB::select($sql);

          $sql = "SELECT D.id as iu, B.codigo,B.valor, C.fechaEntrega, 
                  concat(E.nombres,' ',E.paterno,' ', E.materno) as nombreEntrega, 
                  C.anho 
                  from cip_param B 
                  left join cip_users D on D.codigoCIP = '".$users[0]->codigoCIP."' 
                  left join cip_users_presentes C on C.idUser = D.id and C.idPresente = B.codigo and C.anho = DATE_FORMAT(NOW(), '%Y') 
                  left join cip_users E on E.username = C.usuarioEntrega
                  where B.grupo = '040';";

          $reportPresentes = DB::select($sql);
          

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
                      "reportPresentes" => $reportPresentes,            
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

  public function rptPresentes(Request $request)
  {
    $codigoCIP = $_POST['codigoCIP'];
    $anio = $_POST['anio'];

    $sql = "SELECT D.id as iu, B.codigo,B.valor, C.fechaEntrega, 
                  concat(E.nombres,' ',E.paterno,' ', E.materno) as nombreEntrega, 
                  C.anho 
                  from cip_param B 
                  left join cip_users D on D.codigoCIP = '".$codigoCIP."' 
                  left join cip_users_presentes C on C.idUser = D.id and C.idPresente = B.codigo and C.anho = '".$anio."' 
                  left join cip_users E on E.username = C.usuarioEntrega
                  where B.grupo = '040';";

    $reportPresentes = DB::select($sql);

    $resultadoView = array(
                      "success" => true,
                      "rPresentes" => $reportPresentes,
                      "mensaje" => "Datos encontrados",
                    ); 
      
    
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

          $sql = "SELECT * FROM cip_fraccionamientodetalle where idFraccionamiento = ".$idFraccionamiento_." and idPago = 0;";

          $fraccHabil = DB::select($sql);

          if(!$fraccHabil)
          {
            $sqlUpdate = 'UPDATE cip_fraccionamiento SET estado =2  WHERE id ='.$idFraccionamiento_.'';

          DB::update($sqlUpdate);            
          }

          $sql = "SELECT DATE_FORMAT(DATE_ADD(fechaPago, INTERVAL 1 MONTH), '%Y%m') as fHabil, fechaPago from cip_fraccionamientodetalle WHERE idFraccionamiento =".$idFraccionamiento_." and nroCuota =". $nroCuota_ ."";

          $fHabilidad = DB::select($sql);

          $sqlUpdate = 'UPDATE cip_pagos SET habilHasta ='.$fHabilidad[0]->fHabil.'  WHERE id ='.$idTransaccion.' ';

          DB::update($sqlUpdate);

          $sqlUpdate = 'UPDATE cip_users SET habilHasta =\''.$fHabilidad[0]->fHabil.'\',  ultimoPago = \''.substr($fHabilidad[0]->fechaPago, 0,4).substr($fHabilidad[0]->fechaPago, 5,2).'\' WHERE codigoCIP =\''.$codigoCIP.'\' ';

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
            if(DATE_FORMAT(NOW(), '%Y-%m-%d') <= LAST_DAY(STR_TO_DATE(concat(C.habilHasta,'01'),'%Y%m%d')), 'HABIL', 'NO HABIL') estadoHabil,
            DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
            FROM cip_users A 
            left join cip_users_especialidad B on B.codigoCIP = A.codigoCIP
            LEFT JOIN cip_pagos C on C.codigoCIP = A.codigoCIP
            WHERE A.codigoCIP like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1";
          }
          else if ($tipoBusqueda == 2 and $textoBusqueda != "") 
          {
            $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
            if(DATE_FORMAT(NOW(), '%Y-%m-%d') <= LAST_DAY(STR_TO_DATE(concat(C.habilHasta,'01'),'%Y%m%d')), 'HABIL', 'NO HABIL') estadoHabil,
            DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta  
            FROM cip_users A 
            left join cip_users_especialidad B on B.codigoCIP = A.codigoCIP
            LEFT JOIN cip_pagos C on C.codigoCIP = A.codigoCIP
            WHERE A.dni like '%".$textoBusqueda."%' order by C.fechaPago DESC limit 1"; 
          }

          else if ($tipoBusqueda == 3 and $textoBusqueda != "") 
          {
            $sql = "SELECT A.nombres, A.dni, A.codigoCIP, B.idEspecialidad, A.estadoUsuario,  
            if(Now() < STR_TO_DATE(C.habilHasta,'%Y %m'), 'HABIL', 'NO HABIL') estadoHabil,
            DATE_FORMAT(NOW(), '%Y-%m-%d') as fechaActual, C.fechaPago, C.habilHasta 
            FROM cip_users A 
            left join cip_users_especialidad B on B.codigoCIP = A.codigoCIP
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
      
      $path = 'FileFracc';
      $usuarioRegistro = 'guerrerocippuno';

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

        $sqlUpdate = 'UPDATE cip_fraccionamientosettings SET nroRecibo ='.$nroDocumento.'  WHERE usuario ="'.$usuarioRegistro.'" and lVigente = 1';

        DB::update($sqlUpdate);

        $file = $request->file('file');

        

        if($file)
        {
          
          $extension = $file->getClientOriginalExtension();
          $nombre = $idTransaccion;
          //$nombre = $file->getClientOriginalName();
          $renombre = $nombre.'.'.$file->getClientOriginalExtension();
          
          $archivo = new cip_fraccionamientofile();
          $archivo->idFraccionamiento = $idTransaccion;
          $archivo->nombreArchivo = $renombre;
          $archivo->extension = '';
          $archivo->lVigente = 1;

          if($archivo->save())
          {
            $upload = $file->move($path,$renombre);  
          }
          
        }

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
      /*
      */
      
      $resultadoView = array(
                      "success" => true,
                      "mensaje" => "Datos Guardados Correctamente",
                      //"mensaje" => $extension,
                      //"tam" => $nombre
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
      left join cip_users_especialidad B on B.codigoCIP = A.codigoCIP
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
  }

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
left join cip_users_especialidad C on C.idEspecialidad = A.idEspecialidad and C.codigoCIP = A.codigoCIP
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
    left join cip_users_especialidad C on C.idEspecialidad = A.idEspecialidad and C.codigoCIP = A.codigoCIP
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
    left join cip_users_especialidad C on C.idEspecialidad = A.idEspecialidad and C.codigoCIP = A.codigoCIP
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
    left join cip_users_especialidad C on C.idEspecialidad = A.idEspecialidad and C.codigoCIP = A.codigoCIP
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

  public function reporteDM()
  {

    $sql = "SELECT DATE_FORMAT(NOW(), '%Y-%m-%d') AS fecha";

    $fechaActual = DB::select($sql);

    return view('rptDiarioMensual')->with('fechaActual',$fechaActual);
  }

  public function rptDiarioMensual(Request $request)
  {
    $mes['01']="Ene";
    $mes['02']="Feb";
    $mes['03']="Mar";
    $mes['04']="Abr";
    $mes['05']="May";
    $mes['06']="Jun";
    $mes['07']="Jul";
    $mes['08']="Ago";
    $mes['09']="Sep";
    $mes['10']="Oct";
    $mes['11']="Nov";
    $mes['12']="Dic";

      $fechaDesde = $_POST['fechaDesde'];
      $fechaHasta = $_POST['fechaHasta'];

      $usuarioConsulta = 'guerrerocippuno';

      $sql = "SELECT A.id, DATE_FORMAT(A.fechaCreacion,'%Y-%m-%d') fechaCreacion,
                  concat('B/V ', A.serieRecibo,'-',A.nroRecibo) as comprobante,
                  A.codigoCIP,
                  concat(B.paterno,' ',B.materno,', ',B.nombres) as nombre,
                  C.idConceptoPago,
                  if(D.conceptoPago is null, C.otroConcepto, D.conceptoPago ) as conceptoPago,
                  SUBSTR(C.periodoPago,1,4) as anio,
                  SUBSTR(C.periodoPago,5,2) as periodo,
                  C.montoPago,
                  A.total 
              from cip_pagos A
              left join cip_users B on B.codigoCIP = A.codigoCIP
              left join cip_pagodetalle C on C.idPago = A.id
              left join cip_pagosconfig D on D.idConceptoPago = C.idConceptoPago and D.lVigente = 1
              where 
              A.estado = 1
              and A.usuarioCreador = '".$usuarioConsulta."'
              and A.fechaPago between '".$fechaDesde."' and '".$fechaHasta."' order by A.id, C.id;";

      $data = DB::select($sql);


      if($data)
      {
        $idIni = $data[0]->id;
        $c = 0;
        $arMPago[0] = 0;
        $arConcepto[0] = "";
        $flag = true;
        $periodoIni = "";
        $periodoFin = "";
        $periodoIniY = "";
        $periodoFinY = "";

        $ar = array("AA", "BB");
        for($i = 0 ; $i < sizeof($data); $i++)
        {
          
          if($idIni == $data[$i]->id)
          {
            $c; 
          }
          else
          {
            $c++;
            $idIni = $data[$i]->id;
            $arMPago[$c] = 0;
            
            $flag = true;
            
            for($j=2;$j<sizeof($ar); $j++)
            {
              
              $arConcepto[$c-1] .= $ar[$j].";";
              
            }

            //echo "I>".$periodoIni."<br>";
            //echo "F>".$periodoFin."<br>";
            $pmesI = "";
            $pmesF = "";
            if ($periodoIni != "") {
              $pmesI = $periodoIniY." ".$mes[$periodoIni];
            }
            if ($periodoFin != "") {
              $pmesF = $periodoFinY." ".$mes[$periodoFin];
            }

            $arConcepto[$c-1] = str_replace ('Aportacion', 'Aportacion ('.$pmesI.'-'.$pmesF.')',$arConcepto[$c-1]);

            $ar = array("AA", "BB");

            $arConcepto[$c]="";
            $periodoFin = "";
          }

          if(!in_array($data[$i]->conceptoPago, $ar))
          {
            array_push($ar, $data[$i]->conceptoPago);
          }

          if($i == sizeof($data)-1)
          {
            for($j=2;$j<sizeof($ar); $j++)
            {
              $arConcepto[$c] .=$ar[$j].";";
            }
          }


          if($i == sizeof($data)-1)
          {
            $arConcepto[$c] = str_replace ('Aportacion', 'Aportacion ('.$periodoIniY." ".$periodoIni.'-'.$periodoFinY." ".$periodoFin.')',$arConcepto[$c]);
          }

          $arId[$c] = $data[$i]->id;
          $arFecha[$c] = $data[$i]->fechaCreacion;
          $arComprobante[$c] = $data[$i]->comprobante;
          $arCodigoCIP[$c] = $data[$i]->codigoCIP;
          $arNombre[$c] = $data[$i]->nombre;
          $arTotal[$c] = $data[$i]->total;

          $arMPago[$c] += $data[$i]->montoPago;


          if($data[$i]->idConceptoPago == '01' )
          {
            if($flag == true)
            {
              $flag = false;
              $periodoIni = $data[$i]->periodo;
              $periodoIniY = $data[$i]->anio;
            }
            $periodoFin = $data[$i]->periodo;
            $periodoFinY = $data[$i]->anio;  
          }

        }

        $resultadoView = array(
              "success" => true,
              "arId" => $arId,
              "arFecha" => $arFecha,
              "arComprobante" => $arComprobante,
              "arCodigoCIP" => $arCodigoCIP,
              "arNombre" => $arNombre,
              "arConcepto" => $arConcepto,
              "arTotal" => $arTotal,
            );  
      }
      else
      {
        $resultadoView = array(
                      "success" => false,
                      "mensaje" => "No se encontraron datos para su consulta.",
                    ); 
      }

      /*      
      for($i = 0 ; $i < sizeof($arMPago); $i++)
      {
        echo $arId[$i]." - ".$arMPago[$i]." - ".$arConcepto[$i]."<br>";
      }
      */

      return json_encode($resultadoView);
  }


  public function rptRecibo(Request $request)
  {
      $serie = $_POST['serie'];
      $recibo = $_POST['recibo'];
      $codigoCIP = $_POST['cip'];

$sql = "SELECT A.fechaPago, B.idPago, B.idConceptoPago,
 if(C.conceptoPago is null, B.otroConcepto, C.conceptoPago) as conceptoPagos, 
B.periodoPago, B.montoPago FROM cip_pagos A 
left join cip_pagodetalle B on B.idPago = A.id
left join cip_pagosconfig C on C.idConceptoPago = B.idConceptoPago and C.lVigente = 1
where A.serieRecibo = '".$serie."' 
      and A.nroRecibo = '".$recibo."' 
      and A.codigoCIP = '".$codigoCIP."';";

      if($data = DB::select($sql))
      {
        $resultadoView = array(
              "success" => true,
              "arRecibo" => $data,
            );  
      }
      else
      {
        $resultadoView = array(
                      "success" => false,
                      "mensaje" => "No se encontraron datos para su consulta.",
                    ); 
      }

      return json_encode($resultadoView);
  }

  public function detalleFracc(Request $request)
  {
      $id = $_POST['id'];
      
$sql = "SELECT A.id, A.codigoCIP, A.totalDeuda, 
    B.nroCuota, (E.id - D.id + 1) as meses,
    B.fechaPago, B.montoPago,
    concat(C.serieRecibo,'-', C.nroRecibo) as recibo,
    D.periodoPago as minimo,
    E.periodoPago as maximo
FROM cip_fraccionamiento A 
left join cip_fraccionamientodetalle B on B.idFraccionamiento = A.id
left join cip_pagos C on C.id=B.idPAgo
left join cip_fraccionamientomeses D on D.id = (SELECT id FROM cip_fraccionamientomeses where idFraccionamiento = A.id and nroCuota = B.nroCuota order by id asc limit 1)
left join cip_fraccionamientomeses E on E.id = (SELECT id FROM cip_fraccionamientomeses where idFraccionamiento = A.id and nroCuota = B.nroCuota order by id desc limit 1)
where A.id = ".$id.";";

      if($data = DB::select($sql))
      {
        $resultadoView = array(
              "success" => true,
              "arFracc" => $data,
            );  
      }
      else
      {
        $resultadoView = array(
                      "success" => false,
                      "mensaje" => "No se encontraron datos para su consulta.",
                    ); 
      }

      return json_encode($resultadoView);
  }

  public function rptFraccionamiento()
  {
    $sql = "SELECT A.id, A.codigoCIP, concat(C.paterno,' ',C.materno,', ',C.nombres) as nombre,
    H.valor as especialidad, C.email, C.direccion, 
    concat(G.valor,',',F.valor,',',E.valor) as ubigeoDom,
    coalesce(C.telefono, C.celular, C.celular1) as telefono,
    A.estado, A.totalDeuda, A.nroCuotas, B.nroCuota, B.fechaPago, B.montoPago
from cip_fraccionamiento A
inner join cip_fraccionamientodetalle B on B.id =(SELECT id
      FROM cip_fraccionamientodetalle 
      where idFraccionamiento = A.id 
        and idPago = 0 
        order by id asc limit 1
      )
inner join cip_users C on C.codigoCIP = A.codigoCIP 
inner join cip_users_especialidad D on D.id = (SELECT id FROM cip_users_especialidad where codigoCIP = A.codigoCIP order by id asc limit 1)
inner join cip_param H on H.grupo = '053' and H.codigo = D.idEspecialidad
left join cip_param E on E.grupo = '001' and E.codigo = C.ubigeoDomicilio
left join cip_param F on F.grupo = '002' and F.codigo = E.extra
left join cip_param G on G.grupo = '003' and G.codigo = F.extra
where A.estado = 1 order by B.fechaPago desc;";

    $data = DB::select($sql);

    return view('rptFraccionamiento')->with('data',$data);
  }

  public function rptCertif()
  {

    $sql = "SELECT DATE_FORMAT(NOW(), '%Y-%m-%d') AS fecha";

    $fechaActual = DB::select($sql);

    return view('rptCertificados')->with('fechaActual',$fechaActual);
  }

  

  public function rptCertificados(Request $request)
  {
      $fechaDesde = $_POST['fechaDesde'];
      $fechaHasta = $_POST['fechaHasta'];

$sql = "SELECT A.id, 
            B.fecha, 
            B.id as identificador,
            concat('A-',LPAD(B.nroConstancia, 7,'0')) as nroCertificado,
            concat('B/V ',B.serieRecibo,' - ',B.nroRecibo) as nroComprobante,
            B.codigoCIP,
            concat(C.nombres,' ',C.paterno,' ',C.materno) as nombres,
            D.valor as especialidad,
            E.conceptoPago,
            E.montoPago
        FROM cip_pagos A 
        inner join cip_constancias B on B.idPago = A.id
        left join cip_users C on C.codigoCIP = B.codigoCIP 
        left join cip_param D on D.grupo = '053' and D.codigo = B.idEspecialidad
        left join cip_pagosconfig E on E.idConceptoPago = B.tipo and E.lVigente = 1
        where fechaPago between '2016-01-21' and '2016-01-21'
            and A.usuarioCreador = 'roucem80' 
            order by A.id, B.id asc ;";

      if($data = DB::select($sql))
      {
        $resultadoView = array(
              "success" => true,
              "arCertData" => $data,
            );  
      }
      else
      {
        $resultadoView = array(
                      "success" => false,
                      "mensaje" => "No se encontraron datos para su consulta.",
                    ); 
      }

      return json_encode($resultadoView);
  }

  public function rptOpeColegiado()
  {
    return view('rptOpeColegiado');
  }

  public function operacionesColegiado(Request $request)
  {
      $codigoCIP = $_POST['codigoCIP'];
      

$sql = "SELECT A.id, DATE_FORMAT(A.fechaCreacion,'%Y-%m-%d') fechaCreacion,
                  concat('B/V ', A.serieRecibo,'-',A.nroRecibo) as comprobante,
                  A.codigoCIP,
                  concat(B.paterno,' ',B.materno,', ',B.nombres) as nombre,
                  C.idConceptoPago,
                  if(D.conceptoPago is null, C.otroConcepto, D.conceptoPago ) as conceptoPago,
                  SUBSTR(C.periodoPago,1,4) as anio,
                  SUBSTR(C.periodoPago,5,2) as periodo,
                  C.montoPago,
                  A.total 
              from cip_pagos A
              left join cip_users B on B.codigoCIP = A.codigoCIP
              left join cip_pagodetalle C on C.idPago = A.id
              left join cip_pagosconfig D on D.idConceptoPago = C.idConceptoPago and D.lVigente = 1
              where 
              A.estado = 1
              and A.codigoCIP = '".$codigoCIP."'
              order by A.id desc, C.id desc;";

      if($data = DB::select($sql))
      {
        $resultadoView = array(
              "success" => true,
              "arOpeData" => $data,
            );  
      }
      else
      {
        $resultadoView = array(
                      "success" => false,
                      "mensaje" => "No se encontraron datos para su consulta.",
                    ); 
      }

      return json_encode($resultadoView);
  }


  public function otorgarPresente(Request $request)
  {
    $idUsuario = $_POST['cu'];
    $codigoPresente = $_POST['codPresente'];
    $fechaPresente = $_POST['fechaPresente'];

    $usuarioRegistro = 'guerrerocippuno';

      $cipPresentes = new cip_users_presentes();
      $cipPresentes->idUser = $idUsuario;
      $cipPresentes->idPresente = $codigoPresente;
      $cipPresentes->fechaEntrega = date("Y/m/d H:i:s");
      $cipPresentes->usuarioEntrega = $usuarioRegistro;
      $cipPresentes->anho = $fechaPresente;


      if($cipPresentes->save())
      {
        $resultadoView = array(
              "success" => true,
              "mensaje" => "La entrega de presente se registro satisfactoriamente",
            );  
      }
      else
      {
        $resultadoView = array(
                      "success" => false,
                      "mensaje" => "No se encontraron datos para su consulta.",
                    ); 
      }
    return json_encode($resultadoView); 

  }
}