<template>
    <div class="information_wraper">
        <p class="title">Information</p>
        <div class="information_container">
            <div class="information_child" v-for="(information, index) in informationArray" :key="index">
                <div class="information_contents">
                    <p class="information_create_time">
                        {{information.created_at}}
                    </p>
                    <p class="information_title">
                        【{{information.title}}】
                    </p>
                    <p class="information_detail">
                        {{information.detail}}
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        informationArray: Array
    }   
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
p{
    margin: 0;
}
.information_wraper{
    text-align: center;
    .title{
        margin-bottom: 24px;
        font-size: 32px;
        font-weight: bold;
    }
    .information_container{
        width: 60%;
        height: 280px;
        margin: auto;
        padding: 20px;
        overflow: scroll;
        border: 4px solid $base_bg;
        border-radius: 10px;
        .information_child{
            margin-bottom: 30px;
            .information_contents{
                padding: 0 10px;
                text-align-last: left;
                .information_create_time{
                    font-size: 16px;
                    font-weight: bold;
                }
                .information_title{
                    font-size: 20px;
                    font-weight: bold;
                }
                .information_detail{
                    font-size: 16px;
                }
            }
            hr{
                margin: 0;
            }
        }
    }
}

</style>