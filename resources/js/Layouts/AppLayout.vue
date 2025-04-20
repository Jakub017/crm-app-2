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
            class="flex flex-col justify-center items-center gap-8 p-4 border border-secondary-light w-24 lg:w-[250px]"
        >
            <Link :href="route('dashboard')">
                <ApplicationMark class="block size-12" />
            </Link>
            <div
                class="flex flex-col justify-center items-center gap-3 w-full lg:items-center"
            >
                <SidebarLink
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                >
                    <i class="fa-solid fa-house text-base"></i
                    ><span class="hidden lg:block">Pulpit</span>
                </SidebarLink>
                <SidebarLink
                    :href="route('client.index')"
                    :active="route().current('client.*')"
                >
                    <i class="fa-solid fa-users text-base"></i
                    ><span class="hidden lg:block">Klienci</span>
                </SidebarLink>
                <SidebarLink
                    :href="route('task.index')"
                    :active="route().current('task.*')"
                >
                    <i class="fa-solid fa-list-check text-base"></i
                    ><span class="hidden lg:block">Zadania</span>
                </SidebarLink>
                <SidebarLink
                    :href="route('invoice.index')"
                    :active="route().current('invoice.*')"
                >
                    <i class="fa-solid fa-file-invoice text-base"></i
                    ><span class="hidden lg:block">Faktury</span>
                </SidebarLink>
                <SidebarLink>
                    <i class="fa-solid fa-gear text-base"></i
                    ><span class="hidden lg:block">Ustawienia</span>
                </SidebarLink>
            </div>

            <div
                class="flex flex-col justify-center items-center gap-3 w-full mt-auto mb-0"
            >
                <SidebarLink>
                    <i class="fa-solid fa-circle-info text-base"></i
                    ><span class="hidden lg:block">Pomoc</span>
                </SidebarLink>
                <SidebarLink
                    :href="route('logout')"
                    :type="'logout'"
                    method="POST"
                >
                    <i class="fa-solid fa-right-from-bracket text-base"></i
                    ><span class="hidden lg:block">Wyloguj się</span>
                </SidebarLink>
            </div>
        </div>

        <!-- Nav with content -->
        <div
            class="flex min-h-full flex-col w-[calc(100%-64px)] lg:w-[calc(100%-250px)]"
        >
            <!-- Nav -->
            <nav
                class="py-2 px-4 bg-white w-full border-b border-secondary-light"
            >
                <div class="flex justify-end items-center">
                    <button
                        class="flex justify-end items-center gap-3 p-2 rounded-full hover:bg-secondary-extra-light transition duration-200 ease-in-out"
                    >
                        <span
                            class="text-sm text-secondary-dark font-semibold"
                            >{{ user.name }}</span
                        >
                        <img
                            :src="user.profile_photo_url"
                            class="size-8 rounded-full"
                        />
                    </button>
                </div>
            </nav>
            <main class="p-6 bg-white w-full h-full overflow-y-auto">
                <slot></slot>
            </main>
        </div>
    </div>
</template>
