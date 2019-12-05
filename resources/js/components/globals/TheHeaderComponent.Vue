<template>
    <div class="header">
        <div class="header_container">
            <h1 class="top_link_container">
                <router-link class="top_link" to="/">
                    TODOdo?
                </router-link>
            </h1>
            <div class="request_link_container">
                <router-link class="request_link" to="/request">
                    ご意見・ご要望
                </router-link>
            </div>
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
    margin-bottom: 50px;
    padding: 15px;
    text-align: center;
    font-size: 30px;
    background: $base_bg;
    .header_container{
        width: 90%;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        .top_link_container{
            font-size: 30px;
        }
        .request_link_container{
            font-size: 25px;
        }
    }
}
a{
    color: $white;
    display: block;
    text-decoration: none;
}

</style>
