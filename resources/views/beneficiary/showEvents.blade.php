
@extends('layouts.app')

@section('title')
  <title>Actividades de formación</title>

@endsection

@section('content')
  <show-events-component :events_with_preferences="{{$events_with_preferences}}" :events_without_preferences="{{$events_without_preferences}}"

  ></show-events-component>

@endsection
