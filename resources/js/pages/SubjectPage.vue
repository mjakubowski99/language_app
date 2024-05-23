<template>
    <div>
        <!-- Navbar -->
        <Navbar/>

        <div class="flex">
            <div class="flex-1 p-5">
                <div class="max-w-6xl mx-auto bg-zinc-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="p-5">
                        <h2 class="text-xl font-semibold text-white mb-6">{{ subject.name }}</h2>

                        <div
                            class="mb-2 border-2 border-white-800 block rounded-lg p-6 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
                        >
                            <div v-html="subject.description" />
                        </div>

                        <ul class="mt-4 divide-y divide-white-800">
                            <DropdownListItem title="Words to practise">
                                <table class="w-full text-sm text-left text-gray-400 border-white-800">
                                    <thead class="text-xs text-gray-400 uppercase rounded-md">
                                    <tr class="bg-zinc-900 border">
                                        <th scope="col" class="py-3 px-6 border border-white-800">Word</th>
                                        <th scope="col" class="py-3 px-6 border border-white-800">Translation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="word in subject.words" :key="word.id" class="even:bg-zinc-900 hover:bg-gray-700">
                                        <td class="py-3 px-6 border border-white-800">{{ word.word }}</td>
                                        <td class="py-3 px-6 border border-white-800">{{ word.translation }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </DropdownListItem>

                            <DropdownListItem title="Quiz">
                                <Button text="Launch quiz" @clicked="launchQuizModal"/>
                                <QuizModal ref="quizModal"/>
                            </DropdownListItem>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">

import {defineComponent} from "vue";
import Navbar from "@/components/Navigation/Navbar.vue"
import {authRequest} from "@/services/api";
import {formatParams} from "@/constants/api_routes";
import {API_ROUTES} from "@/constants/api_routes";
import DropdownListItem from "@/components/Lists/DropdownListItem.vue";
import Modal from "@/components/Modals/Modal.vue";
import QuizModal from "@/components/Modals/QuizModal.vue";
import Button from "@/components/Buttons/Button.vue";

export default defineComponent({
    components: {QuizModal, Modal, DropdownListItem, Navbar, Button},
    name: "SubjectPage",
    data() {
        return {
            showWords: true,
            subject: {},
            quizEnabled: false,
            quiz: {}
        };
    },
    mounted() {
        const subject_route = formatParams(API_ROUTES.subject, {
            'id': this.$route.params.id
        });

        authRequest.get(subject_route)
            .then((res) => {
                if (res.data.data) {
                    const data = res.data.data;

                    this.subject = this.mapSubject(data);
                }
            })
    },
    methods: {
        launchQuizModal() {
            this.$refs.quizModal.show();
        },

        mapSubject(data) {
            return {
                name: data.name,
                description: data.description,
                words: data.words.map((word) => {
                    return {
                        'id': word.id,
                        'word': word.word,
                        'translation': word.translation,
                    }
                })
            }
        },
    }
});

</script>
