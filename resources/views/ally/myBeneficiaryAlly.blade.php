
@extends('layouts.app')

@section('title')
  <title>Mis usuarios</title>

@endsection

@section('content')

<my-beneficiary-ally-component :cantidad_cursos="{{$cantidad_cursos}}"
                               :beneficiaries="{{$beneficiaries}}"
                               :cantidad_cursos_a_cargo="{{$cantidad_cursos_a_cargo}}"
                               ></my-beneficiary-ally-component>

@endsection
