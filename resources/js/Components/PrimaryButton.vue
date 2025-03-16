<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    type: String,
    href: String,
});
</script>

<template>
    <button
        v-if="props.type === 'button'"
        class="text-white text-sm font-semibold px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 transition duration-150 ease-in-out"
    >
        <slot></slot>
    </button>
    <Link
        v-if="props.type === 'Link'"
        :href="href"
        class="text-white text-sm font-semibold px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 transition duration-150 ease-in-out"
        ><slot></slot
    ></Link>
</template>
