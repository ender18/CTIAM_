<template>

  <div class="container">
    <div class="row">
      <div id="msj" v-show="a"  class="col-12">
        <div class="alert alert-success" role="alert">
          {{msj}}
        </div>
      </div>
      <div class="col-10">
        <h1>Focos de nuestra red de conocimiento</h1>
        <button class="btn btn-primary" type="button" v-on:click="openMsj('Hola a todos, este es un mensaje de error')" name="button">Mostrar Mensaje</button>
      </div>
      <div class="col-2">
        <button class="btn btn-primary " type="button" name="button" v-on:click="openModalContent(null)"><i class="fas fa-plus" ></i> Nuevo Foco</button>

      </div>
      <div class="col-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Descripción</th>
              <th scope="col">Imagen</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="foco in focos1">
              <th scope="row">{{foco.name}}</th>
              <td>{{foco.description}}</td>
              <td><img v-bind:src="foco.url_image" alt="" class="img img-fluid" style="width: 100px"></td>
              <td><button class="btn btn-warning" type="button" name="button" v-on:click="openModalContent(foco.id)"><i class="fas fa-pen"></i></button> <button class="btn btn-danger" type="button" name="button" v-on:click="eraseContent(foco.id)"><i class="fas fa-trash"></i></button> </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal Foco -->
    <div class="modal fade" id="modalFocus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar / Agregar Foco</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-group" v-on:submit.prevent="addChangeFocus">
              <div class="row">
                <div class="col-12" >
                  <img v-bind:src="imgMiniatura" alt="" class="img img-fluid">
                </div>
                <div class="col-12">
                  <label for="">Nombre</label>
                  <input class="form-control" type="text" name="" value="" v-model="name">
                </div>
                <div class="col-12">
                  <label for="">Descripción</label>
                  <textarea class="form-control" rows="3" v-model="description"></textarea>
                </div>
                <div class="col-12">
                  <label for="">Imagen / Archivo</label>
                  <input type="file" id="file" @change="obtenerFile" class="form-control-file" name="file">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" v-on:click="closeModalContent()">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

</template>

<script>

  // import toastr from 'toastr'

export default {

  data(){
    return {
      focos1 : this.focos,
      imgMiniatura : '',
      id: '',
      name: '',
      description: '',
      file: '',
      a: false,
      msj: ''

    }

  },



  props:['focos'],

  methods:{

    addChangeFocus: function(){

      let formData = new FormData();
      formData.append('id', this.id);
      formData.append('name', this.name);
      formData.append('description', this.description);
      formData.append('file', this.file);
      axios.post('/manage_focus', formData
      ).then(response => {
         this.focos1 = response.data.focos;
         $('#modalFocus').modal('hide');
         $('#file').val('');
         this.showMessage(response.data.msj);
      }).catch(function (error){
        console.log(error);
      });


    },
    eraseContent(id){
      axios.delete('/manage_focus/'+id)
      .then(response => {
         this.focos1 = response.data.focos;
         $('#file').val('');
         this.showMessage(response.data.msj);
      }).catch(function (error){
        console.log(error);
      });

    },


    openMsj: function(msj){
      toastr.success("HOLAAAAAAAAAAAA", 'Holaaa');
    }
    ,
    openModalContent: function(id){


      if (id== null) {
        this.name = '';
        this.description = '';
        this.imgMiniatura = '';



      }else {
        var elemento = this.buscarElemento(id);
        this.id = elemento.id;
        this.name = elemento.name;
        this.description = elemento.description;
        this.imgMiniatura = elemento.url_image;
      }


      $('#modalFocus').modal('show');
    },

    buscarElemento: function(id){
      var self = this;
      var elemento = null;
      (this.focos1).forEach(function(element) {
        if (element.id === id) {
          elemento =  element;
        }
      });
      return elemento;

    },

    closeModalContent(){
      $('#file').val('');
      $('#modalFocus').modal('hide');
    },

    obtenerFile(e){
      let file = e.target.files[0];
      this.file = file;
      this.cargarFile(file);
    },

    cargarFile(file){
      let reader = new FileReader();
      reader.onload = (e) => {
        this.imgMiniatura = e.target.result;
      }
      reader.readAsDataURL(file);
    },

    showMessage: function(msj){
      this.msj = msj;
      this.a = true;
      $("#msj").fadeIn(500);
      setTimeout(function(){
          $("#msj").fadeOut();
          this.a = false;
      }, 2000);
    }



  }


}
</script>

<style>
</style>
