<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import QuickBox from "@/Components/QuickBox.vue";
</script>

<script>
export default {
    layout: AppLayout,
};
</script>

<template>
    <div class="grid grid-cols-12 gap-4">
        <div
            class="bg-white p-4 rounded-lg flex items-center justify-start gap-4 col-span-12 md:col-span-6 lg:col-span-3 border-[1px] border-gray-200"
        >
            <div
                class="size-14 flex justify-center items-center bg-indigo-100 rounded-lg"
            >
                <i class="fa-solid fa-users text-indigo-700 text-xl"></i>
            </div>
            <div class="flex flex-col gap-1 w-[calc(100%-50px)]">
                <h3 class="text-base font-semibold text-gray-900">
                    Dodaj klienta
                </h3>
                <p class="text-sm text-gray-500">
                    Dodaj nowego klienta do swojej bazy danych.
                </p>
            </div>
        </div>

        <div
            class="bg-white p-4 rounded-lg flex items-center justify-start gap-4 col-span-12 md:col-span-6 lg:col-span-3 border-[1px] border-gray-200"
        >
            <div
                class="size-14 flex justify-center items-center bg-indigo-100 rounded-lg"
            >
                <i class="fa-solid fa-users text-indigo-700 text-xl"></i>
            </div>
            <div class="flex flex-col gap-1 w-[calc(100%-50px)]">
                <h3 class="text-base font-semibold text-gray-900">
                    Dodaj Projekt
                </h3>
                <p class="text-sm text-gray-500">
                    Dodaj nowego klienta do swojej bazy danych.
                </p>
            </div>
        </div>

        <div
            class="bg-white p-4 rounded-lg flex items-center justify-start gap-4 col-span-12 md:col-span-6 lg:col-span-3 border-[1px] border-gray-200"
        >
            <div
                class="size-14 flex justify-center items-center bg-indigo-100 rounded-lg"
            >
                <i class="fa-solid fa-users text-indigo-700 text-xl"></i>
            </div>
            <div class="flex flex-col gap-1 w-[calc(100%-50px)]">
                <h3 class="text-base font-semibold text-gray-900">
                    Wystaw fakturę
                </h3>
                <p class="text-sm text-gray-500">
                    Dodaj nowego klienta do swojej bazy danych.
                </p>
            </div>
        </div>

        <div
            class="bg-white p-4 rounded-lg flex items-center justify-start gap-4 col-span-12 md:col-span-6 lg:col-span-3 border-[1px] border-gray-200"
        >
            <div
                class="size-14 flex justify-center items-center bg-indigo-100 rounded-lg"
            >
                <i class="fa-solid fa-users text-indigo-700 text-xl"></i>
            </div>
            <div class="flex flex-col gap-1 w-[calc(100%-50px)]">
                <h3 class="text-base font-semibold text-gray-900">
                    Dodaj klienta
                </h3>
                <p class="text-sm text-gray-500">
                    Dodaj nowego klienta do swojej bazy danych.
                </p>
            </div>
        </div>
    </div>
</template>
