<template >
  <div class="container pb-3">
    <div class="row pt-4">
      <div class="col-12 text-center">
        <h2> <strong>Mis actividades de formación propuestas</strong></h2>
        <hr class="hr-pink-center">
      </div>
    </div>

      <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-hover" id="table_courses">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Tipo</th>
                <th scope="col">Grupos</th>
                <th scope="col">Beneficiarias</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="my_course in my_courses1">
                <th scope="row" v-on:click="openShowModal(my_course.id)" style="cursor: pointer;">{{my_course.title}}</th>
                <td v-on:click="openShowModal(my_course.id)" style="cursor: pointer;">{{my_course.type}}</td>
                <td v-on:click="openShowModal(my_course.id)" style="cursor: pointer;">{{my_course.status}}</td>
                <td v-on:click="openShowModal(my_course.id)" style="cursor: pointer;" >{{buscarCantidadGrupos(my_course.id)}}</td>
                <td v-on:click="openShowModal(my_course.id)" style="cursor: pointer;">{{buscarCantidadBeneficiarias(my_course.id)}}</td>
                <td><button type="button" class="btn btn-primary" name="button" title="Ver información" v-on:click="openShowModal(my_course.id)"><i class="fas fa-eye"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- modal Finalizar  -->
    <!-- Modal traido de manageEventsComponnet -->
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
      my_courses1 : this.my_courses,
      my_groups1 : this.my_groups,
      my_beneficiaries1 : this.my_beneficiaries,

      // Elementos de la vista
      view_course: '',
      view_id_course: '',
      view_name: '',
      view_last_name: '',
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

    }

  },

  props:['my_courses', 'my_groups', 'my_beneficiaries'],

  methods:{

    buscarCantidadGrupos(id){
      var cant_groups = (this.my_groups1).find(group => group.id_course_parent == id);
      if (cant_groups == null) {
        return '0';
      }
      return cant_groups.total;
    },

    buscarCantidadBeneficiarias(id){
      var cant_beneficiaries = (this.my_beneficiaries1).find(beneficiary => beneficiary.id_course_parent == id);
      console.log(cant_beneficiaries);
      if (cant_beneficiaries == null) {
        return '0';
      }
      return cant_beneficiaries.total;
    },

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

    closeModalBeneficiaries : function(){
      $('#table_pagination_beneficiaries').DataTable().destroy();
      $('#modalShow').modal('hide');
    },


  },

  mounted(){
    $('#table_courses').DataTable( {
          language: {
            url: '/js/Spanish.json',

          }
        });

  }

}
</script>

<style lang="css" scoped>
</style>
                                                                                                                                                                                                                                      
