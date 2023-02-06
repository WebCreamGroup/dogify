<template>
    <div class="modal-box max-h-max mx-auto">
        <h3 v-if="$slots.title" class="font-bold text-lg">
            <slot name="title"/>
        </h3>

        <slot name="default"/>

        <div v-if="$slots.actions" class="modal-action">
            <slot name="actions"/>
        </div>
    </div>
</template>
