<template>

  <div class="container">
    <div class="row pt-4">
      <div class="col-12 text-center">
        <h1><strong>Fundadoras</strong> </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <i class="fas fa-flag fa-3x color-pink-soft"></i>
      </div>
    </div>


    <div class="row pb-5 d-flex justify-content-center justify-content-lg-between ">
      <div class="col-9 col-lg-3 pt-4 d-lg-flex align-items-lg-stretch" v-for="founder in founders">
        <div class="card  shadow border-0">
          <img v-bind:src="founder.file" alt="" class="img img-fluid border-top-element">
          <div class="card-body">
            <h4 class="card-title text-center"><strong>{{founder.content}}</strong></h4>
            <p class="card-text">Profesión: {{founder.content2}}</p>
            <p class="card-text">{{founder.content1}}</p>
            <div class="d-flex justify-content-center">
              <a :href="founder.content3" target="_blank"> <button class="btn btn-primary border-round" type="button" name="button">Ver CV</button> </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row pt-4 pb-3">
      <div class="col-12 col-lg-5  d-flex align-items-center">
        <div class="row  d-flex align-items-center">
          <div class="col-12">
            <h1 class="display-4 text-center">¡Haz parte de nuestro equipo!</h1>
          </div>
          <div class="col-12">
            <hr class="hr-pink-center">
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-7">
        <iframe class="border-round" width="100%" height="358px" v-bind:src="'https://www.youtube.com/embed/'+ this.video_haz_parte.content " frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>


  <!-- <div class="container shadow">
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
  </div> -->

</template>



<script>
export default {

  props:['founders', 'video_haz_parte']






}
</script>



<style>
</style>
