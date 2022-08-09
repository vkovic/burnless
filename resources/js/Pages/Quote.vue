<template>
    <div class="bg-[url('https://source.unsplash.com/random?nature')]">
        <Suspense>
            <blockquote
                class="p-10 text-white"
            >
                <p class="text-xl">"{{ quote.content }}"</p>
                <footer class="text-right pt-4 tracking-wider uppercase font-semibold">{{ quote.author}}</footer>
            </blockquote>
        </Suspense>
        <div class="flex justify-between">
            <button @click="handleSnooze" class="px-2 py-3 bg-gray-300">Snooze</button>
            <button @click="handleOk" class="px-2 py-3 bg-indigo-300">Ok</button>
        </div>
    </div>
</template>

<script setup lang="ts">

    import { nextTick, onMounted, reactive } from 'vue';
    import { emitAbroad } from '../Composables/useEmitAbroad';
    import axios from 'axios';
    import { Inertia } from '@inertiajs/inertia';

    const quote = reactive({
        content: '',
        author: ''
    });

    onMounted(async () => {
        var resp = await axios.get('https://api.quotable.io/random');

        quote.content = resp.data.content;
        quote.author = resp.data.author;

        await nextTick();

        emitAbroad({height: window.document.body.scrollHeight});
    });

    const handleOk = async () => {
        const data = {clicked: 'OK'};

        await axios.post(route('quote', data));

        emitAbroad(data);
    };

    const handleSnooze = async () => {
        const data = {clicked: 'SNOOZE'};

        await axios.post(route('quote', data));

        emitAbroad(data);
    };

</script>
