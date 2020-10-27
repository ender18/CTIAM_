<?php

namespace App\Exports;
use DB;
use App\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CourseExport implements FromCollection, WithHeadings, WithTitle
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
        $result = DB::table('courses')->select('courses.type',
        'courses.title',
        'courses.description',
        'courses.duration',
        'courses.duration_type',
        'courses.fecha_inicio',
        'courses.fecha_fin',
        'courses.fecha_inicio_inscription',
        'courses.fecha_fin_inscription',
        'courses.cost',
        'courses.status',
        'users.name as nameOwner',
        'users.last_name as last_name_Owner'
        )
        ->join('users', 'users.id', '=', 'courses.id_owner')
        ->get();

      }else{
        $result = DB::table('courses')->select('courses.type',
        'courses.title',
        'courses.description',
        'courses.duration',
        'courses.duration_type',
        'courses.fecha_inicio',
        'courses.fecha_fin',
        'courses.fecha_inicio_inscription',
        'courses.fecha_fin_inscription',
        'courses.cost',
        'courses.status',
        'users.name as nameOwner',
        'users.last_name as last_name_Owner'
        )
        ->join('users', 'users.id', '=', 'courses.id_owner')
        ->where('courses.id', '=', $this->id)
        ->get();

      }


        return $result;
    }


    public function headings(): array
    {
        return [
          'Tipo',
          'Titulo',
          'Descripcion',
          'Duracion',
          'Tipo duracion',
          'Fecha inicio',
          'Fecha fin',
          'Fecha inicio inscripcion',
          'Fecha fin inscripcion',
          'Costo',
          'Estado',
          'Nombre Aliado',
          'Apellido Aliado'

        ];
    }


    public function title(): string
    {
        return 'Curso';
    }

}
