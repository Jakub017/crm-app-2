<template>
    <TopText>
        <template v-slot:title> Dodaj zadanie </template>
        <template v-slot:description>
            Dodaj nowe zadanie i przypisz je do odpowiedniego klienta.
        </template>
    </TopText>
    <div class="bg-white rounded-lg p-4">
        <form @submit.prevent="store">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <h3 class="text-base font-semibold text-gray-900">
                        Informacje o zadaniu
                    </h3>
                </div>
                <div class="col-span-12">
                    <label for="name" class="form-label">Nazwa</label>
                    <input
                        id="name"
                        class="form-input"
                        type="text"
                        v-model="form.name"
                    />
                    <span class="form-error" v-if="form.errors.name">{{
                        form.errors.name
                    }}</span>
                </div>
                <div class="col-span-12">
                    <label for="description" class="form-label">Opis</label>
                    <textarea
                        class="form-input resize-none"
                        rows="5"
                        id="description"
                        v-model="form.description"
                    ></textarea>
                    <span class="form-error" v-if="form.errors.description">{{
                        form.errors.description
                    }}</span>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <label for="client_id" class="form-label">Klient</label>
                    <select
                        id="client_id"
                        v-model="form.client_id"
                        class="form-input"
                        type="text"
                    >
                        <option value="">Wybierz klienta</option>
                        <option
                            v-for="client in clients"
                            :key="client.id"
                            :value="client.id"
                        >
                            {{ client.company }}
                        </option>
                    </select>
                    <span class="form-error" v-if="form.errors.client_id">{{
                        form.errors.client_id
                    }}</span>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <label for="priority" class="form-label">Priorytet</label>
                    <select
                        id="priority"
                        class="form-input"
                        type="text"
                        v-model="form.priority"
                    >
                        <option value="">Wybierz priorytet</option>
                        <option value="1">Niski</option>
                        <option value="2">Średni</option>
                        <option value="3">Wysoki</option>
                    </select>
                    <span class="form-error" v-if="form.errors.priority">{{
                        form.errors.priority
                    }}</span>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <label for="due_date" class="form-label"
                        >Data wykonania</label
                    >
                    <input
                        id="due_date"
                        class="form-input"
                        type="date"
                        v-model="form.due_date"
                    />
                    <span class="form-error" v-if="form.errors.due_date">{{
                        form.errors.due_date
                    }}</span>
                </div>
                <div class="col-span-12">
                    <PrimaryButton :type="'button'">Dodaj</PrimaryButton>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TopText from "@/Components/TopText.vue";
import { useForm } from "@inertiajs/vue3";

defineProps({
    clients: Array,
});

const form = useForm({
    name: "",
    description: "",
    client_id: "",
    priority: "",
    due_date: "",
});

const store = () => form.post(route("task.store"));
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
