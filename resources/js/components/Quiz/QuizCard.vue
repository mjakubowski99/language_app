<template>
    <div class="border rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
        <div> {{this.questionNumber}}. </div>
        <ProgressBar :percentage="100" :animation-duration="this.answerTime"/>
        <h2 class="text-2xl font-semibold mb-4">{{ question }}</h2>
        <div class="flex flex-wrap gap-4 mt-4">
            <AnswerButton
                @answer-triggered="handleAnswerTrigger"
                v-for="(answer, index) in answers"
                :key="index"
                :text="answer.answer"
                :answer-id="answer.answerId"
                ref="answers"
            />
        </div>

        <Button class="mt-3" @click="handleConfirm" text="Zatwierdz"/>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import type { PropType } from 'vue'
import ProgressBar from "@/components/Animated/ProgressBar.vue";
import AnswerButton from "@/components/Buttons/AnswerButton.vue";
import Button from "@/components/Buttons/Button.vue";
import type {QuizAnswer} from "@/interfaces/Quiz";

export default defineComponent({
    name: "QuizCard",
    components: {Button, AnswerButton, ProgressBar},
    props: {
        questionNumber: {type: Number},
        questionId: {type: String},
        question: {type: String, default: ""},
        multipleAnswers: {type: Boolean, default: true},
        answerTime: {type: Number, default: 5},
        answers: {type: Array[Object as PropType<QuizAnswer>], default: []}
    },
    data() {
        return {
            userAnswerIds: []
        }
    },
    mounted: function() {
        setTimeout(() => {
            this.$emit('answerTimeFinished', this.questionId, this.userAnswerIds);
        }, this.answerTime*1000);
    },
    methods: {
        handleConfirm() {
            this.syncAnswers();

            if (this.userAnswerIds.length == 0) {
                alert("Zaznacz jakąś odpowiedź!")
            } else {
                this.$emit('questionAnswered', this.questionId, this.userAnswerIds);
            }
        },
        handleAnswerTrigger(answerId: string, checked: boolean) {
            if (checked && !this.multipleAnswers) {
                this.uncheckOtherButtons(answerId);
            }

            this.syncAnswers();
        },

        uncheckOtherButtons(answerId: string) {
            for(let answerButton of this.$refs.answers) {
                if (answerButton.checked && answerButton.answerId !== answerId) {
                    answerButton.uncheck();
                }
            }
        },

        syncAnswers() {
            this.userAnswerIds = [];
            for(let answerButton of this.$refs.answers) {
                if (answerButton.checked) {
                    this.userAnswerIds.push(answerButton.answerId);
                }
            }
        }
    }
})
</script>
