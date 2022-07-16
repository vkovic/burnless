<template>

    <h1>NOT IFRAME</h1>

    <button
        @click="show = !show"
        class="p-4 bg-purple-400 text-white font-bold"
    >SHOW</button>

    <Modal
        @qwe="handleQwe"
        link="/smilies" v-if="show"
    ></Modal>

</template>

<script setup lang="ts">

    import { ref, Ref } from 'vue';
    import Modal from  "@/Components/Modal.vue";

    const show: Ref<Boolean> = ref(false);

    const handleQwe = (x) => {
        console.log(x);
        show.value = false;
    };

</script>
