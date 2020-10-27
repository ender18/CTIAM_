
@extends('layouts.app')

@section('content')

<my-events-ally-component :my_courses="{{$my_courses}}" :my_groups="{{$my_groups}}" :my_beneficiaries="{{$my_beneficiaries}}"></my-events-ally-component>

@endsection
