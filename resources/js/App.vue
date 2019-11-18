<template>
    <div class="body_container">
        <div v-for="(week, index) in weeks" :key="index">
          <router-link v-bind:to="{ name : 'week', params : { path: week.path }}">{{week.week}}</router-link>
        </div>
    </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
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
  }
}
</script>
