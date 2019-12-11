
const state = {
    isFlashMessage: null,
  }
  
  const mutations = {
    SUCCESS_FORM: (state, isFlashMessage) => {     
        console.log(isFlashMessage)
        console.log(state);
        
        state.isFlashMessage = isFlashMessage
    },    
  }
  
  const actions = {
    successForm({ commit }, { isFlashMessage }) {
        commit('SUCCESS_FORM', isFlashMessage)
    },
  }
  
  export default {
    namespaced: true,
    state,
    mutations,
    actions
  }
  