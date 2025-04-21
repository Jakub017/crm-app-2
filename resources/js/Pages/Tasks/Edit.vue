<template>
    <TopText>
        <template v-slot:title>
            Edytuj zadanie:
            <span class="font-bold text-primary">{{ task.name }}</span>
        </template>
        <template v-slot:description> Edytuj istniejące zadanie. </template>
    </TopText>
    <div class="bg-white rounded-lg p-4 border border-secondary-light">
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
                        class="form-input resize-none !rounded-xl"
                        rows="5"
                        id="description"
                        v-model="form.description"
                    ></textarea>
                    <span class="form-error" v-if="form.errors.description">{{
                        form.errors.description
                    }}</span>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <label for="client" class="form-label">Klient</label>
                    <select
                        id="client"
                        v-model="form.client"
                        class="form-input"
                        type="text"
                    >
                        <option value="">Wybierz klienta</option>
                        <option
                            v-for="client in clients"
                            :key="client.id"
                            :value="client.name"
                        >
                            {{ client.name }}
                        </option>
                    </select>
                    <span class="form-error" v-if="form.errors.client">{{
                        form.errors.client
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
                    <PrimaryButton :type="'button'"
                        >Dodaj zadanie</PrimaryButton
                    >
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TopText from "@/Components/TopText.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    clients: Array,
    task: Object,
});

const form = useForm({
    name: props.task.name,
    description: props.task.description,
    client: props.task.client,
    priority: props.task.priority,
    due_date: props.task.due_date,
});

const store = () => form.put(route("task.update", props.task.id));
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
