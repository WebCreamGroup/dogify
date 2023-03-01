import { useLang } from '@/composables/lang'

// noinspection JSUnusedGlobalSymbols
export const useLangMixin = {
    computed: {
        $lang: () => useLang(),
    },
}
