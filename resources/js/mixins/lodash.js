import _ from 'lodash'

// noinspection JSUnusedGlobalSymbols
export const useLodashMixin = {
    computed: {
        $_: () => _,
    },
}
