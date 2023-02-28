import { v4 as uuid } from 'uuid'
import { defineStore } from 'pinia'

export const useModalStore = defineStore('modal', {
    state: () => ({ collection: [] }),
    actions: {
        push(modal, props = {}) {
            this.collection.push({ id: uuid(), component: modal, props })
        },
        removeLast() {
            this.collection.splice(-1, 1)
        }
    },
})
