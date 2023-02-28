import _ from 'lodash'

export const useLodashMixin = {
    computed: {
        $_: () => _,
    },
}
