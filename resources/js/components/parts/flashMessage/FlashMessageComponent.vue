<template>
    <div class="flash_message_container" :style="{opacity: opacity}">
        ありがとうございます。送信が完了しました。
        <!-- <br>
        homeへ戻ります。 -->
    </div>
</template>

<script>
export default {
    props: {
        isFlashMessage: Boolean
    },
    computed: {
        opacity() {
            if (this.isFlashMessage) {
                return 1
            } else {
                return 0
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../../../../sass/variables';
.flash_message_container{
    padding: 10px 0px;
    position: relative;
    top: -50px;
    z-index: -1;
    font-size: 16px;
    text-align: center;
    color: $white;
    background: #E3BD71;
    transition: 1s all;
}
</style>
