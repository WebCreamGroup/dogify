<template>
    <Transition name="fade">
        <div v-if="preparedCollection.length && modalComponent" @click="containerClick" class="modal modal-open overflow-y-auto">
            <div class="my-auto relative py-10 w-full">
                <div class="container mx-auto">
                    <Transition name="fade" mode="out-in">
                        <Component @click.stop @init="boxInit" @close="boxClose" :is="modalComponent" v-bind="modal.props" :key="modal.id"/>
                    </Transition>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script>
import { mapState } from 'pinia'
import { useModalStore } from '@/stores/modal'
import { last } from 'lodash'
import { defineAsyncComponent } from 'vue'

// noinspection JSUnusedGlobalSymbols
export default {
    data: () => ({
        allowContainerClose: null,
    }),
    computed: {
        ...mapState(useModalStore, ['preparedCollection']),
        modal() {
            return last(this.preparedCollection)
        },
        modalComponent() {
            if (this.modal.component instanceof Promise) {
                return defineAsyncComponent(() => this.modal.component)
            }

            return this.modal.component
        },
    },
    watch: {
        preparedCollection: {
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
        boxInit({ allowContainerClose }) {
            this.allowContainerClose = allowContainerClose
        },
        boxClose() {
            useModalStore().close()
        },
        containerClick() {
            if (this.allowContainerClose) {
                this.boxClose()
            }
        }
    },
}
</script>
