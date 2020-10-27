
<template>

  <div class="container">
      <div class="row justify-content-center">
        <!-- Flexbox container for aligning the toasts -->

          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center"  >
                    <h5><strong>CAMBIAR CONTRASEÑA</strong></h5>
                  </div>
                  <div class="card-body">
                    <form class="" action="index.html" method="post"  v-on:submit.prevent="changePassword()">
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Contraseña actual</label>
                          <div class="col-md-6">
                            <div class="input-group">
                              <input autofocus  ref="password_actual" :type="type_password_actual" class="form-control" v-model="password_actual" required>
                              <div class="input-group-append">
                                <button class="btn btn-primary" type="button" v-on:click="showHidePassword('actually_password')">
                                  <i :class="icon_password_actual"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>
                          <div class="col-md-6">
                            <div class="input-group">
                              <input :type="type_password_new" ref="password_new" class="form-control" v-on:keyup="validarSeguridad()" v-model="password_new" required>
                              <div class="input-group-append">
                                <button class="btn btn-primary" type="button" v-on:click="showHidePassword('new_password')">
                                  <i :class="icon_password_new"></i>
                                </button>
                              </div>
                            </div>
                            <div class="">
                              <small v-show="password_new.length < 5" id="emailHelp" class="form-text text-muted">La nueva contraseña debe contener almenos 5 caracteres.</small>
                              <small v-show="password_new.length >= 5" class="form-text text-muted">Nivel de seguridad:  <span :class="'badge badge-' + strong_password_color_msj">{{strong_password_msj}}</span>  </small>
                            </div>
                            <div v-show="password_new.length >= 5" class="progress" style="height: 5px;">
                              <div :class="'progress-bar bg-'+ strong_password_color_msj" role="progressbar" :style="'width: '+ percent_progress_bar+ '%;'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="">
                              <small v-show="password_new.length >= 5 && (strong_password_msj == 'Bajo' || strong_password_msj == 'Medio'  ) " class="form-text text-muted"><em>Para mejorar la seguridad de la contraseña incluya números, letras minúsculas y mayúsculas</em></small>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Verificar Contraseña</label>
                          <div class="col-md-6">
                            <div class="input-group">
                              <input :type="type_password_verify" class="form-control" v-model="password_verify" v-on:keyup="compararContrasenas()" required>
                              <div class="input-group-append">
                                <button class="btn btn-primary" type="button" v-on:click="showHidePassword('verify_password')">
                                  <i :class="icon_password_verify"></i>
                                </button>
                              </div>
                            </div>
                            <div class="">
                              <small v-show="password_verify.length > 0" id="emailHelp" :class="'form-text '+verify_class">{{verify_msj}}</small>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row text center">
                          <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" name="button">Cambiar Contraseña</button>
                          </div>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

</template>

<script>
 import toastr from 'toastr'

export default {

  data(){
    return{
      // Variables para mostrar y ocultar contraseña
      type_password_actual : 'password',
      type_password_new : 'password',
      type_password_verify : 'password',
      icon_password_actual : 'fas fa-eye',
      icon_password_new : 'fas fa-eye',
      icon_password_verify : 'fas fa-eye',

      // Variables de las contraseñas
      password_actual : '',
      password_new : '',
      password_verify : '',

      // Variables de seguridad de contraseña
      strong_password_msj : '',
      strong_password_color_msj : '',
      percent_progress_bar: 0,

      // Variables de verificar contraseña
      verify_msj : '',
      verify_class : '',
    }
  },

  methods:{
    // Oculta o muestra la contraseña segun el botón que lo invocó
    showHidePassword: function(input){

      if (input === 'actually_password') {
        if (this.type_password_actual === 'text') {
          this.type_password_actual = 'password';
          this.icon_password_actual = 'fas fa-eye';
        }else {
          this.type_password_actual = 'text';
          this.icon_password_actual = 'fas fa-eye-slash';
        }
      }
      else if (input === 'new_password') {
        if (this.type_password_new === 'text') {
          this.type_password_new = 'password';
          this.icon_password_new = 'fas fa-eye';
        }else {
          this.type_password_new = 'text';
          this.icon_password_new = 'fas fa-eye-slash';
        }
      }
      else if (input === 'verify_password') {
        if (this.type_password_verify === 'text') {
          this.type_password_verify = 'password';
          this.icon_password_verify = 'fas fa-eye';
        }else {
          this.type_password_verify = 'text';
          this.icon_password_verify = 'fas fa-eye-slash';
        }
      }

    },

    // Valida la complejidad de la contraseña
    validarSeguridad: function(){
      var pswd = this.password_new;

        if ( pswd.match(/[a-z]/) || pswd.match(/[A-Z]/) || pswd.match(/\d/) ) {
          this.strong_password_msj = 'Bajo';
          this.strong_password_color_msj = 'danger';
          this.percent_progress_bar = 30;
        }

        if ( pswd.match(/[a-z]/) && pswd.match(/[A-Z]/) || pswd.match(/[a-z]/) && pswd.match(/\d/) || pswd.match(/[A-Z]/) && pswd.match(/\d/) ) {
          this.strong_password_msj = 'Medio';
          this.strong_password_color_msj = 'warning';
          this.percent_progress_bar = 60;
        }

        if ( pswd.match(/[a-z]/) && pswd.match(/[A-Z]/) && pswd.match(/\d/) ) {
          this.strong_password_msj = 'Bueno';
          this.strong_password_color_msj = 'success';
          this.percent_progress_bar = 100;
        }
    },

    // Valida  si las contraseñas son iguales
      compararContrasenas : function(){
        if (this.password_new === this.password_verify) {
          this.verify_msj = 'Las contraseñas coinciden';
          this.verify_class = 'text-success';
        }else {
          this.verify_msj = 'Las contraseñas no coinciden';
          this.verify_class = 'text-danger';
        }
      },

      // Cambiar contraseña
      changePassword: function(){

        if (this.password_actual == '' || this.password_new == '' || this.password_verify == '') {
          toastr.error('Por favor complete todos los campos', 'Error', {
            "positionClass": "toast-top-center"});
            return;
        }

        if(this.password_new.length < 5 || this.password_verify.length < 5){
          toastr.error('La nueva contraseña o la de verificación no contienen almenos 5 caracteres ', 'Error', {
            "positionClass": "toast-top-center"});
            return;
        }

        if(this.password_new != this.password_verify){
          toastr.error('La nueva contraseña y la de verificación no coinciden, intente de nuevo por favor', 'Error', {
            "positionClass": "toast-top-center"});
            return;
        }



        axios.post('/changePassword',{
          password_actual : this.password_actual,
          password_new : this.password_new,
          password_verify : this.password_verify
        }).then(response =>{
          if (response.data.type_msj == 'success') {
            toastr.success(response.data.msj, 'Exito', {
              "positionClass": "toast-top-center"});
              setTimeout(function() {
                  window.location.href = "/home"
              }, 3000);


          }else {
            toastr.error(response.data.msj, 'Error', {
              "positionClass": "toast-top-center"});
              if (response.data.$error_password == 'password_actual') {
                this.$refs.password_actual.focus();
                this.password_actual = '';

              }else if(response.data.$error_password == 'password_new'){
                this.$refs.password_new.focus();
                this.password_new = '';
                this.password_verify = '';

              }
          }

        }).catch(function (error){
          console.log(error);
        });
      }


  },

  mounted(){



  }


}
</script>

<style>
</style>
