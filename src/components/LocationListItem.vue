<template>
    <li @mouseover="mouseOver"
        @mouseleave="mouseLeave"
        @click="onClick"
        class="group border-0 bg-wc-blue-button cursor-pointer border-solid transition-all duration-200 hover:bg-wc-green odd:bg-wc-blue-light "
        >

        <div class="lg:flex py-5 px-4">
            <div class="flex-1 min-w-0">
                <h4 class="m-0 font-sans text-base font-bold leading-7 text-white sm:text-s">
                  {{ supCompanyName }}
                </h4>
                <div class="mt-1 flex flex-col sm:flex-wrap sm:mt-0 sm:space-x-6">
                  <div class="mt-2 flex items-center text-sm text-white leading-6">
                      <!-- Heroicon name: solid/location-marker -->
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-7 mr-3">
                      <circle class="fill-current text-wc-green group-hover:text-wc-blue" cx="32" cy="32" r="32"/>
                      <path class="fill-current text-white" d="M47.67,51.17h0l-.08.24A1.11,1.11,0,0,0,47.67,51.17Z"/>
                      <path class="fill-current text-white" d="M56.76,36.17c-.13.86-.3,1.72-.51,2.57a28.23,28.23,0,0,1-.86,2.7A27.42,27.42,0,0,0,56.76,36.17Z"/>
                      <path class="fill-current text-white" d="M34.07,5.39h0c-.77,0-1.54-.08-2.31-.06H30.7l-1.06.07c-.71.08-1.41.16-2.11.29a26.82,26.82,0,0,0-5.62,1.64h.73a3.72,3.72,0,0,1,3,1.92l.07.12A20.35,20.35,0,0,1,28.05,9c.62-.1,1.24-.14,1.86-.2h1.86a13.81,13.81,0,0,1,1.7.07S39.9,9.4,43,12.24l1.85-3S41.07,6.11,34.07,5.39Z"/>
                      <path class="fill-current text-white" d="M40.72,56.18c-.74.28-1.5.54-2.27.76a8.63,8.63,0,0,0,3.85-1.43A16.61,16.61,0,0,1,40.72,56.18Z"/>
                      <path class="fill-current text-white" d="M40.72,56.18c-.74.28-1.5.54-2.27.76a8.63,8.63,0,0,0,3.85-1.43A16.61,16.61,0,0,1,40.72,56.18ZM9.62,16.73h0"/>
                      <path class="fill-current text-white" d="M46.47,48.83l-21.7-39-.06-.09a2.79,2.79,0,0,0-2.15-1.35c-.56,0-1.11-.07-1.62-.07H19.82A11.78,11.78,0,0,0,8.93,16.5a2.84,2.84,0,0,0,.13,2.14l.13.24,1.47,2.39L32.29,56.66l.26.41a2.78,2.78,0,0,0,2.1,1.33,17.64,17.64,0,0,0,1.92.1h0c5.53,0,8.09-2.67,9.27-5a9.94,9.94,0,0,0,.58-1.39,10.21,10.21,0,0,0,.35-1.45A2.77,2.77,0,0,0,46.47,48.83ZM42.31,55.5h0a8.63,8.63,0,0,1-3.85,1.43,14.56,14.56,0,0,1-1.87.12A12.2,12.2,0,0,1,34.81,57a1.36,1.36,0,0,1-.81-.38,1.44,1.44,0,0,1-.22-.27l-13.43-22L12.77,22l-1.29-2.11-1.05-1.72A1.34,1.34,0,0,1,10.3,17c.06-.16.12-.34.2-.54h0a10.22,10.22,0,0,1,5.77-5.85A12.75,12.75,0,0,1,21,9.74a10.27,10.27,0,0,1,1.47.07,1.28,1.28,0,0,1,.84.4,1.33,1.33,0,0,1,.23.3l2.09,3.77,7,12.54L45.21,49.53a1.44,1.44,0,0,1,.16.89,8.46,8.46,0,0,1-1.17,3.1h0A6.86,6.86,0,0,1,42.31,55.5Z"/>
                      <path class="fill-current text-white" d="M14.53,18.87a2.54,2.54,0,0,1-2.32-1A2.74,2.74,0,0,1,12.7,15a9.87,9.87,0,0,1,3.22-2.84A9.88,9.88,0,0,1,20,10.79a2.72,2.72,0,0,1,2.71,1h0c.86,1.5-.77,4-3.71,5.69A9.46,9.46,0,0,1,14.53,18.87Zm5.86-7.56H20a9.38,9.38,0,0,0-3.84,1.3,9.46,9.46,0,0,0-3.05,2.68,2.26,2.26,0,0,0-.46,2.28c.68,1.19,3.45.94,6-.56s4.2-3.77,3.51-5h0A2,2,0,0,0,20.39,11.31Z"/>
                      <path class="fill-current text-white" d="M15.42,17.06a1,1,0,0,1-1-.69c-.18-.67.35-1.85,2.41-2.93,1.56-.93,2.64-1.18,3.3-.77a1.31,1.31,0,0,1,.54,1.17.26.26,0,0,1-.28.24h0a.27.27,0,0,1-.24-.28.78.78,0,0,0-.3-.68c-.26-.16-1-.28-2.75.78s-2.25,2-2.15,2.34.34.29.5.29a.27.27,0,0,1,.28.24v0a.26.26,0,0,1-.25.27h-.05Z"/>
                      <path class="fill-current text-white" d="M12,22.31v-.53c.11,0,10.94-.79,13.8-8.45l.5.19C23.24,21.5,12.07,22.31,12,22.31Z"/>
                      <path class="fill-current text-white" d="M19,34.79v-.54c.11,0,10.94-.79,13.8-8.45l.5.19C30.26,34,19.08,34.78,19,34.79Z"/>
                      <path class="fill-current text-white" d="M25.43,29.41a.6.6,0,0,1-.52-.3l-3.78-6.39A.6.6,0,0,1,21.5,22a.59.59,0,0,1,.63.15L26,28.5a.61.61,0,0,1-.22.82A.54.54,0,0,1,25.43,29.41Z"/>
                      <path class="fill-current text-white" d="M20.56,27.77a.6.6,0,0,1-.18-1.17C24.45,25.28,26,23.29,26,23.27A.62.62,0,0,1,27,24l0,0c-.07.1-1.78,2.3-6.24,3.75A.68.68,0,0,1,20.56,27.77Z"/>
                      <path class="fill-current text-white" d="M34.68,52.4a.59.59,0,0,1-.57-.41.61.61,0,0,1,.38-.76c4.07-1.32,5.64-3.31,5.66-3.33a.62.62,0,0,1,.87-.14.63.63,0,0,1,.13.87h0c-.07.09-1.77,2.29-6.24,3.74A.45.45,0,0,1,34.68,52.4Z"/>
                      <polygon class="fill-current text-white" points="42.9 12.16 40.53 14.36 50.01 16.71 47.67 6.62 45.42 9.62 42.9 12.16"/>
                      <polygon class="fill-current text-white" points="44.74 9.19 46.02 10.22 42.9 12.16 44.74 9.19"/>
                      <path class="fill-current text-white" d="M56.76,36.17a27.42,27.42,0,0,1-1.37,5.27c-.14.37-.28.74-.44,1.1a25.64,25.64,0,0,1-7.62,9.87c.11-.33.21-.66.29-1h0l.08-.24L48,50s11.62-10.16,6.78-28A23.71,23.71,0,0,1,56.76,36.17Z"/>
                      <path class="fill-current text-white" d="M47.62,51.39Z"/>
                      <path class="fill-current text-wc-green group-hover:text-wc-blue" d="M31.94,57.88a3.46,3.46,0,0,1-.22-.31l-.16-.27C31.67,57.48,31.8,57.67,31.94,57.88Z"/>
                      <path class="fill-current text-white" d="M31.94,57.88h-.28q-1.5,0-3-.15a25.36,25.36,0,0,1-7.88-2.16,26.19,26.19,0,0,1-15-27.07,5.36,5.36,0,0,1,.14-1l.19-1c.16-.68.31-1.37.51-2a24.76,24.76,0,0,1,1.5-3.92c.13-.29.27-.58.43-.86l1.62,2.65A23.23,23.23,0,0,0,9,25.15c-.2.6-.35,1.21-.51,1.82l-.2.93c-.07.31-.1.62-.16.93a24.77,24.77,0,0,0,0,7.59,23.8,23.8,0,0,0,2.48,7.33h0c.13.24.26.49.4.72h0a23.81,23.81,0,0,0,3.41,4.21l.11.11a23.29,23.29,0,0,0,16.17,7,11.46,11.46,0,0,0,.75,1.38l.11.18.16.27A3.46,3.46,0,0,0,31.94,57.88Z"/>
                      <path class="fill-current text-white" d="M14.47,48.69a23.81,23.81,0,0,1-3.41-4.21h0c-.14-.23-.27-.48-.4-.72A29,29,0,0,0,14.47,48.69Z"/>
                    </svg>

                      <div>{{ address }}<br/>
                      <span class="text-xs">{{ distance.toFixed(1) }}km | <wcAnchor :href="formatPhone">{{ supPhone }}</wcAnchor></span></div>
                  </div>
                </div>
            </div>
        </div>
    </li>
</template>

<script>
import { mapMutations } from 'vuex'
import wcAnchor from './base-elements/Anchor'
export default {
  name: 'LocationListItem',
  components: {
    wcAnchor
  },
  props: {
    supKey: Number,
    supCompanyName: String,
    supAddress1: String,
    supAddress2: String,
    supTown: String,
    supPostcode: String,
    supMapLat: Number,
    supMapLong: Number,
    supPhone: String,
    supWebsite: String,
    address: String,
    distance: {
      type: Number,
      default: 1.5
    }
  },
  computed: {
    formatPhone: function () {
      return 'tel:' + this.supPhone.replace(' ', '').trim()
    }
  },
  methods: {
    mouseOver () {
      this.hoveredLocation(this.supKey)
    },
    mouseLeave () {
      this.hoveredLocation(0)
    },
    onClick () {
      this.selectLocation(this.supKey)
    },
    ...mapMutations({
      hoveredLocation: 'setHoveredLocation',
      selectLocation: 'setSelectedLocation'
    })
  }
}
</script>
