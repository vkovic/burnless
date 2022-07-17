<template>
    <div class="bg-[url('https://images.pexels.com/photos/414102/pexels-photo-414102.jpeg')]">
        <Suspense>
            <blockquote
                class="p-10 text-white"
            >
                {{ quoteContent }}
            </blockquote>
        </Suspense>
        <div class="flex justify-between">
            <button class="px-2 py-3 bg-gray-300">Snooze</button>
            <button @click="handleClickOk" class="px-2 py-3 bg-indigo-300">Ok</button>
        </div>
    </div>
</template>

<script setup lang="ts">

    import { nextTick, onMounted, Ref, ref } from 'vue';

    const show: Ref<Boolean> = ref(false);
    const scores: Array<Number> = [1, 2, 3, 4, 5];
    const quoteContent: Ref<String> = ref('');
    //const quoteAuthor: Ref<String> = ref('');

    const handleClick = (score) => {
        window.parent.postMessage({
            'location': window.location.href,
            'score': score
        }, '*');
    };

    onMounted(async () => {
        var resp = await axios.get('https://api.quotable.io/random');

        // quoteAuthor.value = resp.data.author;
        quoteContent.value = resp.data.content;

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
