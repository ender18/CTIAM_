
<template >

  <div class="container">
    <spinner v-show="spinner"></spinner>

      <div class="row justify-content-center pt-4 pb-3">
          <div class="col-md-8">
              <div class="card border-0 shadow">
                <div class="card-header text-center border-0 bg-white">
                  <div class="row">
                    <div class="col-12">
                      <h1>Formulario de Registro - <strong>{{tipo_registro}}</strong> </h1>
                    </div>
                    <div class="col-12">
                      <p>Tambien puedes registrarte como: <a href="#" class="text-secondary" v-on:click="cambiar_registro(rol_button1, '1')"> {{rol_button1}} </a>  o  <a href="#" class="text-secondary" v-on:click="cambiar_registro(rol_button2, '2')"> {{rol_button2}} </a></p>
                      <hr class="hr-pink-center">
                    </div>
                  </div>
                </div>

                  <div class="card-body">
                      <form class="form-group" method="POST" action="" v-on:submit.prevent="saveUser()">
                        <div class="row">
                          <div class="col-12">
                            <h5><strong>Información Básica</strong></h5>
                            <hr class="hr-pink-left">
                          </div>
                          <div class="col-12 col-lg-6 form-group">
                            <label for="">Tipo de Documento</label>
                            <select class="form-control border-round" v-model="type_dni" id="tipo_documento" >
                              <option value="CC">Cedula de Ciudadanía</option>
                              <option value="NIT">NIT</option>
                              <option value="CE">Cedula de extranjeria</option>
                              <option value="Pasaporte">Pasaporte</option>
                              <option value="TI">Tarjeta de identidad</option>
                            </select>
                          </div>
                          <div class="col-12 col-lg-6 form-group">
                            <label for="">Número de identificación</label>
                            <input type="number" name="" class="form-control  border-round " v-model="dni">
                          </div>
                          <div class="col-12 col-lg-6 form-group">
                            <label for="" v-if="type_dni != 'NIT'">Nombres</label>
                            <label for="" v-if="type_dni == 'NIT'">Razón social</label>
                            <input type="text" name="" class="form-control border-round " v-model="name" required>
                          </div>
                          <transition name="fade">
                          <div class="col-12 col-lg-6 form-group" v-if="type_dni != 'NIT'">
                            <label for="">Apellidos</label>
                            <input type="text" name="" class="form-control border-round " v-model="last_name">
                          </div>
                        </transition>
                          <div class="col-12 col-lg-6 form-group">
                            <label for="">Correo</label>
                            <input id="email" type="email" name="" class="form-control border-round " v-model="email" required>
                          </div>
                          <transition name="fade">
                          <div class="col-12 col-lg-6 form-group" v-if="type_dni != 'NIT'">
                            <label for="">Fecha de Nacimiento</label>
                            <input type="date" name="" class="form-control border-round " v-model="birthdate" :max="fecha_minima">
                          </div>
                        </transition>

                          <div class="col-12 col-lg-6 form-group">
                            <label for="">Dirección</label>
                            <input type="text" name="" class="form-control border-round " v-model="adress">
                          </div>
                          <div class="col-12 col-lg-6 form-group">
                            <label for="">Barrio / Sector</label>
                            <select class="form-control border-round " v-model="neighborhood">
                              <option value='OTRO'>OTRO</option>
                              <option value='8- 1 DE MAYO B. PALMERAS (PARTE BAJA)'>1 DE MAYO B. PALMERAS (PARTE BAJA)</option>
                              <option value='8- A H. 13 DE MAYO'>A H. 13 DE MAYO</option>
                              <option value='7- A. COLOMBIA I'>A. COLOMBIA I</option>
                              <option value='7- A. CRISPIN DURAN PARTE BAJA'>A. CRISPIN DURAN PARTE BAJA</option>
                              <option value='8- A. ESPIRITU SANTO'>A. ESPIRITU SANTO</option>
                              <option value='7- A. GUADALUPE'>A. GUADALUPE</option>
                              <option value='7- A. H. CRISPIN DURAN'>A. H. CRISPIN DURAN</option>
                              <option value='6- A. H. EL DORADO'>A. H. EL DORADO</option>
                              <option value='6- A. H. EL SALADO'>A. H. EL SALADO</option>
                              <option value='8- A. JUAN PABLO II'>A. JUAN PABLO II</option>
                              <option value='6- A. LA CONQUISTA'>A. LA CONQUISTA</option>
                              <option value='9- A. MARIA TERESA'>A. MARIA TERESA</option>
                              <option value='8- A. NUEVA ESPERANZA'>A. NUEVA ESPERANZA</option>
                              <option value='6- A. SEIS DE MAYO P. ALTA'>A. SEIS DE MAYO P. ALTA</option>
                              <option value='7- A. VILLA PAZ'>A. VILLA PAZ</option>
                              <option value='8- A.H CAMPO ALEGRE'>A.H CAMPO ALEGRE</option>
                              <option value='7- A.H. BRISAS DE LA HERMITA'>A.H. BRISAS DE LA HERMITA</option>
                              <option value='6- A.H. BRISAS DEL PARAISO'>A.H. BRISAS DEL PARAISO</option>
                              <option value='6- A.H. CARLOS GARCIA LOZADA'>A.H. CARLOS GARCIA LOZADA</option>
                              <option value='6- A.H. MARIA AUXILIADORA'>A.H. MARIA AUXILIADORA</option>
                              <option value='6- A.H. VILLA NUEVA'>A.H. VILLA NUEVA</option>
                              <option value='3- AGUAS CALIENTES'>AGUAS CALIENTES</option>
                              <option value='9- ARNULFO BRICEÑO'>ARNULFO BRICEÑO</option>
                              <option value='7- ASENT. BRISAS DE LA HERMITA.II.'>ASENT. BRISAS DE LA HERMITA.II.</option>
                              <option value='8- ASENT. BRISAS, PAZ Y FUTURO'>ASENT. BRISAS, PAZ Y FUTURO</option>
                              <option value='8- ASENT. H. LA FE.'>ASENT. H. LA FE.</option>
                              <option value='8- ASENT. H. LA ISLA.'>ASENT. H. LA ISLA.</option>
                              <option value='6- ASENT. H. TORREMOLINOS'>ASENT. H. TORREMOLINOS</option>
                              <option value='8- ASENT. HUM. BRISAS DEL SOL.'>ASENT. HUM. BRISAS DEL SOL.</option>
                              <option value='8- ASENT. HUM. EL OASIS.'>ASENT. HUM. EL OASIS.</option>
                              <option value='7- ASENT. JOSE BERNAL.'>ASENT. JOSE BERNAL.</option>
                              <option value='3- ASENT. NUEVO MILENIO'>ASENT. NUEVO MILENIO</option>
                              <option value='4- B. 13 DE MARZO'>B. 13 DE MARZO</option>
                              <option value='9- B. 28 DE FEBRERO'>B. 28 DE FEBRERO</option>
                              <option value='6- B. AEROPUERTO'>B. AEROPUERTO</option>
                              <option value='10- B. ALFONSO LOPEZ'>B. ALFONSO LOPEZ</option>
                              <option value='6- B. ALONCITO'>B. ALONCITO</option>
                              <option value='4- B. ALTO PAMPLONITA'>B. ALTO PAMPLONITA</option>
                              <option value='8- B. ANTONIA SANTOS'>B. ANTONIA SANTOS</option>
                              <option value='9- B. BELEN'>B. BELEN</option>
                              <option value='8- B. BELISARIO'>B. BELISARIO</option>
                              <option value='3- B. BELLA VISTA'>B. BELLA VISTA</option>
                              <option value='3- B. BOGOTA'>B. BOGOTA</option>
                              <option value='6- B. BRISAS DEL PORVENIR'>B. BRISAS DEL PORVENIR</option>
                              <option value='7- B. BUENOS AIRES'>B. BUENOS AIRES</option>
                              <option value='7- B. CAMILO DAZA'>B. CAMILO DAZA</option>
                              <option value='10- B. CAMILO TORRES'>B. CAMILO TORRES</option>
                              <option value='6- B. CAÑO LIMON-COVEÑAS'>B. CAÑO LIMON-COVEÑAS</option>
                              <option value='8- B. CARLOS RAMIREZ P.'>B. CARLOS RAMIREZ P.</option>
                              <option value='6- B. CARLOS TOLEDO PLATA'>B. CARLOS TOLEDO PLATA</option>
                              <option value='9- B. CARORA'>B. CARORA</option>
                              <option value='2- B. CEIBA-QTA.BOSCH'>B. CEIBA-QTA.BOSCH</option>
                              <option value='6- B. CERRO NORTE'>B. CERRO NORTE</option>
                              <option value='7- B. CHAPINERO'>B. CHAPINERO</option>
                              <option value='10- B. CIRCUNVALACION'>B. CIRCUNVALACION</option>
                              <option value='5- B. CIUDAD JARDIN'>B. CIUDAD JARDIN</option>
                              <option value='7- B. CLARET'>B. CLARET</option>
                              <option value='5- B. COLPET'>B. COLPET</option>
                              <option value='10- B. CUBEROS NIÑO'>B. CUBEROS NIÑO</option>
                              <option value='8- B. CUCUTA 75'>B. CUCUTA 75</option>
                              <option value='9- B. CUNDINAMARCA'>B. CUNDINAMARCA</option>
                              <option value='6- B. DIVINO NIÑO'>B. DIVINO NIÑO</option>
                              <option value='8- B. DOÑA NIDIA'>B. DOÑA NIDIA</option>
                              <option value='1- B. EL CALLEJON'>B. EL CALLEJON</option>
                              <option value='1- B. EL CONTENTO'>B. EL CONTENTO</option>
                              <option value='8- B. EL DESIERTO'>B. EL DESIERTO</option>
                              <option value='7- B. EL PARAISO'>B. EL PARAISO</option>
                              <option value='1- B. EL PARAMO'>B. EL PARAMO</option>
                              <option value='6- B. EL PORVENIR'>B. EL PORVENIR</option>
                              <option value='8- B. EL PROGRESO'>B. EL PROGRESO</option>
                              <option value='7- B. EL ROSAL DEL NORTE'>B. EL ROSAL DEL NORTE</option>
                              <option value='6- B. FLORIDA BLANCA'>B. FLORIDA BLANCA</option>
                              <option value='10- B. GAITAN'>B. GAITAN</option>
                              <option value='5- B. GUAIMARAL'>B. GUAIMARAL</option>
                              <option value='10- B. JOSE A. GALAN'>B. JOSE A. GALAN</option>
                              <option value='8- B. JUAN ATALAYA III ETP.'>B. JUAN ATALAYA III ETP.</option>
                              <option value='10- B. LA CABRERA'>B. LA CABRERA</option>
                              <option value='7- B. LA FLORIDA'>B. LA FLORIDA</option>
                              <option value='7- B. LA HERMITA'>B. LA HERMITA</option>
                              <option value='6- B. LA INSULA'>B. LA INSULA</option>
                              <option value='7- B. LA LAGUNA'>B. LA LAGUNA</option>
                              <option value='3- B. LA LIBERTAD'>B. LA LIBERTAD</option>
                              <option value='1- B. LA PLAYA'>B. LA PLAYA</option>
                              <option value='7- B. LA PRIMAVERA'>B. LA PRIMAVERA</option>
                              <option value='3- B. LA UNION'>B. LA UNION</option>
                              <option value='8- B. LA VICTORIA'>B. LA VICTORIA</option>
                              <option value='8- B. LAS PALMERAS ALTA'>B. LAS PALMERAS ALTA</option>
                              <option value='2- B. LIBERT.-CAOBOS'>B. LIBERT.-CAOBOS</option>
                              <option value='1- B. LLANO'>B. LLANO</option>
                              <option value='5- B. LLERAS RESTREPO'>B. LLERAS RESTREPO</option>
                              <option value='9- B. LOMA DE BOLIVAR'>B. LOMA DE BOLIVAR</option>
                              <option value='8- B. LOS ALMENDROS'>B. LOS ALMENDROS</option>
                              <option value='9- B. LOS ALPES'>B. LOS ALPES</option>
                              <option value='7- B. LOS CARACOLES'>B. LOS CARACOLES</option>
                              <option value='7- B. LOS COMUNEROS'>B. LOS COMUNEROS</option>
                              <option value='6- B. LOS LAURELES'>B. LOS LAURELES</option>
                              <option value='7- B. LOS MOTILONES'>B. LOS MOTILONES</option>
                              <option value='8- B. LOS OLIVOS'>B. LOS OLIVOS</option>
                              <option value='10- B. MAGDALENA'>B. MAGDALENA</option>
                              <option value='6- B. MARIA PAZ'>B. MARIA PAZ</option>
                              <option value='7- B. MARIANO OSPINA PEREZ'>B. MARIANO OSPINA PEREZ</option>
                              <option value='6- B. METROPOLI'>B. METROPOLI</option>
                              <option value='8- B. NIÑA CECI'>B. NIÑA CECI</option>
                              <option value='4- B. NUEVA SANTA CLARA'>B. NUEVA SANTA CLARA</option>
                              <option value='9- B. NUEVO'>B. NUEVO</option>
                              <option value='8- B. NUEVO HORIZONTE'>B. NUEVO HORIZONTE</option>
                              <option value='3- B. P - SALAVARRIETA'>B. P - SALAVARRIETA</option>
                              <option value='4- B. PAMPLONITA'>B. PAMPLONITA</option>
                              <option value='6- B. PANAMERICANO'>B. PANAMERICANO</option>
                              <option value='5- B. PESCADERO'>B. PESCADERO</option>
                              <option value='2- B. POPULAR'>B. POPULAR</option>
                              <option value='9- B. PUEBLO NUEVO'>B. PUEBLO NUEVO</option>
                              <option value='10- B. PUENTE BARCO'>B. PUENTE BARCO</option>
                              <option value='6- B. RAFAEL NUÑEZ'>B. RAFAEL NUÑEZ</option>
                              <option value='9- B. RUDESINDO SOTO'>B. RUDESINDO SOTO</option>
                              <option value='5- B. SAN EDUARDO II ETP.'>B. SAN EDUARDO II ETP.</option>
                              <option value='6- B. SAN GERARDO'>B. SAN GERARDO</option>
                              <option value='7- B. SAN JERONIMO'>B. SAN JERONIMO</option>
                              <option value='10- B. SAN JOSE'>B. SAN JOSE</option>
                              <option value='4- B. SAN LUIS'>B. SAN LUIS</option>
                              <option value='4- B. SAN MARTIN'>B. SAN MARTIN</option>
                              <option value='3- B. SAN MATEO'>B. SAN MATEO</option>
                              <option value='9- B. SAN MIGUEL'>B. SAN MIGUEL</option>
                              <option value='10- B. SAN RAFAEL'>B. SAN RAFAEL</option>
                              <option value='3- B. SANTA ANA'>B. SANTA ANA</option>
                              <option value='4- B. SANTA CLARA'>B. SANTA CLARA</option>
                              <option value='4- B. SANTA TERESITA'>B. SANTA TERESITA</option>
                              <option value='10- B. SANTANDER'>B. SANTANDER</option>
                              <option value='10- B. SANTO DOMINGO'>B. SANTO DOMINGO</option>
                              <option value='5- B. SEVILLA'>B. SEVILLA</option>
                              <option value='8- B. SIETE DE AGOSTO'>B. SIETE DE AGOSTO</option>
                              <option value='6- B. SIMON BOLIVAR'>B. SIMON BOLIVAR</option>
                              <option value='7- B. TUCUNARE'>B. TUCUNARE</option>
                              <option value='3- B. VALLE ESTHER'>B. VALLE ESTHER</option>
                              <option value='6- B. VIRGILIO BARCO V.'>B. VIRGILIO BARCO V.</option>
                              <option value='5- B.MERCED-JUANA RANGEL'>B.MERCED-JUANA RANGEL</option>
                              <option value='9- BELEN DE UMBRIA'>BELEN DE UMBRIA</option>
                              <option value='3- BOCONO'>BOCONO</option>
                              <option value='6- BRISAS DE LOS MOLINOS .'>BRISAS DE LOS MOLINOS .</option>
                              <option value='6- BRISAS DEL AEROPUERTO'>BRISAS DEL AEROPUERTO</option>
                              <option value='4- CAÑAFISTOLO'>CAÑAFISTOLO</option>
                              <option value='6- CARLOS PIZARRO'>CARLOS PIZARRO</option>
                              <option value='6- CASERIO EL CERRITO'>CASERIO EL CERRITO</option>
                              <option value='6- CECILIA CASTRO'>CECILIA CASTRO</option>
                              <option value='8- CGTO. EL RODEO'>CGTO. EL RODEO</option>
                              <option value='8- CIUDADELA EL PROGRESO'>CIUDADELA EL PROGRESO</option>
                              <option value='2- COLSAG Y LA RIVIERA'>COLSAG Y LA RIVIERA</option>
                              <option value='9- CUNDINAMARCA. SECTOR ALTO'>CUNDINAMARCA. SECTOR ALTO</option>
                              <option value='9- D.P. BRISAS DE LOS ANDES'>D.P. BRISAS DE LOS ANDES</option>
                              <option value='9- DIEGO JARAMILLO'>DIEGO JARAMILLO</option>
                              <option value='4- EL ESCOBAL'>EL ESCOBAL</option>
                              <option value='4- EL NUEVO ESCOBAL'>EL NUEVO ESCOBAL</option>
                              <option value='9- EL REPOSO'>EL REPOSO</option>
                              <option value='4- GUSTAVO ARARAT NEGRON - U. PRADOS DEL ESTE'>GUSTAVO ARARAT NEGRON - U. PRADOS DEL ESTE</option>
                              <option value='8- JERONIMO URIBE .'>JERONIMO URIBE .</option>
                              <option value='7- JUAN BAUTISTA SCALABRINNI'>JUAN BAUTISTA SCALABRINNI</option>
                              <option value='8- JUANA RANGEL DE CUELLAR'>JUANA RANGEL DE CUELLAR</option>
                              <option value='6- JVC A.H. PAZ Y PROGRESO'>JVC A.H. PAZ Y PROGRESO</option>
                              <option value='8- JVC EL TUNAL'>JVC EL TUNAL</option>
                              <option value='8- JVC MINUTO DE DIOS'>JVC MINUTO DE DIOS</option>
                              <option value='4- LA CAMPIÑA ESCOBAL II'>LA CAMPIÑA ESCOBAL II</option>
                              <option value='9- LA DIVINA PASTORA'>LA DIVINA PASTORA</option>
                              <option value='3- LA ESMERALDA'>LA ESMERALDA</option>
                              <option value='6- LAS CUMBRES DEL NORTE'>LAS CUMBRES DEL NORTE</option>
                              <option value='9- LAS DELICIAS'>LAS DELICIAS</option>
                              <option value='8- LOS CANARIOS DEL RODEO'>LOS CANARIOS DEL RODEO</option>
                              <option value='8- MANUELA BELTRAN'>MANUELA BELTRAN</option>
                              <option value='8- MARIA GRACIA.'>MARIA GRACIA.</option>
                              <option value='2- PICAVIGO'>PICAVIGO</option>
                              <option value='2- PROCERES -URAPANES'>PROCERES -URAPANES</option>
                              <option value='2- QUINTA ORIENTAL'>QUINTA ORIENTAL</option>
                              <option value='8- SABANA VERDE'>SABANA VERDE</option>
                              <option value='3- SIMON BOL.-U.SANT. ANA'>SIMON BOL.-U.SANT. ANA</option>
                              <option value='4- TORCOROMA III'>TORCOROMA III</option>
                              <option value='7- TUCUNARE PARTE ALTA.'>TUCUNARE PARTE ALTA.</option>
                              <option value='4- U. ANIVERSARIO'>U. ANIVERSARIO</option>
                              <option value='4- U. ANIVERSARIO II ETP.'>U. ANIVERSARIO II ETP.</option>
                              <option value='4- U. BOSQUES DEL PAMPLONITA'>U. BOSQUES DEL PAMPLONITA</option>
                              <option value='6- U. COLINAS DE LA VICTORIA'>U. COLINAS DE LA VICTORIA</option>
                              <option value='4- U. EDO. TRUJILLO-S.MARTIN II'>U. EDO. TRUJILLO-S.MARTIN II</option>
                              <option value='5- U. EL BOSQUE'>U. EL BOSQUE</option>
                              <option value='5- U. GRATAMIRA'>U. GRATAMIRA</option>
                              <option value='4- U. HELIOPOLIS'>U. HELIOPOLIS</option>
                              <option value='4- U. JOSE DE TORCOROMA'>U. JOSE DE TORCOROMA</option>
                              <option value='8- U. JUAN ATALAYA I ETP.'>U. JUAN ATALAYA I ETP.</option>
                              <option value='4- U. LA ALAMEDA'>U. LA ALAMEDA</option>
                              <option value='6- U. LA CONCORDIA'>U. LA CONCORDIA</option>
                              <option value='4- U. LA QUINTA'>U. LA QUINTA</option>
                              <option value='6- U. LAS AMERICAS'>U. LAS AMERICAS</option>
                              <option value='3- U. LAS MARGARITAS'>U. LAS MARGARITAS</option>
                              <option value='2- U. LOS ACACIOS'>U. LOS ACACIOS</option>
                              <option value='6- U. MOLINOS DEL NORTE'>U. MOLINOS DEL NORTE</option>
                              <option value='5- U. NIZA SUR'>U. NIZA SUR</option>
                              <option value='4- U. NUEVA ESPERANZA'>U. NUEVA ESPERANZA</option>
                              <option value='6- U. PORTAL DE LAS AMERCAS'>U. PORTAL DE LAS AMERCAS</option>
                              <option value='5- U. PRADOS DEL NORTE'>U. PRADOS DEL NORTE</option>
                              <option value='6- U. RAFAEL GARCIA-HERRERO'>U. RAFAEL GARCIA-HERRERO</option>
                              <option value='5- U. SAN EDUARDO'>U. SAN EDUARDO</option>
                              <option value='5- U. SANTA ELENA'>U. SANTA ELENA</option>
                              <option value='2- U. SANTA LUCIA'>U. SANTA LUCIA</option>
                              <option value='5- U. TASAJERO'>U. TASAJERO</option>
                              <option value='4- U. TORCOROMA'>U. TORCOROMA</option>
                              <option value='4- U. TORCOROMA 2 SECT 1,2,3'>U. TORCOROMA 2 SECT 1,2,3</option>
                              <option value='4- U. TORCOROMA II'>U. TORCOROMA II</option>
                              <option value='4- U. TORCOROMA SIGLO XXI'>U. TORCOROMA SIGLO XXI</option>
                              <option value='5- U. ZULIMA I ETP'>U. ZULIMA I ETP</option>
                              <option value='5- U. ZULIMA III ETP.'>U. ZULIMA III ETP.</option>
                              <option value='5- U. ZULIMA IV ETP.'>U. ZULIMA IV ETP.</option>
                              <option value='2- URB. ALCALA'>URB. ALCALA</option>
                              <option value='2- URB. CEIBA II'>URB. CEIBA II</option>
                              <option value='8- URB. CIUDAD RODEO'>URB. CIUDAD RODEO</option>
                              <option value='7- URB. CORMORANES'>URB. CORMORANES</option>
                              <option value='8- URB. ESTORAQUES'>URB. ESTORAQUES</option>
                              <option value='6- URB. GARCIA HERREROS ETAP III, Y IV.'>URB. GARCIA HERREROS ETAP III, Y IV.</option>
                              <option value='10- URB. LA AURORA'>URB. LA AURORA</option>
                              <option value='9- URB. LA COLINA'>URB. LA COLINA</option>
                              <option value='8- URB. LA CORALINA'>URB. LA CORALINA</option>
                              <option value='2- URB. LA ESPERANZA'>URB. LA ESPERANZA</option>
                              <option value='5- URB. LA MAR'>URB. LA MAR</option>
                              <option value='8- URB. MINUTO DE DIOS'>URB. MINUTO DE DIOS</option>
                              <option value='5- URB. NIZA NORTE'>URB. NIZA NORTE</option>
                              <option value='6- URB. PANAMERICANA'>URB. PANAMERICANA</option>
                              <option value='5- URB. PORTACHUELO'>URB. PORTACHUELO</option>
                              <option value='8- URB. SAN FERNANDO DEL RODEO'>URB. SAN FERNANDO DEL RODEO</option>
                              <option value='6- URB. TRIGAL DEL NORTE'>URB. TRIGAL DEL NORTE</option>
                              <option value='8- VALLES DE GIRÓN'>VALLES DE GIRÓN</option>
                              <option value='8- VALLES DEL RODEO'>VALLES DEL RODEO</option>
                              <option value='6- VILLA DE LOS TEJARES'>VILLA DE LOS TEJARES</option>
                              <option value='9- VILLAS DE LA PAZ'>VILLAS DE LA PAZ</option>
                              <option value='6- VILLAS DE LAS AMERICAS'>VILLAS DE LAS AMERICAS</option>
                              <option value='5- ZULIMA II ETP'>ZULIMA II ETP</option>


                            </select>
                          </div>

                          <div class="col-12 col-lg-6 form-group" v-if="neighborhood ==='OTRO'">
                              <label for="">¿Cual barrio o sector?</label>
                              <input type="text" name="" class="form-control border-round " v-model="neighborhood1">
                          </div>
                          <div class="col-12 col-lg-6 form-group">
                            <label for="">Teléfono</label>
                            <input type="text" name="" class="form-control border-round "  v-model="phone">
                          </div>
                          <div class="col-12 col-lg-6 form-group" v-if="neighborhood !=='OTRO'">
                          </div>
                          <div class="col-12" v-show="tipo_registro != 'Aliado'">
                            <div class="row">
                              <div class="col-12 col-lg-6 form-group">
                                <label for="">¿Pertenezco a un aliado de la Red de Conocimiento?</label>
                                <br>
                                <input id="toggle-ihave-ally"   type="checkbox" data-toggle="toggle" data-onstyle="secondary" data-offstyle="light"  data-style="ios" data-on="Si" data-off="No" v-model="study_actually">
                              </div>
                              <transition name="fade">
                              <div class="col-12 col-lg-6 form-group" v-if="view_ihave_ally">
                                <label for="">¿Cúal?</label>
                                <select class="form-control  border-round " v-model="ihave_ally">
                                  <option v-for="aliado in aliados1" :value="aliado.user_id" >{{aliado.last_name}} {{aliado.name}}</option>
                                </select>
                              </div>
                            </transition>
                            </div>
                          </div>
                          <div class="col-12 col-lg-6 form-group">
                              <label>Contraseña</label>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="input-group">
                                    <input :type="type_password_new" ref="password_new" class="form-control  border-round " v-on:keyup="validarSeguridad()" v-model="password" required>
                                    <div class="input-group-append">
                                      <button class="btn btn-primary  border-round " type="button" v-on:click="showHidePassword('new_password')">
                                        <i :class="icon_password_new"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <div class="">
                                    <small v-show="password.length < 5" id="emailHelp" class="form-text text-muted">La nueva contraseña debe contener almenos 5 caracteres.</small>
                                    <small v-show="password.length >= 5" class="form-text text-muted">Nivel de seguridad:  <span :class="'badge badge-' + strong_password_color_msj">{{strong_password_msj}}</span>  </small>
                                  </div>
                                  <div v-show="password.length >= 5" class="progress" style="height: 5px;">
                                    <div :class="'progress-bar bg-'+ strong_password_color_msj" role="progressbar" :style="'width: '+ percent_progress_bar+ '%;'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <div class="">
                                    <small v-show="password.length >= 5 && (strong_password_msj == 'Bajo' || strong_password_msj == 'Medio'  ) " class="form-text text-muted"><em>Para mejorar la seguridad de la contraseña incluya números, letras minúsculas y mayúsculas</em></small>
                                  </div>
                                </div>

                              </div>

                          </div>

                          <div class="col-12 col-lg-6 form-group">
                              <label>Verificar Contraseña</label>
                              <div class="row">
                                <div class="col-12">
                                  <div class="input-group pl-0">
                                    <input :type="type_password_verify" class="form-control  border-round " v-model="password1" v-on:keyup="compararContrasenas()" required>
                                    <div class="input-group-append">
                                      <button class="btn btn-primary  border-round " type="button" v-on:click="showHidePassword('verify_password')">
                                        <i :class="icon_password_verify"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <div class="">
                                    <small v-show="password1.length > 0" id="emailHelp" :class="'form-text '+verify_class">{{verify_msj}}</small>
                                  </div>
                                </div>

                              </div>

                          </div>
                        </div>

                        <transition name="fade">

                        <div class="row" v-show="tipo_registro === 'Beneficiaria'">


                          <div class="col-12" >

                            <h5><strong>Información Complementaria</strong></h5>
                            <hr class="hr-pink-left">
                          </div>
                          <div class="col-12 col-lg-6 form-group">
                            <label for="">Estado civil</label>
                            <select class="form-control  border-round " v-model="civil_status">
                              <option>Soltera</option>
                              <option>Unión libre</option>
                              <option>Casada</option>
                              <option>Divorciada</option>
                              <option>Viuda</option>
                            </select>
                          </div>
                          <div class="col-12 col-lg-6 form-group">
                            <label for="">¿Tiene hijos?</label>
                            <br>
                            <input id="toggle-has-children"  data-style="ios" type="checkbox" data-toggle="toggle" data-onstyle="secondary" data-offstyle="light" data-on="Si" data-off="No" v-model="has_children">
                          </div>
                          <div class="col-12 col-lg-4 form-group">
                            <label for="">Nivel de estudio</label>
                            <select class="form-control  border-round" v-model="level_study">
                              <option>Profesional</option>
                              <option>Tecnóloga</option>
                              <option>Técnica</option>
                              <option>Secundaria</option>
                              <option>Primaria</option>
                              <option>No tiene</option>
                            </select>
                          </div>
                          <div class="col-12 col-lg-4 form-group">
                            <transition name="fade">
                            <div class="" v-if="level_study === 'Profesional' || level_study === 'Tecnóloga' || level_study === 'Técnica'">
                              <label for="">Título obtenido</label >
                                <select class="form-control  border-round" v-model="last_study">
                                  <option>Pregrado</option>
                                  <option>Especialista</option>
                                  <option>Magister</option>
                                  <option>Doctorado</option>
                                  <option>Técnico</option>
                                  <option>Tecnólogo</option>

                                  </optgroup>
                                </select>
                            </div>
                          </transition>
                          </div>
                          <div class="col-12 col-lg-4 form-group">
                            <transition name="fade">
                            <div class="" v-if="level_study === 'Profesional' || level_study === 'Tecnóloga' || level_study === 'Técnica'">
                              <label for="">Nombre del título obtenido</label>
                              <input type="text" name="" value="" class="form-control  border-round" v-model="degree">
                            </div>
                          </transition>
                          </div>
                          <div class="col-12 col-lg-4 form-group">
                            <label for="">¿Actualmente estudia?</label>
                            <br>
                            <input id="toggle-study-actually" data-style="ios" type="checkbox" data-toggle="toggle" data-onstyle="secondary" data-offstyle="light" data-on="Si" data-off="No" v-model="study_actually">

                          </div>
                          <div class="col-12 col-lg-8 form-group">
                            <transition name="fade">
                            <div class="" v-if="study_actually">
                              <label for="">¿Qué está estudiando?</label>
                              <select class="form-control  border-round" v-model="what_studies">
                                <option>Primaria</option>
                                <option>Secundaria</option>
                                <option>Tecnica</option>
                                <option>Tecnología</option>
                                <option>Pregrado</option>
                                <option>Postgrado</option>
                              </select>
                            </div>
                          </transition>
                          </div>
                          <div class="col-12 col-lg-4 form-group">
                            <label for="">¿Actualmente labora?</label>
                            <br>
                            <input id="toggle-work-actually" data-style="ios" type="checkbox" data-toggle="toggle" data-onstyle="secondary" data-offstyle="light" data-on="Si" data-off="No" v-model="work_actually">

                          </div>
                          <div class="col-12 col-lg-8 form-group">
                            <transition name="fade">
                            <div class="" v-if="work_actually">
                              <label for="">Sector en el que labora</label>
                              <select class="form-control border-round" v-model="laboral_sector">
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
                          </transition>
                          </div>
                          <div class="col-12 col-lg-4 form-group" >
                            <transition name="fade">
                            <div class="" v-show="work_actually && laboral_sector != ''">
                              <label for="">Tiene negocio propio</label>
                              <br>
                              <input id="toggle-bussiness-owner" data-style="ios" type="checkbox" data-toggle="toggle" data-onstyle="secondary" data-offstyle="light" data-on="Si" data-off="No" v-model="bussiness_owner">

                            </div>
                          </transition>

                          </div>
                          <div class="col-12 col-lg-4 form-group">
                            <transition name="fade">
                            <div class="" v-if="bussiness_owner && work_actually">
                              <label for="">¿De que manera trabaja?</label>
                              <br>
                              <select class="form-control  border-round" v-model="way_working">
                                <option>Formal</option>
                                <option>Informal</option>
                              </select>
                            </div>
                          </transition>
                          </div>
                          <div class="col-12 col-lg-4 form-group">
                            <transition name="fade">
                            <div class="" v-if="way_working ==='Formal' && work_actually">
                              <label for="">Tipo de empresa</label>
                              <br>
                              <select class="form-control  border-round" v-model="type_company">
                                <option>Pública</option>
                                <option>Privada</option>
                              </select>

                            </div>
                          </transition>
                          </div>
                          <div class="col-12 col-lg-6 form-group">
                            <transition name="fade">
                            <div class="" v-if="!work_actually && !work_actually1">
                              <label for="">¿Desde hace cuánto tiempo no labora?</label>
                              <br>
                              <select class="form-control  border-round" v-model="time_not_to_work">
                                <option>Nunca he trabajado</option>
                                <option>Menos de un año</option>
                                <option>De 1 a 5 años</option>
                                <option>Más de 5 años</option>
                              </select>

                            </div>
                          </transition>
                          </div>
                        </div>

                        </transition>

                        <div class="row">
                          <div class="col-12 text-center">
                            <hr>
                            <button class="btn btn-secondary btn-lg  border-round" type="submit" name="button"><strong>¡Registrarme!</strong></button>
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

        aliados1 : this.aliados,
        rol_button1 :'Aliado',
        rol_button2 : 'Tutor',

        tipo_registro: 'Beneficiaria',
        work_actually1 : false,
        neighborhood1 : '',
        msj : '',
        a : false,
        // Variables para la base de datos
        name : '',
        email : '', 
        email_verified_at : '',
        password : '',
        password1 : '',
        remember_token : '',
        type_dni : '',
        dni : '',
        last_name : '',
        birthdate : '',
        adress : '',
        neighborhood : '',
        commune : '',
        phone : '',
        civil_status : '',
        has_children : '',
        level_study : '',
        last_study : '',
        degree : '',
        study_actually : '',
        what_studies : '',
        work_actually : false,

        ihave_ally: '',
        view_ihave_ally : false,


        laboral_sector : '',
        bussiness_owner : '',
        way_working : '',
        type_company : '',
        time_not_to_work : '',

        // Variables para mostrar y ocultar contraseña
        type_password_actual : 'password',
        type_password_new : 'password',
        type_password_verify : 'password',
        icon_password_actual : 'fas fa-eye',
        icon_password_new : 'fas fa-eye',
        icon_password_verify : 'fas fa-eye',



        // Variables de seguridad de contraseña
        strong_password_msj : '',
        strong_password_color_msj : '',
        percent_progress_bar: 0,

        // Variables de verificar contraseña
        verify_msj : '',
        verify_class : '',
        spinner: false,
        fecha_minima: ""


    }
  },
  props:['aliados'],

  methods:{
      cambiar_registro(rol, button){
        if (button == '1') {
          this.rol_button1 = this.tipo_registro;
        }else {
          this.rol_button2 = this.tipo_registro;
        }
        this.tipo_registro = rol;
        $('#tipo_documento').focus();
      },

      saveUser(){

        var  name = this.name;
        var  email = this.email;
        var  email_verified_at = "";
        var  password = this.password;
        if ((this.password).length < 5) {
          toastr.error('La contraseña debe contener mínimo 5 caracteres', 'Error');
          return;
        }
        if (this.password != this.password1) {
          toastr.error('Las contraseñas no coindicen, intente de nuevo', 'Error');
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
        var  ihave_ally = '';
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
          ihave_ally = this.ihave_ally;
        }else if (this.tipo_registro == 'Tutor') {
          ihave_ally = this.ihave_ally;
        }

        this.spinner = true;

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
          ihave_ally : ihave_ally,
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


          this.spinner = false;
          if (response.data.status) {
            toastr.success(response.data.msj, 'Registro Exitoso');
            this.login(this.email, this.password);
          }else {
            toastr.error(response.data.msj, 'Error');
          }

        }).catch(function (error){
          this.spinner = false;
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
      },

      showHidePassword: function(input){

        if (input === 'actually_password') {
          if (this.type_password_actual === 'text') {
            this.type_password_actual = 'password';
            this.icon_password_actual = 'fas fa-eye';
          }else {
            this.type_password_actual = 'text';
            this.icon_password_actual = 'fas fa-eye-slash';
          }
        }
        else if (input === 'new_password') {
          if (this.type_password_new === 'text') {
            this.type_password_new = 'password';
            this.icon_password_new = 'fas fa-eye';
          }else {
            this.type_password_new = 'text';
            this.icon_password_new = 'fas fa-eye-slash';
          }
        }
        else if (input === 'verify_password') {
          if (this.type_password_verify === 'text') {
            this.type_password_verify = 'password';
            this.icon_password_verify = 'fas fa-eye';
          }else {
            this.type_password_verify = 'text';
            this.icon_password_verify = 'fas fa-eye-slash';
          }
        }

      },

      // Valida la complejidad de la contraseña
      validarSeguridad: function(){
        var pswd = this.password;

          if ( pswd.match(/[a-z]/) || pswd.match(/[A-Z]/) || pswd.match(/\d/) ) {
            this.strong_password_msj = 'Bajo';
            this.strong_password_color_msj = 'danger';
            this.percent_progress_bar = 30;
          }

          if ( pswd.match(/[a-z]/) && pswd.match(/[A-Z]/) || pswd.match(/[a-z]/) && pswd.match(/\d/) || pswd.match(/[A-Z]/) && pswd.match(/\d/) ) {
            this.strong_password_msj = 'Medio';
            this.strong_password_color_msj = 'warning';
            this.percent_progress_bar = 60;
          }

          if ( pswd.match(/[a-z]/) && pswd.match(/[A-Z]/) && pswd.match(/\d/) ) {
            this.strong_password_msj = 'Bueno';
            this.strong_password_color_msj = 'success';
            this.percent_progress_bar = 100;
          }
      },

      // Valida  si las contraseñas son iguales
        compararContrasenas : function(){
          if (this.password === this.password1) {
            this.verify_msj = 'Las contraseñas coinciden';
            this.verify_class = 'text-success';
          }else {
            this.verify_msj = 'Las contraseñas no coinciden';
            this.verify_class = 'text-danger';
          }
        },


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

    $('#toggle-ihave-ally').change(function() {
          if($(this).prop('checked')){
            self.view_ihave_ally = true;
          }else{
            self.view_ihave_ally = false;
            self.ihave_ally = '';
          }
        });

        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
        var day = dtToday.getDate();
        var year = dtToday.getFullYear()-5;
        if(month < 10)
              month = '0' + month.toString();
        if(day < 10)
              day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;

        self.fecha_minima = maxDate;


  }
}
</script>

<style lang="css" scoped>

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}

</style>
