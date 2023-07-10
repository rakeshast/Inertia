<template>
    <Head>
        <title>Create User</title>
        <meta name="description" content="Your page description Users" head-key="description">
    </Head>

    <div class="flex justify-between mt-6">
        <h1 class="text-3xl font-bold">Create New User</h1>
    </div>

    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <input v-model="form.name" type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" placeholder="Name" />
            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input v-model="form.email" type="text" class="border border-gray-400 p-2 w-full" name="email" id="email" placeholder="Email" />
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
            <input v-model="form.password" type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" placeholder="Password"/>
            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing">Submit</button>
        </div>
    </form>
    
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

    let form = useForm({
        name: '',
        email: '',
        password: '',
    });

    // setTimeout(() => {
    //     form.reset();
    // }, 3000);

    let submit = () => {
        form.post('/users');
    }


    // import { Inertia } from '@inertiajs/inertia';
    // import { useForm } from '@inertiajs/inertia-vue3';
    // import { reactive, ref } from 'vue';

    // defineProps({
    //     Errors: Object
    // });

        // let form = reactive({
    //     name:'', 
    //     email:'',
    //     password: '',
    // });

    // let processing = ref(false);
  
    // let submit = () => {
    //     // processing.value = true;
    //     Inertia.post('/users', form, {
    //         onStart: () => {
    //             processing.value = true;
    //         }, 
    //         onFinish: () => {
    //             processing.value = false;
    //         }, 
    //     });
    // };

</script>
