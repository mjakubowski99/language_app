<template>
    <div>
        <label :for="this.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{this.label}}</label>
        <input type="password" :id="this.id"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="John"
        >
    </div>
</template>

<script lang="ts">

import {defineComponent} from "vue";

export default defineComponent({
    name: "PasswordField",
    props: {
        id: {type: String, default: '1234'},
        label: {type: String, default: ''},
        name: {type: String, default: ''},
        defaultValue: {type: String, default: ''}
    },
    watch: {
        value: function () {}
    },
    data() {
        return {
            'value': this.defaultValue
        }
    }
})
</script>
