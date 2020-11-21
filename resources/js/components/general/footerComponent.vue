<template >
  <footer class="pt-4 color-footer shadow-sm">
    <div class="container text-center text-md-left ">
      <div class="row py-lg-4">
        <div class="col-md-3 mt-md-0 mt-3">
          <p>{{description}}</p>
        </div>
        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-4 mb-md-0 mb-3">
          <h4 class="text-uppercase">CONTACTO</h4>
          <ul class="list-unstyled">
            <li>
              <span>Teléfono: {{phone}}</span>
            </li>
            <li>
              <span >Correo electrónico: <a class="" href="#">{{email}}</a> </span>
            </li>
          </ul>
        </div>
        <div class="col-md-3 mb-md-0 mb-3 text-center">
          <h4 class="text-uppercase">REDES SOCIALES</h4>
              <a :href="url_twitter" class="color-pink" > <i class="fab fa-youtube fa-3x "></i></a>
              <a :href="url_instagram" class="color-pink"> <i class="fab fa-facebook fa-3x "></i> </a>
              <a :href="url_instagram" class="color-pink"> <i class="fab fa-instagram fa-3x "></i> </a>
        </div>
        <div class="col-md-2 mb-md-0 mb-3 d-none d-lg-block">
          <img src="/images/logoufps.png" class="img img-fluid" alt="">
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row  d-flex align-items-center  color-footer2">
        <div class="col-12 py-2 text-center text-white" >
          <p class="mb-0 pb-0"><strong> © 2020 Copyright: <a class="text-white" href="https://ww2.ufps.edu.co/"> UFPS</a></strong></p>
        </div>
      </div>
    </div>
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
