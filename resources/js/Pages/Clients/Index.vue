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
        class="grid grid-cols-12 gap-4 bg-white rounded-lg px-4 mb-4 p-4 border-[1px] border-secondary-light"
    >
        <form
            @submit.prevent="search"
            class="col-span-12 lg:col-span-3 relative"
        >
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
                placeholder="Szukaj wg. nazwy firmy"
                v-model="form.name"
            />
        </form>
    </div>
    <div class="bg-white rounded-lg px-4 border-[1px] border-secondary-ligh">
        <div class="flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 pb-2">
                <div
                    class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
                >
                    <div class="relative">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th
                                        scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-secondary sm:pl-4"
                                    >
                                        Firma
                                    </th>
                                    <th
                                        scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary md:table-cell"
                                    >
                                        NIP
                                    </th>
                                    <th
                                        scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary md:table-cell"
                                    >
                                        Adres email
                                    </th>
                                    <th
                                        scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary lg:table-cell"
                                    >
                                        Numer telefonu
                                    </th>
                                    <th
                                        scope="col"
                                        class="relative py-3.5 pl-3 pr-4 sm:pr-0 text-sm font-semibold text-secondary"
                                    >
                                        Akcje
                                        <span class="sr-only">Akcje</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="client in clients" :key="client.id">
                                    <td
                                        class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-secondary-dark sm:w-auto sm:max-w-none sm:pl-4"
                                    >
                                        <div
                                            class="flex flex-col gap-3 md:gap-1"
                                        >
                                            {{ client.name }}

                                            <div
                                                class="flex flex-col gap-1 md:hidden"
                                            >
                                                <span
                                                    class="text-xs text-secondary"
                                                    >NIP</span
                                                >
                                                <span
                                                    class="text-sm font-medium text-secondary-dark md:hidden"
                                                    >{{ client.tax_no }}</span
                                                >
                                            </div>
                                            <div
                                                class="flex flex-col gap-1 sm:hidden"
                                            >
                                                <span
                                                    class="text-xs text-secondary"
                                                    >Adres email</span
                                                >
                                                <span
                                                    class="text-sm font-medium text-secondary-dark md:hidden"
                                                    >{{ client.email }}</span
                                                >
                                            </div>
                                            <div
                                                class="flex flex-col gap-1 md:hidden"
                                            >
                                                <span
                                                    class="text-xs text-secondary"
                                                    >Numer telefonu</span
                                                >
                                                <span
                                                    class="text-sm truncate font-medium text-secondary-dark md:hidden"
                                                    >{{ client.phone }}</span
                                                >
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="hidden px-3 py-4 text-sm font-medium text-secondary-dark md:table-cell"
                                    >
                                        {{ client.tax_no }}
                                    </td>
                                    <td
                                        class="hidden px-3 py-4 text-sm font-medium text-secondary-dark md:table-cell"
                                    >
                                        {{ client.email }}
                                    </td>
                                    <td
                                        class="hidden px-3 py-4 text-sm font-medium text-secondary-dark lg:table-cell"
                                    >
                                        {{ client.phone }}
                                    </td>
                                    <td
                                        class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                                    >
                                        <div
                                            class="flex justify-center items-center gap-2"
                                        >
                                            <Link
                                                :href="
                                                    route(
                                                        'client.show',
                                                        client.id
                                                    )
                                                "
                                                class="text-primary duration-200 hover:primary-dark"
                                                ><i
                                                    class="fa-solid fa-eye text-lg md:text-base"
                                                ></i
                                            ></Link>
                                            <Link
                                                :href="
                                                    route(
                                                        'client.edit',
                                                        client.id
                                                    )
                                                "
                                                class="text-primary duration-200 hover:primary-dark"
                                                ><i
                                                    class="fa-solid fa-pen text-lg md:text-base"
                                                ></i
                                            ></Link>
                                            <Link
                                                :href="
                                                    route(
                                                        'client.destroy',
                                                        client.id
                                                    )
                                                "
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
    name: "",
});

const search = () => form.post(route("client.search"));
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
