<template>
    <GMapMarker
         ref="marker"
          :position="position"
          :clickable="true"
          :draggable="false"
          :icon="icon"
          :animation="2"
          @click="openPopup"
      >
        <GMapInfoWindow :opened="popupOpened">
          <slot></slot>
        </GMapInfoWindow>
      </GMapMarker>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex'

export default {
  name: 'Marker',
  props: {
    position: {},
    supplierId: {
      type: Number,
      required: true
    }
  },
  data () {
    return {
      opened: false,
      prom: {},
      icon: {
        url: require('../assets/battery-icon-green.png'),
        anchor: new google.maps.Point(32, 32),
        scaledSize: new google.maps.Size(64, 64)
      },
      greenIcon: require('../assets/battery-icon-green.png'),
      blueIcon: require('../assets/battery-icon-blue.png')
    }
  },
  methods: {
    openPopup () {
      this.selectSupplier(this.supplierId)
      this.setMapLocation({
        update: {
          address: '',
          position: this.position
        }
      })
    },
    colourMarker (supplierId) {
      if (supplierId === this.supplierId && this.icon.url !== this.blueIcon) {
        this.icon.url = this.blueIcon
        this.$refs.marker.$markerObject.setIcon(this.icon)
      } else if (supplierId !== this.supplierId && this.icon.url !== this.greenIcon && this.selectedSupplier !== supplierId) {
        this.icon.url = this.greenIcon
        this.$refs.marker.$markerObject.setIcon(this.icon)
      }
    },
    ...mapMutations({
      selectSupplier: 'setSelectedLocation',
      setMapLocation: 'setLocation'
    })
  },
  computed: {
    popupOpened () {
      return this.selectedSupplier === this.supplierId
    },
    ...mapGetters({
      hoveredSupplier: 'getHoveredLocation',
      selectedSupplier: 'getSelectedLocation'
    })
  },
  watch: {
    hoveredSupplier (supplierId) {
      this.colourMarker(supplierId)
    },
    selectedSupplier (supplierId) {
      this.colourMarker(supplierId)
    }
  }
}
</script>
