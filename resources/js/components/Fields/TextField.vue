<template>
    <div>
        <label :for="this.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{this.label}}</label>
        <input type="text" :id="this.id" v-model="value"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
    </div>
</template>

<script lang="ts">

import {defineComponent} from "vue";

export default defineComponent({
    name: "TextField",
    props: {
        id: {type: String, default: '123'},
        label: {type: String, default: ''},
        name: {type: String, default: ''},
        defaultValue: {type: String, default: ''},
    },
    watch: {
    },
    data() {
        return {
            'value': this.defaultValue
        }
    }
})
</script>
