<template>

    <h1 class="text-lg">Preview for the iframe</h1>

    <button
        @click="show = true"
        class="p-4 bg-purple-400 text-white font-bold"
    >SHOW</button>

    <Modal
        @confirmed="show = false"
        :link="'/' + template" v-if="show"
    ></Modal>

</template>

<script setup lang="ts">

    import { ref, Ref } from 'vue';
    import Modal from  "@/Components/Modal.vue";

    const show: Ref<Boolean> = ref(false);

    defineProps({
        template: String
    });

</script>
