<template>
    <div class="sm:flex sm:items-center">
        <TopText>
            <template v-slot:title> Klienci </template>
            <template v-slot:description>
                Lista wszystkich klientów wraz z ich imieniem i nazwiskiem,
                firmą i adresem email.
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
        <div class="flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
                >
                    <div class="relative">
                        <table
                            class="min-w-full table-fixed divide-y divide-gray-300"
                        >
                            <thead>
                                <tr>
                                    <th
                                        scope="col"
                                        class="relative px-7 sm:w-12 sm:px-6"
                                    >
                                        <input
                                            type="checkbox"
                                            class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                        />
                                    </th>
                                    <th
                                        scope="col"
                                        class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-500"
                                    >
                                        Firma
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-500"
                                    >
                                        Osoba kontaktowa
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-500"
                                    >
                                        Email
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-500"
                                    >
                                        Kraj
                                    </th>
                                    <th
                                        scope="col"
                                        class="relative py-3.5 pl-3 pr-4 sm:pr-3"
                                    >
                                        <span class="sr-only">Edytuj</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="client in clients" :key="client.id">
                                    <td class="relative px-7 sm:w-12 sm:px-6">
                                        <!-- Selected row marker, only show when row is selected. -->
                                        <!-- <div class="absolute inset-y-0 left-0 w-0.5 bg-indigo-600"></div> -->

                                        <input
                                            type="checkbox"
                                            class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                        />
                                    </td>
                                    <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                    <td
                                        class="whitespace-nowrap py-4 pr-3 text-sm font-semibold text-gray-900"
                                    >
                                        <p>{{ client.company }}</p>
                                        <span
                                            class="text-gray-500 text-xs font-medium"
                                            >{{ client.type }}
                                        </span>
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-3 py-4 text-sm font-semibold text-gray-900"
                                    >
                                        {{ client.person }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-3 py-4 text-sm font-semibold text-gray-900"
                                    >
                                        <a
                                            class="hover:underline"
                                            v-bind:href="
                                                'mailto:' + client.email
                                            "
                                            >{{ client.email }}</a
                                        >
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-3 py-4 text-sm font-semibold text-gray-900"
                                    >
                                        {{ client.country }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap py-4 pl-3 pr-4 font-semibold text-right text-sm sm:pr-3"
                                    >
                                        <div class="flex items-center gap-2">
                                            <Link
                                                :href="
                                                    route(
                                                        'client.show',
                                                        client.id
                                                    )
                                                "
                                                class="text-indigo-600"
                                                ><i class="fa-solid fa-eye"></i
                                            ></Link>

                                            <Link
                                                :href="
                                                    route(
                                                        'client.edit',
                                                        client.id
                                                    )
                                                "
                                                class="text-indigo-600"
                                                ><i class="fa-solid fa-pen"></i
                                            ></Link>
                                            <Link
                                                :href="
                                                    route(
                                                        'client.destroy',
                                                        client.id
                                                    )
                                                "
                                                method="DELETE"
                                                class="text-red-600"
                                                ><i
                                                    class="fa-solid fa-trash"
                                                ></i
                                            ></Link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TopText from "@/Components/TopText.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    clients: Array,
});

const form = useForm({
    query: "",
});

const search = () => form.post(route("client.search", { query: form.query }));
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
