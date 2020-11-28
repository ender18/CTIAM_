<template >

    <div class="container pt-4 pb-3">
      <div class="row">
        <div class="col-12 text-center">
          <h2> <strong>Mis Actividades de formación matriculadas</strong></h2>
          <hr class="hr-pink-center">
        </div>
      </div>

      <div class="row">
        <div class="col-12 text-center" v-show="my_courses1.length == 0">
          <img :src= "'/images/grupo-mujeres.png'" class="img img-fluid" alt="">
        </div>
        <div class="col-12" v-if="my_courses1.length == 0">
          <h3><strong>No has matriculado ninguna actividad de formación, mira <a href="/showEvents">aquí</a>  las que tenemos dispobles para ti</strong></h3>
          <hr class="hr-pink-left">
        </div>
      </div>

      <div class="row">
        <div class="col-12" v-show="my_courses1.length > 0">
          <div class="table-responsive">
            <table class="table table-hover" id="table_my_courses">
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
                  <td>
                    <button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openShowModal(my_course.id_group, my_course.id_course_parent)"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-danger border-round" type="button" name="button" v-if="my_course.status == 'Matriculado' || my_course.status == 'En curso'" v-on:click="confirmCancelCourse(my_course.id)"> <i class="fas fa-times"></i></button>
                  </td>
                  <td class="text-center"><a v-if="my_course.url_certified != null" v-bind:href="my_course.url_certified" download>
                    <i class="fas fa-download fa-lg"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
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
                  <p><strong>Horario: </strong>{{schedule}}</p>
                  <p><strong>Lugar: </strong>{{place}}</p>
                  <p><strong>Encargado: </strong>{{name_owner}}</p>
                  <p><strong>Contacto: </strong>{{email_owner}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark txt-white border-round" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header border-0">
            <h4 class="modal-title" id="exampleModalLabel"><strong>¿Seguro que desea cancelar este curso?</strong></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="txt-danger">Despúes de cancelado el curso no podrá volver a matricularlo, ¿Estas seguro?</p>

          </div>
          <div class="modal-footer border-0">
            <div class="container">
              <div class="row">
                <div class="col-12 text-right">
                  <button type="button" class="btn btn-secondary border-round" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
                  <button type="button" class="btn btn-white border-color-pink color-pink border-round" v-on:click="cancelCourse()"><i class="fas fa-check"></i></button>

                </div>

              </div>

            </div>
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
                <div class="col-6 col-lg-3">
                  <p><strong>Estado: </strong>{{view_course.status}}</p>
                  <p><strong>Tipo: </strong>{{view_type}}</p>
                  <p><strong>Aliado: {{view_aliado}} </strong></p>
                  <p><strong>Foco(s): </strong>{{view_focos}}</p>
                  <p><strong>Grupo: </strong>{{view_course.name}}</p>
                </div>
                <div class="col-6 col-lg-5">
                  <p><strong>Duración: </strong>{{view_duration}} {{view_duration_type}}</p>
                  <p><strong>Fecha inicio inscripción: </strong>{{view_course.fecha_inicio_inscription}}</p>
                  <p><strong>Fecha Fin inscripción: </strong>{{view_course.fecha_fin_inscription}}</p>
                  <p><strong>Costo: </strong>{{view_course.cost}}</p>
                  <p><strong>Cupo: </strong>{{view_course.quota}}</p>
                </div>
                <div class="col-6 col-lg-4">
                  <p><strong>Fecha de Inicio: </strong>{{view_fecha_inicio}}</p>
                  <p><strong>Fecha Fin: </strong>{{view_fecha_fin}}</p>
                  <p><strong>Estado curso: </strong>{{view_course.status_group}}</p>
                  <p><strong>lugar: </strong>{{view_course.place}}</p>
                </div>
              </div>

              <div class="row pt-4">
                <div class="col-12">
                  <h5><strong>Datos del grupo</strong> </h5>
                  <hr class="hr-pink-left">
                </div>
              </div>

              <div class="row">
                <div class="col-6 col-lg-4">
                  <p><strong>Grupo: </strong>{{view_course.name}}</p>
                  <p><strong>Lugar: </strong>{{view_course.place}}</p>
                </div>
                <div class="col-6 col-lg-4">
                  <p><strong>Cupo: </strong>{{view_course.quota}}</p>
                </div>
                <div class="col-6 col-lg-4">
                  <p><strong>Estado curso: </strong>{{view_course.status_group}}</p>
                </div>
              </div>
              <div class="row pt-4">
                <div class="col-12">
                  <h5><strong>Horarios</strong></h5>
                  <hr class="hr-pink-left">
                </div>
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Día</th>
                          <th scope="col">Hora Inicio</th>
                          <th scope="col">Hora Fin</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="schedule in schedules">
                          <th scope="row">{{schedule.day}}</th>
                          <td>{{schedule.hour_start}}</td>
                          <td>{{schedule.hour_end}}</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>

                </div>

              </div>

              <div class="row pt-4">
                <div class="col-12">
                  <h5><strong>Beneficiarias Matriculadas ({{students.length}})</strong></h5>
                  <hr class="hr-pink-left">
                </div>
              </div>

                <div class="row d-none">
                <div class="col-12" v-if="students.length > 0">
                  <div class="table-responsive">
                    <table class="table table-hover" id="table_pagination_beneficiaries_tutor">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Email</th>
                          <th scope="col">Telefono</th>
                          <th scope="col">Dirección</th>
                          <th scope="col">Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="student in students">
                          <th scope="row">{{student.last_name}} {{student.name}}</th>
                          <td>{{student.email}}</td>
                          <td>{{student.phone}}</td>
                          <td>{{student.adress}} {{student.neighborhood}}</td>
                          <td>{{student.status}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
            </div>
          <div class="modal-footer border-0">
            <button type="button" class="btn btn-dark txt-white border-round" v-on:click="closeModalBeneficiaries()"><i class="fas fa-times"></i> </button>
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

      view_course: '',
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
      view_aliado:'',
      view_name_owner: '',
      schedules : ''

    }
  },



props:['my_courses'],

methods:{

  openShowModal: function(id_group, id_course){

    console.log(id_group + " --- "+ id_course);
    var elemento = this.buscarElemento(id_course, this.my_courses1);
    console.log(this.my_courses1);
    this.view_course = elemento;
    console.log(this.view_course);
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
    console.log(elemento);


    axios.post('/showGroup',{
      id_group: id_group, id_course: id_course
    })
    .then(response => {
      console.log(response.data.focos);
      console.log(response.data.students);
      this.view_focos = response.data.focos;
      this.students = response.data.students;
      this.schedules = response.data.schedules;

      console.log(response.data.owner.name);

      if (response.data.owner.name != null) {
        this.view_aliado = response.data.owner.name;
      }
      if (response.data.owner.last_name != null) {
        this.view_aliado = this.view_aliado + ' ' + response.data.owner.last_name;
      }

      $('#modalShow').modal('show');

      $('#modalShow').on('shown.bs.modal', function () {

        $('#table_pagination_beneficiaries_tutor').DataTable( {
          language: {
            url: '/js/Spanish.json'
          }
        });
        $('#table_pagination_beneficiaries_tutor').DataTable().destroy();

     });

    }).catch(function (error){
      console.log(error);
    });

  },
    // openShowModal: function(id_group, id_course){
    //
    //   var elemento = this.buscarElemento(id_group, this.my_courses1);
    //
    //   this.view_type = elemento.type;
    //   this.view_title = elemento.title;
    //   this.view_description = elemento.description;
    //   this.view_duration = elemento.duration;
    //   this.view_duration_type = elemento.duration_type;
    //   this.view_url_image = elemento.url_image;
    //   this.view_fecha_inicio = elemento.fecha_inicio;
    //   this.view_fecha_fin = elemento.fecha_fin;
    //   this.view_fecha_inicio_inscription = elemento.fecha_inicio_inscription;
    //   this.view_fecha_fin_inscription = elemento.fecha_fin_inscription;
    //   this.view_cost = elemento.cost;
    //   this.view_status = elemento.status_group;
    //   this.view_name = elemento.name;
    //   this.view_quota = elemento.quota;
    //   this.view_schedule = elemento.schedule;
    //   this.view_place = elemento.place;
    //
    //   axios.post('/showGroup',{
    //     id_group: id_group, id_course: id_course
    //   })
    //   .then(response => {
    //     console.log(response.data.focos);
    //     console.log(response.data.students);
    //     this.view_focos = response.data.focos;
    //     this.students = response.data.students;
    //     this.view_name_owner = response.data.owner.name+' '+response.data.owner.last_name;
    //     $('#modalShow').modal('show');
    //
    //   }).catch(function (error){
    //     console.log(error);
    //   });
    //   // this.id_course = id;
    //   // axios.get('/manageEvents/'+id)
    //   // .then(response => {
    //   //   this.title = response.data.course.title;
    //   //   this.type = response.data.course.type;
    //   //   this.description = response.data.course.description;
    //   //   this.duration = response.data.course.duration;
    //   //   this.duration_type = response.data.course.duration_type;
    //   //   this.url_image = response.data.course.url_image;
    //   //   this.quota = response.data.course.quota;
    //   //   this.fecha_inicio = response.data.course.fecha_inicio;
    //   //   this.fecha_fin = response.data.course.fecha_fin;
    //   //   this.place = response.data.course.place;
    //   //   this.name_owner= response.data.course.name;
    //   //   this.email_owner= response.data.course.email;
    //   //   this.schedule= response.data.course.schedule;
    //   //   this.focos = response.data.focos;
    //   //    $('#modalShow').modal('show');
    //   // }).catch(function (error){
    //   //   console.log(error);
    //   // });
    //
    // },

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
        if (element.id_course_parent == id) {
          elemento =  element;
        }
      });
      return elemento;

    },

    closeModalBeneficiaries : function(){
      console.log('Entra a este metodo de cerrar MODAL');
      $('#table_pagination_beneficiaries_tutor').DataTable().destroy();
      $('#modalShow').modal('hide');
    },

  },

  mounted(){

    $('#table_my_courses').DataTable( {
      language: {
        url: '/js/Spanish.json',

      }
    });

  }

}
</script>

<style>
</style>
