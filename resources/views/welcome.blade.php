@extends('layouts.app')

@section('title')
  <title>Inicio - CTIAM</title>
@endsection

@section('content')

  <welcome-component

  :sliders="{{$sliders}}"
  :quienes_somos="{{$quienes_somos}}"
  :que_hacemos="{{$que_hacemos}}"
  :proyectos_realizados= "{{$proyectos_realizados}}"



  ></welcome-component>

@endsection
