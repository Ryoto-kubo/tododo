<template>
    <div class="todo_card_body" :style="{ height: height + 'px' }">
        <p class="todo_card_title">
            {{title}}
        </p>
        <template v-if="isShowTask">
            <div class="todo_card_task" v-for="(task, index) in tasks" :key="index">
                {{task.taskTitle}}
            </div>
        </template>
        <input v-if="isDisplay" type="text" v-model="taskValue">
        <button v-if="isDisplay" @click="addTask(objectKey)">
            <font-awesome-icon class="plus_icon" icon="plus"/>
        </button>
        <div class="todo_card_add_container" @click="showTaskInput">
            <font-awesome-icon class="plus_icon" icon="plus"/>
            <p>タスクを追加</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            height: 200,
            isDisplay: false,
            isShowTask: false,
            taskValue: null,
            todoArray: [],
            tasks: []
        }
    },
    props: {
        title: String,
        objectKey: String,
        weeklyKey: String
    },
    // computed: {
    //     taskValue() {
    //         return this.taskValue = this.taskValue
    //     }
    // },
    mounted() {
        // this.todoArray.push(this.objectKey)
    },
    methods: {
        showTaskInput() {
            this.isDisplay = true
        },
        addTask(objectKey) {
            let jsonData
            this.isDisplay  = false
            this.isShowTask = true

            this.tasks.push({taskTitle: this.taskValue})
            this.height = this.height + 45

            // this.$set(this.todoArray, objectKey, this.taskValue)           
            this.todoArray.push({[objectKey]: {name: this.taskValue}})
            console.log(this.todoArray.keys());
            
            jsonData = JSON.stringify(this.todoArray)
            this.$localStorage.set(this.weeklyKey, jsonData)

            this.taskValueInit()
        },
        taskValueInit() {
            this.taskValue = null
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.todo_card_body{
    width: 280px;
    padding: 10px;
    margin-right: 30px;
    border: 1px solid  #707070;
    border-radius: 10px;
    background: $todo_card_bg;
    transition: .5s all;
    position: relative;
    // &:hover{
    //     transform: translate(0, -5px);
    //     box-shadow: 0px 7px 10px 0px #707070;
    // }
    .todo_card_title{
        font-size: 2.0rem;
    }
    .todo_card_task{
        margin-bottom: 10px;
        padding: 5px 10px;
        background: #fff;
        font-size: 16px;
        border-radius: 10px;
        transition: .5s all;
        &:hover{
            transform: translate(0, -2px);
            box-shadow: 0px 4px 10px 0px #707070;
        }
    }
    .todo_card_add_container{
        display: flex;
        align-items: center;
        position: absolute;
        top: 82%;
        cursor: pointer;
        .plus_icon{
            width: 25px;
            height: 25px;
        }
        p{
            margin-left: 10px;
            margin-bottom: 0;
            font-size: 1.6rem;
        }
    }
}
</style>

