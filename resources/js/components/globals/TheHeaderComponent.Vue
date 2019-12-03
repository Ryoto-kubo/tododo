<template>
    <div class="header">
        <a href="/">TODOdo?</a>
        <div class="request_link_container">
            <router-link class="request_link" to="/request">
                ご意見・ご要望
            </router-link>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.header{
    padding: 15px;
    text-align: center;
    font-size: 30px;
    background: $base_bg;
}
a{
    color: $white;
    display: block;
    text-decoration: none;
}

</style>
