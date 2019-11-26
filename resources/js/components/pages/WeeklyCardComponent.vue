<template>
    <div>
        <p class="weekly">
            {{path}}
        </p>
        <button @click="addTodo()">
            追加
        </button>
        <div class="todo_card_container">
            <div v-for="(todoTitleObject, index) in localStorageList.todoCardList" :key="index">
            <!-- <div v-for="(todoTitleObject, index) in todoTitleObjects" :key="index"> -->
                <todo-card-component
                    :title    ="todoTitleObject.todoTitle"
                    :weeklyKey="$route.params.path"
                    :inputId="index + '_input'"
                    :todoCardListKey="index"
                />
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import { log } from 'util';
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
                todoCardList: {
                    list_0: { listId: 'list_0', todoTitle: 'するべきこと',  taskList: [] },
                    list_1: { listId: 'list_1', todoTitle: '作業中',  taskList: [] },
                    list_2: { listId: 'list_2', todoTitle: '完了',  taskList: [] },
                }
            },
            // localStorageList: {
            //     todoCardList: {
            //         list_0: [],
            //         list_1: [],
            //         list_2: [],
            //     }
            // }
        }
    },
    created() {
        const weeklyKey     = this.$route.params.path
        const weeklyObjects = JSON.parse(this.$localStorage.get(weeklyKey))
        
        // localStorageに、指定した曜日のkeyが登録されていなければweeklyKeyをkeyに登録
        if(weeklyObjects) {
            this.$set(this.localStorageList, "todoCardList", weeklyObjects.todoCardList)
        }
        const jsonList = JSON.stringify(this.localStorageList)
        this.$localStorage.set(weeklyKey, jsonList)

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
    },
    methods: {
        addTodo() {
            const weeklyKey   = this.$route.params.path
            let weeklyObjects = JSON.parse(this.$localStorage.get(weeklyKey))

            let list = this.localStorageList.todoCardList
            const newKey = "list_" + Object.keys(list).length
            weeklyObjects.todoCardList[newKey] = { listId: newKey, todoTitle: 'test',  taskList: [] }
            this.$set(this.localStorageList.todoCardList, newKey, { listId: newKey, todoTitle: 'test',  taskList: [] },)

            console.log(weeklyObjects);
            
            this.$localStorage.set(weeklyKey, JSON.stringify(weeklyObjects))
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
