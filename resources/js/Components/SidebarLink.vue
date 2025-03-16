<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: String,
    active: String,
});
</script>

<template>
    <Link
        :href="href"
        class="w-full py-3 px-4 rounded-lg flex items-center gap-3 font-semibold text-gray-500 hover:bg-indigo-50 hover:text-indigo-700 transition duration-150 ease-in-out text-base"
        :class="{
            'bg-indigo-50 text-indigo-700': props.active,
        }"
    >
        <slot></slot>
    </Link>
</template>
