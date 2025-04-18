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
            class="h-full w-full md:w-1/2 flex gap-4 flex-col justify-center items-center p-4"
        >
            <div
                class="flex justify-center flex-col items-center w-full max-w-[600px] gap-4"
            >
                <div class="col-span-12 flex flex-col gap-2">
                    <h1 class="text-xl font-semibold">
                        Wybierz swój program do fakturowania
                    </h1>
                    <p class="text-sm text-secondary-dark font-normal w-full">
                        Zintegruj aplikację z wybranym programem do fakturowania
                        i przyspiesz obsługę dokumentów.
                    </p>
                </div>

                <div class="grid w-full grid-cols-12 gap-4">
                    <div class="flex col-span-12 lg:col-span-6 w-full">
                        <Link
                            :href="route('fakturownia.create')"
                            class="flex justify-center items-center gap-2 w-full border-secondary-light border rounded-md p-2 size-24 duration-300 hover:bg-primary-light"
                        >
                            <img
                                src="/img/fakturownia-logo.png"
                                class="h-[50px]"
                                alt=""
                            />
                        </Link>
                    </div>

                    <div class="flex col-span-12 lg:col-span-6 w-full">
                        <div
                            class="flex justify-center items-center gap-2 w-full border-secondary-light border rounded-md p-2 size-24 bg-gray-100"
                        >
                            <img
                                src="/img/invoice-ocean-logo.png"
                                class="h-[50px]"
                                alt=""
                            />
                        </div>
                    </div>

                    <div class="flex col-span-12 lg:col-span-6 w-full size-24">
                        <div
                            :href="route('fakturownia.create')"
                            class="flex justify-center items-center gap-2 w-full border-secondary-light border rounded-md p-2 bg-gray-100"
                        >
                            <img
                                src="/img/wfirma-logo.png"
                                class="h-[50px]"
                                alt=""
                            />
                        </div>
                    </div>

                    <div class="flex col-span-12 lg:col-span-6 w-full size-24">
                        <div
                            class="flex justify-center items-center gap-2 border-secondary-light border rounded-md p-2 w-full bg-gray-100"
                        >
                            <img
                                src="/img/ifirma-logo.webp"
                                class="h-[50px]"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
