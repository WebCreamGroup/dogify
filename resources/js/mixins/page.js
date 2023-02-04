import { usePage } from '@inertiajs/vue3'

export const usePageMixin = {
    computed: {
        $page: () => usePage(),
    },
}
