<template>
    <div class="request_form_container">
        <div class="request_form">
            <form action="#">
                <div class="request_title_container">
                    <p class="request_title">件名</p>
                    <input class="input_title" name="title" type="text" v-model="inputValue" placeholder="件名を入力してください">
                </div>
                <div class="request_content_container">
                    <p class="request_content">件名</p>
                    <textarea class="input_content" name="content" v-model="textValue" placeholder="内容を入力してください"></textarea>
                </div>
                <div class="submit_button_container">
                    <button class="btn" @click="postForm">送信</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            inputValue: null,
            textValue: null
        }
    },
    methods: {
        postForm() {
            console.log('hello');
            
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.request_form_container{
    color: $text_color;
    text-align: center;
    .request_form{
        width: 40%;
        min-width: 400px;
        margin: auto;
        .request_title_container{
            margin-bottom: 30px;
            .request_title{
                font-size: 16px;
                text-align: left;
            }
            .input_title{
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid $base_bg;
                outline: none;
            }
        }
        .request_content_container{
            margin-bottom: 30px;
            .request_content{
                font-size: 16px;
                text-align: left;
            }
            .input_content{
                width: 100%;
                height: 200px;
                padding: 10px;
                font-size: 16px;
                border: 1px solid $base_bg;
                outline: none;
            }
        }
        .submit_button_container{
            .btn{
                width: 150px;
                height: 40px;
                font-size: 16px;
                border-radius: 10px;
                color: $white;
                background: #E3BD71;
            }
        }
    }
}
</style>
