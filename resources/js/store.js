import { createStore } from "vuex";
// import axios from 'axios'

export default createStore({
    state: {
        user: {},
        location: {},
        closestLocations: {},
        activeLocation: false,
        csrf: ''
    },

    mutations: {
        SET_USER(state, user) {
            state.user = user;
        },

        SET_LOCATION(state, location) {
            state.location = location;
        },

        SET_CLOSEST_LOCATIONS(state, closestLocations) {
            let closestLocationByType = {};
            for (let closest_location of closestLocations) {
                if (typeof closestLocationByType[closest_location.type] == 'undefined') {
                    closestLocationByType[closest_location.type] = [];
                }
                closestLocationByType[closest_location.type].push(closest_location);
            }
            state.closestLocations = closestLocationByType;
        },

        SET_ACTIVE_LOCATION(state, activeLocation) {
            state.activeLocation = activeLocation;
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

        closestLocations(state) {
            return state.closestLocations;
        },

        activeLocation(state) {
            return state.activeLocation;
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
