<template>
    <div class="request_container">
        <div class="request_title_container">
            <h2>ご意見・ご要望</h2>
        </div>
        <request-form-component />
    </div>
</template>

<script>
import RequestFormComponent from "../parts/RequestFormComponent";
export default {
    components: {
        RequestFormComponent
    }

}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.request_container{
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
