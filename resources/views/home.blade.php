@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex align-items-center text-center">
        <h2 class="">Bienvenid@, {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h2>
      </div>

      {{-- Vista de Beneficiaria --}}

      @if (!Auth::user()->authorizedRoles('beneficiaria') && !Auth::user()->authorizedRoles('aliado') && !Auth::user()->authorizedRoles('admin') && !Auth::user()->authorizedRoles('tutor'))
        <div class="col-12">
          <hr>
          <br>
        </div>
        <div class="col-12 d-flex align-items-center">
          <h4 class=""><strong>Su cuenta se encuentra desactivada o no posee ningun rol, por favor comuníquese con el administrador.</strong></h4>
        </div>
      @endif


      @if ( Auth::user()->authorizedRoles('beneficiaria'))
      <div class="col-12">
          <hr>
        </div>
      <div class="col-12 d-flex align-items-center">
        <h4 class="">Panel Beneficiaria</h4>
      </div>
      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/showEvents"><img class="card-img-top img-fluid" src="{{URL('/images/courses.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Actividades de formación disponibles </h5>
            <p class="card-text">Aqui puedes los ver los cursos, talleres, capacitaciones disponibles para ti</p>
            <a href="/showEvents" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/myEvents"><img class="card-img-top img-fluid" src="{{URL('/images/my_courses.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Mis Actividades de formación </h5>
            <p class="card-text">Mira el estado de las actividades de formación en las que me he inscrito</p>
            <a href="/myEvents" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>
      {{-- <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/manageUsers/editInformation"><img class="card-img-top img-fluid" src="{{URL('/images/settings.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Editar información de cuenta </h5>
            <p class="card-text">Actializa los datos de tu cuenta</p>
            <a href="/manageUsers/editInformation" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div> --}}
      @endif

      {{-- Vista de Alidado --}}
      @if ( Auth::user()->authorizedRoles('tutor'))
      <div class="col-12">
        <hr>
      </div>
      <div class="col-12 d-flex align-items-center">
        <h4 class="">Panel Tutor</h4>
      </div>
      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/myEventsAliado"><img class="card-img-top img-fluid" src="{{URL('/images/manage_courses.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Mis Actividades de Formación</h5>
            <p class="card-text">Encuentra las actividades asignadas</p>
            <a href="/myEventsAliado" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>
    @endif

    @if ( Auth::user()->authorizedRoles('aliado'))
    <div class="col-12">
      <hr>
    </div>
    <div class="col-12 d-flex align-items-center">
      <h4 class="">Panel Alidado</h4>
    </div>
    <div class="col-6 col-lg-3 mt-2">
      <div class="card">
        <a href="/myEventsAlly"><img class="card-img-top img-fluid" src="{{URL('/images/statistics.png')}}" alt=""></a>
        <div class="card-body text-center">
          <h5 class="card-tittle">Mis Actividades</h5>
          <p class="card-text">Encuentra estadísticas de mis actividades de formación</p>
          <a href="/myEventsAlly" class="btn btn-primary">Ingresa</a>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3 mt-2">
      <div class="card">
        <a href="/myBeneficiaryAlly"><img class="card-img-top img-fluid" src="{{URL('/images/beneficiaries.png')}}" alt=""></a>
        <div class="card-body text-center">
          <h5 class="card-tittle">Mis Usuarios</h5>
          <p class="card-text">Encuentra información de tus beneficiarias y tutores</p>
          <a href="/myBeneficiaryAlly" class="btn btn-primary">Ingresa</a>
        </div>
      </div>
    </div>

  @endif

      {{-- Vista de Administrador --}}
      @if ( Auth::user()->authorizedRoles('admin'))



      <div class="col-12">
        <hr>
      </div>
      <div class="col-12 d-flex align-items-center">
        <h4 class="">Panel Administrador</h4>
      </div>

      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/manageEvents"><img class="card-img-top img-fluid" src="{{URL('/images/manage_courses.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Gestionar Actividades de Formación</h5>
            <p class="card-text">Agrega, edita y elimina</p>
            <a href="/manageEvents" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/manageContent"><img class="card-img-top img-fluid" src="{{URL('/images/settings.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Gestión de contenido</h5>
            <p class="card-text">Administra el contenido del sitio</p>
            <a href="/manageContent" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/manage_focus"><img class="card-img-top img-fluid" src="{{URL('/images/manage_focus.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Gestión de Focos</h5>
            <p class="card-text">Administra la clasificación de focos</p>
            <a href="/manage_focus" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/manageUsers"><img class="card-img-top img-fluid" src="{{URL('/images/manage_users.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Administrar Usuarios</h5>
            <p class="card-text">Asigna roles, activa y desactiva usuarios</p>
            <a href="/manageUsers" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/statisticsInfo"><img class="card-img-top img-fluid" src="{{URL('/images/statistics.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Estadísticas</h5>
            <p class="card-text">Accede al mapa de beneficiarias, cantidad de cursos...</p>
            <a href="/statisticsInfo" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>
    @endif

      {{-- Vista de Super Administrador --}}
      @if ( Auth::user()->authorizedRoles('superadmin'))
      <div class="col-12">
        <hr>
      </div>
      <div class="col-12 d-flex align-items-center">
        <h4 class="">Panel Super Administrador </h4>
      </div>
      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/myStores?ver=1"><img class="card-img-top img-fluid" src="{{URL('/images/registry.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Control de visitantes </h5>
            <p class="card-text">Lleva el control de las personas que ingresan</p>
            <a href="/myStores?ver=1" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3 mt-2">
        <div class="card">
          <a href="/myStores?ver=1"><img class="card-img-top img-fluid" src="{{URL('/images/registry.png')}}" alt=""></a>
          <div class="card-body text-center">
            <h5 class="card-tittle">Control de visitantes </h5>
            <p class="card-text">Lleva el control de las personas que ingresan</p>
            <a href="/myStores?ver=1" class="btn btn-primary">Ingresa</a>
          </div>
        </div>
      </div>
      @endif





    </div>

  </div>

@endsection
