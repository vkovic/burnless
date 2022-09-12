<template>
    <div class="flex">
        <div
            v-for="score in scores"
            @click="handleClick(score)"
            class="p-3 bg-indigo-50 cursor-pointer"
        >
            {{ score }}
        </div>
    </div>
</template>

<script setup lang="ts">

    import { ref, Ref } from 'vue';
    import axios from 'axios';
    import { emitAbroad } from '../Composables/useEmitAbroad';

    const show: Ref<Boolean> = ref(false);
    const scores: Array<Number> = [1, 2, 3, 4, 5];

    const handleClick = async (score) => {
        await axios.post(route('smilies'), {score});

        emitAbroad({score});
    };

</script>
