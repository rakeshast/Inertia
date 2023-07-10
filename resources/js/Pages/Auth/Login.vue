<template>

    <Head>
        <title>Login User</title>
        <meta name="description" content="Your page description Login" head-key="description">
    </Head>

    <main class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 rounded-xl max-w-md mx-auto border">
            <div class="flex justify-between mt-6">
                <h1 class="text-3xl font-bold mb-6">Login</h1>
            </div>

            <form @submit.prevent="submit">
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                    <input v-model="form.email" type="text" class="border p-2 w-full rounded" name="email" id="email" placeholder="Email" />
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                    <input v-model="form.password" type="password" class="border p-2 w-full rounded" name="password" id="password" placeholder="Password"/>
                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
                </div>
                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" >Log in</button>
                </div>
            </form>
        </section>
    </main>


</template>

<script>
// import second from '../../Shared/Layout1'
    export default{
        layout : null
    };
</script>

<script setup>

import { useForm } from '@inertiajs/inertia-vue3';

    let form = useForm({
        email: '',
        password: '',
    });

    let submit = () => {
        form.post('/login');
    }


</script>