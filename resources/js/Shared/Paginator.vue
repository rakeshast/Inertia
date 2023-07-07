<template>
    <!-- Paginator -->
    <div>
        <Component 
            v-for="link in links"
            :is="link.url ? 'Link' : 'span'"
            :href="link.url"
            v-html="link.label"
            class="px-1"
            :class="{ 'text-gray-500' : !link.url, 'font-bold' : link.active }"
        />
        <!-- <template v-for="link in users.links">   
            :class="!link.url ? 'font-bold' : 'text-grey-500'"         
                <Link v-if="link.url"  :href="link.url" v-html="link.label" />   
                <span v-else v-html="link.label"/>    
        </template>     -->
    </div>
    <!-- Paginator -->
</template>

<script>
    export default {
        props: {
            links : Array
        }        
    };
</script>