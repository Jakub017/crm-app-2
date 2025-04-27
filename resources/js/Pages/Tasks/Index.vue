<template>
    <div class="sm:flex sm:items-center">
        <TopText>
            <template v-slot:title> Zadania </template>
            <template v-slot:description>
                Lista twoich zadań do wykonania.
            </template>
            <template v-slot:action>
                <PrimaryButton
                    class="flex gap-2 items-center justify-center"
                    :type="'Link'"
                    :href="route('task.create')"
                    >Dodaj zadanie <i class="fa-solid fa-plus"></i
                ></PrimaryButton>
            </template>
        </TopText>
    </div>

    <div class="bg-white rounded-xl border-[1px] border-secondary-light p-4">
        <div class="grid grid-cols-12 mb-4">
            <form
                @submit.prevent="search"
                class="col-span-12 lg:col-span-3 relative"
            >
                <button
                    class="text-secondary absolute left-4 top-1/2 -translate-y-1/2"
                    type="submit"
                >
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

                <input
                    class="form-input px-3 py-3 pl-10 bg-secondary-extra-light border-none text-secondary ring:none focus:ring-0"
                    type="text"
                    id="search"
                    placeholder="Szukaj wg. nazwy zadania"
                    v-model="form.query"
                />
            </form>
        </div>
        <div class="">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th
                            scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-secondary sm:pl-4 bg-secondary-extra-light rounded-ss-3xl rounded-es-3xl"
                        >
                            Zadanie
                        </th>
                        <th
                            scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary md:table-cell bg-secondary-extra-light"
                        >
                            Data wykonania
                        </th>
                        <th
                            scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary md:table-cell bg-secondary-extra-light"
                        >
                            Klient
                        </th>
                        <th
                            scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary sm:table-cell bg-secondary-extra-light"
                        >
                            Priorytet
                        </th>
                        <th
                            scope="col"
                            class="relative py-3.5 pl-3 pr-4 sm:pr-0 text-sm font-semibold text-secondary bg-secondary-extra-light rounded-ee-3xl rounded-se-3xl"
                        >
                            Akcje
                            <span class="sr-only">Akcje</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr
                        v-for="task in tasks"
                        :key="task.id"
                        class="border-b border-secondary-light"
                    >
                        <td
                            class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-secondary-dark sm:w-auto sm:max-w-none sm:pl-4"
                        >
                            <div class="flex flex-col gap-3">
                                {{ task.name }}
                                <div class="flex flex-col gap-1 md:hidden">
                                    <span class="text-xs text-secondary"
                                        >Data wykonania</span
                                    >
                                    <span
                                        class="text-sm font-medium text-secondary-dark md:hidden"
                                        >{{ formatDate(task.due_date) }}</span
                                    >
                                </div>

                                <div class="flex flex-col gap-1 md:hidden">
                                    <span class="text-xs text-secondary"
                                        >Klient</span
                                    >
                                    <span
                                        class="text-sm font-medium text-secondary-dark md:hidden"
                                        >{{ task.client }}</span
                                    >
                                </div>
                                <div class="flex flex-col gap-1 sm:hidden">
                                    <span class="text-xs text-secondary"
                                        >Priorytet</span
                                    >
                                    <div
                                        v-if="task.priority === 1"
                                        class="bg-blue-200 text-blue-600 w-20 text-center py-1 px-2 rounded-full"
                                    >
                                        Niski
                                    </div>
                                    <div
                                        v-else-if="task.priority === 2"
                                        class="bg-orange-200 text-orange-600 w-20 text-center py-1 px-2 rounded-full"
                                    >
                                        Średni
                                    </div>
                                    <div
                                        v-else
                                        class="bg-red-200 text-red-600 w-20 text-center py-1 px-2 rounded-full"
                                    >
                                        Wyoski
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-medium text-secondary-dark md:table-cell"
                        >
                            {{ formatDate(task.due_date) }}
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-medium text-secondary-dark md:table-cell"
                        >
                            {{ task.client }}
                        </td>
                        <td
                            class="hidden px-3 py-4 text-sm font-medium text-secondary-dark sm:table-cell"
                        >
                            <div
                                v-if="task.priority === 1"
                                class="bg-blue-200 text-blue-600 w-20 text-center py-1 px-2 rounded-full"
                            >
                                Niski
                            </div>
                            <div
                                v-else-if="task.priority === 2"
                                class="bg-orange-200 text-orange-600 w-20 text-center py-1 px-2 rounded-full"
                            >
                                Średni
                            </div>
                            <div
                                v-else
                                class="bg-red-200 text-red-600 w-20 text-center py-1 px-2 rounded-full"
                            >
                                Wyoski
                            </div>
                        </td>
                        <td
                            class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                        >
                            <div class="flex justify-center items-center gap-2">
                                <Link
                                    v-if="task.status === 0"
                                    :href="route('task.check', task.id)"
                                    method="PUT"
                                    class="text-green-600 duration-200 hover:text-green-700"
                                    ><i
                                        class="fa-solid fa-circle-check text-lg md:text-base"
                                    ></i
                                ></Link>
                                <Link
                                    v-if="task.status === 1"
                                    :href="route('task.uncheck', task.id)"
                                    method="PATCH"
                                    class="text-orange-600 duration-200 hover:text-orange-700"
                                    ><i
                                        class="fa-solid fa-circle-check text-lg md:text-base"
                                    ></i
                                ></Link>

                                <Link
                                    v-if="task.status === 0"
                                    :href="route('task.edit', task.id)"
                                    class="text-primary duration-200 hover:primary-dark"
                                    ><i
                                        class="fa-solid fa-pen text-lg md:text-base"
                                    ></i
                                ></Link>
                                <Link
                                    :href="route('task.destroy', task.id)"
                                    method="DELETE"
                                    class="text-red-500 duration-200 hover:text-red-600"
                                    ><i
                                        class="fa-solid fa-trash text-lg md:text-base"
                                    ></i
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
    status: 0,
});

function formatDate(date) {
    return format(date, "dd.MM.yyyy");
}

const search = () =>
    form.post(route("task.search", { query: form.query, status: form.status }));
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
