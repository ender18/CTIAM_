<template >

  <div class="container pb-3">
    <div class="row pt-4">
      <div class="col-12 text-center">
        <h2> <strong>Administración de usuarios</strong> </h2>
        <hr class="hr-pink-center">
      </div>
    </div>


    <div class="row">
      <div class="col-12">
        <h4><strong>Beneficiarias</strong></h4>
        <hr class="hr-pink-left" >
      </div>
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-hover" id="table_beneficiaries">
            <thead class="thead-light">
              <tr class="text-center">
                <th scope="col">Nombre</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Telefono</th>
                <th scope="col">Estado de cuenta</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in usuarios1" v-if="user.description == 'Beneficiaria'" >
                <th scope="row">{{user.last_name}} {{user.name}}</th>
                <td>{{user.email}}</td>
                <td >{{user.phone}}</td>
                <td v-if="user.status == 'activated'"><h6 class="badge-pill text-center">Activada</h6></td>
                <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-primary text-white text-center">Suspendida</h6></td>
                <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
                <td class="text-center" v-if="user.status == 'suspended'"><button class="btn btn-secondary border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

<!-- Aliados -->
    <div class="row pt-4">
      <div class="col-12">
        <h4><strong>Aliados</strong></h4>
        <hr class="hr-pink-left" >
      </div>
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-hover" id="table_ally">
            <thead class="thead-light">
              <tr class="text-center">
                <th scope="col">Nombre</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Telefono</th>
                <th scope="col">Estado de cuenta</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in usuarios1" v-if="user.description == 'Aliado'" >
                <th scope="row"> {{user.last_name}} {{user.name}}</th>
                <td>{{user.email}}</td>
                <td >{{user.phone}}</td>
                <td v-if="user.status == 'activated'"><h6 class="badge-pill text-center">Activada</h6></td>
                <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-primary text-white text-center">Suspendida</h6></td>
                <td v-if="user.status == 'pending'"><h6 class="badge-pill bg-secondary text-white text-center">Pendiente de activación</h6></td>
                <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
                <td class="text-center" v-if="user.status == 'suspended' || user.status == 'pending'"><button class="btn btn-secondary border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Aliados -->
        <div class="row pt-4">
          <div class="col-12">
            <h4><strong>Tutores</strong></h4>
            <hr class="hr-pink-left" >
          </div>
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-hover" id="table_tutors">
                <thead class="thead-light">
                  <tr class="text-center">
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo Electronico</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Estado de cuenta</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="user in usuarios1" v-if="user.description == 'Tutor'" >
                    <th scope="row"> {{user.last_name}} {{user.name}}</th>
                    <td>{{user.email}}</td>
                    <td >{{user.phone}}</td>
                    <td v-if="user.status == 'activated'"><h6 class="badge-pill text-center">Activada</h6></td>
                    <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-primary text-white text-center">Suspendida</h6></td>
                    <td v-if="user.status == 'pending'"><h6 class="badge-pill bg-secondary text-white text-center">Pendiente de activación</h6></td>
                    <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
                    <td class="text-center" v-if="user.status == 'suspended' || user.status == 'pending'"><button class="btn btn-secondary  border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
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

      usuarios1 : this.usuarios
    }
  },

  props:['usuarios'],
  methods:{
    changeStatus: function(id, status){
      toastr.warning('Procesando petición', 'Espere...');
      console.log(id);
      console.log(status);
      axios.post('/manageUsers/changeStatus',{
        id : id, status: status
      })
      .then(response => {
         this.usuarios1 = response.data.usuarios;
         toastr.success('Se ha cambiado el estado', 'Exito');
      }).catch(function (error){
        console.log(error);
      });
    }
  },

  mounted(){

    $('#table_beneficiaries').DataTable( {
          language: {
            url: '/js/Spanish.json'
          }
        });

    $('#table_ally').DataTable( {
              language: {
                url: '/js/Spanish.json'
              }
            });

    $('#table_tutors').DataTable( {
          language: {
            url: '/js/Spanish.json'
          }
        });




  }

}
</script>

<style>
</style>
