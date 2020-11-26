@extends('layouts.app')

@section('title')
  <title>Error 401</title>
@endsection
@section('content')
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-6">
        <img src="/images/error_page.png" alt="" class="img img-fluid">
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center pt-5 pb-5">
        <h1 class="display-4"><strong>¡Error 401, Acceso no autorizado!</strong></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12  text-center pt-1 pb-5">
        <h1 >Lo sentimos, tal véz no has iniciado sesión o no tienes el rol para acceder a este módulo.</h1>

      </div>
    </div>

  </div>


@endsection
