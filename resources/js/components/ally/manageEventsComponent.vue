<template>

  <div class="container">
    <spinner v-show="spinner"></spinner>
    <div class="row">
      <div id="msj" v-show="a"  class="col-12">
        <div class="alert alert-success" role="alert">
          {{msj}}
        </div>
      </div>
      <div class="col-8">
        <h2>Administración de Actividades de formación y capacitación</h2>

      </div>
      <div class="col-2">
        <form class="" action="/downloadInfoCourse" method="get">
          <button  class="btn btn-success" type="submit" name="button" v-on:click="downloadInfo(view_id_course)">Descargar información <i class="far fa-file-excel"></i></button>
        </form>

      </div>
      <div class="col-2">
        <button class="btn btn-primary " type="button" name="button" v-on:click="openModalContent(null)"><i class="fas fa-plus" ></i> Nueva Actividad</button>

      </div>
      <div class="col-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Titulo</th>
              <th scope="col">Descripción</th>
              <th scope="col">Estado</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="foco in eventos">
              <th scope="row">{{foco.title}}</th>
              <td >{{foco.description}}</td>
              <td v-if="foco.status === 'Borrador'"><h6 class="badge-pill bg-primary text-white text-center">{{foco.status}}</h6></td>
              <td v-if="foco.status === 'Publicado'"><h6 class="badge-pill bg-dark text-white text-center">{{foco.status}}</h6></td>
              <td v-if="foco.status === 'En curso'"><h6 class="badge-pill bg-warning text-center">{{foco.status}}</h6></td>
              <td v-if="foco.status === 'Por calificar'"><h6 class="badge-pill bg-light text-center">{{foco.status}}</h6></td>
              <td v-if="foco.status === 'Finalizado'"><h6 class="badge-pill bg-success text-white text-center">{{foco.status}}</h6></td>
              <td v-if="foco.status === 'Cancelado'"><h6 class="badge-pill bg-danger text-white text-center">{{foco.status}}</h6></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opciones
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

    <!-- Modal Foco -->
    <div class="modal fade bd-example-modal-lg" id="modalFocus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header content-center">
            <h5 class="modal-title content-center">Editar / Agregar Actividades</h5>
          </div>
          <div class="modal-body">
            <form class="form-group" v-on:submit.prevent="addChangeFocus">
              <div class="row">
                <div class="col-4">
                  <div class="row">
                    <div class="col-12" >
                      <img v-bind:src="imgMiniatura" alt="" class="img img-fluid">
                    </div>
                    <div class="col-12">
                      <label for="">Cambiar Imagen (400*400 px)</label>
                      <input type="file" id="file" @change="obtenerFile" class="form-control-file" name="file">
                    </div>
                  </div>
                </div>
                <div class="col-8">
                  <div class="row">
                    <div class="col-4 form-group">
                      <label>Tipo</label>
                      <select class="form-control" v-model="type">
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
                      <input class="form-control" type="text" name="" value="" v-model="title">
                    </div>
                    <div class="col-12 form-group">
                      <label for="">Descripción</label>
                      <textarea class="form-control" rows="3" v-model="description"></textarea>
                    </div>
                    <div class="col-4 form-group">
                      <label for="">Duración</label>
                      <input class="form-control" type="number" name="" value="" v-model="duration">
                    </div>
                    <div class="col-4 form-group">
                      <label>Unidad de tiempo</label>
                      <select class="form-control" v-model="durationtext">
                        <option>Horas</option>
                        <option>Dias</option>
                        <option>Semanas</option>
                        <option>Meses</option>
                        <option>Años</option>
                      </select>
                    </div>
                    <div class="col-4 form-group">
                      <label for="">Costo ($)</label>
                      <input class="form-control" type="number" name="" value="" v-model="cost">
                    </div>
                  </div>
                </div>


                <div class="col-3 form-group">
                  <label for="">Fecha de inicio</label>
                  <input class="form-control" type="date" name="" value="" v-model="fecha_inicio">
                </div>
                <div class="col-3 form-group">
                  <label for="">Fecha de finalización</label>
                  <input class="form-control" type="date" name="" value="" v-model="fecha_fin">
                </div>

                <div class="col-3 form-group">
                  <label for="">Fecha inicio inscripción</label>
                  <input class="form-control" type="date" name="" value="" v-model="fecha_inicio_inscription">
                </div>
                <div class="col-3 form-group">
                  <label for="">Fecha fin inscripción</label>
                  <input class="form-control" type="date" name="" value="" v-model="fecha_fin_inscription">
                </div>

                <div class="col-12">
                  <div class="row">
                    <div class="col-6 form-group">
                      <label for="">Aliado a quien pertenece la actividad de formación:</label>
                    </div>
                    <div class="col-6 form-group">
                      <select class="form-control" v-model="id_owner">
                        <option v-for="aliado in aliados1" v-bind:value="aliado.id"> {{aliado.last_name}} {{aliado.name}}</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-4">
                  <div class="row">
                    <div class="col-12 form-group">
                      <label for="exampleFormControlSelect1">Foco(s) al que pertenece</label>
                      <select class="form-control" id="selectFocos" v-model="selectFocus">
                        <option value="">Selecione uno o varios focos...</option>
                        <option v-for="foco in focos1" v-bind:value="foco.id">{{foco.name}}</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-8">
                  <div class="row">
                    <div class="col-12">
                      <label for="">Focos seleccionados</label>
                    </div>
                    <div class="col-12" v-if="focosSelected.length == 0">
                      <label for=""><strong>No se ha seleccionado ningun foco</strong></label>
                    </div>
                    <div class="col-4 form-group" v-for="focoSelected in focosSelected">
                      <div class="input-group">
                        <!-- <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required> -->
                        <p class="form-control">{{focoSelected.name}}</p>
                        <button class="btn btn-danger" type="button" name="button" v-on:click="borrarFoco(focoSelected.id)">
                          <div class="input-group-prepend">
                            <i class="far fa-trash-alt"></i>
                          </div>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>




                <div class="col-12">
                  <div class="text-center">
                    <label class="text-center"><strong>GRUPOS</strong></label>
                  </div>
                  <div class="row form-group">
                    <div class="col-2 form-group">
                      <label for="">Nombre</label>
                      <input type="text" id="nameGroupForm" class="form-control" name="" value="" v-model="nameGroup" placeholder="Ej. A">
                    </div>
                    <div class="col-2 form-group">
                      <label for="">Cupo</label>
                      <input type="number" class="form-control" name="" value="" v-model="quotaGroup">
                    </div>
                    <div class="col-2 form-group">
                      <label for="">Horario</label>
                      <input type="text" class="form-control" name="" value="" v-model="scheduleGroup">
                    </div>
                    <div class="col-2 form-group">
                      <label for="">Lugar</label>
                      <input type="text" class="form-control" name="" value="" v-model="placeGroup">
                    </div>
                    <div class="col-3 form-group">
                      <label for="">Tutor</label>
                      <select class="form-control" id="selectTutors" v-model="tutorGroup">
                        <option value="">Selecione uno o varios tutores...</option>
                        <option v-for="tutor in tutores1" v-bind:value="tutor.id"> {{tutor.last_name}} {{tutor.name}}</option>
                      </select>
                    </div>
                    <div class="col-1 d-flex align-items-center">
                      <button type="button" class="btn btn-primary" name="button" v-on:click="addGroup()"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-12">
                          <label for="">Tutores seleccionados</label>
                        </div>
                        <div class="col-12" v-if="tutorsSelected.length == 0">
                          <label for=""><strong>No se ha seleccionado ningun tutor</strong></label>
                        </div>
                        <div class="col-3 form-group" v-for="tutorSelected in tutorsSelected">
                          <div class="input-group">
                            <!-- <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required> -->
                            <p class="form-control">{{tutorSelected.name}}</p>
                            <button class="btn btn-danger" type="button" name="button" v-on:click="borrarTutor(tutorSelected.id)">
                              <div class="input-group-prepend">
                                <i class="far fa-trash-alt"></i>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-12" v-if="groupsCourse.length > 0">
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Cupo</th>
                          <th scope="col">Horario</th>
                          <th scope="col">Lugar</th>
                          <th scope="col">Tutor(es)</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="group in groupsCourse">
                          <th scope="row">{{group.nameGroup}}</th>
                          <td>{{group.quota}}</td>
                          <td>{{group.schedule}}</td>
                          <td>{{group.place}}</td>
                          <td> <p v-for="tutor in tutorsGroup" v-if="tutor.id_group == group.id"> {{tutor.name}} {{tutor.last_name}} </p> </td>
                          <td><button class="btn btn-danger" type="button" name="button" v-on:click="deleteGroup(group.id, id)">
                            <div class="input-group-prepend">
                              <i class="far fa-trash-alt"></i>
                            </div>
                          </button></td>
                        </tr>
                      </tbody>
                    </table>
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" v-on:click="closeModalContent()">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar actividad</button>
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
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <img v-bind:src="view_url_image"  class="img img-fluid" alt="">
                </div>
                <div class="col-6">
                  <h1>{{view_title}}</h1>
                  <p>{{view_description}}</p>
                  <p><strong>Estado: </strong>{{view_status}}</p>
                  <p><strong>Tipo: </strong>{{view_type}}</p>
                  <p><strong>Foco(s): </strong>{{view_focos}}</p>
                  <p><strong>Duración: </strong>{{view_duration}} {{view_duration_type}}</p>
                  <p><strong>Aliado: {{view_ally}} </strong></p>
                  <p><strong>Fecha de Inicio: </strong>{{view_fecha_inicio}}</p>
                  <p><strong>Fecha Fin: </strong>{{view_fecha_fin}}</p>
                  <form class="" action="/downloadInfoCourse" method="get">
                    <input type="hidden" name="id_course" v-model="id_course">
                    <button  class="btn btn-success" type="submit" name="button" v-on:click="downloadInfo(view_id_course)">Descargar información <i class="far fa-file-excel"></i></button>
                  </form>
                </div>
              </div>

              <div class="col-12">
                <hr>
                <h5>Grupos ({{courseGroups.length}})</h5>
              </div>
              <div class="col-12" v-if="courseGroups.length > 0">
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
                        <td>{{group.schedule}}</td>
                        <td>{{group.place}}</td>
                        <td> <p v-for="tutor in tutorsGroup" v-if="tutor.id_group == group.id"> {{tutor.name}} {{tutor.last_name}} </p> </td>
                        <td>{{group.status_group}}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>

                <div class="col-12">
                  <hr>
                  <h5>Beneficiarias Matriculadas ({{students.length}})</h5>
                </div>
                <div class="col-12" v-if="students.length > 0">
                  <table class="table table-hover">
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
          <div class="modal-footer">
            <button type="button" class="btn btn-dark txt-white" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="modalAddBeneficiary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Añadir beneficiaria al curso "{{view_title}}"</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-5">
                  <input type="number" class="form-control" name="" placeholder="Documento de identidad" v-model="addBeneficiaryDni" >
                </div>
                <div class="col-5">
                  <select class="form-control" id="selectTutors" v-model="addBeneficiaryGroup">
                    <option value="">Selecione el grupo</option>
                    <option v-for="group in courseGroups" v-bind:value="group.id"> {{group.nameGroup}}</option>
                  </select>
                </div>
                <div class="col-2">
                  <button type="button" class="btn btn-primary" name="button" v-on:click="addBeneficiary()"><i class="fas fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark txt-white" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>



  </div>

</template>

<script>


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
      view_schedule : '',
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
      id_course: ''


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


      var tutores = this.tutorsSelected.slice();

        let formData = new FormData();
        console.log('Nombre del grupo: '+this.nameGroup);
        formData.append('name', this.nameGroup);

        formData.append('quota', this.quotaGroup);
        formData.append('schedule', this.scheduleGroup);
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

      document.getElementById("nameGroupForm").focus();



    },

    searchTutor: function(){



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
        this.view_schedule = response.data.course.schedule;
        this.courseGroups = response.data.groups;
        this.tutorsGroup = response.data.tutors;
         $('#modalShow').modal('show');

      }).catch(function (error){
        console.log(error);
      });

    },

    addChangeFocus: function(){
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

    openModalContent: function(id){
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
         toastr.success(response.data.msj, 'Exito');
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
          break;
        }
      contador = i;
      }
      self.focosSelected.splice(contador, 1);
    },

    borrarTutor: function(id){
      var self = this;
      var contador = 0;

      for (var i = 0; i < (self.tutorsSelected).length; i++) {
        if (self.tutorsSelected[i].id == id){
          break;
        }
      contador = i;
      }
      self.tutorsSelected.splice(contador, 1);
    },

    closeModalContent(){
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

  }


}
</script>

<style>
</style>
