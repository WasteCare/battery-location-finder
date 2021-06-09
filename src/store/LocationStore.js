import 'es6-promise/auto'
import { createStore } from 'vuex'
import Api from '../services/Api'

export default createStore({
  state () {
    return {
      isApiError: false,
      loading: true,
      locations: [],
      currentLocation: {
        address: '',
        position: {
          lat: 54.825564,
          lng: -3.021976
        }
      },
      hoveredLocation: 0,
      selectedLocation: 0
    }
  },
  getters: {
    locationMarkers: state => {
      const sites = []
      state.locations.map((site) => {
        const pos = {
          position: {
            lng: site.supMapLong,
            lat: site.supMapLat
          }
        }

        const address = {
          address: `${site.supAddress1}, ${site.supAddress2}, ${site.supTown}, ${site.supPostcode}`.replace(', , ', ', ')
        }

        sites.push({ ...site, ...pos, ...address })
      })
      return sites
    },
    getLocation: state => state.currentLocation.position,
    currentLocationPosition: state => state.currentLocation.position,
    getHoveredLocation: state => state.hoveredLocation,
    getSelectedLocation: state => state.selectedLocation,
    isLoading: state => state.loading,
    isApiError: state => state.isApiError
  },
  mutations: {
    addLocations (state, locations) {
      state.locations = locations.locations
    },
    setLocation (state, { update }) {
      state.currentLocation.address = update.address
      state.currentLocation.position = update.position
    },
    setLoading (state, loading) {
      state.loading = loading
    },
    setHoveredLocation (state, location) {
      state.hoveredLocation = location
    },
    setSelectedLocation (state, location) {
      state.selectedLocation = location
    },
    setApiError (state, isError) {
      state.isApiError = isError
    }
  },
  actions: {
    addLocations ({ commit }, locations) {
      return new Promise((resolve, reject) => {
        commit({
          type: 'addLocations',
          locations: locations
        })
        resolve()
      })
    },
    updateLocation: async function ({ dispatch, commit }, payload) {
      commit('setLoading', true)

      commit({
        type: 'setLocation',
        update: payload
      })

      const sites = await Api.getLocations(payload.position.lat, payload.position.lng, 0, 0)

      if (sites.length === 0) {
        commit('setApiError', true)
      } else {
        commit('setApiError', false)
      }

      dispatch('addLocations', sites)

      commit('setLoading', false)
    }
  }
})
