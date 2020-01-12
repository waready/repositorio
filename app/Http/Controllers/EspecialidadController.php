<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cip_users_especialidad;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cip_user = cip_users_especialidad::paginate(10000);
        return $cip_user;
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
        // $especialidad -> password = $request->password;
        
        // $especialidad -> usertype = $request->usertype;
        // $especialidad -> block = $request->block;
        // $especialidad -> registerDate = $request->registerDate;
        // $especialidad -> lastvisitDate = $request->lastvisitDate;
        // $especialidad -> activation = $request->activation;
        // $especialidad -> params = $request->params;
        // $especialidad -> codigoCIP = $request->codigoCIP;
        // $especialidad -> usuarioCreador = $request->usuarioCreador;

        // $especialidad -> fechaNacimiento = $request->fechaNacimiento;
        // $especialidad -> fechaModificacion = $request->fechaModificacion;

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
