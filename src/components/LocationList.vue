<template>
    <div class="relative">
      <loader v-if="isLoading" />
      <error-panel v-if="isError">
        Something went wrong, we couldn&rsquo;t find any sites close to you or we have a problem internally. Please try again later
      </error-panel>
      <div class="overflow-y-auto h-96 md:h-scroller-height ">
          <ul class="list-none m-0 p-0">
              <LocationListItem
                  v-for="(location, index) in locations"
                  :key="index"
                  v-bind="location"
              />
          </ul>
      </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Loader from './Loader.vue'
import LocationListItem from './LocationListItem'
import ErrorPanel from './ErrorPanel'

export default {
  name: 'LocationList',
  components: {
    LocationListItem,
    Loader,
    ErrorPanel
  },
  computed: {
    ...mapGetters({
      locations: 'locationMarkers',
      isLoading: 'isLoading',
      isError: 'isApiError'
    })
  },
  methods: {
    onHover (ev) {
      console.warn(ev)
    }
  }
}
</script>
