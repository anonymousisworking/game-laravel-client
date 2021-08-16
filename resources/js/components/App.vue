<template>
	<div class="q">
		Hello Laravel from Vue component {{ title }}
	</div>
</template>

<script>
export default {
	data() {
		return {
			title: '{{221231}}'
		}
	},

	methods: {
		async init() {
			const testData = await fetch('/test', {
				headers: {
					'content-type': 'application/json'
				}
			});

			// console.log(testData)
			console.log(await testData.json())
		}
	},

	created() {
		this.init();
	}
}
</script>

<style lang="scss">
	// .q {
	// 	color: green;
	// }

	// html, body {
	// 	font-size: 20px;
	// 	color: blue;
	// }
</style>