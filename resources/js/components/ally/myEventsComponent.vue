<template >

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary text-center" >Mis actividades de formación asignadas</h2>
        <hr>
      </div>
      <div class="col-12">
        <table class="table table-hover">
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
              <td><button type="button" class="btn btn-primary" name="button" title="Ver información" v-on:click="openInfo(course.id, course.id_course_parent)"><i class="fas fa-eye"></i></button>
                  <a  v-bind:href="'/finishCourse?id_course='+course.id_course_parent+'&id_group='+course.id"><button type="button" class="btn btn-success" name="button" title="Calificar" v-if="course.status_group == 'Por calificar'"><i class="fas fa-check">

                  </i></button></a>
               </td>
            </tr>
          </tbody>
        </table>

      </div>

    </div>

    <!-- Modal de ver información -->
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
                      <p><strong>Aliado: {{view_aliado}}</strong></p>

                    </div>
                  </div>

                  </div>
                </div>
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
    courses1: this.courses,

    // Elementos del modal a mostrar

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
    view_aliado:''


  }

},

props:['courses'],

methods:{

  openInfo: function(id_group, id_course){

    console.log(id_group + " --- "+ id_course);
    var elemento = this.buscarElemento(id_group, this.courses1);

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
      this.view_aliado = response.data.owner.name+ " "+ response.data.owner.last_name;

      $('#modalShow').modal('show');

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

}






}
</script>
