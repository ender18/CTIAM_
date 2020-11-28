<template >

    <div class="container pb-3">
    <!-- Inicio Misión -->
      <div class="row pt-4">
        <div class="col-lg-6 col-md-12 d-flex align-items-center">
          <div class="row">
            <div class="col-12">
              <h1 class="text-center" ><strong> Misión</strong> </h1>
              <hr class="hr-pink-center">
            </div>
            <div class="col-12 pb-4">
              <h5 class=" text-justify">{{ mision[0].content}}</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 d-lg-none delete-padding">
            <img  v-bind:src="mision[0].file" alt="" class="img img-fluid">
          </div>
          <div class="col-lg-6 col-md-12 d-none d-lg-block">
            <img  v-bind:src="mision[0].file" alt="" class="img img-fluid border-image">
          </div>
        </div>
    <!-- Fin de la misión -->

    <!-- Inicio de Visión -->
    <div class="row pt-4">
      <div class="col-lg-6 col-md-12 d-none d-lg-block">
        <img  v-bind:src="vision[0].file" alt="" class="img img-fluid">
      </div>
      <div class="col-lg-6 col-md-12 d-flex align-items-center flowers">
        <div class="row">
          <div class="col-12">
            <h1 class="text-center pt-4 pt-lg-0"><strong>Visión</strong> </h1>
            <hr class="hr-pink-left">
          </div>
          <div class="col-12  pb-4">
            <h5 class=" text-justify">{{ vision[0].content}}</h5 class="text-center">
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 d-lg-none delete-padding  pt-5 pt-lg-0">
          <img  v-bind:src="vision[0].file" alt="" class="img img-fluid">
        </div>
      </div>
      <!-- Fin de Visión -->

      <!-- Inicio Objetivo General -->
      <div class="row pt-4">
        <div class="col-lg-6 col-md-12 d-flex align-items-center">
          <div class="row">
            <div class="col-12">
              <h1 class="text-center" ><strong> Objetivo General</strong> </h1>
              <hr class="hr-pink-center">
            </div>
            <div class="col-12 pb-4">
              <h5 class=" text-justify">{{ obj_general[0].content}}</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 d-lg-none delete-padding">
            <img  v-bind:src="obj_general[0].file" alt="" class="img img-fluid">
          </div>
          <div class="col-lg-6 col-md-12 d-none d-lg-block">
            <img  v-bind:src="obj_general[0].file" alt="" class="img img-fluid border-image">
          </div>
        </div>
      <!-- Fin Objetivo General -->

      <!-- Inicio Objetivos Especificos -->
      <div class="row pt-4">
        <div class="col-lg-6 col-md-12 d-none d-lg-block">
          <img  v-bind:src="img_obj_especifico[0].file" alt="" class="img img-fluid">
        </div>
        <div class="col-lg-6 col-md-12 d-flex align-items-center">
          <div class="row">
             <div class="col-12">
              <h1 class="text-center"><strong>Objetivos específicos</strong> </h1>
              <hr class="hr-pink-center">
             </div>
             <div class="col-12 pb-1" v-for="obj_esp in obj_especifico">
               <div class="row">
                 <div class="col-1 d-none d-lg-block">
                   <i class="fas fa-check fa-lg color-pink"></i>
                 </div>
                 <div class="col-lg-11 col-md-12">
                   <h5 class="text-justify" > {{obj_esp.content}}</h5>
                 </div>
               </div>
             </div>
           </div>
          </div>
          <div class="col-lg-6 col-md-12 d-lg-none delete-padding">
            <img  v-bind:src="img_obj_especifico[0].file" alt="" class="img img-fluid">
          </div>
        </div>
      <!-- Fin de objetivos especificos -->

      <!-- Inicio Marco Normativo y Funcional -->

      <div class="row pt-5">
        <div class="col-12 text-center">
          <h1 class="" ><strong>Marco normativo y funcional</strong></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <i class="fas fa-file-pdf fa-3x color-pink-soft"></i>
        </div>
      </div>

      <!-- Fin Marco Normativo y funcional -->


      <!-- Vista de   Normativo y funcional Imagen a la izquierda -->
    <div class="row d-flex justify-content-center pt-4">
      <div class="col-lg-6 col-md-12">
        <div class="table-responsive">
          <table class="table" id="table_marco_normativo">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Nombre del archivo</th>
              </tr>
            </thead>
            <tbody>

              <tr v-for="mn in marco_normativo" >
                <td class="text-center">
                  <a v-bind:href="mn.file" download>
                    <i class="fas fa-file-download fa-2x color-pink"></i>
                  </a>
                </td>
                <td class="text-center">
                  <a v-bind:href="mn.file" download>
                    {{mn.content}}
                  </a>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <!-- Fin de Marco Normativo y funcional -->



    </div>



</template>

<script>
export default {


  data(){
    return{


    }

  },

  props:['mision', 'vision', 'obj_general', 'obj_especifico', 'marco_normativo', 'img_obj_especifico'],

  mounted(){

    $('#table_marco_normativo').DataTable( {
      language: {
        url: '/js/Spanish.json'
      }
    });
  }

}
</script>
