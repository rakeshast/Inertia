<template>
    <Head>
        <title>Edit User</title>
        <meta name="description" content="Your page description Edit Users" head-key="description">
    </Head>

    <div class="flex justify-between mt-6">        
        <h1 class="text-3xl font-bold">Edit User</h1>
    </div>
    
    <form @submit.prevent="editSubmit" class="max-w-md mx-auto mt-8">
        
        
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <input v-model="form.name" type="text" class="border border-gray-400 p-2 w-full" name="name" id="name"/>  
            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>        
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input v-model="form.email" type="email" class="border border-gray-400 p-2 w-full" name="email" id="email"/>  
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>          
        </div>
        <div class="mb-6">
            <input v-model="form.id" type="hidden" class="border border-gray-400 p-2 w-full" name="id" id="id" />          
        </div>
        
        <div class="mb-6">
            <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing">Submit</button>
        </div>
    </form>

    
</template>

<script setup>

    let props = defineProps({
        data: Object,
    });

    import { useForm } from '@inertiajs/inertia-vue3';

    let form = useForm({
        id: props.data.id,
        name: props.data.name,
        email: props.data.email,
    });

    let editSubmit = () => {
        form.post('/users/update');
    }
    
</script>
