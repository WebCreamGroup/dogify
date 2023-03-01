<template>
    <footer class="footer footer-center p-4 text-base-content">
        <div>
            <p>&copy; {{ footerYear }} {{ $page.props.config.app.name }}</p>
        </div>
    </footer>
</template>

<script>
import { usePageMixin } from '@/mixins/page'

export default {
    mixins: [usePageMixin],
    computed: {
        footerYear: () => new Date().getFullYear(),
    },
}
</script>
