<template>
    <div class="flex justify-between px-6 py-4 bg-white">
        <div>
            <button
                v-if="snooze"
                class="inline-flex items-center px-4 py-2 border border-green-500 rounded-md"
                @click="$emit('clicked', 'snooze')"
            >
                <span class="text-xl text-green-500 uppercase tracking-widest">
                    SNOOZE
                </span>
            </button>
            <button
                v-if="skip"
                class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md"
                @click="$emit('clicked', 'skip')"
            >
                <span class="text-xl text-green-500 uppercase tracking-widest">
                    SKIP
                </span>
            </button>
        </div>
        <button
            v-if="ok"
            class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md"
            @click="$emit('clicked', 'ok')"
        >
            <span class="text-xl text-white uppercase tracking-widest">
                OK
            </span>
        </button>
    </div>
</template>

<script setup>
    defineProps({
        snooze: {
            type: Boolean,
            default: true
        },
        skip: {
            type: Boolean,
            default: true
        },
        ok: {
            type: Boolean,
            default: true
        }
    });
</script>
