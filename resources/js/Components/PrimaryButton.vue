<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    type: String,
    href: String,
    class: String,
});
</script>

<template>
    <button
        v-if="props.type === 'button'"
        class="text-white text-sm font-semibold px-4 py-2 rounded-lg bg-primary hover:bg-bg-primary-dark transition duration-150 ease-in-out"
        :class="props.class"
    >
        <slot></slot>
    </button>
    <Link
        v-if="props.type === 'Link'"
        :href="href"
        class="text-white text-sm font-semibold px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark transition duration-150 ease-in-out"
        :class="props.class"
        ><slot></slot
    ></Link>
</template>
