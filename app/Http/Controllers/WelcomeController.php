<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Focus;
use App\User;
use App\Course;
use DB;

class WelcomeController extends Controller
{
    public function index(){
      $sliders = Content::where('name', 'primary_slider')->get();
      $quienes_somos = Content::where('name', 'quienes_somos')->get();
      $que_hacemos = Content::where('name', 'que_hacemos')->get();
      $proyectos_realizados = Content::where('name', 'proyectos_realizados')->orderBy('id', 'desc')->get();
      return view('welcome', compact('sliders','quienes_somos', 'que_hacemos', 'proyectos_realizados'));
    }

    public function aboutus(Request $request){
      // $request->user()->authorizedRoles('admin');
      $mision = Content::where('name', 'mision')->get();
      $vision = Content::where('name', 'vision')->get();
      $obj_general = Content::where('name', 'obj_general')->get();
      $obj_especifico = Content::where('name', 'obj_especifico')->get();
      $marco_normativo = Content::where('name', 'marco_normativo')->get();
      $img_obj_especifico = Content::where('name', 'img_obj_especifico')->get();
      return view('general.conocenos', compact('mision', 'vision', 'obj_general', 'obj_especifico', 'marco_normativo','img_obj_especifico'));
    }

    public function members(){
      // $aliados = DB::table('groups')->select('users.id', 'users.name', 'users.last_name')->join('users', 'users.id', '=', 'groups.id_teacher')->distinct()->get();
      //
      // $cantidad_cursos = DB::table('groups')->select('id_teacher', DB::raw('count(id_teacher) as total'))->groupBy('id_teacher')->orderBy('total', 'DESC')->get();


      $members = Content::where('name', 'members')->get();
      return view('general.miembros', compact('members'));
    }

    public function founders(){
      $founders = Content::where('name', 'founder')->get();
      $video_haz_parte = Content::where('name', 'video_haz_parte')->first();
      return view('general.founders', compact('founders', 'video_haz_parte'));
    }

    public function focus(){
      $focus = Focus::get();
      return view('general.focus', compact('focus'));
    }

}
