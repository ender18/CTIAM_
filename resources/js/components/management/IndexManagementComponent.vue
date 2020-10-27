<template >


  <div class="container">
    <div class="row">
      <div id="msj" v-show="a"  class="col-12">
        <div class="alert alert-success" role="alert">
          {{msj}}
        </div>
      </div>
      <div class="col-12">
        <div class="row shadow-sm">
          <div class="col-12 text-center">
            <h4 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Página Inicio</span></h4>
          </div>
          <!-- Sliders -->
          <div class="col-10  rounded">
            <h4>Sliders</h4>
          </div>
          <div class="col-2 d-flex justify-content-end">
            <button class="btn btn-primary " type="button" name="button" v-on:click="openModalContent(null, 'primary_slider', 'Titulo', 'Descripción', null, null, null, 'file')"><i class="fas fa-plus" ></i> Nuevo Slider</button>
          </div>
          <div class="col-12">
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Título</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Imagen</th>
                  <th scope="col">Opciones</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="contenido in contenidos" v-if="contenido.name == 'primary_slider'">
                  <th>{{contenido.content}}</th>
                  <td>{{contenido.content1}}</td>
                  <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                  <td><button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'primary_slider', 'Titulo', 'Descripción', null, null, null, 'file')"><i class="fas fa-pen"></i></button> </td>
                  <td><button class="btn btn-danger" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button> </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Quienes Somos -->

          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Quienes Somos</span></h5>
          </div>
          <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'quienes_somos'">
            <div class="row">
              <div class="col-2">
                <img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px">
              </div>
              <div class="col-8">
                <p>{{contenido.content}}</p>
              </div>
              <div class="col-2">
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'quienes_somos', 'Texto Quienes somos', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>

              </div>
            </div>
          </div>

          <!-- Que hacemos -->
          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Que hacemos en el programa</span></h5>
          </div>
          <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'que_hacemos'">
            <div class="row">
              <div class="col-2">
                <img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px">
              </div>
              <div class="col-8">
                <p>{{contenido.content}}</p>
              </div>
              <div class="col-2">
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'que_hacemos', 'Texto Que hacemos', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
              </div>
            </div>
          </div>

          <!-- Proyectos realizados -->
          <div class="col-12 text-center">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Experiencias de proyectos realizados</span></h5>
          </div>
          <div class="col-8">
          </div>
          <div class="col-4 d-flex justify-content-end">
            <button class="btn btn-primary " type="button" name="button" v-on:click="openModalContent(null, 'proyectos_realizados', 'Titulo del proyecto', 'Descripción', null, null, null, 'file')"><i class="fas fa-plus" ></i> Nuevo Proyecto</button>
          </div>
          <div class="col-12">
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Título</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Imagen</th>
                  <th scope="col">Opciones</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="contenido in contenidos" v-if="contenido.name == 'proyectos_realizados'">
                  <th>{{contenido.content}}</th>
                  <td>{{contenido.content1}}</td>
                  <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                  <td><button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'proyectos_realizados', 'Titulo del proyecto', 'Descripción', null, null, null, 'file')"><i class="fas fa-pen"></i></button> </td>
                  <td><button class="btn btn-danger" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button> </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Mision -->
          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Mision</span></h5>
          </div>
          <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'mision'">
            <div class="row">
              <div class="col-2">
                <img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px">
              </div>
              <div class="col-8">
                <p>{{contenido.content}}</p>
              </div>
              <div class="col-2">
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'mision', 'Texto Mision', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
              </div>
            </div>
          </div>
          <!-- Fin de Misión -->

          <!-- Visión -->
          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Visión</span></h5>
          </div>
          <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'vision'">
            <div class="row">
              <div class="col-2">
                <img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px">
              </div>
              <div class="col-8">
                <p>{{contenido.content}}</p>
              </div>
              <div class="col-2">
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'vision', 'Texto Mision', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
              </div>
            </div>
          </div>
          <!-- Fin de Visión -->

          <!-- objetivo general -->
          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Obejtivo general</span></h5>
          </div>
          <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'obj_general'">
            <div class="row">
              <div class="col-2">
                <img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px">
              </div>
              <div class="col-8">
                <p>{{contenido.content}}</p>
              </div>
              <div class="col-2">
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'obj_general', 'Texto Mision', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button>
              </div>
            </div>
          </div>
          <!-- Fin de objetivo general -->

          <!-- PObjetivos especificos -->
          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Obejtivos especificos</span></h5>
          </div>
          <div class="col-12" v-for="contenido in contenidos" v-if="contenido.name == 'img_obj_especifico'">
            <div class="row">
              <div class="col-2">
                <img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px">
              </div>
              <div class="col-10">
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'img_obj_especifico', 'Texto Mision', null, null, null, null, 'file')">Cambiar Imagen</button>
              </div>
            </div>
          </div>

          <div class="col-8">
          </div>
          <div class="col-4 d-flex justify-content-end">
            <button class="btn btn-primary " type="button" name="button" v-on:click="openModalContent(null, 'obj_especifico', 'Objetivo Especifico', null, null, null, null, null)"><i class="fas fa-plus" ></i> Nuevo Objetivo Especifico</button>
          </div>
          <div class="col-12">
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Objeticos especificos</th>
                  <th scope="col">Opciones</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="contenido in contenidos" v-if="contenido.name == 'obj_especifico'">
                  <th>{{contenido.content}}</th>
                  <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                  <td><button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'obj_especifico', 'Objetivo Especifico', null , null, null, null, null)"><i class="fas fa-pen"></i></button> </td>
                  <td><button class="btn btn-danger" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button> </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Fin Objetivos especificos -->

          <!-- Marco Normativo y funcional -->
          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Marco Normativo</span></h5>
          </div>
          <div class="col-8">
          </div>
          <div class="col-4 d-flex justify-content-end">
            <button class="btn btn-primary " type="button" name="button" v-on:click="openModalContent(null, 'marco_normativo', 'Titulo', null, null, null, null, 'file')"><i class="fas fa-plus" ></i> Nuevo Archivo</button>
          </div>
          <div class="col-12">
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Archivo</th>
                  <th scope="col">Título</th>
                  <th scope="col">Opciones</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="contenido in contenidos" v-if="contenido.name == 'marco_normativo'">
                  <td><a v-bind:href="contenido.file" download>
                    <img src="https://image.flaticon.com/icons/png/512/337/337946.png" alt="" class="img img-fluid" style="width: 50px">
                  </a>
                    </td>
                  <th>
                    <a v-bind:href="contenido.file" download>
                      {{contenido.content}}
                    </a>
                    </th>
                  <td><button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'marco_normativo', 'Titulo ', null, null, null, null, 'file')"><i class="fas fa-pen"></i></button> </td>
                  <td><button class="btn btn-danger" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button> </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Fin Marco Normativo y funcional -->

          <!-- Miembros -->
          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Nuestros miembros</span></h5>
          </div>
          <div class="col-8">
          </div>
          <div class="col-4 d-flex justify-content-end">
            <button class="btn btn-primary " type="button" name="button" v-on:click="openModalContent(null, 'members', 'Nombre', 'Descripción', 'Sitio Web', null, null, 'file')"><i class="fas fa-plus" ></i> Nuevo Miembro</button>
          </div>
          <div class="col-12">
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Sitio web</th>
                  <th scope="col">Aportes</th>
                  <th scope="col">Imagen</th>
                  <th scope="col">Opciones</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="contenido in contenidos" v-if="contenido.name == 'members'">
                  <th>{{contenido.content}}</th>
                  <td>{{contenido.content1}}</td>
                  <td> <a v-bind:href="contenido.content2" target="_blank">{{contenido.content2}}</a></td>
                  <td>{{contenido.content3}}</td>
                  <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                  <td><button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'members', 'Nombre', 'Descripción', 'Sitio Web', 'Aportes', null, 'file')"><i class="fas fa-pen"></i></button> </td>
                  <td><button class="btn btn-danger" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button> </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Fin de Miembros  -->

          <!-- Fundadoras -->
          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Nuestras Fundadoras</span></h5>
          </div>
          <div class="col-8">
          </div>
          <div class="col-4 d-flex justify-content-end">
            <button class="btn btn-primary " type="button" name="button" v-on:click="openModalContent(null, 'founder', 'Nombre', 'Descripción', 'Profesión', null, null, 'file')"><i class="fas fa-plus" ></i> Nueva Fundadora</button>
          </div>
          <div class="col-12">
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">profesión</th>
                  <th scope="col">Opciones</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="contenido in contenidos" v-if="contenido.name == 'founder'">
                  <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                  <th>{{contenido.content}}</th>
                  <td>{{contenido.content1}}</td>
                  <td>{{contenido.content2}}</td>
                  <td><button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'founder', 'Nombre', 'Descripción', 'Profesión', null, null, 'file')"><i class="fas fa-pen"></i></button> </td>
                  <td><button class="btn btn-danger" type="button" name="button" v-on:click="eraseContent(contenido.id)"><i class="fas fa-trash"></i></button> </td>
                </tr>
              </tbody>
            </table>
          </div>


          <div class="col-12">
            <br>
            <h5 class="border-bottom border-secondary border-secondary border-3" >
              <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Video motivacional</span></h5>
          </div>

          <div class="col-12" >
            <div class="row" v-for="contenido in contenidos" v-if="contenido.name == 'video_haz_parte'">
              <div class="col-12">
                <iframe width="1080" height="608" v-bind:src="'https://www.youtube.com/embed/'+ contenido.content " frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

              </div>
              <div class="col-12 text-center">
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'video_haz_parte', 'Copia y pega el ID del video de Youtube (Ej: https://www.youtube.com/watch?v=kVqztcxCF89 el id es kVqztcxCF89)', null, null, null, null, null)">Cambiar enlace de video</button>
                <hr>
              </div>
            </div>
         </div>


         <div class="col-12">
           <br>
           <h5 class="border-bottom border-secondary border-secondary border-3" >
             <span class="bg-secondary text-white  pl-2 pr-2 rounded-top  border-4 ">Información general del sitio web</span></h5>
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
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'description_site', 'Descripción corta del sitio', null, null, null, null, null)"><i class="fas fa-pen"></i></button>
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
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'phone', 'Teléfono', null, null, null, null, null)"><i class="fas fa-pen"></i></button>
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
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'email', 'Correo electrónico de contacto', null, null, null, null, null)"><i class="fas fa-pen"></i></button>
              </div>
            </div>
            <div class="row" v-for="contenido in contenidos" v-if="contenido.name == 'twitter'">
              <div class="col-2">
                <p><strong>Twitter:</strong></p>
              </div>
              <div class="col-8">
                <p>{{contenido.content}} - {{contenido.content1}}</p>
              </div>
              <div class="col-2">
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'twitter', 'Twitter', 'URL', null, null, null, null)"><i class="fas fa-pen"></i></button>
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
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'facebook', 'Facebook', 'URL', null, null, null, null)"><i class="fas fa-pen"></i></button>
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
                <button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'instagram', 'Instagram', 'URL', null, null, null, null)"><i class="fas fa-pen"></i></button>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <hr>
              </div>
            </div>
          </div>
          <!-- Fin de Fundadoras  -->

          <!-- Focos -->
          <!-- <div class="col-12">
            <br>
            <h5 class="bg-secondary text-white  pt-2 pb-2">Nuestros Focos</h5>
          </div>
          <div class="col-8">
          </div>
          <div class="col-4 d-flex justify-content-end">
            <button class="btn btn-primary " type="button" name="button" v-on:click="openModalContent(null, 'focus', 'Nombre', 'Descripción', null, null, null, '')"><i class="fas fa-plus" ></i> Nuevo Foco</button>
          </div>
          <div class="col-12">
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Imagen</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Opciones</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="contenido in contenidos" v-if="contenido.name == 'focus'">
                  <td><img v-bind:src="contenido.file" alt="" class="img img-fluid" style="width: 100px"></td>
                  <th>{{contenido.content}}</th>
                  <td>{{contenido.content1}}</td>
                  <td><button class="btn btn-success" type="button" name="button" v-on:click="openModalContent(contenido.id, 'focus', 'Nombre', 'Descripción', null, null, null, '')">Editar</button> </td>
                  <td><button class="btn btn-danger" type="button" name="button" v-on:click="eraseContent(contenido.id)">Eliminar</button> </td>
                </tr>
              </tbody>
            </table>
          </div> -->
          <!-- Fin de Focos  -->

        </div>
      </div>
    </div>
    <div class="row">

    </div>


    <div class="modal fade" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar / Agregar contenido</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-group" v-on:submit.prevent="addChangeContent">
              <div class="row">
                <div class="col-12" v-show="viewFileModal">
                  <img v-bind:src="imgMiniatura" alt="" class="img img-fluid">
                  <hr>
                </div>
                <div class="col-12">
                  <label for="">{{contentModal}}</label>
                  <textarea class="form-control" rows="3" v-model="content"></textarea>
                </div>
                <div class="col-12" v-show="viewContent1Modal">
                  <label for="">{{content1Modal}}</label>
                  <textarea class="form-control" rows="3" v-model="content1"></textarea>
                </div>
                <div class="col-12" v-show="viewContent2Modal">
                  <label for="">{{content2Modal}}</label>
                  <textarea class="form-control" rows="3" v-model="content2"></textarea>
                </div>
                <div class="col-12" v-show="viewContent3Modal">
                  <label for="">{{content3Modal}}</label>
                  <textarea class="form-control" rows="3" v-model="content3"></textarea>
                </div>
                <div class="col-12" v-show="viewContent4Modal">
                  <label for="">{{content4Modal}}</label>
                  <textarea class="form-control" rows="3" v-model="content4"></textarea>
                </div>

                <div class="col-12" v-show="viewFileModal">
                  <label for="">Imagen / Archivo</label>
                  <input type="file" id="file" @change="obtenerFile" class="form-control-file" name="file">
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" v-on:click="closeModalContent()">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

</template>

<script>

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
        sliders:[]
      }
  },


  props:['contents'],


  methods:{

    eraseContent(id){
      axios.post('/manageContent/erasecontent', {id_erase: id}
      ).then(response => {
         this.contenidos = response.data.contents;
         $('#modalSlider').modal('hide');
         $('#file').val('');
         this.showMessage(response.data.msj);
      }).catch(function (error){
        console.log(error);
      });

    },

    addChangeContent: function(){
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
         this.showMessage(response.data.msj);
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
    }



  },

  mounted(){




  }



}

</script>

<style>
</style>
