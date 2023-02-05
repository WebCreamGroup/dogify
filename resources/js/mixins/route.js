import { usePage } from '@inertiajs/vue3'

// noinspection JSUnusedGlobalSymbols
export const useRouteMixin = {
    methods: {
        $route: (name = null, params = null, absolute = true, config = usePage().props.ziggy) => window.route(name, params, absolute, config),
    },
}
