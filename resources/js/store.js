import { createStore } from "vuex";
// import axios from 'axios'

export default createStore({
    state: {
        user: {},
        location: {},
        closest_locations: {},
        csrf: ''
    },

    mutations: {
        SET_USER(state, user) {
            state.user = user;
        },

        SET_LOCATION(state, location) {
            state.location = location;
        },

        SET_CLOSEST_LOCATIONS(state, closest_locations) {
            let closest_locations_by_type = {};
            for (let closest_location of closest_locations) {
                if (typeof closest_locations_by_type[closest_location.type] == 'undefined') {
                    closest_locations_by_type[closest_location.type] = [];
                }
                closest_locations_by_type[closest_location.type].push(closest_location);
            }
            state.closest_locations = closest_locations_by_type;
        },

        SET_CSRF(state, csrf) {
            state.csrf = csrf;
        }
    },

    getters: {
        user(state) {
            return state.user;
        },

        csrf(state) {
            return state.csrf;
        },

        location(state) {
            return state.location;
        },

        closest_locations(state) {
            return state.closest_locations;
        }
    },

    actions: {
        async init({ commit }) {
            try {
                let InitData = await fetch('/init', {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                InitData = await InitData.json();
                // console.log(InitData);return;
                InitData.location.locations_coords = JSON.parse(InitData.location.locations_coords);

                commit('SET_USER', InitData.user);
                commit('SET_LOCATION', InitData.location);
                commit('SET_CLOSEST_LOCATIONS', InitData.closestLocations);
            } catch (e) {
                console.log(e);
            }
        }
    }
});
