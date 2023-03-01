<template>
    <div v-if="collection" class="toast">
        <Alert v-for="([type, content], index) in collection" :key="index" :type="type">
            <div v-html="content"/>
        </Alert>
    </div>
</template>

<script>
import { useToastStore } from '@/stores/toast'
import Alert from '@/components/Alert.vue'
import { usePage } from '@inertiajs/vue3'

export default {
    components: { Alert },
    computed: {
        collection: () => {
            const collection = useToastStore().collection

            // noinspection JSUnresolvedVariable
            const flashToast = usePage().props.flash.toast
            if (flashToast) {
                useToastStore().push(flashToast.content, flashToast.type)
            }

            return collection
        },
    },
}
</script>
