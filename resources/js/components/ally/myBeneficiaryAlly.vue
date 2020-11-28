<template >

<div class="container pt-4 pb-4">
  <div class="row">
    <div class="col-12 text-center">
      <h2> <strong>Mis usuarios</strong></h2>
      <hr class="hr-pink-center">
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <h4><strong>Beneficiarias</strong></h4>
      <hr class="hr-pink-left">
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-hover" id="table_beneficiaries_ally1">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">email</th>
              <th scope="col">Telefono</th>
              <th scope="col">Fecha Nacimiento</th>
              <th scope="col">Edad</th>
              <th scope="col">Dirección</th>
              <th scope="col">Comuna</th>
              <th scope="col">Cursos Inscritos</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="beneficiary in beneficiaries" v-if="beneficiary.name_rol == 'beneficiaria'">
              <th scope="row">{{beneficiary.name}} {{beneficiary.last_name}}</th>
              <td>{{beneficiary.email}}</td>
              <td>{{beneficiary.phone}}</td>
              <td>{{beneficiary.birthdate}}</td>
              <td>{{calcularEdad(beneficiary.birthdate)}}</td>
              <td >{{beneficiary.adress}}</td>
              <td>{{beneficiary.commune}}</td>
              <td>{{buscarCantidadCursos(beneficiary.id)}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="row pt-4">
    <div class="col-12">
      <h4><strong>Tutores</strong></h4>
      <hr class="hr-pink-left">
    </div>
  </div>


    <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-hover" id="table_tutors_ally1">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">email</th>
              <th scope="col">Telefono</th>
              <th scope="col">Fecha Nacimiento</th>
              <th scope="col">Edad</th>
              <th scope="col">Dirección</th>
              <th scope="col">Comuna</th>
              <th scope="col">Grupos a cargo</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="tutor in beneficiaries" v-if="tutor.name_rol == 'tutor'">
              <th scope="row">{{tutor.name}} {{tutor.last_name}}</th>
              <td>{{tutor.email}}</td>
              <td>{{tutor.phone}}</td>
              <td>{{tutor.birthdate}}</td>
              <td>{{calcularEdad(tutor.birthdate)}}</td>
              <td >{{tutor.adress}}</td>
              <td>{{tutor.commune}}</td>
              <td>{{buscarCantidadCursosACargo(tutor.id)}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

</template>

<script>
export default {

  data(){
      return{
        cantidad_cursos1 : this.cantidad_cursos,
        beneficiaries1: this.beneficiaries,
        cantidad_cursos_a_cargo1 : this.cantidad_cursos_a_cargo
      }
  },

  props:['cantidad_cursos', 'beneficiaries', 'cantidad_cursos_a_cargo'],

  methods:{
    calcularEdad: function(fecha_nacimiento){

      var hoy = new Date();
      var cumpleanos = new Date(fecha_nacimiento);
      var edad = hoy.getFullYear() - cumpleanos.getFullYear();
      var m = hoy.getMonth() - cumpleanos.getMonth();

      if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
          edad--;
      }

      return edad;

    },

    buscarCantidadCursos(id){
      var cant_courses = (this.cantidad_cursos1).find(course => course.id_users == id);
      if (cant_courses == null) {
        return '0';
      }
      return cant_courses.total;
    },

    buscarCantidadCursosACargo(id){
      var cant_courses = (this.cantidad_cursos_a_cargo1).find(course => course.id_tutor == id);
      if (cant_courses == null) {
        return '0';
      }
      return cant_courses.total;
    },


  },

  mounted(){

        $('#table_beneficiaries_ally1').DataTable( {
              language: {
                url: '/js/Spanish.json',

              }
            });

        $('#table_tutors_ally1').DataTable( {
              language: {
                url: '/js/Spanish.json',

              }
            });


  }

}
</script>

<style lang="css" scoped>
</style>
