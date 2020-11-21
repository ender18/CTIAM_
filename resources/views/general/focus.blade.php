@extends('layouts.app')

@section('title')
  <title>Focos - CTIAM</title>

@endsection

@section('content')

<focus-component :focus1="{{$focus}}"></focus-component>


@endsection
