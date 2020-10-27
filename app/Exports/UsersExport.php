<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsersExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public $id;

    public function __construct($id_course)
    {
         $this->id = $id_course;
    }



    public function sheets(): array
    {
        $sheets = [];
        $sheets[] = new BeneficiariesExport($this->id);
        $sheets[] = new GroupsExport($this->id);
        $sheets[] = new CourseExport($this->id);
        return $sheets;
    }

}
