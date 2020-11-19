
@extends('layouts.app')

@section('content')

<my-beneficiary-ally-component :cantidad_cursos="{{$cantidad_cursos}}"
                               :beneficiaries="{{$beneficiaries}}"
                               :cantidad_cursos_a_cargo="{{$cantidad_cursos_a_cargo}}"
                               ></my-beneficiary-ally-component>

@endsection
