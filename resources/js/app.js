import { createApp } from 'vue'
import Game from './components/Game.vue'
import Game from './components/GameHeader'

const app = createApp(Game)

app
    .component('AppMain', Game)
    .component('GameHeader', GameHeader)
    .component('GameFooter', GameFooter)
	.mount('#app')

// require('./bootstrap');
