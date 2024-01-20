<template>
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl text-white font-semibold mb-4">Zaloguj się</h1>
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <TextField ref="email"/>
                </div>

                <div class="mb-4">
                    <PasswordField ref="password"/>
                </div>

                <Button text="Prześlij"/>
            </form>
        </div>
    </div>

</template>

<script lang="ts">
import { defineComponent } from 'vue'
import TextField from "@/components/Fields/TextField.vue";
import PasswordField from "@/components/Fields/PasswordField.vue";
import Button from "@/components/Buttons/Button.vue";
import {login as loginRequest} from "@/services/login"
import {redirectToRoute} from "@/services/navigation";


export default defineComponent({
    components: {Button, PasswordField, TextField},
    data() {
        return {}
    },
    mounted() {
    },
    methods: {
        async submit() {
            const email = this.$refs.email.value;
            const password = this.$refs.password.value;

            await loginRequest({
                'email': email ?? '',
                'password': password ?? '',
                'device_name': window.navigator.userAgent
            }).then((response) => {
                redirectToRoute('/')
            })
        }
    }
});
</script>
