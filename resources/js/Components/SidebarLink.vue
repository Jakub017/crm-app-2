<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: String,
    active: String,
    type: String,
});
</script>

<template>
    <Link
        :href="href"
        class="w-12 h-12 rounded-full flex items-center justify-center font-medium hover:bg-primary-light transition duration-200 ease-in-out text-lg lg:text-sm lg:justify-start lg:w-full lg:h-auto lg:p-3 lg:gap-2 lg:rounded-md"
        :class="{
            'text-primary bg-primary-light font-semibold': props.active,
            'text-secondary': !props.active,
            'bg-secondary font-semibold text-white hover:bg-secondary hover:text-white':
                props.type === 'logout',
        }"
    >
        <slot></slot>
    </Link>
</template>
