<template>
    <div v-if="showModal" class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
        <div class="max-h-full w-full max-w-xl sm:rounded-2xl bg-zinc-800">
            <div class="w-full">
                <button @click="hide" class="m-4 text-white bg-gray-900 p-1 rounded">X</button>
                <div class="m-8 my-20 max-w-[400px] mx-auto">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    data() {
        return {
            showModal: false,
        }
    },
    methods: {
        show() {
            this.showModal = true;
        },

        hide: function(){
            this.showModal = false;
        }
    }
}
</script>

<style scoped>

</style>
