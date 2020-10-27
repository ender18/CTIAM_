<template >

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center" >Administración de usuarios</h1>
        <hr>
      </div>
      <div class="col-12">
        <h3>Beneficiarias</h3>
        <table class="table">
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
              <td v-if="user.status == 'activated'"><h6 class="badge-pill bg-success text-white text-center">Activada</h6></td>
              <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-warning text-dark text-center">Suspendida</h6></td>
              <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-warning" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
              <td class="text-center" v-if="user.status == 'suspended'"><button class="btn btn-success" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

<!-- Aliados -->
    <div class="row">
      <div class="col-12">
        <hr>
        <h3>Aliados</h3>
        <table class="table">
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
              <td v-if="user.status == 'activated'"><h6 class="badge-pill bg-success text-white text-center">Activada</h6></td>
              <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-warning text-dark text-center">Suspendida</h6></td>
              <td v-if="user.status == 'pending'"><h6 class="badge-pill bg-primary text-white text-center">Pendiente de activación</h6></td>
              <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-warning" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
              <td class="text-center" v-if="user.status == 'suspended' || user.status == 'pending'"><button class="btn btn-success" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Aliados -->
        <div class="row">
          <div class="col-12">
            <hr>
            <h3>Tutores</h3>
            <table class="table">
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
                  <td v-if="user.status == 'activated'"><h6 class="badge-pill bg-success text-white text-center">Activada</h6></td>
                  <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-warning text-dark text-center">Suspendida</h6></td>
                  <td v-if="user.status == 'pending'"><h6 class="badge-pill bg-primary text-white text-center">Pendiente de activación</h6></td>
                  <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-warning" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
                  <td class="text-center" v-if="user.status == 'suspended' || user.status == 'pending'"><button class="btn btn-success" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
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

      usuarios1 : this.usuarios
    }
  },


  props:['usuarios'],

  methods:{

    changeStatus: function(id, status){
      console.log(id);
      console.log(status);
      axios.post('/manageUsers/changeStatus',{
        id : id, status: status
      })
      .then(response => {
         this.usuarios1 = response.data.usuarios;
      }).catch(function (error){
        console.log(error);
      });


    }

  }

}
</script>

<style>
</style>
