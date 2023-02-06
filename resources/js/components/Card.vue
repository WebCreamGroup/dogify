<template>
    <div class="card bg-base-100 border shadow-xl">
        <figure v-if="$slots.image">
            <slot name="image"/>
        </figure>

        <div class="card-body">
            <h2 v-if="$slots.title" class="card-title">
                <slot name="title"/>
            </h2>

            <slot name="default"/>

            <div v-if="$slots.actions" class="card-actions justify-end mt-5">
                <slot name="actions"/>
            </div>
        </div>
    </div>
</template>
