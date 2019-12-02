<template>
    <div class="app_body">
      <div class="weekly_card_container">
        <div v-for="(week, index) in weeks" :key="index">
          <router-link class="weekly_card" :to="{ name : 'week', params : { path: week.path }}">
            <div class="weeklytext">
              {{week.week}}曜日
            </div>
          </router-link>
      </div>
        </div>
        <information-component 
          :informationArray="informationArray"
        />
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import InformationComponent from './components/parts/InformationComponent'
export default {
  name: 'App',
  components: {
    draggable,
    InformationComponent,
  },
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
      ],
      informationArray:[]
    }
  },
  created() {

    // DBからインフォメーションデータを取得
    const hostname    = location.protocol + '//' + location.hostname
    const request_url = hostname + '/api/getInformation'
    axios.get(request_url)
    .then(response => {
        const informationObject = response.data.information_object
        informationObject.forEach(element => {
          this.informationArray.push(element)
        });
      })
      .catch(error => {
          console.log(error);
      });

    console.log(this.informationArray);
    
    }
  }
</script>

<style lang="scss" scoped>
@import '../sass/variables';
.app_body{
  margin-top: 50px;
  .weekly_card_container{
    margin-bottom: 100px;
    display: flex;
    justify-content: space-around;
    flex-wrap:wrap;
    .weekly_card{
      margin-top: 10px;
      width: 180px;
      // height: 100px;
      padding: 30px;
      display: block;
      text-decoration: none;
      text-align: center;
      background: $todo_card_bg;
      border: 1px solid  #707070;
      border-radius: 10px;
      // font-size: calc(2rem + ((1.5vw - 0.64rem) * 0.7143)); // 20px~24pxで可変
      font-size: 25px;
      font-weight: bold;
      transition: .5s all;
      &:hover{
        background: $base_bg;
        box-shadow:0px 7px 10px 0px #707070;
        transform: translate(0, -5px);
        .weeklytext{
          color: $white;
        }
      }
      .weeklytext{
        color: $text_color;
        transition: .5s all;
      }
    }

  }
}
</style>