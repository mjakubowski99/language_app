<template>
    <Modal ref="modal">
        <Button v-if="!quizEnabled" text="Generate quiz" @clicked="generateQuiz"/>

        <Quiz
            v-if="this.quizEnabled"
            :answer-time="this.quiz.answerTime"
            :questions="this.quiz.questions"
        />
    </Modal>
</template>

<script lang="ts">

import {defineComponent} from "vue";
import Modal from "./Modal.vue";
import {API_ROUTES, formatParams} from "@/constants/api_routes.js";
import {authRequest} from "@/services/api.js";
import Button from "@/components/Buttons/Button.vue";
import Quiz from "@/components/Quiz/Quiz.vue";

export default defineComponent({
    name: "QuizModal",
    components: {Modal, Button, Quiz},
    data() {
        return {
            quizEnabled: false,
            quiz: {},
        }
    },
    methods: {
        show() {
            this.$refs.modal.show();
        },

        generateQuiz() {
            const subject_quiz_route = formatParams(API_ROUTES.subject_quiz, {
                'id': this.$route?.params?.id
            });

            authRequest.post(subject_quiz_route)
                .then((res) => {
                    if (res.data.data) {
                        const data = res.data.data;

                        this.quiz = this.mapQuiz(data);
                        this.quizEnabled = true;
                    }
                })
        },

        mapQuiz(data) {
            return {
                answerTime:  data.answer_seconds,
                questions: data.questions.map((question) => {
                    return {
                        'questionId': question.id,
                        'question': question.question,
                        'answers': question.answers.map((answer) => {
                            return {
                                'answerId': answer.id,
                                'answer': answer.answer,
                                'isValid': answer.is_valid,
                            }
                        })
                    }
                })
            }
        }
    }
});
</script>

<style scoped>

</style>
