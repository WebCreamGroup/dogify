import { usePage } from '@inertiajs/vue3'

// noinspection JSUnusedGlobalSymbols
export const usePageMixin = {
    computed: {
        $page: () => usePage(),
    },
}
