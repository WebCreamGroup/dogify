import { usePage } from '@inertiajs/vue3'

export function useRoute(name = null, params = null, absolute = true, config = usePage().props.ziggy) {
    return window.route(name, params, absolute, config)
}
