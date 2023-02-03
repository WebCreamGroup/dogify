<template>
    <img v-if="! hide" :src="src" :alt="alt"/>
</template>

<script>
import { usePage } from '@inertiajs/vue3'

export default {
    computed: {
        hide: () => !usePage().props.auth,
        alt: () => usePage().props.auth.user.first_name,
        src: () => {
            const user = usePage().props.auth.user
            const fallback = `https://eu.ui-avatars.com/api/?name=${user.first_name[0]}&color=7DC88E&background=EBF4FF`

            return `https://unavatar.io/${user.email}?fallback=${encodeURIComponent(fallback)}`
        }
    },
}
</script>
