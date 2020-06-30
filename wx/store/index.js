import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);
const store = new Vuex.Store({
	state: {
		userInfo: {}
	},
	actions: {
		loadUserInfo({
			commit
		}, data) {
			commit("setUserInfo", data)
		}
	},
	mutations: {
		setUserInfo(state, data) {
			state.userInfo = data
		}
	}
})

export default store;
