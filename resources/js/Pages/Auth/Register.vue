<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />

    <div class="font-sans flex h-screen p-4">
        <div class="hidden md:flex h-full w-1/2">
            <div class="h-full w-full rounded-md bg-primary-light"></div>
        </div>

        <div
            class="flex justify-center flex-col items-center w-full md:w-1/2 gap-4"
        >
            <form
                @submit.prevent="submit"
                class="grid grid-cols-12 gap-8 w-full max-w-[600px] p-4"
            >
                <div class="col-span-12 flex flex-col gap-2">
                    <h1 class="text-xl font-semibold">Zarejestruj się</h1>
                    <p class="text-sm text-secondary-dark font-normal w-full">
                        Załóż konto, aby wystawiać faktury, zarządzać zadaniami
                        i klientami w jednym miejscu.
                    </p>
                </div>

                <div class="gap-4 grid grid-cols-12 col-span-12">
                    <div class="flex flex-col gap-1 col-span-12">
                        <label class="form-label" for="name"
                            >Imię i nazwisko</label
                        >
                        <div class="relative w-full">
                            <input
                                class="form-input pl-8"
                                id="name"
                                type="text"
                                v-model="form.name"
                            /><i
                                class="fa-solid fa-user text-primary absolute top-1/2 left-3 translate-y-[-50%]"
                            ></i>
                        </div>
                        <span class="form-error" v-if="form.errors.name">{{
                            form.errors.name
                        }}</span>
                    </div>
                    <div class="flex flex-col gap-1 col-span-12">
                        <label class="form-label" for="email"
                            >Adres email</label
                        >
                        <div class="relative w-full">
                            <input
                                class="form-input pl-8"
                                id="email"
                                type="email"
                                v-model="form.email"
                            />
                            <i
                                class="fa-solid fa-at text-primary absolute top-1/2 left-3 translate-y-[-50%]"
                            ></i>
                        </div>
                        <span class="form-error" v-if="form.errors.email">{{
                            form.errors.email
                        }}</span>
                    </div>
                    <div class="flex flex-col gap-1 col-span-12 md:col-span-6">
                        <label class="form-label" for="password">Hasło</label>
                        <div class="relative w-full">
                            <input
                                class="form-input pl-8"
                                id="password"
                                type="password"
                                v-model="form.password"
                            />
                            <i
                                class="fa-solid fa-lock text-primary absolute top-1/2 left-3 translate-y-[-50%]"
                            ></i>
                        </div>
                        <span class="form-error" v-if="form.errors.password">{{
                            form.errors.password
                        }}</span>
                    </div>
                    <div class="flex flex-col gap-1 col-span-12 md:col-span-6">
                        <label class="form-label" for="password_confirmation"
                            >Powtórz hasło</label
                        >
                        <div class="relative w-full">
                            <input
                                class="form-input pl-8"
                                id="password_confirmation"
                                type="password"
                                v-model="form.password_confirmation"
                            />
                            <i
                                class="fa-solid fa-lock text-primary absolute top-1/2 left-3 translate-y-[-50%]"
                            ></i>
                        </div>
                        <span
                            class="form-error"
                            v-if="form.errors.password_confirmation"
                            >{{ form.errors.password_confirmation }}</span
                        >
                    </div>
                    <div class="col-span-12">
                        <PrimaryButton
                            class="flex w-full text-center justify-center"
                            :type="'button'"
                            >Zarejestuj się</PrimaryButton
                        >
                    </div>
                    <p
                        class="text-sm text-secondary-dark font-normal col-span-12"
                    >
                        Masz juz konto?
                        <Link
                            :href="route('login')"
                            class="text-primary font-semibold"
                            >Zaloguj się</Link
                        >
                    </p>
                </div>
            </form>
        </div>
    </div>
</template>
