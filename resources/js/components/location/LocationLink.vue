<template>
    <div
        v-for="location in closestLocations[type]"
        :class="['link', 'loc-' + location.id, {active: activeLocation == location.id}]"
        @mouseenter="SET_ACTIVE_LOCATION(location.id)"
        @mouseleave="SET_ACTIVE_LOCATION(false)"
        @click="changeLocation(location.id)"
    >
        {{ location.name }}
    </div>
</template>

<script>
import {mapGetters, mapMutations, mapActions} from 'vuex'
export default {
    name: "LocationLink",

    props: ['closestLocations', 'type'],

    methods: {
        ...mapMutations(['SET_ACTIVE_LOCATION']),
        ...mapActions(['changeLocation']),
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
