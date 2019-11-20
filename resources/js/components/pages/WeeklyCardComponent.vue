<template>
    <div>
        <p class="weekly">
            {{path}}
        </p>
    </div>
</template>

<script>
export default {
    computed: {
    path() {
        const week = this.$route.params.path;
        switch (week) {
            case 'mon':
                return '月曜日';
            break;
            case 'tue':
                return '火曜日';
            break;
            case 'wed':
                return '水曜日';
            break;
            case 'thu':
                return '木曜日';
            break;
            case 'fri':
                return '金曜日';
            break;
            case 'sat':
                return '土曜日';
            break;
            case 'sun':
                return '日曜日';
            break;

        }
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
.weekly{
    margin-top: 30px;
    margin-left: 100px;
    font-size: 3rem;
    font-weight: bold;
    color: $text_color;
}
</style>
