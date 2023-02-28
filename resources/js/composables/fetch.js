import { ofetch } from 'ofetch'
import { usePage } from '@inertiajs/vue3'

// noinspection JSCheckFunctionSignatures,JSUnresolvedVariable
export const useFetch = () => ofetch.create({
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept-Language': usePage().props.i18n.currentLocale,
    },
})
