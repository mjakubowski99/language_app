<template>
    <Navbar/>

    <div class="container mx-auto p-4">
        <h1 v-if="course" class="text-3xl font-bold mb-8"> {{course.name}} </h1>

        <!-- Lesson List -->
        <div class="mb-8">
            <h2 class="text-xl font-bold mb-4">Subjects List</h2>
            <ul class="divide-y divide-gray-200">
                <li v-if="course" v-for="(subject, index) in course.subjects" :key="index" class="py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">{{ subject.name }}</h3>

                    <a :href="subject.routeUrl" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Go to lesson</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script lang="ts">
import Navbar from "@/components/Navigation/Navbar.vue";
import {authRequest} from "@/services/api";
import {API_ROUTES, formatParams} from "@/constants/api_routes";
import {ROUTES} from "@/constants/routes"
import {route} from "@/services/navigation";

import {defineComponent} from "vue";

export default defineComponent({
    components: {Navbar},
    name: "CoursePage",
    data() {
        return {
            course: {},
        }
    },
    mounted() {
        const apiRoute = formatParams(API_ROUTES.course, {
            'id': this.$route.params.id,
        });

        authRequest.get(apiRoute)
            .then((res) => {
                if (res?.data?.data) {
                    const data = res.data.data;

                    this.course = {
                        'id': data.id,
                        'name': data.name,
                        'subjects': data.subjects.map((subject) => {
                            const subjectRouteUrl = formatParams(route(ROUTES.subject), {
                                'id': subject.id,
                            });

                            return {
                                'id': subject.id,
                                'name': subject.name,
                                'routeUrl': subjectRouteUrl,
                            }
                        })
                    }
                }
            })
    }
});
</script>

<style scoped>

</style>
