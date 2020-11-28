<template >


  <div class="container pb-3">
        <!-- General title -->
        <div class="row pt-4">
          <div class="col-12 text-center">
            <h2> <strong>Administrar contenidos</strong> </h2>
          </div>
          <div class="col-12">
            <hr class="hr-pink-center">
          </div>
        </div>

        <div class="row pt-4">
          <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-navbar">
              <a class="navbar-brand" href="#"><strong>CTIAM</strong></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-auto align-items-center">
                  <li v-bind:class="'nav-item ' + class_home">
                    <a class="nav-link" v-on:click="views('view_home')" style="cursor: pointer;">Inicio </a>
                  </li>
                  <li v-bind:class="'nav-item ' + class_aboutus">
                    <a class="nav-link" v-on:click="views('view_aboutus')" style="cursor: pointer;">Conocenos</a>
                  </li>
                  <li v-bind:class="'nav-item ' + class_members">
                    <a class="nav-link" v-on:click="views('view_members')" style="cursor: pointer;">Nuestro Miembros</a>
                  </li>
                  <li v-bind:class="'nav-item ' + class_founders">
                    <a class="nav-link" v-on:click="views('view_founders')" style="cursor: pointer;">Fundadoras</a>
                  </li>
                  <li v-bind:class="'nav-item ' + class_footer">
                    <a class="nav-link" v-on:click="views('view_footer')" style="cursor: pointer;">Información general</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>

        <transition-group name="list-complete" tag="p" >
        <!-- Title slider element -->
        <span class="list-complete-item" v-show="view_home" key="view_home">
          <div class="row pt-4">
            <div class="col-10">
              <h4><strong>Sliders</strong></h4>
              <hr class="hr-pink-left">
            </div>
            <div class="col-2 text-right">
              <button class="btn btn-primary border-round" type="button" name="button" v-on:click="openModalContent(null, 'primary_slider', 'Titulo', 'Descripción', null, null, null, 'file')"><i class="fas fa-plus" ></i></button>
            </div>
          </div>
          <!-- Table sliders -->
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Título</th>
                      <th scope="col" class="d-none d-lg-block">Descripción</th>
                      <th scope="col">Imagen</th>
                      <th scope="col">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="contenido in contenidos" v-if="contenido.name == 'primary_slider'">
                      <th>{{contenido.content}}</th>
                      <td class="d-none d-lg-block">{{contenido.content1}}</td>
                      <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                      <td>
                        <button class="btn btn-white border-color-pink color-pink border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'primary_slider', 'Titulo', 'Descripción', null, null, null, 'file')"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <h4><strong>¿Quienes Somos?</strong></h4>
              <hr class="hr-pink-left">
            </div>
            <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'quienes_somos'">
              <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-3">
                  <img v-bind:src="contenido.file" alt="" class="img img-fluid">
                </div>
                <div class="col-10 col-lg-8">
                  <p>{{contenido.content}}</p>
                </div>
                <div class="col-2 col-lg-1">
                  <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'quienes_somos', 'Texto Quienes somos', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
                </div>
              </div>
            </div>
          </div>

          <div class="row pt-4">
            <div class="col-12">
              <h4><strong>¿Que hacemos en el programa?</strong></h4>
              <hr class="hr-pink-left">
            </div>
            <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'que_hacemos'">
              <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-3">
                  <img v-bind:src="contenido.file" alt="" class="img img-fluid">
                </div>
                <div class="col-10 col-lg-8">
                  <p>{{contenido.content}}</p>
                </div>
                <div class="col-2 col-lg-1">
                  <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'que_hacemos', 'Texto Que hacemos', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
                </div>
              </div>
            </div>
          </div>

          <div class="row pt-4">
            <div class="col-10">
              <h4><strong>Experiencias de proyectos realizados</strong></h4>
              <hr class="hr-pink-left">
            </div>
            <div class="col-2 text-right">
              <button class="btn btn-primary border-round" type="button" name="button" v-on:click="openModalContent(null, 'proyectos_realizados', 'Titulo del proyecto', 'Descripción', null, null, null, 'file')"><i class="fas fa-plus" ></i></button>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-hover" id="tableProjects">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Título</th>
                      <th scope="col" class="d-none d-lg-block">Descripción</th>
                      <th scope="col">Imagen</th>
                      <th scope="col">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="contenido in contenidos" v-if="contenido.name == 'proyectos_realizados'">
                      <th>{{contenido.content}}</th>
                      <td class="d-none d-lg-block">{{contenido.content1}}</td>
                      <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                      <td>
                        <button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'proyectos_realizados', 'Titulo del proyecto', 'Descripción', null, null, null, 'file')"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button> </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </span>

        <span class="list-complete-item" v-show="view_aboutus" key="view_aboutus">
          <div class="row pt-4">
            <div class="col-12">
              <h4><strong>Misión</strong></h4>
              <hr class="hr-pink-left">
            </div>
            <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'mision'">
              <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-3">
                  <img v-bind:src="contenido.file" alt="" class="img img-fluid">
                </div>
                <div class="col-10 col-lg-8">
                  <p>{{contenido.content}}</p>
                </div>
                <div class="col-2 col-lg-1">
                  <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'mision', 'Texto Misión', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
                </div>
              </div>
            </div>
          </div>

          <!-- Visión -->
          <div class="row pt-4">
            <div class="col-12">
              <h4><strong>Visión</strong></h4>
              <hr class="hr-pink-left">
            </div>
            <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'vision'">
              <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-3">
                  <img v-bind:src="contenido.file" alt="" class="img img-fluid">
                </div>
                <div class="col-10 col-lg-8">
                  <p>{{contenido.content}}</p>
                </div>
                <div class="col-2 col-lg-1">
                  <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'vision', 'Texto Visión', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
                </div>
              </div>
            </div>
          </div>

          <!-- Objetivo General -->
          <div class="row pt-4">
            <div class="col-12">
              <h4><strong>Objetivo general</strong></h4>
              <hr class="hr-pink-left">
            </div>
            <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'obj_general'">
              <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-3">
                  <img v-bind:src="contenido.file" alt="" class="img img-fluid">
                </div>
                <div class="col-10 col-lg-8">
                  <p>{{contenido.content}}</p>
                </div>
                <div class="col-2 col-lg-1">
                  <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'obj_general', 'Objetivo general', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
                </div>
              </div>
            </div>
          </div>

          <div class="row pt-4">
            <div class="col-10">
              <h4><strong>Obejtivos especificos</strong></h4>
              <hr class="hr-pink-left">
            </div>
            <div class="col-2 text-right">
              <button class="btn btn-primary border-round" type="button" name="button" v-on:click="openModalContent(null, 'obj_especifico', 'Objetivo Especifico', null, null, null, null, null)"><i class="fas fa-plus" ></i></button>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-lg-2">
              <div class="row"  v-for="contenido in contenidos" v-if="contenido.name == 'img_obj_especifico'">
                <div class="col-12">
                  <img  v-bind:src="contenido.file" alt="" class="img img-fluid">
                </div>
                <div class="col-12 text-center">
                  <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'img_obj_especifico', null, null, null, null, null, 'file')"> <i class="fas fa-pen"></i> </button>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-10 pt-4 pt-lg-0">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Objeticos especificos</th>
                      <th scope="col">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="contenido in contenidos" v-if="contenido.name == 'obj_especifico'">
                      <th>{{contenido.content}}</th>
                      <td><button class="btn btn-white border-color-pink color-pink border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'obj_especifico', 'Objetivo Especifico', null , null, null, null, null)"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Fin Objetivos especificos -->

          <!-- Marco Normativo y funcional -->
          <div class="row pt-4">
            <div class="col-10">
              <h4><strong>Marco Normativo</strong></h4>
              <hr class="hr-pink-left">
            </div>
            <div class="col-2 text-right">
              <button class="btn btn-primary border-round " type="button" name="button" v-on:click="openModalContent(null, 'marco_normativo', 'Titulo', null, null, null, null, 'file')"><i class="fas fa-plus" ></i></button>
            </div>

            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-hover" id="table_regulatory_framework">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Archivo</th>
                      <th scope="col">Título</th>
                      <th scope="col" class="text-rith">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="contenido in contenidos" v-if="contenido.name == 'marco_normativo'">
                      <td><a v-bind:href="contenido.file" download>
                        <i class="fas fa-download fa-2x"></i>
                      </a>
                    </td>
                    <th>
                      <a v-bind:href="contenido.file" download>
                        {{contenido.content}}
                      </a>
                    </th>
                    <td class="text-right">
                      <button class="btn btn-white border-color-pink color-pink border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'marco_normativo', 'Titulo ', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
                      <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </span>

            <!-- Mision -->
          <!-- Fin Marco Normativo y funcional -->

          <span class="list-complete-item" v-show="view_members" key="view_members">
            <div class="row pt-4">
              <div class="col-10">
                <h4><strong>Nuestros miembros</strong></h4>
                <hr class="hr-pink-left">
              </div>
              <div class="col-2 text-right">
                <button class="btn btn-secondary border-round " type="button" name="button" v-on:click="openModalContent(null, 'members', 'Nombre', 'Descripción', 'Sitio Web', 'Aportes', null, 'file')"><i class="fas fa-plus" ></i></button>
              </div>
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-hover" id="table_members">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Sitio web</th>
                        <th scope="col">Aportes</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="contenido in contenidos" v-if="contenido.name == 'members'">
                        <th>{{contenido.content}}</th>
                        <td>{{contenido.content1}}</td>
                        <td> <a v-bind:href="contenido.content2" target="_blank">{{contenido.content2}}</a></td>
                        <td>{{contenido.content3}}</td>
                        <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                        <td><button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'members', 'Nombre', 'Descripción', 'Sitio Web', 'Aportes', null, 'file')"><i class="fas fa-pen"></i></button>
                          <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </span>
          <!-- Miembros -->

          <span class="list-complete-item" v-show="view_founders" key="view_founders">
            <div class="row pt-4">
              <div class="col-10">
                <h4><strong>Nuestras Fundadoras</strong></h4>
                <hr class="hr-pink-left">
              </div>
              <div class="col-2 text-right">
                <button class="btn btn-secondary border-round " type="button" name="button" v-on:click="openModalContent(null, 'founder', 'Nombre', 'Descripción', 'Profesión', 'CV', null, 'file')"><i class="fas fa-plus" ></i></button>
              </div>
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-hover" id="table_founders">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">profesión</th>
                        <th scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="contenido in contenidos" v-if="contenido.name == 'founder'">
                        <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                        <th>{{contenido.content}}</th>
                        <td>{{contenido.content1}}</td>
                        <td>{{contenido.content2}}</td>
                        <td><button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'founder', 'Nombre', 'Descripción', 'Profesión', 'CV', null, 'file')"><i class="fas fa-pen"></i></button>
                          <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="row d-lg-flex justify-content-lg-center pt-4">
              <div class="col-12">
                <h4><strong>Video motivacional</strong></h4>
                <hr class="hr-pink-left">
              </div>
              <div class="col-12 col-lg-8" >
                <div class="row" v-for="contenido in contenidos" v-if="contenido.name == 'video_haz_parte'">
                  <div class="col-12 d-flex justify-content-center" style="height : 400px">
                    <iframe width="100%" height="100%" v-bind:src="'https://www.youtube.com/embed/'+ contenido.content " frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                  <div class="col-12 text-center pt-4">
                    <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'video_haz_parte', 'Copia y pega el ID del video de Youtube (Ej: https://www.youtube.com/watch?v=kVqztcxCF89 el id es kVqztcxCF89)', null, null, null, null, null)"><i class="fas fa-pen"></i> </button>
                  </div>
                </div>
              </div>
            </div>
          </span>

          <span class="list-complete-item" v-show="view_footer" key="view_footer">
            <div class="row pt-4">
              <div class="col-12">
                <h4><strong>Información general del sitio web</strong></h4>
                <hr class="hr-pink-left">
              </div>
              <div class="col-12" >
                <div class="row" v-for="contenido in contenidos" v-if="contenido.name == 'description_site'">
                  <div class="col-2">
                    <p><strong>Descripción:</strong></p>
                  </div>
                  <div class="col-8">
                    <p>{{contenido.content}}</p>
                  </div>
                  <div class="col-2">
                    <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'description_site', 'Descripción corta del sitio', null, null, null, null, null)"><i class="fas fa-pen"></i></button>
                  </div>
                </div>
                <div class="row" v-for="contenido in contenidos" v-if="contenido.name == 'phone'">
                  <div class="col-2">
                    <p><strong>Teléfono:</strong></p>
                  </div>
                  <div class="col-8">
                    <p>{{contenido.content}}</p>
                  </div>
                  <div class="col-2">
                    <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'phone', 'Teléfono', null, null, null, null, null)"><i class="fas fa-pen"></i></button>
                  </div>
                </div>
                <div class="row" v-for="contenido in contenidos" v-if="contenido.name == 'email'">
                  <div class="col-2">
                    <p><strong>Correo electrónico:</strong></p>
                  </div>
                  <div class="col-8">
                    <p>{{contenido.content}}</p>
                  </div>
                  <div class="col-2">
                    <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'email', 'Correo electrónico de contacto', null, null, null, null, null)"><i class="fas fa-pen"></i></button>
                  </div>
                </div>
                <div class="row" v-for="contenido in contenidos" v-if="contenido.name == 'twitter'">
                  <div class="col-2">
                    <p><strong>YouTube:</strong></p>
                  </div>
                  <div class="col-8">
                    <p>{{contenido.content}} - {{contenido.content1}}</p>
                  </div>
                  <div class="col-2">
                    <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'twitter', 'Twitter', 'URL', null, null, null, null)"><i class="fas fa-pen"></i></button>
                  </div>
                </div>
                <div class="row" v-for="contenido in contenidos" v-if="contenido.name == 'facebook'">
                  <div class="col-2">
                    <p><strong>Facebook:</strong></p>
                  </div>
                  <div class="col-8">
                    <p>{{contenido.content}} - {{contenido.content1}}</p>
                  </div>
                  <div class="col-2">
                    <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'facebook', 'Facebook', 'URL', null, null, null, null)"><i class="fas fa-pen"></i></button>
                  </div>
                </div>
                <div class="row" v-for="contenido in contenidos" v-if="contenido.name == 'instagram'">
                  <div class="col-2">
                    <p><strong>Instagram:</strong></p>
                  </div>
                  <div class="col-8">
                    <p>{{contenido.content}} - {{contenido.content1}}</p>
                  </div>
                  <div class="col-2">
                    <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(contenido.id, 'instagram', 'Instagram', 'URL', null, null, null, null)"><i class="fas fa-pen"></i></button>
                  </div>
                </div>
              </div>
              <!-- Fin de Fundadoras  -->
            </div>
          </span>
        </transition-group>


    <div class="modal fade" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header border-0">
            <div class="container">
              <div class="row">
                <div class="col-10 text-center">
                  <h5 class="modal-title"><strong>Editar / Agregar contenido</strong></h5>
                </div>
                <div class="col-2">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="col-12">
                  <hr class="hr-pink-center">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-body">
            <form class="" v-on:submit.prevent="addChangeContent">
              <div class="form-row">
                <div class="col-12 form-group" v-show="viewFileModal">
                  <img v-bind:src="imgMiniatura" alt="" class="img img-fluid">
                </div>
                <div class="col-12 form-group">
                  <label for="">{{contentModal}}</label>
                  <textarea class="form-control border-round" rows="3" v-model="content"></textarea>
                </div>
                <div class="col-12 form-group" v-show="viewContent1Modal">
                  <label for="">{{content1Modal}}</label>
                  <textarea class="form-control border-round" rows="5" v-model="content1"></textarea>
                </div>
                <div class="col-12 form-group" v-show="viewContent2Modal">
                  <label for="">{{content2Modal}}</label>
                  <textarea class="form-control border-round" rows="3" v-model="content2"></textarea>
                </div>
                <div class="col-12 form-group" v-show="viewContent3Modal">
                  <label for="">{{content3Modal}}</label>
                  <textarea class="form-control border-round" rows="3" v-model="content3"></textarea>
                </div>
                <div class="col-12 form-group" v-show="viewContent4Modal">
                  <label for="">{{content4Modal}}</label>
                  <textarea class="form-control border-round" rows="3" v-model="content4"></textarea>
                </div>
                <div class="col-12 form-group" v-show="viewFileModal">
                  <label for="">Imagen / Archivo</label>
                  <input type="file" id="file" @change="obtenerFile" class="form-control-file" name="file">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-white border-round border-color-pink color-pink" v-on:click="closeModalContent()"><i class="fas fa-times"></i> </button>
                <button type="submit" class="btn btn-primary border-round"><i class="fas fa-save"></i> </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

</template>

<script>
import 'datatables.net-bs4';

export default {
  data(){
      return{
        contenidos : this.contents,
        msj : '',
        a : false,
        imgMiniatura:'',

        nameModal: '',
        contentModal: '',
        content1Modal: '',
        content2Modal: '',
        content3Modal: '',
        content4Modal: '',
        fileModal: '',


        // Vista de los contenidos del Modal
        viewContent1Modal: false,
        viewContent2Modal: false,
        viewContent3Modal: false,
        viewContent4Modal: false,
        viewFileModal: false,

        // Data del modal PIVOTE
        id: '',
        name:'',
        content: '',
        content1: '',
        content2: '',
        content3: '',
        content4: '',
        file: '',

        // Contenidos
        sliders:[],

        // Vistas
        view_home : true,
        view_aboutus : false,
        view_members : false,
        view_founders : false,
        view_footer : false,

        // Clases
        class_home : 'active',
        class_aboutus : '',
        class_members : '',
        class_founders : '',
        class_footer : '',
      }
  },


  props:['contents'],


  methods:{

    eraseContent(id){
      toastr.warning('Borrando contenido', 'Espere...');
      axios.post('/manageContent/erasecontent', {id_erase: id}
      ).then(response => {
         this.contenidos = response.data.contents;
         $('#modalSlider').modal('hide');
         $('#file').val('');
         toastr.success(response.data.msj, 'Exito');
      }).catch(function (error){
        console.log(error);
      });

    },

    addChangeContent: function(){
      toastr.warning('Guardando información', 'Espere...');
      let formData = new FormData();
      formData.append('id', this.id);
      formData.append('name', this.name);
      formData.append('content', this.content);
      formData.append('content1', this.content1);
      formData.append('content2', this.content2);
      formData.append('content3', this.content3);
      formData.append('content4', this.content4);
      formData.append('file', this.file);
      axios.post('/manageContent/addchangescontent', formData
      ).then(response => {
         this.contenidos = response.data.contents;
         $('#modalSlider').modal('hide');
         $('#file').val('');
         toastr.success(response.data.msj, 'Exito');
      }).catch(function (error){
        console.log(error);
      });

    },

    obtenerFile(e){
      let file = e.target.files[0];
      this.file = file;
      this.cargarFile(file);
    },

    cargarFile(file){
      let reader = new FileReader();
      reader.onload = (e) => {
        this.imgMiniatura = e.target.result;
      }
      reader.readAsDataURL(file);
    },

    openModalContent(id, nameModal, contentModal, content1Modal, content2Modal, content3Modal, content4Modal, fileModal){
      if (content1Modal === null) {
        this.viewContent1Modal = false;
      }else {
        this.viewContent1Modal = true;
      }
      if (content2Modal === null) {
        this.viewContent2Modal = false;
      }else {
        this.viewContent2Modal = true;
      }
      if (content3Modal === null) {
        this.viewContent3Modal = false;
      }else {
        this.viewContent3Modal = true;
      }
      if (content4Modal === null) {
        this.viewContent4Modal = false;
      }else {
        this.viewContent4Modal = true;
      }
      if (fileModal === null) {
        this.viewFileModal = false;
      }else {
        this.viewFileModal = true;
      }

      this.contentModal = contentModal;
      this.content1Modal = content1Modal;
      this.content2Modal = content2Modal;
      this.content3Modal = content3Modal;
      this.content4Modal = content4Modal;

      var self = this;
      if (id !== null) {
        var resultado = self.buscarElemento(id);
        self.id = resultado.id;
        self.name = resultado.name;
        self.content = resultado.content;
        self.content1 = resultado.content1;
        self.content2 = resultado.content2;
        self.content3 = resultado.content3;
        self.content4 = resultado.content4;
        self.file = resultado.file;
        self.imgMiniatura = resultado.file;
      }else {
        self.id = '';
        self.name = nameModal;
        self.content = '';
        self.content1 = '';
        self.content2 = '';
        self.content3 = '';
        self.content4 = '';
        self.file = '';
        self.imgMiniatura = '';
      }

      $('#modalSlider').modal('show');
    },

    closeModalContent(){
      $('#file').val('');
      $('#modalSlider').modal('hide');
    },

    separarContenido: function(){
      var self = this;
      (this.contenidos).forEach(function(element) {
        if (element.name === 'primary_slider') {
          (self.sliders).push(element);
        }
      });
    },

    buscarElemento(id){
      var self = this;
      var elemento = null;
      (this.contenidos).forEach(function(element) {
        if (element.id === id) {
          elemento =  element;
        }
      });
      return elemento;
    },

    showMessage: function(msj){
      this.msj = msj;
      this.a = true;
      $("#msj").fadeIn(500);
      setTimeout(function(){
          $("#msj").fadeOut();
          this.a = false;
      }, 2000);
    },

    views: function(view_ ){

      console.log('Aqui llega');
      this.view_home = false;
      this.view_aboutus = false;
      this.view_members = false;
      this.view_founders = false;
      this.view_footer = false;

      // Clases
      this.class_home = '';
      this.class_aboutus = '';
      this.class_members = '';
      this.class_founders = '';
      this.class_footer = '';

      if (view_ == 'view_home') {
        this.view_home = true;
        this.class_home = 'active';
      }else if (view_ == 'view_aboutus') {
        this.view_aboutus = true;
        this.class_aboutus = 'active';
      }else if (view_ == 'view_members') {
        this.view_members = true;
        this.class_members = 'active';
      }else if (view_ == 'view_founders') {
        this.view_founders = true;
        this.class_founders = 'active';
      }else if (view_ == 'view_footer') {
        this.view_footer = true;
        this.class_footer = 'active';
      }
    }



  },

  mounted(){

    $('#tableProjects').DataTable( {
          language: {
            url: '/js/Spanish.json'
          }
        });

    $('#table_regulatory_framework').DataTable( {
          language: {
            url: '/js/Spanish.json',

          }
        });

    $('#table_members').DataTable( {
          language: {
            url: '/js/Spanish.json',

          }
        });

    $('#table_founders').DataTable( {
          language: {
            url: '/js/Spanish.json',

          }
        });




  }



}

</script>

<style>

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}

.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

.flip-list-move {
  transition: transform 1s;
}



.list-complete-item {
  transition: all .5s;
  margin-right: 0px;
}
.list-complete-enter, .list-complete-leave-to
/* .list-complete-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateX(10px);
}

.list-complete-leave-active {
  position: absolute;
}
</style>
