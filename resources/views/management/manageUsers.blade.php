@extends('layouts.app')

@section('title')
  <title>Administración de usuarios</title>
@endsection

@section('content')

  <manage-users-component v-bind:usuarios="{{$usuarios}}" v-bind:superadmin="{{$superadmin}}"></manage-users-component>

@endsection
