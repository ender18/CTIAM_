<template >

  <div class="container">
    <div class="row">
      <div id="msj" v-show="a"  class="col-12">
        <div class="alert alert-success" role="alert">
          {{msj}}
        </div>
      </div>
      <div class="col-12" v-if="events_with_preferences1.length == 0 && events_without_preferences1.length == 0">
        <h4>No hay ninguna actividad de formación para mostrar.</h4>
        <hr>
      </div>
      <div class="col-12" v-if="events_with_preferences1.length >0">
        <h4>Actividades de formación recomendadas para ti</h4>
        <hr>
      </div>
      <div class="col-12" >
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3 mt-2" v-for="evento in events_with_preferences1">
            <div class="card">
              <a  v-on:click="openShowModal(evento.id)"><img class="card-img-top img-fluid" v-bind:src="evento.url_image" alt=""></a>
              <div class="card-body text-center">
                <h5 class="card-tittle">{{evento.title}}</h5>
                <p class="card-text">Tipo: {{evento.type}}</p>
                <button type="button" class="btn btn-dark txt-white" v-on:click="openShowModal(evento.id)">Ver Info</button>
                <button type="button" class="btn btn-secondary btn-lg" v-on:click="suscribe(evento.id)">Inscribirme</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12" v-if="events_with_preferences1.length == 0 && events_without_preferences1.length > 0">
        <br>
        <h4>Actividades de formación</h4>
        <hr>
      </div>
      <div class="col-12" v-if="events_with_preferences1.length > 0 && events_without_preferences1.length > 0">
        <br>
        <h4>Otras actividades de formación</h4>
        <hr>
      </div>
      <div class="col-12" >
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3 mt-2" v-for="evento1 in events_without_preferences1">
            <div class="card">
              <a  v-on:click="openShowModal(evento1.id)"><img class="card-img-top img-fluid" v-bind:src="evento1.url_image" alt=""></a>
              <div class="card-body text-center">
                <h5 class="card-tittle">{{evento1.title}}</h5>
                <p class="card-text">Tipo: {{evento1.type}}</p>
                <button type="button" class="btn btn-dark txt-white" v-on:click="openShowModal(evento1.id)">Ver Info</button>
                <button type="button" class="btn btn-secondary btn-lg" v-on:click="suscribe(evento1.id)">Inscribirme</button>
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
              <div class="row">
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
                  <!-- <p><strong>Cupo máximo: </strong>{{view_quota}} personas</p> -->
                  <p><strong>Fecha de Inicio: </strong>{{view_fecha_inicio}}</p>
                  <p><strong>Fecha Fin: </strong>{{view_fecha_fin}}</p>
                  <p><strong>Aliado: {{view_name_owner}}</strong>  </p>
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
                        <th scope="col">email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="group in courseGroups">
                        <th scope="row">{{group.nameGroup}}</th>
                        <td>{{group.quota}}</td>
                        <td>{{group.schedule}}</td>
                        <td>{{group.place}}</td>
                        <td>{{group.name}} {{group.last_name}}</td>
                        <td>{{group.email}}</td>
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

    <div class="modal fade bd-example-modal-lg" id="modalShowSubscribe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Inscripción al curso</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-3">
                  <img v-bind:src="view_url_image"  class="img img-fluid" alt="">
                </div>
                <div class="col-9">
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

              <div class="col-12">
                <hr>
                <h5>Grupos ({{courseGroups.length}})</h5>
                <p>A continuación, seleccione el curso al cual desea inscribirse</p>
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
                          <button type="button" class="btn btn-secondary" v-on:click="subscribeGroup(group.id)" name="button">Inscribirme</button>
                        </td>
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

    <div class="modal fade" id="modalSuscribe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
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
          <div class="modal-footer">
            <button type="button" class="btn btn-dark txt-white" data-dismiss="modal">Ver más actividades de formación</button>
             <a href="/myEvents" class="btn btn-secondary">ir a Mis Actividades</a>
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
      view_id_course: '',
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
           $('#modalShow').modal('show');

        }).catch(function (error){
          console.log(error);
        });

      },

      suscribe: function(id){
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
        console.log(id);
        axios.post('/manageEvents/suscribe', { id: id})
        .then(response =>{
          this.msj = response.data.msj;
          this.events_with_preferences1 = response.data.events_with_preferences;
          this.events_without_preferences1 = response.data.events_without_preferences;
          $('#modalShowSubscribe').modal('hide');
          $('#modalSuscribe').modal('show');
          // $('#modalShow').modal('hide');

        }).catch(function(error){
          console.log(error);
        });


      },


      showMessage: function(msj, status){
        this.msj = msj;
        this.a = true;
        $("#msj").fadeIn(500);
        setTimeout(function(){
            $("#msj").fadeOut();
            this.a = false;
        }, 2000);
      },



}




}
</script>

<style>
</style>
