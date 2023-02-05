<template>
    <div class="navbar">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                    </svg>
                </label>

                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><Link :href="$route('public.about')">About</Link></li>
                    <li><Link :href="$route('blog.posts-list')">Blog</Link></li>
                </ul>
            </div>

            <Link :href="$route('public.landing')" class="btn btn-ghost normal-case text-xl">{{ $page.props.config.app.name }}</Link>
        </div>

        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><Link :href="$route('public.about')" v-text="lang.get('strings.Dashboard')"/></li>
                <li><Link :href="$route('blog.posts-list')">Blog</Link></li>
            </ul>
        </div>

        <div class="navbar-end space-x-5">
            <Menu as="div" v-slot="{ close }" class="dropdown dropdown-end">
                <MenuButton class="btn btn-ghost btn-circle avatar shadow-xl p-1 w-9 h-9 min-h-min min-w-min">
                    <div class="w-full h-full rounded-full relative">
                        <Transition name="fade">
                            <!--suppress JSUnresolvedVariable -->
                            <Component :is="`Flag${$page.props.i18n.currentLocale.toUpperCase()}`" class="absolute h-full -left-1"/>
                        </Transition>
                    </div>
                </MenuButton>

                <MenuItems as="ul" class="menu menu-compact dropdown-content mt-3 p-2 shadow-xl bg-base-100 rounded-box w-52">
                    <MenuItem v-for="({ native, currentUrl }, code) in $page.props.i18n.locales" as="li" :key="code">
                        <Link @click="switchLocale(code, close)" :href="currentUrl" class="flex items-center space-x-5">
                            <Component :is="`Flag${code.toUpperCase()}`" class="w-h h-5"/>
                            <span v-text="native"/>
                        </Link>
                    </MenuItem>
                </MenuItems>
            </Menu>

            <Link v-if="$page.props.auth.user" :href="$route('app.dashboard')" class="btn gap-2">
                <span v-text="$page.props.auth.user.first_name"/>

                <div class="avatar">
                    <div class="w-8 rounded-full">
                        <Avatar/>
                    </div>
                </div>
            </Link>

            <Link v-else :href="$route('auth.sign-in')" class="btn">Sign In</Link>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import Avatar from '../Avatar.vue'
import { FlagRU, FlagEN, FlagLV } from '../flags'
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { usePageMixin } from '../../mixins/page'
import { useRouteMixin } from '../../mixins/route'
import { useLang } from '../../composables/lang'

export default {
    mixins: [usePageMixin, useRouteMixin],
    components: { Link, Avatar, FlagRU, FlagEN, FlagLV, Menu, MenuButton, MenuItems, MenuItem },
    computed: {
        lang: () => useLang(),
    },
    methods: {
        switchLocale(code, closeMenu) {
            document.documentElement.lang = code
            closeMenu()
        },
    },
}
</script>
