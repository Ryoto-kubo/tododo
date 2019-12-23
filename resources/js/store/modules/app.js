
const state = {
    isFlashMessage: null,
    weeks: [
      {path: 'mon', week: '月'},
      {path: 'tue', week: '火'},
      {path: 'wed', week: '水'},
      {path: 'thu', week: '木'},
      {path: 'fri', week: '金'},
      {path: 'sat', week: '土'},
      {path: 'sun', week: '日'}
    ]
  }
  
  const mutations = {
    SUCCESS_FORM: (state, isFlashMessage) => {     
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
  