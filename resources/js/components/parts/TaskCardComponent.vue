<template>
    <div class="task_body">
        <div>
            {{taskTitle}}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        taskTitle: String,
    },
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.task_body{
    height: auto;
}

</style>