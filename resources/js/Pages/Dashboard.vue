<template>
    <DashboardLayout>
        <PageWrapper>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">Dashboard</h2>
            </div>

            <!-- Statistics section -->

            <section class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <h2 class="sr-only">Quick statistics</h2>

                <!-- Customers card -->
                <QuickStatisticsCard
                    title="Total users"
                    :chartData="customersData"
                    :result="props.totalUsers"
                    percentage="32.40%"
                    :actions="[{ title: 'View', to: '#' }]"
                >
                    <template #icon="{ sizeClasses }">
                        <UserGroupIcon aria-hidden="true" :class="sizeClasses" />
                    </template>
                </QuickStatisticsCard>

                <!-- Visits card -->
                <QuickStatisticsCard
                    title="Today actions"
                    :chartData="visitsData"
                    :result="props.todayActions"
                    status="danger"
                    percentage="-2.10%"
                    :actions="[{ title: 'View', to: '#' }]"
                >
                    <template #icon="{ sizeClasses }">
                        <EyeIcon aria-hidden="true" :class="sizeClasses" />
                    </template>
                </QuickStatisticsCard>

                <!-- Orders card -->
                <QuickStatisticsCard
                    title="Orders"
                    :chartData="ordersData"
                    result="34.4k"
                    status="warning"
                    percentage="0.60%"
                    :actions="[{ title: 'View', to: '#' }]"
                >
                    <template #icon="{ sizeClasses }">
                        <ShoppingCartIcon aria-hidden="true" :class="sizeClasses" />
                    </template>
                </QuickStatisticsCard>

                <!-- Growth card -->
                <QuickStatisticsCard
                    title="Growth"
                    :chartData="growthData"
                    result="15.6%"
                    percentage="7.20%"
                    :actions="[{ title: 'View', to: '#' }]"
                >
                    <template #icon="{ sizeClasses }">
                        <ChartPieIcon aria-hidden="true" :class="sizeClasses" />
                    </template>
                </QuickStatisticsCard>
            </section>

            <!-- /Statistics section -->

            <!-- Sales section -->

            <section class="grid grid-cols-1">
                <h2 class="sr-only">Sales charts</h2>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-1">
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Today's user -->
                            <BaseCard no-header bg-classes="bg-purple-500">
                                <div class="p-2 grid grid-cols-1 gap-4">
                                    <UserAddIcon class="w-10 h-10 text-white" />

                                    <div class="grid gap-2">
                                        <p class="text-base font-medium text-green-300">+1%</p>
                                        <p class="text-3xl font-medium text-white">1,210</p>
                                    </div>

                                    <p class="text-sm font-medium text-white">Today's Users</p>
                                </div>
                            </BaseCard>

                            <!-- Today's sales -->
                            <BaseCard no-header bg-classes="bg-cyan-500">
                                <div class="p-2 grid grid-cols-1 gap-4">
                                    <ChartBarIcon class="w-10 h-10 text-white" />

                                    <div class="grid gap-2">
                                        <p class="text-base font-medium text-green-300">+4%</p>
                                        <p class="text-3xl font-medium text-white">20,350</p>
                                    </div>

                                    <p class="text-sm font-medium text-white">Today's Sales</p>
                                </div>
                            </BaseCard>
                        </div>

                        <!-- Earning card -->
                        <BaseCard noHeader class="grid grid-cols-2">
                            <div class="grid grid-cols-1 gap-4">
                                <h4 class="text-2xl font-medium">Score</h4>
                                <p class="text-2xl font-medium text-gray-600">Today's score</p>
                                <p class="text-2xl font-medium text-gray-600">$5070.80</p>
                            </div>

                            <!-- Donut chart -->
                            <div class="w-full h-fullflex items-center justify-center">
                                <div ref="earningChartEl"></div>
                            </div>
                        </BaseCard>
                    </div>

                    <!-- Bar chart -->
                    <BaseCard title="Overall Burnout" :actions="[{ title: 'View', to: '#' }]">
                        <div ref="salesChartEl"></div>
                    </BaseCard>
                </div>
            </section>

            <!-- /Sales section -->

        </PageWrapper>
    </DashboardLayout>
</template>

<script setup>
import BaseCard from '@/Dashboard/components/BaseCard.vue';
import PageWrapper from '@/Dashboard/components/PageWrapper.vue';
import QuickStatisticsCard from '@/Dashboard/components/QuiclStatisticsCard.vue';
import DashboardLayout from '@/Dashboard/layouts/DashboardLayout.vue';
import {
    UserGroupIcon,
    EyeIcon,
    ShoppingCartIcon,
    ChartPieIcon,
    UserAddIcon,
    ChartBarIcon
} from '@heroicons/vue/outline';
import ApexCharts from 'apexcharts';
import { onMounted, ref, defineProps } from 'vue';

const customersData = [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13];
const visitsData = [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13].reverse();
const ordersData = [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13];
const growthData = [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13];

const earningChartEl = ref(null);
const salesChartEl = ref(null);

const props = defineProps({
    totalUsers: 0,
    todayActions: 0,
});

onMounted(() => {
    let earningChart = new ApexCharts(earningChartEl.value, {
        series: [30, 70],
        chart: {
            type: 'donut',
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {show: false},
        comparedResult: [2, 8],
        labels: ['Sales', ''],
        stroke: {width: 0},
        colors: ['#a855f7', '#e2e8f0'],
        grid: {
            padding: {
                right: -20,
                bottom: -8,
                left: -20
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        name: {
                            offsetY: 15
                        },
                        value: {
                            offsetY: -20,
                            formatter(val) {
                                return `${parseInt(val)}%`;
                            }
                        },
                        total: {
                            show: true,
                            label: 'Sales',
                            formatter() {
                                return '30%';
                            }
                        }
                    }
                }
            }
        }
    });
    earningChart.render();

    let salesChart = new ApexCharts(salesChartEl.value, {
        series: [
            {
                name: 'This month',
                data: [31, 40, 28, 51, 42, 109, 100],
                color: '#a855f7'
            },
            {
                name: 'Previous month',
                data: [11, 32, 45, 32, 34, 52, 41],
                color: '#a1a1a1'
            }
        ],
        legend: {
            position: 'top'
        },
        chart: {
            height: '100%',
            type: 'area',
            toolbar: {
                show: false
            }
        },
        grid: {
            show: false,
            padding: {
                left: 0,
                right: 0
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: ['1', '2', '3', '4', '5', '6', '7']
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            }
        }
    });

    salesChart.render();
});
</script>
