<template>
    <Navbar/>

    <Jumbotron/>

    <div v-for="course in courses" class="container mx-auto mt-5">
        <ImageCard
            :image-url="course.imageUrl"
            :title="course.title"
            :description="course.description"
            button-text="Enter"
            :navigation-url="course.navigationUrl"
        />
    </div>

</template>

<script lang="ts">

import {defineComponent} from "vue";
import {authRequest} from "@/services/api";
import {API_ROUTES, formatParams} from "@/constants/api_routes";
import Navbar from "@/components/Navigation/Navbar.vue";
import Jumbotron from "@/components/Jumbotron.vue"
import ImageCard from "@/components/Cards/ImageCard.vue";
import {ROUTES} from "@/constants/routes";
import {route} from '@/services/navigation'

export default defineComponent({
    components: {ImageCard, Jumbotron, Navbar},
    name: "CourseListPage",
    data() {
        return {
            courses: [],
        }
    },
    mounted() {
        authRequest.get(API_ROUTES.courses)
            .then((res) => {
                if (res?.data?.data) {
                    const data = res.data.data;
                    this.courses = this.mapCourses(data);
                }
            })
    },
    methods: {
        mapCourses(data): [] {
            return data.map((course) => {
                const navigationRoute = formatParams(ROUTES.course, {id: course.id});

                return {
                    'title': course.name,
                    'description': '',
                    'imageUrl': '',
                    'navigationUrl': route(navigationRoute)
                }
            })
        }
    }
});
</script>
