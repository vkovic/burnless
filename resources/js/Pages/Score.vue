<template>
    <DashboardLayout>
        <PageWrapper>
            <template #header>
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <h2 class="text-xl font-semibold leading-tight">Add module</h2>
                </div>
                <form @submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                            <div>
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Use a permanent address where you can
                                    receive mail.
                                </p>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Name
                                    </label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input
                                            v-model="form.content"
                                            id="title"
                                            type="text"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="content" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Name
                                    </label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input
                                            v-model="form.content"
                                            id="content"
                                            type="text"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Cancel
                            </button>
                            <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Save
                            </button>
                        </div>
                    </div>
                </form>

            </template>
        </PageWrapper>
    </DashboardLayout>
</template>

<script setup>
    import PageWrapper from '@/Dashboard/components/PageWrapper.vue';
    import StatisticsSection from '@/Dashboard/components/pages/dashboard/StatisticsSection.vue';
    import SalesSection from '@/Dashboard/components/pages/dashboard/SalesSection.vue';
    import Button from '@/Dashboard/components/Button.vue';
    import { GithubIcon } from '@/Dashboard/components/icons/brands';

    import DashboardLayout from '@/Dashboard/layouts/DashboardLayout.vue';

    import { reactive } from 'vue';
    import { Inertia } from '@inertiajs/inertia';

    const form = reactive({
        title: null,
        content: null
    });

    function submit() {
        Inertia.post('/modules/manage/add-type', form);
    }
</script>
