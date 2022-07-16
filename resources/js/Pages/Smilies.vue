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

    import { Inertia } from '@inertiajs/inertia';
    import { onMounted, ref, Ref } from 'vue';

    const show: Ref<Boolean> = ref(false);
    const scores: Array<Number> = [1, 2, 3, 4, 5];
    let iframeWin;

    function handleClickx() {

        console.log('handlindclick');

        //Inertia.post('/smilies', {score});
        //Inertia.visit(route('second'));
        //window.postMessage('this is from postmsg', '*');

        window.parent.postMessage({
            'height': 'this is from postmsg',
            'location': window.location.href,
            'route': route().current(),
            'score': score,
        }, "*");

    }

    const handleClick = (score) => {


        //Inertia.post('/smilies', {score});
        //Inertia.visit(route('second'));
        //window.postMessage('this is from postmsg', '*');

        window.parent.postMessage({
            'location': window.location.href,
            'score': score,
        }, "*");
    };



</script>
