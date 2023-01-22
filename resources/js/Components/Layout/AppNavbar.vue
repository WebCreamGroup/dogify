<template>
    <div class="navbar bg-base-100 rounded-box shadow-xl">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                    </svg>
                </label>

                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><Link :href="route('app.dashboard')">Dashboard</Link></li>
                </ul>
            </div>

            <Link :href="route('public.landing')" class="btn btn-ghost normal-case text-xl">{{ config.app.name }}</Link>
        </div>

        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><Link :href="route('app.dashboard')">Dashboard</Link></li>
            </ul>
        </div>

        <div class="navbar-end space-x-2">
            <button class="btn btn-ghost btn-circle">
                <span class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </span>
            </button>

            <Menu as="div" v-slot="{ close }" class="dropdown dropdown-end">
                <MenuButton class="btn gap-2 btn-ghost">
                    <span v-text="auth.user.first_name"/>

                    <div class="avatar">
                        <div class="w-8 rounded-full">
                            <Avatar/>
                        </div>
                    </div>
                </MenuButton>

                <MenuItems as="ul" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <MenuItem @click="close" as="li">
                        <Link :href="route('app.profile')" class="justify-between">Profile</Link>
                    </MenuItem>
                    <MenuItem as="li"><a>Settings</a></MenuItem>
                    <MenuItem as="li">
                        <form @click="signOut" class="hover:bg-accent/10">
                            <span class="text-accent">Sign out</span>
                        </form>
                    </MenuItem>
                </MenuItems>
            </Menu>
        </div>
    </div>
</template>

<script>
import { usePage, router, Link } from '@inertiajs/vue3'
import { useToastStore, TYPE } from '../../Stores/toast'
import Avatar from '../Avatar.vue'
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'

export default {
    components: { Link, Avatar, Menu, MenuButton, MenuItems, MenuItem },
    computed: {
        config: () => usePage().props.config,
        auth: () => usePage().props.auth,
        route: () => window.route,
    },
    methods: {
        signOut() {
            router.post('/auth/logout', null, {
                onSuccess: () => useToastStore().push('Successfully signed out', TYPE.SUCCESS)
            })
        },
    },
}
</script>
