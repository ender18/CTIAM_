
@extends('layouts.app')

@section('title')
  <title>Mis Actividades de formación</title>

@endsection


@section('content')
  <show-my-events-component :my_courses="{{$my_courses}}"></show-my-events-component>

@endsection
