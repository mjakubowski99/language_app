<template>
    <header class="bg-zinc-900 border-b-2 border-zinc-700 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="text-white text-lg font-semibold">Language app</h1>
            <a :href="this.loginRoute" class="text-white">Login</a>
        </div>
    </header>
</template>

<script>
import {route} from "@/services/navigation";
import {ROUTES} from "@/constants/routes.ts";
export default {
    name: "Navbar",
    data() {
        return {
            'loginRoute': route(ROUTES.login),
        }
    }
}
</script>
