<template>
    <div v-if="links.length > 0">
        <div class="flex flex-wrap">
            <div></div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    links: Array,
});
</script>
