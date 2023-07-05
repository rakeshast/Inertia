<template>
    <h1 class="text-4xl mb-3 font-bold">Users</h1>
    <p>In this Tutorial, We will learn about :</p>
    
    <Nav></Nav>

    <div style="margin-top:400px">
        <p>Current time of Now : {{ time }}.</p>
        <Link href="/users" class="text-blue-500" preserve-scroll >Refresh</Link>
    </div>
    
</template>

<script>

import Nav from "../Shared/Nav";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: { Nav, Link },
    props : { time : String }
};

</script>