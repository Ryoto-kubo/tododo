<template>
    <div class="todo_card_body">
        <p class="todo_card_title">
            {{title}}
        </p>
        <template v-if="isShowTask">
            <div class="todo_card_task" v-for="(task, index) in tasks" :key="index">
                {{task.taskTitle}}
            </div>
        </template>
        <template v-if="isDisplay">
            <div class="todo_card_input_container">
                <input autofocus type="text"
                    :id="todoCardListKey"
                    :class="validAnimation" 
                    v-model="taskValue" 
                    @keydown.enter="addTask(todoCardListKey, $event.keyCode)"
                >
                <div class="btn_area">
                    <div>
                        <button class="done_btn" @click="addTask(todoCardListKey)">
                            追加
                        </button>
                    </div>
                    <div>
                        <button class="cancel_btn" @click="cancelTask()">
                            <font-awesome-icon class="cancel_icon" icon="times"/>
                        </button>
                    </div>
                </div>
            </div>
        </template>
        <div v-if="isAddTask" class="todo_card_add_container" @click="showTaskInput">
            <font-awesome-icon class="plus_icon" icon="plus"/>
            <div class="add_text">タスクを追加</div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isDisplay: false,
            isShowTask: true,
            isAddTask: true,
            taskValue: null,
            validAnimation: null,
            todoObject: {},
            tasks: []
        }
    },
    props: {
        title: String,
        weeklyKey: String,
        todoCardListKey: String,
    },
    created() {
        let weeklyObjects = JSON.parse(this.$localStorage.get(this.weeklyKey))
        if (weeklyObjects) {
            let reslut = weeklyObjects['todoCardList'][this.todoCardListKey]
            if(reslut) {
                let weeklyObject = weeklyObjects['todoCardList'][this.todoCardListKey]
                weeklyObject.forEach((element) => {
                    this.height = this.height + 55
                    this.tasks.push(element)

                });
            }
        }
    },
    methods: {
        showTaskInput() {
            this.isDisplay = true
            this.isAddTask = false
        },
        cancelTask(){
            this.isDisplay = false
            this.isAddTask = true
        },
        addTask(todoCardListKey, keyCode) {
            if (keyCode !== 13) return
            
            if (!this.taskValue) {
                let removeClassDuration = 500
                this.isDisplay = true
                this.validAnimation = 'valid_shake'
                setTimeout(() => {
                    this.validAnimation = null
                }, removeClassDuration);

            } else {
                this.isAddTask  = true
                this.isShowTask = true

                // dataにpush
                this.tasks.push({taskTitle: this.taskValue})
                this.$set(this.todoObject, 'name', this.taskValue)
    
                // localStorageのdataを取得し、todoCardListKeyが無ければ追加
                let weeklyJson   = JSON.parse(this.$localStorage.get(this.weeklyKey))
                const key        = Object.keys(weeklyJson.todoCardList)             
                const result     = key.find(target => target === todoCardListKey)
                if(!result) {
                    weeklyJson.todoCardList[todoCardListKey] = []
                }

                // localStorageに保存
                const object = {taskTitle: this.taskValue}
                weeklyJson['todoCardList'][todoCardListKey].push(object)
                this.$localStorage.set(this.weeklyKey, JSON.stringify(weeklyJson))

                // 次のinputタグにautofocousする
                this.$nextTick(() => document.getElementById(todoCardListKey).focus());

                this.taskValueInit()
            }
        },
        taskValueInit() {
            this.taskValue = null
        },
    },
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.plus_icon{
    width: 20px;
    height: 25px;
    vertical-align: 0;
}

.valid_shake{
    animation: shake 1.5s 1;
}
@keyframes shake {
    0% {
        transform: translate(0px, 0px) rotateZ(0deg)
    }
    2% {
        transform: translate(2px, 2px) rotateZ(2deg)
    }
    4% {
        transform: translate(0px, 2px) rotateZ(0deg)
    }
    6% {
        transform: translate(2px, 0px) rotateZ(-2deg)
    }
    8% {
        transform: translate(0px, 0px) rotateZ(0deg)
    }
    10% {
        transform: translate(2px, 2px) rotateZ(2deg)
    }
    12% {
        transform: translate(0px, 0px) rotateZ(0deg)
    }
    14% {
        transform: translate(2px, 0px) rotateZ(-2deg)
    }
    16% {
        transform: translate(0px, 2px) rotateZ(0deg)
    }
    18% {
        transform: translate(0px, 0px) rotateZ(0deg)
    }
    100% {
        transform: translate(0px, 0px) rotateZ(0deg)
    }
}
.todo_card_body{
    width: 280px;
    height: auto;
    padding: 10px;
    margin-right: 30px;
    border: 1px solid  #707070;
    border-radius: 10px;
    background: $todo_card_bg;
    transition: .5s all;
    // position: relative;
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
    .todo_card_input_container{
        margin-bottom: 10px;
        input{
            width: 258px;
            margin-bottom: 8px;
            padding: 5px 10px;
            font-size: 1.6rem;
        }
        .btn_area{
            display: flex;
            button{
                width: 70px;
                padding: 0;
                color: $white;
                font-size: 1.6rem;
                border: none;
                border-radius: 50px;
                outline: none;
            }
            .done_btn{
                background: $success_btn_bg;
                margin-right: 10px;
            }
            .cancel_btn{
                background: $cancel_btn_bg;
            }
        }
    }
    .todo_card_add_container{
        display: flex;
        align-items: center;
        transition: .5s all;
        // position: relative;
        // bottom: 10px;
        cursor: pointer;
        .add_text{
            margin-left: 10px;
            margin-bottom: 0;
            font-size: 1.6rem;
        }
    }
}
</style>

