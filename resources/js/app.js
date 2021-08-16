import { createApp } from 'vue'
import App from './components/App.vue'

const app = createApp(App)

app.component('AppMain', App)
	.mount('#app')

// require('./bootstrap');