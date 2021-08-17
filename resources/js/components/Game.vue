<template>
    <game-header></game-header>
    <location-wrapper></location-wrapper>
    <game-footer></game-footer>
</template>

<script>
import { mapActions, mapMutations } from 'vuex'

export default {
	data: () => ({
		
	}),

	methods: {
		...mapActions(['init']),
		...mapMutations(['SET_CSRF']),
	},

	created() {
		this.init();
		this.SET_CSRF(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
	}
}
</script>

<style lang="scss">
	
</style>