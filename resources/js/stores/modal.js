import { v4 as uuid } from 'uuid'
import { defineStore } from 'pinia'
import { usePage } from '@inertiajs/vue3'
import { useFetch } from '@/composables/fetch'
import { ref, reactive } from 'vue'

export const useModalStore = defineStore('modal', {
    state: () => ({
        initialModal: usePage().props?.modal,
        collection: [],
    }),
    getters: {
        preparedCollection(state) {
            if (state.initialModal) {
                return [
                    {
                        id: uuid(),
                        component: import(`../modals/${state.initialModal.component}.vue`),
                        props: state.initialModal.props,
                    },
                    ...state.collection,
                ]
            }

            return state.collection
        },
    },
    actions: {
        open(component, props = {}) {
            const modal = { id: uuid(), component, props }
            this.collection.push(modal)

            return modal
        },
        async openByRoute(route) {
            const { modal } = await useFetch()(route)
            const component = import(`../modals/${modal.component}.vue`)

            return this.open(component, modal.props)
        },
        byRoute(route) {
            const loading = ref(false)
            const modal = ref(null)

            const open = async () => {
                loading.value = true
                modal.value = await this.openByRoute(route)
                loading.value = false

                return modal
            }

            return reactive({ route, loading, modal, open })
        },
        close() {
            this.collection.splice(-1, 1)
        },
    },
})
