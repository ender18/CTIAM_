
<template>

  <div class="container">
    <spinner v-show="spinner"></spinner>

    <div class="row pt-4">
      <div class="col-12 text-center">
        <h2><strong>Administración de certificados</strong></h2>
      </div>
      <div class="col-12 text-center">
        <h5>{{course1.title}}</h5>
      </div>
    </div>
    <div class="row pb-4">
      <div class="col-12">
        <hr class="hr-pink-center">
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h3 v-if="students1.length == 0">No hay ninguna beneficiaria en este curso</h3>
        <div class="table-responsive">
          <table v-if="students1.length > 0" class="table" id="table_certifieds">
            <thead class="thead-light">
              <tr >
                <th scope="col">N° Documento</th>
                <th scope="col">Nombre Beneficiaria</th>
                <th scope="col">Grupo</th>
                <th scope="col">Estado</th>
                <th scope="col" class="text-center">Generar certificado</th>
                <th scope="col" class="text-center">Certificado <i class="fas fa-file-pdf"></i></th>
                <th scope="col">Cargar Certificado</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="student in students1">
                <th scope="row">{{student.dni}}</th>
                <td>{{student.last_name}} {{student.name}}</td>
                <td>{{student.nameGroup}}</td>
                <td>{{student.status}}</td>
                <td class="text-center">
                  <form class="" action="/exportCertified" method="GET" target="_blank">
                    <input type="hidden" name="id_course" v-model="course1.id">
                    <input type="hidden" name="id_user" v-bind:value="student.dni">
                    <input type="hidden" name="view" v-bind:value="false">
                    <button v-if="student.status == 'Aprobado'" class="btn btn-white btn-sm" type="submit" name="button">
                      <i class="fas fa-file-pdf fa-lg"></i>
                    </button>
                  </form>
                </td>
                <td class="text-center"><a v-if="student.url_certified != null" v-bind:href="student.url_certified" download>
                  <i class="fas fa-download fa-lg"></i>
                </a></td>
                <td><input type="file" id="file" v-on:change="obtenerFile($event, student.id)" class="form-control-file" name="file"></td>
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
        course1 : this.course,
        students1: this.students,
        file: '',
        spinner: false


      }

    },


    props:['course', 'students'],

    methods:{



      obtenerFile(e, id_users_groups){
        this.spinner = true;
        console.log('Carga cuando obtengo el archivo');
        let file = e.target.files[0];
        this.file = file;
        this.cargarFile(file, id_users_groups);
      },

      cargarFile(file, id_users_groups){
        let reader = new FileReader();
        reader.onload = (e) => {
        }
        reader.readAsDataURL(file);

        var self = this;
        let formData = new FormData();
        formData.append('id', id_users_groups);
        formData.append('file', this.file);
        console.log('Id_course ='+ this.course1.id);
        formData.append('id_course', this.course1.id);
        axios.post('/manageEvents/addCertified', formData
        ).then(response => {
          self.students1 = response.data.students;
          console.log(response.data.students);
          self.spinner = false;
          toastr.success(response.data.msj, 'Proceso Exitoso')

        }).catch(function (error){
          self.spinner = false;
          toastr.error(error, 'Error')
          console.log(error);
        });

      },



    },

    mounted(){

      $('#table_certifieds').DataTable( {
          language: {
            url: '/js/Spanish.json'
          }
        });


    }


}
</script>
