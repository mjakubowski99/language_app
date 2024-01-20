<template>
    <div @click="triggerCheck"
         class="w-full p-2 border hover:bg-gray-200 rounded cursor-pointer transition-colors"
         :class="this.checked ? 'bg-blue-500' : ''"
    >
        {{ text }}
    </div>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "AnswerButton",
    props: {
        answerId: {type: String, required: true},
        text: {type: String, required: true, default: 'Button'},
    },
    data() {
        return {
            checked: false,
        }
    },
    methods: {
        triggerCheck() {
            this.checked = !this.checked;
            this.$emit('answerTriggered', this.answerId, this.checked);
        },
        uncheck() {
            this.checked = false;
        }
    }
})
</script>

<style scoped>

</style>
