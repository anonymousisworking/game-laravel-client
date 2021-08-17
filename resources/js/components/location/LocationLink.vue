<template>
    <div
        v-for="location in closestLocations[type]"
        :class="['link', 'loc-' + location.id, {active: activeLocation == location.id}]"
        @mouseenter="SET_ACTIVE_LOCATION(location.id)"
        @mouseleave="SET_ACTIVE_LOCATION(false)"
    >
        {{ location.name }}
    </div>
</template>

<script>
import {mapGetters, mapMutations} from 'vuex'
export default {
    name: "LocationLink",

    props: ['closestLocations', 'type'],

    methods: {
        ...mapMutations(['SET_ACTIVE_LOCATION'])
    },

    computed: {
        ...mapGetters([
            'activeLocation',
        ])
    },

}
</script>

<style scoped>

</style>
