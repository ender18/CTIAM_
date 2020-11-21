@extends('layouts.app')

@section('title')
  <title>Fundadoras - CTIAM</title>

@endsection

@section('content')


<founders-component :founders="{{$founders}}" :video_haz_parte="{{$video_haz_parte}}"></founders-component>


@endsection
