
@extends('layouts.app')

@section('content')
  <show-my-events-component :my_courses="{{$my_courses}}"></show-my-events-component>

@endsection
