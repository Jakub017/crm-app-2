<template>
    <TopText>
        <template v-slot:title> Wystaw fakturę </template>
        <template v-slot:description>
            Wystaw nową fakturę dla swojego klienta.
        </template>
    </TopText>
    <div class="bg-white rounded-lg p-4">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <h3 class="text-base font-semibold text-gray-900">
                    Wybór klienta
                </h3>
                <div class="col-span-12 md:col-span-6 lg:col-span-3">
                    <label for="client_id" class="form-label">Klient</label>
                    <select
                        id="client_id"
                        class="form-input"
                        type="text"
                        v-model="form.client_id"
                    >
                        <option value="">Wybierz zadanie</option>
                        <option
                            v-for="client in clients"
                            :key="client.id"
                            :value="client.id"
                        >
                            {{ client.company }}
                        </option>
                    </select>
                    <span class="form-error" v-if="form.errors.task_id">{{
                        form.errors.task_id
                    }}</span>
                </div>
            </div>
            <div class="col-span-12 mt-4">
                <h3 class="text-base font-semibold text-gray-900">
                    Dane klienta
                </h3>
            </div>
            <div class="col-span-12 mt-4">
                <h3 class="text-base font-semibold text-gray-900">
                    Pozycje na fakturze
                </h3>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3">
                <label for="company" class="form-label">Usługa</label>
                <select
                    id="task_id"
                    class="form-input"
                    type="text"
                    v-model="form.task_id"
                >
                    <option value="">Wybierz zadanie</option>
                    <option
                        v-for="task in tasks"
                        :key="task.id"
                        :value="task.id"
                    >
                        {{ task.name }}
                    </option>
                </select>
                <span class="form-error" v-if="form.errors.task_id">{{
                    form.errors.task_id
                }}</span>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3">
                <label for="person" class="form-label">Kwota netto</label>
                <input
                    id="person"
                    class="form-input"
                    type="text"
                    v-model="form.person"
                />
                <span class="form-error" v-if="form.errors.person">{{
                    form.errors.person
                }}</span>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3">
                <label for="person" class="form-label">Podatek VAT</label>
                <select
                    id="tax_rate"
                    class="form-input"
                    type="text"
                    v-model="form.tax_rate"
                >
                    <option value="">Wybierz stawkę</option>
                    <option value="5">5%</option>
                    <option value="8">8%</option>
                    <option value="23">23%</option>
                </select>
                <span class="form-error" v-if="form.errors.person">{{
                    form.errors.person
                }}</span>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3">
                <label for="gross_amount" class="form-label"
                    >Kwota brutto</label
                >
                <input
                    id="gross_amount"
                    class="form-input"
                    type="text"
                    v-model="form.gross_amount"
                    disabled
                />
                <span class="form-error" v-if="form.errors.gross_amount">{{
                    form.errors.gross_amount
                }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TopText from "@/Components/TopText.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    tasks: Array,
});

const form = useForm({
    task_id: "",
});
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
