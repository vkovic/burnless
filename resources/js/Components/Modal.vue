<template>

    <div ref="dialogPanel" class="relative z-10">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full text-center">
                <div
                    style="min-width: 640px"
                    class="relative bg-white rounded-lg overflow-hidden shadow-xl"
                >
                    <iframe ref="frame" :src="link" />
                </div>
            </div>
        </div>
    </div>

</template>

<script setup lang="ts">

    import { onMounted, ref } from 'vue';

    const props = defineProps({
        link: String
    });

    const emit = defineEmits([
        'confirmed'
    ]);

    const open = ref(true);
    const frame = ref(null);

    onMounted(() => {
        window.addEventListener('message', (e) => {
            //
            // Filter only events we want to listen
            //
            if (e.data.location) {
                // Emit confirmed so we can close the modal
                emit('confirmed', e.data);
            } else if (e.data.height) {
                // Set iframe height to resize modal with actual content
                frame.value.style.height = e.data.height + 'px';
            }
        });
    });
</script>

<style scoped>

    iframe {
        width: 100%;
    }

</style>
