<template>
    <div>
        {{path}}
    </div>
</template>

<script>
export default {
    computed: {
    path() {
      return this.$route.params.path;
    }
  }
}
</script>

<style>

</style>
