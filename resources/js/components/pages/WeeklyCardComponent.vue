<template>
    <div>
        <p class="weekly">
            {{path}}
        </p>
        <div class="todo_card_container">
            <div v-for="(todoTitleObject, index) in todoTitleObjects" :key="index">
                <todo-card-component
                    :title    ="todoTitleObject.todoTitle"
                    :weeklyKey="$route.params.path"
                    :inputId="'list_input' + index"
                    :todoCardListKey="'list_' + index"
                />
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
export default {
    components: { draggable },
    data() {
        return {
            todoTitleObjects: [
                {todoTitle: 'するべきこと'},
                {todoTitle: '作業中'},
                {todoTitle: '完了'},
            ],
            localStorageList: {
                todoCardList: {}
            }
        }
    },
    mounted() {
        const weeklyKey   = this.$route.params.path
        const isWeeklyKey = JSON.parse(this.$localStorage.get(weeklyKey))
        
        // localStorageに、指定した曜日のkeyが登録されていなければweeklyKeyをkeyに登録
        if(!isWeeklyKey) {
            const jsonList = JSON.stringify(this.localStorageList)
            this.$localStorage.set(weeklyKey, jsonList)
        }
    },
    computed: {
        path() {
            const week = this.$route.params.path;
            switch (week) {
                case 'mon':
                    return '月曜日';
                break;
                case 'tue':
                    return '火曜日';
                break;
                case 'wed':
                    return '水曜日';
                break;
                case 'thu':
                    return '木曜日';
                break;
                case 'fri':
                    return '金曜日';
                break;
                case 'sat':
                    return '土曜日';
                break;
                case 'sun':
                    return '日曜日';
                break;
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.weekly{
    margin-top: 30px;
    font-size: 3rem;
    font-weight: bold;
    color: $text_color;
}
.todo_card_container{
    display: flex;
}
</style>
