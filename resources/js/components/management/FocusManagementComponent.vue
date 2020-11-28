<template>

  <div class="container">

    <div class="row pt-4">
      <div class="col-10 text-center">
        <h2> <strong>Focos de nuestra red de conocimiento</strong> </h2>
        <hr class="hr-pink-center">
      </div>
      <div class="col-2 text-right">
        <button class="btn btn-secondary border-round " type="button" name="button" v-on:click="openModalContent(null)"><i class="fas fa-plus" ></i></button>
      </div>
    </div>

    <div class="row pt-4">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col" class="d-none d-lg-block">Descripción</th>
                <th scope="col">Imagen</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="foco in focos1">
                <th scope="row">{{foco.name}}</th>
                <td class="d-none d-lg-block">{{foco.description}}</td>
                <td><img v-bind:src="foco.url_image" alt="" class="img img-fluid" style="width: 100%"></td>
                <td><button class="btn btn-secondary border-round" type="button" name="button" v-on:click="openModalContent(foco.id)"><i class="fas fa-pen"></i></button>
                  <button class="btn btn-white border-color-pink color-pink border-round " type="button" name="button" v-on:click="eraseContent(foco.id)"><i class="fas fa-trash"></i></button> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal Foco -->
    <div class="modal fade" id="modalFocus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header border-0">
            <div class="container">
              <div class="row">
                <div class="col-10 text-center">
                  <h4 ><strong>Editar / Agregar Foco</strong></h4 >
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
            <form class="form-group" v-on:submit.prevent="addChangeFocus">
              <div class="row">
                <div class="col-12" >
                  <img v-bind:src="imgMiniatura" alt="" class="img img-fluid">
                </div>
                <div class="col-12">
                  <label for="">Nombre</label>
                  <input class="form-control border-round" type="text" name="" value="" v-model="name">
                </div>
                <div class="col-12">
                  <label for="">Descripción</label>
                  <textarea class="form-control border-round" rows="3" v-model="description"></textarea>
                </div>
                <div class="col-12">
                  <label for="">Imagen / Archivo</label>
                  <input type="file" id="file" @change="obtenerFile" class="form-control-file" name="file">
                </div>
              </div>
              <div class="modal-footer border-0">
                <button type="button" class="btn btn-white color-pink border-color-pink border-round" v-on:click="closeModalContent()"><i class="fas fa-times" ></i> </button>
                <button type="submit" class="btn btn-secondary border-round"> <i class="fas fa-save"></i></button>
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
      toastr.warning('Procesando solicitud', 'Espere')
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
      toastr.warning('Procesando solicitud', 'Espere')
      axios.delete('/manage_focus/'+id)
      .then(response => {
         this.focos1 = response.data.focos;
         $('#file').val('');
         this.showMessage(response.data.msj);
      }).catch(function (error){
        console.log(error);
      });

    },

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
      toastr.success(msj, 'Exito');
    }



  }


}
</script>

<style>
</style>
