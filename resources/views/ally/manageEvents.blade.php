@extends('layouts.app')

@section('title')
  <title>Gestión de Actividades</title>

@endsection

@section('content')

<eventsmanagement-component :focos="{{$focos}}" :courses="{{$courses}}" :aliados="{{$aliados}}" :tutores="{{$tutores}}"></eventsmanagement-component>

@endsection
