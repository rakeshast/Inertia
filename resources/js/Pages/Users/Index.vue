<template>
    <Head>
        <title>Users</title>
        <meta name="description" content="Your page description Users" head-key="description">
    </Head>

    <div class="flex justify-between mt-6">
        <div class="flex items-center">
            <h1 class="text-3xl font-bold">Users</h1>
            <Link href="/users/create" class="text-blue-500 text-sm ml-3">Create New User</Link>
        </div>
        
        <input v-model="search" type="text" placeholder="Search.." class="border px-2 rounded-lg"/>
    </div>

    <div class="flex flex-col mt-5">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">

                        <thead>
                            <tr>
                                <th class="px-6 py-4 whitespace-nowrap text-left" >Name</th>
                                <th class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium" ><span class="t">Action</span></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="user in users.data" :key="user.id" >
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                            {{user.name}}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <Paginator :links="users.links" class="mt-6"/>
    
</template>
<script setup>
    
    import { ref, watch } from 'vue';
    import Paginator from '../../Shared/Paginator.vue';
    import { Inertia } from '@inertiajs/inertia';
    // import throttle from 'lodash/throttle';
    import debounce from 'lodash/debounce';
    

    let props = defineProps({
        users: Object,
        filters : Object
    });

    let search = ref(props.filters.search);
    
    watch(search, debounce(function(value) {
        console.log('Changed :- ' + value);
        Inertia.get( '/users', { search: value }, {
            preserveState: true,
            replace: true
        });
    }, 300 ) );

    // watch(search, value => {
    //     // console.log('Changed :- ' + value);
    //     Inertia.get( '/users', { search: value }, {
    //         preserveState: true,
    //         replace: true
    //     });
    // });

</script>
