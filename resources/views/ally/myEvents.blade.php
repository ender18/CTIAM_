@extends('layouts.app')

@section('title')
  <title>Mis actividades de formación asignadas</title>

@endsection

@section('content')

<my-events-component :courses="{{$courses}}"></my-events-component>

@endsection
