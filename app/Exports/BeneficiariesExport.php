<?php

namespace App\Exports;
use DB;
use App\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class BeneficiariesExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public $id;

    public function __construct($id_course)
    {
         $this->id = $id_course;
    }


    public function collection()
    {

      if ($this->id == null) {
        $result = DB::table('users')->select('users.type_dni',
        'users.dni',
        'users.name',
        'users.last_name',
        'users.email',
        'users.phone',
        'users.adress',
        'users.neighborhood',
        'users.commune',
        'users.birthdate',
        'users.dni as dniAlly',
        'users2.name as nameAlly',
        'users2.last_name as lastNameAlly',
        'users.civil_status',
        DB::raw("IF(users.has_children = 1,'Si', 'No')"),
        'users.level_study',
        'users.last_study',
        'users.degree',
        DB::raw("IF(users.study_actually = 1,'Si', 'No')"),
        'users.what_studies',
        DB::raw("IF(users.work_actually = 1,'Si', 'No')"),
        'users.laboral_sector',
        DB::raw("IF(users.bussiness_owner = 1,'Si', 'No')"),
        'users.way_working',
        'users.type_company',
        'users.time_not_to_work',
        'groups.name as nameGroup',
        'groups.schedule',
        'groups.place',
        'groups.status_group',
        'groups_users.status',
        'courses.title')
        ->join('groups_users', 'groups_users.id_users', '=', 'users.id')
        ->join('groups', 'groups.id', '=', 'groups_users.id_group')
        ->join('users as users2', 'users2.id', '=', 'users.id')
        ->join('courses', 'courses.id', '=', 'groups.id_course_parent')
        ->get();


      }else{

        $result = DB::table('users')->select('users.type_dni',
        'users.dni',
        'users.name',
        'users.last_name',
        'users.email',
        'users.phone',
        'users.adress',
        'users.neighborhood',
        'users.commune',
        'users.birthdate',
        'users.dni as dniAlly',
        'users2.name as nameAlly',
        'users2.last_name as lastNameAlly',
        'users.civil_status',
        DB::raw("IF(users.has_children = 1,'Si', 'No')"),
        'users.level_study',
        'users.last_study',
        'users.degree',
        DB::raw("IF(users.study_actually = 1,'Si', 'No')"),
        'users.what_studies',
        DB::raw("IF(users.work_actually = 1,'Si', 'No')"),
        'users.laboral_sector',
        DB::raw("IF(users.bussiness_owner = 1,'Si', 'No')"),
        'users.way_working',
        'users.type_company',
        'users.time_not_to_work',
        'groups.name as nameGroup',
        'groups.schedule',
        'groups.place',
        'groups.status_group',
        'groups_users.status',
        'courses.title')
        ->join('groups_users', 'groups_users.id_users', '=', 'users.id')
        ->join('groups', 'groups.id', '=', 'groups_users.id_group')
        ->join('users as users2', 'users2.id', '=', 'users.id')
        ->join('courses', 'courses.id', '=', 'groups.id_course_parent')
        ->where('groups.id_course_parent', '=', $this->id)
        ->get();

      }

        return $result;
    }


    public function headings(): array
    {
        return [
          'Identificacion',
          '# identificacion',
          'Nombres',
          'Apellidos',
          'E-mail',
          'Telefono',
          'Direccion',
          'Barrio',
          'Comuna',
          'Fecha nacimiento',
          'Id Aliado',
          'Nombre Aliado',
          'Apellido Aliado',
          'Estado civil',
          'Tiene hijos',
          'Nivel de estudio',
          'Ultimo estudio',
          'Titulo',
          'Estudia actualmente',
          'Que estudia',
          'Trabaja',
          'Sector de trabajo',
          'Propietaria negocio',
          'Tipo de trabajo',
          'Tipo de empresa',
          'Tiempo sin trabajar',
          'Grupo',
          'Horario',
          'Lugar',
          'Estado Grupo',
          'Estado Beneficiaria',
          'Actividad de formacion'
        ];
    }


    public function title(): string
    {
        return 'Beneficiarias';
    }

}
