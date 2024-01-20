<template>
    <div>
        <button @click="logout"> Logout </button>
        <Quiz/>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import {logout as logoutRequest} from "@/services/login";
import QuizCard from "@/components/Quiz/QuizCard.vue";
import Quiz from "@/components/Quiz/Quiz.vue";

export default defineComponent({
    components: {Quiz, QuizCard},
    props: {},
    data() {
        return {}
    },
    mounted() {
    },
    methods: {
        logout() {
            logoutRequest()
        }
    }
});
</script>

