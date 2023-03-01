<template>
    <Transition name="fade">
        <!--suppress JSUnresolvedVariable -->
        <div v-if="collection.length && modalComponent" class="modal modal-open overflow-y-auto">
            <div class="my-auto relative py-10 w-full">
                <div class="container mx-auto">
                    <Transition name="fade" mode="out-in">
                        <!--suppress JSValidateTypes -->
                        <Component @closeModal="closeModal" :is="modalComponent" v-bind="modal.props" :key="modal.id"/>
                    </Transition>
                </div>
            </div>
        </div>
    </Transition>
</template>

<!--suppress JSUnresolvedVariable -->
<script>
import { mapState } from 'pinia'
import { useModalStore } from '@/stores/modal'
import { last } from 'lodash'
import { defineAsyncComponent } from 'vue'

// noinspection JSUnusedGlobalSymbols
export default {
    computed: {
        ...mapState(useModalStore, ['collection']),
        modal() {
            return last(this.collection)
        },
        modalComponent() {
            if (this.modal.component instanceof Promise) {
                return defineAsyncComponent(() => this.modal.component)
            }

            return this.modal.component
        },
    },
    watch: {
        collection: {
            deep: true,
            handler({ length }) {
                if (length) {
                    document.body.classList.add('overflow-hidden')
                } else {
                    document.body.classList.remove('overflow-hidden')
                }
            },
        },
    },
    methods: {
        closeModal() {
            useModalStore().removeLast()
        },
    },
}
</script>
