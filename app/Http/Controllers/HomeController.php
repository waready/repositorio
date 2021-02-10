<?php

namespace App\Http\Controllers;

use App\cip_users;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelExcel;

use App\Exports\InvoicesExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\getUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function excel(Request $request){
      //return $request;
      // return Excel::download(new InvoicesExport, 'report.xlsx');
        return Excel::download(new InvoicesExport($request), 'invoices.xlsx');
    }

}
