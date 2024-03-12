<template>
    <div>
        <QuizCard
            v-if="!isFinished"
            :question-number="this.currentQuestion+1"
            :key="this.currentQuestion"
            :answer-time="10"
            :questionId="this.questions[this.currentQuestion].questionId"
            :question="this.questions[this.currentQuestion].question"
            :answers="this.questions[this.currentQuestion].answers"
            @answer-time-finished="timeFinished"
            @question-answered="answered"
        />

        <div v-if="isFinished" class="border rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
            Result 15/15
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import QuizCard from "@/components/Quiz/QuizCard.vue";

export default defineComponent({
    components: {QuizCard},
    props: {
    },
    data() {
        return {
            currentQuestion: 0,
            isFinished: false,
            questions: [
                {
                    questionId: "0",
                    question: "Test",
                    answers: [
                        {answerId: "0", answer: "Text"},
                        {answerId: "1", answer: "Textowa"},
                    ],
                },
                {
                    questionId: "1",
                    question: "Test",
                    answers: [
                        {answerId: "0", answer: "Text"},
                        {answerId: "1", answer: "Textowa"},
                    ],
                },
            ],
            userAnswers: {},
        }
    },
    mounted() {
    },
    methods: {
        timeFinished(questionId: string, userAnswerIds: String[]) {
            this.saveAnswers(questionId, userAnswerIds);
            this.goToNextQuestion();
        },
        answered(questionId: string, userAnswerIds: String[]) {
            this.saveAnswers(questionId, userAnswerIds);
            this.goToNextQuestion()
        },
        goToNextQuestion() {
            if (this.currentQuestion+1>=this.questions.length) {
                this.isFinished = true;
                this.$emit('quizFinished')
                return;
            }
            this.currentQuestion++;
        },
        saveAnswers(questionId: string, userAnswerIds: String[]) {
            this.userAnswers[questionId] = userAnswerIds;
        }
    }
});
</script>
