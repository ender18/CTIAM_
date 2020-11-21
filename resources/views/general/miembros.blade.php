@extends('layouts.app')

@section('title')
  <title>Miembros - CTIAM</title>

@endsection

@section('content')

<members-component :members = "{{$members}}" ></members-component>


@endsection
