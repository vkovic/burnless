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

    import { nextTick, onMounted, Ref, ref, reactive } from 'vue';
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

        window.parent.postMessage({
            'height': window.document.body.scrollHeight
        }, '*');

    });

    const handleOk = () => {
        window.parent.postMessage({
            'location': window.location.href,
            'clicked': 'OK'
        }, '*');

        Inertia.post(route('quote'), {clicked: 'OK'});
    };

    const handleSnooze = () => {
        window.parent.postMessage({
            'location': window.location.href,
            'clicked': 'SNOOZE'
        }, '*');

        Inertia.post(route('quote'), {clicked: 'SNOOZE'});
    };

</script>
