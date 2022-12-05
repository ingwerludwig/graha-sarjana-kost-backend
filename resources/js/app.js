import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUserSecret, faMaximize, faShower, faToilet, faBed, faBoxesPacking, faBolt, faLocationDot } from '@fortawesome/free-solid-svg-icons'
import { faWhatsapp, faFacebook } from '@fortawesome/free-brands-svg-icons'
/* add icons to the library */
library.add(faUserSecret, faMaximize, faShower, faToilet, faBed, faBoxesPacking, faBolt, faLocationDot, faWhatsapp, faFacebook )



createApp(App).component('font-awesome-icon', FontAwesomeIcon).use(router).mount('#app')
