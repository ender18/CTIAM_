<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Focus;

class FocusController extends Controller
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
        $focos = Focus::get();
        return view('management.focusManagement', compact('focos'));
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
      if ($request->ajax()) {
        $msj = 'Ocurrió un error, intente de nuevo.';
        $name='';
        if($request->hasFile('file')){
          $file = $request->file('file');
          $name =time().$file->getClientOriginalName();
          $file->move(public_path().'/images/user/',$name);
        }

        $foco = null;
        if ($request->id === null) {
          $foco = new Focus();
        }else {
          $foco = Focus::find($request->id);
        }

        $foco->name = $request->name;
        $foco->description = $request->description;

        if ($name !== '') {
          $foco->url_image = '/images/user/'.$name;
        }

        $foco->Save();
        $focos = Focus::get();
        $msj = 'El foco '.$foco->name.' se ha creado correctamente.';

        return response()->json([
          'msj' => $msj,
          'focos' => $focos
          ], 200);

      }
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
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
          $foco = Focus::find($id);
          $msj = 'El foco '.$foco->name.' se ha eliminado satisfactoriamente.';
          $foco->delete();
          $focos = Focus::get();
          return response()->json([
            'focos' => $focos,
            'msj' => $msj
          ],200);
        }


    }
}
