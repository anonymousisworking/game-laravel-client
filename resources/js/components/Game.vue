<template>
    <game-header></game-header>
    <location-wrapper @chloc="changeLocation"></location-wrapper>
    <game-footer @sendMessage="sendMessage"></game-footer>
</template>

<script>
import { mapActions, mapMutations } from 'vuex'
import GameHeader from './GameHeader'
import GameFooter from './GameFooter'
import LocationWrapper from './LocationWrapper'
import Api from '../api.js';

const api = new Api;

export default { 
	data() {
        return {
        	
        }
    },

	methods: {
		// ...mapActions(['init']),
		...mapMutations(['SET_CSRF', 'SET_USER', 'SET_LOCATION', 'SET_CLOSEST_LOCATIONS']),

		changeLocation(locId) {
			api.chloc(locId);
		},

		sendMessage(message) {
			api.sendMessage(message);
		},

		scrollDown() {
			messages.scrollTop = messages.scrollHeight;
		},

		append(message) {
			messages.innerHTML += `<div class="msg">${date('H:i:s')} ${message}</div>`;
			// messages.append(`<div class="msg">${date('H:i:s')} ${message}</div>`);
		}
	},

	mounted() {
		api.init();
		// cl(this.$server);
		// this.$store.dispatch('init');
		// this.SET_CSRF(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
	},

	created() {
		api.subscribe('me', me => {
			this.SET_USER(me);
		}, this);

		api.subscribe('loc', loc => {
			this.SET_LOCATION(loc);
			this.SET_CLOSEST_LOCATIONS(loc.closest_locs);
		}, this);

		api.subscribe('message', message => {
			switch (typeof message) {
		    	case 'string': this.append(message);break;
		    	case 'object': this.append(`${message.from}: ${message.text}`);break;
		    }
			
			this.scrollDown();
		}, this);
	},

	components: { GameHeader, GameFooter, LocationWrapper },
};
</script>

<style lang="scss">
	
</style>