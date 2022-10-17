<template>
    <DashboardLayout>
        <PageWrapper>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">Add new</h2>
            </div>
            <form @submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                Add action for `Yes/No` module
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, placeat?
                            </p>
                        </div>

                        <!-- Name -->

                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Name
                                </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input
                                        v-model="form.name"
                                        id="name"
                                        type="text"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- /Name -->

                        <!-- Yes -->

                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="yes" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Score for `Yes`
                                </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input
                                        v-model="form.yes"
                                        id="yes"
                                        type="number"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- /Yes -->

                        <!-- No -->

                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="no" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Score for `No`
                                </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input
                                        v-model="form.no"
                                        id="yes"
                                        type="number"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- /No -->

                        <!-- Date -->

                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="no" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Action date
                                </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input
                                        v-model="form.date"
                                        id="yes"
                                        type="date"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- /Date -->

                    </div>
                </div>
                <div class="pt-5 flex justify-end">
                    <Button type="submit">Save</Button>
                </div>
            </form>
        </PageWrapper>
    </DashboardLayout>
</template>

<script setup>
import Button from '@/Dashboard/components/Button.vue';
import PageWrapper from '@/Dashboard/components/PageWrapper.vue';

import DashboardLayout from '@/Dashboard/layouts/DashboardLayout.vue';
import { Inertia } from '@inertiajs/inertia';

import { reactive } from 'vue';

const form = reactive({
    module: 'YesNo',
    date: null,
    name: null,
    no: 1,
    yes: 5
});

function submit() {
    Inertia.post(route('dashboard.action'), form);
    form.reset();
}
</script>
