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
            <button class="px-2 py-3 bg-gray-300">Snooze</button>
            <button @click="handleClickOk" class="px-2 py-3 bg-indigo-300">Ok</button>
        </div>
    </div>
</template>

<script setup lang="ts">

    import { nextTick, onMounted, Ref, ref, reactive } from 'vue';

    const show: Ref<Boolean> = ref(false);
    const scores: Array<Number> = [1, 2, 3, 4, 5];

    const quote = reactive({
        content: '',
        author: ''
    });

    const handleClick = (score) => {
        window.parent.postMessage({
            'location': window.location.href,
            'score': score
        }, '*');
    };

    onMounted(async () => {
        var resp = await axios.get('https://api.quotable.io/random');

        quote.content = resp.data.content;
        quote.author = resp.data.author;

        await nextTick();

        window.parent.postMessage({
            'height': window.document.body.scrollHeight
        }, '*');

    });

    const handleClickOk = () => {
        window.parent.postMessage({
            'location': window.location.href
        }, '*');
    };

</script>
