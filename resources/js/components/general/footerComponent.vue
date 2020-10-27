<template >

  <footer class="pt-4 bg-dark shadow-sm">
    <!-- Footer Links -->
    <div class="container text-center text-light text-md-left ">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-4 mt-md-0 mt-3">

          <!-- Content -->
          <h4 class="text-uppercase ">Descripción de nuestra red de conocimiento CTIAM</h4>
          <small>{{description}}</small>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-4 mb-md-0 mb-3">

          <!-- Links -->
          <h4 class="text-uppercase">CONTACTO</h4>

          <ul class="list-unstyled">
            <li>

              <span>Teléfono: {{phone}}</span>
            </li>
            <li>
              <span >Correo electrónico: <a class="text-light" href="#">{{email}}</a> </span>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h4 class="text-uppercase">REDES SOCIALES</h4>

          <ul class="list-unstyled">
            <li>
              <a :href="url_twitter" class="text-white" > <i class="fab fa-youtube fa-2x "></i><span> {{twitter}}</span> </a>
            </li>
            <li>
              <a :href="url_instagram" class="text-white"> <i class="fab fa-facebook fa-2x "></i><span> {{facebook}}</span> </a>
            </li>
            <li>
              <a :href="url_instagram" class="text-white"> <i class="fab fa-instagram fa-2x "></i><span> {{instagram}}</span> </a>
            </li>
          </ul>

        </div>

        <div class="col-md-1 mb-md-0 mb-3 d-none d-lg-block">

          <img src="/images/logoufps.png" class="img img-fluid" alt="">
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 text-dark bg-light" >
      <p> © 2020 Copyright: <a class="text-dark" href="https://ww2.ufps.edu.co/"> UFPS</a></p>

    </div>
    <!-- Copyright -->

  </footer>

</template>

<script>
export default {

  data(){
    return {
      description : '',
      phone : '',
      email : '',
      twitter : '',
      facebook : '',
      instagram : '',
      url_twitter : '',
      url_facebook : '',
      url_instagram : ''
    }
  },


  created(){

    axios.post('/getInfoFooter',{
    })
    .then(response => {
      this.description = response.data.description;
      this.phone = response.data.phone;
      this.email = response.data.email;
      this.twitter = response.data.twitter;
      this.facebook = response.data.facebook;
      this.instagram= response.data.instagram;
      this.url_twitter = response.data.url_twitter;
      this.url_facebook = response.data.url_facebook;
      this.url_instagram= response.data.url_instagram;

    }).catch(function (error){
      console.log(error);
    });
  }


  }
</script>

<style lang="css" scoped>
</style>
