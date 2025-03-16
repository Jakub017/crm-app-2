<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <!-- Main container -->
    <div class="flex w-full min-h-screen">
        <!-- Sidebar -->
        <div
            class="flex justify-center items-start p-4 bg-white border-r-[1px] border-gray-200 w-24"
        >
            <Link :href="route('dashboard')">
                <ApplicationMark class="block size-12" />
            </Link>
        </div>

        <!-- Nav with content -->
        <div class="flex flex-col w-[calc(100%-24rem)]">
            <!-- Nav -->
            <nav
                class="flex p-4 h-20 bg-white border-b-[1px] border-gray-200 w-full"
            ></nav>
            <main class="p-4 bg-gray-50 w-full">
                <slot></slot>
            </main>
        </div>
    </div>
</template>
