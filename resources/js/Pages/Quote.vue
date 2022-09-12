<template>
    <div class="bg-[url('https://source.unsplash.com/random?nature')]">
        <Suspense>
            <blockquote
                class="p-10 text-white mb-5"
            >
                <p class="text-xl drop-shadow-lg">"{{ quote.content }}"</p>
                <footer class="text-right pt-4 tracking-wider uppercase font-semibold">{{ quote.author}}</footer>
            </blockquote>
        </Suspense>
        <div class="flex justify-between px-3 py-2">
            <button
                type="button"
                class="inline-flex items-center rounded-md border border-gray-800 px-4 py-2 text-sm font-medium text-gray-800"
                @click="handleSnooze"
            >
                Snooze
            </button>

            <button
                type="button"
                class="inline-flex items-center rounded-md border border-transparent bg-green-400 px-4 py-2"
                @click="handleOk"
            >
                <span class="text-sm font-medium text-white">OK</span>
            </button>
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
