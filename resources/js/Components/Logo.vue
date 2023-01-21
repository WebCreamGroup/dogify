<template>
    <Link :href="route('public.landing')" class="btn btn-ghost normal-case text-xl" v-text="config.app.name"/>
</template>

<script>
import { usePage, Link } from '@inertiajs/vue3'

export default {
    name: 'Components/Logo',
    components: { Link },
    computed: {
        route: () => window.route,
        config: () => usePage().props.config,
    },
}
</script>
