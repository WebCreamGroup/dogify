<template>
    <div>
        <div>Dashboard</div>
        <h1>{{ auth.user.email }}</h1>
    </div>
</template>

<script>
import { usePage } from '@inertiajs/vue3'

export default {
    computed: {
        auth: () => usePage().props.auth,
    }
}
</script>
