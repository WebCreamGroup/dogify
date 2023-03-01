import { useRoute } from '@/composables/route'

export const useRouteMixin = {
    methods: {
        $route: useRoute,
    },
}
