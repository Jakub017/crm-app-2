<template>
    <div class="sm:flex sm:items-center">
        <TopText>
            <template v-slot:title> Faktury </template>
            <template v-slot:description>
                Lista wszystkich faktur wystawionych za wykonane zadania.
            </template>
            <template v-slot:action>
                <PrimaryButton
                    class="flex gap-2 items-center justify-center"
                    :type="'Link'"
                    :href="route('invoice.create')"
                    >Nowa faktura <i class="fa-solid fa-plus"></i
                ></PrimaryButton>
            </template>
        </TopText>
    </div>

    <div class="bg-white rounded-xl border-[1px] border-secondary-light p-4">
        <div class="grid grid-cols-12 mb-4">
            <form class="col-span-12 lg:col-span-3 relative">
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
                    placeholder="Szukaj wg. nazwy firmy"
                />
            </form>
        </div>
        <div class="flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
                >
                    <div class="relative">
                        <table class="min-w-full rounded-full">
                            <thead>
                                <tr>
                                    <th
                                        scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-secondary sm:pl-4 bg-secondary-extra-light rounded-ss-3xl rounded-es-3xl"
                                    >
                                        Numer ref.
                                    </th>
                                    <th
                                        scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary md:table-cell bg-secondary-extra-light"
                                    >
                                        Odbiorca
                                    </th>
                                    <th
                                        scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary md:table-cell bg-secondary-extra-light"
                                    >
                                        Kwota brutto
                                    </th>
                                    <th
                                        scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary lg:table-cell bg-secondary-extra-light"
                                    >
                                        Status
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
                                    v-for="invoice in invoices"
                                    :key="invoice.id"
                                    class="border-b border-secondary-light"
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
                                        class="hidden px-3 py-4 text-sm font-medium text-secondary-dark lg:table-cell"
                                    >
                                        <div
                                            v-if="invoice.status === 'issued'"
                                            class="bg-blue-200 text-blue-600 w-fit text-center py-1 px-2 rounded-full"
                                        >
                                            Wystawiona
                                        </div>
                                        <div
                                            v-if="invoice.status === 'paid'"
                                            class="bg-green-200 text-green-600 w-fit text-center py-1 px-2 rounded-full"
                                        >
                                            Wystawiona
                                        </div>
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
