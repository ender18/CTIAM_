<template >

  <div class="container shadow">
    <div class="row d-flex justify-content-between">

      <div class="col-12 text-center">
        <h2 class="" >
          <span class="text-secondary">Miembros de nuestra Red de Conocimiento</span></h2>
          <hr>
      </div>

      <div class="col-lg-3 col-sm-6 mt-4 d-flex justify-content-center" v-for="member in members">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-fluid" v-bind:src="member.file" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{member.content}}</h5>
            <p class="card-text">{{member.content1}}</p>
            <p class="card-text"><strong>Aportes:</strong> {{member.content3}}</p>
            <a v-bind:href="member.content2" class="btn btn-primary" target="_blank">Ir al sitio web</a>
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



    }
  },

  props:['members']







}
</script>

<style>
</style>
