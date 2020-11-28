<template >

  <div class="container pt-4 pb-4">
    <div class="row">
      <div class="col-12 text-center">
        <h2> <strong>Mis actividades de formación asignadas</strong></h2>
        <hr class="hr-pink-center">
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-hover" id="table_courses_tutor">
            <thead class="thead-light" >
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Grupo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="course in courses1">
                <th scope="row">{{course.title}}</th>
                <td>{{course.name}}</td>
                <td>{{course.type}}</td>
                <td>{{course.status_group}}</td>
                <td><button type="button" class="btn btn-primary border-round" name="button" title="Ver información" v-on:click="openInfo(course.id, course.id_course_parent)"><i class="fas fa-eye"></i></button>
                  <a  v-bind:href="'/finishCourse?id_course='+course.id_course_parent+'&id_group='+course.id"><button type="button" class="btn btn-success border-round" name="button" title="Calificar" v-if="course.status_group == 'Por calificar'"><i class="fas fa-check">

                  </i></button></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <!-- Modal de ver información -->
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

                <div class="row">

                <div class="col-12">
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
  return{
    courses1: this.courses,

    // Elementos del modal a mostrar
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

props:['courses'],

methods:{

  openInfo: function(id_group, id_course){

    console.log(id_group + " --- "+ id_course);
    var elemento = this.buscarElemento(id_group, this.courses1);
    this.view_course = elemento;
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

  closeModalBeneficiaries : function(){
    console.log('Entra a este metodo de cerrar MODAL');
    $('#table_pagination_beneficiaries_tutor').DataTable().destroy();
    $('#modalShow').modal('hide');
  },

},

mounted(){


  $('#table_courses_tutor').DataTable( {
        language: {
          url: '/js/Spanish.json',

        }
      });

}






}
</script>
