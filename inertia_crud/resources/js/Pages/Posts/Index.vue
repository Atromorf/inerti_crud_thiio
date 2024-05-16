<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import SideBar from "@/Layouts/SideBar.vue";
import TreeTable from 'primevue/treetable';

defineProps({
    posts: {
        type: Array,
        required: true,
    },
    components: {
        SideBar,
        TreeTable,
    },
});


</script>

<template>
    

<div class="flex h-screen bg-gray-100"> <!-- Contenedor principal -->
      <SideBar > <!-- Sidebar -->
        <!-- Contenido de la barra lateral -->
      </SideBar>

      <div class="w-9/12 m-auto overflow-hidden overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
      <div class="rounded-lg border border-gray-200">
        <div class="flex justify-center items-center w-full p-6 space-x-4">
          <a
            class="group inline-block rounded bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-[2px] hover:text-white focus:outline-none focus:ring active:text-opacity-75"
            href="/posts/create"
          >
            <span class="block rounded-sm bg-white px-8 py-3 text-sm font-medium group-hover:bg-transparent">
              Add User
            </span>
          </a>
          
        </div>
        
            <table class="min-w-full divide-y divide-gray-200 text-sm dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                            ID
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                            User
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                            Email
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                            Password
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <template v-for="post in posts" :key="post.id">
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap">
                                {{ post.id }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                {{ post.name }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                {{ post.email }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                {{ post.password }} *******
                            </td>
                            
                            <td class="px-4 py-2 whitespace-nowrap">
                                <Link :href="'/posts/' + post.id + '/edit'"
                                    class="text-indigo-600 hover:text-indigo-900">
                                Edit</Link>

                                <Link :href="'/posts/' + post.id + '/delete'"
                                    class="text-indigo-600 hover:text-indigo-900">
                                Delete</Link>
                            </td>
                        </tr>
                    
                    </template>
                    
                </tbody>
            </table>
        
        </div>
    </div>
</div>

        
</template>