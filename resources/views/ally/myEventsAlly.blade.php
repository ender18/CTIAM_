
@extends('layouts.app')

@section('title')
  <title>Mis actividades de formación</title>

@endsection

@section('content')

<my-events-ally-component :my_courses="{{$my_courses}}" :my_groups="{{$my_groups}}" :my_beneficiaries="{{$my_beneficiaries}}"></my-events-ally-component>

@endsection
