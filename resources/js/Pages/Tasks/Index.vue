<template>
    <div class="sm:flex sm:items-center">
        <TopText>
            <template v-slot:title> Zadania </template>
            <template v-slot:description>
                Lista twoich zadań do wykonania.
            </template>
            <template v-slot:action>
                <PrimaryButton :type="'Link'" :href="route('client.create')"
                    >Dodaj klienta</PrimaryButton
                >
            </template>
        </TopText>
    </div>
    <div
        class="grid grid-cols-12 gap-4 bg-white rounded-lg px-4 mb-4 p-4 border-[1px] border-gray-200"
    >
        <form @submit.prevent="search" class="col-span-3 relative">
            <button
                class="text-gray-400 absolute left-2 top-1/2 -translate-y-1/2"
                type="submit"
            >
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>

            <input
                class="form-input pl-8"
                type="text"
                id="search"
                placeholder="Szukaj..."
                v-model="form.query"
            />
        </form>
    </div>
    <div class="bg-white rounded-lg px-4 border-[1px] border-gray-200">
        <div class="">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                        <th
                            scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-500 sm:pl-0"
                        >
                            Nazwa
                        </th>
                        <th
                            scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-500 lg:table-cell"
                        >
                            Data wykonania
                        </th>
                        <th
                            scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-500 sm:table-cell"
                        >
                            Klient
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-500"
                        >
                            Priorytet
                        </th>
                        <th
                            scope="col"
                            class="relative py-3.5 pl-3 pr-4 sm:pr-0"
                        >
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                        <td
                            class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:w-auto sm:max-w-none sm:pl-0"
                        >
                            Zmiany na stronie
                            <dl class="font-normal lg:hidden">
                                <dt class="sr-only">Title</dt>
                                <dd class="mt-1 truncate text-gray-900">
                                    20.03.2025
                                </dd>
                                <dt class="sr-only sm:hidden">Email</dt>
                                <dd
                                    class="mt-1 truncate font-semibold text-gray-900 sm:hidden"
                                >
                                    Igum
                                </dd>
                            </dl>
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-semibold text-gray-900 lg:table-cell"
                        >
                            20.03.2025
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-semibold text-gray-900 sm:table-cell"
                        >
                            Igum
                        </td>
                        <td
                            class="px-3 py-4 text-sm font-semibold text-gray-900"
                        >
                            <div
                                class="bg-red-200 text-red-600 w-fit py-1 px-2 rounded-md"
                            >
                                Wysoki
                            </div>
                        </td>
                        <td
                            class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                        >
                            <a
                                href="#"
                                class="text-indigo-600 hover:text-indigo-900"
                                >Edit<span class="sr-only"
                                    >, Lindsay Walton</span
                                ></a
                            >
                        </td>
                    </tr>

                    <tr>
                        <td
                            class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:w-auto sm:max-w-none sm:pl-0"
                        >
                            Wyczyszczenie serwera
                            <dl class="font-normal lg:hidden">
                                <dt class="sr-only">Title</dt>
                                <dd class="mt-1 truncate text-gray-900">
                                    21.03.2025
                                </dd>
                                <dt class="sr-only sm:hidden">Email</dt>
                                <dd
                                    class="mt-1 truncate font-semibold text-gray-900 sm:hidden"
                                >
                                    Olza
                                </dd>
                            </dl>
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-semibold text-gray-900 lg:table-cell"
                        >
                            21.03.2025
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-semibold text-gray-900 sm:table-cell"
                        >
                            Olza
                        </td>
                        <td
                            class="px-3 py-4 text-sm font-semibold text-gray-900"
                        >
                            <div
                                class="bg-blue-200 text-blue-600 w-fit py-1 px-2 rounded-md"
                            >
                                Niski
                            </div>
                        </td>
                        <td
                            class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                        >
                            <a
                                href="#"
                                class="text-indigo-600 hover:text-indigo-900"
                                >Edit<span class="sr-only"
                                    >, Lindsay Walton</span
                                ></a
                            >
                        </td>
                    </tr>

                    <tr>
                        <td
                            class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:w-auto sm:max-w-none sm:pl-0"
                        >
                            Naprawa skrzynki mailowej
                            <dl class="font-normal lg:hidden">
                                <dt class="sr-only">Title</dt>
                                <dd class="mt-1 truncate text-gray-900">
                                    20.03.2025
                                </dd>
                                <dt class="sr-only sm:hidden">Email</dt>
                                <dd
                                    class="mt-1 truncate font-semibold text-gray-900 sm:hidden"
                                >
                                    Digitalowa
                                </dd>
                            </dl>
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-semibold text-gray-900 lg:table-cell"
                        >
                            24.03.2025
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-semibold text-gray-900 sm:table-cell"
                        >
                            Digitalowa
                        </td>
                        <td
                            class="px-3 py-4 text-sm font-semibold text-gray-900"
                        >
                            <div
                                class="bg-orange-200 text-orange-600 w-fit py-1 px-2 rounded-md"
                            >
                                Średni
                            </div>
                        </td>
                        <td
                            class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                        >
                            <div class="flex justify-end items-center gap-2">
                                <Link
                                    class="text-indigo-600 hover:text-indigo-700"
                                    ><i
                                        class="fa-solid fa-circle-check text-base"
                                    ></i
                                ></Link>
                                <Link
                                    class="text-indigo-600 hover:text-indigo-700"
                                    ><i class="fa-solid fa-pen text-base"></i
                                ></Link>
                                <Link class="text-red-600 hover:text-red-700"
                                    ><i class="fa-solid fa-trash text-base"></i
                                ></Link>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TopText from "@/Components/TopText.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    tasks: Array,
});

const form = useForm({
    query: "",
});

const search = () => form.post(route("task.search", { query: form.query }));
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
