<template>
    <div class="flash_message_container">
        ありがとうございます。送信が完了しました。
    </div>
</template>

<script>
export default {

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
    transition: .5s all;
}
</style>
