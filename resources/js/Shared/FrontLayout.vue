<template>
    <Head>
        <title>My App</title>
        <meta name="description" content="Your page description Layout" head-key="description">
    </Head>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex item-center">
                <!-- <h1 class="font-bold text-lg">My App</h1> -->
                <input type="text" value="My App2"/>
            </div>
            <Nav/>
        </header>
    </section>

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