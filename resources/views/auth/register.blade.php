@extends('layouts.app')

@section('title')
  <title>Registro - CTIAM</title>

@endsection

@section('content')
  <register-component :aliados="{{$aliados}}"></register-component>

@endsection
