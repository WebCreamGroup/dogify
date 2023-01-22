<template>
    <div class="navbar bg-base-100 rounded-box shadow-xl">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><Link :href="route('public.about')">About</Link></li>
                    <li><Link :href="route('blog.posts-list')">Blog</Link></li>
                </ul>
            </div>
            <Link :href="route('public.landing')" class="btn btn-ghost normal-case text-xl">{{ config.app.name }}</Link>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><Link :href="route('public.about')">About</Link></li>
                <li><Link :href="route('blog.posts-list')">Blog</Link></li>
            </ul>
        </div>
        <div class="navbar-end">
            <Link :href="route('auth.sign-in')" class="btn">Sign Up</Link>
        </div>
    </div>
</template>

<script>
import { usePage } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

export default {
    components: { Link },
    computed: {
        config: () => usePage().props.config,
        route: () => window.route,
    },
}
</script>
