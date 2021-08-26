<template>
	<game-header></game-header>
	<location-wrapper @chloc="changeLocation"></location-wrapper>
	<game-footer @sendMessage="sendMessage"></game-footer>
</template>

<script>
import { mapMutations } from 'vuex'
import GameHeader from './GameHeader'
import GameFooter from './GameFooter'
import LocationWrapper from './LocationWrapper'
import Api from '../api/api.js';

const api = new Api();

export default { 
	data() {
		return {
			
		}
	},

	methods: {
		...mapMutations(['SET_CSRF', 'SET_USER', 'SET_LOCATION', 'SET_CLOSEST_LOCATIONS', 'SET_LOCATION_USERS']),

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
			this.SET_LOCATION(loc.loc);
			this.SET_LOCATION_USERS(loc.locUsers);
			this.SET_CLOSEST_LOCATIONS(loc.closestLocs);
		}, this);

		api.subscribe('addLocUser', addLocUser => {
			this.ADD_LOCATION_USER(loc_add_user);
		}, this);

		api.subscribe('leaveLocUser', userId => {
			this.REMOVE_LOCATION_USER(userId);
		}, this);

		api.subscribe('message', message => {
			switch (typeof message) {
				case 'string': this.append(message); break;
				case 'object': this.append(`${message.from}: ${message.text}`); break;
			}
			
			this.scrollDown();
		}, this);
	},

	components: { GameHeader, GameFooter, LocationWrapper },
};
</script>

<style lang="scss">
	
</style>