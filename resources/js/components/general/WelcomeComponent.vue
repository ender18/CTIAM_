<template>

    <div class="container">
      <!-- Inicio del slider -->
      <div class="row">
        <div class="col-12 delete-padding">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div  v-bind:class="['carousel-item', (slider.id === sliders[0].id) ? 'active': ''] " v-for="slider in sliders1">
                <img class="d-block w-100" v-bind:src="slider.file" alt="Second slide">
                <div class="carousel-caption d-none d-md-block  slider-gradient">
                  <h1 class="text-white display-4">{{slider.content}}</h1>
                  <h5 class="text-white">{{slider.content1}}</h5>
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
      </div>
      <!-- Fin del slider -->


      <!-- Inicio Quienes somos -->
      <div class="row pt-4">
        <div class="col-lg-6 col-md-12 d-flex align-items-center">
          <div class="row">
            <div class="col-12">
              <h1 class="text-center" ><strong> ¿Quiénes somos?</strong> </h1>
              <hr class="hr-pink-center">
            </div>
            <div class="col-12 pb-4">
              <h5 class=" text-center">{{ quienes_somos1[0].content}}</h5 class="text-center">
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 d-lg-none delete-padding">
            <img  v-bind:src="quienes_somos1[0].file" alt="" class="img img-fluid">
          </div>
          <div class="col-lg-6 col-md-12 d-none d-lg-block">
            <img  v-bind:src="quienes_somos1[0].file" alt="" class="img img-fluid border-image">
          </div>
        </div>
        <!-- Fin de quienes somos -->


        <!-- Que hacemos en el programa -->
          <div class="row pt-4">
            <div class="col-lg-6 col-md-12 d-none d-lg-block">
              <img  v-bind:src="que_hacemos1[0].file" alt="" class="img img-fluid">
            </div>
            <div class="col-lg-6 col-md-12 d-flex align-items-center">
              <div class="row ">
                <div class="col-12">
                  <h1 class="text-center"><strong>¿Qué hacemos en el programa?</strong> </h1>
                  <hr class="hr-pink-center">
                </div>
                <div class="col-12  pb-4">
                  <h5 class=" text-center">{{ que_hacemos1[0].content}}</h5 class="text-center">
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 d-lg-none delete-padding">
                <img  v-bind:src="que_hacemos1[0].file" alt="" class="img img-fluid">
              </div>
            </div>
          <!-- Fin de que hacemos en el programa -->

          <div class="row pt-5">
            <div class="col-12 text-center">
              <h1 class="" ><strong>Experiencias de proyectos realizados</strong></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <i class="fas fa-folder fa-3x color-pink-soft"></i>
            </div>
          </div>

          <section class="pt-2 pb-5">
            <div class="container">
              <div class="row">
                <div class="col-12 text-right" v-if="secciones > 1">
                  <a class="btn btn-white mb-3 mr-1 border-round color-pink border-color-pink" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                  </a>
                  <a class="btn btn-white mb-3 border-round color-pink border-color-pink" href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                  </a>
                </div>
                <div class="col-12">
                  <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div v-bind:class="['carousel-item', (n === 1) ? 'active': ''] " v-for="n in secciones">
                          <div class="row">
                            <div class="col-md-4 mb-3 d-flex align-items-stretch"  v-for="m in 3" v-if="n*3+m-4 < proyectos_realizados1.length">
                              <div class="card shadow border-0">
                                <img v-bind:src="proyectos_realizados1[n*3+m-4].file" alt="" class="img img-fluid border-top-element">
                                <div class="card-body">
                                  <h4 class="card-title text-center"><strong>{{proyectos_realizados1[n*3+m-4].content}}</strong></h4>
                                  <p class="card-text text-center">{{proyectos_realizados1[n*3+m-4].content1}}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

      </div>

</template>

<script>
export default {

    data(){
        return {
            sliders1 : this.sliders,
            quienes_somos1 : this.quienes_somos,
            que_hacemos1 : this.que_hacemos,
            proyectos_realizados1 : this.proyectos_realizados,
            secciones : 0

        }


    },

    props: ['sliders', 'quienes_somos', 'que_hacemos', 'proyectos_realizados'],

    mounted(){
      console.log(this.sliders1);
      this.secciones = this.proyectos_realizados1.length/3;
      if (this.proyectos_realizados1.length%3 > 0) {
        this.secciones += 1;
      }
      this.secciones = Math.trunc(this.secciones);
      console.log(this.secciones);



    }



}
</script>
