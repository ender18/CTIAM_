@extends('layouts.app')

@section('title')
  <title>Error 500</title>
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
        <h1 class="display-4"><strong>¡Error 500, Error de servidor!</strong></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12  text-center pt-1 pb-5">
        <h1 >Lo sentimos, ocurrió un error con nuestro servidor. Intenta de nuevo.</h1>
      </div>
    </div>

  </div>


@endsection
