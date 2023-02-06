<template>
    <Transition name="fade">
        <div v-if="collection.length" class="modal modal-open overflow-y-auto">
            <div class="my-auto relative py-10">
                <Transition name="fade" mode="out-in">
                    <!--suppress JSValidateTypes -->
                    <Component @closeModal="closeModal" :is="modalComponent" v-bind="modal.props" :key="modal.id"/>
                </Transition>
            </div>
        </div>
    </Transition>
</template>

<script>
import { mapState } from 'pinia'
import { useModal } from '../../stores/modal'
import { last } from 'lodash'
import { defineAsyncComponent } from 'vue'

// noinspection JSUnusedGlobalSymbols
export default {
    computed: {
        ...mapState(useModal, ['collection']),
        modal() {
            return last(this.collection)
        },
        modalComponent() {
            // noinspection JSUnresolvedVariable
            return defineAsyncComponent(() => this.modal.component)
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
            useModal().removeLast()
        },
    },
}
</script>
