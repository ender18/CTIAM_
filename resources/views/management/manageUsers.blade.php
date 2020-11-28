@extends('layouts.app')

@section('title')
  <title>Administración de usuarios</title>
@endsection

@section('content')

  <manage-users-component :usuarios="{{$usuarios}}"></manage-users-component>

@endsection
