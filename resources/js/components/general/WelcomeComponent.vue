<template>

  <div class="container shadow">
    <div class="row">
      <div class="col-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" v-bind:class="[ (slider.id === sliders[0].id) ? 'active': ''] " v-for="slider in sliders1"></li>

          </ol>
          <div class="carousel-inner">
            <div  v-bind:class="['carousel-item', (slider.id === sliders[0].id) ? 'active': ''] " v-for="slider in sliders1">
              <img class="d-block w-100" v-bind:src="slider.file" alt="Second slide">
              <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.8); right: 0% ; left: 0% ">
                <h1 class="text-primary display-6">{{slider.content}}</h1>
                <!-- <h5 class="text-secondary" style="text-shadow: 3px 2px 8px black;">{{slider.content1}}</h5> -->
                <h5 class="text-primary">{{slider.content1}}</h5>
              </div>
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>


      </div>

      <!-- Nueva Vista Sobre nosotros-->

      <div class="col-12 text-center">
        <br>
        <h1 class="" >
          <span class=" text-secondary  pl-2 pr-2 rounded-top"> Sobre Nosotros</span></h1>
          <hr>
      </div>
      <!-- Fin Nueva Vista Sobre nosotros-->


        <div class="col-12 d-flex align-items-center">
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <div class="row">
                <div class="col-12">
                  <h3 class="text-center " >¿Quienes somos? </h3>
                  <br>
                </div>
                <div class="col-7 text-justify">
                  <p>{{ quienes_somos1[0].content}}</p>
                </div>
                <div class="col-5 ">
                  <img v-bind:src="quienes_somos1[0].file" alt="" class="img img-fluid">
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="row">
                <div class="col-12 text-center">
                  <h3>¿Que hacemos en el programa? </h3>
                  <br>
                </div>
                <div class="col-7 text-justify">
                  <p>{{que_hacemos1[0].content}}</p>
                </div>
                <div class="col-5 text-center">
                  <img v-bind:src="que_hacemos1[0].file" alt="" class="img img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>



      <div class="col-12 text-center">
        <br>
        <h1 class="" >
          <span class=" text-secondary">Experiencias de proyectos realizados</span>
        </h1>
        <hr>
      </div>
      
      <div class="col-12" v-for="proyecto_realizado in proyectos_realizados">
        <div class="row">
          <div class="col-9">
            <h3>{{proyecto_realizado.content}}</h3>
            <p>{{proyecto_realizado.content1}}</p>
          </div>
          <div class="col-3">
            <img v-bind:src="proyecto_realizado.file" alt="" class="img img-fluid">
          </div>
        </div>
        <hr>
      </div>

    </div>
  </div>

</template>

<script>
export default {

    data(){
        return {
            sliders1 : this.sliders,
            quienes_somos1 : this.quienes_somos,
            que_hacemos1 : this.que_hacemos,
            proyectos_realizados1 : this.proyectos_realizados

        }


    },

    props: ['sliders', 'quienes_somos', 'que_hacemos', 'proyectos_realizados'],

    mounted(){

      console.log(this.sliders1);
    }



}
</script>
