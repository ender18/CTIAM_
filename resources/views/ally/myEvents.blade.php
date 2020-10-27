@extends('layouts.app')

@section('content')

<my-events-component :courses="{{$courses}}"></my-events-component>

@endsection
