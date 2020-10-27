<template>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="text-center">
        <h2>Mapa de beneficiarias por comunas</h2>
        <div class="progress" style="height: 4px;">
          <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <br>
      </div>
      <div style="height: 1200px;">
        <l-map
        style="height: 80%; width: 100%"
        :zoom="zoom"
        :center="center"
        @update:zoom="zoomUpdated"
        @update:center="centerUpdated"
        @update:bounds="boundsUpdated"
        >
        <l-tile-layer :url="url"></l-tile-layer>

<!-- Comuna 1 -->
        <l-polygon :lat-lngs="polygon.comuna1" :color="polygon.color1" :fillColor="polygon.color1" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 1</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_1}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_1}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 1
            </div>
          </l-tooltip>
        </l-polygon>

<!-- Comuna 2 -->
        <l-polygon :lat-lngs="polygon.comuna2" :color="polygon.color2" :fillColor="polygon.color2" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 2</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_2}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_2}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 2
            </div>
          </l-tooltip>
        </l-polygon>

<!-- Comuna 3 -->
        <l-polygon :lat-lngs="polygon.comuna3" :color="polygon.color3" :fillColor="polygon.color3" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 3</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_3}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_3}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 3
            </div>
          </l-tooltip>
        </l-polygon>

<!-- Comuna 4 -->
        <l-polygon :lat-lngs="polygon.comuna4" :color="polygon.color1" :fillColor="polygon.color4" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 4</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_4}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_4}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 4
            </div>
          </l-tooltip>
        </l-polygon>

<!-- Comuna 5 -->
        <l-polygon :lat-lngs="polygon.comuna5" :color="polygon.color5" :fillColor="polygon.color5" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 5</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_5}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_5}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 5
            </div>
          </l-tooltip>
        </l-polygon>

<!-- Comuna 6 -->
        <l-polygon :lat-lngs="polygon.comuna6" :color="polygon.color6" :fillColor="polygon.color6" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 6</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_6}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_6}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 6
            </div>

          </l-tooltip>
        </l-polygon>

<!-- Comuna 7 -->
        <l-polygon :lat-lngs="polygon.comuna7" :color="polygon.color7" :fillColor="polygon.color7" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 7</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_7}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_7}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 7
            </div>
          </l-tooltip>
        </l-polygon>

<!-- Comuna 8 -->
        <l-polygon :lat-lngs="polygon.comuna8" :color="polygon.color8" :fillColor="polygon.color8" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 8</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_8}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_8}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 8
            </div>
          </l-tooltip>
        </l-polygon>

<!-- Comuna 9 -->
        <l-polygon :lat-lngs="polygon.comuna9" :color="polygon.color9" :fillColor="polygon.color9" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 9</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_9}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_9}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 9
            </div>
          </l-tooltip>
        </l-polygon>

<!-- Comuna 10 -->
        <l-polygon :lat-lngs="polygon.comuna10" :color="polygon.color10" :fillColor="polygon.color10" :attribution="'Proyecto CTIAM 2020 - UFPS. All rights reserved'">
          <l-popup>
            <h5><strong>Comuna 10</strong> </h5>
            <hr>
            <h6><strong>Beneficiarias</strong> : {{this.beneficiarias_comuna_10}}</h6>
            <h6><strong>Aliados</strong> : {{this.aliados_comuna_10}}</h6>
          </l-popup>
          <l-tooltip :options="{ permanent: true, interactive: true }">
            <div>
              Comuna 10
            </div>
          </l-tooltip>
        </l-polygon>


      </l-map>
    </div>

    </div>
  </div>
</div>
</template>

<script>
import {
    LMap,
    LTileLayer,
    LCircle,
    LRectangle,
    LPolygon,
    LPolyline,
    LPopup,
    LTooltip,
} from 'vue2-leaflet';
import { latLng } from "leaflet";

export default {
  components: {
    LMap,
    LTileLayer,
    LCircle,
    LRectangle,
    LPolygon,
    LPolyline,
    LPopup,
    LTooltip,
  },
  data () {
    return {
      beneficiarias1 : this.beneficiarias,
      aliados1: this.aliados,
      beneficiarias_comuna_1: '0',
      beneficiarias_comuna_2: '0',
      beneficiarias_comuna_3: '0',
      beneficiarias_comuna_4: '0',
      beneficiarias_comuna_5: '0',
      beneficiarias_comuna_6: '0',
      beneficiarias_comuna_7: '0',
      beneficiarias_comuna_8: '0',
      beneficiarias_comuna_9: '0',
      beneficiarias_comuna_10: '0',
      aliados_comuna_1: '0',
      aliados_comuna_2: '0',
      aliados_comuna_3: '0',
      aliados_comuna_4: '0',
      aliados_comuna_5: '0',
      aliados_comuna_6: '0',
      aliados_comuna_7: '0',
      aliados_comuna_8: '0',
      aliados_comuna_9: '0',
      aliados_comuna_10: '0',
      url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
      zoom: 14,
      center: [7.895213, -72.498463],
      bounds: null,
      polygon: {
        comuna1: [[7.896944,-72.508242],[7.889058,-72.496634],[7.88757,-72.49835],[7.881693,-72.497545],[7.88147,-72.498629],[7.880471,-72.498479],[7.880344,-72.499466],[7.879323,-72.499251],[7.879068,-72.501268],[7.881003,-72.501676],[7.880535,-72.503779],[7.879568,-72.503607],[7.879005,-72.508435],[7.878558,-72.512598],[7.880089,-72.517598],[7.880918,-72.517726],[7.881917,-72.516482],[7.882788,-72.515881],[7.883319,-72.515001],[7.884414,-72.514851],[7.884658,-72.513285],[7.886146,-72.512469],[7.887039,-72.511976],[7.888144,-72.510774],[7.889611,-72.510495],[7.890397,-72.509851],[7.896242,-72.510946]




],
        color1: 'green',
        comuna2: [[7.866953,-72.49835],[7.868483,-72.496247],[7.874902,-72.491698],[7.876433,-72.488995],[7.888335,-72.484145],[7.888931,-72.486291],[7.89688,-72.485433],[7.901003,-72.482171],[7.909164,-72.482729],[7.911332,-72.485647],[7.914138,-72.48569],[7.914435,-72.488351],[7.903787,-72.486033],[7.903362,-72.488029],[7.905254,-72.487772],[7.908059,-72.488372],[7.906593,-72.498178],[7.903851,-72.500238],[7.902044,-72.50114],[7.890695,-72.498865],[7.889058,-72.496634],[7.88757,-72.49835],[7.881693,-72.497545],[7.88147,-72.498629],[7.880471,-72.498479],[7.880344,-72.499466],[7.879323,-72.499251],[7.867038,-72.501612]
],
        color2: 'HotPink',
        comuna3: [[7.874073,-72.487664],[7.880216,-72.481914],[7.876518,-72.464061],[7.883404,-72.464018],[7.887783,-72.462215],[7.89569,-72.461958],[7.896752,-72.468438],[7.888718,-72.469683],[7.885912,-72.472558],[7.889313,-72.475133],[7.889823,-72.476678],[7.890844,-72.477407],[7.891906,-72.483201],[7.888335,-72.484145],[7.876433,-72.488995]
],
        color3: 'Goldenrod',
        comuna4: [[7.903298,-72.462173],[7.908187,-72.462344],[7.912395,-72.461486],[7.916051,-72.463589],[7.921279,-72.472773],[7.922512,-72.479038],[7.926039,-72.48333],[7.926337,-72.485862],[7.919111,-72.486377],[7.917538,-72.485261],[7.915796,-72.484703],[7.914435,-72.488351]
,[7.914138,-72.48569],[7.911332,-72.485647],[7.909164,-72.482729],[7.901003,-72.482171],[7.89688,-72.485433],[7.888931,-72.486291],[7.888335,-72.484145],[7.891906,-72.483201],[7.890844,-72.477407],[7.889823,-72.476678],[7.889313,-72.475133],[7.885912,-72.472558],[7.888718,-72.469683],[7.896752,-72.468438],[7.89569,-72.461958]
],
        color4: 'DarkSeaGreen',
        comuna5: [[7.890695,-72.498865],[7.902044,-72.50114],[7.903851,-72.500238],[7.906593,-72.498178],[7.908059,-72.488372],[7.905254,-72.487772],[7.903362,-72.488029],[7.903787,-72.486033],[7.914435,-72.488351],[7.915796,-72.484703],[7.917538,-72.485261],[7.919111,-72.486377],[7.926337,-72.485862],[7.930418,-72.489638],[7.925062,-72.489681],[7.922767,-72.492771],[7.918388,-72.493973],[7.921661,-72.50144],[7.909164,-72.504444],[7.909547,-72.507148],[7.906487,-72.508907],[7.902321,-72.512469],[7.899090191286848,-72.51088142395021],[7.896944,-72.508242],[7.89909,-72.510881]
],
        color5: 'DarkSlateBlue',
        comuna6: [[7.902321,-72.512469],[7.906487,-72.508907],[7.909547,-72.507148],[7.909164,-72.504444],[7.921661,-72.50144],[7.918388,-72.493973],[7.922767,-72.492771],[7.925062,-72.489681],[7.930418,-72.489638],[7.937388,-72.490067],[7.941766,-72.487836],[7.945676,-72.486506],[7.951202,-72.482643],[7.956047,-72.476721],[7.956982,-72.481012],[7.947037,-72.488565],[7.948652,-72.49114],[7.943551,-72.495775],[7.950352,-72.506161],[7.951372,-72.524185],[7.939981,-72.517576],[7.934795,-72.507963],[7.924594,-72.507362],[7.920259,-72.508564],[7.917071,-72.513821],[7.914882,-72.508264],[7.903596,-72.513113]
],
        color6: 'DarkCyan',
        comuna7: [[7.914882,-72.508264],[7.917793,-72.515602],[7.921704,-72.515001],[7.932883,-72.51689],[7.950692,-72.527103],[7.942361,-72.531395],[7.93284,-72.531481],[7.923829,-72.530622],[7.921874,-72.534828],[7.92893,-72.539034],[7.92249,-72.54148],[7.918707,-72.538154],[7.916709,-72.536008],[7.909653,-72.531159],[7.908102,-72.51792],[7.906912,-72.515152],[7.903596,-72.513113]
],
        color7: 'blue',
        comuna8: [[7.903596,-72.513113],[7.906912,-72.515152],[7.908102,-72.51792],[7.909653,-72.531159],[7.916709,-72.536008],[7.918707,-72.538154],[7.92249,-72.54148],[7.92283,-72.543991],[7.921236,-72.548625],[7.916433,-72.548389],[7.917453,-72.543411],[7.91401,-72.539978],[7.905424,-72.543755],[7.900663,-72.548003],[7.89773,-72.546329],[7.896752,-72.553496],[7.891694,-72.553926],[7.889016,-72.546158],[7.883702,-72.542338],[7.883702,-72.539077],[7.879834,-72.535472],[7.883659,-72.533197],[7.886975,-72.529335],[7.890716,-72.526846],[7.893182,-72.526159],[7.893904,-72.523112],[7.8918,-72.52013],[7.895711,-72.51792],[7.90062,-72.516289]
],
        color8: 'Brown',
        comuna9: [[7.896944,-72.508242],[7.89909,-72.510881],[7.903596,-72.513113],[7.90062,-72.516289],[7.895711,-72.51792],[7.8918,-72.52013],[7.887825,-72.524743],[7.883362,-72.527618],[7.883659,-72.533197],[7.879834,-72.535472],[7.883702,-72.539077],[7.883702,-72.542338],[7.879664,-72.541223],[7.875838,-72.542596],[7.86674,-72.536674],[7.866188,-72.529421],[7.863509,-72.526803],[7.862872,-72.523713],[7.867102,-72.521782],[7.868972,-72.522887],[7.869185,-72.524164],[7.870609,-72.52396],[7.871799,-72.521996],[7.875327,-72.522597],[7.874222,-72.526739],[7.878707,-72.526803],[7.882023,-72.52455],[7.880918,-72.517726],[7.881917,-72.516482],[7.882788,-72.515881],[7.883319,-72.515001],[7.884414,-72.514851],[7.884658,-72.513285],[7.886146,-72.512469],[7.887039,-72.511976],[7.888144,-72.510774],[7.889611,-72.510495],[7.890397,-72.509851],[7.896242,-72.510946]
],
        color9: 'Crimson',
        comuna10: [[7.879323,-72.499251],[7.879068,-72.501268],[7.881003,-72.501676],[7.880535,-72.503779],[7.879568,-72.503607],[7.879005,-72.508435],[7.878452,-72.512362],[7.880089,-72.517598],[7.880918,-72.517726],[7.882023,-72.52455],[7.878707,-72.526803],[7.874222,-72.526739],[7.875327,-72.522597],[7.871799,-72.521996],[7.870609,-72.52396],[7.869185,-72.524164],[7.868972,-72.522887],[7.867102,-72.521782],[7.865507,-72.518735],[7.870779,-72.515345],[7.868271,-72.509379],[7.867123,-72.50453],[7.855049,-72.51719],[7.851563,-72.513199],[7.867038,-72.501612]],
        color10: 'BlueViolet',
      },
    };
  },
  props:['beneficiarias', 'aliados'],

  methods: {
    zoomUpdated (zoom) {
      this.zoom = zoom;
    },
    centerUpdated (center) {
      this.center = center;
    },
    boundsUpdated (bounds) {
      this.bounds = bounds;
    }
  },

  mounted(){
    var self = this;
    this.beneficiarias1.forEach(function(element) {
        if (true) {

        }
    });

    this.beneficiarias1.forEach(function(element) {
      switch (element.commune) {
          case '1':
            self.beneficiarias_comuna_1 = element.total;
            break;
          case '2':
            self.beneficiarias_comuna_2 = element.total;
            break;
          case '3':
            self.beneficiarias_comuna_3 = element.total;
            break;
          case '4':
            self.beneficiarias_comuna_4 = element.total;
            break;
          case '5':
            self.beneficiarias_comuna_5 = element.total;
            break;
          case '6':
            self.beneficiarias_comuna_6 = element.total;
            break;
          case '7':
            self.beneficiarias_comuna_7 = element.total;
            break;
          case '8':
            self.beneficiarias_comuna_8 = element.total;
            break;
          case '9':
            self.beneficiarias_comuna_9 = element.total;
            break;
          case '10':
            self.beneficiarias_comuna_10 = element.total;
            break;

          default:
        }
    });

    this.aliados1.forEach(function(element) {
      switch (element.commune) {
          case '1':
            self.aliados_comuna_1 = element.total;
            break;
          case '2':
            self.aliados_comuna_2 = element.total;
            break;
          case '3':
            self.aliados_comuna_3 = element.total;
            break;
          case '4':
            self.aliados_comuna_4 = element.total;
            break;
          case '5':
            self.aliados_comuna_5 = element.total;
            break;
          case '6':
            self.aliados_comuna_6 = element.total;
            break;
          case '7':
            self.aliados_comuna_7 = element.total;
            break;
          case '8':
            self.aliados_comuna_8 = element.total;
            break;
          case '9':
            self.aliados_comuna_9 = element.total;
            break;
          case '10':
            self.aliados_comuna_10 = element.total;
            break;

          default:
        }
    });




  }
}
</script>
