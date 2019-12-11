<template>
    <div class="request_form_container">
        <div class="request_form">
            <!-- <form action="/api/postForm" method="post"> -->
            <div class="request_title_container">
                <p class="request_title">件名</p>
                <input class="input_title" name="title" type="text" v-model="titleValue" placeholder="件名を入力してください">
                <div class="text_right" :style="{color: alertTitleColor}">
                    {{titleValue.length}}/20
                </div>
            </div>
            <div class="request_content_container">
                <p class="request_content">ご意見・ご要望</p>
                <textarea class="input_content" name="contents" v-model="contentsValue" placeholder="ご意見・ご要望をご入力してください"></textarea>
                <div class="text_right" :style="{color: alertContentsColor}">
                    {{contentsValue.length}}/140
                </div>
            </div>
            <div class="submit_button_container">
                <button class="btn" @click="postForm" :disabled="!isSubmit">送信</button>
            </div>
            <!-- </form> -->
        </div>
        <hr>
    </div>
</template>

<script>
import { setTimeout } from 'timers';
export default {
    data() {
        return {
            titleValue: '',
            contentsValue: '',
            isFlashMessage: false,
        }
    },
    computed: {
        alertTitleColor() {
            let titleLength = this.titleValue.length
            if (titleLength > 20) {
                return 'red'
            }
        },
        alertContentsColor() {
            let contentsLength = this.contentsValue.length
            if (contentsLength > 140) {
                return 'red'
            }
        },
        isSubmit() {
            let titleLength    = this.titleValue.length
            let contentsLength = this.contentsValue.length
            // タイトルと意見どちらかが0文字ならdisabled
            if (titleLength === 0 || contentsLength === 0) {
                return false
            }

            if (titleLength >=1 && titleLength <= 20) {
                return true
            } else {
                return false
            }

            if (contentsLength >=1 && contentsLength <= 140) {
                return true
            } else {
                return false
            }

        }
    },
    methods: {
        postForm() {
            const hostname             = location.protocol + '//' + location.hostname
            const request_url          = hostname + '/api/postForm'

            let request_object         = {}
            request_object['title']    = this.titleValue
            request_object['contents'] = this.contentsValue

            axios.post(request_url, request_object)
            .then(function(response){
                this.titleValue    = ''
                this.contentsValue = ''
                // flashMessageを出すために状態をstoreに保存
                this.isFlashMessage = true
                this.$store.dispatch('app/successForm', { isFlashMessage: this.isFlashMessage })

                // setTimeout(() => {
                //     location.href = '/';
                // }, 2500)
            }.bind(this))
            .catch(function(error) {
                console.log(error)
            })
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../../../../sass/variables';
.text_right{
    text-align: right;
    font-size: 16px;
}
.request_form_container{
    color: $text_color;
    text-align: center;
    .request_form{
        width: 40%;
        min-width: 400px;
        margin: 0 auto 50px auto;
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
    hr{
        width: 60%;
        height: 3px;
        border: none;
        background: #448888;
        border-radius: 50px;
    }
}
</style>
