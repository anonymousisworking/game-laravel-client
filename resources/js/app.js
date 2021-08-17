import { createApp } from 'vue'
import store from './store'
import Game from './components/Game.vue'
import GameHeader from './components/GameHeader'
import GameFooter from './components/GameFooter'
import LocationWrapper from './components/LocationWrapper'

const game = createApp({})

game
    .use(store)
    .component('Game', Game)
    .component('GameHeader', GameHeader)
    .component('GameFooter', GameFooter)
    .component('LocationWrapper', LocationWrapper)
	.mount('#game')

// require('./bootstrap');
