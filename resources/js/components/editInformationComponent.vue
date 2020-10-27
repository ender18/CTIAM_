
<template >

  <div class="container">

      <div class="row justify-content-center">
          <div id="msj" v-show="a"  class="col-12 ">
            <div class="alert alert-danger" role="alert">
              {{msj}}
            </div>
          </div>
          <div class="col-md-8">
              <div class="card">
                <div class="card-header text-center">
                  <div class="row">
                    <div class="col-12">
                      <h3>Actualiza tus datos</h3>
                    </div>
                  </div>
                </div>

                  <div class="card-body">
                      <form class="form-group" method="POST" action="" v-on:submit.prevent="saveUser()">
                        <div class="row">
                          <div class="col-12">
                            <h5>Información Básica</h5>
                            <hr>
                          </div>
                          <div class="col-6">
                            <label for="">Tipo de Documento</label>
                            <select class="form-control" v-model="type_dni" id="tipo_documento">
                              <option>Cedula de Ciudadanía</option>
                              <option>Cedula de extranjeria</option>
                              <option>Pasaporte</option>
                              <option>Tarjeta de identidad</option>
                            </select>
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Número de identificación</label>
                            <input type="number" name="" class="form-control" v-model="dni">
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Nombres</label>
                            <input type="text" name="" class="form-control" v-model="name">
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Apellidos</label>
                            <input type="text" name="" class="form-control" v-model="last_name">
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Correo</label>
                            <input id="email" type="email" name="" class="form-control" v-model="email" required>
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Fecha de Nacimiento</label>
                            <input type="date" name="" class="form-control" v-model="birthdate">
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Dirección de residencia</label>
                            <input type="text" name="" class="form-control" v-model="adress">
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Barrio / Sector</label>
                            <select class="form-control" v-model="neighborhood">
                              <option value='OTRO'> OTRO</option>
                              <option value='6- AEROPUERTO'> AEROPUERTO</option>
                              <option value='3- AGUAS CALIENTES'> AGUAS CALIENTES</option>
                              <option value='6- ALONSITO'> ALONSITO</option>
                              <option value='10- ALONSO LÓPEZ'> ALONSO LÓPEZ</option>
                              <option value='4- ALTO PAMPLONITA'> ALTO PAMPLONITA</option>
                              <option value='8- ANTONIA'> ANTONIA</option>
                              <option value='8- ATALAYA I ETAPA'> ATALAYA I ETAPA</option>
                              <option value='8- ATALAYA II ETAPA'> ATALAYA II ETAPA</option>
                              <option value='2- BARRIO BLANCO'> BARRIO BLANCO</option>
                              <option value='9- BARRIO NUEVO'> BARRIO NUEVO</option>
                              <option value='4- BARRIO SAN MARTIN'> BARRIO SAN MARTIN</option>
                              <option value='9- BELÉN'> BELÉN</option>
                              <option value='8- BELISARIO'> BELISARIO</option>
                              <option value='3- BELLAVISTA'> BELLAVISTA</option>
                              <option value='3- BOGOTÁ'> BOGOTÁ</option>
                              <option value='2- BRISAS DE PAMPLONITA'> BRISAS DE PAMPLONITA</option>
                              <option value='7- BUENOS ARIES'> BUENOS ARIES</option>
                              <option value='6- CAMILO DAZA'> CAMILO DAZA</option>
                              <option value='7- CAMILO DAZA'> CAMILO DAZA</option>
                              <option value='10- CAMILO TORRES'> CAMILO TORRES</option>
                              <option value='8- CARLOS RAMÍREZ PARÍS'> CARLOS RAMÍREZ PARÍS</option>
                              <option value='9- CARORA'> CARORA</option>
                              <option value='2- CASD'> CASD</option>
                              <option value='5- CEIBA II'> CEIBA II</option>
                              <option value='1- CENTRO'> CENTRO</option>
                              <option value='6- CERRO DE LA CRUZ'> CERRO DE LA CRUZ</option>
                              <option value='6- CERRO NORTE'> CERRO NORTE</option>
                              <option value='8- CERRO PICO'> CERRO PICO</option>
                              <option value='7- CHAPINERO'> CHAPINERO</option>
                              <option value='10- CIRCUNVALACIÓN'> CIRCUNVALACIÓN</option>
                              <option value='5- CIUDAD JARDÍN'> CIUDAD JARDÍN</option>
                              <option value='2- CLUB TENIS'> CLUB TENIS</option>
                              <option value='10- COCA-COLA'> COCA-COLA</option>
                              <option value='6- COLINAS DE LA VICTORIA'> COLINAS DE LA VICTORIA</option>
                              <option value='5- COLPET'> COLPET</option>
                              <option value='2- COLSAG'> COLSAG</option>
                              <option value='2- COMERCIAL BOLÍVAR'> COMERCIAL BOLÍVAR</option>
                              <option value='7- COMUNEROS'> COMUNEROS</option>
                              <option value='2- CONDADO DE CASTILLA'> CONDADO DE CASTILLA</option>
                              <option value='8- CÚCUTA 75'> CÚCUTA 75</option>
                              <option value='9- CUNDINAMARCA'> CUNDINAMARCA</option>
                              <option value='8- DOÑA NIDIA. LA VICTORIA'> DOÑA NIDIA. LA VICTORIA</option>
                              <option value='1- EL CALLEJÓN'> EL CALLEJÓN</option>
                              <option value='7- EL CLARET'> EL CLARET</option>
                              <option value='10- EL CORTIJO'> EL CORTIJO</option>
                              <option value='4- EL ESCOBAL'> EL ESCOBAL</option>
                              <option value='2- EL LAGO'> EL LAGO</option>
                              <option value='4- EL NIGUERÓN'> EL NIGUERÓN</option>
                              <option value='1- EL PARAMO'> EL PARAMO</option>
                              <option value='4- EL PORTAL DEL ESCOBAL'> EL PORTAL DEL ESCOBAL</option>
                              <option value='8- EL RODEO'> EL RODEO</option>
                              <option value='2- EL ROSAL'> EL ROSAL</option>
                              <option value='6- EL SALADO'> EL SALADO</option>
                              <option value='9- GAITÁN'> GAITÁN</option>
                              <option value='10- GALÁN'> GALÁN</option>
                              <option value='5- GRATAMIRA'> GRATAMIRA</option>
                              <option value='10- GRUPO MAZA'> GRUPO MAZA</option>
                              <option value='5- GUAIMARAL'> GUAIMARAL</option>
                              <option value='5- GUALANDAY'> GUALANDAY</option>
                              <option value='4- ISLA DE LA FANTASÍA'> ISLA DE LA FANTASÍA</option>
                              <option value='8- KENNEDY'> KENNEDY</option>
                              <option value='4- LA ALAMEDA'> LA ALAMEDA</option>
                              <option value='9- LA AURORA'> LA AURORA</option>
                              <option value='10- LA CABRERA'> LA CABRERA</option>
                              <option value='2- LA CAPILLANA'> LA CAPILLANA</option>
                              <option value='3- LA CAROLINA'> LA CAROLINA</option>
                              <option value='2- LA CASTILLANA'> LA CASTILLANA</option>
                              <option value='2- LA CEIBA'> LA CEIBA</option>
                              <option value='7- LA FLORIDA'> LA FLORIDA</option>
                              <option value='7- LA HERMITA'> LA HERMITA</option>
                              <option value='6- LA ÍNSULA'> LA ÍNSULA</option>
                              <option value='3- LA LIBERTAD'> LA LIBERTAD</option>
                              <option value='5- LA MAR'> LA MAR</option>
                              <option value='5- LA MERCED'> LA MERCED</option>
                              <option value='1- LA PLAYA'> LA PLAYA</option>
                              <option value='2- LA PRIMAVERA'> LA PRIMAVERA</option>
                              <option value='7- LA PRIMAVERA'> LA PRIMAVERA</option>
                              <option value='4- LA QUINTA'> LA QUINTA</option>
                              <option value='2- LA RIVIERA'> LA RIVIERA</option>
                              <option value='3- LA UNIÓN'> LA UNIÓN</option>
                              <option value='2- LAS ALMEYDAS'> LAS ALMEYDAS</option>
                              <option value='6- LAS AMÉRICAS'> LAS AMÉRICAS</option>
                              <option value='9- LAS COLINAS'> LAS COLINAS</option>
                              <option value='10- LAS MALVINAS'> LAS MALVINAS</option>
                              <option value='3- LAS MARGARITAS'> LAS MARGARITAS</option>
                              <option value='1- LATINO'> LATINO</option>
                              <option value='9- LOMA DE BOLÍVAR'> LOMA DE BOLÍVAR</option>
                              <option value='2- LOS ACACIOS'> LOS ACACIOS</option>
                              <option value='8- LOS ALMENDROS'> LOS ALMENDROS</option>
                              <option value='9- LOS ALPES'> LOS ALPES</option>
                              <option value='2- LOS CAOBOS'> LOS CAOBOS</option>
                              <option value='2- LOS PINOS'> LOS PINOS</option>
                              <option value='2- LOS PINOS'> LOS PINOS</option>
                              <option value='2- MANOLO LEMUS'> MANOLO LEMUS</option>
                              <option value='7- MOTILONES'> MOTILONES</option>
                              <option value='5- NIZA'> NIZA</option>
                              <option value='4- NUEVA SANTA CLARA'> NUEVA SANTA CLARA</option>
                              <option value='7- OSPINA PERÉZ'> OSPINA PERÉZ</option>
                              <option value='8- PALMERAS'> PALMERAS</option>
                              <option value='6- PANAMERICANO'> PANAMERICANO</option>
                              <option value='7- PARAÍSO'> PARAÍSO</option>
                              <option value='5- PESCADERO'> PESCADERO</option>
                              <option value='3- POLICARPA'> POLICARPA</option>
                              <option value='2- POPULAR'> POPULAR</option>
                              <option value='6- PORVENIR'> PORVENIR</option>
                              <option value='2- PRADOS CLUB'> PRADOS CLUB</option>
                              <option value='5- PRADOS DEL NORTE'> PRADOS DEL NORTE</option>
                              <option value='2- PRADOS I Y II'> PRADOS I Y II</option>
                              <option value='10- PUEBLO NUEVO'> PUEBLO NUEVO</option>
                              <option value='10- PUENTE BARCO'> PUENTE BARCO</option>
                              <option value='2- QUINTA BOSCH'> QUINTA BOSCH</option>
                              <option value='2- QUINTA ORIENTAL'> QUINTA ORIENTAL</option>
                              <option value='2- QUINTA VÉLEZ'> QUINTA VÉLEZ</option>
                              <option value='2- RINCÓN DEL PRADO'> RINCÓN DEL PRADO</option>
                              <option value='9- RUDENSINDO SOTO'> RUDENSINDO SOTO</option>
                              <option value='5- SAN EDUARDO I'> SAN EDUARDO I</option>
                              <option value='5- SAN EDUARDO II'> SAN EDUARDO II</option>
                              <option value='6- SAN GERARDO'> SAN GERARDO</option>
                              <option value='10- SAN JOSÉ'> SAN JOSÉ</option>
                              <option value='4- SAN LUIS'> SAN LUIS</option>
                              <option value='3- SAN MATEO'> SAN MATEO</option>
                              <option value='9- SAN MIGUEL'> SAN MIGUEL</option>
                              <option value='10- SAN RAFAEL'> SAN RAFAEL</option>
                              <option value='3- SANTA ANA'> SANTA ANA</option>
                              <option value='5- SANTA HELENA'> SANTA HELENA</option>
                              <option value='2- SANTA LUCIA'> SANTA LUCIA</option>
                              <option value='4- SANTA TERESITA'> SANTA TERESITA</option>
                              <option value='10- SANTANDER'> SANTANDER</option>
                              <option value='10- SANTO DOMINGO'> SANTO DOMINGO</option>
                              <option value='4- SECTOR CHIVERAS'> SECTOR CHIVERAS</option>
                              <option value='1- SECTOR LA SEXTA'> SECTOR LA SEXTA</option>
                              <option value='6- SEVILLA'> SEVILLA</option>
                              <option value='5- TASAJERO'> TASAJERO</option>
                              <option value='4- TORCOROMA'> TORCOROMA</option>
                              <option value='7- TUCUNARÉ'> TUCUNARÉ</option>
                              <option value='2- UFPS'> UFPS</option>
                              <option value='4- URB. ANIVERSARIO'> URB. ANIVERSARIO</option>
                              <option value='5- URB. EL BOSQUE'> URB. EL BOSQUE</option>
                              <option value='4- URB. SAN JOSÉ'> URB. SAN JOSÉ</option>
                              <option value='4- URB. SAN MARTIN'> URB. SAN MARTIN</option>
                              <option value='3- VALLE ESTHER'> VALLE ESTHER</option>
                              <option value='2- VALPARAÍSO SUITE'> VALPARAÍSO SUITE</option>
                              <option value='5- ZONA FRANCA'> ZONA FRANCA</option>
                              <option value='5- ZONA INDUSTRIAL'> ZONA INDUSTRIAL</option>
                              <option value='3-BOCONO'>BOCONO</option>
                              <option value='10-CEMENTERIO'>CEMENTERIO</option>
                              <option value='9-DIVINA PASTORA'>DIVINA PASTORA</option>
                              <option value='1-EL CONTENTO'>EL CONTENTO</option>
                              <option value='8-EL PROGRESO'>EL PROGRESO</option>
                              <option value='7-EL ROSAL DEL NORTE'>EL ROSAL DEL NORTE</option>
                              <option value='5-IV ETAPA'>IV ETAPA</option>
                              <option value='2-LA RINCONADA'>LA RINCONADA</option>
                              <option value='5-LLERAS'>LLERAS</option>
                              <option value='4-NUEVO ESCOBAL'>NUEVO ESCOBAL</option>
                              <option value='6-VIRGILIO BARCO'>VIRGILIO BARCO</option>
                              <option value='5-ZULIMA I'>ZULIMA I</option>
                              <option value='5-ZULIMA II'>ZULIMA II</option>
                              <option value='5-ZULIMA III'>ZULIMA III</option>

                            </select>
                          </div>
                          <div class="col-6 form-group" v-if="neighborhood ==='OTRO'">
                              <label for="">¿Cual?</label>
                              <input type="text" name="" class="form-control" v-model="neighborhood1">
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Teléfono</label>
                            <input type="text" name="" class="form-control"  v-model="phone">
                          </div>
                          <div class="col-6 form-group" v-if="neighborhood !=='OTRO'">
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Contraseña</label>
                            <input id="password" type="password" name="" class="form-control" v-model="password" required>
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Repite tu contraseña</label>
                            <input id="password1" type="password" name="" class="form-control" v-model="password1" required>
                          </div>
                        </div>
                        <div class="row" v-show="tipo_registro === 'Beneficiaria'">


                          <div class="col-12" >
                            <br>
                            <h5>Información Complementaria</h5>
                            <hr>
                          </div>
                          <div class="col-6 form-group">
                            <label for="">Estado civil</label>
                            <select class="form-control" v-model="civil_status">
                              <option>Soltera</option>
                              <option>Unión libre</option>
                              <option>Casada</option>
                              <option>Divorciada</option>
                              <option>Viuda</option>
                            </select>
                          </div>
                          <div class="col-6 form-group">
                            <label for="">¿Tiene hijos?</label>
                            <br>
                            <input id="toggle-has-children"  type="checkbox" data-toggle="toggle" data-onstyle="secondary" data-offstyle="light" data-on="Si" data-off="No" v-model="has_children">
                          </div>
                          <div class="col-4 form-group">
                            <label for="">Nivel de estudio</label>
                            <select class="form-control" v-model="level_study">
                              <option>Profesional</option>
                              <option>Tecnóloga</option>
                              <option>Técnica</option>
                              <option>Secundaria</option>
                              <option>Primaria</option>
                              <option>No tiene</option>
                            </select>
                          </div>
                          <div class="col-4 form-group">
                            <div class="" v-if="level_study === 'Profesional' || level_study === 'Tecnóloga' || level_study === 'Técnica'">
                              <label for="">Título obtenido</label >
                                <select class="form-control" v-model="last_study">
                                  <option>Pregrado</option>
                                  <option>Especialista</option>
                                  <option>Magister</option>
                                  <option>Doctorado</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-4 form-group">
                            <div class="" v-if="last_study != '' && level_study === 'Profesional' || level_study === 'Tecnóloga' || level_study === 'Técnica'">
                              <label for="">Nombre del título obtenido</label>
                              <input type="text" name="" value="" class="form-control" v-model="degree">
                            </div>
                          </div>
                          <div class="col-4 form-group">
                            <label for="">¿Actualmente estudia?</label>
                            <br>
                            <input id="toggle-study-actually"  type="checkbox" data-toggle="toggle" data-onstyle="secondary" data-offstyle="light" data-on="Si" data-off="No" v-model="study_actually">

                          </div>
                          <div class="col-8 form-group">
                            <div class="" v-if="study_actually">
                              <label for="">¿Qué está estudiando?</label>
                              <select class="form-control" v-model="what_studies">
                                <option>Primaria</option>
                                <option>Secundaria</option>
                                <option>Tecnica</option>
                                <option>Tecnología</option>
                                <option>Pregrado</option>
                                <option>Postgrado</option>
                              </select>

                            </div>
                          </div>
                          <div class="col-4 form-group">
                            <label for="">¿Actualmente labora?</label>
                            <br>
                            <input id="toggle-work-actually"  type="checkbox" data-toggle="toggle" data-onstyle="secondary" data-offstyle="light" data-on="Si" data-off="No" v-model="work_actually">

                          </div>
                          <div class="col-8 form-group">
                            <div class="" v-if="work_actually">
                              <label for="">Sector en el que labora</label>
                              <select class="form-control" v-model="laboral_sector">
                                <option>Agricultura, Ganadería, Caza, Silvicultura y Pesca</option>
                                <option>Explotación de Minas y Canteras </option>
                                <option>Industrias Manufactureras </option>
                                <option>Distribución de Agua; Evacuación y Tratamiento de Aguas Residuales, Gestión de Desechos y Actividades de Saneamiento Ambiental</option>
                                <option>Construcción </option>
                                <option>Transporte y Almacenamiento</option>
                                <option>Alojamiento y servicios de comida</option>
                                <option>Información y Comunicaciones </option>
                                <option>Actividades Financieras y de Seguros </option>
                                <option>Actividades Inmobiliarias </option>
                                <option>Actividades Profesionales, Científicas y Técnicas</option>
                                <option>Actividades de Servicios </option>
                                <option>Educación</option>
                                <option>Actividades de Atención de la Salud</option>
                                <option>Actividades Artísticas, de Entretenimiento y Recreación</option>
                                <option>Otras Actividades de Servicios</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-4 form-group" >
                            <div class="" v-show="work_actually && laboral_sector != ''">
                              <label for="">Tiene negocio propio</label>
                              <br>
                              <input id="toggle-bussiness-owner"  type="checkbox" data-toggle="toggle" data-onstyle="secondary" data-offstyle="light" data-on="Si" data-off="No" v-model="bussiness_owner">

                            </div>

                          </div>
                          <div class="col-4 form-group">
                            <div class="" v-if="bussiness_owner && work_actually">
                              <label for="">¿De que manera trabaja?</label>
                              <br>
                              <select class="form-control" v-model="way_working">
                                <option>Formal</option>
                                <option>Informal</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-4 form-group">
                            <div class="" v-if="way_working ==='Formal' && work_actually">
                              <label for="">Tipo de empresa</label>
                              <br>
                              <select class="form-control" v-model="type_company">
                                <option>Pública</option>
                                <option>Privada</option>
                              </select>

                            </div>
                          </div>
                          <div class="col-6 form-group">
                            <div class="" v-if="!work_actually && !work_actually1">
                              <label for="">¿Desde hace cuánto tiempo no trabaja?</label>
                              <br>
                              <select class="form-control" v-model="time_not_to_work">
                                <option>Nunca he trabajado</option>
                                <option>Menos de un año</option>
                                <option>De 1 a 5 años</option>
                                <option>Más de 5 años</option>
                              </select>

                            </div>
                          </div>
                          <div class="col-6 form-group">

                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 text-center">
                            <hr>
                            <button class="btn btn-secondary btn-lg" type="submit" name="button">¡Registrarme!</button>
                          </div>
                        </div>

                      </form>
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
        msj_button: 'Registrarme como Aliado',
        tipo_registro: 'Beneficiaria',
        work_actually1 : '',
        neighborhood1 : '',
        msj : '',
        a : false,
        // Variables para la base de datos
        name : this.usuario.name,
        email : this.usuario.email, 
        email_verified_at : this.usuario.email_verified_at,
        password : this.usuario.password,
        password1 : this.usuario.password,
        remember_token : this.usuario.remember_token,
        type_dni : this.usuario.type_dni,
        dni : this.usuario.dni,
        last_name : this.usuario.last_name,
        birthdate : this.usuario.birthdate,
        adress :this.usuario.adress,
        neighborhood : this.usuario.neighborhood,
        commune : this.usuario.commune,
        phone : this.usuario.phone,
        civil_status : this.usuario.civil_status,
        has_children : this.usuario.has_children,
        level_study : this.usuario.level_study,
        last_study : this.usuario.last_study,
        degree : this.usuario.degree,
        study_actually : this.usuario.study_actually,
        what_studies : this.usuario.what_studies,
        work_actually : this.usuario.work_actually,

        laboral_sector : this.usuario.laboral_sector,
        bussiness_owner : this.usuario.bussiness_owner,
        way_working : this.usuario.way_working,
        type_company : this.usuario.type_company,
        time_not_to_work : this.usuario.time_not_to_work


    }
  },

  props:['usuario'],

  methods:{
      cambiar_registro(){
        if (this.tipo_registro == 'Beneficiaria') {
          this.tipo_registro = 'Aliado'
          this.msj_button = 'Registrarme como Beneficiaria';

        }else {
          this.tipo_registro = 'Beneficiaria'
          this.msj_button = 'Registrarme como Aliado';
        }
        $('#tipo_documento').focus();
      },

      saveUser(){
        var  name = this.name;

        var  email = this.email;
        var  email_verified_at = "";
        var  password = this.password;
        if ((this.password).length < 5) {
          this.showMessage('La contraseña debe contener mínimo 5 caracteres', 'password');
          return;
        }
        if (this.password != this.password1) {
          this.showMessage('Las contraseñas no coindicen, intente de nuevo', 'password');
          return;
        }
        console.log(this.email);
        var  remember_token = '';
        var  type_dni = this.type_dni;
        var  dni = this.dni;
        var  last_name = this.last_name;
        var  birthdate = this.birthdate;
        var  adress = this.adress;
        var  neighborhood = this.neighborhood;
        var  commune = '';

        if (neighborhood === 'OTRO') {
          neighborhood = this.neighborhood1;
        }else if (neighborhood != '') {
          var cadenas = neighborhood.split('-');
          neighborhood = cadenas[1];
          commune = cadenas[0];
        }
        var  phone = this.phone;

        var  civil_status = '';
        var  has_children = '';
        var  level_study = '';
        var  last_study = '';
        var  degree = '';
        var  study_actually = '';
        var  what_studies = '';
        var  work_actually = '';
        var  laboral_sector = '';
        var  bussiness_owner = '';
        var  way_working = '';
        var  type_company = '';
        var  time_not_to_work = '';

        if (this.tipo_registro == 'Beneficiaria') {
          civil_status = this.civil_status;
          has_children = this.has_children;
          level_study = this.level_study;
          last_study = this.last_study;
          degree = this.degree;
          study_actually = this.study_actually;
          what_studies = this.what_studies;
          work_actually = this.work_actually;
          laboral_sector = this.laboral_sector;
          bussiness_owner = this.bussiness_owner;
          way_working = this.way_working;
          type_company = this.type_company;
          time_not_to_work = this.time_not_to_work;
        }

        axios.post('/adminUsers/addNewUser', {
          name: name,
          email: email,
          email_verified_at : email_verified_at,
          password : password,
          remember_token : remember_token,
          type_dni : type_dni,
          dni : dni,
          last_name : last_name,
          birthdate : birthdate,
          adress : adress,
          neighborhood : neighborhood,
          commune : commune,
          phone : phone,
          civil_status : civil_status,
          has_children : has_children,
          level_study : level_study,
          last_study : last_study,
          degree : degree,
          study_actually : study_actually,
          what_studies : what_studies,
          work_actually : work_actually,
          laboral_sector : laboral_sector,
          bussiness_owner : bussiness_owner,
          way_working : way_working,
          type_company : type_company,
          time_not_to_work : time_not_to_work,
          tipo_registro : this.tipo_registro
        }
        ).then(response => {
          if (response.data.status) {
            this.login(this.email, this.password);
          }


        }).catch(function (error){
          console.log(error);
        });




      },

      login(email, password){
        axios.post('login', {
          email: email,  password: password
        }
        ).then(response => {
          window.location.href = 'home';

        }).catch(function (error){
          console.log(error);
        });
      },

      showMessage: function(msj, form){
        this.msj = msj;
        this.a = true;
        $("#msj").fadeIn(500);
        setTimeout(function(){
            $("#msj").fadeOut();
            this.a = false;
        }, 2000);

        window.scrollTo(0,0);
        if (form != null) {
          $('#'+form).focus();
        }
      }


  },

  mounted(){
    var self = this;
    $('#tipo_documento').focus();
    $('#toggle-has-children').change(function() {
          if($(this).prop('checked')){
            self.has_children = true;
          }else{
            self.has_children = false;
          }
        });
    $('#toggle-study-actually').change(function() {
          if($(this).prop('checked')){
            self.study_actually = true;
          }else{
            self.study_actually = false;
          }
        });
    $('#toggle-work-actually').change(function() {
          if($(this).prop('checked')){
            self.work_actually = true;
            self.work_actually1 = true;
          }else{
            self.work_actually = false;
            self.work_actually1 = false;
          }
        });
    $('#toggle-bussiness-owner').change(function() {
          if($(this).prop('checked')){
            self.bussiness_owner = true;
          }else{
            self.bussiness_owner = false;
          }
        });
    self.work_actually1 = true;


  }
}
</script>

<style lang="css" scoped>
</style>
