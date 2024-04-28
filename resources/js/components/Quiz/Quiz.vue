<template>
    <div>
        <div v-if="!quizStarted" class="border rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
            <Button @clicked="handleStart" text="Start"></Button>
        </div>

        <QuizCard
            v-if="quizStarted && !isFinished"
            :question-number="this.currentQuestion+1"
            :key="this.currentQuestion"
            :answer-time="this.answerTime"
            :multiple-answers="this.$props.questions[this.currentQuestion].multipleAnswers"
            :questionId="this.$props.questions[this.currentQuestion].questionId"
            :question="this.$props.questions[this.currentQuestion].question"
            :answers="this.$props.questions[this.currentQuestion].answers"
            :showAnswer="true"
            @answer-time-finished="timeFinished"
            @question-answered="answered"
        />

        <div v-if="isFinished" class="border rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
            Finished
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import QuizCard from "@/components/Quiz/QuizCard.vue";
import Button from "@/components/Buttons/Button.vue";
import type {QuizQuestion} from "@/interfaces/Quiz";

export default defineComponent({
    components: {Button, QuizCard},
    props: {
        answerTime: {type: Number},
        questions: {
            type: Array as () => QuizQuestion[],
            default: () => [],
        }
    },
    data() {
        return {
            quizStarted: false,
            currentQuestion: 0,
            isFinished: false,
            userAnswers: {},
        }
    },
    methods: {
        handleStart() {
            this.quizStarted = true
        },
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
