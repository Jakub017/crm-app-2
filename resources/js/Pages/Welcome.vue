<template>
    <Head title="Welcome" />
    <nav
        id="desktop-nav"
        class="hidden lg:flex fixed top-0 left-0 z-10 w-full duration-200"
    >
        <div
            class="w-full max-w-7xl mx-auto flex justify-between items-center px-4 py-8"
        >
            <a class="flex w-[275px]" href="">
                <img src="/img/logo.png" alt="" class="w-[150px]" />
            </a>
            <ul class="flex gap-8 justify-center items-center">
                <li>
                    <a class="font-medium text-base text-primary" href="#"
                        >Start</a
                    >
                </li>
                <li>
                    <a
                        class="font-medium text-base text-secondary-dark"
                        href="#"
                        >O aplikacji</a
                    >
                </li>
                <li>
                    <a
                        class="font-medium text-base text-secondary-dark"
                        href="#"
                        >Funkcje</a
                    >
                </li>
                <li>
                    <a
                        class="font-medium text-base text-secondary-dark"
                        href="#"
                        >Kontakt</a
                    >
                </li>
            </ul>
            <div class="flex justify-center items-center gap-2 w-[275px]">
                <a
                    class="font-medium text-base text-secondary-dark border border-primary py-2 px-4 rounded-full"
                    :href="route('login')"
                    >Zaloguj się</a
                >
                <a
                    class="font-medium text-base border border-primary py-2 px-4 rounded-full bg-primary text-white"
                    :href="route('register')"
                    >Zarejestruj się</a
                >
            </div>
        </div>
    </nav>
    <div class="w-full h-full bg-white p-6">
        <div class="bg-gray-50 relative rounded-3xl">
            <div
                class="flex flex-col w-full relative gradient bg-cover bg-center bg-no-repeat overflow-hidden lg:pt-[75px]"
            >
                <div
                    class="w-full max-w-7xl flex flex-col gap-3 mx-auto px-4 py-8 justify-center items-center"
                >
                    <span
                        class="border border-primary text-xs text-primary py-2 px-4 rounded-full lg:text-sm"
                        >Centrum faktur i klientów
                    </span>
                    <h1
                        class="font-sans text-3xl font-medium max-w-5xl text-center lg:text-6xl lg:leading-[1.25]"
                    >
                        Zarządzaj fakturami i klientami z łatwością dzięki
                        <span class="text-primary font-semibold">Facturio</span>
                    </h1>
                    <p
                        class="text-sm text-secondary-dark text-center lg:text-base leading-[1.5] max-w-[600px]"
                    >
                        Twórz faktury, zarządzaj zadaniami i buduj bazę klientów
                        – wszystko w jednym miejscu. Prosto, szybko i bez
                        chaosu.
                    </p>
                    <a
                        :href="route('register')"
                        class="bg-primary text-white text-sm py-2 px-4 rounded-full w-fit font-medium lg:text-base"
                        >Wypróbuj za darmo!</a
                    >
                    <div
                        class="relative w-full border-4 border-secondary-light rounded-lg overflow-hidden mt-6 mb-[-75px] lg:mb-[-150px]"
                    >
                        <img
                            class="w-full"
                            src="/img/dashboard-screen.png"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-[1000px]"></div>
</template>

<script></script>
<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { onMounted } from "vue";

onMounted(() => {
    const desktopNav = document.querySelector("#desktop-nav");

    window.addEventListener("scroll", () => {
        let scrollValue = window.scrollY;

        if (scrollValue > 30) {
            desktopNav.classList.add("shadow");
            desktopNav.classList.add("bg-white");
        } else {
            desktopNav.classList.remove("shadow");
            desktopNav.classList.remove("bg-white");
        }
    });
});

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>
