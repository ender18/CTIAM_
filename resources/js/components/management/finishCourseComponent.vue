
<template>

  <div class="container pt-4 pb-3">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center" v-if="this.finish_course"><strong>Proceso de calificación de la actividad de formación</strong></h1>
        <h1 class="text-center" v-if="!this.finish_course"><strong>Actividad de formación Calificada</strong></h1>
        <hr class="hr-pink-center">
      </div>
    </div>

    <div class="row pt-4 d-flex justify-content-center">
      <div class="col-8 col-lg-3 ">
        <img v-bind:src="curso1.url_image"  class="img img-fluid" alt="">
      </div>
      <div class="col-12 col-lg-9 pt-4 pt-lg-0">
        <h2>{{curso1.title}}</h2>
        <hr class="hr-pink-left">
        <p>{{curso1.description}}</p>
          <div class="row">
            <div class="col-lg-4 col-12">
              <p><strong>Estado: </strong>{{curso1.status}}</p>
              <p><strong>Tipo: </strong>{{curso1.type}}</p>
              <p><strong>Foco(s): </strong> {{focos_string1}}</p>
            </div>
            <div class="col-lg-4 col-12">
              <p><strong>Cupo máximo: </strong>{{curso1.quota}} personas<p>
                <p><strong>Fecha de Inicio: </strong>{{curso1.fecha_inicio}}</p>
                <p><strong>Fecha Fin: </strong>{{curso1.fecha_fin}}</p>
              </div>
              <div class="col-lg-4 col-12">
                <p><strong>Duración: </strong>{{curso1.duration}}</p>
                <p><strong>Encargado: </strong>{{curso1.name}}</p>
                <p><strong>Contacto: </strong>{{curso1.email}}</p>
              </div>
            </div>
        </div>
      </div>

      <div class="row pt-4" v-if="students1.length > 0 && students2 == ''">
        <div class="col-12">
          <h4>A continuación, señale la aprobación o no de la actividad de formación por parte de cada beneficiaria:</h4>
          <hr class="hr-pink-left">
        </div>
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="student in students1">
                  <th scope="row">{{student.last_name}} {{student.name}}</th>
                  <td>
                    <button type="button" name="button" style="background:transparent; border:none; outline:none; display:block;" v-on:click="aprobarNoAprobar(student.id)">
                      <!-- <input id="toggle-has-children"  type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="warning" data-on="Aprobado" checked data-off="No Aprobado"> -->
                      <input type="checkbox" checked data-toggle="toggle" data-width="150" data-size="sm" data-onstyle="success" data-style="ios" data-offstyle="ligth" data-on="Aprobado" checked data-off="No Aprobado">
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr>
        </div>
      </div>

    <div class="row pt-4" v-if="!this.finish_course && this.students2.length > 0">
      <div class="col-12">
        <h4>Beneficiarias de la actividad de formación</h4>
        <hr class="hr-pink-left">
      </div>
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="thead-light" >
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="student2 in students2">
                <th scope="row">{{student2.last_name}} {{student2.name}}</th>
                <td v-if="student2.status == 'Aprobado'">
                  <button type="button" class="btn btn-outline-success">Aprobado <i class="far fa-check-circle"></i></button>
                </td>
                <td v-if="student2.status == 'No Aprobado'">
                  <button type="button" class="btn btn-outline-danger">No Aprobado <i class="far fa-times-circle"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
          <hr>
      </div>
    </div>

    <div class="row" v-if="students.length == 0 && this.finish_course">
      <div class="col-12">
        <h4>No hay ninguna beneficiaria matriculada, presione 'Terminar'</h4>
        <hr class="hr-pink-left">
      </div>
    </div>

    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <button class="btn btn-secondary btn-lg border-round" type="button" name="button" v-on:click="finishCourse()" v-if="this.finish_course">Terminar</button>
        <a href="/myEventsAliado"><button class="btn btn-secondary btn-lg border-round" type="button" name="button" v-if="!this.finish_course">Ir a mis actividades de formación</button></a>
      </div>

    </div>

  </div>


</template>

<script>
export default {

  data(){
    return{
      curso1 : this.curso,
      students1 : this.students,
      focos_string1 : this.focos_string,
      id_aproved : [],
      id_no_aproved : [],
      id1 : this.id,
      id_group1 : this.id_group,
      students2 : '',
      finish_course: true


    }
  },


  props:['curso', 'students', 'focos_string', 'id', 'id_group'],

  methods:{

    aprobarNoAprobar: function(id){
      var index = (this.id_aproved).indexOf(id);
      var element_shift = null;
      if (index > -1) {

        element_shift = (this.id_aproved).splice(index, 1);
        (this.id_no_aproved).push(parseInt(element_shift, 10));
      }else {
        index = (this.id_no_aproved).indexOf(id);
        element_shift = (this.id_no_aproved).splice(index, 1);
        (this.id_aproved).push(parseInt(element_shift, 10));
      }
      console.log(this.id_aproved);
      console.log(this.id_no_aproved);
    },

    finishCourse: function(){
      axios.post('/manage_focus/finishCourse',{
        id_course : this.id1,
        id_group : this.id_group1,
        id_aproved : this.id_aproved,
        id_no_aproved : this.id_no_aproved
      })
      .then(response => {
        console.log(response.data.msj);
        this.students2 = response.data.students;
        this.finish_course = false;
      }).catch(function (error){
        console.log(error);
      });
    },

    separarArray: function(){
      for (var i = 0; i < this.students1.length; i++) {
        (this.id_aproved).push(this.students1[i].id);
      }
    },





  },

  mounted(){
    this.separarArray();
    console.log(this.id1);
  }


}
</script>

<style>

.toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }
</style>
