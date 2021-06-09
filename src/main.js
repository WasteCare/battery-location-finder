import { createApp } from 'vue'
import VueGoogleMaps from '@fawmi/vue-google-maps'
import App from './App.vue'
import LocationStore from './store/LocationStore'
import 'tailwindcss/tailwind.css'

document.addEventListener('DOMContentLoaded', (function ($) {
  const app = createApp(App)
  app.config.globalProperties.$jq = jQuery

  app.use(VueGoogleMaps, {
    load: {
      key: wc_ajax_obj.googleKey,
      libraries: ['places']
    }
  })

  app.use(LocationStore)
  app.mount('#wc-app')
})(jQuery))
