<template >

  <div class="container shadow">
    <div class="row d-flex justify-content-between">
      <div class="col-12 text-center">
        <h2 class="" >
          <span class="text-secondary">Focos caracterizados del proyecto</span></h2>
          <hr>
      </div>
      <div class="col-lg-4 col-sm-12 mt-2 d-flex justify-content-center" v-for="focu in focus">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-fluid" v-bind:src="focu.url_image" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{focu.name}}</h5>
            <p class="card-text">{{focu.description}}</p>
          </div>
        </div>
      </div>
      <div class="col-12">
        <br>

      </div>
    </div>
  </div>


</template>

<script>
export default {

  props:['focus']



}
</script>

<style>
</style>
