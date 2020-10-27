@extends('layouts.app')

@section('content')

<eventsmanagement-component :focos="{{$focos}}" :courses="{{$courses}}" :aliados="{{$aliados}}" :tutores="{{$tutores}}"></eventsmanagement-component>

@endsection
