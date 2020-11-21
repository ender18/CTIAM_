<template >

  <div class="container">
    <div class="row pt-4">
      <div class="col-12 text-center">
        <h1><strong>Miembros de nuestra Red de Conocimiento</strong> </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <i class="fas fa-brain fa-3x color-pink-soft"></i>
      </div>
    </div>

    <div class="row pb-5 d-flex justify-content-center justify-content-lg-start ">
      <div class="col-9 col-lg-3 pt-4 d-lg-flex align-items-lg-stretch" v-for="member in members">
        <div class="card  shadow border-0">
          <img v-bind:src="member.file" alt="" class="img img-fluid border-top-element">
          <div class="card-body">
            <h4 class="card-title text-center"><strong>{{member.content}}</strong></h4>
            <p class="card-text text-justify">{{member.content1}}</p>
            <p class="card-text"><strong>Aportes:</strong> {{member.content3}}</p>
            <div class="d-flex justify-content-center">
              <a :href="member.content2" target="_blank"> <button class="btn btn-primary border-round" type="button" name="button">Ir al sitio Web</button> </a>
            </div>
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
