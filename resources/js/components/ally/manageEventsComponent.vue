<template>

  <div class="container">
    <spinner v-show="spinner"></spinner>

    <div class="row pt-4">
      <div class="col-12 ">
        <h2><strong>Gestión de Actividades de formación</strong></h2>
      </div>
    </div>
    <div class="row pb-4">
      <div class="col-10">
        <hr class="hr-pink-left">
      </div>
      <div class="col-2">
        <button class="btn btn-primary border-round " type="button" name="button" v-on:click="openModalContent(null)"><i class="fas fa-plus" ></i></button>
      </div>
    </div>

    <div class="row pb-3">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-hover " id="table_pagination">
            <thead class="thead-light" >
              <tr>
                <th scope="col">Titulo</th>
                <th class="d-none d-lg-block" scope="col">Descripción</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="foco in eventos">
                <th scope="row" v-on:click="openShowModal(foco.id)">{{foco.title}}</th>
                <td  v-on:click="openShowModal(foco.id)" class="d-none d-lg-block" >{{foco.description}}</td>
                <td v-if="foco.status === 'Borrador'"><h6 class="badge-pill bg-primary text-white text-center">{{foco.status}}</h6></td>
                <td v-if="foco.status === 'Publicado'"><h6 class="badge-pill bg-dark text-white text-center">{{foco.status}}</h6></td>
                <td v-if="foco.status === 'En curso'"><h6 class="badge-pill bg-warning text-center">{{foco.status}}</h6></td>
                <td v-if="foco.status === 'Por calificar'"><h6 class="badge-pill bg-light text-center">{{foco.status}}</h6></td>
                <td v-if="foco.status === 'Finalizado'"><h6 class="badge-pill bg-success text-white text-center">{{foco.status}}</h6></td>
                <td v-if="foco.status === 'Cancelado'"><h6 class="badge-pill bg-danger text-white text-center">{{foco.status}}</h6></td>
                <td class="center-text">
                  <div class="">
                    <button type="button" class="btn btn-white border-round border-color-pink color-pink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-caret-down fa-lg"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#" v-on:click="openShowModal(foco.id)">Ver</a>
                      <div class="dropdown-divider"></div>
                      <h6 class="dropdown-header" v-if="foco.status != 'Cancelado' && foco.status != 'Finalizado'">Cambiar estado</h6>
                      <a class="dropdown-item" href="#" v-if="foco.status === 'Borrador'" v-on:click="changeStatus(foco.id, 'Publicado')">Publicar</a>
                      <a class="dropdown-item" href="#" v-if="foco.status === 'Publicado'" v-on:click="changeStatus(foco.id, 'En curso')">Iniciar</a>
                      <a class="dropdown-item" href="#" v-if="foco.status === 'En curso'" v-on:click="changeStatus(foco.id, 'Por calificar')">Por Calificar</a>
                      <a class="dropdown-item" href="#" v-if="foco.status === 'Por calificar'" v-on:click="changeStatus(foco.id, 'Finalizado')">Finalizar</a>
                      <a class="dropdown-item" href="#" v-if="foco.status != 'Cancelado' && foco.status != 'Finalizado'" v-on:click="changeStatus(foco.id, 'Cancelado')">Cancelar</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" v-if="foco.status === 'Borrador' || foco.status === 'Publicado'" v-on:click="openModalAddBeneficiary(foco.id)" >Añadir Beneficiaria</a>
                      <a class="dropdown-item" v-bind:href="'/addCertifieds?id_course='+foco.id" v-if="foco.status === 'Finalizado'" >Administrar Certificados</a>
                      <a class="dropdown-item" href="#" v-on:click="editCertified(foco.id)">Editar Certificado</a>
                      <a class="dropdown-item" href="#" v-if="foco.status === 'Borrador' || foco.status === 'Publicado'" v-on:click="openModalContent(foco.id)" >Editar</a>
                      <a class="dropdown-item" href="#" v-if="foco.status === 'Borrador'" v-on:click="deleteEvent(foco.id)">Eliminar</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal Foco -->
    <div class="modal fade bd-example-modal-lg" id="modalFocus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header text-center border-0 pb-0">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h5 class="modal-title text-center"><strong>Editar / Agregar Actividades</strong></h5>
                </div>
                <div class="col-12">
                  <hr class="hr-pink-center">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-body">
            <form class="form-group" v-on:submit.prevent="addChangeFocus">
              <transition-group name="list-complete" tag="p" >
                <span class="list-complete-item" v-show="pagination == 1" key="page1">
                  <div class="row  d-flex justify-content-center justify-content-lg-start" >
                    <div class="col-6 col-lg-5">
                      <div class="row  ">
                        <div class="col-12" >
                          <img v-bind:src="imgMiniatura" alt="" class="img img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-7">
                      <div class="row">
                        <div class="col-4 form-group">
                          <label>Tipo</label>
                          <select class="form-control  border-round" v-model="type">
                            <option>Curso</option>
                            <option>Diplomado</option>
                            <option>Taller</option>
                            <option>Capacitación</option>
                            <option>Conferencia</option>
                            <option>Foro</option>
                            <option>Seminario</option>
                          </select>
                        </div>
                        <div class="col-8 form-group">
                          <label for="">Título</label>
                          <input id="title" v-bind:class=" 'form-control border-round '+ class_title" type="text" name="" value="" v-model="title">
                          <div class="invalid-feedback">
                            Agrega un título
                          </div>
                        </div>
                        <div class="col-12 form-group">
                          <label for="">Descripción</label>
                          <textarea class="form-control border-round" rows="3" v-model="description"></textarea>
                        </div>
                        <div class="col-12">
                          <label for="">Cambiar Imagen (400*400 px)</label>
                          <input type="file" id="file" @change="obtenerFile" class="form-control-file border-round" name="file">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row pt-3">
                    <div class="col-6 col-lg-4 form-group">
                      <label for="">Duración</label>
                      <input v-bind:class="'form-control border-round '+ class_duration " type="number" name="" value="" v-model="duration" min="1">
                      <div class="invalid-feedback">
                        Debe ser un número positivo
                      </div>
                    </div>
                    <div class="col-6 col-lg-4 form-group">
                      <label>Unidad de tiempo</label>
                      <select class="form-control border-round" v-model="durationtext">
                        <option>Horas</option>
                        <option>Dias</option>
                        <option>Semanas</option>
                        <option>Meses</option>
                        <option>Años</option>
                      </select>
                    </div>
                    <div class="col-6 col-lg-4 form-group">
                      <label for="">Costo ($)</label>
                      <input v-bind:class="'form-control border-round '+ class_cost " type="number" name="" value="" min="0" v-model="cost">
                      <div class="invalid-feedback">
                        Debe ser mayor o igual a 0.
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6 col-lg-3 form-group">
                      <label for="">Fecha inicio inscripción</label>
                      <input id="fecha_inicio_inscription" class="form-control border-round" type="date" name="" value="" v-model="fecha_inicio_inscription">
                      <div class="invalid-feedback">
                        Fecha inválida
                      </div>
                    </div>
                    <div class="col-6 col-lg-3 form-group">
                      <label for="">Fecha fin inscripción</label>
                      <input id="fecha_fin_inscription" v-bind:class="'form-control border-round ' + class_fecha_fin_inscription" type="date" name="" value="" v-model="fecha_fin_inscription">
                      <div class="invalid-feedback">
                        Fecha inválida
                      </div>
                    </div>
                    <div class="col-6 col-lg-3 form-group">
                      <label for="">Fecha de inicio</label>
                      <input id="fecha_inicio" v-bind:class="'form-control border-round ' + class_fecha_inicio" type="date" name="" value="" v-model="fecha_inicio">
                      <div class="invalid-feedback">
                        Fecha inválida
                      </div>
                    </div>
                    <div class="col-6 col-lg-3 form-group">
                      <label for="">Fecha de finalización</label>
                      <input id="fecha_fin" v-bind:class="'form-control border-round ' + class_fecha_fin" type="date" name="" value="" v-model="fecha_fin">
                      <div class="invalid-feedback">
                        Fecha inválida
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6 form-group">
                      <label for="">Aliado a quien pertenece la actividad de formación:</label>
                    </div>
                    <div class="col-6 form-group">
                      <select class="form-control border-round" v-model="id_owner">
                        <option v-for="aliado in aliados1" v-bind:value="aliado.id"> {{aliado.last_name}} {{aliado.name}}</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 col-lg-4">
                      <div class="row">
                        <div class="col-12 form-group">
                          <label for="exampleFormControlSelect1">Foco(s) al que pertenece</label>
                          <select class="form-control border-round" id="selectFocos" v-model="selectFocus">
                            <option value="">Selecione uno o varios focos...</option>
                            <option v-for="foco in focos1" v-bind:value="foco.id">{{foco.name}}</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-8">
                      <div class="row">
                        <div class="col-12">
                          <label for="">Focos seleccionados</label>
                        </div>
                        <div class="col-12" v-if="focosSelected.length == 0">
                          <label for=""><strong>No se ha seleccionado ningun foco</strong></label>
                        </div>
                        <div class="col-6 col-lg-4 form-group" v-for="focoSelected in focosSelected">
                          <div class="input-group border-0">
                            <!-- <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required> -->
                            <p class="form-control border-0 ">{{focoSelected.name}}</p>
                            <button class="btn btn-danger border-round" type="button" name="button" v-on:click="borrarFoco(focoSelected.id)">
                              <div class="input-group-prepend">
                                <i class="far fa-trash-alt"></i>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 text-center">
                      <button type="button" class="btn btn-dark border-round" v-on:click="changePagination(2)" name="button"><i class="fas fa-angle-right"></i></button>
                    </div>
                  </div>
                </span>


                <span class="list-complete-item"  v-show="pagination == 2" key="page2">

                  <div class="row">
                    <div class="col-10">
                      <h4 class="text-center"><strong>GRUPOS</strong></h4>
                      <hr class="hr-pink-left">
                    </div>
                    <div class="col-2">
                      <button type="button" class="btn btn-primary border-round" name="button" v-on:click="newGroup(null)" v-if="id_group == ''"><i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                  <transition name="fade">
                    <div class="" v-show="id_group != ''">
                      <div class="row">
                        <div class="col-6 col-lg-3 form-group">
                          <label for="">Nombre</label>
                          <input type="text" id="nameGroupForm" v-bind:class="'form-control border-round ' + class_nameGroup" name="" value="" v-model="nameGroup" placeholder="Ej. A">
                          <div class="invalid-feedback">
                            Introduce un nombre
                          </div>
                        </div>
                        <div class="col-6 col-lg-3 form-group">
                          <label for="">Cupo</label>
                          <input type="number" v-bind:class="'form-control border-round ' + class_quotaGroup" name="" value="" v-model="quotaGroup" min="1">
                          <div class="invalid-feedback">
                            Introduce un número mayor a 0
                          </div>
                        </div>
                        <div class="col-12 col-lg-6 form-group">
                          <label for="">Lugar</label>
                          <input type="text" class="form-control border-round" name="" value="" v-model="placeGroup">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-4 form-group">
                          <label for=""><strong>Tutores</strong></label>
                          <select class="form-control border-round" id="selectTutors" v-model="tutorGroup">
                            <option value="">Selecione uno o varios tutores...</option>
                            <option v-for="tutor in tutores1" v-bind:value="tutor.id"> {{tutor.last_name}} {{tutor.name}}</option>
                          </select>
                        </div>
                        <div class="col-8">
                          <div class="row">
                            <div class="col-12">
                              <label for="">Tutores seleccionados</label>
                            </div>
                            <div class="col-12" v-if="tutorsSelected.length == 0">
                              <label for=""><strong>No se ha seleccionado ningun tutor</strong></label>
                            </div>
                            <div class="col-12 col-lg-6 form-group" v-for="tutorSelected in tutorsSelected">
                              <div class="input-group">
                                <!-- <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required> -->
                                <p class="form-control border-0 ">{{tutorSelected.name}}</p>
                                <button class="btn btn-danger border-round" type="button" name="button" v-on:click="borrarTutor(tutorSelected.id_tutor)">
                                  <div class="input-group-prepend">
                                    <i class="far fa-trash-alt"></i>
                                  </div>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-0 pb-0">
                        <div class="col-12  mb-0 pb-0">
                          <label for=""><strong>Horarios</strong></label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12  col-lg-5 form-group">
                          <label for="">Día</label>
                          <select class="form-control border-round" id="selectDays" v-model="dayGroup">
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                            <option value="Lunes a viernes">Lunes a viernes</option>
                            <option value="Lunes a viernes">Lunes a sábado</option>
                          </select>
                        </div>
                        <div class="col-5  col-lg-3 form-group">
                          <label for="">Hora Inicio</label>
                          <input id="hourStart" type="time" name="" value="" class="form-control border-round" v-model="hourStart">
                        </div>
                        <div class="col-5  col-lg-3 form-group">
                          <label for="">Hora Fin</label>
                          <input id="hourEnd" type="time" name="" value="" class="form-control border-round"  v-model="hourEnd" :min="hourStart">
                        </div>
                        <div class="col-2  col-lg-1 form-group">
                          <label for="">&nbsp</label>
                          <button type="button" name="button" v-on:click="addSchedule()" class="btn btn-primary border-round" > <i class="fas fa-plus"></i></button>
                        </div>
                      </div>

                      <div class="row" v-if="schedulesGroup.length == 0">
                        <div class="col-12" >
                          <h6>No se ha creado ningun horario.</h6>
                        </div>
                      </div>

                      <div class="row" v-if="schedulesGroup.length > 0">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table class="table table-hover">
                              <thead class="thead-light" >
                                <tr>
                                  <th scope="col">Día</th>
                                  <th class="text-center" scope="col">Hora inicio</th>
                                  <th class="text-center" scope="col">Hora Fin</th>
                                  <th class="text-center" scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="shedule in schedulesGroup">
                                  <th>{{shedule.day}}</th>
                                  <td class="text-center">{{shedule.hour_start}}</td>
                                  <td class="text-center">{{shedule.hour_end}}</td>
                                  <td class="text-center">
                                  <button class="btn btn-primary border-round ml-1" type="button" name="button" v-on:click="deleteShedule(shedule.id)">
                                    <i class="far fa-trash-alt"></i>
                                  </button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="row pb-4">
                        <div class="col-12 text-center">
                          <button type="button" class="btn btn-white border-color-pink color-pink border-round" v-on:click="deleteGroup(id_group, id)" name="button"> <i class="fa fa-times"></i> </button>

                          <button type="button" class="btn btn-primary border-round" v-on:click="addGroup()" name="button"> <i class="fa fa-save"></i> </button>
                        </div>
                      </div>
                    </div>
                </transition>

                      <div class="row" v-if="groupsCourse.length == 0">
                        <div class="col-12" >
                          <h6>No se ha creado ningun grupo.</h6>
                        </div>
                      </div>

                      <div class="row" v-if="groupsCourse.length > 0">
                        <div class="col-12" >
                          <h5><strong>Grupos creados</strong></h5>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12 " v-if="groupsCourse.length > 0">
                          <div class="table-responsive">
                            <table class="table table-hover">
                              <thead class="thead-light">
                                <tr>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Cupo</th>
                                  <th scope="col">Horario(s)</th>
                                  <th scope="col">Lugar</th>
                                  <th scope="col">Tutor(es)</th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="group in groupsCourse">
                                  <th scope="row">{{group.nameGroup}}</th>
                                  <td>{{group.quota}}</td>
                                  <td> <p v-for="schedule in schedulesGroups" v-if="schedule.id_group == group.id"> {{schedule.day}} ({{schedule.hour_start}} - {{schedule.hour_end}}) </p> </td>
                                  <td>{{group.place}}</td>
                                  <td> <p v-for="tutor in tutorsGroup" v-if="tutor.id_group == group.id"> {{tutor.name}} {{tutor.last_name}} </p> </td>
                                  <td>
                                    <button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="newGroup(group.id)">
                                      <i class="fas fa-pen"></i>
                                    </button>
                                    <button class="btn btn-primary border-round ml-1" type="button" name="button" v-on:click="deleteGroup(group.id, id)">
                                      <i class="far fa-trash-alt"></i>
                                    </button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>



                  <div class="row">
                    <div class="col-12 text-center">
                      <button type="button" class="btn btn-dark border-round" v-on:click="changePagination(1)" name="button"><i class="fas fa-angle-left"></i></button>
                    </div>
                  </div>
                </span>
              </transition-group>


              <div class="modal-footer border-0">
                <button type="button" class="btn btn-white border-round  color-pink border-color-pink" v-on:click="closeModalContent(false)"><i class="fas fa-times"></i></button>
                <button type="button" class="btn btn-white border-round  color-pink border-color-pink" v-on:click="closeModalContent(true)"><i class="fas fa-trash"></i></button>
                <button type="submit" class="btn btn-primary border-round" ><i class="fas fa-save"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- modal Finalizar  -->
    <div class="modal fade bd-example-modal-lg" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header border-0">
            <button type="button" class="close" v-on:click="closeModalBeneficiaries()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-8 col-lg-5">
                  <img v-bind:src="view_url_image"  class="img img-fluid border-round" alt="">
                </div>
                <div class="col-12 col-lg-7">
                  <h2 class="" ><strong>{{view_title}}</strong></h2>
                  <hr class="hr-pink-left" >
                  <p class="text-justify" >{{view_description}}</p>
                </div>
              </div>
              <div class="row pt-4">
                <div class="col-6 col-lg-4">
                  <p><strong>Estado: </strong>{{view_status}}</p>
                  <p><strong>Tipo: </strong>{{view_type}}</p>
                </div>
                <div class="col-6 col-lg-4">
                  <p><strong>Foco(s): </strong>{{view_focos}}</p>
                  <p><strong>Duración: </strong>{{view_duration}} {{view_duration_type}}</p>
                </div>
                <div class="col-6 col-lg-4">
                  <p><strong>Aliado: {{view_ally}} </strong></p>
                  <p><strong>Fecha de Inicio: </strong>{{view_fecha_inicio}}</p>
                  <p><strong>Fecha Fin: </strong>{{view_fecha_fin}}</p>
                </div>
                <div class="col-12">
                  <form class="" action="/downloadInfoCourse" method="GET">
                    <input type="hidden" name="id_course" v-model="id_course">
                    <button  class="btn btn-success border-round" type="submit" name="button" v-on:click="downloadInfo(view_id_course)"> <i class="far fa-file-excel"></i> <i class="fas fa-download"></i></button>
                  </form>
                </div>
              </div>

              <div class="row pt-4">
                <div class="col-12">
                  <h5><strong>Grupos ({{courseGroups.length}})</strong></h5>
                  <hr class="hr-pink-left">
                </div>
                <div class="col-12" v-if="courseGroups.length > 0">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Grupo</th>
                          <th scope="col">Cupo</th>
                          <th scope="col">Horario</th>
                          <th scope="col">Lugar</th>
                          <th scope="col">Tutor</th>
                          <th scope="col">Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="group in courseGroups">
                          <th scope="row">{{group.nameGroup}}</th>
                          <td>{{group.quota}}</td>
                          <td><p v-for="schedule in view_schedulesGroups" v-if="schedule.id_group == group.id"> {{schedule.day}} ({{schedule.hour_start}}-{{schedule.hour_end}}) </p></td>
                          <td>{{group.place}}</td>
                          <td> <p v-for="tutor in tutorsGroup" v-if="tutor.id_group == group.id"> {{tutor.name}} {{tutor.last_name}} </p> </td>
                          <td>{{group.status_group}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <h5><strong>Beneficiarias Matriculadas ({{students.length}}) </strong></h5>
                  <hr class="hr-pink-left">
                </div>
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-hover"  id="table_pagination_beneficiaries">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Email</th>
                          <th scope="col">Telefono</th>
                          <th scope="col">Dirección</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Grupo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="student in students">
                          <th scope="row">{{student.last_name}} {{student.name}}</th>
                          <td>{{student.email}}</td>
                          <td>{{student.phone}}</td>
                          <td>{{student.adress}} {{student.neighborhood}}</td>
                          <td>{{student.status}}</td>
                          <td>{{student.nameGroup}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark txt-white" v-on:click="closeModalBeneficiaries()">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="modalAddBeneficiary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header text-center border-0 pb-0">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h4 class="modal-title text-center"><strong>Añadir beneciaria a Actividad de formación</strong></h4>
                </div>
                <div class="col-12">
                  <h5 class="modal-title text-center">{{view_title}}</h5>
                </div>
                <div class="col-12">
                  <hr class="hr-pink-center">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-5">
                  <input type="number" class="form-control border-round" name="" placeholder="Documento de identidad" v-model="addBeneficiaryDni" >
                </div>
                <div class="col-5">
                  <select class="form-control border-round"  v-model="addBeneficiaryGroup">
                    <option value="">Selecione el grupo</option>
                    <option v-for="group in courseGroups" v-bind:value="group.id"> {{group.nameGroup}}</option>
                  </select>
                </div>
                <div class="col-2">
                  <button type="button" class="btn btn-primary border-round" name="button" v-on:click="addBeneficiary()"><i class="fas fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark txt-white border-round" data-dismiss="modal"><i class="fas fa-times"></i></button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal edit Certified -->
    <div class="modal fade bd-example-modal-lg" id="modalEditCertified" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header text-center border-0 pb-0">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h4 class="modal-title text-center"><strong>Editar certificado</strong></h4>
                </div>
                <div class="col-12">
                  <hr class="hr-pink-center">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="container">
              <form class="form-group" v-on:submit.prevent="addChangeCertified">
                    <div class="form-row  d-flex justify-content-center justify-content-lg-start" >
                      <div class="col-6 col-lg-5">
                            <p v-if="certified_image == ''">No se ha cargado ninguna imagen</p>
                            <img v-if="certified_image != ''" v-bind:src="certified_image" alt="" class="img img-fluid">
                      </div>
                      <div class="col-12 col-lg-7">
                        <div class="row">
                          <div class="col-12 form-group">
                            <label for="">Título</label>
                            <input  class="form-control border-round" type="text" name="" value="" v-model="certified_title">
                          </div>
                          <div class="col-12 form-group">
                            <label for="">Encabezado</label>
                            <textarea class="form-control border-round" rows="3" v-model="certified_header"></textarea>
                          </div>
                          <div class="col-12">
                            <label for="">Cambiar Imagen (3300*2550 px)</label>
                            <input type="file" id="certified_file" @change="obtenerFileCertified" class="form-control-file border-round" name="certified_file">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row pt-2">
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Firma 1</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_name_people1">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Cargo Firma 1</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_position_people1">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Firma 2</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_name_people2">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Cargo Firma 2</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_position_people2">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Firma 3</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_name_people3">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Cargo Firma 3</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_position_people3">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Firma 4</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_name_people4">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Cargo Firma 4</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_position_people4">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Firma 5</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_name_people5">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Cargo Firma 5</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_position_people5">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Firma 6</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_name_people6">
                      </div>
                      <div class="form-group col-12 col-lg-6">
                        <label for="">Cargo Firma 6</label>
                        <input type="text" name="" value="" class="form-control border-round" v-model="certified_position_people6">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-6 text-right">
                            <form class="" action="/exportCertified" method="GET" target="_blank">
                              <input type="hidden" name="id_course" v-model="course_certified.id">
                              <input type="hidden" name="id_user" v-bind:value="'example'">
                              <input type="hidden" name="view" v-bind:value="'true'">
                              <button class="btn btn-white txt-white border-round color-pink border-color-pink" type="submit" name="button">
                                <i class="fas fa-eye"></i>
                              </button>
                            </form>
                          </div>
                          <div class="col-6">
                            <button type="button" class="btn btn-dark txt-white border-round" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
                            <button type="submit" class="btn btn-primary txt-white border-round"> <i class="fas fa-save"></i> </button>
                          </div>
                        </div>
                      </div>
                    </div>
              </form>
            </div>
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
    return {
      spinner: false,
      eventos : this.courses,
      imgMiniatura : '',
      id: '',
      name: '',
      description: '',
      file: '',
      a: false,
      msj: '',
      aliados1 : this.aliados,
      tutores1 : this.tutores,
      focos1 : this.focos,
      focosSelected: [],
      tutorsSelected: [],
      focosArray: [],
      selectFocus : '',

// Modal Edit course
      id : '', 
      type : '',
      title : '',
      description: '',
      duration : '',
      durationtext : 'Horas',
      focus : [],
      quota : '',
      fecha_inicio : '2018-02-27T21:10',
      fecha_fin : '',
      fecha_inicio_inscription : '',
      fecha_fin_inscription : '',
      place : '',
      cost : '',
      id_owner : '', 
      status : '',
      schedule: '',

      // Elementos del curso
      view_id_course: '',
      view_ally: '',
      view_title : '',
      view_type : '',
      view_description : '',
      view_duration : '',
      view_duration_type : '',
      view_url_image : '',
      view_quota : '',
      view_schedulesGroups : '',
      view_fecha_inicio : '',
      view_fecha_fin : '',
      view_place : '',
      view_name_owner : '',
      view_email_owner : '',
      view_focos : '',
      view_status : '',
      students: '',
      courseGroups: '',

      // Elementos de grupos
      id_group: '',
      groupsCourse: [],
      tutorsGroup: [],
      nameGroup: '',
      scheduleGroup: '',
      quotaGroup: '',
      placeGroup: '',
      selectTutor: '',
      tutorGroup: '',
      addBeneficiaryDni : '',
      addBeneficiaryGroup : '',
      id_course: '',
      dayGroup: '',
      hourStart: '08:00',
      hourEnd: '10:00',
      schedulesGroup: [],
      schedulesGroups : [],

      // dataTable
      datatableCourses: '',
      datatableBeneficiaries: null,
      pagination: 1,
      pivoteDataTable: false,
      // clases
      class_title : '',
      class_fecha_fin : '',
      class_fecha_fin_inscription : '',
      class_fecha_inicio : '',
      class_duration : '',
      class_cost : '',
      class_nameGroup : '',
      class_quotaGroup : '',

      // Certificados
      course_certified : '',
      certified_title : '',
      certified_header : '',
      certified_image : '',
      certified_file : '',
      certified_name_people1 : '',
      certified_name_people2 : '',
      certified_name_people3 : '',
      certified_name_people4 : '',
      certified_name_people5 : '',
      certified_name_people6 : '',
      certified_position_people1 : '',
      certified_position_people2 : '',
      certified_position_people3 : '',
      certified_position_people4 : '',
      certified_position_people5 : '',
      certified_position_people6 : '',
    }

  },



  props:['focos', 'courses', 'aliados', 'tutores'],

  methods:{


    addBeneficiary : function(){
      if (this.addBeneficiaryDni == '' || this.addBeneficiaryGroup == '' ) {
          toastr.error("Los campos no pueden quedar vacíos, intenta de nuevo.", 'Error');
          return;
      }
      axios.post('/addBeneficiary',  { addBeneficiaryDni : this.addBeneficiaryDni, addBeneficiaryGroup : this.addBeneficiaryGroup  }
      ).then(response => {
        if (response.data.type_msj == 'error') {
          toastr.error(response.data.msj, 'Error');
        }else{
          toastr.success(response.data.msj, 'Exito');
          this.addBeneficiaryDni = '',
          this.addBeneficiaryGroup = ''
        }
      }).catch(function (error){
        console.log(error);
      });
    },

    newGroup: function(id){
      this.class_nameGroup = '';
      this.class_quotaGroup = '';
      console.log('Id del curso: '+ this.id);
      axios.post('/newGroup',  { id_course : this.id, id_group: id}
      ).then(response => {
        this.id_group = response.data.group.id;
        this.nameGroup = response.data.group.name;
        this.quotaGroup = response.data.group.quota;
        this.placeGroup = response.data.group.place;
        this.tutorsSelected = response.data.tutorsSelected;
        this.schedulesGroup = response.data.schedulesGroup;
      }).catch(function (error){
        console.log(error);
      });
    },

    startSelectFocus : function(){
      $('#selectFocos').on('change', function (e) {
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;
      console.log();
      if (valueSelected != '') {
        if (!self.existeElement(valueSelected, self.focosSelected)) {
          self.focosSelected.push(self.buscarElemento(valueSelected, self.focos1));
        }
      }
      self.selectFocus = '';
      });
    },

    startSelectTutors :  function(){
      var self = this;
      $('#selectTutors').on('change', function (e) {
        console.log('Aquí entra con el select');
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;
      console.log(self.id_group + 'Numero del grupo');

      axios.post('/addTutorGroup', {id_group : self.id_group, id_tutor: this.value}
      ).then(response => {
        self.tutorsSelected = response.data.tutorsSelected;
      }).catch(function (error){
        console.log(error);
      });
      self.tutorGroup = '';
      });
    },

    deleteGroup: function(id, id_course){
      axios.post('/deleteGroup',  { id_group : id, id_course : id_course  }
      ).then(response => {
        console.log(response.data.msj);
        this.groupsCourse = response.data.groups;
        this.tutorsGroup = response.data.tutors;
      }).catch(function (error){
        console.log(error);
      });
    },

    addGroup: function(){
      var pivote = false;
      if (this.nameGroup == null || this.nameGroup == '') {
        this.class_nameGroup = 'is-invalid';
        pivote = true;
      }
      if (this.quotaGroup < 1) {
        this.class_quotaGroup = 'is-invalid';
        pivote = true;
      }
      if (pivote) {
        return;
      }

      var tutores = this.tutorsSelected.slice();
      let formData = new FormData();
      console.log('ID del grupo: '+this.id_group);
      formData.append('id', this.id_group);
      formData.append('name', this.nameGroup);
      formData.append('quota', this.quotaGroup);
      formData.append('place', this.placeGroup);
      formData.append('id_course_parent', this.id);
      var tutoresSeleccionados = JSON.stringify(this.tutorsSelected);
      console.log(tutoresSeleccionados);
      formData.append('tutoresSeleccionados', tutoresSeleccionados);
      console.log(this.focosArray);
      axios.post('/addGroup',  formData
    ).then(response => {
      console.log(response.data.msj);
      this.groupsCourse = response.data.groups;
      this.tutorsGroup = response.data.tutors;
      this.schedulesGroups = response.data.schedulesGroup;
      console.log('Horarios de grupo');
      console.log(response.data.schedulesGroup);
      console.log('Tutores por grupo');
      console.log(this.tutorsGroup);
    }).catch(function (error){
      console.log(error);
    });
    this.nameGroup = '';
    this.scheduleGroup = '';
    this.quotaGroup = '';
    this.placeGroup = '';
    this.tutorGroup = '';
    this.tutorsSelected = [];
    this.id_group = '';
  },

    openShowModal: function(id){
      this.id_course = id;
      axios.get('/manageEvents/'+id)
      .then(response => {
        this.view_title = response.data.course.title;
        this.view_type = response.data.course.type;
        this.view_description = response.data.course.description;
        this.view_duration = response.data.course.duration;
        this.view_duration_type = response.data.course.duration_type;
        this.view_url_image = response.data.course.url_image;
        this.view_quota = response.data.course.quota;
        this.view_ally = response.data.course.name + response.data.course.last_name;
        this.view_fecha_inicio = response.data.course.fecha_inicio;
        this.view_fecha_fin = response.data.course.fecha_fin;
        this.view_place = response.data.course.place;
        this.view_name_owner= response.data.course.name;
        this.view_email_owner= response.data.course.email;
        this.view_focos = response.data.focos;
        this.view_status = response.data.course.status;
        this.students = response.data.students;
        this.view_schedulesGroups = response.data.schedulesGroups;
        this.courseGroups = response.data.groups;
        this.tutorsGroup = response.data.tutors;

         $('#modalShow').modal('show');

         console.log(this.datatableBeneficiaries);
         var self = this;

         $('#modalShow').on('shown.bs.modal', function () {

           $('#table_pagination_beneficiaries').DataTable( {
             language: {
               url: '/js/Spanish.json'
             }
           });
           $('#table_pagination_beneficiaries').DataTable().destroy();

           if (!self.pivoteDataTable) {
             self.pivoteDataTable = true;
           }
        });


      }).catch(function (error){
        console.log(error);
      });

    },

    resetClasses: function(){
      this.class_title = "";
      this.class_fecha_fin = "";
      this.class_fecha_fin_inscription = "";
      this.class_fecha_inicio = "";
      this.class_duration = "";
      this.class_cost = "";
    },

    addChangeFocus: function(){
      this.resetClasses();
      var errorForm = true;
      if (this.title == null || this.title == '') {
        this.class_title = "is-invalid";
        errorForm = false;
      }
      if (this.fecha_inicio > this.fecha_fin) {
        this.class_fecha_fin = "is-invalid";
        errorForm = false;
      }
      if (this.fecha_inicio_inscription > this.fecha_fin_inscription) {
        this.class_fecha_fin_inscription = "is-invalid";
        errorForm = false;
      }
      if (this.fecha_inicio_inscription > this.fecha_inicio ) {
        this.class_fecha_inicio = "is-invalid";
        errorForm = false;
      }
      if (this.duration < 0 ) {
        this.class_duration = "is-invalid";
        errorForm = false;
      }
      if (this.cost < 0 ) {
        this.class_cost = "is-invalid";
        errorForm = false;
      }
      if (!errorForm) {
        this.pagination = 1;
        return;
      }

      this.spinner = true;
      let formData = new FormData();
      formData.append('id', this.id);
      formData.append('type', this.type);
      formData.append('title', this.title);
      formData.append('description', this.description);
      formData.append('duration', this.duration);
      formData.append('durationtext', this.durationtext);
      formData.append('quota', this.quota);
      formData.append('fecha_inicio', this.fecha_inicio);
      formData.append('fecha_fin', this.fecha_fin);
      formData.append('fecha_inicio_inscription', this.fecha_inicio_inscription);
      formData.append('fecha_fin_inscription', this.fecha_fin_inscription);
      formData.append('place', this.place);
      formData.append('cost', this.cost);
      formData.append('id_owner', this.id_owner);
      formData.append('status', this.status);
      formData.append('file', this.file);
      formData.append('schedule', this.schedule);
      var focosSeleccionados = JSON.stringify(this.focosSelected);
      formData.append('focosSeleccionados', focosSeleccionados);
      console.log(this.focosArray);
      axios.post('/manageEvents',  formData
      ).then(response => {
         // this.focos1 = response.data.focos;
         $('#modalFocus').modal('hide');
         $('#file').val('');
         this.spinner = false;
         toastr.success(response.data.msj, 'Exito');
         this.eventos = response.data.events;
         console.log(response.data.msj);
         this.resetClasses();
         this.changePagination(1);
      }).catch(function (error){
        console.log(error);
        this.spinner = false;
      });
    },

    eraseContent(id){
      axios.delete('/manage_focus/'+id)
      .then(response => {
         this.focos1 = response.data.focos;
         $('#file').val('');
         toastr.success(response.data.msj, 'Exito');
      }).catch(function (error){
        console.log(error);
      });
    },

    changePagination : function(number){
      this.pagination = number;
    },

    openModalContent: function(id){
      this.resetClasses();
      console.log('id = '+id);
      this.spinner = true;
      if (id== null) {
        this.schedule = '';
        this.description = '';
        this.imgMiniatura = '/images/default_activity.png';
        this.status = 'Borrador';
        this.id = '';
        this.type = '';
        this.title = '';
        this.description = '';
        this.duration = '';
        this.durationtext = '';
        this.quota = '';
        this.fecha_inicio = '';
        this.fecha_fin = '';
        this.fecha_inicio_inscription = '';
        this.fecha_fin_inscription = '';
        this.place = '';
        this.cost = '';
        this.id_owner = '';
        this.focosSelected = '';
        this.focosSelected = [];
        this.file = '';
        this.groupsCourse = [];
        this.nameGroup = '';
        this.scheduleGroup = '';
        this.quotaGroup = '';
        this.placeGroup = '';
        var id_course = null;
        axios.post('manageEvents/NewCourse',{
        })
        .then(response => {
          id_course = response.data.id_course;
          this.spinner = false;
          this.eventos = response.data.events;
          this.openModalContent(id_course);
          this.startSelectFocus();
        }).catch(function (error){
          this.spinner = false;
          console.log(error);
        });
        return;
      }else {
        var elemento = this.buscarElemento(id, this.eventos );
        axios.post('manageEvents/SearchCoursesFocos',{
          id : id
        })
        .then(response => {
          this.focosSelected = response.data.focos;
          this.groupsCourse = response.data.groups;
          this.tutorsGroup = response.data.tutors;
          console.log('Tutores cuando abro la ventana');
          console.log(response.data.tutors);
            console.log('Fin Tutores cuando abro la ventana');
          this.schedulesGroups = response.data.schedulesGroups;
          this.spinner = false;
          console.log(response.data.groups);
        }).catch(function (error){
          console.log(error);
          this.spinner = false;
        });
        this.id = elemento.id;
        this.type = elemento.type;
        this.title = elemento.title;
        this.description = elemento.description;
        this.duration = elemento.duration;
        this.durationtext = elemento.duration_type;
        this.quota = elemento.quota;
        this.id_owner = elemento.id_owner;
        this.fecha_inicio = this.convertDate(elemento.fecha_inicio);
        this.fecha_fin = this.convertDate(elemento.fecha_fin);
        this.fecha_inicio_inscription = this.convertDate(elemento.fecha_inicio_inscription);
        this.fecha_fin_inscription = this.convertDate(elemento.fecha_fin_inscription);
        this.place = elemento.place;
        this.cost = elemento.cost;
        this.status = elemento.status;
        this.imgMiniatura = elemento.url_image;
        this.file = null;
        this.schedule = elemento.schedule;
        // var focosSeleccionados = JSON.stringify(this.focosSelected);
      }
      $('#modalFocus').modal('show');
    },

    openModalAddBeneficiary : function(id_course){
      axios.get('/manageEvents/'+id_course)
      .then(response => {
        this.view_title = response.data.course.title;
        this.courseGroups = response.data.groups;
        $('#modalAddBeneficiary').modal('show');
      }).catch(function (error){
        console.log(error);
      });

    },

    deleteEvent : function(id){
      axios.delete('/manageEvents/'+id)
      .then(response => {
         this.eventos  = response.data.eventos;
         toastr.success(response.data.msj, 'Exito', {
           "progressBar": true,
         });
      }).catch(function (error){
        console.log(error);
      });
    },

    clickMe: function(){
      console.log('Funciona esta porquería');
    },

    cancelCreateEvent : function(id){
      axios.delete('/manageEvents/'+id)
      .then(response => {
         this.eventos  = response.data.eventos;
      }).catch(function (error){
        console.log(error);
      });
    },

    downloadInfo : function(id){
      console.log(id);
    },

    changeStatus: function(id, status){
      axios.post('/manageEvents/changeStatus', {
        id: id , status : status
      }).then(response => {
        this.eventos  = response.data.eventos;
        toastr.success(response.data.msj, 'Exito');
      }).catch(function (error){
      });
    },

    openModalFinalCourse: function(id){
      axios.get('/manageEvents/'+id)
      .then(response => {
        this.students = response.data.students;
         $('#toggle-contacto').bootstrapToggle();
         this.$forceUpdate();
         $('#studentsCourse').modal('show');
      }).catch(function (error){
        console.log(error);
      });
    },


    buscarElemento: function(id, array){
      var self = this;
      var elemento = null;
      (array).forEach(function(element) {
        if (element.id == id) {
          elemento =  element;
        }
      });
      return elemento;
    },

    existeElement: function(id, array){
      var self = this;
      var elemento = null;
      (array).forEach(function(element) {
        console.log(element.id == id);
        if (element.id == id) {
          elemento = element;
        }
      });
      if (elemento === null) {
        return false;
      }
      return true;
    },

    borrarFoco: function(id){
      var self = this;
      var contador = 0;

      for (var i = 0; i < (self.focosSelected).length; i++) {
        if (self.focosSelected[i].id == id){
          contador = i;
          break;
        }

      }
      self.focosSelected.splice(contador, 1);
    },

    borrarTutor: function(id, id_group){
      axios.post('/deleteTutorGroup', {id_tutor : id , id_group: this.id_group}
    ).then(response => {
      this.tutorsSelected = response.data.tutorsSelected;
    }).catch(function (error){
      console.log(error);
    });
    },

    closeModalContent(iFdelete){
      if (iFdelete) {
        this.cancelCreateEvent(this.id);
      }
      this.changePagination(1);
      $('#file').val('');
      $('#modalFocus').modal('hide');
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

    obtenerFileCertified(e){
      let file = e.target.files[0];
      this.certified_file = file;
      this.cargarFileCertified(file);
    },

    cargarFileCertified(file){
      let reader = new FileReader();
      reader.onload = (e) => {
        this.certified_image = e.target.result;
      }
      reader.readAsDataURL(file);
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

    convertDate: function(date){
      if (date != '' && date != null) {
        var fecha = date.substring(0, 10);
        var hora = date.substring(11, 19);
        return fecha;
      }
      return null;
    },

    addSchedule: function(){
      axios.post('/addSchedule', { id_group: this.id_group, day : this.dayGroup, hourStart: this.hourStart, hourEnd : this.hourEnd}
      ).then(response => {
        this.schedulesGroup = response.data.schedulesGroup;
        this.dayGroup = '';
        this.hourStart = '08:00';
        this.hourEnd = '10:00';
      }).catch(function (error){
        console.log(error);
      });
    },

    deleteShedule : function(id){
      axios.post('/deleteSchedule', {id_schedule : id, id_group: this.id_group }
      ).then(response => {
        this.schedulesGroup = response.data.schedulesGroup;
      }).catch(function (error){
        console.log(error);
      });
    },

    editCertified : function(id_course){
      console.log(id_course);
      axios.post('/searchCourse', {id_course : id_course }
      ).then(response => {
        this.course_certified = response.data.course;
        this.certified_title = response.data.course.certified_title;
        this.certified_header = response.data.course.certified_header;
        this.certified_image = response.data.course.certified_image;
        this.certified_name_people1 = response.data.course.certified_name_people1;
        this.certified_name_people2 = response.data.course.certified_name_people2;
        this.certified_name_people3 = response.data.course.certified_name_people3;
        this.certified_name_people4 = response.data.course.certified_name_people4;
        this.certified_name_people5 = response.data.course.certified_name_people5;
        this.certified_name_people6 = response.data.course.certified_name_people6;
        this.certified_position_people1 = response.data.course.certified_position_people1;
        this.certified_position_people2 = response.data.course.certified_position_people2;
        this.certified_position_people3 = response.data.course.certified_position_people3;
        this.certified_position_people4 = response.data.course.certified_position_people4;
        this.certified_position_people5 = response.data.course.certified_position_people5;
        this.certified_position_people6 = response.data.course.certified_position_people6;
      }).catch(function (error){
        console.log(error);
      });
      $('#modalEditCertified').modal('show');
    },

    closeModalBeneficiaries : function(){
      console.log('Entra a este metodo de cerrar MODAL');
      $('#table_pagination_beneficiaries').DataTable().destroy();
      $('#modalShow').modal('hide');
    },

    addChangeCertified : function(){
      let formData = new FormData();
      formData.append('id', this.course_certified.id);
      formData.append('certified_title', this.certified_title);
      formData.append('certified_header', this.certified_header);
      formData.append('certified_file', this.certified_file);
      formData.append('certified_name_people1', this.certified_name_people1);
      formData.append('certified_name_people2', this.certified_name_people2);
      formData.append('certified_name_people3', this.certified_name_people3);
      formData.append('certified_name_people4', this.certified_name_people4);
      formData.append('certified_name_people5', this.certified_name_people5);
      formData.append('certified_name_people6', this.certified_name_people6);
      formData.append('certified_position_people1', this.certified_position_people1);
      formData.append('certified_position_people2', this.certified_position_people2);
      formData.append('certified_position_people3', this.certified_position_people3);
      formData.append('certified_position_people4', this.certified_position_people4);
      formData.append('certified_position_people5', this.certified_position_people5);
      formData.append('certified_position_people6', this.certified_position_people6);
      axios.post('/saveChangesCertified',  formData
      ).then(response => {
         toastr.success(response.data.msj, 'Exito');
      }).catch(function (error){
        console.log(error);
      });


    }


  },

  mounted(){
    console.log(this.tutores1);
    var self = this;
    $('#selectFocos').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    console.log();
    if (valueSelected != '') {
      if (!self.existeElement(valueSelected, self.focosSelected)) {
        self.focosSelected.push(self.buscarElemento(valueSelected, self.focos1));
      }
    }
    self.selectFocus = '';
    });


    $('#selectTutors').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if (valueSelected != '') {
      if (!self.existeElement(valueSelected, self.tutorsSelected)) {
        console.log('Aqui entra nojodaa');
        self.tutorsSelected.push(self.buscarElemento(valueSelected, self.tutores1));
      }
    }
    self.tutorGroup = '';
    });


    $('#toggle-contacto').change(function() {
            if($(this).prop('checked')){
              console.log(true);
            }else{
              console.log(false);
            }
          });

          $("#hourStart").change(function(){
            self.hourEnd = self.hourStart;
            // $("#hourEnd").min= self.hourStart;
          });


        self.datatableCourses = $('#table_pagination').DataTable( {
          language: {
            url: '/js/Spanish.json'
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
