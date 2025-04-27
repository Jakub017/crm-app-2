<template>
    <div class="grid grid-cols-12 gap-4 mb-4">
        <div
            class="bg-white rounded-xl flex flex-col items-start justify-center gap-2 col-span-12 md:col-span-4 border-[1px] border-gray-200"
        >
            <div class="w-full p-4 border-b border-seconadry-light">
                <span class="text-sm text-seconadry">Bieżący miesiąc</span>
            </div>
            <div
                class="flex justify-between items-start px-4 py-4 gap-4 w-full"
            >
                <div class="flex flex-col gap-3">
                    <span class="text-2xl text-secondary-dark font-semibold"
                        >14 123,24 PLN</span
                    >
                    <span class="text-sm text-secondary"
                        ><span class="text-green-500 font-semibold"
                            ><i class="fa-solid fa-arrow-up"></i> +14.5%</span
                        >
                        w stosunku do poprzedniego miesiaca</span
                    >
                </div>
                <div
                    class="flex justify-center items-center bg-secondary-extra-light p-4 rounded-full size-16"
                >
                    <i
                        class="fa-solid fa-scale-balanced text-xl text-primary"
                    ></i>
                </div>
            </div>
        </div>

        <div
            class="bg-white rounded-xl flex flex-col items-start justify-center gap-2 col-span-12 md:col-span-4 border-[1px] border-gray-200"
        >
            <div class="w-full p-4 border-b border-seconadry-light">
                <span class="text-sm text-seconadry">Opłacone faktury</span>
            </div>
            <div
                class="flex w-full justify-between items-start px-4 py-4 gap-4"
            >
                <div class="flex flex-col gap-3">
                    <span class="text-2xl text-secondary-dark font-semibold"
                        >7 543,21</span
                    >
                    <span class="text-sm text-secondary"
                        ><span class="text-green-500 font-semibold"
                            ><i class="fa-solid fa-arrow-up"></i> +21.2%</span
                        >
                        w stosunku do poprzedniego miesiaca</span
                    >
                </div>
                <div
                    class="flex justify-center items-center bg-secondary-extra-light p-4 rounded-full size-16"
                >
                    <i class="fa-solid fa-credit-card text-xl text-primary"></i>
                </div>
            </div>
        </div>
        <div
            class="bg-white rounded-xl flex flex-col items-start justify-center gap-2 col-span-12 md:col-span-4 border-[1px] border-gray-200"
        >
            <div class="w-full p-4 border-b border-seconadry-light">
                <span class="text-sm text-seconadry"
                    >Średnia wartość faktury</span
                >
            </div>
            <div
                class="flex justify-between items-start px-4 py-4 gap-4 w-full"
            >
                <div class="flex flex-col gap-3">
                    <span class="text-2xl text-secondary-dark font-semibold"
                        >523,46 PLN</span
                    >
                    <span class="text-sm text-secondary"
                        ><span class="text-red-500 font-semibold"
                            ><i class="fa-solid fa-arrow-down"></i> -7.3%</span
                        >
                        w stosunku do poprzedniego miesiaca</span
                    >
                </div>
                <div
                    class="flex justify-center items-center bg-secondary-extra-light p-4 rounded-full size-16"
                >
                    <i
                        class="fa-solid fa-file-invoice text-xl text-primary"
                    ></i>
                </div>
            </div>
        </div>
    </div>
    <div class="h-[400px] w-full border border-secondary-light rounded-xl p-4">
        <canvas id="myChart"></canvas>
    </div>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import QuickBox from "@/Components/QuickBox.vue";
import Chart from "chart.js/auto";
import { onMounted } from "vue";

onMounted(() => {
    const ctx = document.getElementById("myChart");

    new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                "01.04.2025",
                "06.04.2025",
                "11.04.2025",
                "16.04.2025",
                "21.04.2025",
                "26.04.2025",
                "30.04.2025",
            ],

            datasets: [
                {
                    label: "Przychód",
                    data: [
                        5_123.24, 7_123.24, 8_123.24, 9_123.24, 12_123.24,
                        13_123.24, 14_123.24,
                    ],
                    borderWidth: 2,
                    fill: true,
                    borderColor: "#36A2EB",
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    fill: true,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tension: 0.4,

            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
});
</script>

<script>
export default {
    layout: AppLayout,
};
</script>
