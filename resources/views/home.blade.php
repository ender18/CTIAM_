@extends('layouts.app')

@section('title')

<title>Bienvenido, {{ Auth::user()->name }}</title>
@endsection

@section('content')
  <div class="container">
    <div class="row pt-4">
      <div class="col-12 d-flex align-items-center text-center">
        <h2 class=""><strong>Bienvenid@, {{ Auth::user()->name }} {{ Auth::user()->last_name }}</strong></h2>
      </div>
      <div class="col-12">
        <hr class="hr-pink-left">
      </div>
    </div>

      {{-- Vista de Beneficiaria --}}
      @if (!Auth::user()->authorizedRoles('beneficiaria') && !Auth::user()->authorizedRoles('aliado') && !Auth::user()->authorizedRoles('admin') && !Auth::user()->authorizedRoles('tutor'))
      <div class="row">
          <div class="col-12 d-flex align-items-center pt-5 pb-5">
            <h4 class=""><strong>Su cuenta se encuentra desactivada o no posee ningun rol, por favor comuníquese con el administrador.</strong></h4>
          </div>
      </div>
      @endif

      @if ( Auth::user()->authorizedRoles('beneficiaria'))
      <div class="row">
        <div class="col-12 d-flex align-items-center">
          <h3 class=""><strong>Panel Beneficiaria</strong></h3>
        </div>
      </div>
      @endif

      @if ( Auth::user()->authorizedRoles('beneficiaria'))
      <div class="row pb-4">
        <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch">
          <div class="card border-0 shadow card-img-top">
            <div class="container">
              <div class="row text-center pt-5 pb-4 d-flex align-items-center">
                <div class="col-12">
                  <a href="/showEvents"><i class="fas fa-book fa-5x color-pink"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-tittle">Actividades de formación disponibles </h5>
              <p class="card-text d-none d-lg-block">Aqui puedes los ver los cursos, talleres, capacitaciones disponibles para ti</p>
              <a href="/showEvents" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch">
          <div class="card border-0 shadow">
            <div class="container">
              <div class="row text-center pt-5 pb-4 d-flex align-items-center">
                <div class="col-12">
                  <a href="/myEvents"><i class="fas fa-brain fa-5x color-pink"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-tittle">Mis Actividades de formación </h5>
              <p class="card-text d-none d-lg-block">Mira el estado de las actividades de formación en las que me he inscrito</p>
              <a href="/myEvents" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
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
       </div>
      @endif
      {{-- Fin Vista Beneficiaria --}}

      {{-- Vista de Tutor --}}
      @if ( Auth::user()->authorizedRoles('tutor'))
      <div class="row">
        <div class="col-12 d-flex align-items-center">
          <h3 class=""><strong>Panel Tutor</strong></h3>
        </div>
        <div class="">
          <hr class="hr-pink-left">
        </div>
      </div>
      @endif
      @if ( Auth::user()->authorizedRoles('tutor'))
      <div class="row d-flex justify-content-center justify-content-lg-start  pb-4">
        <div class="col-6 col-lg-3 mt-2 d-flex align-items-stretch">
          <div class="card border-0 shadow">
            <div class="container">
              <div class="row text-center pt-5 pb-4 d-flex align-items-center">
                <div class="col-12">
                  <a href="/myEventsAliado"><i class="fas fa-calendar-alt fa-5x color-pink"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-tittle">Mis Actividades de Formación</h5>
              <p class="card-text  d-none d-lg-block">Encuentra las actividades asignadas</p>
              <a href="/myEventsAliado" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
            </div>
          </div>
        </div>
      </div>
    @endif
    {{-- Fin vista del Tutor --}}

    {{-- Inicio Vista Aliado --}}
    @if ( Auth::user()->authorizedRoles('aliado'))
    <div class="row">
      <div class="col-12 d-flex align-items-center">
        <h3 class=""><strong>Panel Aliado</strong></h3>
      </div>
      <div class="">
        <hr class="hr-pink-left">
      </div>
    </div>
    @endif

    @if ( Auth::user()->authorizedRoles('aliado'))
      <div class="row  pb-4">
      <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch">
        <div class="card border-0 shadow card-img-top">
          <div class="container">
            <div class="row text-center pt-5 pb-4 d-flex align-items-center">
              <div class="col-12">
                <a href="/myEventsAlly"><i class="fas fa-book fa-5x color-pink"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <h5 class="card-tittle">Mis Actividades</h5>
            <p class="card-text d-none d-lg-block">Encuentra estadísticas de mis actividades de formación</p>
            <a href="/myEventsAlly" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch">
        <div class="card border-0 shadow">
          <div class="container">
            <div class="row text-center pt-5 pb-4 d-flex align-items-center">
              <div class="col-12">
                <a href="/myBeneficiaryAlly"><i class="fas fa-users fa-5x color-pink"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <h5 class="card-tittle">&nbsp Mis  Usuarios &nbsp  &nbsp</h5>
            <p class="card-text d-none d-lg-block">Encuentra información de tus beneficiarias y tutores</p>
            <a href="/myBeneficiaryAlly" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
          </div>
        </div>
      </div>
    </div>
  @endif
  {{-- Fin Vista aliado --}}

      {{-- Vista de Administrador --}}


      @if ( Auth::user()->authorizedRoles('admin'))
      <div class="row ">
        <div class="col-12 d-flex align-items-center">
          <h3 class=""><strong>Panel Administrador</strong></h3>
        </div>
        <div class="">
          <hr class="hr-pink-left">
        </div>
      </div>
      @endif
      @if ( Auth::user()->authorizedRoles('admin'))
      <div class="row  pb-4">

        <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch">
          <div class="card border-0 shadow">
            <div class="container">
              <div class="row text-center pt-5 pb-4 d-flex align-items-center">
                <div class="col-12">
                  <a href="/manageEvents"><i class="fas fa-book fa-5x color-pink"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-tittle">Administrar Actividades de Formación</h5>
              <p class="card-text d-none d-lg-block">Agrega, edita y elimina</p>
              <a href="/manageEvents" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch">
          <div class="card border-0 shadow">
            <div class="container">
              <div class="row text-center pt-5 pb-4 d-flex align-items-center">
                <div class="col-12">
                  <a href="/manageContent"><i class="fas fa-cogs fa-5x color-pink"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-tittle">Gestión de contenido</h5>
              <p class="card-text d-none d-lg-block">Administra el contenido del sitio</p>
              <a href="/manageContent" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch">
          <div class="card border-0 shadow">
            <div class="container">
              <div class="row text-center pt-5 pb-4 d-flex align-items-center">
                <div class="col-12">
                  <a href="/manage_focus"><i class="fas fa-bullseye fa-5x color-pink"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-tittle">Gestión de focos</h5>
              <p class="card-text d-none d-lg-block">Administra la clasificación de focos</p>
              <a href="/manage_focus" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch">
          <div class="card border-0 shadow">
            <div class="container">
              <div class="row text-center pt-5 pb-4 d-flex align-items-center">
                <div class="col-12">
                  <a href="/manageUsers"><i class="fas fa-users-cog fa-5x color-pink"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-tittle">Administrar usuarios</h5>
              <p class="card-text d-none d-lg-block">Asigna roles, activa y desactiva usuarios</p>
              <a href="/manageUsers" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch">
          <div class="card border-0 shadow">
            <div class="container">
              <div class="row text-center pt-5 pb-4 d-flex align-items-center">
                <div class="col-12">
                  <a href="/statisticsInfo"><i class="fas fa-map-marked fa-5x color-pink"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-tittle"> Mapa de beneficiarias</h5>
              <p class="card-text d-none d-lg-block">Accede al mapa de beneficiarias por comunas</p>
              <a href="/statisticsInfo" class="btn btn-primary border-round"><i class="fas fa-sign-in-alt"></i></a>
            </div>
          </div>
        </div>
      </div>
    @endif

      {{-- Vista de Super Administrador --}}
      {{-- @if ( Auth::user()->authorizedRoles('superadmin'))
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





    </div> --}}

  </div>

@endsection
