import { createApp } from 'vue'
import App from './App.vue'
require('@geoapify/geocoder-autocomplete/styles/minimal.css')
import router from './router'
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import Geolocation library */
import VueGeolocation from 'vue-browser-geolocation';

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUserSecret, faMaximize, faShower, faToilet, faBed, faBoxesPacking, faBolt, faLocationDot } from '@fortawesome/free-solid-svg-icons'
import { faWhatsapp, faFacebook } from '@fortawesome/free-brands-svg-icons'
/* add icons to the library */
library.add(faUserSecret, faMaximize, faShower, faToilet, faBed, faBoxesPacking, faBolt, faLocationDot, faWhatsapp, faFacebook )



createApp(App).component('font-awesome-icon', FontAwesomeIcon).use(router,VueGeolocation).mount('#app')
