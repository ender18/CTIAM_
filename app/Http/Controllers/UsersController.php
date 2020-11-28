<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Focus;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function addNewUser(Request $request){
      if ($request->ajax()) {
        $status = false;
        $msj = '';

        $user = Users::where('email', '=', $request->email)->first();
        if ($user == null) {
          $user = new Users();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->email_verified_at = $request->email_verified_at;
          $user->password = Hash::make($request->password);
          $user->remember_token = $request->remember_token;
          $user->type_dni = $request->type_dni;
          $user->dni = $request->dni;
          $user->last_name = $request->last_name;
          $user->birthdate = $request->birthdate;
          $user->adress = $request->adress;
          $user->neighborhood = $request->neighborhood;
          $user->commune = $request->commune;
          $user->phone = $request->phone;
          $user->id_ally = $request->ihave_ally;
          $user->civil_status = $request->civil_status;
          $user->has_children = $request->has_children;
          $user->level_study = $request->level_study;
          $user->last_study = $request->last_study;
          $user->degree = $request->degree;
          $user->study_actually = $request->study_actually;
          $user->what_studies = $request->what_studies;
          $user->work_actually = $request->work_actually;
          $user->laboral_sector = $request->laboral_sector;
          $user->bussiness_owner = $request->bussiness_owner;
          $user->way_working = $request->way_working;
          $user->type_company = $request->type_company;
          $user->time_not_to_work = $request->time_not_to_work;
          $user->save();

          $fecha_hoy = date("Y-m-d H:i:s");
          // Añadiendo el foco(s)
          // DB::table('course_foci')->where('course_id', $course->id)->delete();
          $role = null;
          $status = null;
          if ($request->tipo_registro == 'Beneficiaria') {
            $role = 3;
            $status = 'activated';
          }else if($request->tipo_registro == 'Aliado'){
            $role = 2;
            $status = 'pending';
          }elseif ($request->tipo_registro == 'Tutor') {
            $role = 4;
            $status = 'pending';
          }
          if ($role != null) {
            DB::table('role_user')->insert(
              ['user_id' => $user->id, 'role_id' => $role , 'status' => $status  ,'created_at'=> $fecha_hoy, 'updated_at'=> $fecha_hoy]
            );
          }

          $data = array(
          );

          $focos = Focus::get();
          foreach ($focos as $foco) {
            if ($foco->name === 'Familiar' && $user->has_children) {
              array_push($data, array('foci_id'=> $foco->id, 'user_id'=> $user->id, 'created_at'=> $fecha_hoy, 'updated_at'=> $fecha_hoy));
            }
            if ($foco->name === 'Estudiante' && $user->study_actually) {
              array_push($data, array('foci_id'=> $foco->id, 'user_id'=> $user->id, 'created_at'=> $fecha_hoy, 'updated_at'=> $fecha_hoy));
            }
            if ($foco->name === 'Profesional' && $user->level_study == 'Profesional') {
              array_push($data, array('foci_id'=> $foco->id, 'user_id'=> $user->id, 'created_at'=> $fecha_hoy, 'updated_at'=> $fecha_hoy));
            }
            if ($foco->name === 'Laboral' && $user->work_actually) {
              array_push($data, array('foci_id'=> $foco->id, 'user_id'=> $user->id, 'created_at'=> $fecha_hoy, 'updated_at'=> $fecha_hoy));
            }
            if ($foco->name === 'Empresarial' && $user->bussiness_owner) {
              array_push($data, array('foci_id'=> $foco->id, 'user_id'=> $user->id, 'created_at'=> $fecha_hoy, 'updated_at'=> $fecha_hoy));
            }

          }
          DB::table('foci_user')->insert($data);
          $status = true;
          $msj = 'El sistema lo redireccionará en unos instantes...';

        }else {
          $status = false;
          $msj = 'El usuario '. $request->email .' ya se encuentra registrado';
        }

        // Fin inserción

        return response()->json([
          'msj' => $msj,
          'status' => $status
          ], 200);
      }
    }

    public function editInformation(){
      $usuario = User::find(auth()->user()->id);
      return view('auth.editInformation', compact('usuario'));
    }


    public function manageUsers(){      
      if (auth()->user() == null) abort(401, 'This action is inautorized');
      if (!auth()->user()->authorizedRoles('admin')) abort(401, 'This action is inautorized');
      $usuarios = User::select('role_user.id', 'users.name', 'users.last_name', 'users.email', 'users.phone', 'roles.description', 'role_user.status')->join('role_user', 'users.id', '=', 'role_user.user_id')->join('roles', 'roles.id', '=', 'role_user.role_id' )->orderBy('users.id', 'ASC')->get();
      return view('management.manageUsers', compact('usuarios'));
    }

    public function changeStatus(Request $request){
      if ($request->ajax()) {
        // code...


        DB::table('role_user')
            ->where('id', $request->id)
            ->update(['status' => $request->status]);

        $usuarios = User::select('role_user.id', 'users.name', 'users.last_name', 'users.email', 'users.phone', 'roles.description', 'role_user.status')->join('role_user', 'users.id', '=', 'role_user.user_id')->join('roles', 'roles.id', '=', 'role_user.role_id' )->orderBy('users.id', 'ASC')->get();

        return response()->json([
          'usuarios' => $usuarios
        ],200);
      }


    }


    public function viewchangePassword(Request $request){

      if (auth()->user()->id != null) {
          return view('auth.changePassword');
        }
        abort(401, 'No Autorizado');
    }

    public function changePassword(Request $request){
      if ($request->ajax()) {
        // code...
        $msj = 'Ocurrió un error, intente de nuevo por favor';
        $type_msj = 'danger';
        $error_password = '';
        $user = User::find(auth()->user()->id);
        if (Hash::check($request->password_new, $user->password)) {
          $msj = 'La nueva contraseña no puede ser igual a la anterior';
          $error_password = 'password_new';
        }else if (Hash::check($request->password_actual, $user->password)) {
          $user->password = Hash::make($request->password_new);
          $user->save();
          $msj = 'La contraseña se ha cambiado satisfactoriamente';
          $type_msj = 'success';
        }else{
          $msj = 'La contraseña actual es incorrecta, intente de nuevo por favor';
          $error_password = 'password_actual';
        }

        return response()->json([
          'msj'=> $msj,
          'type_msj' => $type_msj,
          '$error_password' => $error_password
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
