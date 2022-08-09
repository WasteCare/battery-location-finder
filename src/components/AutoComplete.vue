<template>
  <div class="lg:flex py-5 px-4 bg-wc-blue relative">
  <GMapAutocomplete
       placeholder="Street address or postcode"
       @place_changed="setPlace"
       class="font-sans border-none block w-full transition duration-500 ease-in-out outline-none font-light rounded-tl-3xl rounded-br-3xl bg-white px-4 py-2 leading-8"
    >
  </GMapAutocomplete>
  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 46.24 53.31"  class="w-5 h-5 absolute right-7 top-8  text-wc-blue fill-current">
    <path class="cls-1" d="M53.53,49.14l-7.2-10A20.85,20.85,0,0,0,17.21,10,20.84,20.84,0,0,0,26,47.55a20.9,20.9,0,0,0,3.43.29,20.49,20.49,0,0,0,6.42-1l7.12,9.92a6.48,6.48,0,0,0,4,2.58l.43.08a8.08,8.08,0,0,0,.85.05,6.46,6.46,0,0,0,6.37-5.23,1.42,1.42,0,0,0,0-.22,1.23,1.23,0,0,0,0-.19A6.47,6.47,0,0,0,53.53,49.14Zm-18-5.06c-.44.16-.89.3-1.34.43a18.19,18.19,0,1,1,10.49-7.74c-.25.4-.52.79-.8,1.17s-.57.72-.89,1.07a17.59,17.59,0,0,1-3,2.74,17.87,17.87,0,0,1-3.16,1.81A12.71,12.71,0,0,1,35.51,44.08Zm9.6,11.09-6.72-9.39a20.74,20.74,0,0,0,6.18-4.54l6.78,9.46a3.87,3.87,0,0,1-.88,5.36A3.85,3.85,0,0,1,45.11,55.17Z" transform="translate(-8.51 -6.14)"/>
  </svg>
  </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
  name: 'AutoComplete',
  components: {
  },
  data () {
    return {
    }
  },
  methods: {
    setPlace (e) {
      this.updateLocation({
        address: '',
        position: e.geometry.location
      })
    },
    setLocation () {
      navigator.geolocation.getCurrentPosition(
        position => {
          this.updateLocation({
            address: '',
            position: {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            }
          })
        },
        error => {
          console.log(error.message)
        }
      )
    },
    ...mapActions([
      'updateLocation'
    ])
  },
  mounted () {
    this.setLocation()
  }
}
</script>
