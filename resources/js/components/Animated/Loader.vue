<template>
    <div v-if="isLoading" class="flex justify-center items-center">
        <div class="animate-spin rounded-full h-8 w-8 border-t-4 border-b-4"></div>
    </div>
</template>

<script>
export default {
    name: "Loader",
    props: {
        isLoading: {type: Boolean, default: false}
    }
}
</script>

<style scoped>

</style>
