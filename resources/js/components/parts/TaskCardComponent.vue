<template>
    <div class="task_body">
        <div>
            {{taskTitle}}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isShowMenu: false,
            isOpenMenu: false,
            active: 'active',
        }
    },
    props: {
        taskTitle: String,
        taskIndex: Number,
    },
    methods: {
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.task_body{
    height: auto;
}

</style>