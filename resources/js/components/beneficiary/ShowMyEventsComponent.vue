<template >



    <div class="container">
      <div class="row">
        <div id="msj" v-show="a"  class="col-12">
          <div class="alert alert-success" role="alert">
            {{msj}}
          </div>
        </div>
        <div class="col-12" v-if="my_courses1.length == 0">
          <br>
          <h3>No has matriculado ninguna actividad de formación, mira <a href="/showEvents">aquí</a>  las que tenemos dispobles para ti</h3>
          <br>
        </div>
        <div class="col-12" v-if="my_courses1.length > 0">
          <h2 class="text-center" >Mis Actividades de formación matriculadas</h2>
          <hr>

        </div>
        <div class="col-12" v-if="my_courses1.length > 0">
          <table class="table" >
            <thead class="thead-light" >
              <tr>
                <th scope="col"></th>
                <th scope="col">Título</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>
                <th scope="col">Certificado <i class="fas fa-file-pdf"></i></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="my_course in my_courses1">
                <td><img v-bind:src="my_course.url_image" alt="" class="img img-fluid" style="width: 50px"></td>
                <th scope="row" >{{my_course.title}}</th>
                <td>{{my_course.type}}</td>
                <td>{{my_course.status}}</td>
                <td><button class="btn btn-secondary" type="button" name="button" v-on:click="openShowModal(my_course.id_group, my_course.id_course_parent)">Ver <i class="far fa-question-circle"></i></button> <button class="btn btn-danger" type="button" name="button"
                  v-if="my_course.status == 'Matriculado' || my_course.status == 'En curso'" v-on:click="confirmCancelCourse(my_course.id)">Cancelar <i class="far fa-times-circle"></i></button>
                </td>
                <td class="text-center"><a v-if="my_course.url_certified != null" v-bind:href="my_course.url_certified" download>
                  <i class="fas fa-download fa-lg"></i>
                </a></td>

              </tr>
            </tbody>
          </table>
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
                      <p><strong>Horario: </strong>{{schedule}}</p>

                      <p><strong>Lugar: </strong>{{place}}</p>
                      <p><strong>Encargado: </strong>{{name_owner}}</p>
                      <p><strong>Contacto: </strong>{{email_owner}}</p>
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

        <div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea cancelar este curso?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                      <p class="txt-danger">Despúes de cancelado el curso no podrá volver a matricularlo, ¿Estas seguro?</p>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" v-on:click="cancelCourse()">Si</button>
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
                      <p><strong>Grupo: </strong>{{view_name}}</p>
                      <p><strong>Estado: </strong>{{view_status}}</p>
                      <p><strong>Tipo: </strong>{{view_type}}</p>
                      <p><strong>Duración: </strong>{{view_duration}} {{view_duration_type}}</p>
                      <p><strong>Horario: </strong>{{view_schedule}} </p>
                      <p><strong>Foco(s): </strong>{{view_focos}}</p>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-6">
                        <p><strong>Lugar: </strong>{{view_place}} </p>
                        <p><strong>Cupo máximo: </strong>{{view_quota}} personas</p>
                        <p><strong>Fecha de Inicio: </strong>{{view_fecha_inicio}}</p>
                        <p><strong>Fecha Fin: </strong>{{view_fecha_fin}}</p>
                      </div>

                        <div class="col-6">
                          <p><strong>Fecha de Inicio (Inscripción): </strong>{{view_fecha_inicio_inscription}}</p>
                          <p><strong>Fecha Fin: (Inscripción) </strong>{{view_fecha_fin_inscription}}</p>
                          <p><strong>Costo: </strong>{{view_cost}}</p>
                          <p><strong>Aliado: {{view_name_owner}}</strong> </p>
                        </div>
                      </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-12">

                      <hr>
                      <h5>Beneficiarias Matriculadas ({{students.length}})</h5>
                    </div>
                    <div class="col-12" v-if="students.length > 0 && (this.view_status == 'En curso' || this.view_status == 'Por calificar' || this.view_status == 'Finalizado')">
                      <table class="table table-hover">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Nombre</th>
                              <th scope="col">Email</th>
                              <th scope="col">Telefono</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="student in students">
                              <th scope="row">{{student.last_name}} {{student.name}}</th>
                              <td>{{student.email}}</td>
                              <td>{{student.phone}}</td>
                            </tr>
                          </tbody>
                        </table>

                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark txt-white" data-dismiss="modal">Cerrar</button>
              </div>
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

      my_courses1 : this.my_courses,
      msj: '',
      a: false,

      id_matricula: '',
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

      view_type:'',
      view_title:'',
      view_description:'',
      view_duration:'',
      view_duration_type:'',
      view_url_image:'',
      view_fecha_inicio:'',
      view_fecha_fin:'',
      view_fecha_inicio_inscription:'',
      view_fecha_fin_inscription:'',
      view_cost:'',
      view_status:'',
      view_name:'',
      view_quota:'',
      view_schedule:'',
      view_place:'',
      view_focos:'',
      students:'',
      view_name_owner:''

    }
  },



props:['my_courses'],

methods:{
    openShowModal: function(id_group, id_course){

      var elemento = this.buscarElemento(id_group, this.my_courses1);

      this.view_type = elemento.type;
      this.view_title = elemento.title;
      this.view_description = elemento.description;
      this.view_duration = elemento.duration;
      this.view_duration_type = elemento.duration_type;
      this.view_url_image = elemento.url_image;
      this.view_fecha_inicio = elemento.fecha_inicio;
      this.view_fecha_fin = elemento.fecha_fin;
      this.view_fecha_inicio_inscription = elemento.fecha_inicio_inscription;
      this.view_fecha_fin_inscription = elemento.fecha_fin_inscription;
      this.view_cost = elemento.cost;
      this.view_status = elemento.status_group;
      this.view_name = elemento.name;
      this.view_quota = elemento.quota;
      this.view_schedule = elemento.schedule;
      this.view_place = elemento.place;

      axios.post('/showGroup',{
        id_group: id_group, id_course: id_course
      })
      .then(response => {
        console.log(response.data.focos);
        console.log(response.data.students);
        this.view_focos = response.data.focos;
        this.students = response.data.students;
        this.view_name_owner = response.data.owner.name+' '+response.data.owner.last_name;
        $('#modalShow').modal('show');

      }).catch(function (error){
        console.log(error);
      });
      // this.id_course = id;
      // axios.get('/manageEvents/'+id)
      // .then(response => {
      //   this.title = response.data.course.title;
      //   this.type = response.data.course.type;
      //   this.description = response.data.course.description;
      //   this.duration = response.data.course.duration;
      //   this.duration_type = response.data.course.duration_type;
      //   this.url_image = response.data.course.url_image;
      //   this.quota = response.data.course.quota;
      //   this.fecha_inicio = response.data.course.fecha_inicio;
      //   this.fecha_fin = response.data.course.fecha_fin;
      //   this.place = response.data.course.place;
      //   this.name_owner= response.data.course.name;
      //   this.email_owner= response.data.course.email;
      //   this.schedule= response.data.course.schedule;
      //   this.focos = response.data.focos;
      //    $('#modalShow').modal('show');
      // }).catch(function (error){
      //   console.log(error);
      // });

    },

    confirmCancelCourse: function(id){
      this.id_matricula = id;
      console.log(id);
        $('#confirm_modal').modal('show');


    },

    cancelCourse: function(){
      axios.post('/myEvents/cancelCourse',{ id: this.id_matricula})
      .then(response => {
        this.my_courses1 = response.data.courses;
        $('#confirm_modal').modal('hide');
      }).catch(function (error){
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

    probarToggle: function(id_toggle){
      var status = document.getElementById(id_toggle).checked;
      console.log(status);
    },

    buscarElemento: function(id, array){
      var self = this;
      var elemento = null;
      (array).forEach(function(element) {
        if (element.id_group == id) {
          elemento =  element;
        }
      });
      return elemento;

    }

  }
}
</script>

<style>
</style>
