import { createStore } from "vuex";
// import axios from 'axios'

export default createStore({
    state: {
        user: {},
        location: {},
        closestLocations: {},
        activeLocation: false,
        dbLog: [],
        csrf: ''
    },

    mutations: {
        SET_USER(state, user) {
            state.user = user;
        },

        SET_USER_LOCATION(state, locationId) {
            state.user.location = locationId;
        },

        SET_LOCATION(state, location) {
            location.locations_coords = JSON.parse(location.locations_coords);
            state.location = location;
        },

        SET_CLOSEST_LOCATIONS(state, closestLocations) {
            state.closestLocations = sortClosestLocationsByType(closestLocations);
        },

        SET_ACTIVE_LOCATION(state, activeLocation) {
            state.activeLocation = activeLocation;
        },

        SET_DB_LOG(state, dbLog) {
            state.dbLog = dbLog;
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
        },

        dbLog(state) {
            return state.dbLog;
        }
    },

    actions: {
        async init({ commit }) {
            await load('/init', (data, commit) => {
                commit('SET_USER', data.user);
            }, commit);
        },

        async changeLocation({ commit }, locationId) {
            await load('/change-location/' + locationId, (data, commit) => {
                commit('SET_USER_LOCATION', locationId);
            }, commit);
        },
    }
});


async function load(url, callback = false, commit) {
    try {
        let data = await fetch(url, {
            headers: { 'Content-Type': 'application/json' }
        });

        data = await data.json();
        if (callback) callback(data, commit);

        commit('SET_LOCATION', data.location);
        commit('SET_CLOSEST_LOCATIONS', data.closestLocations);
        if (data.db) {
            commit('SET_DB_LOG', data.db);
        }

        return data;
    } catch (e) {
        console.log(e);
    }
}

function sortClosestLocationsByType(closestLocations) {
    let closestLocationByType = {};
    for (let closest_location of closestLocations) {
        if (typeof closestLocationByType[closest_location.type] == 'undefined') {
            closestLocationByType[closest_location.type] = [];
        }
        closestLocationByType[closest_location.type].push(closest_location);
    }

    return closestLocationByType;
}
