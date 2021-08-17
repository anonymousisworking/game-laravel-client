<template>
    <div id="location-wrapper">
        <div class="location">
            <div class="name">{{ location.name }}</div>
            <div class="svg-wrapper">
                <svg ref="svg">
                <template v-for="(coords, index) in location.locations_coords" :key="index">
                    <polygon :class="'loc-' + index" :points="coords" />
                 </template>
                </svg>
            </div>
            <img src="" ref="image" class="map">
        </div>

        <div class="location-select">
            <div class="location-block locations">
                <div class="title">Локации</div>
                <div class="list">
                    <div 
                        v-for="location in closest_locations.location"
                        class="link"
                        :class="'loc-' + location.id"
                    >{{ location.name }}</div>
                </div>
            </div>

            <div class="location-block objects">
                <div class="title">Объекты</div>
                <div class="list"></div>
            </div>

            <div class="location-block characters">
                <div class="title">Персонажи</div>
                <div class="list"></div>
            </div>

            <div class="location-pass">
                <div class="title"></div>
                <div class="progressbar">
                    <div class="progress"></div>
                </div>
            </div>
        </div>

        <span class="loader"></span>
    </div>
</template>

<script>

import { mapGetters } from 'vuex'

export default {
    name: "location-wrapper",

    methods: {

    },

    computed: {
        ...mapGetters([
            'location',
            'closest_locations',
        ])
    },

    watch: {
        location(location, oldLocation) {
            this.$refs.image.src = 'img/locations/' + location.image;
        }
    },


    mounted() {

    }
}
</script>

<style scoped>

</style>
