<?php

namespace App\Exports;
use DB;
use App\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class GroupsExport implements FromCollection, WithHeadings, WithTitle
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
        $result = DB::table('groups')->select('name',
        'quota',
        'place',
        'status_group',
        'courses.title')
        ->join('courses', 'courses.id', '=', 'groups.id_course_parent')
        ->get();
      }else{

        $result = DB::table('groups')->select('name',
        'quota',
        'place',
        'status_group',
        'courses.title')
        ->join('courses', 'courses.id', '=', 'groups.id_course_parent')
        ->where('groups.id_course_parent', '=', $this->id)
        ->get();
      }

        return $result;
    }


    public function headings(): array
    {
        return [
          'Nombre',
          'Cupo',
          'Lugar',
          'Estado'
        ];
    }


    public function title(): string
    {
        return 'Grupos';
    }

}
