<template>
    <div class="sm:flex sm:items-center">
        <TopText>
            <template v-slot:title> Faktury </template>
            <template v-slot:description>
                Lista wszystkich faktur wystawionych za wykonane zadania.
            </template>
            <template v-slot:action>
                <PrimaryButton :type="'Link'" :href="route('invoice.create')"
                    >Wystaw fakturę</PrimaryButton
                >
            </template>
        </TopText>
    </div>
    <div
        class="grid grid-cols-12 gap-4 bg-white rounded-lg px-4 mb-4 p-4 border-[1px] border-secondary-light"
    ></div>
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
                                        Numer ref.
                                    </th>
                                    <th
                                        scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary md:table-cell"
                                    >
                                        Odbiorca
                                    </th>
                                    <th
                                        scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary md:table-cell"
                                    >
                                        Kwota brutto
                                    </th>
                                    <th
                                        scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary lg:table-cell"
                                    >
                                        Status
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
                                <tr
                                    v-for="invoice in invoices"
                                    :key="invoice.id"
                                    class="even:bg-gray-50"
                                >
                                    <td
                                        class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-secondary-dark sm:w-auto sm:max-w-none sm:pl-4"
                                    >
                                        {{ invoice.number }}
                                    </td>
                                    <td
                                        v-if="invoice.recipient_company"
                                        class="hidden px-3 py-4 text-sm font-medium text-secondary-dark md:table-cell"
                                    >
                                        {{ invoice.recipient_company }}
                                    </td>
                                    <td
                                        v-if="
                                            invoice.buyer_name &&
                                            !invoice.recipient_company
                                        "
                                        class="hidden px-3 py-4 text-sm font-medium text-secondary-dark md:table-cell"
                                    >
                                        {{ invoice.buyer_name }}
                                    </td>
                                    <td
                                        class="hidden px-3 py-4 text-sm font-medium text-secondary-dark md:table-cell"
                                    >
                                        {{ invoice.price_gross }}
                                        {{ invoice.currency }}
                                    </td>
                                    <td
                                        v-if="invoice.status === 'issued'"
                                        class="hidden px-3 py-4 text-sm font-medium text-secondary-dark lg:table-cell"
                                    >
                                        Wystawiona
                                    </td>
                                    <td
                                        v-if="invoice.status === 'paid'"
                                        class="hidden px-3 py-4 text-sm font-medium text-secondary-dark lg:table-cell"
                                    >
                                        Opłacona
                                    </td>
                                    <td
                                        class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                                    >
                                        <div
                                            class="flex justify-center items-center gap-2"
                                        >
                                            <Link
                                                href="#"
                                                class="text-primary duration-200 hover:primary-dark"
                                                ><i
                                                    class="fa-solid fa-eye text-lg md:text-base"
                                                ></i
                                            ></Link>
                                            <Link
                                                href="#"
                                                class="text-primary duration-200 hover:primary-dark"
                                                ><i
                                                    class="fa-solid fa-pen text-lg md:text-base"
                                                ></i
                                            ></Link>
                                            <Link
                                                href="#"
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
    invoices: Array,
});
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
