<template>
    <footer class="footer footer-center p-4 text-base-content">
        <div>
            <p>&copy; {{ footerYear }} {{ config.app.name }}</p>
        </div>
    </footer>
</template>

<script>
import { usePage } from '@inertiajs/vue3'

export default {
    computed: {
        config: () => usePage().props.config,
        footerYear: () => new Date().getFullYear(),
    },
}
</script>
