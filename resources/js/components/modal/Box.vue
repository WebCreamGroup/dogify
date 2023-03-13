<script setup>
const emit = defineEmits(['init'])
const props = defineProps({
    allowContainerClose: {
        type: Boolean,
        default: true,
    },
})

emit('init', props)
</script>

<template>
    <div class="modal-box max-h-full max-w-full mx-auto overflow-visible">
        <h3 v-if="$slots.title" class="font-bold text-lg mb-5">
            <slot name="title"/>
        </h3>

        <slot name="default"/>

        <div v-if="$slots.actions" class="modal-action mt-5">
            <slot name="actions"/>
        </div>
    </div>
</template>
