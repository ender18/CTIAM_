<template >

  <div class="container pt-4 pb-3">

    <div class="row">
      <div class="col-12 text-center">
        <h2> <strong>Actividades de formación ofertadas</strong></h2>
        <hr class="hr-pink-center">
      </div>
    </div>
    <div class="row pt-4">
      <div class="col-12" v-if="events_with_preferences1.length == 0 && events_without_preferences1.length == 0">
        <h4><strong>No hay ninguna actividad de formación para mostrar.</strong></h4>
        <hr class="hr-pink-left">
      </div>
    </div>

    <div class="row pt-4">
      <div class="col-12" v-if="events_with_preferences1.length >0">
        <h4><strong>Actividades de formación recomendadas para ti</strong></h4>
        <hr class="hr-pink-left">
      </div>
      <div class="col-12" >
        <div class="row">
          <div class="col-6 col-lg-3 mt-2" v-for="evento in events_with_preferences1">
            <div class="card border-0 shadow">
              <a  v-on:click="openShowModal(evento.id)"><img class="card-img-top img-fluid" v-bind:src="evento.url_image" alt="" style="cursor: pointer"></a>
              <div class="card-body text-center">
                <h5 class="card-tittle">{{evento.title}}</h5>
                <p class="card-text">Tipo: {{evento.type}}</p>
                <button type="button" class="btn btn-secondary btn-lg border-round" v-on:click="openShowModal(evento.id)">Inscribirme</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="row">

      <div class="col-12" v-if="events_with_preferences1.length == 0 && events_without_preferences1.length > 0">
        <h4><strong>Actividades de formación</strong></h4>
        <hr class="hr-pink-left">
      </div>
      <div class="col-12" v-if="events_with_preferences1.length > 0 && events_without_preferences1.length > 0">
        <h4><strong>Otras actividades de formación</strong></h4>
        <hr class="hr-pink-left">
      </div>
      <div class="col-12" >
        <div class="row">
          <div class="col-6 col-lg-3 mt-2  d-flex align-items-stretch" v-for="evento1 in events_without_preferences1">
            <div class="card border-0 shadow ">
              <a  v-on:click="openShowModal(evento1.id)"><img class="card-img-top img-fluid" v-bind:src="evento1.url_image" alt="" style="cursor: pointer"></a>
              <div class="card-body text-center">
                <h5 class="card-tittle">{{evento1.title}}</h5>
                <p class="card-text">Tipo: {{evento1.type}}</p>
                <button type="button" class="btn btn-secondary btn-lg border-round" v-on:click="openShowModal(evento1.id)">Inscribirme</button>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>

    <div class="modal fade" id="modalShow1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row d-flex">
                <div class="col-6">

                  <img v-bind:src="url_image"  class="img img-fluid" alt="">

                </div>
                <div class="col-6">
                  <h1>{{title}}</h1>
                  <p>{{description}}</p>
                  <p><strong>Tipo: </strong>{{type}}</p>
                  <p><strong>Foco(s): </strong>{{focos}}</p>
                  <p><strong>Duración: </strong>{{duration}} {{duration_type}}</p>
                  <p><strong>Cupo máximo: </strong>{{quota}} personas</p>
                  <p><strong>Fecha de Inicio: </strong>{{fecha_inicio}}</p>
                  <p><strong>Fecha Fin: </strong>{{fecha_fin}}</p>
                  <p><strong>Hoario: </strong>{{schedule}}</p>
                  <p><strong>Lugar: </strong>{{place}}</p>
                  <p><strong>Encargado: </strong>{{name_owner}}</p>
                  <p><strong>Contacto: </strong>{{email_owner}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-lg" v-on:click="suscribe(id_course)">Inscribirme</button>
            <button type="button" class="btn btn-dark txt-white" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

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
              <div class="row  justify-content-center">
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
                  <p><strong>Aliado: {{view_name_owner}} </strong></p>
                  <p><strong>Foco(s): </strong>{{view_focos}}</p>
                </div>
                <div class="col-6 col-lg-4">
                  <p><strong>Duración: </strong>{{view_duration}} {{view_duration_type}}</p>
                  <p><strong>Fecha inicio inscripción: </strong>{{view_course.fecha_inicio_inscription}}</p>
                  <p><strong>Fecha Fin inscripción: </strong>{{view_course.fecha_fin_inscription}}</p>
                </div>
                <div class="col-6 col-lg-4">
                  <p><strong>Fecha de Inicio: </strong>{{view_fecha_inicio}}</p>
                  <p><strong>Fecha Fin: </strong>{{view_fecha_fin}}</p>
                  <p><strong>Costo: {{view_course.cost}}</strong></p>
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
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="group in courseGroups">
                          <th scope="row">{{group.nameGroup}}</th>
                          <td>{{group.quota}}</td>
                          <td><p v-for="schedule in view_schedulesGroups" v-if="schedule.id_group == group.id"> {{schedule.day}} ({{schedule.hour_start}}-{{schedule.hour_end}}) </p></td>
                          <td>{{group.place}}</td>
                          <td> <p v-for="tutor in tutorsGroup" v-if="tutor.id_group == group.id"> {{tutor.name}} {{tutor.last_name}} </p> </td>
                          <td>  <button type="button" class="btn btn-secondary border-round" v-on:click="subscribeGroup(group.id)" name="button">Inscribirme</button>
                          </td>
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
              </div>
            </div>
          </div>
          <div class="modal-footer border-0">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-dark txt-white border-round" v-on:click="closeModalBeneficiaries()"><i class="fas fa-times"></i> </button>


              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modalShowSubscribe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header border-0">
            <div class="container">
              <div class="row">
                <div class="col-10 text-center">
                  <h2><strong>Inscripción al curso</strong> </h2>
                  <hr class="hr-pink-center">
                </div>
                <div class="col-2 text-right">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row d-flex justify-content-center">
                <div class="col-8 col-lg-3">
                  <img v-bind:src="view_url_image"  class="img img-fluid" alt="">
                </div>
                <div class="col-12 col-lg-9">
                  <h1>{{view_title}}</h1>
                  <p>{{view_description}}</p>
                  <div class="row">
                    <div class="col-6">
                      <p><strong>Foco(s): </strong>{{view_focos}}</p>
                      <p><strong>Duración: </strong>{{view_duration}} {{view_duration_type}}</p>
                      <p><strong>Aliado: {{view_name_owner}}</strong> </p>
                    </div>
                    <div class="col-6">
                      <p><strong>Fecha de Inicio: </strong>{{view_fecha_inicio}}</p>
                      <p><strong>Fecha Fin: </strong>{{view_fecha_fin}}</p>
                    </div>
                  </div>
                  <!-- <p><strong>Cupo máximo: </strong>{{view_quota}} personas</p> -->
                </div>
              </div>

              <div class="row pt-4">
                <div class="col-12">
                  <h4><strong>Grupos ({{courseGroups.length}})</strong></h4>
                  <hr class="hr-pink-left">
                  <p>A continuación, seleccione el curso al cual desea inscribirse</p>
                </div>
              </div>

              <div class="row">
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
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="group in courseGroups">
                          <th scope="row">{{group.nameGroup}}</th>
                          <td>{{group.quota}}</td>
                          <td>{{group.schedule}}</td>
                          <td>{{group.place}}</td>
                          <td>{{group.name}} {{group.last_name}}</td>
                          <td>
                            <button type="button" class="btn btn-secondary border-round" v-on:click="subscribeGroup(group.id)" name="button">Inscribirme</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-dark txt-white border-round" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalSuscribe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header border-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h5>{{msj}}</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0">
            <button type="button" class="btn btn-dark txt-white border-round" data-dismiss="modal">Ver más actividades de formación</button>
             <a href="/myEvents" class="btn btn-secondary border-round">ir a Mis Actividades</a>
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
      events_with_preferences1 : this.events_with_preferences,
      events_without_preferences1 : this.events_without_preferences,

      a: false,
      msj: '',

      // Elementos del curso a mostrar
      id_course: '',
      title : '',
      type : '',
      description : '',
      duration : '',
      duration_type : '',
      url_image : '',
      quota : '',
      fecha_inicio : '',
      fecha_fin : '',
      place : '',
      name_owner : '',
      email_owner : '',
      focos : '',
      schedule : '',

      // Elementos del curso
      view_course  : '',
      view_title  : '',
      view_type  : '',
      view_description  : '',
      view_duration  : '',
      view_duration_type  : '',
      view_url_image  : '',
      view_quota : '',
      view_name : '',
      view_last_name : '',
      view_fecha_inicio : '',
      view_fecha_fin : '',
      view_place  : '',
      view_name_owner : '',
      view_email_owner : '',
      view_focos : '',
      view_status : '',
      students  : '',
      view_schedulesGroups  : '',
      courseGroups : '',
      tutorsGroup : '',

      // Elementos de grupos
      groupsCourse: [],
      nameGroup: '',
      scheduleGroup: '',
      quotaGroup: '',
      placeGroup: '',
      selectTutor: '',
      tutorGroup: ''



    }


  },

props:[ 'events_with_preferences', 'events_without_preferences'],

methods:{
      openShowModal: function(id){
        this.id_course = id;
        axios.get('/manageEvents/'+id)
        .then(response => {
          this.view_course = response.data.course;
          this.view_title = response.data.course.title;
          this.view_type = response.data.course.type;
          this.view_description = response.data.course.description;
          this.view_duration = response.data.course.duration;
          this.view_duration_type = response.data.course.duration_type;
          this.view_url_image = response.data.course.url_image;
          this.view_quota = response.data.course.quota;
          this.view_name = response.data.course.name;
          this.view_last_name = response.data.course.last_name;
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

        }).catch(function (error){
          console.log(error);
        });

      },

      suscribeClose: function(id){
          $('#modalShow').modal('hide');

          console.log('El id de suscribeClose: +'+ id);
          this.suscribe(id);
      },

      suscribe: function(id){
        console.log('El id de suscribe: ' +id);
        console.log('Aqui llega');
        axios.get('/manageEvents/'+id)
        .then(response => {
          this.view_title = response.data.course.title;
          this.view_type = response.data.course.type;
          this.view_description = response.data.course.description;
          this.view_duration = response.data.course.duration;
          this.view_duration_type = response.data.course.duration_type;
          this.view_url_image = response.data.course.url_image;
          this.view_quota = response.data.course.quota;
          this.view_fecha_inicio = response.data.course.fecha_inicio;
          this.view_fecha_fin = response.data.course.fecha_fin;
          this.view_place = response.data.course.place;
          this.view_name_owner= response.data.course.name+' '+response.data.course.last_name;
          this.view_email_owner= response.data.course.email;
          this.view_focos = response.data.focos;
          this.view_status = response.data.course.status;
          this.students = response.data.students;
          this.view_schedule = response.data.course.schedule;
          this.courseGroups = response.data.groups;
          $('#modalShowSubscribe').modal('show');
        }).catch(function (error){
          console.log(error);
        });

      },

      subscribeGroup: function(id){
        $('#modalShowSubscribe').modal('hide');

        $('#modalShow').modal('hide');
        console.log(id);
        toastr.warning('Procesando solicitud', 'Espere...');
        axios.post('/manageEvents/suscribe', { id: id})
        .then(response =>{
          this.msj = response.data.msj;
          this.events_with_preferences1 = response.data.events_with_preferences;
          this.events_without_preferences1 = response.data.events_without_preferences;
          $('#modalSuscribe').modal('show');
        }).catch(function(error){
          console.log(error);
        });


      },

      closeModalBeneficiaries : function(){
        $('#modalShow').modal('hide');
      },


      showMessage: function(msj, status){
        toastr.success(msj, 'Exito');
      },



}




}
</script>

<style>
</style>
