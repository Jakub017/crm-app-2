<template>
    <div class="sm:flex sm:items-center">
        <TopText>
            <template v-slot:title> Zadania </template>
            <template v-slot:description>
                Lista twoich zadań do wykonania.
            </template>
            <template v-slot:action>
                <PrimaryButton :type="'Link'" :href="route('task.create')"
                    >Dodaj zadanie</PrimaryButton
                >
            </template>
        </TopText>
    </div>
    <div
        class="grid grid-cols-12 gap-4 bg-white rounded-lg px-4 mb-4 p-4 border-[1px] border-secondary-light"
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
    <div
        class="bg-white rounded-lg px-4 border-[1px] border-secondary-light pb-2"
    >
        <div class="">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                        <th
                            scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-secondary sm:pl-4"
                        >
                            Nazwa
                        </th>
                        <th
                            scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary lg:table-cell"
                        >
                            Data wykonania
                        </th>
                        <th
                            scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary sm:table-cell"
                        >
                            Klient
                        </th>
                        <th
                            scope="col"
                            class="px-3 py-3.5 text-left text-sm font-semibold text-secondary"
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
                    <tr
                        v-for="task in tasks"
                        :key="task.id"
                        class="even:bg-gray-50"
                    >
                        <td
                            class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-secondary-dark sm:w-auto sm:max-w-none sm:pl-4"
                        >
                            {{ task.name }}
                            <dl class="font-normal lg:hidden">
                                <dt class="sr-only">Title</dt>
                                <dd class="mt-1 truncate text-secondary-dark">
                                    {{ formatDate(task.due_date) }}
                                </dd>
                                <dt class="sr-only sm:hidden">Email</dt>
                                <dd
                                    class="mt-1 truncate font-medium text-secondary-dark sm:hidden"
                                ></dd>
                            </dl>
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-medium text-secondary-dark lg:table-cell"
                        >
                            {{ formatDate(task.due_date) }}
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-medium text-secondary-dark sm:table-cell"
                        >
                            {{ task.client.company }}
                        </td>
                        <td
                            class="px-3 py-4 text-sm font-medium text-secondary-dark"
                        >
                            <div
                                v-if="task.priority === 1"
                                class="bg-blue-200 text-blue-600 w-20 text-center py-1 px-2 rounded-md"
                            >
                                Niski
                            </div>
                            <div
                                v-else-if="task.priority === 2"
                                class="bg-orange-200 text-orange-600 w-20 text-center py-1 px-2 rounded-md"
                            >
                                Średni
                            </div>
                            <div
                                v-else
                                class="bg-red-200 text-red-600 w-20 text-center py-1 px-2 rounded-md"
                            >
                                Wyoski
                            </div>
                        </td>
                        <td
                            class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                        >
                            <div class="flex items-center gap-2">
                                <Link
                                    :href="route('task.check', task.id)"
                                    method="PUT"
                                    class="text-primary duration-200 hover:primary-dark"
                                    ><i class="fa-solid fa-circle-check"></i
                                ></Link>
                                <Link
                                    :href="route('task.edit', task.id)"
                                    class="text-primary duration-200 hover:primary-dark"
                                    ><i class="fa-solid fa-pen"></i
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
import { format } from "date-fns";

const props = defineProps({
    tasks: Array,
});

const form = useForm({
    query: "",
});

function formatDate(date) {
    return format(date, "dd.MM.yyyy");
}

const search = () => form.post(route("task.search", { query: form.query }));
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
