@extends('layouts.app')

@section('title')
  <title>Administración de focos</title>
@endsection

@section('content')

  <focusmanagement-component :focos="{{$focos}}"></focusmanagement-component>

@endsection
