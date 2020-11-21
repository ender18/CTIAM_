<template >

  <div class="container">

    <!-- Inicio titulo -->
    <div class="row pt-4">
      <div class="col-12 text-center">
        <h1 class=""><strong>Focos de nuestro proyecto</strong> </h1>
        <hr class="hr-pink-center">
      </div>
    </div>
    <!-- Fin del titulo -->

    <!-- Inicio focos -->
    <div class="" v-for="n in numero" >
      <div class="row pt-4" v-if="(n-1)%2 == 0">
        <div class="col-lg-6 col-md-12 d-flex align-items-center">
          <div class="row">
            <div class="col-12">
              <h1 class="text-center" ><strong> {{ focus2[n-1].name }}</strong> </h1>
              <hr class="hr-pink-center">
            </div>
            <div class="col-12 pb-4">
              <h5 class=" text-justify">{{ focus2[n-1].description}}</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 d-lg-none delete-padding">
          <img  v-bind:src="focus2[n-1].url_image" alt="" class="img img-fluid">
        </div>
        <div class="col-lg-6 col-md-12 d-none d-lg-block">
          <img  v-bind:src="focus2[n-1].url_image" alt="" class="img img-fluid border-image">
        </div>
      </div>

      <div class="row pt-4" v-if="focus1[n] != null && n%2 == 1">
        <div class="col-lg-6 col-md-12 d-none d-lg-block">
          <img  v-bind:src="focus1[n].url_image" alt="" class="img img-fluid">
        </div>
        <div class="col-lg-6 col-md-12 d-flex align-items-center flowers">
          <div class="row">
            <div class="col-12">
              <h1 class="text-center pt-4"><strong> {{ focus1[n].name}}</strong> </h1>
              <hr class="hr-pink-left">
            </div>
            <div class="col-12  pb-4">
              <h5 class=" text-justify">{{ focus1[n].description}}</h5 class="text-center">
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 d-lg-none delete-padding  pt-4 pt-lg-0">
            <img  v-bind:src="focus1[n].url_image" alt="" class="img img-fluid">
          </div>
        </div>

      </div>
      <!-- Fin de los focos -->

      <div class="pb-5">
      </div>
    </div>


</template>

<script>
export default {

  data(){
    return{
      focus2: this.focus1,
      numero : 0
    }
  },

  props:['focus1'],

  mounted(){
    this.numero = this.focus2.length;
  }



}
</script>

<style>
</style>
