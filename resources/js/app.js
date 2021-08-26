import { createApp } from 'vue'
import store from './store'
import Game from './components/Game.vue'

const game = createApp({});

game
    .use(store)
    .component('Game', Game)
	.mount('#game');
