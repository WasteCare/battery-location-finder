<template>

  <GMapMap
      :center="center"
      :zoom="7"
      ref="myMap"
      map-type-id="terrain"
      :options="mapOptions"
      style="width: 100%; height: 700px"
  >
      <Marker
          :key="index"
          v-for="(m, index) in markers"
          :position="m.position"
          :supplierId="m.supKey"
       >
        <div class="lg:flex py-5 px-4">
            <div class="flex-1 min-w-0">
                <h4 class="text-m font-bold leading-7 text-wc-blue sm:text-s">
                  {{ m.supCompanyName }}
                </h4>
                <div class="mt-1 flex flex-col sm:flex-wrap sm:mt-0 sm:space-x-6">
                  <div class="mt-2 flex items-center text-sm text-wc-blue leading-6">
                      {{ m.address }}
                  </div>
                </div>
            </div>
        </div>
       </Marker>

  </GMapMap>
</template>
<script>
import Marker from './Marker'
import { mapGetters } from 'vuex'
import { WASTECARE_LIGHT } from '../services/MapStyles'

export default {
  components: { Marker },
  name: 'Map',
  data () {
    return {
      zoom: 6,
      mapOptions: {
        styles: WASTECARE_LIGHT
      },
      icon: {
        path: 'M0-48c-9.8 0-17.7 7.8-17.7 17.4 0 15.5 17.7 30.6 17.7 30.6s17.7-15.4 17.7-30.6c0-9.6-7.9-17.4-17.7-17.4z',
        fillColor: '#3fa649',
        fillOpacity: 1,
        strokeColor: '#ffffff',
        strokeWeight: 1
      }
    }
  },
  computed: {
    ...mapGetters({
      markers: 'locationMarkers',
      center: 'currentLocationPosition'
    })
  },
  watch: {
    markers: function () {
      const bounds = new google.maps.LatLngBounds()
      this.markers.map(marker => {
        bounds.extend(marker.position)
      })

      const map = this.$refs.myMap.$mapObject
      map.fitBounds(bounds)
    }
  }
}
</script>
