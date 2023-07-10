<template>
    <nav class="">
        <ul class="flex  space-x-6 list-inside">          

            <li>
                <NavLink href="/" :active="$page.component == 'Home'">Home</NavLink>              
            </li>

            <!-- <li><Link href="/users?foo=bar&faz=fazz" class="text-blue-500 hover:underline" :class="{'font-bold underline' : $page.url.startsWith('/users')}">Users</Link></li> -->

            <!-- <li><Link href="/users" class="text-blue-500 hover:underline" :class="{'font-bold underline' : $page.url == '/users'}">Users</Link></li> -->

            <li>
                <NavLink href="/users" :active="$page.component == 'Users'">Users</NavLink>
                <!-- <Link href="/users?foo=bar&faz=fazz" class="text-blue-500 hover:underline" :class="{'font-bold underline' : $page.component == 'Users'}">Users</Link> -->
            </li>

            <li>
                <NavLink href="/settings" :active="$page.component == 'Settings'">Settings</NavLink>
                <!-- <Link href="/settings" class="text-blue-500 hover:underline" :class="{'font-bold underline' : $page.component == 'Settings'}">Settings</Link> -->
            </li>            

            <li>
                <NavLink href="/profile" :active="$page.component == 'Profile'">Profile</NavLink>
            </li>

            <!-- <li><Link href="/logout" method="post" :data="{ foo: 'Bar'}" as="button" class="text-blue-500 hover:underline" :class="{'font-bold underline' : $page.url == '/logout'}">Logout</Link></li> -->

            <li><Link href="/logout" method="post">Logout</Link></li>
           
        </ul>
    </nav>
</template>

<script>

    import { Link } from "@inertiajs/inertia-vue3";
    import NavLink from './NavLink';

    export default {
        components : { NavLink, Link },
    }; 

</script>
