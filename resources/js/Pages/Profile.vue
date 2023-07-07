<template>

      
    <h1 class="text-4xl mb-3 font-bold">Profile</h1>
    <p>In this Tutorial, We will learn about :</p>

    <div style="margin-top:400px">
        <p>Current time of Now : {{ $page.props.time }}.</p>
        <Link href="/profile" class="text-blue-500" preserve-scroll >Refresh</Link>
    </div>

</template>

<script>

import Layout1 from "../Shared/Layout1";

// defineProps({
//     time: String
// });

export default {
    layout : Layout1,
};

</script>