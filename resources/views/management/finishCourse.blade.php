@extends('layouts.app')

@section('content')

  <finish-course-component  :curso="{{$curso}}" :students="{{$students}}" :focos_string="'{{$focos_string}}'" :id="{{$id_course}}" :id_group="{{$id_group}}"></finish-course-component>

@endsection
