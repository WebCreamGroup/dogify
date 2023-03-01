import { v4 as uuid } from 'uuid'
import { defineStore } from 'pinia'
import { TYPE } from '@/components/Alert.vue'

export { TYPE }

export const useToastStore = defineStore('toast', {
    state: () => ({ collection: {} }),
    actions: {
        push(content, type = TYPE.INFO) {
            const collectionUuid = uuid()
            this.collection[collectionUuid] = [type, content]
            setTimeout(() => delete this.collection[collectionUuid], 5000)
        },
        clear() {
            this.collection = {}
        },
    },
})
