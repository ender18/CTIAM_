<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use DB;

class AllyController extends Controller
{

      public function index(){
        $my_courses = Course::where('id_owner', auth()->user()->id)->get();
        $id_my_courses = array();


        $my_groups = DB::table('groups')
                 ->join('courses', 'courses.id', '=', 'groups.id_course_parent')
                 ->select('groups.id_course_parent', DB::raw('count(groups.id_course_parent) as total'))
                 ->where('courses.id_owner', auth()->user()->id)
                 ->groupBy('groups.id_course_parent')
                 ->get();

        $my_beneficiaries = DB::table('groups')
                 ->join('courses', 'courses.id', '=', 'groups.id_course_parent')
                 ->join('groups_users', 'groups_users.id_group', 'groups.id')
                 ->select('groups.id_course_parent', DB::raw('count(groups.id_course_parent) as total'))
                 ->where('courses.id_owner', auth()->user()->id)
                 ->groupBy('groups.id_course_parent')
                 ->get();


        return view('ally.myEventsAlly', compact('my_courses', 'my_groups', 'my_beneficiaries'));

      }


      public function indexBeneficiary(){

        $beneficiaries = DB::table('users')
                          ->join('role_user', 'users.id', '=', 'role_user.user_id')
                          ->join('roles', 'roles.id', '=', 'role_user.role_id')
                          ->select('users.*', 'roles.name as name_rol')
                          ->where('users.id_ally', auth()->user()->id)->get();

        $cantidad_cursos = DB::table('users')
                          ->join('groups_users', 'users.id', '=', 'groups_users.id_users')
                          ->select('groups_users.id_users', DB::raw('count(groups_users.id_users) as total'))
                          ->where('users.id_ally', auth()->user()->id)
                          ->groupBy('groups_users.id_users')
                          ->get();

        $cantidad_cursos_a_cargo = DB::table('users')
                          ->join('groups_tutors', 'users.id', '=', 'groups_tutors.id_tutor')
                          ->select('groups_tutors.id_tutor', DB::raw('count(groups_tutors.id_tutor) as total'))
                          ->where('users.id_ally', auth()->user()->id)
                          ->groupBy('groups_tutors.id_tutor')
                          ->get();

        return view('ally.myBeneficiaryAlly', compact('beneficiaries', 'cantidad_cursos', 'cantidad_cursos_a_cargo' ));

      }



}
