import { usePage } from '@inertiajs/vue3'
import Lang from 'lang.js'

export function useLang() {
    // noinspection JSCheckFunctionSignatures
    return new Lang(usePage().props.trans)
}
