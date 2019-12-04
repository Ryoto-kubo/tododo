<template>
    <div class="edit_container">
        <div class="add_todo_btn_container">
            <button @click="$emit('showTodo')">
                <font-awesome-icon class="plus_icon" icon="plus" />新しくカードを追加
            </button>
        </div>
        <div class="trash_container" style="height: 20px;">
            <font-awesome-icon class="trash_icon" icon="trash-alt" :style="{transform: scaleUp}" @click="openTrashList()"/>
            <draggable id="trash"
                @add="addTrash"
                :group="options"
            >
            </draggable>    
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import { log } from 'util';

export default {
    components: { 
        draggable,
    },
    props: {
        options: Object,
        scaleUp: String
    },
    methods: {
        addTrash(originalEvent) {
            // trashしたリストのDOM情報を変数に代入し親Componentへ渡す
            let addItem = originalEvent.item
            let addDOM  = originalEvent.item.style
            this.$emit('addTrash', {item: addItem, dom: addDOM})
        },
        openTrashList() {
            console.log('hello');
        },
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.edit_container{
    margin-bottom: 50px;
    display: flex;
    align-items: center;
    .add_todo_btn_container{
        margin-right: 20px;
        font-size: 1.6rem;
        button{
            width: 210px;
            color: $white;
            padding: 5px 15px;
            background: $success_btn_bg;
            outline: none;
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            .plus_icon{
                width: 20px;
                height: 20px;
                margin-right: 10px;
            }
        }
    }
    .trash_container{
        position: relative;
        .trash_icon{
            width: 20px;
            height: 20px;
            transition: .2s all;
            z-index: 999;
        }
        &:hover{
            .trash_icon{
                transform: scale(1.5);
            }
        }
        #trash{
            width: 50px;
            height: 50px;
            opacity: 0.5;
            // background: red;
            position: absolute;
            top: -15px;
            left: -15px;
        }
    }
}
</style>
