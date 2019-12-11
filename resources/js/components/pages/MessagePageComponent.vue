<template>
    <div>
        <transition name="flashMessage">
            <flash-message-component 
            :isFlashMessage="isFlashMessage"/>
        </transition>
        <div class="request_container">
            <div class="request_title_container">
                <h2>ご意見・ご要望</h2>
            </div>
            <message-form-component />
            <div v-for="(message, index) in messageArray" :key="index">
                <message-view-component
                    :title="message.title"
                    :contents="message.contents"
                    :reply="message.reply"
                    :createdAt="message.created_at"
                />
            </div>
        </div>
    </div>
</template>
<script>
import MessageFormComponent  from "../parts/message/MessageFormComponent";
import MessageViewComponent  from "../parts/message/MessageViewComponent";
import FlashMessageComponent from "../parts/flashMessage/FlashMessageComponent";
export default {
    components: {
        MessageFormComponent,
        MessageViewComponent,
        FlashMessageComponent
    },
    data() {
        return {
            messageArray:[]
        }
    },
    computed: {
        isFlashMessage() {
            return this.$store.state.app.isFlashMessage
        }
    },
    mounted() {
        // DBからmessageデータを取得    
        const hostname    = location.protocol + '//' + location.hostname
        const request_url = hostname + '/api/getMessage'
        axios.get(request_url)
        .then(response => {
            const messageObjects = response.data.message_objects
            messageObjects.forEach(element => {
            this.messageArray.push(element)
        });
        })
        .catch(error => {
            console.log(error);
        });    
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.request_container{
    width: 90%;
    margin: auto;
    margin-bottom: 50px;
    color: $text_color;
    .request_title_container{
        margin-bottom: 50px;
        text-align: center;
        h2{
            font-size: 25px;
        }
    }
}
</style>
