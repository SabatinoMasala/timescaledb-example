<template>
    <Head title="Welcome!" />
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-5">
        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex">
                    <p class="text-lg">Monthly revenue</p>
                    <p class="text-lg ml-auto text-slate-400" v-if="total_rows">Filtered {{ total_rows }} rows</p>
                </div>
                <BarChart
                    :data="data"
                    index="name"
                    :colors="['blue', 'green', 'red', 'orange', 'pink']"
                    :categories="categories"
                />
            </div>
        </div>
    </div>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    total_rows: {
        type: Number,
        required: false,
    },
    categories: {
        type: Array,
        required: true,
    },
})

import { BarChart } from '@/components/ui/chart-bar/index.js';

</script>
