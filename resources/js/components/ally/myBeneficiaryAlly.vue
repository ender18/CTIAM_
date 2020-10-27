<template >

<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <h2>Beneficiarias</h2>
      <hr>
    </div>
    <div class="col-12">
      <table class="table table-hover">
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


            <!-- <td><button type="button" class="btn btn-primary" name="button" title="Ver información" v-on:click="openShowModal(my_course.id)"><i class="fas fa-eye"></i></button>
             </td> -->
          </tr>
        </tbody>
      </table>

    </div>
    <div class="col-12 text-center">
      <br>
      <h2>Tutores</h2>
      <hr>
    </div>

    <div class="col-12">
      <table class="table table-hover">
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
            <!-- <td><button type="button" class="btn btn-primary" name="button" title="Ver información" v-on:click="openShowModal(my_course.id)"><i class="fas fa-eye"></i></button>
             </td> -->
          </tr>
        </tbody>
      </table>

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


  }

}
</script>

<style lang="css" scoped>
</style>
