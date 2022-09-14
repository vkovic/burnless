<template>
    <DashboardLayout>
        <PageWrapper>
            <template #header>
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <h2 class="text-xl font-semibold leading-tight">Dashboard</h2>
                    <Button
                        target="_blank"
                        href="https://github.com/kamona-ui/kui-dashboard-vue"
                        variant="black"
                        class="justify-center max-w-sm gap-2"
                        v-slot="{ iconSizeClasses }"
                    >
                        <GithubIcon aria-hidden="true" :class="iconSizeClasses" />
                        <span>Star on Github</span>
                    </Button>
                </div>
            </template>

            <!-- Statistics section -->
            <StatisticsSection />

            <!-- Sales section -->
            <SalesSection />

            <!-- Latest users & transaction section -->
            <LatestSection />
        </PageWrapper>
    </DashboardLayout>
</template>

<script setup>
    import PageWrapper from '@/Dashboard/components/PageWrapper.vue';
    import StatisticsSection from '@/Dashboard/components/pages/dashboard/StatisticsSection.vue';
    import SalesSection from '@/Dashboard/components/pages/dashboard/SalesSection.vue';
    import LatestSection from '@/Dashboard/components/pages/dashboard/LatestSection.vue';
    import Button from '@/Dashboard/components/Button.vue';
    import { GithubIcon } from '@/Dashboard/components/icons/brands';

    import DashboardLayout from '@/Dashboard/layouts/DashboardLayout.vue';

    //export default {
        // Using a render function
        // layout: (h, page) => h(Layout, () => child),

        // Using the shorthand
        //layout: Layout,

        // props: {
        //     user: Object,
        // },
    //};

</script>
