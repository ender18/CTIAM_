<template >
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="text-primary" >Mis actividades de formación propuestas</h2>
        <hr>
      </div>
      <div class="col-12">
        <table class="table table-hover">
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
              <th scope="row">{{my_course.title}}</th>
              <td>{{my_course.type}}</td>
              <td>{{my_course.status}}</td>
              <td >{{buscarCantidadGrupos(my_course.id)}}</td>
              <td>{{buscarCantidadBeneficiarias(my_course.id)}}</td>
              <td><button type="button" class="btn btn-primary" name="button" title="Ver información" v-on:click="openShowModal(my_course.id)"><i class="fas fa-eye"></i></button>
               </td>
            </tr>
          </tbody>
        </table>


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
                        <td>{{group.name}} {{group.last_name}}</td>
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
         $('#modalShow').modal('show');

      }).catch(function (error){
        console.log(error);
      });

    },


  }

}
</script>

<style lang="css" scoped>
</style>
                                                                                                                                                                                                                                      
