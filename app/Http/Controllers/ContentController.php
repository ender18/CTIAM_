<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Mail;
use App\Mail\Test;

class ContentController extends Controller
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
        $content = Content::get();
        return view('management.indexManagement', compact('content'));
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

    public function addChangesContent(Request $request)
    {
      if ($request->ajax()) {
        $msj = 'Ocurrió un error, intente de nuevo.';
        $name='';
        if($request->hasFile('file')){
          $file = $request->file('file');
          $name =time().$file->getClientOriginalName();
          $file->move(public_path().'/images/user/',$name);
        }
        $slider = null;
        if ($request->id === null) {
          $slider = new Content();
        }else {
          $slider = Content::find($request->id);
        }
        $slider->name = $request->name;
        $slider->content = $request->content;
        $slider->content1 = $request->content1;
        $slider->content2 = $request->content2;
        $slider->content3 = $request->content3;
        $slider->content4 = $request->content4;

        if ($name !== '') {
          $slider->file = '/images/user/'.$name;
        }

        $slider->Save();
        $contents = Content::get();
        $msj = 'Los cambios se guardaron correctamente.';

        // Mail::to('enderortega@outlook.com')
        //   ->send(new Test('Si funciona'));
        //
        return response()->json([
          'msj' => $msj,
          'contents' => $contents
          ], 200);
      }
    }

    public function eraseContent(Request $request){
      if ($request->ajax()) {
        $content = Content::find($request->id_erase);
        $content->delete();

        $contents = Content::get();
        $msj = 'Los cambios se guardaron correctamente.';

        return response()->json([
          'msj' => $msj,
          'contents' => $contents
          ], 200);
      }


    }

    public function manageInfoSite(){





    }

    public function getInfoFooter(Request $request){
      if ($request->ajax()) {
        // code...
        $description =  Content::where('name', 'description_site')->first();
        $phone =  Content::where('name', 'phone')->first();
        $email =  Content::where('name', 'email')->first();
        $twitter =  Content::where('name', 'twitter')->first();
        $facebook =  Content::where('name', 'facebook')->first();
        $instagram =   Content::where('name', 'instagram')->first();



        return response()->json([
          'description' => $description->content,
          'phone' => $phone->content,
          'email' => $email->content,
          'twitter' => $twitter->content,
          'facebook' => $facebook->content,
          'instagram' => $instagram->content,
          'url_twitter' => $twitter->content1,
          'url_facebook' => $facebook->content1,
          'url_instagram' => $instagram->content1

        ],200);
      }
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
