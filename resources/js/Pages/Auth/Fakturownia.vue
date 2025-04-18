<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    fakturownia_api_key: "",
    fakturownia_login: "",
});

const submit = () => form.post(route("fakturownia.store"));
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
                    <h1 class="text-xl font-semibold">
                        Ukończ integrację z systemem
                        <span class="font-semibold text-primary"
                            >Fakturownia</span
                        >
                    </h1>
                    <p class="text-sm text-secondary-dark font-normal w-full">
                        Podaj dane dostępowe, aby połączyć swoje konto
                        Fakturownia i rozpocząć automatyczne wystawianie faktur.
                    </p>
                </div>

                <div class="gap-4 grid grid-cols-12 col-span-12">
                    <div class="flex flex-col gap-1 col-span-12">
                        <label class="form-label" for="fakturownia_login"
                            >Login</label
                        >
                        <div class="relative w-full">
                            <input
                                class="form-input pl-8"
                                id="fakturownia_login"
                                type="text"
                                v-model="form.fakturownia_login"
                            />
                            <i
                                class="fa-solid fa-user text-primary absolute top-1/2 left-3 translate-y-[-50%]"
                            ></i>
                        </div>
                        <span
                            class="form-error"
                            v-if="form.errors.fakturownia_login"
                            >{{ form.errors.fakturownia_login }}</span
                        >
                    </div>
                    <div class="flex flex-col gap-1 col-span-12">
                        <label class="form-label" for="fakturownia_api_key"
                            >Klucz API</label
                        >
                        <div class="relative w-full">
                            <input
                                class="form-input pl-8"
                                id="fakturownia_api_key"
                                type="text"
                                v-model="form.fakturownia_api_key"
                            />
                            <i
                                class="fa-solid fa-key text-primary absolute top-1/2 left-3 translate-y-[-50%]"
                            ></i>
                        </div>
                        <span
                            class="form-error"
                            v-if="form.errors.fakturownia_api_key"
                            >{{ form.errors.fakturownia_api_key }}</span
                        >
                    </div>
                    <div class="col-span-12">
                        <PrimaryButton
                            class="flex w-full text-center justify-center"
                            :type="'button'"
                            >Ukończ rejestrację</PrimaryButton
                        >
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
