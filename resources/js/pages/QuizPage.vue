<template>
    <div>
        <Navbar/>
        <button @click="logout"> Logout </button>
        <Loader :is-loading="isLoading"/>
        <Quiz
            v-if="questions"
            :answer-time="answerTime"
            :questions="questions ? questions : []"
        />
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import {logout as logoutRequest} from "@/services/login";
import QuizCard from "@/components/Quiz/QuizCard.vue";
import Quiz from "@/components/Quiz/Quiz.vue";
import {authRequest} from "@/services/api";
import {API_ROUTES, formatParams} from "@/constants/api_routes";
import Navbar from "@/components/Navigation/Navbar.vue"
import Loader from "@/components/Animated/Loader.vue";
import type {QuizQuestion} from "@/interfaces/Quiz";

export default defineComponent({
    components: {Loader, Navbar, Quiz, QuizCard},
    props: {},
    data() {
        return {
            isLoading: false,
            answerTime: 10,
            questions: [],
        }
    },
    async mounted() {
        const route = formatParams(API_ROUTES.quiz, {'id': this.$route.params.id});

        await authRequest.get(route)
            .then((res) => {
                const data = res.data?.data;

                this.questions = this.getQuestions(data.questions);
            })
    },
    methods: {
        logout() {
            logoutRequest()
        },
        getQuestions(data): QuizQuestion[] {
            return data.map(question => {
                return {
                    questionId: question.id,
                    question: question.question,
                    answers: question.answers.map(answer => {
                        return {
                            answerId: answer.id,
                            answer: answer.answer,
                        }
                    })
                }
            })
        }
    }
});
</script>


