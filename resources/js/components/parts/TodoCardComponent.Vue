<template>
    <div class="todo_card_body">
        <p class="todo_card_title">
            {{title}}
        </p>
        <div class="todo_card_add_container">
            <font-awesome-icon class="plus_icon" icon="plus"/>
            <p>{{addTodoCard}}st</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        addTodoCard: String
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.todo_card_body{
    width: 280px;
    height: 250px;
    padding: 10px;
    margin-right: 30px;
    border: 1px solid  #707070;
    border-radius: 10px;
    background: $todo_card_bg;
    transition: .5s all;
    &:hover{
        transform: translate(0, -5px);
        box-shadow: 0px 7px 10px 0px #707070;
    }
    .todo_card_title{
        font-size: 2.0rem;
    }
    .plus_icon{
        width: 25px;
        height: 25px;
    }
}
</style>

