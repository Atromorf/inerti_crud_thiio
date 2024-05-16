<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import SideBar from "@/Layouts/SideBar.vue";
const props = defineProps({
    post: Object,
});
const form = useForm({
    name: props.post.name,
    id: props.post.id,
    email: props.post.email,
    password: props.post.password,
});
function submit() {
    form.post('/posts/update');
}
</script>


<template>

<div class="flex h-screen bg-gray-100"> <!-- Contenedor principal -->
      <SideBar > <!-- Sidebar -->
        <!-- Contenido de la barra lateral -->
      </SideBar>

    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg">
                <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">
                    Edit User
                </h1>

                <form @submit.prevent="submit()" class="mt-6 mb-0 space-y-8 rounded-lg p-16 shadow-2xl">


                    <div>
                        <label for="name" class="text-sm font-medium">Name</label>

                        <div class="relative mt-1">
                            <input v-model="form.name" type="text" 
                                class="w-full rounded-lg border-gray-200 p-4 pr-40 text-sm shadow-sm"
                                placeholder="Enter name User" name="name" />
                        </div>
                    </div>

                    <div>
                        <label for="email" class="text-sm font-medium">Email</label>

                        <div class="relative mt-1">
                            <input v-model="form.email" type="email" 
                                class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                                placeholder="Enter email" name="email" />
                        </div>
                    </div>

                    <div>
                        <label for="old_password" class="text-sm font-medium">Password</label>

                        <div class="relative mt-1">
                            <input readonly type="text" 
                                class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                                :value="props.post.password" 
                                placeholder="Only this User can change this field"/>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-6/12 m-auto mt-4 text-xl p-2 flex justify-center bg-indigo-600 text-white rounded-lg tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 hover:bg-indigo-700">
                        Update
                    </button>
                    <button type="button"
                        class="w-6/12 m-auto mt-4 text-xl p-2 flex justify-center bg-indigo-600 text-white rounded-lg tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500 hover:bg-indigo-700">
                        <Link href="/posts">Cancel</Link>
                    </button>
                </form>
            </div>
        </div>
</div>
</template>