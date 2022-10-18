<template>
    <img src="/img/web-app-example.png">
    <div v-if="show" class="bg-[url('/img/hero-pattern.svg')]">
        <div class="relative z-10">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
            </div>
            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-full text-center">
                    <div class="relative bg-white rounded-lg overflow-hidden shadow-xl" style="min-width: 640px;">
                        <div class="flex flex-col items-center py-10">
                            <h2 class="text-3xl py-10 px-20 leading-relaxed tracking-wider">{{ title }}</h2>
                            <p>{{ content }}</p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">

import { ref, Ref } from 'vue';
import axios from 'axios';
import smilieSadder from '../Assets/smilie_sadder.png';
import smilieSad from '../Assets/smilie_sad.png';
import smilieNormal from '../Assets/smilie_normal.png';
import smilieHappy from '../Assets/smilie_happy.png';
import smilieHappier from '../Assets/smilie_happier.png';
import ButtonBar from '@/Components/ModuleButtonBar.vue';

const show: Ref<Boolean> = ref(true);
const scores: Array<string> = [
    smilieSadder,
    smilieSad,
    smilieNormal,
    smilieHappy,
    smilieHappier
];

const props = defineProps(['title', 'content', 'type']);

const handle = async (score) => {
    console.log(props);
    await axios.post(route('action.submit', {module: 'Score', type: props.type, score}));
    show.value = false;
};

</script>
