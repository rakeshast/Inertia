<template>
    <Head>
        <title>My App</title>
        <meta name="description" content="Your page description Layout" head-key="description">
    </Head>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex item-center">
                <!-- <h1 class="font-bold text-lg">My App</h1> -->
                <input type="text" value="My App"/>
                <p class="text-small ml-4">Welcome back, {{ $page.props.auth.user.username }}!</p>
               
            </div>
            <Nav/>
        </header>
    </section>
    
    
<!-- flash message start -->

    <div

        v-if="$page.props.flash.status"
        class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert"
    >
        <span class="font-medium">
            {{ $page.props.flash.message }}
        </span>
    </div>

    <div

        v-else-if="$page.props.flash.status === false "
        class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
        role="alert"
    >
        <span class="font-medium">
            {{ $page.props.flash.message }}
        </span>
    </div>
    
<!-- flash message end -->
   
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot/>
        </div>        
    </section>

    <section class="p-6">
        Footer
    </section>

</template>

<script setup>

import Nav from './Nav.vue';


    // export default {
    //     components : { Nav },
    //     // computed : {
    //     //     username() {
    //     //         return this.$page.props.auth.user.username;
    //     //     }
    //     // }
    // };
 
</script>