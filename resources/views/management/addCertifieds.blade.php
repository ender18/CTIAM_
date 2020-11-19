
@extends('layouts.app')

@section('content')

  <add-certifieds-component :course="{{$course}}" :students="{{$students}}"></add-certifieds-component>

@endsection
