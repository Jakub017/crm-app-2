<template>
    <TopText>
        <template v-slot:title> Dodaj klienta </template>
        <template v-slot:description>
            Dodaj nowego klienta do swojej bazy danych.
        </template>
    </TopText>
    <div class="bg-white rounded-lg p-4">
        <form @submit.prevent="store">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <h3 class="text-base font-semibold text-gray-900">
                        Dane firmy
                    </h3>
                </div>
                <div class="col-span-4">
                    <label for="company" class="form-label">Nazwa firmy</label>
                    <input
                        id="company"
                        class="form-input"
                        type="text"
                        v-model="form.company"
                    />
                    <span class="form-error" v-if="form.errors.company">{{
                        form.errors.company
                    }}</span>
                </div>
                <div class="col-span-4">
                    <label for="nip" class="form-label">NIP</label>
                    <input
                        id="nip"
                        class="form-input"
                        type="text"
                        v-model="form.nip"
                    />
                    <span class="form-error" v-if="form.errors.nip">{{
                        form.errors.nip
                    }}</span>
                </div>
                <div class="col-span-4">
                    <label for="type" class="form-label"
                        >Rodzaj działalności</label
                    >
                    <input
                        id="type"
                        class="form-input"
                        type="text"
                        v-model="form.type"
                    />
                    <span class="form-error" v-if="form.errors.type">{{
                        form.errors.type
                    }}</span>
                </div>

                <div class="col-span-3">
                    <label for="country" class="form-label">Kraj</label>
                    <input
                        id="country"
                        class="form-input"
                        type="text"
                        v-model="form.country"
                    />
                    <span class="form-error" v-if="form.errors.country">{{
                        form.errors.country
                    }}</span>
                </div>
                <div class="col-span-3">
                    <label for="street" class="form-label">Ulica</label>
                    <input
                        id="street"
                        class="form-input"
                        type="text"
                        v-model="form.street"
                    />
                    <span class="form-error" v-if="form.errors.street">{{
                        form.errors.street
                    }}</span>
                </div>
                <div class="col-span-3">
                    <label for="city" class="form-label">Miasto</label>
                    <input
                        id="city"
                        class="form-input"
                        type="text"
                        v-model="form.city"
                    />
                    <span class="form-error" v-if="form.errors.city">{{
                        form.errors.city
                    }}</span>
                </div>
                <div class="col-span-3">
                    <label for="zip_code" class="form-label"
                        >Kod pocztowy</label
                    >
                    <input
                        id="zip_code"
                        class="form-input"
                        type="text"
                        v-model="form.zip_code"
                    />
                    <span class="form-error" v-if="form.errors.zip_code">{{
                        form.errors.zip_code
                    }}</span>
                </div>

                <div class="col-span-12 mt-4">
                    <h3 class="text-base font-semibold text-gray-900">
                        Dane kontaktowe
                    </h3>
                </div>
                <div class="col-span-4">
                    <label for="person" class="form-label"
                        >Osoba kontaktowa</label
                    >
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
                <div class="col-span-4">
                    <label for="email" class="form-label">Adres email</label>
                    <input
                        id="email"
                        class="form-input"
                        type="text"
                        v-model="form.email"
                    />
                    <span class="form-error" v-if="form.errors.email">{{
                        form.errors.email
                    }}</span>
                </div>
                <div class="col-span-4">
                    <label for="phone" class="form-label">Numer telefonu</label>
                    <input
                        id="phone"
                        class="form-input"
                        type="text"
                        v-model="form.phone"
                    />
                    <span class="form-error" v-if="form.errors.phone">{{
                        form.errors.phone
                    }}</span>
                </div>

                <div class="col-span-12">
                    <label for="note" class="form-label">Notatka</label>
                    <textarea
                        class="form-input resize-none"
                        rows="5"
                        id="note"
                        v-model="form.note"
                    ></textarea>
                    <span class="form-error" v-if="form.errors.note">{{
                        form.errors.note
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

const form = useForm({
    company: "",
    nip: "",
    type: "",
    country: "",
    street: "",
    city: "",
    zip_code: "",
    person: "",
    email: "",
    phone: "",
    note: "",
});

const store = () => form.post(route("client.store"));
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
