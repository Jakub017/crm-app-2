<template>
    <TopText>
        <template v-slot:title> Dodaj klienta </template>
        <template v-slot:description>
            Dodaj nowego klienta do swojej bazy danych.
        </template>
    </TopText>
    <div class="bg-white rounded-lg p-4 border border-secondary-light">
        <form @submit.prevent="store">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <h3 class="text-base font-semibold text-gray-900">
                        Dane firmy
                    </h3>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <label for="name" class="form-label">Nazwa firmy *</label>
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
                <div class="col-span-12 md:col-span-4">
                    <label for="tax_no" class="form-label">NIP</label>
                    <input
                        id="tax_no"
                        class="form-input"
                        type="text"
                        v-model="form.tax_no"
                    />
                    <span class="form-error" v-if="form.errors.tax_no">{{
                        form.errors.tax_no
                    }}</span>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <label for="register_number" class="form-label"
                        >Numer REGON</label
                    >
                    <input
                        id="register_number"
                        class="form-input"
                        type="text"
                        v-model="form.register_number"
                    />
                    <span
                        class="form-error"
                        v-if="form.errors.register_number"
                        >{{ form.errors.register_number }}</span
                    >
                </div>

                <div class="col-span-12 md:col-span-4">
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
                <div class="col-span-12 md:col-span-4">
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
                <div class="col-span-12 md:col-span-4">
                    <label for="post_code" class="form-label"
                        >Kod pocztowy</label
                    >
                    <input
                        id="post_code"
                        class="form-input"
                        type="text"
                        v-model="form.post_code"
                    />
                    <span class="form-error" v-if="form.errors.post_code">{{
                        form.errors.post_code
                    }}</span>
                </div>

                <div class="col-span-12 md:col-span-6">
                    <label for="bank" class="form-label">Nazwa banku</label>
                    <input
                        id="bank"
                        class="form-input"
                        type="text"
                        v-model="form.bank"
                    />
                    <span class="form-error" v-if="form.errors.bank">{{
                        form.errors.bank
                    }}</span>
                </div>

                <div class="col-span-12 md:col-span-6">
                    <label for="bank_account" class="form-label"
                        >Numer konta bankowego</label
                    >
                    <input
                        id="bank_account"
                        class="form-input"
                        type="text"
                        v-model="form.bank_account"
                    />
                    <span class="form-error" v-if="form.errors.bank_account">{{
                        form.errors.bank_account
                    }}</span>
                </div>

                <div class="col-span-12 mt-4">
                    <h3 class="text-base font-semibold text-gray-900">
                        Dane kontaktowe
                    </h3>
                </div>

                <div class="col-span-12 md:col-span-4">
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
                <div class="col-span-12 md:col-span-4">
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
                <div class="col-span-12 md:col-span-4">
                    <label for="www" class="form-label"
                        >Strona internetowa</label
                    >
                    <input
                        id="www"
                        class="form-input"
                        type="text"
                        v-model="form.www"
                    />
                    <span class="form-error" v-if="form.errors.www">{{
                        form.errors.www
                    }}</span>
                </div>

                <div class="col-span-12">
                    <label for="note" class="form-label">Notatka</label>
                    <textarea
                        class="form-input resize-none !rounded-xl"
                        rows="5"
                        id="note"
                        v-model="form.note"
                    ></textarea>
                    <span class="form-error" v-if="form.errors.note">{{
                        form.errors.note
                    }}</span>
                </div>

                <div class="col-span-12">
                    <PrimaryButton :type="'button'"
                        >Dodaj klienta</PrimaryButton
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

const form = useForm({
    name: "",
    tax_no: "",
    register_number: "",
    street: "",
    city: "",
    post_code: "",
    bank: "",
    bank_account: "",
    email: "",
    phone: "",
    www: "",
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
