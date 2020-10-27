@extends('layouts.app')

@section('content')

  <manage-users-component :usuarios="{{$usuarios}}"></manage-users-component>

@endsection
