<!-- This example requires Tailwind CSS v2.0+ -->
<template>

    <Dialog as="div" class="relative z-10" :open="open">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />

        <div class="fixed z-10 inset-0 overflow-y-auto">

            <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

                <DialogPanel class="relative bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl sm:my-8 sm:max-w-lg sm:w-full sm:p-6">

                    <iframe :src="link"></iframe>

                </DialogPanel>

            </div>
        </div>
    </Dialog>

</template>

<script setup lang="ts">
    import { onMounted, ref, defineEmits } from 'vue';
    import {
        Dialog,
        DialogPanel,
        DialogTitle,
        DialogDescription,
    } from '@headlessui/vue';

    const props = defineProps({
        link: String
    });

    const emit = defineEmits([
        'qwe'
    ]);

    const open = ref(true);

    const receiveMessage = (event) => {
        console.log('log event instead of this');
        //console.log('')
    };

    onMounted(() => {
        window.addEventListener('message', (e) => {
            emit('qwe', e.data);
        });
    });




</script>
