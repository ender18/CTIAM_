<template>
  <div class="container shadow">
    <div class="row d-flex justify-content-between">
      <div class="col-12 text-center">
        <h2 class="" >
          <span class="text-secondary">Fundadoras</span></h2>
          <hr>
      </div>
      <div class="col-lg-4 col-sm-12 mt-2 d-flex justify-content-center" v-for="founder in founders">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-fluid" v-bind:src="founder.file" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{founder.content}}</h5>
            <p class="card-text">Profesión: {{founder.content2}}</p>
            <p class="card-text">{{founder.content1}}</p>
          </div>
        </div>
      </div>

      <div class="col-12 text-center">
        <br>
        <h2 class="" >
          <span class="text-secondary">¡Haz parte de nuestro equipo!</span></h2>
          <hr>
      </div>
      <div class="col-12 d-flex justify-content-center">
        <iframe width="1080" height="608" v-bind:src="'https://www.youtube.com/embed/'+ this.video_haz_parte.content " frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>

</template>



<script>
export default {

  props:['founders', 'video_haz_parte']






}
</script>



<style>
</style>
