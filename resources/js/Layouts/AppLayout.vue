<script setup>
import { ref, computed } from "vue";
import { Head, Link, router, usePage } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import SidebarLink from "@/Components/SidebarLink.vue";

defineProps({
    title: String,
});

const page = usePage();

const user = computed(() => page.props.user);
const successMessage = computed(() => page.props.successMessage);

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
    <div class="flex w-full max-w-full h-screen overflow-hidden">
        <!-- Sidebar -->
        <div
            class="flex flex-col justify-start items-center gap-8 p-4 bg-white border-r-[1px] border-gray-200 w-24 lg:w-[250px]"
        >
            <Link :href="route('dashboard')">
                <ApplicationMark class="block size-12" />
            </Link>
            <div class="flex flex-col gap-3 w-full">
                <SidebarLink
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                >
                    <i class="fa-solid fa-house"></i>Pulpit
                </SidebarLink>
                <SidebarLink
                    :href="route('client.index')"
                    :active="route().current('client.*')"
                >
                    <i class="fa-solid fa-users"></i>Klienci
                </SidebarLink>
                <SidebarLink
                    :href="route('task.index')"
                    :active="route().current('task.*')"
                >
                    <i class="fa-solid fa-list-check"></i>Zadania
                </SidebarLink>
                <SidebarLink>
                    <i class="fa-solid fa-file-invoice"></i>Faktury
                </SidebarLink>
            </div>

            <div class="flex flex-col gap-3 w-full mt-auto mb-0">
                <SidebarLink>
                    <i class="fa-solid fa-circle-info"></i>Pomoc
                </SidebarLink>
                <SidebarLink :href="route('logout')" method="POST">
                    <i class="fa-solid fa-right-from-bracket"></i>Wyloguj się
                </SidebarLink>
            </div>
        </div>

        <!-- Nav with content -->
        <div
            class="flex min-h-full flex-col w-[calc(100%-64px)] lg:w-[calc(100%-250px)]"
        >
            <!-- Nav -->
            <nav
                class="flex p-4 h-20 bg-white border-b-[1px] border-gray-200 w-full"
            >
                {{ user.name }}
                <img :src="user.profile_photo_url" alt="" />
            </nav>
            <main class="p-6 bg-gray-50 w-full h-full overflow-y-auto">
                <slot></slot>
            </main>
        </div>
    </div>
</template>
