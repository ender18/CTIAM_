
@extends('layouts.app')

@section('content')
  <show-events-component :events_with_preferences="{{$events_with_preferences}}" :events_without_preferences="{{$events_without_preferences}}"
    
  ></show-events-component>

@endsection
