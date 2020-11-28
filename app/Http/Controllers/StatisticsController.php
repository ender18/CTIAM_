<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      
        if (auth()->user() == null) abort(401, 'This action is inautorized');
        if (!auth()->user()->authorizedRoles('admin')) abort(401, 'This action is inautorized');
        $rol_beneficiaria = DB::table('roles')->where('name', 'beneficiaria')->first();
        $beneficiarias = User::select('users.commune', DB::raw('count(commune) as total'))
                 ->join('role_user', 'users.id', '=', 'role_user.user_id')
                 ->where('role_user.role_id', '=', $rol_beneficiaria->id)
                 ->groupBy('users.commune')
                 ->get();

         $rol_aliado = DB::table('roles')->where('name', 'aliado')->first();

         $aliados = User::select('users.commune', DB::raw('count(commune) as total'))
                  ->join('role_user', 'users.id', '=', 'role_user.user_id')
                  ->where('role_user.role_id', '=', $rol_aliado->id)
                  ->groupBy('users.commune')
                  ->get();

        return view('management.statisticsInfo', compact('beneficiarias', 'aliados'));
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
        //
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
