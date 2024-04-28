<template>
    <li class="pb-3 sm:pb-4">
        <div class="flex items-center space-x-4 rtl:space-x-reverse max-w-lg">
            <div class="flex-shrink-0">
                <GraduateIcon/>
            </div>
            <div class="flex-1 min-w-0">
                <p class="font-medium text-gray-900 truncate dark:text-white text-lg">
                    {{title}}
                </p>
            </div>
            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                <button class="m-2 bg-transparent hover:bg-blue-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded" @click="toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <div v-if="isToggled" style="max-height: 50vh; overflow-y: auto;" class="mt-8">
            <slot></slot>
        </div>
    </li>
</template>

<script lang="ts">

import {defineComponent} from "vue";
import GraduateIcon from "@/components/Svg/GraduateIcon.vue";

export default defineComponent({
    props: {
        title: {type: String, required: true},
    },
    components: {GraduateIcon},
    name: "DropdownListItem",
    data() {
        return {
            isToggled: false,
        }
    },
    mounted() {
    },
    methods: {
        toggle() {
            this.isToggled = !this.isToggled;
        }
    }
});

</script>
