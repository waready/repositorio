<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use App\cip_users;
use Illuminate\Support\Facades\DB;
//use App\Invoice;
use Illuminate\Contracts\View\View;
//use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     $busqueda='walter';
    //     $tipocolegiado='';
    //     $condicion = '';
    //     $cip_user = DB::table('cip_users')->where('name', 'like' , '%'. $busqueda.'%' )
    //     ->where( 'tipoColegiado', 'like' , '%'. $tipocolegiado.'%')
    //     ->where( 'estadoUsuario', 'like' , '%'. $condicion.'%')->get();
    //     return  $cip_user;
       
    // }
    public function view(): View{

        return view('reporte',[
            'report' => cip_users::all()
        ]);
    }
}
