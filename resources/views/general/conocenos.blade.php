@extends('layouts.app')

@section('title')
  <title>Conócenos - CTIAM</title>

@endsection

@section('content')

  <aboutus-component
    :mision="{{$mision}}"     :vision="{{$vision}}"     :obj_general="{{$obj_general}}"     :obj_especifico = "{{$obj_especifico}}"  :marco_normativo = "{{$marco_normativo}}" :img_obj_especifico="{{$img_obj_especifico}}"></aboutus-component>


@endsection
