<?php

namespace App\Exports;

use App\cip_users;
use FontLib\Table\Type\name;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{
    public function view(Request $request): View
    {
        $name = $request->id_1;
        return view('invoices', [
            'invoices' => cip_users::where('name', 'like' , '%'. $name.'%')
        ]);
    }
}