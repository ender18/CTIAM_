<template >

  <div class="container shadow">
    <div class="row">

      <!-- Vista de Misión Imagen a la derecha -->
      <div class="col-12">
        <div class="row">
          <div class="col-lg-9 col-md-12 d-flex align-items-center">
            <div class="row col-12">
              <div class="col-12 text-center">
                <h2 class="" >
                  <span class="text-secondary  pl-2 pr-2 rounded-top  border-4 ">Misión</span></h2>
              </div>
              <div class="col-12 d-flex align-items-center">
                <p class="text-justify" >{{mision[0].content}}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-2 d-none d-lg-block">
            <div class="row">
              <div class="col-12">
                <img v-bind:src="mision[0].file" alt="" class="img img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Fin de la vista misión -->

      <div class="col-12">
        <hr>
      </div>

      <!-- Vista de Visión Imagen a la izquierda -->
      <div class="col-12">
        <div class="row">
          <div class="col-lg-9 col-md-12 d-flex align-items-center">
            <div class="row col-12">
              <div class="col-12 text-center">
                <h2 class="" >
                  <span class="text-secondary">Visión</span></h2>
                </div>
                <div class="col-12 d-flex align-items-center">
                  <p class="text-justify">{{vision[0].content}}</p>
                </div>
              </div>
            </div>
          <div class="col-lg-2 d-none d-lg-block">
            <div class="row">
              <div class="col-12">
                <img v-bind:src="vision[0].file" alt="" class="img img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de la vista visión -->

      <div class="col-12">
        <hr>
      </div>

      <!-- Vista de Objetivo General Imagen a la derecha -->
      <div class="col-12">
        <div class="row">
          <div class="col-lg-9 col-md-12 d-flex align-items-center">
            <div class="row col-12">
              <div class="col-12 text-center">
                <h2 class="" >
                  <span class="text-secondary">Objetivo general</span></h2>
              </div>
              <div class="col-12 d-flex align-items-center">
                <p class="text-justify">{{obj_general[0].content}}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-2 d-none d-lg-block">
            <div class="row">
              <div class="col-12">
                <img v-bind:src="obj_general[0].file" alt="" class="img img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de la vista Objetivo General -->

      <div class="col-12">
        <hr>
      </div>

      <!-- Vista de Objetivos Específicos Imagen a la izquierda -->
      <div class="col-12">
        <div class="row">
          <div class="col-lg-9 col-md-12 d-flex align-items-center">
            <div class="row col-12">
              <div class="col-12 text-center">
                <h3 class="" >
                  <span class="text-secondary">Objetivos Específicos</span></h3>
                </div>
                <div class="col-12">
                  <p class="text-justify" v-for="obj_esp in obj_especifico">{{obj_esp.content}}</p>
                </div>
              </div>
            </div>
          <div class="col-lg-2 d-none d-lg-block">
            <div class="row ">
              <div class="col-12 ">
                <img v-bind:src="img_obj_especifico[0].file" alt="" class="img img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de laObjetivos Específicos visión -->
      <div class="col-12">
        <hr>
      </div>

      <!-- Vista de   Normativo y funcional Imagen a la izquierda -->
      <div class="col-12">
        <div class="row">
          <div class="col-12 text-center">
            <h3 class="" >
              <span class="text-secondary">Marco Normativo y funcional</span>
            </h3>
          </div>
          <div class="col-lg-2 col-4" v-for="mn in marco_normativo">
            <br>
            <a v-bind:href="mn.file" download>
              <img src="https://image.flaticon.com/icons/png/512/337/337946.png" alt="" class="img img-fluid">
            </a>
            <span class="text-center">{{mn.content}}</span>
          </div>
        </div>
      </div>



      <!-- Fin de Marco Normativo y funcional -->
    </div>
  </div>



</template>

<script>
export default {


  data(){
    return{


    }

  },

  props:['mision', 'vision', 'obj_general', 'obj_especifico', 'marco_normativo', 'img_obj_especifico']

}
</script>
