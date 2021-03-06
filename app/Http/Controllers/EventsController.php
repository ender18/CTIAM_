<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Focus;
use DB;
use App\User;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Notifications\SuscribeCourse;

class EventsController extends Controller
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
          $courses = Course::orderBy('created_at', 'DESC')->get();
          $aliados = null;
          $id_aliado = DB::table('roles')->where('name', '=', 'aliado')->first();
          $id_tutor = DB::table('roles')->where('name', '=', 'tutor')->first();
          $aliados = User::select('users.id', 'users.name', 'users.last_name')->join('role_user', 'users.id', '=', 'role_user.user_id')->where('role_user.role_id', '=', $id_aliado->id)->orderBy('last_name', 'asc')->get();
          $tutores = User::select('users.id', 'users.name', 'users.last_name')->join('role_user', 'users.id', '=', 'role_user.user_id')->where('role_user.role_id', '=', $id_tutor->id)->orderBy('last_name', 'asc')->get();

          return view('ally.manageEvents', compact('focos', 'courses', 'aliados', 'tutores'));

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

          $course = null;
          if ($request->id === null) {
            $course = new Course();
          }else {
            $course = Course::find($request->id);
          }

          $course->type = $this->validarString($request->type);
          $course->title = $this->validarString($request->title);
          $course->description = $this->validarString($request->description);
          $course->duration = $this->validarString($request->duration);
          $course->duration_type = $this->validarString($request->durationtext);
          $course->fecha_inicio = $this->validarString($request->fecha_inicio);
          $course->fecha_fin = $this->validarString($request->fecha_fin);
          $course->fecha_inicio_inscription = $this->validarString($request->fecha_inicio_inscription);
          $course->fecha_fin_inscription = $this->validarString($request->fecha_fin_inscription);
          $course->cost = $this->validarString($request->cost);
          $course->id_owner = $this->validarString($request->id_owner);
          $course->status = $this->validarString($request->status);

          if ($name !== '' && $name !== null) {
            $course->url_image = '/images/user/'.$name;
          }else if ($request->id === null) {
            $course->url_image = '/images/default_activity.png';
            // code...
          }

          $course->Save();
          $events = Course::orderBy('created_at','DESC')->get();
          $resultado = null;
          $array = $request->focosSeleccionados;

          $fecha_hoy = date("Y-m-d H:i:s");
          $array_focos = json_decode($array);

          // Se insertan los focos del Evento
          DB::table('course_foci')->where('course_id', $course->id)->delete();
          $data = array(
          );
          foreach ($array_focos as $value) {
             array_push($data, array('course_id'=> $course->id, 'foci_id'=> $value->id, 'created_at'=> $fecha_hoy, 'updated_at'=> $fecha_hoy));
          }
          DB::table('course_foci')->insert($data);
          // Fin inserción

          $msj = 'Los cambios se guardaron correctamente.';
          return response()->json([
            'msj' => $msj,
            'events' => $events

          ], 200);
        }
    }

    public function newCourse(Request $request){
      if ($request->ajax()) {

         $course = new Course();
         $course->id_owner = auth()->user()->id;
         $course->url_image = '/images/default_activity.png';
         $course->status = 'Borrador';
         $course->save();
         $id_course = $course->id;

         $events = Course::orderBy('created_at','DESC')->get();

        return response()->json([
          'id_course' => $id_course,
          'events' => $events
        ],200);
      }

    }

    public function addGroup(Request $request){
        if ($request->ajax()) {

          $fecha_hoy = date("Y-m-d H:i:s");
          $id_group = DB::table('groups')->where('id', '=', $request->id)->update(
              ['name' => $this->validarString($request->name),
               'quota' => $this->validarString($request->quota),
               'schedule' => $this->validarString($request->schedule),
               'place' => $this->validarString($request->place),
               'status_group' => '',
               'id_course_parent' => $this->validarString($request->id_course_parent),
               'updated_at' => $fecha_hoy
             ]
          );

          $tutorsSelected = $request->tutoresSeleccionados;
          $array_tutors = json_decode($tutorsSelected);


          // Se insertan los focos del Evento

          DB::table('groups_tutors')->where('id_group', $request->id)->delete();
          $dataTutors = array();
          foreach ($array_tutors as $value) {
             array_push($dataTutors, array('id_group'=> $request->id,
                                     'id_tutor'=> $value->id,
                                     'created_at' => $fecha_hoy,
                                     'updated_at' => $fecha_hoy
                                      ));
          }
          DB::table('groups_tutors')->insert($dataTutors);

          // Actualizar los GRUPOS
          $groups = DB::table('groups')->select('groups.id',
                                                'groups.name as nameGroup',
                                                'groups.quota',
                                                'groups.schedule',
                                                'groups.place'
          )->where('groups.id_course_parent', '=', $request->id_course_parent)->get();

          $arrayIdGroups = array();
          foreach ($groups as $group) {
            array_push($arrayIdGroups, $group->id);
          }

          $tutors = DB::table('groups_tutors')->join('groups', 'groups.id', '=', 'groups_tutors.id_group')
                                              ->join('users', 'users.id', '=', 'groups_tutors.id_tutor')
                                              ->where('groups.id_course_parent', '=', $request->id_course_parent)->get();

          $schedulesGroup = DB::table('schedule')->select('id',
                                                          'id_group',
                                                          'day',
                                                          DB::raw("DATE_FORMAT(hour_start,' %H:%i') as hour_start"),
                                                          DB::raw("DATE_FORMAT(hour_end,' %H:%i') as hour_end"),
                                                          )->whereIn('id_group', $arrayIdGroups)->orderBy('created_at', 'asc')->get();


          return response()->json([
            'msj' => $dataTutors,
            'groups' => $groups,
            'tutors' => $tutors,
            'schedulesGroup' => $schedulesGroup
          ],200);
        }


    }

    public function newGroup(Request $request){
      if ($request->ajax()) {

        $id_group = $request->id_group;

        if ($id_group == null) {
            $fecha_hoy = date("Y-m-d H:i:s");
            $id_group = DB::table('groups')->insertGetId(
              [ 'id_course_parent' => $request->id_course,
              'created_at' => $fecha_hoy,
              'updated_at' => $fecha_hoy
            ]
          );
        }
        $group = DB::table('groups')->where('id','=', $id_group)->first();
        $schedulesGroup = DB::table('schedule')->where('id_group', '=', $id_group)->get();
        $tutorsSelected = DB::table('users')->join('groups_tutors', 'groups_tutors.id_tutor', '=', 'users.id')
        ->where('groups_tutors.id_group', '=', $id_group)->orderBy('groups_tutors.created_at', 'asc')->get();
        return response()->json([
          'group' => $group,
          'schedulesGroup' => $schedulesGroup,
          'tutorsSelected' => $tutorsSelected
        ],200);
      }
    }

    public function addTutorGroup(Request $request){
      if ($request->ajax()) {
        $tutorsSelected = null;
        $fecha_hoy = date("Y-m-d H:i:s");
        $existe = DB::table('groups_tutors')
        ->where('groups_tutors.id_group', '=', $request->id_group)
        ->where('groups_tutors.id_tutor', '=', $request->id_tutor)
        ->get();
        if ($existe->count() == 0) {
          $id_group = DB::table('groups_tutors')->insert(
            [ 'id_group' => $request->id_group,
            'id_tutor' => $request->id_tutor,
            'created_at' => $fecha_hoy,
            'updated_at' => $fecha_hoy
          ]
        );
      }
      $tutorsSelected = DB::table('users')->join('groups_tutors', 'groups_tutors.id_tutor', '=', 'users.id')
      ->where('groups_tutors.id_group', '=', $request->id_group)->orderBy('groups_tutors.created_at', 'asc')->get();
      return response()->json([
        'tutorsSelected' => $tutorsSelected
      ],200);
      // code...
    }
  }

  public function deleteTutorGroup(Request $request){
    if ($request->ajax()) {

      DB::table('groups_tutors')
      ->where('groups_tutors.id_group', '=', $request->id_group)
      ->where('groups_tutors.id_tutor', '=', $request->id_tutor)->delete();
      $tutorsSelected = DB::table('users')->join('groups_tutors', 'groups_tutors.id_tutor', '=', 'users.id')
      ->where('groups_tutors.id_group', '=', $request->id_group)->orderBy('groups_tutors.created_at', 'asc')->get();

      return response()->json([
        'tutorsSelected' => $tutorsSelected
      ],200);
      // code...
    }


  }


    public function downloadInfoCourse(Request $request){
      return Excel::download(new UsersExport($request->id_course), 'InfoAct'.$request->id_course.'.xlsx');
    }

    public function deleteGroup(Request $request){
      if ($request->ajax()) {
        // code...
        DB::table('groups_users')->where('id_group', '=', $request->id_group)->delete();
        DB::table('groups_tutors')->where('id_group', '=', $request->id_group)->delete();
        DB::table('groups')->where('id', '=', $request->id_group)->delete();



        // Actualizar los GRUPOS
        $groups = DB::table('groups')->select('groups.id',
                                              'groups.name as nameGroup',
                                              'groups.quota',
                                              'groups.schedule',
                                              'groups.place'
        )->where('groups.id_course_parent', '=', $request->id_course)->get();

        $tutors = DB::table('groups_tutors')->join('groups', 'groups.id', '=', 'groups_tutors.id_group')
                                            ->join('users', 'users.id', '=', 'groups_tutors.id_tutor')
                                            ->where('groups.id_course_parent', '=', $request->id_course)->get();

        return response()->json([
          'groups' => $groups,
          'tutors' => $tutors
        ],200);
      }



    }

    public function SearchCoursesFocos(Request $request){
      if ($request->ajax()) {
        // code...
        $focos = Focus::whereIn('id' , DB::table('course_foci')->select('foci_id')->where('course_id', $request->id))->get();

        $groups = DB::table('groups')->select('groups.id',
                                              'groups.name as nameGroup',
                                              'groups.quota',
                                              'groups.schedule',
                                              'groups.place'
        )->where('groups.id_course_parent', '=', $request->id)->get();


        $tutors = DB::table('groups_tutors')->join('groups', 'groups.id', '=', 'groups_tutors.id_group')
                                            ->join('users', 'users.id', '=', 'groups_tutors.id_tutor')
                                            ->where('groups.id_course_parent', '=', $request->id)->get();

        $arrayIdGroups = array();
        foreach ($groups as $group) {
          array_push($arrayIdGroups, $group->id);
        }

        $tutors = DB::table('groups_tutors')->join('groups', 'groups.id', '=', 'groups_tutors.id_group')
                                            ->join('users', 'users.id', '=', 'groups_tutors.id_tutor')
                                            ->where('groups.id_course_parent', '=', $request->id)->get();

        $schedulesGroup = DB::table('schedule')->select('id',
                                                        'id_group',
                                                        'day',
                                                        DB::raw("DATE_FORMAT(hour_start,' %H:%i') as hour_start"),
                                                        DB::raw("DATE_FORMAT(hour_end,' %H:%i') as hour_end"),
                                                        )->whereIn('id_group', $arrayIdGroups)->orderBy('created_at', 'asc')->get();

        return response()->json([
          'focos' => $focos,
          'groups' => $groups,
          'tutors' => $tutors,
          'schedulesGroups' => $schedulesGroup

        ], 200);
      }
    }

    public function validarString($string){
      if ($string == 'null' || $string == '') {
        return null;
      }
      return $string;
    }

    public function changeStatus(Request $request){
      if ($request->ajax()) {

        $evento = Course::find($request->id);
        $evento->status = $request->status;
        $evento->Save();
        $events = Course::orderBy('created_at','DESC')->get();
        $msj = 'El evento ha cambiado su estado correctamente';

        $groups = DB::table('groups')->where('groups.id_course_parent', '=', $request->id)->get();
        $arrayGroups = array();

        foreach ($groups as  $grupo) {
          array_push($arrayGroups, $grupo->id);
        }
        DB::table('groups')
              ->whereIn('id' , $arrayGroups)
              ->update(['status_group' => $request->status]);


        if ($request->status != 'Finalizado') {          // code...
          DB::table('groups_users')
          ->whereIn('id_group', $arrayGroups)
          ->update(['status' => $request->status]);
        }

        return response()->json([
          'eventos' => $events,
          'msj' => $msj
        ], 200);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, $id)
    {

        if ($request->ajax()) {
          $curso = Course::join('users', 'courses.id_owner', '=', 'users.id')
                  ->where('courses.id', '=' ,$id)->first();
          $focos = Focus::join('course_foci', 'foci.id', '=', 'course_foci.foci_id')->where('course_foci.course_id', '=', $id)->get();
          // Actualizar los GRUPOS
          $groups = DB::table('groups')->select('groups.id',
                                                'groups.name as nameGroup',
                                                'groups.quota',
                                                'groups.schedule',
                                                'groups.place',
                                                'groups.status_group',
          )->where('groups.id_course_parent', '=', $id)->get();
          $tutors = DB::table('groups_tutors')->join('groups', 'groups.id', '=', 'groups_tutors.id_group')
                                              ->join('users', 'users.id', '=', 'groups_tutors.id_tutor')
                                              ->where('groups.id_course_parent', '=', $id)->get();
          $arrayGroups = array();
          foreach ($groups as  $grupo) {
              array_push($arrayGroups, $grupo->id);
          }
          $students  = User::join('groups_users', 'users.id', '=', 'groups_users.id_users')->join('groups', 'groups_users.id_group', '=', 'groups.id')
          ->select('users.last_name',
                   'users.name',
                   'users.email',
                   'users.phone',
                   'users.adress',
                   'users.neighborhood',
                   'groups.name as nameGroup',
                   'groups_users.status')
          ->whereIn('groups_users.id_group', $arrayGroups)->get();
          $array_focos = array();
          foreach ($focos as $value) {
            array_push($array_focos, ' '.$value->name);
          }
          $focos_string = implode(",", $array_focos);

          $arrayIdGroups = array();
          foreach ($groups as $group) {
            array_push($arrayIdGroups, $group->id);
          }
          $schedulesGroups = DB::table('schedule')->select('id',
                                                          'id_group',
                                                          'day',
                                                          DB::raw("DATE_FORMAT(hour_start,' %H:%i') as hour_start"),
                                                          DB::raw("DATE_FORMAT(hour_end,' %H:%i') as hour_end"),
                                                          )->whereIn('id_group', $arrayIdGroups)->orderBy('created_at', 'asc')->get();
            return response()->json([
              'course' => $curso,
              'focos' => $focos_string,
              'students' => $students,
              'groups' => $groups,
              'tutors' => $tutors,
              'id_course' =>$id,
              'schedulesGroups' => $schedulesGroups
            ], 200);
        }

    }

    public function finishCourse(Request $request){

      if (auth()->user() == null) abort(401, 'This action is inautorized');
      if (!auth()->user()->authorizedRoles('tutor')) abort(401, 'This action is inautorized');
      $grupo = DB::table('groups')->where('id', '=', $request->id_group)->first();


      if (auth()->user()->id == $grupo->id) abort(401, 'This action is inautorized');
      if ($grupo->status_group == 'Calificado') abort(401, 'This action is inautorized');

      $id_course = $request->id_course;
      $id_group = $request->id_group;

      $curso = Course::join('users', 'courses.id_owner', '=', 'users.id')
              ->where('courses.id', '=' ,$id_course)->first();
      $focos = Focus::join('course_foci', 'foci.id', '=', 'course_foci.foci_id')->where('course_foci.course_id', '=', $id_course)->get();

      $students  = User::join('groups_users', 'users.id', '=', 'groups_users.id_users')->where('groups_users.id_group', '=', $id_group)->get();
      $array_focos = array();

      foreach ($focos as $value) {
        array_push($array_focos, ' '.$value->name);
      }

      $focos_string = implode(",", $array_focos);

      return view('management.finishCourse', compact('curso', 'students', 'focos_string', 'id_course', 'id_group'));
    }

    public function finishCourseLast(Request $request){
      if ($request->ajax()) {
        // $request->id_course
        // $request->id_aproved
        // $request->id_no_aproved

        DB::table('groups_users')
              ->whereIn('id', $request->id_aproved)
              ->update(['status' => 'Aprobado']);



        DB::table('groups_users')
              ->whereIn('id', $request->id_no_aproved)
              ->update(['status' => 'No Aprobado']);


        DB::table('groups')
              ->where('id', '=' , $request->id_group)
              ->update(['status_group' => 'Calificado']);

        // $course = Course::find($request->id_course);
        // $course->status = 'Finalizado';
        // $course->save();

        $students  = User::join('groups_users', 'users.id', '=', 'groups_users.id_users')->where('groups_users.id_group', '=', $request->id_group)->get();
        return response()->json([
          'msj' => 'El curso se ha finalizado correctamente',
          'students' => $students
        ],200);
      }


    }

    public function showEvents(Request $request)
    {

      if (auth()->user() == null) abort(401, 'This action is inautorized');
      if (!auth()->user()->authorizedRoles('beneficiaria')) abort(401, 'This action is inautorized');

      $fecha_hoy = date("Y-m-d H:i:s");


      // Buscar los cursos en los que estoy matriculado
        $my_groups = DB::table('groups_users')->join('groups', 'groups.id', '=', 'groups_users.id_group')->select('groups.id_course_parent')->where('id_users', '=', auth()->user()->id)->get();

        // Agregar los ID de los cursos en los que estoy matriculado
        $arrayMyCourses = array();
        foreach ($my_groups as  $value) {
          array_push($arrayMyCourses, $value->id_course_parent);
        }

        // buscar todos los cursos
        $all_groups = DB::table('groups')->where('status_group', '=', 'Publicado')->get();

        // Buscar los cursos que todavía tienen cupo
        $matriculados = DB::table('groups_users')
                 ->select('id_group', DB::raw('count(id_group) as total'))
                 ->groupBy('id_group')
                 ->get();

        $lista_cupo_full = array();
        foreach ($all_groups as  $value) {
            foreach ($matriculados as  $value1) {
                if ($value->id == $value1->id_group) {
                      if ($value->quota < $value1->total) {
                        array_push($lista_cupo_full, $value->id_course_parent );
                      }
                }
            }
        }

        $events_with_preferences = Course::select('courses.id', 'courses.title', 'courses.description', 'courses.type' ,'courses.url_image')
              ->join('course_foci', 'courses.id', '=', 'course_foci.course_id')
              ->whereIn('course_foci.foci_id', DB::table('foci_user')->select('foci_user.foci_id')->where('foci_user.user_id', auth()->user()->id))
              ->whereNotIn('courses.id', $arrayMyCourses)
              ->whereNotIn('courses.id', $lista_cupo_full)
              ->where('courses.fecha_inicio_inscription', '<', $fecha_hoy)
              ->where('fecha_fin_inscription', '>', $fecha_hoy)
              ->where('courses.status', '=', 'Publicado')
              ->distinct('courses.id')->get();

        $array = array();
        foreach ($events_with_preferences as  $value) {
          array_push($array, $value->id);
        }

        $events_without_preferences = Course::select('courses.id', 'courses.title', 'courses.type' , 'courses.description', 'courses.url_image')
              ->whereNotIn('courses.id', $array)
              ->whereNotIn('courses.id', $arrayMyCourses)
              ->whereNotIn('courses.id', $lista_cupo_full)
              ->where('courses.fecha_inicio_inscription', '<', $fecha_hoy)
              ->where('fecha_fin_inscription', '>', $fecha_hoy)
              ->where('courses.status', '=', 'Publicado')
              ->distinct('courses.id')->get();

        return view('beneficiary.showEvents', compact('events_with_preferences', 'events_without_preferences'));
    }

    public function suscribe(Request $request){
      if ($request->ajax()) {




        $msj = '';
        $status = '';

        $grupo = DB::table('groups')->where('id', '=', $request->id)->first();
        $curso = Course::find($grupo->id_course_parent);
        $schedules =
        $matriculados1 = count(DB::table('groups_users')->where('id_group', $request->id)->get());

        if ($grupo->quota > $matriculados1) {
          $fecha_hoy = date("Y-m-d H:i:s");
          DB::table('groups_users')->insert(
            ['id_users' => auth()->user()->id, 'id_group' => $request->id, 'status' => 'Matriculado', 'created_at'=> $fecha_hoy, 'updated_at'=> $fecha_hoy]
          );
          $msj = 'Se ha inscrito en la actividad "'.$curso->title.'" satisfactoriamente. ¿Desea ver más actividades disponibles o ver actividades matriculadas?';
          $status = 'success';
          $schedules_string = '';
          $schedules = DB::table('schedule')->where('id_group', '=', $request->id)->get();
          foreach ($schedules as $schedule) {
            $schedules_string .= $schedule->day.' ('.substr($schedule->hour_start, 0, 5 ).'-'.substr($schedule->hour_end, 0, 5 ).') -';
          }
          $email = auth()->user()->email;

          auth()->user()->sendNotify($curso, $grupo, $schedules_string, $email);

        }else {
          $msj = 'No se ha podido inscribir en el curso "'.$curso->title.'" ha excedido el cupo maximo';
          $status = '';
        }




        // Actualizar mis cursos
        $fecha_hoy = date("Y-m-d H:i:s");


        // Buscar los cursos en los que estoy matriculado
          $my_groups = DB::table('groups_users')->join('groups', 'groups.id', '=', 'groups_users.id_group')->select('groups.id_course_parent')->where('id_users', '=', auth()->user()->id)->get();

          // Agregar los ID de los cursos en los que estoy matriculado
          $arrayMyCourses = array();
          foreach ($my_groups as  $value) {
            array_push($arrayMyCourses, $value->id_course_parent);
          }

          // buscar todos los cursos
          $all_groups = DB::table('groups')->where('status_group', '=', 'Publicado')->get();

          // Buscar los cursos que todavía tienen cupo
          $matriculados = DB::table('groups_users')
                   ->select('id_group', DB::raw('count(id_group) as total'))
                   ->groupBy('id_group')
                   ->get();

          $lista_cupo_full = array();
          foreach ($all_groups as  $value) {
              foreach ($matriculados as  $value1) {
                  if ($value->id == $value1->id_group) {
                        if ($value->quota < $value1->total) {
                          array_push($lista_cupo_full, $value->id_course_parent );
                        }
                  }
              }
          }

          $events_with_preferences = Course::select('courses.id', 'courses.title', 'courses.description', 'courses.type' ,'courses.url_image')
                ->join('course_foci', 'courses.id', '=', 'course_foci.course_id')
                ->whereIn('course_foci.foci_id', DB::table('foci_user')->select('foci_user.foci_id')->where('foci_user.user_id', auth()->user()->id))
                ->whereNotIn('courses.id', $arrayMyCourses)
                ->whereNotIn('courses.id', $lista_cupo_full)
                ->where('courses.fecha_inicio_inscription', '<', $fecha_hoy)
                ->where('fecha_fin_inscription', '>', $fecha_hoy)
                ->where('courses.status', '=', 'Publicado')
                ->distinct('courses.id')->get();

          $array = array();
          foreach ($events_with_preferences as  $value) {
            array_push($array, $value->id);
          }

          $events_without_preferences = Course::select('courses.id', 'courses.title', 'courses.type' , 'courses.description', 'courses.url_image')
                ->whereNotIn('courses.id', $array)
                ->whereNotIn('courses.id', $arrayMyCourses)
                ->whereNotIn('courses.id', $lista_cupo_full)
                ->where('courses.fecha_inicio_inscription', '<', $fecha_hoy)
                ->where('fecha_fin_inscription', '>', $fecha_hoy)
                ->where('courses.status', '=', 'Publicado')
                ->distinct('courses.id')->get();


        return response()->json([
          'msj' => $msj,
          'status' => $status,
          'events_with_preferences' => $events_with_preferences,
          'events_without_preferences' => $events_without_preferences

        ], 200);
      }
    }

    public function showMyEvents(Request $request){
      if (auth()->user() == null) abort(401, 'This action is inautorized');
      if (!auth()->user()->authorizedRoles('beneficiaria')) abort(401, 'This action is inautorized');

      $my_courses = Course::join('groups', 'courses.id', '=', 'groups.id_course_parent')
                          ->join('groups_users', 'groups_users.id_group', '=', 'groups.id')
                          ->where('groups_users.id_users', auth()->user()->id)->get();

      return view('beneficiary.showMyEvents', compact('my_courses'));
    }

    public function cancelCourse(Request $request){
      if ($request->ajax()) {
        $msj = '';
        DB::table('groups_users')->where('id', $request->id)->update(['status' => 'Cancelado']);
        // code...
        $my_courses = Course::join('groups', 'courses.id', '=', 'groups.id_course_parent')
                            ->join('groups_users', 'groups_users.id_group', '=', 'groups.id')
                            ->where('groups_users.id_users', auth()->user()->id)->get();


        return response()->json([
          'msj' => $msj,
          'courses' => $my_courses
        ],200);
      }
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
    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
          $course = Course::find($id);
          $msj = 'La actividad '. $course->title.' se ha eliminado satisfactoriamente.';
          DB::table('course_foci')->where('course_id', $course->id)->delete();
          $course->delete();

          $eventos = Course::orderBy('created_at','DESC')->get();
          return response()->json([
            'eventos' => $eventos,
            'msj' => $msj
          ],200);
        }
    }


    // METODOS DE MYEVENTS SESIÓN ALIADOS
    public function myEventsAliado(Request $request){

      if (auth()->user() == null) abort(401, 'This action is inautorized');
      if (!auth()->user()->authorizedRoles('tutor')) abort(401, 'This action is inautorized');

      $courses = Course::join('groups', 'courses.id', '=', 'groups.id_course_parent')
                        ->join('groups_tutors', 'groups_tutors.id_group', '=', 'groups.id')
                        ->select('courses.title',
                        'courses.description',
                        'courses.type',
                        'courses.duration',
                        'courses.duration_type',
                        'courses.url_image',
                        'courses.fecha_inicio',
                        'courses.fecha_fin',
                        'courses.fecha_inicio_inscription',
                        'courses.fecha_fin_inscription',
                        'courses.cost',
                        'courses.id_owner',
                        'courses.status',
                        'groups.id',
                        'groups.name',
                        'groups.id_course_parent',
                        'groups.quota',
                        'groups.schedule',
                        'groups.place',
                        'groups.status_group'
                        )
                        ->where('groups_tutors.id_tutor', auth()->user()->id)->get();

      return view('ally.myEvents', compact('courses'));

    }


    public function addBeneficiary(Request $request){
        if ($request->ajax()) {
          $msj = 'La beneficiaria se ha inscrito correctamente en el grupo';
          $type_msj = '';
          // $msj = 'id_grupo: '.$request->addBeneficiaryGroup.' Id beneficiaria: '.$request->addBeneficiaryDni;

          $existeBeneficiaria = DB::table('users')->where('users.dni', '=', $request->addBeneficiaryDni)->first();

          if ($existeBeneficiaria == null) {
            $msj = 'No existe ninguna beneficiaria registrada con ese numero de documento';
            $type_msj = 'error';
          }else{
              $curso = DB::table('courses')->select('courses.id')
                                          ->join('groups', 'groups.id_course_parent', '=', 'courses.id')
                                          ->where('groups.id', '=', $request->addBeneficiaryGroup)->first();

              $estaMatriculada = DB::table('groups_users')->join('groups', 'groups.id', '=', 'groups_users.id_group')
                                                          ->join('courses', 'courses.id', '=', 'groups.id_course_parent')
                                                          ->where('groups_users.id_users', '=', $existeBeneficiaria->id)
                                                          ->where('courses.id', '=', $curso->id)->first();
              if ($estaMatriculada != null) {
                $msj = 'La beneficiaria ya se encuentra matriculada en la actividad de formación';
                $type_msj = 'error';
              }else{
                $fecha_hoy = date("Y-m-d H:i:s");
                $id_group = DB::table('groups_users')->insertGetId(
                  ['id_group' => $this->validarString($request->addBeneficiaryGroup),
                  'id_users' => $this->validarString($existeBeneficiaria->id),
                  'status' => 'Matriculado',
                  'created_at' => $fecha_hoy,
                  'updated_at' => $fecha_hoy
                ]
              );

              // $curso = Course::find($curso->id);
              // $grupo = DB::table('groups')->where('id', '=', $request->addBeneficiaryGroup)->first();
              // $schedules_string = '';
              // $schedules = DB::table('schedule')->where('id_group', '=', $request->addBeneficiaryGroup)->get();
              // foreach ($schedules as $schedule) {
              //   $schedules_string .= $schedule->day.' ('.substr($schedule->hour_start, 0, 5 ).'-'.substr($schedule->hour_end, 0, 5 ).') -';
              // }
              // $email = $existeBeneficiaria->email;
              // auth()->user()->sendNotify($curso, $grupo, $schedules_string, $email);

              }
          }
          return response()->json([
            'msj' => $msj,
            'type_msj' => $type_msj
          ],200);
          // code...
        }

    }

    public function showGroup(Request $request){
      if ($request->ajax()) {
        $focos = Focus::join('course_foci', 'foci.id', '=', 'course_foci.foci_id')->where('course_foci.course_id', '=', $request->id_course)->get();
        $students  = User::join('groups_users', 'users.id', '=', 'groups_users.id_users')->join('groups', 'groups_users.id_group', '=', 'groups.id')
        ->select('users.last_name',
                 'users.name',
                 'users.email',
                 'users.phone',
                 'users.adress',
                 'users.neighborhood',
                 'groups.status_group',
                 'groups.name as nameGroup',
                 'groups_users.status')
        ->where('groups_users.id_group', $request->id_group)->get();
        $owner = User::join('courses', 'courses.id_owner', '=', 'users.id')->where('courses.id', '=', $request->id_course)->first();
        $schedules = DB::table('schedule')->where('id_group', '=', $request->id_group)->get();

        $array_focos = array();



        foreach ($focos as $value) {
          array_push($array_focos, ' '.$value->name);
        }

        $focos_string = implode(",", $array_focos);

        return response()->json([
          'focos' => $focos_string,
          'students' => $students,
          'owner' => $owner,
          'schedules' => $schedules

        ],200);
        // code...
      }


    }

    public function exportCertified(Request $request){

      // return view('management.certifiedCourse');

      if (auth()->user() != null) {
        if (auth()->user()->authorizedRoles('admin')) {
          $course = Course::find($request->id_course);

          $user = null;
          if ($request->id_user == null || $request->id_user == 'example') {
            $user = new User();
            $user->name = 'JUANA';
            $user->last_name = "RANGEL DE CUELLAR";
            $user->type_dni = "CC";
            $user->dni = "1.000.000.000";
            // code...
          }else{
            $user = User::select('dni',
            DB::raw('upper(name) as name'),
            DB::raw('upper(last_name) as last_name'),
            'type_dni')->where('dni', $request->id_user)->first();
          }

          $number = 0;
          if ($course->certified_name_people1 != '' || $course->certified_name_people1 != null) {
            $number++;
          }
          if ($course->certified_name_people2 != '' || $course->certified_name_people2 != null) {
            $number++;
          }
          if ($course->certified_name_people3 != '' || $course->certified_name_people3 != null) {
            $number++;
          }
          if ($course->certified_name_people4 != '' || $course->certified_name_people4 != null) {
            $number++;
          }
          if ($course->certified_name_people5 != '' || $course->certified_name_people5 != null) {
            $number++;
          }
          if ($course->certified_name_people6 != '' || $course->certified_name_people6 != null) {
            $number++;
          }

          // $image = 'images/certifieds/certified2.jpg';

          // $pdf = \PDF::loadView('mail.testEmail')->setPaper('letter', 'landscape');
          $pdf = \PDF::loadView('management.certifiedCourse', compact('course', 'user', 'number'))->setPaper('letter', 'landscape');
          if ($request->view == 'true') {
            return $pdf->stream('certified'.$request->id_user.'.pdf');
          }
          return $pdf->download('certified'.$request->id_user.'.pdf');
        }
        abort(401, 'This action is inautorized');
      }
      abort(401, 'This action is inautorized');
    }

    public function addCertifieds(Request $request){

      if (auth()->user() == null) abort(401, 'This action is inautorized');
      if (!auth()->user()->authorizedRoles('admin')) abort(401, 'This action is inautorized');
      $course = Course::find($request->id_course);
      $students  = User::join('groups_users', 'users.id', '=', 'groups_users.id_users')->join('groups', 'groups_users.id_group', '=', 'groups.id')
      ->select('users.last_name',
               'users.dni',
               'users.name',
               'users.email',
               'users.phone',
               'users.adress',
               'users.neighborhood',
               'groups.status_group',
               'groups.name as nameGroup',
               'groups_users.status',
               'groups_users.id',
               'groups_users.url_certified')
      ->where('groups.id_course_parent', $request->id_course)
      ->orderBy('nameGroup')->get();


      return view('management.addCertifieds', compact('course', 'students'));

    }


    public function addCertified(Request $request){
      if ($request->ajax()) {
        // code...

        $name='';
        if($request->hasFile('file')){
          $file = $request->file('file');
          $name = '/certifieds/'.time().$file->getClientOriginalName();
          $file->move(public_path().'/certifieds/',$name);
        }


        $affected = DB::table('groups_users')
              ->where('id', $request->id)
              ->update(['url_certified' => $name]);

        $students  = User::join('groups_users', 'users.id', '=', 'groups_users.id_users')->join('groups', 'groups_users.id_group', '=', 'groups.id')
              ->select('users.last_name',
              'users.dni',
              'users.name',
              'users.email',
              'users.phone',
              'users.adress',
              'users.neighborhood',
              'groups.status_group',
              'groups.name as nameGroup',
              'groups_users.status',
              'groups_users.id',
              'groups_users.url_certified')
              ->where('groups.id_course_parent', $request->id_course)
              ->orderBy('nameGroup')->get();

        $msj = 'El certificado se ha cargado exitosamente';

        return response()->json([
            'msj' => $msj,
            'students' => $students
        ],200);
      }

    }

    public function addSchedule(Request $request){
      if ($request->ajax()) {
        $fecha_hoy = date("Y-m-d H:i:s");
        $id_group = DB::table('schedule')->insert(
          [ 'day' => $request->day,
            'hour_start' => $request->hourStart,
            'hour_end' => $request->hourEnd,
            'id_group' => $request->id_group,
            'created_at' => $fecha_hoy,
            'updated_at' => $fecha_hoy
          ]
        );
        $schedulesGroup = DB::table('schedule')->select('id',
                                                        'day',
                                                        DB::raw("DATE_FORMAT(hour_start,' %H:%i') as hour_start"),
                                                        DB::raw("DATE_FORMAT(hour_end,' %H:%i') as hour_end"),
                                                        )->where('id_group', '=', $request->id_group)->orderBy('created_at', 'asc')->get();
        return response()->json([
          'schedulesGroup' => $schedulesGroup
        ],200);
      }
    }

    public function deleteSchedule(Request $request){
      if ($request->ajax()) {
        DB::table('schedule')->where('id', '=', $request->id_schedule)->delete();
        $schedulesGroup = DB::table('schedule')->select('id',
                                                        'day',
                                                        DB::raw("DATE_FORMAT(hour_start,' %H:%i') as hour_start"),
                                                        DB::raw("DATE_FORMAT(hour_end,' %H:%i') as hour_end"),
                                                        )->where('id_group', '=', $request->id_group)->orderBy('created_at', 'asc')->get();
        return response()->json([
          'schedulesGroup' => $schedulesGroup
        ],200);
      }
    }

    public function searchCourse(Request $request){
      if ($request->ajax()) {
        $course = Course::find($request->id_course);
        return response()->json([
          'course' => $course
        ],200);
      }
    }

    public function saveChangesCertified(Request $request){
      if ($request->ajax()) {
        $msj = 'Los datos se han guardado satisfactoriamente';
        $name='';
        if($request->hasFile('certified_file')){
          $file = $request->file('certified_file');
          $name =time().$file->getClientOriginalName();
          $file->move(public_path().'/images/certifieds/',$name);
        }
        $url_current = url()->current();
        if (str_contains($url_current, 'https://')) {
            $url_current = substr ( $url_current , 8 , strlen($url_current)-1);
        }else {
          $url_current = substr ( $url_current , 7 , strlen($url_current)-1);
        }
        $url = substr ( $url_current , 0 , strlen($url_current)-20);
        $course = Course::find($request->id);
        $course->certified_title = $this->validarString($request->certified_title);
        $course->certified_header = $this->validarString($request->certified_header);
        $course->certified_name_people1 = $this->validarString($request->certified_name_people1);
        $course->certified_name_people2 = $this->validarString($request->certified_name_people2);
        $course->certified_name_people3 = $this->validarString($request->certified_name_people3);
        $course->certified_name_people4 = $this->validarString($request->certified_name_people4);
        $course->certified_name_people5 = $this->validarString($request->certified_name_people5);
        $course->certified_name_people6 = $this->validarString($request->certified_name_people6);
        $course->certified_position_people1 = $this->validarString($request->certified_position_people1);
        $course->certified_position_people2 = $this->validarString($request->certified_position_people2);
        $course->certified_position_people3 = $this->validarString($request->certified_position_people3);
        $course->certified_position_people4 = $this->validarString($request->certified_position_people4);
        $course->certified_position_people5 = $this->validarString($request->certified_position_people5);
        $course->certified_position_people6 = $this->validarString($request->certified_position_people6);
        if ($name !== '' && $name !== null) {
          $course->certified_image = $url.'images/certifieds/'.$name;
        }
        $course->Save();
        return response()->json([
          'msj' => $msj
        ],200);
      }
    }

    public function getDataAddBeneficiarie(Request $request){
      if ($request->ajax()) {
        $course = Course::find($request->id_course);
        $groups = DB::table('groups')->select('groups.id',
                                              'groups.name as nameGroup',
                                              'groups.quota',
                                              'groups.schedule',
                                              'groups.place',
                                              'groups.status_group',
        )->where('groups.id_course_parent', '=', $request->id_course)->get();
        $users = User::select('users.id', 'users.dni', 'users.name', 'users.last_name', 'users.email', 'users.phone', 'roles.description', 'role_user.status')
              ->join('role_user', 'users.id', '=', 'role_user.user_id')
              ->join('roles', 'roles.id', '=', 'role_user.role_id' )
              ->where('roles.name', '=', 'beneficiaria')
              ->orderBy('users.id', 'ASC')->get();

        return response()->json([
          'course' => $course,
          'groups' => $groups,
          'users' => $users


        ],200);
      }


    }




}
