import { usePage } from '@inertiajs/vue3'

export const useRouteMixin = {
    methods: {
        $route: (name = null, params = null, absolute = null, config = usePage().props.ziggy) => window.route(name, params, absolute, config),
    },
}
