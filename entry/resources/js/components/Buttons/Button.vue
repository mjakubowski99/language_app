<template>
    <button type="submit" @click="onClick" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        {{this.text}}
    </button>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "Button",
    props: {
        text: {type: String, default: 'Button'}
    },
    methods: {
        onClick() {
            this.$emit('clicked')
        }
    }
})
</script>

<style scoped>

</style>
