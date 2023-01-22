<template>
    <div v-if="collection" class="toast">
        <Alert v-for="([type, content], index) in collection" :key="index" :type="type">
            <div v-html="content"/>
        </Alert>
    </div>
</template>

<script>
import { mapState } from 'pinia'
import { useToastStore } from '../../Stores/toast'
import Alert from '../Alert.vue'

export default {
    components: { Alert },
    computed: {
        ...mapState(useToastStore, ['collection']),
    },
}
</script>
