<template>
    <div class="progress-bar">
        <div class="info">
            <label>{{label}}</label>
        </div>
        <div class="background-bar"></div>
        <transition appear @before-appear="beforeEnter" @after-appear="enter">
            <div class="tracker-bar"></div>
        </transition>
    </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    name: "ProgressBar",
    props: {
        id: {type: String},
        label: String,
        animationDuration: { type: Number, default: 5},
    },
    methods: {
        beforeEnter (el) {
            el.style.width = 0
        },
        enter (el) {
            el.style.width = "100%";
            el.style.transition = `width ${this.animationDuration}s linear`
        },
    }
});
</script>

<style scoped>
label {
    color: #ff298a !important;
}

.tracker-bar {
    background: #ff298a !important;
    height: 20px;
}

.progress-bar {
    width: 100%;
}

.info {
    font-size: 17px;
    justify-content: space-between;
    display: flex;
    color: grey;
    text-transform: uppercase;
}

.background-bar {
    background: #ccc;
    width: 100%;
    height: 20px;
}

.tracker-bar {
    background: grey;
    height: 20px;
    width: 0;
    margin-top: -20px;
}
</style>
