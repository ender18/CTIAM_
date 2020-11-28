
@extends('layouts.app')

@section('title')
  <title>Administración de certificados</title>
@endsection

@section('content')

  <add-certifieds-component :course="{{$course}}" :students="{{$students}}"></add-certifieds-component>

@endsection
