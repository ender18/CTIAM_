
@extends('layouts.app')


@section('cssandjs')



@endsection

@section('title')
  <title>Mapa de beneficiarias</title>
@endsection

@section('content')

    <vue-google-heatmap :beneficiarias="{{$beneficiarias}}" :aliados="{{$aliados}}"></vue-google-heatmap>

@endsection
