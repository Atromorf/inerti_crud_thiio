<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import TreeTable from 'primevue/treetable';


defineProps({
    title: String,
});

const logout = () => {
    Inertia.post(route('logout'));
};

</script>

<template>

        <div class="flex h-screen flex-col justify-between border-e bg-white">
        <div class="px-7 py-8">
            <span class="grid h-40 w-32 place-content-center rounded-lg bg-gray-100 text-xs text-gray-600">
                <Link href="/dashboard" class="focus:outline-none">
                    <img src="/images/thiio_logo.jpeg" alt="Logo de Thiio" class="h-full mx-auto" />
                </Link>
            </span>

            <ul class="mt-6 space-y-1">
            <li>
                <Link class="inline-flex items-center w-full px-4 py-2 mt-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-lg bg-gray-50 hover:bg-gray-200 focus:shadow-outline" white="" :href="route('dashboard')" :active="route().current('dashboard')">
                Inicio
                </Link>
            </li>


            <li>
                <Link class="inline-flex items-center w-full px-4 py-2 mt-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-lg bg-gray-50 hover:bg-gray-200 focus:shadow-outline"
                white="" :href="route('posts.index')" :active="route().current('post.index')">
                Users
                </Link>
            </li>


            <li>
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                <summary
                    class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                >
                    <span class="text-sm font-medium"> Account </span>

                    <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </span>
                </summary>

                <ul class="mt-2 space-y-1 px-4">
                    <li>
                        <DropdownLink :href="route('profile.show')">
                        Details
                        </DropdownLink>
                    </li>

                    <li>
                        <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                        Api Tokens
                        </DropdownLink>
                    </li>

                    <li>
                        <form @submit.prevent="logout">
                            <DropdownLink as="button">
                                Logout
                            </DropdownLink>
                        </form>
                    </li>
                </ul>
                </details>
            </li>
            </ul>
        </div>

        <div class="sticky inset-x-0 bottom-0 border-t border-gray-100">
            <a href="#" class="flex items-center gap-2 bg-white p-4 hover:bg-gray-50">
            <img
                alt="Man"
                src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                class="h-10 w-10 rounded-full object-cover"
            />

            <div>
                <p class="text-xs">
                <strong class="block font-medium">{{ $page.props.user.name }}</strong>

                <span> {{ $page.props.user.email }} </span>
                </p>
            </div>
            </a>
        </div>
        </div>
</template>

<style scoped> 
   

</style>

