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
import {authRequest} from "@/services/api";
import {API_ROUTES} from "@/constants/api_routes";

export default defineComponent({
    components: {Quiz, QuizCard},
    props: {},
    data() {
        return {}
    },
    async mounted() {
        await authRequest.get(API_ROUTES.me).then(res => console.log(res.data))
    },
    methods: {
        logout() {
            logoutRequest()
        }
    }
});
</script>

