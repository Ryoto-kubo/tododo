<template>
    <div class="message_view_container">
        <div class="message_view_content">
                <div class="message_title">
                    -{{title}}-
                </div>
                <div class="message_contents">
                    {{contents}}
                </div>
                <div class="display_flex">
                    <div class="message_created_at">
                        {{createdAt}}
                    </div>
                    <div class="replay_container">
                        <template v-if="reply" >
                            <div class="message_reply" @click="openReply">
                                返信を見る(1)
                            </div>
                        </template>
                    </div>
                </div>
            <transition name="js-accordion" @before-enter="beforeEnter" @enter="enter" @before-leave="beforeLeave" @leave="leave">
                <div class="accordion_container" v-if="isOpenReplay">
                    <div class="accordion">
                        <!-- <p>返信</p> -->
                        {{reply}}
                    </div>
                </div>
            </transition>
        </div>
        <hr>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isOpenReplay: false,
            display: 'none',
            accordionAnimation: null
        }
    },
    props: {
        title: String,
        contents: String,
        reply: String,
        createdAt: String
    },
    methods: {
        openReply() {
            this.isOpenReplay = !this.isOpenReplay
        },
        beforeEnter: function(el) {
            el.style.height = 0 + 'px'
        },
        enter: function(el) {
            el.style.height = el.scrollHeight + 'px'
        },
        beforeLeave: function(el) {
            el.style.height = el.scrollHeight + 'px'
        },
        leave: function(el) {
            el.style.height = 0 + 'px'
        }
    },
    watch: {
        isOpenReplay() {
            if(this.isOpenReplay){
                this.display = 'block'
            } else {
                this.display = 'none'
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.message_view_container{
    width: 60%;
    margin: auto;
    overflow: hidden;
    .message_view_content{
        margin-top: 20px;
        padding: 0 20px;
        .message_title{
            font-size: 24px;
            font-weight: bold;
        }
        .message_contents{
            font-size: 18px;
        }
        .display_flex{
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            .replay_container{
            }
        }
        .accordion_container{
            // margin-top: 10px;
            transition: .5s all;
            font-size: 14px;
            // font-weight: bold;
            .accordion{
                margin-bottom: 20px;
                font-size: 14px;
                padding: 10px;
                background: $white;
                border: 1px solid $base_bg;
            }
        }
    }
    hr{
        width: 100%;
        height: 3px;
        margin: 0;
        border: none;
        background: #448888;
        border-radius: 50px;
    }
}

// .js-accordion{
//   &--target{
//     // transition: height .5s ease-in-out;
//   }
//   &-enter-active{
//     animation-duration: .5s;
//     animation-fill-mode: both;
//     animation-name: js-accordion--anime__opend;
//   }
//   &-leave-active{
//     animation-duration: .5s;
//     animation-fill-mode: both;
//     animation-name: js-accordion--anime__closed;
//   }
// }

// @keyframes js-accordion--anime__opend {
//   0% {
//     opacity: 0;
//   }
//   100% {
//     opacity: 1;
//    }
// }
// @keyframes js-accordion--anime__closed {
//   0% {
//    opacity: 1;
//   }

//   100% {
//     opacity: 0;
//   }
// }
</style>
