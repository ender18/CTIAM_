<template >

  <div class="container pb-3">
    <div class="row pt-4">
      <div class="col-12 text-center">
        <h2> <strong>Administración de usuarios {{superadmin1}}</strong> </h2>
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
                <th scope="col">DNI</th>
                <th scope="col">Tipo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Telefono</th>
                <th scope="col">Estado de cuenta</th>
                <th scope="col">Opciones</th>
                <th scope="col" v-if="superadmin1"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in usuarios1" v-if="user.description == 'Beneficiaria'" >
                <th scope="row"> {{user.dni}}</th>
                <td> {{user.type_dni}}</td>
                <td> {{user.last_name}} {{user.name}}</td>
                <td>{{user.email}}</td>
                <td >{{user.phone}}</td>
                <td v-if="user.status == 'activated'"><h6 class="badge-pill text-center">Activada</h6></td>
                <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-primary text-white text-center">Suspendida</h6></td>
                <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
                <td class="text-center" v-if="user.status == 'suspended'"><button class="btn btn-secondary border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
                <td  v-if="superadmin1">
                  <button type="button" name="button" v-on:click="editUser(user.user_id)" class="btn btn-primary border-round"><i class="fas fa-pen"></i> </button>
                </td>
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
                <th scope="col">DNI</th>
                <th scope="col">Tipo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Telefono</th>
                <th scope="col">Estado de cuenta</th>
                <th scope="col">Opciones</th>
                <th scope="col" v-if="superadmin1"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in usuarios1" v-if="user.description == 'Aliado'" >
                <th scope="row"> {{user.dni}}</th>
                <td> {{user.type_dni}}</td>
                <td> {{user.last_name}} {{user.name}}</td>
                <td>{{user.email}}</td>
                <td >{{user.phone}}</td>
                <td v-if="user.status == 'activated'"><h6 class="badge-pill text-center">Activada</h6></td>
                <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-primary text-white text-center">Suspendida</h6></td>
                <td v-if="user.status == 'pending'"><h6 class="badge-pill bg-secondary text-white text-center">Pendiente de activación</h6></td>
                <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
                <td class="text-center" v-if="user.status == 'suspended' || user.status == 'pending'"><button class="btn btn-secondary border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
                <td  v-if="superadmin1">
                  <button type="button" name="button" v-on:click="editUser(user.user_id)" class="btn btn-primary border-round"><i class="fas fa-pen"></i> </button>
                </td>
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
                    <th scope="col">DNI</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo Electronico</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Estado de cuenta</th>
                    <th scope="col">Opciones</th>
                    <th scope="col" v-if="superadmin1"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="user in usuarios1" v-if="user.description == 'Tutor'" >
                    <th scope="row"> {{user.dni}}</th>
                    <td> {{user.type_dni}}</td>
                    <td> {{user.last_name}} {{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td >{{user.phone}}</td>
                    <td v-if="user.status == 'activated'"><h6 class="badge-pill text-center">Activada</h6></td>
                    <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-primary text-white text-center">Suspendida</h6></td>
                    <td v-if="user.status == 'pending'"><h6 class="badge-pill bg-secondary text-white text-center">Pendiente de activación</h6></td>
                    <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
                    <td class="text-center" v-if="user.status == 'suspended' || user.status == 'pending'"><button class="btn btn-secondary  border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
                    <td  v-if="superadmin1">
                      <button type="button" name="button" v-on:click="editUser(user.user_id)" class="btn btn-primary border-round"><i class="fas fa-pen"></i> </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <div class="row pt-4" v-if="superadmin1">
          <div class="col-12">
            <h4><strong>Administradores</strong></h4>
            <hr class="hr-pink-left" >
          </div>
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-hover" id="table_superadmin">
                <thead class="thead-light">
                  <tr class="text-center">
                    <th scope="col">DNI</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo Electronico</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Estado de cuenta</th>
                    <th scope="col">Opciones</th>
                    <th scope="col" v-if="superadmin1"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="user in usuarios1" v-if="user.description == 'Administrador'" >
                    <th scope="row"> {{user.dni}}</th>
                    <td> {{user.type_dni}}</td>
                    <td> {{user.last_name}} {{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td >{{user.phone}}</td>
                    <td v-if="user.status == 'activated'"><h6 class="badge-pill text-center">Activada</h6></td>
                    <td v-if="user.status == 'suspended'"><h6 class="badge-pill bg-primary text-white text-center">Suspendida</h6></td>
                    <td v-if="user.status == 'pending'"><h6 class="badge-pill bg-secondary text-white text-center">Pendiente de activación</h6></td>
                    <td class="text-center" v-if="user.status == 'activated'"><button class="btn btn-white color-pink border-color-pink border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'suspended')">Suspender</button> </td>
                    <td class="text-center" v-if="user.status == 'suspended' || user.status == 'pending'"><button class="btn btn-secondary  border-round" type="button" name="button" v-on:click="changeStatus(user.id, 'activated')">Activar</button> </td>
                    <td  v-if="superadmin1">
                      <button type="button" name="button" v-on:click="editUser(user.user_id)" class="btn btn-primary border-round"><i class="fas fa-pen"></i> </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <!-- Modal -->
      <div class="modal fade" id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <div class="container">
                <div class="row">
                  <div class="col-10 text-center">
                    <h5><strong>Editar Usuario</strong> </h5>
                    <hr class="hr-pink-center">
                  </div>
                  <div class="col-2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row form-group">
                  <div class="col-12 col-lg-6 col-form-label">
                    <label for="">Tipo de documento</label>
                    <select class="form-control border-round" v-model="user.type_dni">
                      <option value="CC">Cedula de Ciudadanía</option>
                      <option value="NIT">NIT</option>
                      <option value="CE">Cedula de extranjeria</option>
                      <option value="Pasaporte">Pasaporte</option>
                      <option value="TI">Tarjeta de identidad</option>
                    </select>
                  </div>
                  <div class="col-12 col-lg-6 col-form-label">
                    <label for="">Número de identificación</label>
                    <input type="text" class="form-control border-round" name="" v-model="user.dni">
                  </div>
                  <div class="col-12 col-lg-6 col-form-label">
                    <label for="" v-if="user.type_dni != 'NIT'">Nombres</label>
                    <label for="" v-if="user.type_dni == 'NIT'">Razón social</label>
                    <input type="text" class="form-control border-round" name="" v-model="user.name">
                  </div>
                  <div class="col-12 col-lg-6 col-form-label" v-show="user.type_dni != 'NIT'">
                    <label for="">Apellidos</label>
                    <input type="text" class="form-control border-round" name="" v-model="user.last_name">
                  </div>
                  <div class="col-12 col-lg-6 col-form-label">
                    <label for="">Correo electrónico</label>
                    <input type="text" class="form-control border-round" name="" v-model="user.email">
                  </div>
                  <div class="col-12 col-lg-6 col-form-label">
                    <label for="">Teléfono / Celular</label>
                    <input type="number" class="form-control border-round" name="" v-model="user.phone">
                  </div>
                  <div class="col-12 col-lg-6 col-form-label">
                    <label for="">Añadir rol</label>
                    <select class="form-control border-round" v-model="role_selected" id="selected_role">
                      <option v-for="rol in all_roles" v-bind:value="rol.id" >{{rol.description}}</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="thead-light">
                          <th scope="col">Rol</th>
                          <th scope="col"></th>
                        </thead>
                        <tbody>
                          <tr v-for="rol in roles">
                            <td>{{rol.description}}</td>
                            <td>
                              <button class="btn btn-primary border-round" v-on:click="deleteRole(rol.id, rol.user_id)" type="button" name="button">
                                <i class="fas fa-trash"></i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer border-0">
              <button type="button" class="btn btn-dark border-round" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
              <button type="button" class="btn btn-secondary border-round" v-on:click="saveUser()"><i class="fas fa-save"></i> </button>
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

      user : '',
      roles : '',
      all_roles : '',
      role_selected : '',
      usuarios1 : this.usuarios,
      superadmin1 : this.superadmin
    }
  },

  props:['usuarios', 'superadmin'],
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
         this.resetTables();
         toastr.success('Se ha cambiado el estado', 'Exito');
      }).catch(function (error){
        console.log(error);
      });
    },

    editUser : function(user_id){

      axios.post('/manageUsers/searchUser', { user_id : user_id
      }).then(response =>{
        this.user = response.data.user;
        this.roles = response.data.roles;
        this.all_roles = response.data.all_roles;
        $('#modal_edit_user').modal('show');
      }).catch(function(error){
        console.log(error);
      });
    },

    saveUser : function(){

      axios.post('/manageUsers/saveUser', { user : JSON.stringify(this.user)
      }).then(response =>{
        this.usuarios1 = response.data.users;
        toastr.success(response.data.msj, 'Exito');
        this.resetTables();

         $('#modal_edit_user').modal('hide');



      }).catch(function(error){
        console.log(error);
      });

    },


    deleteRole : function(id, user_id){
      axios.post('/manageUsers/deleteRole', { id: id, user_id : user_id
      }).then(response =>{
        if (response.data.success) {
          toastr.success(response.data.msj, 'Exito');
        }else {
          toastr.error(response.data.msj, 'Error');
        }
        this.roles = response.data.roles;
        this.usuarios1 = response.data.users;
        this.resetTables();
      }).catch(function(error){
        console.log(error);
      });

    },

    resetTables : function(){
      $('#table_beneficiaries').DataTable().destroy();
      $('#table_ally').DataTable().destroy();
      $('#table_tutors').DataTable().destroy();
      $('#table_superadmin').DataTable().destroy();

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
      $('#table_beneficiaries').DataTable( {
            language: {
              url: '/js/Spanish.json'
            }
          });
      $('#table_superadmin').DataTable( {
            language: {
              url: '/js/Spanish.json'
            }
          });
    }


  },

  mounted(){
    var self = this;
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


    $('#table_superadmin').DataTable( {
          language: {
            url: '/js/Spanish.json'
          }
        });

    $('#selected_role').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    console.log(valueSelected);
    axios.post('/manageUsers/addRole', { role_id: valueSelected, user_id : self.user.id
    }).then(response =>{
      if (response.data.success) {
        toastr.success(response.data.msj, 'Exito');
      }else {
        toastr.error(response.data.msj, 'Error');
      }
      self.roles = response.data.roles;
      self.usuarios1 = response.data.users;
      self.resetTables();
    }).catch(function(error){
      console.log(error);
    });

    });









  }

}
</script>

<style>
</style>
