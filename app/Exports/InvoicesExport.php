<?php

namespace App\Exports;

use App\cip_users;
use FontLib\Table\Type\name;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{
    private $request;
    public function __construct(Request $request) {
        $this->request =$request;
    }

    public function view(): View
    {
      
    $query =  DB::table('cip_users as A')
    ->select(
      'A.id',
  
      'A.paterno',
      'A.materno', 
      'A.nombres',
      'A.direccion',
      'A.celular',
      'A.genero',
      'A.email',
     
      'A.name',
      'A.fechaNacimiento',
      'A.ultimoPago',
      'A.codigoCIP',
      'A.habilHasta',
      'A.tipoColegiado',
      'A.estadoUsuario',
      'A.dni',
      'D.valor AS habiliad',
      'F.valor AS tipo',
      'T.valor AS sede',
      DB::raw("GROUP_CONCAT(G.especialidad)  AS especialidades")
    )

    ->leftJoin('cip_param as D', function ($q) {
      $q->on('D.codigo', 'A.estadoUsuario')->where('D.grupo', '007');
    })
    ->leftJoin('cip_param as F', function ($q) {
      $q->on('F.codigo', 'A.tipoColegiado')->where('F.grupo', '008');
    })
    ->leftJoin('cip_param as T', function ($q) {
      $q->on('T.codigo', 'A.ubigeoSede')->where('T.grupo', '001');
    })

    ->leftjoin(DB::raw("
    (SELECT 
      B1.idEspecialidad,
      C1.valor AS especialidad,
      B1.codigoCIP
    FROM cip_users_especialidad AS B1
    LEFT JOIN cip_param AS C1 ON C1.codigo = B1.idEspecialidad
    WHERE C1.grupo = 052) AS G"), 'G.codigoCIP', 'A.codigoCIP')
  ->groupBy(
    'A.id',
  
    'A.paterno',
    'A.materno', 
    'A.nombres',
    'A.direccion',
    'A.celular',
    'A.genero',
    'A.email',
   
    'A.name',
    'A.fechaNacimiento',
    'A.ultimoPago',
    'A.codigoCIP',

    'A.tipoColegiado',
    'A.estadoUsuario',
    'A.dni',
    'D.valor',
    'F.valor',
    'T.valor'
  ) ;

if($this->request->input('codigoCip')) {
  $query->where('A.codigoCIP',$this->request->input('codigoCip'));
  //$query->offset(0)->limit(200);
 }

if($this->request->input('min') ||$this->request->input('max') ) {
  $minimo=$this->request->input('min');
  $maximo=$this->request->input('max');
  $query->offset($minimo)->limit($maximo);
}

  $cip_users = $query
    // ->where([['C.grupo', '053'], ['D.grupo', '007'], ['F.grupo', '008']])
    ->get();
          
        return view('invoices', [
            'invoices' =>  $cip_users,
            'paterno'=> $this->request->input('1'),
            'materno'=> $this->request->input('2'),
            'nombres'=> $this->request->input('3'),
            'direccion'=> $this->request->input('4'),
            'celular'=> $this->request->input('5'),
            'genero'=> $this->request->input('6'),
            'especialidad'=> $this->request->input('7'),
            'correo'=> $this->request->input('8'),
            'domicilio'=> $this->request->input('9'),
            'sede'=> $this->request->input('10'),
            'nacimiento'=> $this->request->input('11'),
            'ultimo'=> $this->request->input('12'),
            'incorporacion'=> $this->request->input('13'),
            'codigo'=> $this->request->input('14'),
            'tipo'=> $this->request->input('15'),
            'estado'=> $this->request->input('16'),
            'lugarNaci'=> $this->request->input('17'),
            'dni'=> $this->request->input('18'),
            'habil'=> $this->request->input('19'),     
        ]);
    }
    
}