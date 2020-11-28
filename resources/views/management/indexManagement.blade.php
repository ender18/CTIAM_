@extends('layouts.app')

@section('title')
  <title>Administrar contenidos</title>
@endsection

@section('content')

<indexmanagement-component :contents="{{$content}}"></indexmanagement-component>

@endsection
