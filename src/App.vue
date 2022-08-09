<template>
  <div class="flex flex-wrap rounded-2xl shadow-2xl mx-auto font-sans" style="max-width:1220px">
    <div class="w-full lg:w-1/3 lg:rounded-l-2xl overflow-hidden bg-white">
      <auto-complete />
      <location-list />
    </div>
    <div class="w-full lg:w-2/3 lg:rounded-r-2xl overflow-hidden">
      <Map/>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex'

import Map from './components/Map'
import LocationList from './components/LocationList'
import AutoComplete from './components/AutoComplete'

export default {
  components: {
    Map,
    AutoComplete,
    LocationList
  },
  data () {
    return {
      json: '',
      jq: ''
    }
  },
  computed: {
    ...mapGetters([
      'isLoading'
    ])
  },
  methods: {
    ...mapMutations({
      setLoading: 'setLoading'
    }),
    toggleLoad () {
      this.setLoading(!this.isLoading)
    }
  }
}
</script>
