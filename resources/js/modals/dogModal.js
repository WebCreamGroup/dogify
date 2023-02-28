import { useFetch } from '../composables/fetch'
import { useModalStore } from '../stores/modal'
import { markRaw } from 'vue'
import Modal from './DogModal.vue'
import { promiseTimeout } from '@vueuse/core'

export async function useDogModal() {
    const [, { data: breeds }] = await Promise.all([
        promiseTimeout(300),
        useFetch()('/app/breeds'),
    ])

    useModalStore().push(markRaw(Modal), { breeds })
}
