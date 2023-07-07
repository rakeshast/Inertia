<template>
        <Head>
            <title>Users - My App</title>
            <meta name="description" content="Your page description Users">
        </Head>
    <h1 class="text-4xl mb-3 font-bold">Users</h1>
    <p>In this Tutorial, We will learn about :</p>
    <div style="margin-top:400px">
        <p>Current time of Now : {{ time }}.</p>
        <Link href="/users" class="text-blue-500" preserve-scroll >Refresh</Link>
    </div>
   
</template>

<script>

import { Head } from "@inertiajs/inertia-vue3";
// import Layout1 from "../Shared/Layout1";


// // defineProps({
// //     time: String
// // });

export default {
    props : { 
        time : String,
    },
    components : {
        Head,
    }
    
};

</script>