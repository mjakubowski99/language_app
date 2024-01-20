<template>
    <div>
        <QuizCard
            :question-number="this.currentQuestion+1"
            :key="this.currentQuestion"
            :answer-time="10"
            :questionId="this.questions[this.currentQuestion].questionId"
            :question="this.questions[this.currentQuestion].question"
            :answers="this.questions[this.currentQuestion].answers"
            @answer-time-finished="finished"
            @question-answered="answered"
        />
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
            questions: [
                {
                    questionId: "0",
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
        finished(questionId: string, userAnswerIds: String[]) {
            this.saveAnswers(questionId, userAnswerIds);
            this.goToNextQuestion();
        },
        answered(questionId: string, userAnswerIds: String[]) {
            this.saveAnswers(questionId, userAnswerIds);
            this.goToNextQuestion()
        },
        goToNextQuestion() {
            if (this.currentQuestion+1>=this.questions.length) {
                console.log(this.userAnswers);
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
