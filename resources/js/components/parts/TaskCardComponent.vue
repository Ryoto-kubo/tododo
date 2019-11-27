<template>
    <div class="task_body">
        <div>
            <!-- <input type="checkbox" @click="showMenu()"> -->
            {{taskTitle}}
        </div>
        <!-- <div style="position: relative; top: 2px;">
            <button v-if="isShowMenu"
                onfocus="this.blur();"
                class="menu_trigger" 
                :class="[isOpenMenu ? active : '']" 
                @click="openMenu()"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>
            <template v-if="isOpenMenu">
                <menu-component />
            </template>
        </div> -->
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
        showMenu() {
            this.isShowMenu = !this.isShowMenu
        },
        openMenu() {
            this.isOpenMenu = !this.isOpenMenu
        },

    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.task_body{
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    input {
        margin-right: 3px;
        transform: scale(1.2);
    }
}

</style>