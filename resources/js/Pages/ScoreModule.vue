<template>

    <div class="flex flex-col items-center py-10">
        <h2 class="text-3xl py-10 px-20 leading-relaxed tracking-wider">{{ question }}</h2>
        <div class="flex p-10">
            <img
                v-for="(score, i) in scores"
                class="h-20 w-20 cursor-pointer m-3"
                :src="score"
                @click="handle(i + 1)"
            />
        </div>
    </div>
    <ButtonBar
        :ok="false"
        :skip="true"
        :snooze="true"
        @clicked="handle"
    />

</template>

<script setup lang="ts">

    import { nextTick, onMounted, ref, Ref } from 'vue';
    import axios from 'axios';
    import { emitPopupScore } from '../Composables';
    import smilieSadder from '../Assets/smilie_sadder.png';
    import smilieSad from '../Assets/smilie_sad.png';
    import smilieNormal from '../Assets/smilie_normal.png';
    import smilieHappy from '../Assets/smilie_happy.png';
    import smilieHappier from '../Assets/smilie_happier.png';
    import ButtonBar from '@/Components/ModuleButtonBar.vue';

    onMounted(async () => {
        await nextTick();

        console.log(window.document.body.scrollHeight);
        emitPopupScore({height: window.document.body.scrollHeight});
    });

    const show: Ref<Boolean> = ref(false);
    const scores: Array<string> = [
        smilieSadder,
        smilieSad,
        smilieNormal,
        smilieHappy,
        smilieHappier
    ];

    const props = defineProps(['question']);

    const handleSnooze = async () => {
        await axios.post(route('smilies'), {
            score: 1
        });
    };

    const handle = async (score) => {
        if (score == 'snooze') {
            return;
        }

        if (score == 'skip') {
            score = -1;
        }

        await axios.post(route('score'), {score});

        emitPopupScore({score});
    };

</script>
